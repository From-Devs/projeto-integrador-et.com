<?php
require_once __DIR__ . '/../../config/database.php';

class CarouselModel {
    private PDO $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
        // Garantir que o PDO lance exceções
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // --------------------------- HELPERS ---------------------------
    private function normalizeHex(?string $hex): ?string {
        if ($hex === null) return null;
        $hex = trim($hex);
        if ($hex === '') return null;
        // Garantir # seguido de 3 ou 6 hex
        if ($hex[0] !== '#') $hex = '#' . $hex;
        return strtoupper($hex);
    }

    private function productExists(int $id_produto): bool {
        $stmt = $this->conn->prepare('SELECT 1 FROM produto WHERE id_produto = :id LIMIT 1');
        $stmt->execute([':id' => $id_produto]);
        return (bool) $stmt->fetchColumn();
    }

    private function cleanupOrphanColors(): void {
        $this->conn->exec("DELETE FROM coressubs WHERE id_coressubs NOT IN (SELECT id_coressubs FROM carousel)");
    }

    private function reorderPositions(): void {
        $stmt = $this->conn->query("SELECT id_carousel FROM carousel ORDER BY posicao ASC, id_carousel ASC");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pos = 1;
        $update = $this->conn->prepare("UPDATE carousel SET posicao = :pos WHERE id_carousel = :id");
        foreach ($rows as $r) {
            $update->execute([':pos' => $pos++, ':id' => $r['id_carousel']]);
        }
    }
    public function getCarousel(): ?array {
        $stmt = $this->conn->query("
            SELECT * FROM carousel LIMIT 3
        ");
        $destaque = $stmt->fetch(PDO::FETCH_ASSOC);

        return $destaque ?: null;
    }
    // Atualiza posição de um carousel (e faz reordenação segura)
    public function updatePosition(int $id_carousel, int $novaPosicao): bool {
        try {
            $this->conn->beginTransaction();

            // pegar total
            $stmt = $this->conn->query('SELECT COUNT(*) FROM carousel');
            $total = (int) $stmt->fetchColumn();
            if ($total === 0) {
                $this->conn->rollBack();
                return false;
            }

            // limitar novaPosicao entre 1 e total
            $novaPosicao = max(1, min($total, $novaPosicao));

            // pegar posicao atual
            $stmt = $this->conn->prepare('SELECT posicao FROM carousel WHERE id_carousel = :id');
            $stmt->execute([':id' => $id_carousel]);
            $atual = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$atual) {
                $this->conn->rollBack();
                return false;
            }
            $posAtual = (int) $atual['posicao'];
            if ($posAtual === $novaPosicao) {
                $this->conn->commit();
                return true;
            }

            if ($posAtual < $novaPosicao) {
                // subir os itens entre posAtual+1 .. novaPosicao reduzindo 1
                $q = 'UPDATE carousel SET posicao = posicao - 1 WHERE posicao > :posAtual AND posicao <= :novaPos';
                $stmt = $this->conn->prepare($q);
                $stmt->execute([':posAtual' => $posAtual, ':novaPos' => $novaPosicao]);
            } else {
                // posAtual > novaPosicao
                $q = 'UPDATE carousel SET posicao = posicao + 1 WHERE posicao >= :novaPos AND posicao < :posAtual';
                $stmt = $this->conn->prepare($q);
                $stmt->execute([':novaPos' => $novaPosicao, ':posAtual' => $posAtual]);
            }

            // colocar o item na nova posicao
            $stmt = $this->conn->prepare('UPDATE carousel SET posicao = :novaPos WHERE id_carousel = :id');
            $stmt->execute([':novaPos' => $novaPosicao, ':id' => $id_carousel]);

            $this->conn->commit();
            return true;

        } catch (Exception $e) {
            error_log('[CarouselModel] Erro updatePosition: ' . $e->getMessage());
            if ($this->conn->inTransaction()) $this->conn->rollBack();
            return false;
        }
    }

    // --------------------------- CRUD ---------------------------
    // 🔹 READ - Buscar todos os carrosseis
    public function getAll(): array {
        try {
            $sql = "
                SELECT c.id_carousel, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo,
                       p.img1, p.img2, p.img3, p.fgPromocao,
                       cs.corEspecial, cs.hexDegrade1, cs.hexDegrade2, cs.hexDegrade3,
                       c.posicao
                FROM carousel c
                JOIN produto p ON p.id_produto = c.id_produto
                JOIN coressubs cs ON cs.id_coressubs = c.id_coressubs
                ORDER BY c.posicao ASC
            ";

            $stmt = $this->conn->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($rows)) {
                error_log("[CarouselModel] Nenhum registro retornado da query: " . $sql);
            } else {
                error_log("[CarouselModel] Retornou " . count($rows) . " registros do carousel");
            }

            return $rows ?: [];

        } catch (PDOException $e) {
            error_log("[CarouselModel] Erro SQL: " . $e->getMessage());
            return [];
        }
    }

    // 🔹 READ - Buscar carrossel por ID
    public function getElementById(int $id): array|false {
        try {
            $stmt = $this->conn->prepare("SELECT c.id_carousel, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo,
            p.img1, p.img2, p.img3, p.fgPromocao, cs.corEspecial, cs.hexDegrade1, cs.hexDegrade2, cs.hexDegrade3, c.posicao
            FROM carousel c
            JOIN produto p ON p.id_produto = c.id_produto
            JOIN coressubs cs ON cs.id_coressubs = c.id_coressubs
            WHERE c.id_carousel = :id");
            $stmt->execute([":id" => $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                error_log("[CarouselModel] Nenhum carousel encontrado com ID = {$id}");
            }
            return $result;

        } catch (PDOException $e) {
            error_log("[CarouselModel] Erro ao buscar por ID: " . $e->getMessage());
            return false;
        }
    }

    // 🔹 CREATE - Criar novo carrossel
    public function create(array $data): array {
        try {
            // validação simples
            if (empty($data['id_produto']) || !is_numeric($data['id_produto'])) {
                return ['error' => 'ID do produto inválido ou ausente.'];
            }
            $id_produto = (int) $data['id_produto'];

            if (!$this->productExists($id_produto)) {
                return ['error' => 'Produto não encontrado.'];
            }

            $this->conn->beginTransaction();

            // Limite de 3 carrosseis
            $stmt = $this->conn->query("SELECT COUNT(*) as total FROM carousel");
            $total = (int) $stmt->fetch()['total'];

            if ($total >= 3) {
                $this->conn->rollBack();
                return ['error' => 'Limite atingido, não é possível criar mais de 3 carrosseis.'];
            }

            $posicao = $total + 1;

            // Pegar cores do produto: suportamos duas possibilidades — cores em produto OU tabela cores
            $stmt = $this->conn->prepare("SELECT corEspecial, hexDegrade1, hexDegrade2, hexDegrade3, id_cores FROM produto WHERE id_produto = :id_produto");
            $stmt->execute([':id_produto' => $id_produto]);
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$produto) {
                $this->conn->rollBack();
                return ['error' => 'Produto não encontrado para copiar cores.'];
            }

            // Prioriza colunas em produto; se id_cores existir, tenta buscar tabela cores
            $cores = [
                    'corEspecial' => $produto['corEspecial'] ?? null,
                    'hexDegrade1' => $produto['hexDegrade1'] ?? null,
                    'hexDegrade2' => $produto['hexDegrade2'] ?? null,
                    'hexDegrade3' => $produto['hexDegrade3'] ?? null,
                ];

                if (empty($cores['corEspecial']) && !empty($produto['id_cores'])) {
                    $stmt = $this->conn->prepare('SELECT corPrincipal AS corEspecial, hexDegrade1, hexDegrade2 FROM cores WHERE id_cores = :id LIMIT 1');
                    $stmt->execute([':id' => $produto['id_cores']]);
                    $c = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($c) {
                        $cores['corEspecial'] = $c['corEspecial'];
                        $cores['hexDegrade1'] = $c['hexDegrade1'] ?? null;
                        $cores['hexDegrade2'] = $c['hexDegrade2'] ?? null;
                        $cores['hexDegrade3'] = $cores['hexDegrade3'] ?? null; // manter se houver
                    }
                }

                // Normalizar cores
                $cores['corEspecial'] = $cores['corEspecial'] ?? '';
                $cores['hexDegrade1'] = $this->normalizeHex($cores['hexDegrade1'] ?? null);
                $cores['hexDegrade2'] = $this->normalizeHex($cores['hexDegrade2'] ?? null);
                $cores['hexDegrade3'] = $this->normalizeHex($cores['hexDegrade3'] ?? null);

                // Verificar se já existe em coressubs
                $check = $this->conn->prepare("SELECT id_coressubs FROM coressubs WHERE corEspecial = :corEspecial AND hexDegrade1 = :hexDegrade1 AND hexDegrade2 = :hexDegrade2 AND (hexDegrade3 = :hexDegrade3 OR (hexDegrade3 IS NULL AND :hexDegrade3 IS NULL)) LIMIT 1");
                $check->execute([
                    ':corEspecial' => $cores['corEspecial'],
                    ':hexDegrade1' => $cores['hexDegrade1'],
                    ':hexDegrade2' => $cores['hexDegrade2'],
                    ':hexDegrade3' => $cores['hexDegrade3']
                ]);
                $ex = $check->fetch(PDO::FETCH_ASSOC);

                if ($ex) {
                    $id_coressubs = $ex['id_coressubs'];
                } else {
                    $insertCor = $this->conn->prepare("INSERT INTO coressubs (corEspecial, hexDegrade1, hexDegrade2, hexDegrade3) VALUES (:corEspecial, :hexDegrade1, :hexDegrade2, :hexDegrade3)");
                    $insertCor->execute([
                        ':corEspecial' => $cores['corEspecial'],
                        ':hexDegrade1' => $cores['hexDegrade1'],
                        ':hexDegrade2' => $cores['hexDegrade2'],
                        ':hexDegrade3' => $cores['hexDegrade3']
                    ]);
                    $id_coressubs = $this->conn->lastInsertId();
                }

                // Criar novo carousel
                $insert = $this->conn->prepare("INSERT INTO carousel (id_produto, id_coressubs, posicao) VALUES (:id_produto, :id_coressubs, :posicao)");
                $insert->execute([
                    ':id_produto' => $id_produto,
                    ':id_coressubs' => $id_coressubs,
                    ':posicao' => $posicao
                ]);

                $id_inserted = $this->conn->lastInsertId();

                $this->conn->commit();

                return ['success' => true, 'id_carousel' => $id_inserted];

            } catch (Exception $e) {
                error_log("[CarouselModel] Erro ao criar carrossel: " . $e->getMessage());
                if ($this->conn->inTransaction()) $this->conn->rollBack();
                return ['error' => 'Erro ao criar carrossel: ' . $e->getMessage()];
            }
        }
    
    // 🔹 DELETE - Remover carrossel
    public function remove(int $id): bool {
        try {
            $this->conn->beginTransaction();
            $stmt = $this->conn->prepare("DELETE FROM carousel WHERE id_carousel = :id");
            $ok = $stmt->execute([":id" => $id]);
            // reordenar posições e limpar cores órfãs
            $this->reorderPositions();
            $this->cleanupOrphanColors();
            $this->conn->commit();
            return (bool) $ok;
        } catch (PDOException $e) {
            error_log("[CarouselModel] Erro ao remover: " . $e->getMessage());
            if ($this->conn->inTransaction()) $this->conn->rollBack();
            return false;
        }
    }

    public function update(int $id, array $data): bool {
        // 1. Extração e Definição das variáveis de entrada
        $posicao = (int)($data['posicao'] ?? 0); 
        
        // ** VARIÁVEIS DE COR ADICIONADAS AQUI **
        // Garante que estas variáveis existam para serem usadas no execute()
        $corEspecial = $data['corEspecial'] ?? null;
        $hexDegrade1 = $data['hexDegrade1'] ?? null;
        $hexDegrade2 = $data['hexDegrade2'] ?? null;
        $hexDegrade3 = $data['hexDegrade3'] ?? null;
        // ****************************************

        try {
            $this->conn->beginTransaction();

            // 1. Descobrir qual é o id_coresSubs e o id_produto vinculado a este carrossel
            $stmtBusca = $this->conn->prepare("SELECT id_coresSubs, id_produto FROM carousel WHERE id_carousel = :id");
            $stmtBusca->execute([':id' => $id]);
            $carouselAtual = $stmtBusca->fetch(\PDO::FETCH_ASSOC);

            if (!$carouselAtual) {
                throw new \Exception("Carrossel ID {$id} não encontrado para atualização.");
            }

            $id_coresSubs = $carouselAtual['id_coresSubs'];
            
            // ** GARANTE QUE id_produto NUNCA É PERDIDO **
            // Se o payload não enviou (ou enviou 0/null), usa o original do banco.
            $id_produto = (int)($data['id_produto'] ?? $carouselAtual['id_produto']);

            // 2. Atualizar o registro de Cor (coressubs)
            if ($id_coresSubs) {
                $stmtCor = $this->conn->prepare("
                    UPDATE coressubs 
                    SET corEspecial = :corEspecial, 
                        hexDegrade1 = :hexDegrade1, 
                        hexDegrade2 = :hexDegrade2, 
                        hexDegrade3 = :hexDegrade3
                    WHERE id_coresSubs = :id_coresSubs
                ");
                $stmtCor->execute([
                    ':id_coresSubs' => $id_coresSubs,
                    ':corEspecial' => $corEspecial,  // AGORA ESTÁ DEFINIDA
                    ':hexDegrade1' => $hexDegrade1,  // AGORA ESTÁ DEFINIDA
                    ':hexDegrade2' => $hexDegrade2,  // AGORA ESTÁ DEFINIDA
                    ':hexDegrade3' => $hexDegrade3   // AGORA ESTÁ DEFINIDA
                ]);
            }

            // 3. Atualizar dados do Carrossel (carousel)
            $stmtCarousel = $this->conn->prepare("
                UPDATE carousel
                SET id_produto = :id_produto, 
                    posicao = :posicao
                WHERE id_carousel = :id
            ");

            $resultado = $stmtCarousel->execute([
                ":id"         => $id,
                ":id_produto" => $id_produto,
                ":posicao"    => $posicao
            ]);

            error_log("[DEBUG] Carrossel ID {$id} atualizado com posicao: {$posicao}. Resultado: " . ($resultado ? 'Sucesso' : 'Falha'));

            $this->conn->commit();
            return $resultado;

        } catch (\Exception $e) {
            if ($this->conn->inTransaction()) {
                $this->conn->rollBack();
                error_log("[DEBUG/ERRO] ROLLBACK EXECUTADO! Carrossel ID {$id}. Erro: " . $e->getMessage()); // <-- LOG IMPORTANTE
            }
            error_log("[Carousel] Erro ao atualizar o Carrossel ID {$id}: " . $e->getMessage());
            return false;
        }
    }
}

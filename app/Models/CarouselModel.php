<?php
require_once __DIR__ . '/../../config/database.php';

class CarouselModel {
    private PDO $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    // 🔹 READ - Buscar todos os carrosseis
    public function getAll(): array {
        try {
            $sql = "
                SELECT c.id_carousel, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo,
                       p.img1, p.img2, p.img3, p.fgPromocao,
                       cs.corEspecial, cs.hexDegrade1, cs.hexDegrade2, cs.hexDegrade3
                FROM carousel c
                JOIN produto p ON p.id_produto = c.id_produto
                JOIN coressubs cs ON cs.id_coressubs = c.id_coressubs
                ORDER BY c.posicao ASC
            ";

            $stmt = $this->conn->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Log
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
            $stmt = $this->conn->prepare("
                SELECT c.id_carousel, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo,
                       p.img1, p.img2, p.img3, p.fgPromocao,
                       cs.corEspecial, cs.hexDegrade1, cs.hexDegrade2, cs.hexDegrade3
                FROM carousel c
                JOIN produto p ON p.id_produto = c.id_produto
                JOIN coressubs cs ON cs.id_coressubs = c.id_coressubs
                WHERE c.id_carousel = :id
            ");
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
            // Limite de 3 carrosseis
            $stmt = $this->conn->query("SELECT COUNT(*) as total FROM carousel");
            $total = (int) $stmt->fetch()['total'];

            if ($total >= 3) {
                return ['error' => 'Limite atingido, não é possível criar mais de 3 carrosseis.'];
            }

            $posicao = $total + 1;
            $id_produto = $data['id_produto'];

            // Pegar cores do produto
            $stmt = $this->conn->prepare("
                SELECT corEspecial, hexDegrade1, hexDegrade2, hexDegrade3
                FROM produto
                WHERE id_produto = :id_produto
            ");
            $stmt->execute([':id_produto' => $id_produto]);
            $cores = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$cores) {
                return ['error' => 'Produto não encontrado para copiar cores.'];
            }

            // Criar cor no coressubs
            $insertCor = $this->conn->prepare("
                INSERT INTO coressubs (corEspecial, hexDegrade1, hexDegrade2, hexDegrade3)
                VALUES (:corEspecial, :hexDegrade1, :hexDegrade2, :hexDegrade3)
            ");
            $insertCor->execute([
                ':corEspecial' => $cores['corEspecial'],
                ':hexDegrade1' => $cores['hexDegrade1'],
                ':hexDegrade2' => $cores['hexDegrade2'],
                ':hexDegrade3' => $cores['hexDegrade3']
            ]);
            $id_coressubs = $this->conn->lastInsertId();

            // Criar novo carousel
            $insert = $this->conn->prepare("
                INSERT INTO carousel (id_produto, id_coressubs, posicao)
                VALUES (:id_produto, :id_coressubs, :posicao)
            ");
            $insert->execute([
                ':id_produto' => $id_produto,
                ':id_coressubs' => $id_coressubs,
                ':posicao' => $posicao
            ]);

            return ['success' => true, 'id_carousel' => $this->conn->lastInsertId()];

        } catch (Exception $e) {
            error_log("[CarouselModel] Erro ao criar carrossel: " . $e->getMessage());
            return ['error' => 'Erro ao criar carrossel: ' . $e->getMessage()];
        }
    }

    // 🔹 UPDATE - Atualizar carrossel
   // Substitua a sua função 'update' por esta (ou mude o nome para algo como 'mudarProdutoECores'):
    public function update(int $id_carousel, array $data): array {
        // Pegando o novo ID do produto do array de dados
        $novo_id_produto = $data['id_produto'] ?? null;

        if (!$novo_id_produto) {
            return ['error' => 'ID do novo produto não fornecido no array de dados.'];
        }

        try {
            // 1. Busca o ID do produto ATUAL (e o id_coressubs)
            // OBS: Corrigido o erro de digitação no placeholder ':id_carosel'
            $stmt_atual = $this->conn->prepare("SELECT id_produto, id_coressubs FROM carousel WHERE id_carousel = :id_carousel");
            $stmt_atual->execute([':id_carousel' => $id_carousel]);
            $carousel_atual = $stmt_atual->fetch(PDO::FETCH_ASSOC);

            if (!$carousel_atual) {
                return ['error' => 'Carrossel não encontrado.'];
            }
            
            // 2. VERIFICAÇÃO IF: Se o produto é o mesmo, retorna sucesso sem mexer
            if ((int)$carousel_atual['id_produto'] === (int)$novo_id_produto) {
                error_log("[CarouselModel] Produto JÁ é o mesmo ({$novo_id_produto}), pulando atualização. kkkk");
                // Retorna o id_coressubs atual, não o do novo produto
                return ['success' => true, 'id_coressubs_usado' => (int)$carousel_atual['id_coressubs']]; 
            }
            
            // 3. Busca as cores do NOVO PRODUTO (CORRIGIDO: '->' e mapeamento de colunas)
            // Aqui assumo que: produto.id_cores liga com cores.id_cores
            // E que cores.corPrincipal deve ser mapeado para coressubs.corEspecial
        // ✅ CÓDIGO CORRIGIDO NO CarouselModel.php -> função update

            $stmt_cores_produto = $this->conn->prepare("
                SELECT 
                    p.id_produto, 
                    c.corPrincipal AS corEspecial, 
                    c.hexDegrade1, 
                    c.hexDegrade2,
                    NULL AS hexDegrade3  // AGORA SIM! Pegamos NULL porque não existe na tabela 'cores'
                FROM produto p 
                INNER JOIN cores c ON p.id_cores = c.id_cores
                WHERE p.id_produto = :id_produto;
            ");
            $stmt_cores_produto->execute([':id_produto' => $novo_id_produto]);
            $cores_novo_produto = $stmt_cores_produto->fetch(PDO::FETCH_ASSOC);
            
            if (!$cores_novo_produto) {
                return ['error' => 'Novo produto ou suas cores não encontradas.'];
            }
            
            // --- O resto da sua lógica de reutilização/criação de cores está CORRETA! ---
            
            // 4. Verifica se a nova cor JÁ EXISTE em coressubs
            $check = $this->conn->prepare("
                SELECT id_coressubs FROM coressubs
                WHERE corEspecial = :corEspecial
                AND hexDegrade1 = :hexDegrade1
                AND hexDegrade2 = :hexDegrade2
                AND (hexDegrade3 = :hexDegrade3 OR (hexDegrade3 IS NULL AND :hexDegrade3 IS NULL))
                LIMIT 1
            ");
            $check->execute([
                ':corEspecial' => $cores_novo_produto['corEspecial'],
                ':hexDegrade1' => $cores_novo_produto['hexDegrade1'],
                ':hexDegrade2' => $cores_novo_produto['hexDegrade2'],
                ':hexDegrade3' => $cores_novo_produto['hexDegrade3'] ?? null
            ]);
            $existe = $check->fetch(PDO::FETCH_ASSOC);
            
            $novo_id_coressubs;

            if ($existe) {
                $novo_id_coressubs = $existe['id_coressubs'];
                error_log("[CarouselModel] Cor do novo produto já existia. Reutilizando ID: {$novo_id_coressubs}");
            } else {
                // 5. Se a cor é nova, CRIA uma nova entrada em coressubs (CÓPIA)
                $insertCor = $this->conn->prepare("
                    INSERT INTO coressubs (corEspecial, hexDegrade1, hexDegrade2, hexDegrade3)
                    VALUES (:corEspecial, :hexDegrade1, :hexDegrade2, :hexDegrade3)
                ");
                $insertCor->execute([
                    ':corEspecial' => $cores_novo_produto['corEspecial'],
                    ':hexDegrade1' => $cores_novo_produto['hexDegrade1'],
                    ':hexDegrade2' => $cores_novo_produto['hexDegrade2'],
                    ':hexDegrade3' => $cores_novo_produto['hexDegrade3'] ?? null
                ]);
                $novo_id_coressubs = $this->conn->lastInsertId();
                error_log("[CarouselModel] Nova cor copiada e criada com ID: {$novo_id_coressubs}");
            }
            
            // 6. ATUALIZA o carrossel (MUDANÇA DE PRODUTO E CORES)
            $update = $this->conn->prepare("
                UPDATE carousel
                SET id_produto = :id_produto, id_coressubs = :id_coressubs
                WHERE id_carousel = :id_carousel
            ");
            $ok = $update->execute([
                ':id_produto' => $novo_id_produto,
                ':id_coressubs' => $novo_id_coressubs,
                ':id_carousel' => $id_carousel
            ]);

            if ($ok) {
                return ['success' => true, 'id_coressubs_usado' => $novo_id_coressubs];
            } else {
                return ['error' => 'Falha ao atualizar o carrossel.'];
            }

        } catch (Exception $e) {
            error_log("[CarouselModel] Erro ao atualizar/mudar produto: " . $e->getMessage());
            return ['error' => 'Erro interno ao processar a mudança: ' . $e->getMessage()];
        }
    }

    // 🔹 DELETE - Remover carrossel
    public function remove(int $id): bool {
        try {
            $stmt = $this->conn->prepare("DELETE FROM carousel WHERE id_carousel = :id");
            return $stmt->execute([":id" => $id]);
        } catch (PDOException $e) {
            error_log("[CarouselModel] Erro ao remover: " . $e->getMessage());
            return false;
        }
    }
    public function updateCoresPersonalizadas(int $id_carousel, array $novaCor): bool {
    try {
        // 🩹 Ajuste flexível — aceita ['cores'=>[]] ou direto []
        $novaCor = $novaCor['cores'] ?? $novaCor;

        // 1️⃣ Busca o ID atual da cor desse carousel
        $stmt = $this->conn->prepare("
            SELECT cs.id_coressubs, cs.corEspecial, cs.hexDegrade1, cs.hexDegrade2, cs.hexDegrade3
            FROM carousel c
            JOIN coressubs cs ON cs.id_coressubs = c.id_coressubs
            WHERE c.id_carousel = :id_carousel
            LIMIT 1
        ");
        $stmt->execute([':id_carousel' => $id_carousel]);
        $atual = $stmt->fetch(PDO::FETCH_ASSOC);

        // 2️⃣ Se não achou, aborta
        if (!$atual) {
            error_log("[CarouselModel] Nenhum coressubs atual encontrado para ID {$id_carousel}");
            return false;
        }

        // 3️⃣ Verifica se mudou alguma coisa
        $mudou = (
            $atual['corEspecial'] !== $novaCor['corEspecial'] ||
            $atual['hexDegrade1'] !== $novaCor['hexDegrade1'] ||
            $atual['hexDegrade2'] !== $novaCor['hexDegrade2'] ||
            ($atual['hexDegrade3'] !== ($novaCor['hexDegrade3'] ?? null))
        );

        // 4️⃣ Se não mudou, mantém o mesmo ID
        if (!$mudou) {
            error_log("[CarouselModel] Nenhuma mudança de cor detectada, mantendo o mesmo id_coressubs");
            return true;
        }

        // 5️⃣ Se mudou, verifica se a nova cor já existe
        $check = $this->conn->prepare("
            SELECT id_coressubs FROM coressubs
            WHERE corEspecial = :corEspecial
            AND hexDegrade1 = :hexDegrade1
            AND hexDegrade2 = :hexDegrade2
            AND (hexDegrade3 = :hexDegrade3 OR (hexDegrade3 IS NULL AND :hexDegrade3 IS NULL))
            LIMIT 1
        ");
        $check->execute([
            ':corEspecial' => $novaCor['corEspecial'],
            ':hexDegrade1' => $novaCor['hexDegrade1'],
            ':hexDegrade2' => $novaCor['hexDegrade2'],
            ':hexDegrade3' => $novaCor['hexDegrade3'] ?? null
        ]);
        $existe = $check->fetch(PDO::FETCH_ASSOC);

        if ($existe) {
            $id_coresSubs = $existe['id_coressubs'];
            error_log("[CarouselModel] Cor já existia, usando id_coressubs = {$id_coresSubs}");
        } else {
            // 6️⃣ Cria nova cor
            $insert = $this->conn->prepare("
                INSERT INTO coressubs (corEspecial, hexDegrade1, hexDegrade2, hexDegrade3)
                VALUES (:corEspecial, :hexDegrade1, :hexDegrade2, :hexDegrade3)
            ");
            $insert->execute([
                ':corEspecial' => $novaCor['corEspecial'],
                ':hexDegrade1' => $novaCor['hexDegrade1'],
                ':hexDegrade2' => $novaCor['hexDegrade2'],
                ':hexDegrade3' => $novaCor['hexDegrade3'] ?? null
            ]);
            $id_coresSubs = $this->conn->lastInsertId();
            error_log("[CarouselModel] Nova cor criada com id_coressubs = {$id_coresSubs}");
        }

        // 7️⃣ Atualiza o carrossel com o novo id_coressubs
        $update = $this->conn->prepare("
            UPDATE carousel
            SET id_coressubs = :id_coresSubs
            WHERE id_carousel = :id_carousel
        ");
        $ok = $update->execute([
            ':id_coresSubs' => $id_coresSubs,
            ':id_carousel' => $id_carousel
        ]);

        error_log("[CarouselModel] Atualização de cor concluída para carousel {$id_carousel}");
        return $ok;

    } catch (Exception $e) {
        error_log("[CarouselModel] Erro ao atualizar cores: " . $e->getMessage());
        return false;
    }
}

}
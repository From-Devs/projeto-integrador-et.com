<?php
require_once __DIR__ . '/../../config/database.php';

class Lancamentos {
  private PDO $conn;
  
  public function __construct() {
    $db = new Database();
    $this->conn = $db->Connect();
  }
  
  public function getAll(): array {
    try {
      $sql = "
        SELECT l.id_lancamento, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo, p.img1, p.img2, p.img3, l.imgSelecionada, p.fgPromocao, 
        cs.corEspecial, cs.hexDegrade1, cs.hexDegrade2, cs.hexDegrade3
        FROM lancamentos l 
        JOIN produto p ON  p.id_produto = l.id_produto
        JOIN coressubs cs ON cs.id_coressubs = l.id_coressubs
      ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
            error_log("[Lancamentos] Erro SQL: " . $e->getMessage());
            return [];
    }
  }

    public function Create(array $data): int|false {
        // Validação básica dos dados de entrada
        $corEspecial = $data['corEspecial'] ?? '#FFFFFF';
        $id_produto = $data['id_produto'] ?? null;
        $imgSelecionada = $data['imgSelecionada'] ?? 1; // Usando 1 como valor padrão

        if (!$id_produto) {
            error_log("[Lancamentos] Erro: id_produto ausente para a criação.");
            return false;
        }

        try {
            $this->conn->beginTransaction();

            // 1. Inserir a cor na tabela coressubs
            $stmtCor = $this->conn->prepare("
                INSERT INTO coressubs (corEspecial, hexDegrade1, hexDegrade2, hexDegrade3) 
                VALUES (:cor, :cor, :cor, :cor)
            ");
            // Usamos a corEspecial como padrão para os degrades
            $stmtCor->execute([
                ':cor' => $corEspecial
            ]);
            
            $id_coresSubs = $this->conn->lastInsertId();

            // 2. Inserir o lançamento na tabela lancamentos
            $stmtLanc = $this->conn->prepare("
                INSERT INTO lancamentos (id_produto, id_coresSubs, imgSelecionada)
                VALUES (:id_produto, :id_coresSubs, :imgSelecionada)
            ");

            $stmtLanc->execute([
                ":id_produto"     => $id_produto,
                ":id_coresSubs"   => $id_coresSubs,
                ":imgSelecionada" => $imgSelecionada
            ]);

            $id_lancamento = $this->conn->lastInsertId();

            // Se tudo correu bem, confirma as alterações no banco de dados
            $this->conn->commit();
            return $id_lancamento;

        } catch (\PDOException $e) {
            // Se algo falhou, desfaz todas as operações no banco
            if ($this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            error_log("[Lancamentos] Erro ao criar: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Atualiza o registro em 'coressubs' e, em seguida, em 'lancamentos'.
     */
    public function Update(int $id, array $data): bool {
        // Validação e valores padrão para os dados de entrada
        $corEspecial = $data['corEspecial'] ?? '#FFFFFF';
        $id_produto = (int)($data['id_produto'] ?? 0); // Garante que é um INT
        $imgSelecionada = (int)($data['imgSelecionada'] ?? 1);

        if ($id_produto === 0) {
            error_log("[Lancamentos] Ignorando Update para ID {$id}: id_produto ausente/zero.");
            return false; // Retorna falha para que o Controller saiba que não atualizou.
        }

        try {
            $this->conn->beginTransaction();

            // 1. Buscar o id_coresSubs vinculado ao lançamento
            $stmtBusca = $this->conn->prepare("SELECT id_coresSubs FROM lancamentos WHERE id_lancamento = :id");
            $stmtBusca->execute([':id' => $id]);
            $lancamentoAtual = $stmtBusca->fetch(\PDO::FETCH_ASSOC);

            if (!$lancamentoAtual) {
                // Lançamento não encontrado, falha antes de qualquer alteração
                throw new \Exception("Lançamento não encontrado para atualização.");
            }

            $id_coresSubs = $lancamentoAtual['id_coresSubs'];

            // 2. Atualizar o registro na tabela coressubs
            if ($id_coresSubs) {
                $stmtCor = $this->conn->prepare("
                    UPDATE coressubs 
                    SET corEspecial = :cor, hexDegrade1 = :cor 
                    WHERE id_coresSubs = :id
                ");
                $stmtCor->execute([
                    ':cor' => $corEspecial,
                    ':id'  => $id_coresSubs
                ]);
            } else {
                // Caso o lançamento não tenha uma cor (deve ser criado uma)
                // Isso é um cenário de correção, mas não deve acontecer se o Create for usado
                $stmtCor = $this->conn->prepare("
                    INSERT INTO coressubs (corEspecial, hexDegrade1) VALUES (:cor, :cor)
                ");
                $stmtCor->execute([':cor' => $corEspecial]);
                $id_coresSubs = $this->conn->lastInsertId();
            }

            // 3. Atualizar os dados restantes na tabela lancamentos
            $stmtLanc = $this->conn->prepare("
                UPDATE lancamentos
                SET id_produto = :id_produto, 
                    id_coresSubs = :id_coresSubs, 
                    imgSelecionada = :imgSelecionada
                WHERE id_lancamento = :id
            ");

            $resultado = $stmtLanc->execute([
                ":id"             => $id,
                ":id_produto"     => $id_produto,
                ":id_coresSubs"   => $id_coresSubs,
                ":imgSelecionada" => $imgSelecionada
            ]);

            // Se tudo correu bem, confirma as alterações no banco de dados
            $this->conn->commit();
            return $resultado;

        } catch (\Exception $e) {
            // Captura qualquer exceção (PDOException ou a customizada)
            if ($this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            error_log("[Lancamentos] Erro ao atualizar: " . $e->getMessage());
            return false;
        }
    }

  public function getElementByid(int $id): array {
    try {
      $stmt = $this->conn->prepare("
          SELECT l.id_lancamento, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo, p.img1, p.img2, p.img3, l.imgSelecionada, p.fgPromocao, 
          cs.corEspecial, cs.hexDegrade1, cs.hexDegrade2, cs.hexDegrade3
          FROM lancamentos l 
          JOIN produto p ON  p.id_produto = l.id_produto
          JOIN coressubs cs ON cs.id_coressubs = l.id_coressubs
          WHERE l.id_lancamento = :id
      ");

      $stmt->execute([":id" => $id]);

      return $stmt->fetch(PDO::FETCH_ASSOC);
      
    }catch (PDOException $e) {
        error_log("[Lancamentos] Erro ao buscar: " . $e->getMessage()); 
        return false; 
    }
  }

  public function Remore(int $id): bool {
     try {
            $stmt = $this->conn->prepare("DELETE FROM lancamentos WHERE id_lancamento = :id");
            return $stmt->execute([":id" => $id]);
        } catch (PDOException $e) {
            error_log("[Lancamentos] Erro ao remover: " . $e->getMessage());
            return false;
    }
  }

  public function getAllCoresUnicas(): array {
        try {
            $stmt = $this->conn->query("
                SELECT DISTINCT corEspecial, hexDegrade1, hexDegrade2, hexDegrade3
                FROM coressubs
                ORDER BY corEspecial ASC
            ");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("[Lancamentos] Erro ao buscar cores: " . $e->getMessage());
            return [];
        }
    }
}
<?php
require_once __DIR__ . '/../../config/database.php';

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function getUserById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM usuario WHERE id_usuario = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function testConntx() {
        try {
            $stmt = $this->conn->query("SELECT 1");
            return $stmt ? "✅ Conexão com o banco de dados funcionando!" : "❌ Falha ao executar teste no banco.";
        } catch (PDOException $e) {
            return "❌ Erro de conexão: " . $e->getMessage();
        }
    }    

    public function getAll() {
        $sql = "SELECT * FROM usuario";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function emailExists($email) {
        $sql = "SELECT COUNT(*) FROM usuario where email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function cpfExists($cpf) {
        $sql = "SELECT COUNT(*) FROM usuario WHERE cpf = :cpf";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }    
    
    public function create($data) {
        try {
            if ($this->emailExists($data['email'])) {
                return ["success" => false, "erro" => "E-mail já cadastrado"];
            }

            if ($this->cpfExists($data['cpf'])) {
                return ["success" => false, "message" => "CPF já cadastrado"];
            }
    
            // 2️⃣ Garante que a senha seja hash
            if (!empty($data['senha'])) {
                $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);
            } else {
                return ["success" => false, "message" => "Senha obrigatória"];
            }

            $data['foto'] = $data['foto'] ?? '';
            $data['id_endereco'] = $data['id_endereco'] ?? null;
    
            // 4️⃣ Prepara a query
            $sql = "INSERT INTO usuario (nome, email, telefone, cpf, data_nascimento, senha, tipo, foto, id_endereco)
                    VALUES (:nome, :email, :telefone, :cpf, :data_nascimento, :senha, :tipo, :foto, :id_endereco)";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':nome', $data['nome']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':telefone', $data['telefone']);
            $stmt->bindParam(':cpf', $data['cpf']);
            $stmt->bindParam(':data_nascimento', $data['data_nascimento']);
            $stmt->bindParam(':senha', $data['senha']);
            $stmt->bindParam(':tipo', $data['tipo']);
            $stmt->bindParam(':foto', $data['foto']);
            $stmt->bindParam(':id_endereco', $data['id_endereco']);

            if ($stmt->execute()) {
                return ["success" => true, "message" => "Usuário criado com sucesso!"];
            } else {
                $error = $stmt->errorInfo();
                return ["success" => false, "message" => "Erro no INSERT: " . $error[2]];
            }
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Erro de conexão ou query: " . $e->getMessage()];
        }
    }

    public function deleteById($id) {
        $sql = "DELETE FROM usuario WHERE id_usuario = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateUser($id, $data) {
        $sql = "UPDATE usuario 
                SET nome = :nome, 
                    email = :email, 
                    telefone = :telefone, 
                    cpf = :cpf, 
                    data_nascimento = :data_nascimento, 
                    tipo = :tipo, 
                    foto = :foto, 
                    id_endereco = :id_endereco 
                WHERE id_usuario = :id";
    
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':nome', $data['nome']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':telefone', $data['telefone']);
        $stmt->bindParam(':cpf', $data['cpf']);
        $stmt->bindParam(':data_nascimento', $data['data_nascimento']);
        $stmt->bindParam(':tipo', $data['tipo']);
        $stmt->bindParam(':foto', $data['foto']);
        $stmt->bindParam(':id_endereco', $data['id_endereco']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if (!$stmt->execute()) {
            $error = $stmt->errorInfo();
            return ["success" => false, "error" => $error[2]];
        }

        return ["success" => true, "rows" => $stmt->rowCount()];
    }

    // 🔹 Função corrigida para upload direto
    public function salvarImagemFile($file) {
        if ($file && $file['error'] === UPLOAD_ERR_OK) {
            $nomeArquivo = time() . '_' . basename($file['name']);
            $caminhoDestino = __DIR__ . '/../../public/uploads/' . $nomeArquivo;

            if (!is_dir(__DIR__ . '/../../public/uploads')) {
                mkdir(__DIR__ . '/../../public/uploads', 0777, true);
            }

            if (move_uploaded_file($file['tmp_name'], $caminhoDestino)) {
                return 'public/uploads/' . $nomeArquivo;
            }
        }
        return null;
    }

    public function updateSenha($id, $novoHash) {
        $sql = "UPDATE usuario SET senha = :senha WHERE id_usuario = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':senha', $novoHash);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function saveOrUpdateEndereco($id_usuario, $dadosEndereco) {
        try {
            $stmt = $this->conn->prepare("SELECT id_endereco FROM usuario WHERE id_usuario = ?");
            $stmt->execute([$id_usuario]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$usuario) {
                return ["success" => false, "message" => "Usuário não encontrado"];
            }
    
            if ($usuario['id_endereco']) {
                $sql = "UPDATE Endereco 
                        SET tipoLogradouro=:tipoLogradouro, estado=:estado, cidade=:cidade, bairro=:bairro, 
                            rua=:rua, numero=:numero, cep=:cep, complemento=:complemento
                        WHERE id_endereco=:id_endereco";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':tipoLogradouro' => $dadosEndereco['tipoLogradouro'],
                    ':estado' => $dadosEndereco['estado'],
                    ':cidade' => $dadosEndereco['cidade'],
                    ':bairro' => $dadosEndereco['bairro'],
                    ':rua' => $dadosEndereco['rua'],
                    ':numero' => $dadosEndereco['numero'],
                    ':cep' => $dadosEndereco['cep'],
                    ':complemento' => $dadosEndereco['complemento'] ?? null,
                    ':id_endereco' => $usuario['id_endereco']
                ]);
            } else {
                $sql = "INSERT INTO Endereco (tipoLogradouro, estado, cidade, bairro, rua, numero, cep, complemento) 
                        VALUES (:tipoLogradouro, :estado, :cidade, :bairro, :rua, :numero, :cep, :complemento)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':tipoLogradouro' => $dadosEndereco['tipoLogradouro'],
                    ':estado' => $dadosEndereco['estado'],
                    ':cidade' => $dadosEndereco['cidade'],
                    ':bairro' => $dadosEndereco['bairro'],
                    ':rua' => $dadosEndereco['rua'],
                    ':numero' => $dadosEndereco['numero'],
                    ':cep' => $dadosEndereco['cep'],
                    ':complemento' => $dadosEndereco['complemento'] ?? null,
                ]);
                $id_endereco = $this->conn->lastInsertId();
    
                $sqlUsuario = "UPDATE Usuario SET id_endereco=:id_endereco WHERE id_usuario=:id_usuario";
                $stmtUsuario = $this->conn->prepare($sqlUsuario);
                $stmtUsuario->execute([
                    ':id_endereco' => $id_endereco,
                    ':id_usuario' => $id_usuario
                ]);
            }
    
            return ["success" => true, "message" => "Endereço salvo com sucesso!"];
        } catch (Exception $e) {
            return ["success" => false, "message" => "Erro: " . $e->getMessage()];
        }
    }

    public function sendAssociadoRequest($id, $data) {
        try {
            $this->conn->beginTransaction();
    
            $sql = "UPDATE Usuario
                    SET nome = :nome,
                        email = :email,
                        telefone = :telefone,
                        cpf = :cpf,
                        data_nascimento = :data_nascimento,
                        foto = :foto
                    WHERE id_usuario = :id";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nome', $data['nome']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':telefone', $data['telefone']);
            $stmt->bindParam(':cpf', $data['cpf']);
            $stmt->bindParam(':data_nascimento', $data['data_nascimento']);
            $stmt->bindParam(':foto', $data['foto']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $sql2 = "INSERT INTO SolicitacaoDeAssociado (id_usuario, sobreProdutos)
                        VALUES (:id, :sobreProdutos)
                        ON DUPLICATE KEY UPDATE
                        sobreProdutos = VALUES(sobreProdutos)";
            
            $stmt2 = $this->conn->prepare($sql2);
            $stmt2->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt2->bindParam(':sobreProdutos', $data['sobreProdutos']);
            $stmt2->execute();
    
            $this->conn->commit();
            return ["success" => true, "message" => "Dados e solicitação enviados com sucesso!"];
        } catch (Exception $e) {
            $this->conn->rollBack();
            return ["success" => false, "error" => $e->getMessage()];
        }
        }
    
}
?>

-- Estrutura usuarios
 
CREATE TABLE endereco( 
id_endereco INT AUTO_INCREMENT PRIMARY KEY,
tipoLogradouro VARCHAR(255) NOT NULL,
estado VARCHAR(255) NOT NULL,
cidade VARCHAR(255) NOT NULL,
bairro VARCHAR(255) NOT NULL,
rua VARCHAR(255) NOT NULL,
numero VARCHAR(255) NOT NULL,
cep VARCHAR(9) NOT NULL,
complemento VARCHAR(255)
);
 
CREATE TABLE usuario (
id_usuario INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL UNIQUE,
telefone VARCHAR(15),
cpf VARCHAR(14) UNIQUE,
data_nascimento DATE,
senha VARCHAR(255) NOT NULL,
tipo ENUM('Cliente', 'Associado') NOT NULL,
foto VARCHAR(100),
id_endereco INT,
FOREIGN KEY (id_endereco) REFERENCES endereco(id_endereco)
);
 
CREATE TABLE administrador( 
id_admin INT AUTO_INCREMENT PRIMARY KEY,
senha VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL
);
 
-- Personalização e categorias
 
CREATE TABLE cores( 
id_cores INT AUTO_INCREMENT PRIMARY KEY,
corPrincipal VARCHAR(7) NOT NULL,
hexDegrade1 VARCHAR(7) NOT NULL,
hexDegrade2 VARCHAR(7) NOT NULL
);
 
CREATE TABLE coressubs( 
id_coresSubs INT AUTO_INCREMENT PRIMARY KEY,
corEspecial VARCHAR(7) NOT NULL,
hexDegrade1 VARCHAR(7),
hexDegrade2 VARCHAR(7),
hexDegrade3 VARCHAR(7) 
);
 
CREATE TABLE categoria(
id_categoria INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(255) NOT NULL
);
 
CREATE TABLE subcategoria(
id_subCategoria INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(255),
id_categoria INT,
  FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
);
 
-- Produto, avaliações, status
 
CREATE TABLE produto(
id_produto INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(255) NOT NULL,
marca VARCHAR(255) NOT NULL,
descricaoBreve VARCHAR(255) NOT NULL,
descricaoTotal TEXT NOT NULL,
tamanho VARCHAR(30) DEFAULT NULL,
preco DECIMAL(10,2) NOT NULL,
precoPromo DECIMAL(10,2),
fgPromocao BOOLEAN,
qtdEstoque INT NOT NULL,
qtdVendida INT DEFAULT 0,
img1 VARCHAR(255) NOT NULL,
img2 VARCHAR(255) NOT NULL,
img3 VARCHAR(255),
id_subCategoria INT,
id_cores INT,
id_associado INT,
FOREIGN KEY (id_subCategoria) REFERENCES subcategoria(id_subCategoria),
FOREIGN KEY (id_cores) REFERENCES cores(id_cores),
FOREIGN KEY (id_associado) REFERENCES usuario(id_usuario)
);
 
CREATE TABLE status(
id_status INT AUTO_INCREMENT PRIMARY KEY, 
tipoStatus VARCHAR(255) NOT NULL
);
 
CREATE TABLE avaliacoes (
  id_avaliacao INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  id_produto INT NOT NULL,
  nota INT NOT NULL CHECK (nota BETWEEN 1 AND 5),
  comentario TEXT DEFAULT NULL,
  data_avaliacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
  FOREIGN KEY (id_produto) REFERENCES produto(id_produto)
);
 
-- Carrinho, lista de desejos e pedidos
 
CREATE TABLE listadesejos(
id_usuario INT NOT NULL,
id_produto INT NOT NULL,
dataAdd DATETIME DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id_usuario, id_produto),
FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
  ON DELETE CASCADE,
FOREIGN KEY (id_produto) REFERENCES produto(id_produto)
);
 
CREATE TABLE carrinho (
id_carrinho INT AUTO_INCREMENT PRIMARY KEY,
id_usuario INT NOT NULL,
data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
data_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);
 
CREATE TABLE produtocarrinho(
id_prodCarrinho INT AUTO_INCREMENT PRIMARY KEY,
id_carrinho INT NOT NULL,
id_produto INT NOT NULL,
qntProduto INT NOT NULL DEFAULT 1,
FOREIGN KEY (id_carrinho) REFERENCES carrinho(id_carrinho)
  ON DELETE CASCADE,
FOREIGN KEY (id_produto) REFERENCES produto(id_produto)
);
 
CREATE TABLE pedido (
  id_pedido INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  id_status INT NOT NULL,
  dataPedido DATETIME DEFAULT CURRENT_TIMESTAMP,
  precoTotal DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
  FOREIGN KEY (id_status) REFERENCES status(id_status)
);
ALTER TABLE et_com.pedido ADD dataEntrega DATETIME NULL;

ALTER TABLE et_com.pedido ADD id_status_pagamento int(11) NULL;
ALTER TABLE et_com.pedido ADD CONSTRAINT pedido_statuspagamento_FK FOREIGN KEY (id_status_pagamento) REFERENCES et_com.statuspagamento(id_status_pagamento);
 
CREATE TABLE produtopedido( 
id_produtoPedido INT PRIMARY KEY AUTO_INCREMENT, 
id_pedido INT NOT NULL,
id_produto INT NOT NULL, 
quantidade INT NOT NULL,
precoUnitario DECIMAL(10,2) NOT NULL,
FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido)
  ON DELETE CASCADE, 
FOREIGN KEY (id_produto) REFERENCES produto(id_produto) 
);
 
-- Relatórios
 
CREATE TABLE historicodevenda (
    id_historicoDeVenda INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT NOT NULL,
    id_usuario INT NOT NULL,
    nome_cliente VARCHAR(255),
    status VARCHAR(100),
    data_pedido DATETIME NOT NULL,
    total_pedido DECIMAL(10,2) NOT NULL,
    qtd_itens INT NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido)
        ON DELETE CASCADE,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
        ON DELETE CASCADE
);
 
CREATE TABLE receitaporproduto(
recProd_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_historicoDeVenda INT,
FOREIGN KEY (id_historicoDeVenda) REFERENCES historicodevenda(id_historicoDeVenda)
);
 
CREATE TABLE relatoriodereceitas(
relaRec_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
lucro DECIMAL(10,2) NOT NULL,
prejuizo DECIMAL(10,2) NOT NULL,
id_historicoDeVenda INT,
FOREIGN KEY (id_historicoDeVenda) REFERENCES historicodevenda(id_historicoDeVenda)
);
 
CREATE TABLE relatorios(
relatorios_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
recProd_id INT NOT NULL,
relaRec_id INT NOT NULL,
FOREIGN KEY (recProd_id) REFERENCES receitaporproduto(recProd_id),
FOREIGN KEY (relaRec_id) REFERENCES relatoriodereceitas(relaRec_id)
);
 
-- Personalização
 
CREATE TABLE lancamentos(
id_lancamento INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
imgSelecionada INT NOT NULL,
id_produto INT NOT NULL,
id_coresSubs INT,
FOREIGN KEY (id_produto) REFERENCES produto(id_produto),
FOREIGN KEY (id_coresSubs) REFERENCES coressubs(id_coresSubs)
);
 
CREATE TABLE proddestaque(
id_prodDestaque INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
cor1 VARCHAR(7) NOT NULL,
cor2 VARCHAR(7) NOT NULL,
corSombra VARCHAR(7) NOT NULL,
id_produto INT,
FOREIGN KEY (id_produto) REFERENCES produto(id_produto)
);
 
CREATE TABLE carousel(
id_carousel INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_produto INT NOT NULL,
id_coresSubs INT,
posicao INT NOT NULL UNIQUE,
FOREIGN KEY (id_produto) REFERENCES produto(id_produto),
FOREIGN KEY (id_coresSubs) REFERENCES coressubs(id_coresSubs)
);
 
-- Associado
 
CREATE TABLE solicitacaodeassociado (
    id_solicitacao INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL UNIQUE,
    sobreProdutos TEXT,
motivoDoRecuso VARCHAR(500),
    CONSTRAINT fk_usuario FOREIGN KEY (id_usuario) 
        REFERENCES usuario(id_usuario)
        ON DELETE CASCADE
);
 
-- Triggers
 
DELIMITER //
CREATE TRIGGER trg_registra_historico_venda
AFTER UPDATE ON pedido
FOR EACH ROW
BEGIN
    IF NEW.id_status = 4 THEN
        IF NOT EXISTS (
            SELECT 1 FROM historicodevenda
            WHERE id_pedido = NEW.id_pedido
        ) THEN
            INSERT INTO historicodevenda (
                id_pedido, id_usuario, nome_cliente, status, data_pedido, total_pedido, qtd_itens
            )
            SELECT 
                p.id_pedido,
                p.id_usuario,
                u.nome,
                s.tipoStatus,
                p.dataPedido,
                SUM(pp.quantidade * pp.precoUnitario),
                COUNT(pp.id_produtoPedido)
            FROM pedido p
            JOIN usuario u ON u.id_usuario = p.id_usuario
            JOIN status s ON s.id_status = p.id_status
            JOIN produtopedido pp ON pp.id_pedido = p.id_pedido
            WHERE p.id_pedido = NEW.id_pedido
            GROUP BY p.id_pedido, p.id_usuario, u.nome, p.dataPedido, s.tipoStatus;
        END IF;
    END IF;
END //
DELIMITER ;
 
DELIMITER //
CREATE TRIGGER atualizar_estoque_apos_pedido
AFTER INSERT ON produtopedido
FOR EACH ROW
BEGIN
    UPDATE produto
    SET qtdEstoque = qtdEstoque - NEW.quantidade
    WHERE id_produto = NEW.id_produto;
END //
DELIMITER ;
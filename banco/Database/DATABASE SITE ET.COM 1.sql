-- Estrutura Usuarios

CREATE TABLE Endereco( 
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

CREATE TABLE Usuario (
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
	FOREIGN KEY (id_endereco) REFERENCES Endereco(id_endereco)
);

CREATE TABLE Administrador( 
	id_admin INT AUTO_INCREMENT PRIMARY KEY,
	senha VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL
);

-- Personalização e categorias

CREATE TABLE Cores( 
	id_cores INT AUTO_INCREMENT PRIMARY KEY,
	corPrincipal VARCHAR(7) NOT NULL,
	hexDegrade1 VARCHAR(7) NOT NULL,
	hexDegrade2 VARCHAR(7) NOT NULL
);

CREATE TABLE CoresSubs( 
	id_coresSubs INT AUTO_INCREMENT PRIMARY KEY,
	corEspecial VARCHAR(7) NOT NULL,
	hexDegrade1 VARCHAR(7),
	hexDegrade2 VARCHAR(7),
	hexDegrade3 VARCHAR(7) 
);

CREATE TABLE Categoria(
	id_categoria INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(255) NOT NULL
);

CREATE TABLE SubCategoria(
	id_subCategoria INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(255),
	id_categoria INT,
 	FOREIGN KEY (id_categoria) REFERENCES Categoria(id_categoria)
);

-- Produto, estoque e destaque

CREATE TABLE Produto(
	id_produto INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(255) NOT NULL,
	marca VARCHAR(255) NOT NULL,
	descricaoBreve VARCHAR(255) NOT NULL,
	descricaoTotal VARCHAR(255) NOT NULL,
	preco DECIMAL(10,2) NOT NULL,
	precoPromo DECIMAL(10,2),
	qtdEstoque int NOT NULL,
	img1 VARCHAR(255),
	img2 VARCHAR(255),
	img3 VARCHAR(255),
	id_subCategoria INT,
	id_cores INT,
	id_associado INT,
	FOREIGN KEY (id_subCategoria) REFERENCES SubCategoria(id_subCategoria),
	FOREIGN KEY (id_cores) REFERENCES Cores(id_cores),
	FOREIGN KEY (id_associado) REFERENCES Usuario(id_usuario)
);

CREATE TABLE Estoque(
	id_estoque INT AUTO_INCREMENT PRIMARY KEY,
	qnt INT NOT NULL,
	id_produto INT NOT NULL,
	FOREIGN KEY (id_produto) REFERENCES Produto(id_produto)
);

-- Carrinho, desejos e pedidos

CREATE TABLE ListaDesejos(
	id_listaDesejos INT AUTO_INCREMENT PRIMARY KEY,
	dataAdd DATE NOT NULL,
	id_usuario INT NOT NULL,
	id_produto INT NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario),
	FOREIGN KEY (id_produto) REFERENCES Produto(id_produto)
);

CREATE TABLE Carrinho(
	id_carrinho INT AUTO_INCREMENT PRIMARY KEY,
	cep VARCHAR(9) NOT NULL,
	id_usuario INT NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
);

CREATE TABLE ProdutoCarrinho(
	id_prodCarrinho INT AUTO_INCREMENT PRIMARY KEY,
	id_carrinho INT NOT NULL,
	id_produto INT NOT NULL,
	qntProduto INT NOT NULL,
	FOREIGN KEY (id_carrinho) REFERENCES Carrinho(id_carrinho),
	FOREIGN KEY (id_produto) REFERENCES Produto(id_produto)
);

-- Pedidos e histórico

CREATE TABLE Status(
	id_status INT AUTO_INCREMENT PRIMARY KEY,	
	tipoStatus VARCHAR(255) NOT NULL
);

CREATE TABLE Pedido(
	id_pedido INT AUTO_INCREMENT PRIMARY KEY,
	id_usuario INT NOT NULL,
	id_carrinho INT NOT NULL,
	id_status INT NOT NULL,
	dataPedido DATETIME NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario),
	FOREIGN KEY (id_carrinho) REFERENCES Carrinho(id_carrinho),
	FOREIGN KEY (id_status) REFERENCES Status(id_status)
);

CREATE TABLE HistoricoDeVenda(
	id_historicoDeVenda INT AUTO_INCREMENT PRIMARY KEY,
	id_pedido INT,
	FOREIGN KEY (id_pedido) REFERENCES Pedido(id_pedido)
);

-- Relatórios

CREATE TABLE ReceitaPorProduto(
	recProd_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_historicoDeVenda INT,
	FOREIGN KEY (id_historicoDeVenda) REFERENCES HistoricoDeVenda(id_historicoDeVenda)
);

CREATE TABLE RelatorioDeReceitas(
	relaRec_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	lucro float NOT NULL,
	prejuizo float NOT NULL,
	id_historicoDeVenda INT,
	FOREIGN KEY (id_historicoDeVenda) REFERENCES HistoricoDeVenda(id_historicoDeVenda)
);

CREATE TABLE Relatorios(
	relatorios_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	recProd_id INT NOT NULL,
	relaRec_id INT NOT NULL,
	FOREIGN KEY (recProd_id) REFERENCES ReceitaPorProduto(recProd_id),
	FOREIGN KEY (relaRec_id) REFERENCES RelatorioDeReceitas(relaRec_id)
);

-- Personalização

CREATE TABLE Lancamentos(
	id_lancamento INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	corPrincipalSub INT,
	id_produto INT NOT NULL,
	FOREIGN KEY (id_produto) REFERENCES Produto(id_produto)
);

CREATE TABLE ProdDestaque(
	id_prodDestaque INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	cor1 INT NOT NULL,
	cor2 INT NOT NULL,
	id_produto INT,
	FOREIGN KEY (id_produto) REFERENCES Produto(id_produto)
);

CREATE TABLE Carousel(
	id_carousel INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_produto INT NOT NULL,
	id_coresSubs INT,
	FOREIGN KEY (id_produto) REFERENCES Produto(id_produto),
	FOREIGN KEY (id_coresSubs) REFERENCES CoresSubs(id_coresSubs)
);

CREATE TABLE Personalizacao(
	id_personalizacao INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_lancamento INT NOT NULL,
	id_prodDestaque INT NOT NULL,
	id_carousel INT NOT NULL,
	FOREIGN KEY (id_lancamento) REFERENCES Lancamentos(id_lancamento),
	FOREIGN KEY (id_prodDestaque) REFERENCES ProdDestaque(id_prodDestaque),
	FOREIGN KEY (id_carousel) REFERENCES Carousel(id_carousel)
);

-- Associado

CREATE TABLE SolicitacaoDeAssociado (
    id_solicitacao INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL UNIQUE,
    sobreProdutos TEXT,
    CONSTRAINT fk_usuario FOREIGN KEY (id_usuario) 
        REFERENCES Usuario(id_usuario)
        ON DELETE CASCADE
) ENGINE=InnoDB;

 -- Triggers
 -- Atualizar Estoque
 
-- DELIMITER //

-- CREATE TRIGGER AtualizarEstoqueApósPedido
-- AFTER INSERT ON Pedido
-- FOR EACH ROW
-- BEGIN
--     DECLARE v_qnt_produto int;

--     SELECT qntProduto INTO v_qnt_produto
--     FROM Carrinho
--     WHERE id_carrinho = NEW.id_carrinho;

--     UPDATE Estoque
--     SET qnt = qnt - v_qnt_produto
--     WHERE id_produto = (SELECT id_produto FROM Produto WHERE id_produto = NEW.id_carrinho);
-- END //

-- DELIMITER ;

 -- Atualizar Status do pedido

-- DELIMITER //

-- CREATE TRIGGER AtualizarStatusPedido
-- AFTER INSERT ON Pedido
-- FOR EACH ROW
-- BEGIN
--     DECLARE v_id_status INT;

--     SELECT id_status INTO v_id_status
--     FROM Status
--     WHERE tipoStatus = 'Em Processamento';

--     UPDATE Pedido
--     SET id_status = v_id_status
--     WHERE id_pedido = NEW.id_pedido;
-- END //

-- DELIMITER ;

-- show triggers;
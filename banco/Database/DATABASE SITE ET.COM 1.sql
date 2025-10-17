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

-- Produto, avaliações, status

CREATE TABLE Produto(
	id_produto INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(255) NOT NULL,
	marca VARCHAR(255) NOT NULL,
	descricaoBreve VARCHAR(255) NOT NULL,
	descricaoTotal TEXT NOT NULL,
	tamanho VARCHAR(30) DEFAULT NULL,
	preco DECIMAL(10,2) NOT NULL,
	precoPromo DECIMAL(10,2),
	fgPromocao boolean,
	qtdEstoque INT NOT NULL,
	qtdVendida INT DEFAULT 0,
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

CREATE TABLE Status(
	id_status INT AUTO_INCREMENT PRIMARY KEY,	
	tipoStatus VARCHAR(255) NOT NULL
);

CREATE TABLE Avaliacoes (
  id_avaliacao INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  id_produto INT NOT NULL,
  nota INT NOT NULL CHECK (`nota` between 1 and 5),
  comentario text DEFAULT NULL,
  data_avaliacao timestamp NOT NULL DEFAULT current_timestamp(),
  FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario),
  FOREIGN KEY (id_produto) REFERENCES Produto(id_produto)
);

-- Carrinho, lista de desejos e pedidos

CREATE TABLE ListaDesejos(
	id_usuario INT NOT NULL,
	id_produto INT NOT NULL,
	dataAdd DATETIME DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id_usuario, id_produto),

	FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
		ON DELETE CASCADE,
	FOREIGN KEY (id_produto) REFERENCES Produto(id_produto)
);

CREATE TABLE Carrinho (
	id_carrinho INT AUTO_INCREMENT PRIMARY KEY,
	id_usuario INT NOT NULL,
	data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
	data_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
);

CREATE TABLE ProdutoCarrinho(
	id_prodCarrinho INT AUTO_INCREMENT PRIMARY KEY,
	id_carrinho INT NOT NULL,
	id_produto INT NOT NULL,
	qntProduto INT NOT NULL DEFAULT 1,

	FOREIGN KEY (id_carrinho) REFERENCES Carrinho(id_carrinho)
		ON DELETE CASCADE,
	FOREIGN KEY (id_produto) REFERENCES Produto(id_produto)
);

CREATE TABLE Pedido (
  id_pedido INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  id_status INT NOT NULL,
  dataPedido DATETIME DEFAULT CURRENT_TIMESTAMP,
  precoTotal DECIMAL(10, 2) NOT NULL,

  FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario),
  FOREIGN KEY (id_status) REFERENCES Status(id_status)
);

CREATE TABLE ProdutoPedido( 
	id_produtoPedido INT PRIMARY KEY AUTO_INCREMENT, 
	id_pedido INT NOT NULL,
	id_produto INT NOT NULL, 
	quantidade INT NOT NULL,
	precoUnitario DECIMAL(10,2) NOT NULL,
	FOREIGN KEY (id_pedido) REFERENCES Pedido(id_pedido)
		ON DELETE CASCADE, 
	FOREIGN KEY (id_produto) REFERENCES Produto(id_produto) 
);

-- Relatórios

CREATE TABLE HistoricoDeVenda (
    id_historicoDeVenda INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT NOT NULL,
    id_usuario INT NOT NULL,
    nome_cliente VARCHAR(255),
    status VARCHAR(100),
    data_pedido DATETIME NOT NULL,
    total_pedido DECIMAL(10,2) NOT NULL,
    qtd_itens INT NOT NULL,
    
    FOREIGN KEY (id_pedido) REFERENCES Pedido(id_pedido)
        ON DELETE CASCADE,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
        ON DELETE CASCADE
);

CREATE TABLE ReceitaPorProduto(
	recProd_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_historicoDeVenda INT,
	FOREIGN KEY (id_historicoDeVenda) REFERENCES HistoricoDeVenda(id_historicoDeVenda)
);

CREATE TABLE RelatorioDeReceitas(
	relaRec_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	lucro DECIMAL(10,2) NOT NULL,
	prejuizo DECIMAL(10,2) NOT NULL,
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
	posicao INT NOT NULL UNIQUE,
	FOREIGN KEY (id_produto) REFERENCES Produto(id_produto),
	FOREIGN KEY (id_coresSubs) REFERENCES CoresSubs(id_coresSubs)
);

-- Associado

CREATE TABLE SolicitacaoDeAssociado (
    id_solicitacao INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL UNIQUE,
    sobreProdutos TEXT,
	motivoDoRecuso varchar(500),
    CONSTRAINT fk_usuario FOREIGN KEY (id_usuario) 
        REFERENCES Usuario(id_usuario)
        ON DELETE CASCADE
);

 -- Triggers

 -- Criar histórico de venda automaticamente quando pedido ser concluído
DELIMITER //
CREATE TRIGGER trg_registra_historico_venda
AFTER UPDATE ON Pedido
FOR EACH ROW
BEGIN
    IF NEW.id_status = 4 THEN
        IF NOT EXISTS (
            SELECT 1 FROM HistoricoDeVenda
            WHERE id_pedido = NEW.id_pedido
        ) THEN
            INSERT INTO HistoricoDeVenda (
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
            FROM Pedido p
            JOIN Usuario u ON u.id_usuario = p.id_usuario
            JOIN Status s ON s.id_status = p.id_status
            JOIN ProdutoPedido pp ON pp.id_pedido = p.id_pedido
            WHERE p.id_pedido = NEW.id_pedido
            GROUP BY p.id_pedido, p.id_usuario, u.nome, p.dataPedido, s.tipoStatus;
        END IF;
    END IF;
END //
DELIMITER ;

 -- Atualizar Estoque

DELIMITER //
CREATE TRIGGER AtualizarEstoqueAposPedido
AFTER INSERT ON ProdutoPedido
FOR EACH ROW
BEGIN
    UPDATE Produto
    SET qtdEstoque = qtdEstoque - NEW.quantidade
    WHERE id_produto = NEW.id_produto;
END //
DELIMITER ;
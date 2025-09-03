-- Categorias Gerais

INSERT INTO Categoria (nome)
VALUES
('Maquiagem'),
('Perfume'),
('SkinCare'),
('Cabelo'),
('Eletrônicos'),
('Corporal');

-- Subcategoria de Maquiagem

INSERT INTO SubCategoria (nome, id_categoria)
VALUES
('Pele', 1),
('Olhos', 1),
('Boca', 1),
('Sombrancelhas', 1);

-- Subcategoria de Perfume

INSERT INTO SubCategoria (nome, id_categoria)
VALUES
('Feminino', 2),
('Masculino', 2),
('Unissex', 2);

-- Subcategoria de SkinCare

INSERT INTO SubCategoria (nome, id_categoria)
VALUES
('Limpeza', 3),
('Esfoliação', 3),
('Hidratação', 3),
('Máscara', 3),
('Protetor Solar', 3),
('Especiais', 3);

-- Subcategoria de Cabelo

INSERT INTO SubCategoria (nome, id_categoria)
VALUES
('Dia-a-dia', 4),
('Tratamentos', 4),
('Estilização', 4),
('Especiais', 4),
('Acessórios', 4);

-- Subcategoria de Eletrônicos

INSERT INTO SubCategoria (nome, id_categoria)
VALUES
('Cabelo', 5),
('Pincel', 5),
('Esponja', 5);

-- Subcategoria de Corporal

INSERT INTO SubCategoria (nome, id_categoria)
VALUES
('Body Splash', 6),
('Óleos', 6),
('Cremes', 6),
('Protetores', 6);

INSERT INTO `cores`(`corPrincipal`, `hexDegrade1`, `hexDegrade2`)
VALUES
('#3E7FD9','#133285','#3F7FD9'),
('#31BADA','#00728C','#31BADA'),
('#DBA980','#72543A','#E4B186'),
('#D2936A','#6C4A34','#D29065');

-- Hidratante Corporal Milk

INSERT INTO `produto`(`nome`, `marca`, `descricaoBreve`, `descricaoTotal`, `preco`, `precoPromo`, `imagem`, `id_subCategoria`, `id_cores`, `id_associado`)
VALUES
('Hidratante Corporal Milk','Nivea','Descrição breve','Descrição total',29.90,19.90,'milk.png',10,1,2),
('Body Splash Biscoito ou Bolacha','O Boticário','Descrição breve','Descrição total',29.90,19.90,'biscoito.png',22,2,2),
('Base Líquida Efeito Matte','Vult','Descrição breve','Descrição total',29.90,19.90,'vult.png',1,3,2),
('Colonia Coffe Man','O Boticário','Descrição breve','Descrição total',29.90,19.90,'coffe.png',6,4,2);
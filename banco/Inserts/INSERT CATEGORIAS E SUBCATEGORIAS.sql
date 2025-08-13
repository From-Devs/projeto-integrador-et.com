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
('Sobrancelhas', 1);

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

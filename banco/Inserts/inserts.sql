-- Categorias Gerais

INSERT INTO Categoria (id_categoria, nome)
VALUES
(1, 'Maquiagem'),
(2, 'Perfume'),
(3, 'SkinCare'),
(4, 'Cabelo'),
(5, 'Utensílios'),
(6, 'Corporal');

-- Subcategoria de Maquiagem

INSERT INTO SubCategoria (id_subCategoria, nome, id_categoria)
VALUES
(1, 'Pele', 1),
(2, 'Olhos', 1),
(3, 'Boca', 1),
(4, 'Sombrancelhas', 1);

-- Subcategoria de Perfume

INSERT INTO SubCategoria (id_subCategoria, nome, id_categoria)
VALUES
(5, 'Feminino', 2),
(6, 'Masculino', 2),
(7, 'Infantil', 2 ),
(8, 'Body Splash', 2);

-- Subcategoria de SkinCare

INSERT INTO SubCategoria (id_subCategoria, nome, id_categoria)
VALUES
(9, 'Limpeza facial', 3),
(10, 'Esfoliantes', 3),
(11, 'Hidratante', 3),
(12, 'Máscaras', 3),
(13, 'Protetor Solar', 3),
(14, 'Tratamentos', 3);

-- Subcategoria de Cabelo

INSERT INTO SubCategoria (id_subCategoria, nome, id_categoria)
VALUES
(15, 'Dia-a-dia', 4),
(16, 'Tratamentos', 4),
(17, 'Estilização', 4),
(18, 'Acessórios', 4);

-- Subcategoria de Eletrônicos

INSERT INTO SubCategoria (id_subCategoria, nome, id_categoria)
VALUES
(19, 'Cabelo', 5),
(20, 'Maquiagem', 5),
(21, 'Unhas', 5),
(22, 'Cuidados Faciais', 5);


-- Subcategoria de Corporal

INSERT INTO SubCategoria (id_subCategoria, nome, id_categoria)
VALUES
(23, 'Hidratantes e Cremes', 6),
(24, 'Óleos Corporais', 6),
(25, 'Protetores', 6),
(26, 'Esfoliantes', 6),
(27, 'Tratamentos Específicos', 6);

INSERT INTO Status (`tipoStatus`) VALUES 
('Aguardando Confirmação'),
('Em Andamento'),
('Enviado'),
('Concluído'),
('Cancelado'),
('Devolvido');


-- Conta ADM

INSERT INTO administrador (email, senha)
VALUES ('admin@admin.com','Adm123');
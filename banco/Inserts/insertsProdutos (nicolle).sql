
INSERT INTO usuario (id_usuario,nome,email,telefone,cpf,data_nascimento,senha,tipo,foto,id_endereco)
VALUES 
--(2,'Ozzy Osbourne','ozzyosbourne@gmail.com','(67) 66666-6666','666.666.666-66','1948-12-03','morcego','Associado',null,null),                   
(3,'Eliana Giardini','elianagiardini@gmail.com','(21) 99384-7383','111.111.111-11','1990-06-30','associado','Associado',null,null),
(4,'Michael Rusbad','rusbejackson@gmail.com','(11) 99823-6372','222.222.222-22','2002-09-24','associado','Associado',null,null),          
(5,'Viviane Gonçalves','vivgonca@gmail.com','(67) 99182-8272','333.333.333-33','1999-07-19','associado','Associado',null,null),             
(6,'Maiara Lima','maytheforcebwu@gmail.com','(49) 99272-3729','444.444.444-44','2003-11-01','associado','Associado',null,null),
(7,'Adriana de Moura','adrimourana@outlook.com','(62) 99373-3738','555.555.555-55','1962-02-21','associado','Associado',null,null),
(8,'Bruna Araripe','brunararipe@gmail.com','(68) 99383-8337','777.777.777-77','1987-05-23','associado','Associado',null,null),
(9,'Roberta da Silva Pereira','robertinhap@outlook.com','(27) 99272-4641','888.888.888-88','2000-01-17','associado','Associado',null,null);

		-- Ambos eu cadastrei pelo site para a senha ser criptografada



----Obsevação: <<TODOS>> os produtos estão inseridos entre associados do id 2, 3, 4, 5 e 6.
--------------- POR FAVOR, ATENTEM-SE AOS IDs!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


--------------------OS PRODUTOS QUE COLOQUEI O NOME AO LADO SÃO OS QUE JÁ ESTÃO CADASTRADOS NO BANCO



-- INSERTS JÁ REALIZADOS:

--#region Milk (Eliana)
INSERT INTO Cores(id_cores, corPrincipal, hexDegrade1, hexDegrade2)
VALUES
(1,'#133285','#1256b5','#5394ee');

INSERT INTO Produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES
('Hidratante Corporal Milk','Nivea','400ml',
'Loção Hidratante NIVEA Milk hidrata profundamente a pele e oferece um cuidado intensivo. Tem 2x mais óleo de amendoas, nutrindo intensamente por 48h.',
'O que é?
NIVEA Loção Hidratante Milk Pele Seca a Extrasseca é um produto desenvolvido para hidratar profundamente a pele, proporcionando um cuidado intensivo.

Para que serve?
Sua textura cremosa e suave oferece uma agradável sensação de maciez, cuidando e protegendo a pele do ressecamento.
NIVEA Loção Hidratante Milk Pele Seca a Extrasseca possui uma fórmula enriquecida com duas vezes mais óleo de amêndoas, nutre intensamente por até 48 horas.

Composição:
Aqua, Paraffinum Liquidum, Glycerin, Isododecane e Óleo de Amêndoa.

Modo de Uso:
1. Aplique NIVEA MILK sobre a pele.
2. Use o produto diariamente para garantir uma maciez prolongada.

Aviso:
Uso externo. Não é indicado para uso no rosto. Não é protetor solar. Em caso de irritação, suspenda o uso e procure orientação médica. Manter em local seco e arejado, ao abrigo de luz e fora do alcance de crianças. Este é um produto cosmético, não ingerir.',
23.90,22.70,1,50,'milk-1.png','milk-2.jpg','milk-3.jpg',23,1,3); 
--#endregion


--#region Bady Splash Biscoito (Michael)
INSERT INTO Cores(id_cores, corPrincipal, hexDegrade1, hexDegrade2)
VALUES (2,'#00728C', '#25abc9','#5CCCE6');

INSERT INTO Produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES
('Body Splash Biscoito ou Bolacha','O Boticário','200ml',
'Cuide-se Bem vai fazer você se sentir a última bolacha do pacote! Apaixone-se por cada item da linha, com textura deliciosa como um recheio e a fragrância surpreendente que mistura o dulçor da baunilha com o chocolate amargo, para sua pele ganhar todos os biscoitos que ela merece. 

E aí, já decidiu quem ganha essa batalha?',
'Chegou a hora do Brasil decidir:
É biscoito ou bolacha?

Independente da sua escolha,o Body Splash Desodorante Colônia Cuide-se Bem Biscoito ou Bolacha vai fazer você se sentir a última bolacha do pacote!
Ideal para fazer parte do seu dia a dia, entrega um cheirinho de baunilha e chocolate, deixando a pele perfumada com uma fragrância doce e divertida.
O segredinho está no acorde de Biscoito ou Bolacha Cuide-se Bem, que traz o cheirinho único de bolacha, combinando a casquinha tostada do biscoito com o recheio cremoso do chocolate amargo misturado ao dulçor da baunilha.

Em edição limitada, sua fórmula vegana não agride a pele. Além disso, sua embalagem sustentável é reciclável, contribuindo para o bem-estar do meio ambiente.

Nenhum produto do Boticário é testado em animais, ou seja, este item possui selo Cruelty Free.

Como usar:
Aplique sobre o corpo como desejar reaplicando se necessário.

Orientações ao consumidor:
Uso Externo. Produto Cosmético. Não comestível. Inflamável. Evite contato com os olhos. Não aplique em pele irritada ou lesionada e evite aplicar nas axilas.
Descontinue o uso em caso de sensibilização. Conserve o produto bem fechado, longe da luz e do calor excessivo. Somente para uso externo. Mantenha fora do alcance de crianças. Uso adulto. Produto para perfumar e desodorizar a pele.
Devido à presença de alguns ingredientes, a cor do produto pode variar, porém sem comprometer sua qualidade ou segurança.',
69.90,null,0,30,'biscoito.png','biscoito-2.png','biscoito-3.png',8,2,4);  
--#endregion


--#region base mate vult  (Viviane)
INSERT INTO Cores(id_cores, corPrincipal, hexDegrade1, hexDegrade2)
VALUES
(3, '#72543A','#95765b','#ceb49c');

INSERT INTO Produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES
('Base mate Hidraluronic Q115','Vult','26ml',
'A Base Mate Hidraluronic Q115 foi pensada para que seu rosto fique impecável, com hidratação em dia e um efeito mate duradouro. A cor 115 é uma base de intensidade de cor escura de subtom quente que faz parte das 12 cores da linha para combinar com os diversos tons de pele, sendo uma ótima opção de base para a pele negra.',
'Passar a base costuma ser uma etapa fundamental da maquiagem, mas ter uma base cheia de benefícios é algo que vai além:
- Cobertura média
- Acabamento mate
- Durabilidade de até 8 horas
- Recomendado para peles mistas e oleosas

O segredo desta base de maquiagem está na fórmula rica em Ácido Hialurônico. O ingrediente consegue tanto repor a hidratação perdida quanto ajudar a reduzir a aparência de linhas finas. Também melhora a firmeza da pele para garantir um aspecto jovem e saudável.
Sua textura leve permite a construção de camadas, evitando que o produto acumule nas linhas de expressão e deixando um resultado bem natural. Seu efeito opaco ainda garante que a oleosidade fique sob controle.

Nenhum produto Vult é testado em animais, ou seja, este item possui selo Cruelty Free. Produto Vegano. Dermatologicamente testado.

Como Usar:
Comece, aplicando um pouco da base líquida com acabamento super mate no dorso da mão. Em seguida, aplique no rosto todo usando uma esponja, um pincel de base ou a ponta dos dedos.

Ação / Resultado:
Ácido Hialurônico: molécula hidrolisada de baixo peso molecular e alta penetração na pele, proporciona uma hidratação profunda que atua no preenchimento de rugas e linhas de expressão.
Seu rosto ganha um tom uniforme e matificado, além de uma aparência saudável, o dia todo.',
40.99,19.99,1,40,'vult-base.png','vult-base-2.jpg','vult-base-3.jpg',1,3,5);  
--#endregion


--#region coffee man (Michael)
INSERT INTO Cores(id_cores, corPrincipal, hexDegrade1, hexDegrade2)
VALUES
(4,'#462d2d','#824d32','#bd886d');

INSERT INTO Produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES
('Coffee Man','O Boticário','100ml',
'Fragrância masculina de café que possui 100ml. Assim como o ato de tomar um delicioso café, Coffee Man também envolve e proporciona momentos marcantes.',
'Uma fragrância masculina que traz a exclusiva tecnologia da infusão dos mais nobres grãos de café combinada com notas de couro e tabaco e um detalhe especial: um toque de cardamomo.

Inspirado na cultura indiana, a qual cultiva o hábito de acrescenta-lo ao café para realçar o seu sabor. Essa mistura de ingredientes reforçam o caráter de equilíbrio e sofisticação da fragrância.

Família olfativa: 
Amadeirado Ambarado Couro.

Como Usar:
Borrife a fragrância nas áreas onde há maior circulação do sangue, como o pescoço, dobras do cotovelo e atrás das orelhas.',
209.90,179.90,1,50,'coffee.png','coffee-2.jpg','coffee-3.jpg',6,4,6);  
--#endregion



--AGORA SERÃO PRODUTOS NOVOS QUE EU PEGUEI

--#region bt velvet blackberry (Viviane)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(5,'#35100d','#91271d','#eb584b');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('BT Velvet Blackberry','Bruna Tavares',null,
'O BT Velvet pode ser usado como primer e sombra para os olhos, contorno, blush, delineador, corretor de sobrancelha e corretor de fios brancos. O BT Velvet 2X1 oferece alta pigmentação aliada a uma textura confortável e fácil de se esfumar. Ele é resistente à água e ao suor, além de ser longa duração.',
'A fórmula do BT Velvet foi desenvolvida com tecnologia de pigmentação avançada que garante cores vivas e consistentes desde a primeira aplicação. Sua base cremosa promove o deslizamento uniforme do produto, conferindo alta fixação e resistência sem ressecar a pele. Sua secagem equilibrada permite construir esfumados com precisão, enquanto o acabamento matte aveludado traz elegância à maquiagem. O produto é dermatologicamente e oftalmologicamente testado, garantindo multifuncionalidade em diversos momentos da beleza.

Precauções: 
Descontinue o uso em caso de sensibilização. Conserve o produto bem fechado, longe da luz e do calor excessivo. Produto indicado somente para o uso externo. Mantenha fora do alcance de crianças. 

Composição do BT VELVET:
Trihydroxystearin, Hydrogenated Polycyclopentadiene, Polyethylene, Copernicia Cerifera Cera, Tocopheryl Acetate, Ricinus Communis Seed Oil, VP/Eicosene Copolymer, Cyclopentasiloxane, Trimethylsiloxysilicate, BHT, Silica, Disteardimonium Hectorite, Propylene Carbonate, Isododecane, Talc, Parfum, Cinnamol, Eugenol, Polyglyceryl-4 Isostearate, Nylon-12 Polymethyl Methacrylate, Pentaerythrityl Tetraisostearate, Caprylyl Glycol, Phenoxyethanol. Pode conter: Benzyl Benzoate, CI 15850, CI 77492, CI 77491, CI 77499, CI 77266, CI 77891, CI 45380.',
69.00,null,0,30,'bt-blackberry.png','bt-blackberry2.jpg','bt-blackberry3.jpg',3,5,4); 
--#endregion


--#region body splash deleite (Michael)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(6,'#000000','#dcb4bf','#f5d7e0');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Body Splash Cuide-se Bem Deleite','O Boticário','200ml',
'Body splash com fragrância leve e delicada que prolonga o frescor pós-banho e o cheirinho da loção corporal. Ideal para o dia a dia, envolve a pele com toque refrescante e sensação de hidratação ao longo do dia.',
'O Body Splash Cuide-Se Bem Deleite traz uma fragrância leve e suave que prolonga o cheirinho da sua loção corporal preferida e a sensação de frescor pós banho. Ideal para o dia a dia, este body splash vai envolver sua pele com uma fragrância suave e delicada, deixando uma sensação refrescante e hidratada o dia todo.

Como Usar:
Aplique sobre o corpo como desejar, reaplicando se necessário.

Orientações ao consumidor:
Inflamável. Evite contato com os olhos. Não aplique em pele irritada ou lesionada e evite aplicar nas axilas. Descontinue o uso em caso de sensibilização. Conserve o produto bem fechado, longe da luz e do calor excessivo. Somente para uso externo. Mantenha fora do alcance de crianças. Produto para perfumar e desodorizar a pele.

Devido à presença de alguns ingredientes, a cor do produto pode variar, porém sem comprometer sua qualidade ou segurança.',
89.90,null,0,40,'bodysplash-deleite.png','bodysplash-deleite-2.jpg','bodysplash-deleite-3.jpg',8,6,3);  
--#endregion


--#region lily (Eliana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(7,'#af833a','#cea86a','#fef0d6');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Creme Hidratante Corporal Lily','O Boticário','250g',
'Creme Acetinado Hidratante Desodorante Corporal Lily 250g. É a combinação ideal de perfumação prolongada com a fragrância marcante e intensa de Lily Lumière.',
'Este creme acetinado forma um filme hidratante na pele, evitando ressecamento e hidratando intensamente por até 48h. Além disso, entrega:
- Perfumação intensa e prolongada;
- Textura macia e aveludada;
-    Deslize suave pela sua pele. 

Lily Lumière traz uma perfumação marcante e intensa, traduzindo o encontro das flores do Lírio, a clássica assinatura floral e sofisticada de Lily, com a luminosidade e intensidade da Flor de Laranjeira, envolto pelo dulçor da Baunilha.

Como Usar:
Aplicar em todo o corpo, após o banho ou sempre que desejar.

Nenhum produto do Boticário é testado em animais, ou seja, este item possui selo Cruelty Free.',
139.90,null,0,15,'lily.png','lily-2.jpg','lily-3.jpg',23,7,3); 
--#endregion


--#region mascara danos vorazes (Maiara)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(8,'#60aaca','#85D3F4','#B7E6FB');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Máscara Danos Vorazes','Lola','450g',
'Máscara de Reparação Intensiva com hair kombucha para reparação imediata da fibra extremamente danificada.',
'Máscara de Reparação Intensiva com hair kombucha para reparação imediata da fibra extremamente danificada. Fórmula rica em complexo probiótico que recupera os danos dos cabelos que passaram por químicas, devolvendo a vitalidade e saúde dos fios. 

Como usar: 
Após a higienização dos cabelos, retire o excesso de umidade e distribua a Máscara Reparação Intensiva Danos Vorazes pelo comprimento e pontas, trabalhando mecha por mecha, e deixe agir por 2 minutos. Enxágue bem e siga o ritual Danos Vorazes com o Booster Condicionante para potencializar os resultados.

Ingredientes:
AQUA, BEHENAMIDOPROPYL DIMETHYLAMINE, BEHENTRIMONIUM METHOSULFATE and CETEARYL ALCOHOL, BENZYL ALCOHOL and BENZOIC ACID and SORBIC ACID and GLYCERIN, CAPRYLIC/CAPRIC TRIGLYCERIDE, CETEARYL ALCOHOL, CETYL ESTERS, COPAIFERA OFFICINALIS (BALSAM COPAIBA) RESIN and PASSIFLORA EDULIS SEED OIL, LACTIC ACID, PARFUM, PROPYLENE GLYCOL, SACCHAROMYCES/XYLINUM/BLACK TEA FERMENT and GLYCERIN and HYDROXYETHYLCELLULOSE',
64.90,60.90,1,40,'lola-danos-vorazes.png','lola-danos-vorazes-2.jpg','lola-danos-vorazes-3.jpg',16,8,5);  
--#endregion


--#region shampoo protect color braé (Maiara)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(9,'#97262a','#ba5b54','#f5a59f');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Shampoo Protect Color','Braé','250ml',
'Shampoo para cabelos coloridos. Possui ação antioxidante, limpa de forma suave e prolonga a proteção da cor, além de porporcionar brilho e maciez.',
'O Shampoo BRAÉ Stages Color Protect foi feito para manter a vitalidade dos cabelos coloridos, realçando o brilho natural enquanto limpa suavemente. Com uma combinação de extratos naturais e agentes antioxidantes, ele age para proteger contra o desbotamento, garantindo que sua cor continue vibrante e os fios, saudáveis. Prolongue a cor e o brilho dos seus cabelos.

Principais Benefícios:
• Proteção da cor com ação antioxidante;
• Realce do brilho natural e prolongado;
• Limpeza suave, sem ressecar os fios.


Modo de uso:
1- Aplique o shampoo nos cabelos molhados e massageie o couro cabeludo até formar espuma;
2- Enxágue bem e repita a aplicação se necessário;
3- Para melhores resultados, utilize o condicionador da linha.',
69.90,49.90,1,30,'shampoo-protect-color-brae.png','shampoo-protect-color-brae-2.jpg','shampoo-protect-color-brae-3.jpg',17,9,5);  
--#endregion


--#region condicionador protect color (Maiara)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(10,'#97262a','#ba5b54','#f5a59f');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Condicionador Protect Color','Braé','250ml',
'Condicionador para cabelos coloridos. Condiciona de forma eficaz, promove maciez, luminosidade e proteção prolongada da cor, além de ajudar no desembaraço e selar as cutículas.',
'O Condicionador BRAÉ Stages Color Protect foi desenvolvido para proteger a cor e hidratar os cabelos coloridos, deixando-os macios e com um brilho incrível. Sela as cutículas dos fios, protegendo a cor e mantendo a vitalidade por muito mais tempo. Sua fórmula enriquecida com antioxidantes promove uma hidratação profunda sem pesar, garantindo movimento e luminosidade. Maciez e brilho que você sente ao toque.

Principais Benefícios:
• Hidratação intensa e proteção prolongada da cor;
• Realce do brilho e maciez duradoura;
• Sela as cutículas, evitando o desbotamento.


Modo de uso:
1- Após lavar com o shampoo, aplique o condicionador nos cabelos úmidos, do comprimento às pontas;
2- Deixe agir por alguns minutos;
3- Enxágue bem e finalize como preferir.',
79.0,52.90,1,30,'condicionador-protect-color-brae.png','condicionador-protect-color-brae-2.jpg','condicionador-protect-color-brae-3.jpg',17,10,5);  
--#endregion


--#region mascara trotect color brae (Maiara)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(11,'#97262a','#ba5b54','#f5a59f');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Máscara Protect Color','Braé','250ml',
'Máscara de tratamento para cabelos coloridos. Possui ação antioxidante, hidrata, promove maciez, luminosidade e proteção prolongada da cor, além de proporcionar brilho.',
'A Máscara Capilar BRAÉ Stages Color Protect oferece um cuidado profundo para cabelos coloridos, devolvendo a vitalidade e o brilho que se perdem com o tempo. Com uma fórmula rica em nutrientes e antioxidantes, promove uma hidratação intensa, repara os danos e prolonga a durabilidade da cor. Um tratamento semanal que transforma seus fios, deixando-os macios, luminosos e saudáveis. Cor vibrante e hidratação poderosa em um só passo.

Principais Benefícios:
• Hidratação intensa e reparação profunda;
• Prolonga a durabilidade e a vivacidade da cor;
• Recupera o brilho e a maciez dos fios.


Modo de uso:
1- Após lavar com o shampoo da linha, retire o excesso de água com uma toalha;
2- Aplique a máscara nos cabelos úmidos, do comprimento às pontas;
3- Deixe agir por 5 minutos;
4- Enxágue bem e, para um cuidado completo, finalize com o condicionador da linha.',
99.90,54.90,1,30,'mascara-color-protect-brae.png','mascara-color-protect-brae-2.jpg','mascara-color-protect-brae-3.jpg',17,11,5); 
--#endregion


--#region kit protect color brae (Maiara)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(12,'#97262a','#ba5b54','#f5a59f');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Kit Color Protect','Braé',null,
'Kit Brae Stages Color Protect contendo 3 produtos: Shampoo, Condicionador e Máscara.',
'Conheça o KIT:
Brae stages Color Protect - Shampoo Proteção da Cor 250ml
Shampoo para cabelos coloridos. Possui ação antioxidante, limpa de forma suave e prolonga a proteção da cor, além de porporcionar brilho e maciez.
Brae stages Color Protect - Condicionador Proteção da Cor 250ml
Condicionador para cabelos coloridos. Condiciona de forma eficaz, promove maciez, luminosidade e proteção prolongada da cor, além de ajudar no desembaraço e selar as cutículas.
Brae stages Color Protect - Máscara Proteção da Cor 200g
Máscara de tratamento para cabelos coloridos. Possui ação antioxidante, hidrata, promove maciez, luminosidade e proteção prolongada da cor, além de proporcionar brilho.',
249.70,137.34,1,10,'kit-color-protect.png','kit-color-protect-2.jpg','kit-color-protect-3.jpg',17,12,5);  
--#endregion


--#region corretivo marimaria (Viviane)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(13,'#f54e00','#eb8252','#F5A884');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Base e Corretivo Matte Velvet Skin Baunilha I','Mari Maria Makeup','25g',
'Base e corretivo 2 em 1 com acabamento aveludado e cobertura de média a alta intensidade. Uniformiza o tom da pele, disfarça imperfeições e realça a beleza natural com toque leve e sofisticado.',
'Descubra a perfeição com a Base e Corretivo Velvet Skin. Este produto inovador combina a função de base e corretivo, oferecendo um acabamento aveludado que proporciona uma cobertura de média a alta, ideal para esconder imperfeições e realçar a beleza natural da sua pele. 

Composição: 
DECAMETILCICLOPENTASILOXANO, MIRISTATO DE ISOPROPILA, ISODODECANO, TRIMETILSILOXISSILICATO, OCTENIL SUCCINATO DE AMIDO ALUMÍNIO, ÓLEO MINERAL, TRIIDROXIESTEARINA, CERA BRANCA DE ABELHA, OZOQUERITA, SÍLICA, HECTORITA DISTEARDIMÔNIO, FENOXIETANOL, ACETATO DE TOCOFERILA, CARBONATO DE PROPILENO, CROSPOLÍMERO DE DIMETICONA, COPOLÍMERO DE ETILENO/PROPILENO/ESTIRENO, COPOLÍMERO DE BUTILENO/ETILENO/ESTIRENO, ETILHEXILGLICERINA, BUTIL- HIDROXITOLUENO PODE CONTER : CORANTE BRANCO 77891, CORANTE AMARELO 77492, CORANTE VERMELHO 77491, CORANTE PRETO 77499.',
69.90,null,0,20,'base-mari-maria.png','base-mari-maria-2.jpg','base-mari-maria-3.png',1,13,5);    
--#endregion


--#region superstay (Viviane)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(14,'#ea0137','#ff3463','#fa7d9a');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('SupersStay Vinyl Ink Capricious','Maybelline','4,2ml',
'Lábios impecáveis com acabamento espelhado e efeito gloss no tom de rosa Coy, mantendo o brilho intenso e a cor vibrante sem necessidade de retoques recorrentes.',
'Batom com acabamento espelhado e sem retoques ao longo do dia? Sim! Agora você tem!
Com novo Vinyl Ink de Maybelline New York é hora de se contentar com nada menos que a perfeição. Esse batom é da família Superstay, de produtos de alta performance e já conhecidos pela sua longa duração. Ele não é apenas uma declaração ousada de cor, é uma declaração de confiança.

FÓRMULA EXCLUSIVA
Nossa fórmula mantém a cor intacta, além de ser à prova de manchas e resistente à transferência. Esta fórmula vegana possui longa duração, para que você possa se sentir confiante em festejar a noite toda ou viver a sua rotina agitada do dia a dia, sem se preocupar com o fato de retocar seu batom.

Como aplicar:
1. Agite o batom por 5 segundos antes de usar
2. Aplique no centro do lábio superior e siga o contorno da boca. Em seguida, passe o aplicador em todo lábio inferior.
3. Seus lábios prontos para arrasar!

Benefícios:
• Acabamento espelhado: lábios bonitos e brilhantes o dia todo
• Fórmula Vegana
• Não transfere e não borra',
82.90,null,0,15,'superstay-ink-vinyl-capricious.png','superstay-ink-vinyl-capricious-2.jpg','superstay-ink-vinyl-capricious-3.jpg',3,14,4);   
--#endregion


--#region brow up fix gel (Viviane)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(15,'#64c2c2','#8eddd6','#B6F7F1');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Brow Up Fix Gel','Vizella','3g',
'Brow Up Fix é um gel efeito cola de alta fixação, que mantém os fios da sobrancelha no lugar por muito mais tempo, garantindo longa duração.
Seu pincel mini permite uma aplicação precisa e detalhada, alcançando até os menores fios. A fórmula transparente se adapta a todos os tons de sobrancelha, sem alterar a cor.',
'Com o Brow Up Fix, você escolhe como quer estilizar suas sobrancelhas:
  .No formato natural, acompanhando o crescimento dos fios.
  .Ou com o efeito Brow Lamination, penteando os fios para cima, deixando o olhar mais expressivo e o visual mais descolado.

Como usar:
Remova os resíduos de bases ou outros produtos antes de utilizar. Aplique o produto com o auxílio do pincel, penteando as sobrancelhas do modo que desejar.

Dica:
Penteie as sobrancelhas ao contrário e depois penteie do modo que desejar, assim o produto alcança todos os fios das sobrancelhas, fixando ainda mais.

Características do produto:
Gel cola fixador para sobrancelhas Super fixação Fácil aplicação Efeito Brow lamination Pincel preciso Dermatologicamente testado Vegano e Cruelty free Paraben free – livre de parabenos

Qual é a composição?
aqua/água, disodium edta/edetato dissódico, alcohol/alcool etilico, glycerin/glicerina(vegetal), polyacrylate crosspolymer-6/crospolímero-6 de poliacrilatov, pvp/poli vinil pirrolidona, benzyl alcohol/álcool benzilico, ethylhexylglycerin/etil hexil glicerina, tocopherol/tocoferol.',
50.99,47.50,1,20,'gel-sobrancelhas-vizzela.png','gel-sobrancelhas-vizzela-2.jpg','gel-sobrancelhas-vizzela-3.jpg',4,15,4);
--#endregion


--#region amor amor (Michael)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(16,'#970005','#C42127','#F25055');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 

('Amor Amor','Cacharel','30ml',
'Amor Amor Cacharel Eau de Toilette é uma fragrância feminina que exala paixão e romantismo. Fragrância oriental frutal com notas de tangerina, jasmim e baunilha para um toque apaixonante e feminino. Aplique o perfume a 15 cm da pele em áreas estratégicas do corpo, como pulsos, pescoço e atrás das orelhas. Hidrate a pele para maior fixação. Evite esfregar o perfume após a aplicação para preservar sua composição e garantir máxima durabilidade.',
'Amor Amor é o perfume da paixão e do amor à primeira vista. Intenso, imediato, vivo, eletrizante, saboroso e marcante, Amor Amor nos lembra que o olfato é o sentido mais essencial da sensualidade. O vermelho vibrante do frasco reúne notas mágicas de tangerina, cereja preta, jasmim de quatro pétalas da Indonésia, lírio-do-vale, almíscar branco e âmbar cinza.
É o elixir da paixão. A expressão mais profunda do romantismo moderno. É mais que amor. É Amor Amor. 

Como usar:
Borrife a 20cm da pele nas áreas quentes do corpo como pescoço e pulsos. Não esfregar.
Para melhores resultados: Fazer uma bruma sobre o corpo e deixar que fragrância se assente naturalmente.

Pirâmide Olfativa
Notas de Topo: Cassis ou Groselha Preta, Laranja, Tangerina, Cássia, Toranja e Bergamota;
Notas de Coração: Damasco, Lírio, Jasmin, Lírio-do-vale e Rosa;
Notas de Fundo: Âmbar, Fava Tonka, Baunilha, Cedro da Virgínia e Almíscar.',
189.90,119.90,1,30,'amor-amor.png','amor-amor-2.jpg','amor-amor-3.jpg',5,16,3);
--#endregion


--#region Mascara kamaleao color medusa (Maiara)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(17,'#4e316b','#825EA6','#A683C9');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Máscara Pigmentante Medusa','Kamaleão Color','150ml',
'As Máscaras Pigmentantes, em alguns casos, podem cobrir até 80% dos fios brancos. Lembrando que isso não é a regra, é uma exceção. Por isso é sempre importante realizar um teste de mecha antes para garantir que o resultado alcançado seja aquele que você deseja. Na maioria dos casos onde é aplicado a Máscara Pigmentante sobre fios brancos ela não pigmenta. E caso pegue nos fios, pode sair nas primeiras lavagens.',
'Sobre o produto:
· Sem amônia, parabenos e peróxidos;
· Você pode misturar com outras cores para obter novos tons;
· Diluído com o nosso Creme Multifuncional Arco íris você consegue suavizar a cor e obter tons pastéis;
· Cor intensa e vibrante;
· Não contém anilina;
· Durabilidade de 5 a 25 lavagens (a duração varia de acordo com o cabelo e a manutenção);
· Extremamente hidratante.

Modo de uso: 
Com os cabelos limpos (lavados apenas com o Shampoo Arco Íris antirresíduos para melhor absorção do produto) e secos, aplique a Máscara Pigmentante Medusa e deixe agir de 30 a 40 minutos. 
Após o tempo de espera, enxágue* somente com água até remover todo o excesso. 
Finalize como quiser.
Use luvas durante a aplicação.

Recomendamos que o produto não seja retirado no banho pois há risco de manchar a pele. 

Prova de Toque: 
Aplique o produto no antebraço, deixe agir por 20 minutos, lave em seguida e aguarde 24 horas. 
Caso haja irritação na pele, coceira ou ardência não utilize o produto.

Teste de mecha: 
Separe e isole uma mecha do cabelo e siga todo o procedimento do modo de uso.

Para aplicação da Máscara Pigmentante Medusa seu cabelo precisa estar em uma base entre 10 (loiro claríssimo) e 11 (loiro super claríssimo) matizado e uniforme, pois se a sua base estiver amarelada seu cabelo pode ficar verde e se não estiver uniforme o cabelo pode ficar manchado. Pode ser usado puro ou diluído. Para diluição recomendamos o uso do Creme Diluidor Multifuncional Arco Íris. Caso seja aplicado pura nos fios e o excesso de pigmento não seja retirado corretamente, o pigmento que ficou em excesso pode manchar a pele.

 Avisos:
· O cabelo precisa estar descolorido e uniforme;
· Use luvas durante todo o processo;
· Se tirado no banho o produto pode manchar a pele;
· Faça um teste de mecha antes da aplicação do produto no cabelo inteiro.
',
64.50,54.82,1,30,'kamaleao-color-medusa.png','kamaleao-color-medusa-2.jpg','kamaleao-color-medusa-3.jpg',17,17,6);  
--#endregion


--#region mascara kamaleao color carpa (Maiara)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(18,'#f58e18','#fbab2b','#f8d04c');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Máscara Pigmentante Carpa','Kamaleão Color','150ml',
'Máscara pigmentante Carpa (laranja neon) de 150ml. O cabelo precisa estar descolorido e uniforme. Faça um teste de mecha antes da aplicação do produto no cabelo inteiro.',
'Sobre o produto:
. Sem amônia;
. Sem parabenos e peróxidos;
. Você pode misturar com outras cores para obter novos tons;
. Diluido com o nosso Creme Multifuncional Arco Iris você consegue suavizar a cor e obter tons pastéis;
. Cor intensa e vibrante;
. Não contém anilina;
. Durabilidade de 5 a 25 lavagens (a duração varia de acordo com o cabelo e a manutenção);
. Extremamente hidratante.

Modo de uso:
Com os cabelos limpos (lavados apenas com o Shampoo Arco Íris antirresíduos para melhor absorção do produto) e secos, aplique a Máscara Pigmentante Carpa e deixe agir de 30 a 40 minutos. 
Após o tempo de espera, enxágue somente com água até remover todo o excesso. 
Finalize como quiser. 
Use luvas durante a aplicação. Para obter o melhor resultado possível, o ideal é que seu cabelo esteja em uma 11 (loiro super claríssimo) matizado e uniforme.

Recomendamos que o produto não seja retirado no banho pois há risco de manchar a pele.

Prova de Toque: 
Aplique o produto no antebraço, deixe agir por 20 minutos, lave em seguida e aguarde 24 horas.
Caso haja irritação na pele, coceira ou ardência não utilize o produto.

Teste de mecha: 
Separe e isole uma mecha do cabelo e siga todo o procedimento do modo de uso.

Para aplicação da Máscara Pigmentante Medusa seu cabelo precisa estar em uma base entre 10 (loiro claríssimo) e 11 (loiro super claríssimo) matizado e uniforme, pois se a sua base estiver amarelada seu cabelo pode ficar verde e se não estiver uniforme o cabelo pode ficar manchado. Pode ser usado puro ou diluído. Para diluição recomendamos o uso do Creme Diluidor Multifuncional Arco Íris. Caso seja aplicado pura nos fios e o excesso de pigmento não seja retirado corretamente, o pigmento que ficou em excesso pode manchar a pele.

Avisos:
. O cabelo precisa estar descolorido ou tingido;
. Use luvas durante todo o processo;
. Se tirado no banho o produto pode manchar a pele;
. Faça um teste de mecha antes da aplicação do produto no cabelo inteiro.
',
64.50,54.82,1,30,'carpa-kamaleao-color.png','carpa-kamaleao-color-2.jpg','carpa-kamaleao-color-3.jpg',17,18,6);   
--#endregion


--#region oleo avelã (Eliana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(19,'#833c0c','#c46220','#eeb087');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Óleo Corporal Avelã','Paixão','100ml',
'O Óleo Corporal Paixão com ação desodorante possui óleo de amêndoas que vai garantir hidratação por até 24horas. Sua aplicação deve ser feita logo após o banho, com a pele ainda molhada e se desejar, pode enxaguar levemente ou não. De uso diário, é recomendado para todos os tipos de pele. Sua fragrância traz a suculência das frutas vermelhas, combinadas com um buquê floral feminino e um fundo cremoso e sensual de Baunilha e açúcar caramelizado.',
'O Óleo Corporal Paixão Avelã combina o nobre óleo de amêndoas com uma ação desodorante, garantindo a hidratação da pele por 24 horas. As envolventes notas caramelizadas e amadeiradas aliadas ao clássico óleo de amêndoas Paixão perfumam, hidratam e iluminam a pele delicadamente.

Nota de fragrância:
Um mix de frutas vermelhas como framboesa, amora silvestre, mirtilo e morango frescos são misturadas a um bouquet floral cremoso com rosa e jasmim. Seu fundo tem a combinação de notas caramelizadas, doces e amadeiradas.

Modo de usar:
Aplique na pele limpa e umedecida após o banho e massageie levemente. Se desejar, enxágue para retirar o excesso.

Composição:
Petrolato Líquido, Lecitina, Perfume, Lauromacrogol 400, Octildodecanol, Óleo de Amêndoas, Óleo da Semente de Corylus avellana, Fenoxietanol, Adipato de Dibutila, Cumarina, Limoneno, Etilexilglicerina, Tetra-Di-T-Butil Hidróxi-Hidrocinamato de Pentaeritritila, Linalol, Citral.',
13.49,null,0,14,'oleo-avela-paixao.png','oleo-avela-paixao-2.jpg','oleo-avela-paixao-3.jpg',24,19,3);
--#endregion


--#region oleo tentadora (Eliana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(20,'#6e0313','#bd021f','#f1556cff');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Óleo Corporal Tentadora (Ameixa Rubi)','Paixão','200ml',
'O Óleo Corporal Paixão com ação desodorante possui óleo de amêndoas que vai garantir hidratação por até 24horas. Sua aplicação deve ser feita logo após o banho, com a pele ainda molhada e se desejar, pode enxaguar levemente ou não. De uso diário, é recomendado para todos os tipos de pele. Sua fragrância traz a suculência das frutas vermelhas, combinadas com um buquê floral feminino e um fundo cremoso e sensual de Baunilha e açúcar caramelizado.',
'O Óleo Corporal Desodorante Paixão Tentadora possui ação desodorante, hidrata e perfuma suavemente a pele, revelando um doce prazer que apenas a fusão do óleo de amêndoas com avelã é capaz de proporcionar.

Notas da fragrância:
Notas de frutas como morango e melão são misturadas a notas de violeta e rosa, harmonizadas pelo adocicado da baunilha.
    . Notas de Topo:
      Mandarina, Laranja, Melão, Morango, Pera
    . Notas de Coração:
      Violeta, Magosteen, Ameixa, Rosa
    . Notas de Base:
      Musk, Baunilha, Sândalo, Blond, Woody

Para que serve: 
O Óleo Corporal Desodorante Paixão Tentadora proporciona hidratação por até 24 horas e auxilia na prevenção de estrias. Possui agentes naturais que contribui para a elasticidade da pele, além de deixá-la macia, sedosa e com um perfume inconfundível.

Modo de usar:
Aplique o Óleo Corporal Desodorante Paixão Tentadora no corpo após o banho, com a pele ainda molhada.
Se desejar, enxágue levemente. 

Composição:
Paraffinum liquidum, lecithin, parfum, laureth-2, octyldodecanol, prunus amygdalus dulcis oil, hexyl cinnamal, phenoxyethanol, linalool, dibutyl adipate, benzyl salicylate, limonene, ethylhexylglycerin, pentaerythrityl tetra-di-t-butyl hydroxyhydrocinnamate, citronellol, coumarin, alpha-isomethyl ionone, geraniol.

Advertência: 
Uso externo. 
Manter fora do alcance das crianças. 
Não ingerir. 
Em caso de contato acidental com os olhos enxaguar abundantemente com água. 
Em caso de irritação suspenda o uso e procure orientação médica.',
27.79,null,0,30,'oleo-ameixarubi-paixao.png','oleo-ameixarubi-paixao-2.jpg','oleo-ameixarubi-paixao-3.jpg',24,20,2);  
--#endregion


--#region oleo inspiradora (Eliana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(21,'#283256','#495a97','#8094e5');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocaoqtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Óleo Corporal Inspiradora (Rosas Brancas)','Paixão','100ml',
'O Óleo Corporal Paixão com ação desodorante combina o nobre óleo de amêndoas com uma ação desodorante, garantindo a hidratação por 24 horas. Uma fragrância irresistível, maciez e leveza para sua pele a partir de uma combinação de especiarias e notas florais, além da ação desodorante e nosso clássico óleo de amêndoas.',
'O Óleo Corporal Desodorante Paixão Tentadora possui ação desodorante, hidrata e perfuma suavemente a pele, revelando um doce prazer que apenas a fusão do óleo de amêndoas com avelã é capaz de proporcionar. 

Notas da fragrância:
Desperta os sentidos através das notas de lavanda, alecrim e bergamota. Notas florais desabrocham com um fundo de madeiras nobres e especiarias.
    . Notas de Topo:
      Fresh, Lavanda, Citrus, Aldeídica
    . Notas de Coração:
      Muguet, Rosa, Jasmim, Ylang-Ylang, Violeta
    . Notas de Base:
      Amadeirado, Ambarado, Musgo, Sândalo

Para que serve:
O Óleo Corporal Desodorante Paixão Tentadora proporciona hidratação por até 24 horas e auxilia na prevenção de estrias. Possui agentes naturais que contribui para a elasticidade da pele, além de deixá-la macia, sedosa e com um perfume inconfundível. 

Modo de usar:
Aplique o Óleo Corporal Desodorante Paixão Tentadora no corpo após o banho, com a pele ainda molhada.
Se desejar, enxágue levemente. 

Composição:
Paraffinum liquidum, lecithin, parfum, laureth-2, octyldodecanol, prunus amygdalus dulcis oil, hexyl cinnamal, phenoxyethanol, linalool, dibutyl adipate, benzyl salicylate, limonene, ethylhexylglycerin, pentaerythrityl tetra-di-t-butyl hydroxyhydrocinnamate, citronellol, coumarin, alpha-isomethyl ionone, geraniol. 

Advertência:
Uso externo.
Manter fora do alcance das crianças.
Não ingerir.
Em caso de contato acidental com os olhos enxaguar abundantemente com água.
Em caso de irritação suspenda o uso e procure orientação médica.',
14.20,null,0,15,'oleo-rosasbrancas-paixao.png','oleo-rosasbrancas-paixao-2.jpg','oleo-rosasbrancas-paixao-3.jpg',24,21,2);
--#endregion


--#region lapiseira cherry (Viviane)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(22,'#7c0023','#A91942','#C83C64');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Lapiseira para Olhos Cherry','Vizzela',null,
'Com coloração bordô, destaca especialmente os olhos castanhos claros e esverdeados. Possui textura macia e alta pigmentação, ideal para aplicação na linha d’água, como delineado preciso ou esfumado, trazendo um toque de cor sofisticado para a make. À prova d’água, é super resistente e de longa duração. Além disso, seu formato retrátil traz praticidade, dispensando o uso de apontador.',
"Características do produto:
À prova d'água esfumável pigmentação bordô fórmula vegana oftalmologicamente testada cruelty free – não testado em animais paraben free – livre de parabenos selo – eu reciclo. 

Como usar:
Aplique-a nas pálpebras próximo à raiz dos cílios.

Composição:
methyl trimethicone, polyethylene, trimethylsiloxysilicate, octyldodecanol, ozokerit, acrylates/dimethicone copolymer, disteardimonium hectorite, propylene carbonate, pentaerythrityl tetra-di-t-butyl hydroxyhydrocinnamate. pode conter: ci 77491 ci 77499, ci 77891, ci 15850. (port) metil trimeticona, polietileno, trimetilsiloxissilicato, octildodecanol, ozoquerita, copolímero de acrilatos/dimeticona, hectorita diesteardimônio, carbonato de propileno, tetra-di-t-butil hidróxi-hidrocinamato de pentaeritritila.
Pode conter colorantes: corante vermelho 77491, corante preto 77499, corante branco 77891, corante vermelho 15850.",
39.90,35.22,1,20,'lapiseira-cherry-vizzela.png','lapiseira-cherry-vizzela-2.jpg','lapiseira-cherry-vizzela-3.jpg',2,22,4);    
--#endregion


--#region lip oil pand (Viviane)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(23,'#eb5763','#F7828C','#FFB3B9');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Lip Oil Gummy Panda','Vizzela',null,
'Lip Oil Gummy Panda + Chaveiro.
Hidratação intensa e brilho poderoso.
O Lip Oil Gummy Panda combina acabamento super brilhante com a tecnologia pH Color Tint, que reage ao pH da sua pele e revela um tom rosado natural nos lábios. 
Textura jelly confortável.
Chaveiro Exclusivo.',
'A fórmula possui aplicação suave, não escorre e proporciona maciez imediata. Enriquecido com esqualano vegetal e óleo de amêndoas, garante emoliência e hidratação prolongada. O produto acompanha um chaveiro de pandacórnio, para você carregar com você em qualquer lugar. Strawberry Jelly. Um rosa natural com um toque saudável, perfeito para realçar a beleza dos seus lábios.

Como usar:
Aplique o Lip Oil Gummy Panda diretamente nos lábios com o aplicador. Espere alguns segundos para ver a cor mágica aparecer!

Composição:
POLYISOBUTENE/POLIISOBUTENO, PHENOXYETHANOL/FENOXIETANOL, CAPRYLIC/CAPRIC TRIGLYCERIDE/TRIGLICERÍDEO CAPRÍLICO/CÁPRICO, BENZOTRIAZOLYL DODECYL P-CRESOL/BENZOTRIAZOLIL DODECIL P-CRESOL, ETHYLHEXYL PALMITATE/PALMITATO DE ETILEXILA, TOCOPHERYL ACETATE/ACETATO DE TOCOFERILA, PARFUM/PERFUME, HYDROGENATED POLYISOBUTENE/POLIISOBUTENO HIDROGENADO, ETHYLENE/PROPYLENE/STYRENE COPOLYMER/ COPOLÍMERO DE ETILENO/PROPILENO/ESTIRENO, BUTYLENE/ETHYLENE/STYRENE COPOLYMER/ COPOLÍMERO DE BUTILENO/ETILENO/ESTIRENO, PRUNUS AMYGDALUS DULCIS OIL/ÓLEO DE AMÊNDOA-DOCE, SODIUM SACCHARIN/SACARINA DE SÓDIO, SQUALANE/ESQUALANO, CI 45380/ CORANTE EOSINA AMARELA 45380.',
69.90,null,0,40,'lip-oil-gummy.png','lip-oil-gummy-2.jpg','lip-oil-gummy-3.jpg',3,23,4);    
--#endregion


--#region gloss cherry (Viviane)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(24,'#801d31','#AE374F','#AE374F');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Gloss Cherry','Vizzela',null,
'O Cherry Gloss com Chaveiro tem um tom vermelho cereja translúcido que realça a cor natural dos lábios com um leve toque avermelhado.',
'Sua fórmula cremosa e confortável proporciona um efeito delicado, com aroma suave de cereja, sem escorrer e garantindo hidratação duradoura. Pode ser usado sozinho para um visual natural ou sobre o batom para um brilho extra. O resultado são lábios mais volumosos, hidratados e com a cor cherry que conquistou tantas fãs. Agora na versão gloss com chaveiro, para estar sempre com você, enriquecido com ácido hialurônico e vitamina E, que promovem hidratação prolongada e proteção aos lábios. 

Como usar:
Aplique o cherry gloss diretamente nos lábios com o aplicador.
Use sozinho para um brilho natural ou por cima do batom para um efeito espelhado ainda mais intenso.

Características do produto:
Cor única e acabamento glossy acompanha chaveiro hidratação intensa acabamento confortável nos lábios não pegajoso fácil de aplicar ácido hialurônico e vitamina e dermatologicamente testado vegano cruelty free sem parabenos.

Composição:
hydrogenated polyisobutene/poliisobuteno hidrogenado, polyisobutene/poliisobuteno, paraffinum liquidum/parafina líquida, ethylene/propylene/styrene copolymer/copólímero de etileno/propileno/estireno, butylene/ethylene/styrene copolymer/copólímero de butileno/etileno/estireno, ethylhexyl metoxyccinamate/octinoxato, octyldodecanol/octildodecanol, parfum/perfume, ethylhexyl palmitate/palmitato de etilexila, ci 15880/corante vermelho 15880, phenoxyethanol/fenoxietanol, tocopheryl acetate/acetato de tocoferila, ci 15850/corante vermelho 15850/benzotriazolyl dodecyl p-cresol/benzotriazolyl dodecyl p-cresol, butylene glycol/butileno glicol, silica dimethyl silylate/silica dimethyl silylate, caprylyl glycol/caprililglicol, hexylene glycol/hexileno glicol, sodium hyaluronate/hialuronato de sódio.',
69.90,null,0,20,'gloss-cherry-vizzela.png','gloss-cherry-vizzela-2.jpg','gloss-cherry-vizzela-3.jpg',3,24,4);   
--#endregion


--#region giovanna baby blue (Michael)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(25,'#7DBAF2','#A5D3FD','#BDDFFF');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Perfume Infantil Blue','Giovanna Baby','50ml',
'Blue Giovanna Baby Deo Colônia. Blue é um perfume Giovanna Baby infantil. Fragrância que representa as doces lembranças que merecem ser recordadas todos os dias.',
'Uma Releitura da embalagem, um ar de sofisticação, uma saudade. Tantas histórias vividas com Giovanna Baby Blue, lembranças doces que merecem ser recordadas todos os dias.
A colônia Blue de Giovanna Baby é composta por notas frescas associadas a um singelo bouquet floral de Jasmim, rosa e ylang-ylang em perfeita harmonia com fundo musk, vanilla, powdery enriquecido por um complexo amadeirado. 

Pirâmide Olfativa:
Topo: Jasmim.
Corpo: Rosa e Ylang-ylang.
Fundo: Musk, Vanilla e Powdery.

Ocasião:
Para todos os momentos do dia a dia.

Precauções:
Evite contato com os olhos. Caso aconteça enxague abundantemente. Não aplicar sobre a pele ferida ou irritada. Em caso de irritação ou alergia, suspenda o uso e procure orientação médica. Manter fora do alcance das crianças. Uso externo. PRODUTO DE USO ADULTO.

Composição:
Álcool etílico; caprilato de poliglicerila-3; perfume; água; benzoato de benzila; butilfenil metilpropional; cumarina; alfa-isometil ionona; limoneno; linalol.

Dica de Uso:
Com a ponta dos dedos ou a palma da mão aplique uma pequena porção da colônia e espalhe na região que deseja perfumar do seu corpo. Dê preferência as áreas como punho, pulso e pescoço para privilegiar a difusão da fragrância. Pode ser usada também como desodorante.',
90.33,77.90,1,23,'giovanna-baby-blue.png','giovanna-baby-blue-2.jpg','giovanna-baby-blue-3.jpg',7,25,3);
--#endregion


--#region giovanna baby classic (Michael)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(26,'#FFAAEA','#FFC2F0','#FFD1F4');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Perfume Infantil Classic','Giovanna Baby','50ml',
'Classic Giovanna Baby Eau de Cologne. Perfume Classic infantil floral Giovanna Baby. Fragrância que mescla notas frescas, delicadas e harmoniosas.',
'Perfume Classic Giovanna Baby é seguro para ser usado diretamente na pele de crianças de todas as idades e garante uma sensação de relaxamento após o uso. Traz notas de rosa chá combinada com o jasmim e o frescor do muguet. Já o fundo é encorpado pelo sândalo com um exclusivo toque de Musk.

Pirâmide Olfativa:
Topo: Lavanda, Rosa Chá.
Corpo: Jasmim e Muguet.
Fundo: Sândalo e Musk.

Ocasião:
Para todos os momentos do dia.

Precauções:
Evite contato com os olhos. Caso aconteça enxague abundantemente. Não aplicar sobre a pele ferida ou irritada. Em caso de irritação ou alergia, suspenda o uso e procure orientação médica. Manter fora do alcance das crianças. Uso externo. PRODUTO DE USO ADULTO.

Composição:
Álcool etílico; caprilato de poliglicerila-3; perfume; água; benzoato de benzila; butilfenil metilpropional; citral; citronelol; cumarina; geraniol; limoneno; linalol.

Dica de Uso:
Com a ponta dos dedos ou a palma da mão aplique uma pequena porção da colônia e espalhe na região que deseja perfumar do seu corpo. Dê preferência as áreas como punho, pulso e pescoço para privilegiar a difusão da fragrância. Pode ser usada também como desodorante.',
90.33,77.90,1,40,'giovanna-baby-pink.png','giovanna-baby-pink-2.jpg','giovanna-baby-pink-3.jpg',7,26,3);
--#endregion


--#region limpador facial sallve (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(27,'#d8d759','#FBFB6F','#FBFB9D');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Limpador Facial','Sallve','300ml',
'Gel de limpeza que remove maquiagem leve e limpa profundamente sem repuxar. Com niacinamida, extrato de moringa e livre de sulfatos.',
'Gel-espuma, livre de sulfatos, que limpa profundamente sem deixar a pele repuxando. Além de limpar, sua combinação de ativos auxilia a manter a hidratação da pele e é compatível com peles sensíveis.

Como usar:
1- Coloque sobre as mãos úmidas uma pequena quantidade do Limpador Facial;
2- Esfregue as mãos até formar uma espuma cremosa;
3- Aplique a espuma no rosto também úmido, inclusive na área dos olhos, massageando suavemente com movimentos circulares;
4- Enxágue com água em abundância e sinta na pele uma limpeza profunda com toque macio. 

Quando usar: 
Pela manhã, à noite ou quando quiser.',
79.90,null,0,30,'limpador-facial-sallve.png','limpador-facial-sallve-2.jpg','limpador-facial-sallve-3.jpg',9,27,6),   
--#endregion


--#region limpador enximatico sallve (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(28,'#763b8d','#a65ec2ff','#d18aecff');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Limpador Enzimático em Pó','Sallve','30g',
'Limpador em pó que forma uma espuma cremosa para limpar e esfoliar a pele em um só passo, diariamente. Renova a pele e reduz cravos em 7 dias.',
'Um limpador enzimático em pó, que forma uma espuma cremosa com sensorial macio. Une limpeza e uma poderosa esfoliação enzimática em um só passo, promovendo uma renovação diária eficaz mas gentil, sem ressecar. 
Com papaína e argila branca, já no primeiro uso limpa profundamente, uniformiza a textura, deixa a pele macia e viçosa e com aparência de poros reduzida. 
Ele também ajuda no controle da oleosidade, desobstrui poros e reduz a incidência de cravos em 7 dias. 

Como usar:
1- Coloque uma pequena quantidade nas mãos (vire de 5 a 8 vezes o frasco), acrescente um pouco de água e esfregue bem, até formar uma espuma cremosa;
2- Aplique a mistura na pele úmida do rosto, evitando a área dos olhos, e massageie suavemente com movimentos circulares. Deixe o produto na pele por até um minuto para intensificar a ação enzimática;
3- Em seguida, enxágue com água em abundância. 

Use no máximo uma vez por dia. 
Durante o dia, utilize protetor solar. 
Agite antes de usar.',
79.90,null,0,20,'limpador-enzimatico-sallve.png','limpador-enzimatico-sallve-2.jpg','limpador-enzimatico-sallve-3.jpg',10,28,6);    
--#endregion


--#region esfoliante facial sallve (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(29,'#735f9c','#9f85d3ff','#cdb6fcff');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Esfoliante Enzimático','Sallve','70g',
'Esfoliante facial com 3 tipos de esfoliação, incluindo enzimas de romã e partículas de bambu. Remove cravos e células mortas, deixando a pele renovada e radiante desde o primeiro uso e sem agredir a pele.',
'Com uma fórmula que combina 3 tipos de esfoliação: a física, a química e a enzimática. 
Possui em sua composição enzimas de romã e partículas de bambu, que remove progressivamente os cravos e as células mortas sem agredir a pele. 
Os alfa-hidroxiácidos (AHA) ajudam a renovar a pele, melhorando a textura e a deixando com mais brilho. Já as enzimas são responsáveis por “digerir” o acúmulo de células mortas na superfície da pele, que promove uniformização e viço. 

Como usar:
1- Limpe o rosto com seu produto de limpeza facial.
2- Seque a pele para melhor efeito.
3- Coloque uma pequena quantidade do esfoliante enzimatico nas mãos e massageie com delicadeza, em movimentos circulares e evitando a área dos olhos.
4- Enxágue com água em abundância, removendo todo o produto, e sinta na pele uma limpeza profunda com toque macio.
5- Use no máximo 2 vezes por semana, em dias alternados.',
74.90,null,0,20,'esfoliante-facial-sallve.png','esfoliante-facial-sallve-2.jpg','esfoliante-facial-sallve-3.jpg',10,29,6);    
--#endregion


--#region hidratante + hialuronico sallve (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(30,'#678ec2','#8AB2E5','#B5D0F2');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Hidratante Firmador e Ácido Hialurônico','Sallve','40g',
'Hidratante facial em gel com textura leve e de rápida absorção, ideal para peles mistas e oleosas. Contém Ácido hialurônico e fermentados vegetais na sua fórmula que controlam a oleosidade da pele.',
'É um hidratante em gel com textura leve e de rápida absorção. Pensado para uso diário principalmente em peles mistas e oleosas, mas que pode trazer benefícios para todos os tipos de pele. 

Com 8 formas e 3 diferentes pesos moleculares de ácido hialurônico, pantenol e fermentados vegetais, garante hidratação por até 48h, hidrata as diferentes camadas da pele e ajuda a amenizar a aparência de linhas finas. Já o cogumelo fu ling age para aumentar a luminosidade e o viço da pele.

Como usar:
1- Aplique ao redor da área dos olhos e em todo o rosto até o pescoço, massageando em movimentos ascendentes até a total absorção do produto.
2- Você pode usar pela manhã, à noite ou quando quiser, sempre sobre a pele limpa.',
89.90,null,0,20,'hidratante-firmador-sallve.png','hidratante-firmador-sallve-2.jpg','hidratante-firmador-sallve-3.jpg',11,30,6);    
--#endregion


--#region pro colageno sallve (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(31,'#2de8f9','#63F0FD','#9EF7FF');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Super Pró-Colágeno 10%','Sallve','30ml',
'Sérum com 10% de peptídeos que atuam na síntese de colágeno para uma pele mais firme, com mais volume e contornos mais definidos.',
'É um sérum super concentrado pensado para quem deseja aumentar a firmeza da pele.
Com 10% de peptídeos Matrixyl, peptídeos de cobre e ácido hialurônico, atua diretamente em todas as etapas da síntese de colágeno, o que contribui para aumentar o preechimento, a elasticidade e a sustentação da pele. O resultado é uma fórmula de alta performance que desacelera e reverte sinais do tempo, melhorando a definição de contornos da mandíbula, pescoço e colo.
Um tratamento poderoso que pode ser usado 1 vez ao dia, pela manhã ou à noite.

Como usar:
1- Aplique de 2 a 3 gotas no rosto e pescoço, massageando até a completa absorção. Pode ser usado pela manhã ou à noite;
2- Durante o dia, use protetor solar.

Observação: 
Durante a primeira semana de uso, aplique pequenas quantidades de produto, em dias alternados.
Não aplique nas pálpebras, nos cantos externos do nariz e da boca nem na pele irritada ou lesionada.',
129.90,89.90,1,20,'super-pro-colageno-sallve-1.png','super-pro-colageno-sallve-2.jpg','super-pro-colageno-sallve-3.jpg',14,31,6);   
--#endregion


--#region hidratante vitamina c sallve (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(32,'#cb9e74','#EAC099','#FFE2C7');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Antioxidante Hidratante Vitamina C','Sallve','35g',
'Sérum-gel antioxidante com nano vitamina C 10% para uma pele radiante. Controla a oleosidade da pele, previne linhas de expressão e manchas e diminui o inchaço de olheiras de cansaço.',
'É sérum-gel formulado com Nano Vitamina C a 10%, o que o torna altamente eficaz em proporcionar uma pele radiante e saudável. Ele simplifica sua rotina de cuidados com a pele, proporcionando hidratação equilibrada, controlando a oleosidade e reduzindo a ocorrência de cravos. Além disso, é eficaz na prevenção de linhas finas e na melhoria da aparência de manchas, olheiras e bolsas nos olhos.

Como usar:
1- Lave o rosto com seu limpador facial.
2- Aplique a Vitamina C Antioxidante Hidratante, 3 a 4 gotinhas são uma boa medida.
3- Espere secar antes de passar seus outros produtos de cuidados com a pele ou seu protetor solar.

Observações:
Esse uso pode render em torno de 120 aplicações, de 3 a 4 meses de uso.',
99.90,null,0,20,'antioxidante-hidratante.png','antioxidante-hidratante-2.jpg','antioxidante-hidratante-3.jpg',14,32,6);   
--#endregion


--#region mascara antiresseca sallve (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(33,'#794599','#9F65C3','#C994EB');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Máscara Antirresseca','Sallve','30g',
'Para acordar a pele e amenizar os sinais de cansaço; reduzir o inchaço e bolsas nos olhos, amenizar até as olheiras de cansaço.',
'É uma máscara criada pra acordar sua pele e amenizar os sinais de cansaço. Com textura em gel que não resseca, leva na composição a Taurina e o Extrato de Café, ingredientes poderosos pra ativar a microcirculação desinchando o rosto, olheiras de cansaço e iluminando a pele; a Aloe Vera e os Fermentados Vegetais que juntos potencializam a hidratação e acalmam a pele deixando uma sensação deliciosa em apenas 15 minutos de uso.

Por que ativar a Circulação: 
Cansaço, insônia e noites mal dormidas podem refletir na pele, com sinais como a desidratação, aparência opaca e inchaços. ativar a circulação reduz a aparência inchada e devolve a luminosidade da pele. 

Por que fermentados: 
Em um processo biotecnológico, os substratos vegetais são fermentados para desenvolverem ativos com propriedades multifuncionais como as funções calmantes, hidratantes e antioxidantes.

Como usar: 
1- Limpe o rosto com seu produto de limpeza facial.
2- Seque a pele para melhor efeito.
3- Aplique uma camada generosa da Máscara Antirressaca ao redor da área dos olhos e em todo o rosto.
4- Deixe agir por 15 minutos.
5- Enxágue com água ou remova apenas o excesso e sinta sua pele refrescada e iluminada.

Dica preciosa: 
Esfoliar levemente a pele antes potencializ o efeito de qualquer máscara de tratamento.
Quando usar:
Até 3 vezes por semana, em dias alternados.',
69.90,null,0,30,'mascara-antirresseca.png','mascara-antirresseca-2.jpg','mascara-antirresseca-3.jpg',12,33,6);    
--#endregion



--PRODUTOS DO MARCOS
--#region hidratante bob esponja (Eliana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(34,'#5B398F','#15AF93','#70F0D9');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Hidratante Cuide-se Bem Bob Esponja & Sandy Bochechas','O Boticário','200ml',
'Loção Desodorante Hidratante Cuide-se Bem Bob Esponja Sandy Bochechas 200ml.
Cuide-se Bem descobriu a fórmula secreta ideal para o seu momento de cuidado com a pele! Em edição limitada, a Loção Desodorante Hidratante Cuide-se Bem Bob Esponja Sandy Bochechas possui uma textura cremosa e entrega um cheirinho inspirado no abacaxi, para uma pele macia, perfumada e desodorizada.',
'Vocês estão prontos, botilovers? 
Estamos, capitão!
Já diria Sandy Bochechas: "yee-haw"!

É ano de festa na fenda do biquini! Celebramos os 25 anos do Bob Esponja, comemorado na Década do Oceano. Essa loção corporal vegana possui alta porcentagem de ingredientes naturais e embalagem feita com plástico vegetal.
Faça parte da tripulação ajudando a proteger o oceano! Quando seu produto acabar, descarte a embalagem em nossas lojas, e cuidaremos da reciclagem, combinado?

Pirâmide Olfativa:
Topo: Abacaxi com Hortelã, Flor de Maçã, Hawaianate (Abacaxi Tropical).
Corpo: Flor de Laranjeira LMR, Champagne Rosé, Flor de Lima da Pérsia.
Fundo: Pina Colada, Sândalo Cremoso, Musk Mineral.

Confira todos os benefícios:
- 97% ingredientes naturais²;
- Até 48 horas de hidratação​;
- Textura cremosa​;
- Com Manteiga de Karité e Glicerol: hidratação intensa.
- Absorve rapidinho; 
- Livre de parabenos, silicone e petrolatos;
- Cheirinho inspirado em abacaxi.

Como usar:
Com a pele seca, aplique e espalhe a loção sobre o corpo como desejar. Aproveite para completar seu ritual com os outros itens da linha Cuide-se Bem Bob Esponja.

Orientações ao consumidor:
Evite contato com os olhos. Não aplique em pele irritada ou lesionada e evite aplicar nas axilas. Descontinue o uso em caso de sensibilização. Conserve o produto bem fechado, longe da luz e do calor excessivo. Mantenha fora do alcance de crianças. Uso externo. Uso adulto. Contém ação desodorante.

Nenhum produto do Boticário é testado em animais, ou seja, este item possui selo Cruelty Free. Produto vegano.',
57.90,null,0,35,'cuide-se-bem-bob-esponja-1.png','cuide-se-bem-bob-esponja-2.jpg',null,23,34,2);
--#endregion


--#region 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(35,'#C0C0C0','#D6D6D6','#EAEAEA');
--#endregion

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Elástico de Concha do Mar',null,null,
'Elástico de cabelo com pingente em formato de concha metálica, elegante e perfeito para dar um toque sofisticado ao penteado.',
'Adicione um charme especial ao seu visual com este elástico de cabelo adornado com uma concha metálica prateada. Além de ser funcional e garantir firmeza ao prender os fios, ele é um acessório estiloso que remete ao universo marítimo, ideal para compor penteados delicados ou destacar um look casual com um toque de elegância. 
Confortável para uso diário, é perfeito para quem ama detalhes únicos e sofisticados.',
12.00,null,0,100,'elastico-de-concha-do-mar.png','elastico-de-concha-do-mar-2.png','elastico-de-concha-do-mar.png',18,35,5);
--#endregion


--#region 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(36,'#1EDCEA','#64edf7','#96f6fd');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Escova Secador Rotativa Rotating Hyaluronic','Conair',null,
'Rotating Hyaluronic é mais do que uma escova rotativa, é a combinação perfeita entre hidratação profunda, brilho incomparável e modelagem precisa, dando vida ao seu estilo e confiança para que seu cabelo conte a melhor versão da sua história.',
'A escova secadora rotativa é um aparelho versátil que proporciona um visual perfeito sem esforço. Além disso, esse dispositivo é uma excelente escolha para todos os tipos de cabelo. Confira mais sobre o modelo incrível da Polishop: a Rotating Hyaluronic Conair!

Ela combina a praticidade de uma escova rotativa com a inovadora e exclusiva tecnologia Hyaluronic Infused, que libera nanopartículas de ácido hialurônico com ação hidratante e preenchedora, ativadas durante o processo de modelagem. O resultado? Mais hidratação, mais proteção e mais brilho para cabelos mais fortes, cheios de vida e sem frizz na hora!

Conte com um cuidado revolucionário, que regenera a fibra capilar e preserva as características dos fios. Evita a quebra, o ressecamento e restaura o equilíbrio natural do cabelo. Ideal para os fios que sofrem ano após ano com poluição, banhos quentes, calor, procedimentos químicos, entre outros!

Por que usar a escova secadora rotativa?
A escova secadora rotativa é equipada com tecnologias avançadas que garantem um acabamento profissional e proteção aos cabelos. Além disso, esse aparelho de alta qualidade oferece durabilidade e eficiência mesmo com o uso constante.
A versatilidade também é um fator crucial. Uma escova secadora rotativa de qualidade permite criar uma ampla gama de estilos, desde cabelos lisos até cachos definidos. Por fim, o aparelho é prático para a rotina corrida, oferecendo uma alternativa a secadores, chapinhas e babyliss.

Tudo o que  a Rotating Hyaluronic proporciona:
- Seca, alisa e modela com apenas uma mão;
- Infusão de ácido hialurônico: boost de hidratação para os seus cabelos;
- Bivolt;
- Rotação dupla: finalize para dentro ou para fora;
- 2 tamanhos de escovas: modele pontas e franjas;
- Jatos de ar frio: cabelos alinhados e sem frizz.

Recursos:
- Bivolt;
- Infusão de ácido hialurônico, que hidrata e dá vida aos cabelos;
- Dois tamanhos de escova;
- Rotação dupla;
- Jato de ar frio;
- Para todos os tipos de cabelo;
- Capa protetora.',
999.90,809.91,1,30,'escova_secadora_rotativa_1.png','escova_secadora_rotativa_2.jpg','escova_secadora_rotativa_3.jpg',19,36,5);
--#endregion


--#region floratta my blue (Michael)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(37,'#0081B8','#279FD3','#66CAF5');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Floratta My Blue','O Boticário','75ml',
'Floratta My Blue Desodorante Colônia 75ml.
Inspirada no clássico Floratta Blue, linha de sucesso do Boticário, o novo Floratta My Blue traz uma fragrância inovadora, ainda mais envolvente e marcante, que explora um blend de Musks aliado a cremosidade do Sândalo e a floralidade e sofisticação da Íris.',
'Inspirada no clássico Floratta Blue, linha de sucesso do Boticário, o novo Floratta My Blue traz uma fragrância inovadora que explora um blend de Musks aliado a cremosidade do Sândalo e a floralidade e sofisticação da Íris.

Escolha ideal para quem para quem busca uma fragrância feminina que traz o sentimento de conforto.

Ingredientes:
Álcool Desnaturado; Água; Fragrância; Caprililglicol; Alfa-Isometil Ionona; Salicilato De Benzila; Citral; Cumarina; Geraniol; Limoneno; Linalol.

Como usar:
Borrife a fragrância nas áreas onde há maior circulação do sangue, como o pescoço, dobras do cotovelo e atrás das orelhas. Sinta a fragrância marcante de Floratta My Blue exalar no ar.   

Pirâmide olfativa:
Topo: Tangerina, Notas Aquosas (Melão, Melancia), Frutas Vermelhas.
Corpo: Gerânio, Verbena, Lírio do Vale, Íris.
Fundo: Sândalo, Blend de Musk, Patchouli, Notas de Pelica, Âmbar, Cashmeran.


Ocasião:
Fragrância feminina para ser usada durante o dia ou a noite.

Nenhum produto do Boticário é testado em animais, ou seja, este item possui selo Cruelty Free.',
159.90,111.90,1,30,'FLORATTA-DES-COL-MY-BLUE.png','FLORATTA-DES-COL-MY-BLUE-2.jpg','FLORATTAS-3.jpg',5,37,3);
--#endregion


--#region 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(38,'#02020A','#23305D','#4660BA');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Glamour Midnight Desodorante Colônia','O Boticário','75ml',
'Inspirado no mistério de uma noite estrelada, Glamour Midnight Desodorante Colônia entrega uma fragrância misteriosa e encantadora, que desperta novas sensações.',
'A noite cai e com ela surgem seus encantos e sedução…e através dessa intensidade hipnotizante,revela-se a mulher Glamour!
Da família Oriental Gourmand, exalta, de forma adocicada, a intensidade hipnotizante da noite através do exclusivo Acorde Hypnotic Dark: uma combinação de ingredientes em suas versões mais densas e sensuais, que traz as flores Immortelle e Night Orchid, envoltas por notas especiadas e balsâmicas.

Além disso, essa fragrância sofisticada da perfumaria feminina traz notas lacônicas e notas especiadas quentes de saída, fundo com muita textura de resinas e Patchouli que trazem calor desde a sua saída.
Ideal para ser aplicado diretamente na pele*, esse desodorante colônia entrega uma versão mais densa para envolver com todo o poder que a noite representa.

Como usar:
Aplique sobre o corpo como desejar reaplicando se necessário.

Pirâmide Olfativa:
Topo: Amêndoa, Tâmara, Ameixa Negra.
Corpo: Hypnotic Dark acorde, Night Orchid, Benjoim, Cacau, Especiarias Quentes.
Fundo: Patchouli, Acorde Leite Quente, Bálsamo do Peru, Âmbar.

Orientações ao consumidor:
- Inflamável.
- Evite contato com os olhos.
- Não aplique em pele irritada ou lesionada.
- Evite aplicar nas axilas.
- Descontinue o uso em caso de sensibilização.
- Conserve o produto bem fechado, longe da luz e do calor excessivo.
- Somente para uso externo.
- Mantenha fora do alcance de crianças.
- Produto para perfumar e desodorizar a pele, recomendamos não aplicar o produto em tecidos.

Ingrediente:
Álcool desnaturado; Perfume; Água; Octissalato; Avobenzona; Caprililglicol; Corante violeta 60730; Azul brilhante; Amarelo de tartrazina; Benzoato de benzila; Cinamato de benzila; Salicilato de benzila; Citronelol; Cumarina; Geraniol; Hexil cinamal; Limoneno; Linalol; Álcool benzílico.

Devido à presença de alguns ingredientes, a cor do produto pode variar, porém sem comprometer sua qualidade ou segurança.

Observação:
Devido à alta concentração de corantes utilizados neste produto, recomendamos que a aplicação de Glamour Midnight seja feita diretamente na pele e orientamos que é imprescindível aguardar até a completa absorção na pele antes de se vestir. 

Nenhum produto O Boticário é testado em animais, ou seja, este item possui selo Cruelty Free.',
184.90,null,0,40,'glamour-midnight.png','glamour-midnight-02.jpg','glamour-midnight-03.jpg',5,38,3);
--#endregion


--#region condicionador malbec (Maiara)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES
(39,'#070707','#595959','#ABABAB');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Condicionador Antiqueda Malbec','O Boticário','250ml',
'O Condicionador Antiqueda Malbec é feito para o homem que sofre com queda de cabelos e deseja revolucionar o modo de cuidar dos seus fios.',
'Para homens que estão sempre em busca de mudanças para o melhor, a linha Malbec Antiqueda dá mais vida aos seus cabelos e mais autoestima ao seu dia a dia!
Ideal para uso após o shampoo da linha, este condicionador incrementa a rotina de autocuidado para o homem. Com fórmula inovadora, contém extrato de semente de uva, ativo com ação antioxidante que auxilia nos cuidados com a pele. 

Com o uso contínuo, você consegue resultados de até 4x menos queda*, prolongando a vida e o crescimento dos fios já existentes, bem como o aumento da densidade capilar.

Como usar:
Após lavar os cabelos, aplique o condicionador nos fios, deixe agir por alguns minutos e enxágue. Para garantir os resultados, utilize diariamente a linha completa de Malbec Antiqueda.

Orientação ao consumidor:
- Evite contato com os olhos.
- Não aplique no couro cabeludo irritado ou lesionado.
- Descontinue o uso em caso de sensibilização.
- Conserve o produto bem fechado, longe da luz e do calor excessivo.
- Mantenha fora do alcance de crianças.

Ingrediente:
Água; Álcool cetoestearílico; Palmitato de isopropila; Cloreto de beentrimônio; Estearato de octila; Dimeticonol; Dimeticona; Perfume; Fenoxietanol; Álcool isopropílico; Amodimeticona; Gliconato de sódio; Dodecilbenzenosulfonato de trietanolamina; Polietilenoglicol-12 éter de álcool tridecílico; Cloreto de cetrimônio; Pantenol; Acetato de tocoferila; Nicotinamida; Álcool benzílico; Ácido láctico; Propilenoglicol; Propanodiol; Benzoato de sódio; Hidróxido de sódio; Óleo de rícino hidrogenado etoxilado; Arginina; Extrato do gérmen de glycine soja; Extrato do gérmen de Triticum vulgare; Poliuretano-39; Gluconolactona; Butilcarbamato de iodopropinila ; Extrato da raiz de Scutellaria baicalensis; Extrato da semente de Vitis vinifera; Sorbato de potássio; Sulfito de sódio; edetato trissódico; Ácido cítrico; Fenilpropanol; Gliconato de cálcio; Caprililglicol; Tocoferol; Citronelol; Cumarina; Limoneno; Linalol.

Nenhum produto O Boticário é testado em animais, ou seja, este item possui selo Cruelty Free.',
54.90,null,0,50,'malbec-condicionador-antiqueda-1.png','malbec-condicionador-antiqueda-2.jpg',null,15,39,5);
--#endregion


--#region esponja make oceane (Roberta)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(40,'#3E0D11','#8A151E','#BD515A');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Esponja de Maquiagem My Blend Vinho','Océane',null,
'A Esponja de Maquiagem My Blend Vinho é perfeita para aplicar maquiagens líquidas, cremosas ou em pó. Expande de tamanho quando molhada, absorvendo menos produto e proporcionando acabamento natural e uniforme.',
'A esponja de maquiagem já se tornou um item pra lá de necessário para quem ama uma pele com acabamento impecável. My Blend vai se tornar sua favorita na hora de se maquiar. Versátil, o produto aplica maquiagens líquidas, cremosas ou em pó com muita praticidade, deixando o resultado com aspecto profissional.

Essa esponja é maravilhosa porque imita os poros da pele, o que garante um acabamento natural e uniforme no rosto. My Blend conta com um design que tem um punho central que se encaixa melhor nas mãos, facilitando a aplicação da Maquiagem. Assim, até quem é iniciante no universo da maquiagem vai conseguir usá-la à vontade! Esse é o tipo de esponja que possui duas partes: uma ponta menor que cabe muito bem em regiões pequenas, como próximo aos olhos e nos cantos do nariz, e uma superfície grande, que cobre áreas maiores do rosto.

Além disso, My Blend pode ser usada tanto seca quanto molhada. Quer uma alta cobertura? Use a esponja seca. Mas se você quer aquele efeito natural maravilhoso, é só molhá-la antes de passar a maquiagem, o que também vai absorver menos produto.
My Blend é livre de látex.

Quais produtos posso aplicar com My Blend?
A versatilidade dessa esponja permite com que você aplique diversos tipos de produtos: base líquida, pó facial, corretivo, contorno…

Como lavar a esponja My Blend?
Para lavar a My Blend, basta enxaguá-la e usar um detergente neutro, massageando suavemente até sair a sujeira. Depois, enxague bem, retire o excesso de água espremendo a esponja com as mãos ou em uma toalha e deixe secar num lugar arejado ou ao ar livre.',
30.90,null,0,30,'oceane-my-blend-esponja-1.png','oceane-my-blend-esponja-2.jpg','oceane-my-blend-esponja-3.jpg',20,40,4);
--#endregion


--#region pinceis maquiagem (Roberta)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(41,'#C9758F','#DF90A9','#F5B8CB');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Pincéis de Maquiagem Profissionais Com Cabo Transparente',null,null,
'Transforme sua rotina de beleza com o nosso Conjunto de Escova de Maquiagem Premium, que inclui 16 pinceis cuidadosamente selecionados para atender todas as suas necessidades de maquiagem. Este conjunto é perfeito tanto para iniciantes quanto para maquiadores profissionais, oferecendo uma versatilidade inigualável para criar looks deslumbrantes.',
'O que Inclui:
Escova de Fundação Sintética - Ideal para aplicar bases líquidas ou cremosas, garantindo uma cobertura uniforme e um acabamento impecável.
Escova de Contorno de Pó Solto - Perfeita para esculpir o rosto e definir os traços, sua forma precisa permite um controle fácil durante a aplicação.
Escova de Olho - Versátil e compacta, perfeita para aplicar sombras, fazer esfumados e destacar o olhar.
Pincel Blush - Crie um efeito saudável nas bochechas com este pincel suave, que se adapta perfeitamente à pele.
Pincel de Corretivo - Com cerdas densas e precisas, este pincel garante uma cobertura perfeita para camuflar imperfeições.
Pincel para Delineador - Com uma ponta fina, é ideal para traços definidos e precisos.
Pincel para Lábios - Crie contornos perfeitos e preencha os lábios com precisão.
Pincel de Pó - Aplicação suave e uniforme de pós soltos ou compactos.
Pincel Bronzer - Adicione um toque de bronzeado e definição com facilidade.
Pincel Escultor - Perfeito para contornos mais precisos e detalhados.
Pincel Marcador - Para dar aquele destaque luminoso nas áreas certas do rosto.
Escova de Sobrancelha - Modela e define as sobrancelhas para um look polido e natural.
E muito mais. Cada pincel foi projetado com cerdas de alta qualidade para garantir um toque macio e uma aplicação eficaz.

Características:
Material de Alta Qualidade - As cerdas são feitas de material sintético premium, que é macio ao toque e livre de crueldade animal.
Design Elegante - Cada pincel possui um cabo ergonômico e um design sofisticado, perfeito para qualquer penteadeira.
Fácil Limpeza - As cerdas são fáceis de limpar, mantendo a higiene e prolongando a vida útil do produto.',
78.90,null,0,30,'pinceis_de_maquiagem_transparente-1.png','pinceis_de_maquiagem_transparente-2.jpg','pinceis_de_maquiagem_transparente-3.jpg',20,41,6);
--#endregion


--#region mascara de cilios essence (Viviane)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(42,'#080806','#DD51B1','#FC86D3');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Máscara de Cílios I Love Extreme','Essence','12ml',
'Máscara de cílios de volume com uma escova extra grande para cílios preenchidos.',
'A irmã “louquinha” da máscara de cílios I Love Extreme, para um volume ainda mais extremo! Sua fórmula cremosa e profundamente pigmentada envolve cada fio, enquanto o aplicador extra-grande de elastômero proporciona um efeito espetacular já na primeira aplicação.

Detalhes do Produto:
- Aplicador plástico extra-grande para um volume espetacular;
- Cobre cada fio individualmente com sua fórmula preta hiperpigmentada e cremosa;
- Oftalmologicamente testado.

Ingredientes:
AQUA (WATER), PARAFFIN, GLYCERYL STEARATE, SYNTHETIC BEESWAX, STEARIC ACID, BUTYLENE GLYCOL, ACACIA SENEGAL GUM, PALMITIC ACID, ORYZA SATIVA (RICE) BRAN WAX, POLYBUTENE, VP/EICOSENE COPOLYMER, AMINOMETHYL PROPANEDIOL, OZOKERITE, TROPOLONE, HYDROGENATED VEGETABLE OIL, STEARYL STEARATE, HYDROXYETHYLCELLULOSE, PHENOXYETHANOL, CI 77499 (IRON OXIDES).',
36.90,null,0,30,'rimel_I_Love_Extreme_-_Crazy_Volume_1.png','rimel_I_Love_Extreme_-_Crazy_Volume_2.jpg','rimel_I_Love_Extreme_-_Crazy_Volume_3.jpg',2,42,4);    
--#endregion


--#region 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(43,'#2F2F2F','#525252','#7A7A7A');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Secador Travel Dryer','Be Emotion',null,
'Que tal ter cabelos lindos até mesmo durantes suas viagens? O Secador Be emotion Travel Dryer está sempre à mão para criar o visual que você gosta, sem precisar de um salão de beleza!',
'Travel Dryer seca e modela seus cabelos rapidamente para que você esteja sempre pronta para o próximo compromisso. Leve e dobrável, ele é tão compacto que ocupa pouquíssimo peso e espaço em sua mala ou até mesmo na sua nécessaire.

Travel Dryer é bivolt e conta com 1100/900W de potência concentrada, que proporcionam cabelos secos e modelados em instantes. E para ainda mais possibilidades, são 2 velocidades que promovem um controle preciso de como você deseja seu penteado, enquanto o bico direcionador removível oferece melhor acabamento no seu para o seu visual.

Carcaterísticas do produto:
 - Bivolt;
 - Frequência 60 Hz;
 - Material: plástico, metal e borracha;
 - Potência: 1100/900W;
 - Peso: 330g',
259.92,null,0,30,'secador-de-cabelo-be-emotion-1.png','secador-de-cabelo-be-emotion-2.jpg','secador-de-cabelo-be-emotion-3.jpg',19,43,6);
--#endregion


--#region sérum Facial Antioxidante Vitamina C (Roberta)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(44,'#F68B00','#FFA018','#FFC87A');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Sérum Facial Antioxidante Vitamina C','Beyoung','30ml',
'Sérum com 18% de Nano Vitamina C e tripla ação antioxidante que ajuda a uniformizar o tom, suavizar linhas e deixar a pele mais macia, luminosa e com aparência saudável.',
'O Sérum Facial Vit C tem textura leve e acabamento acetinado. Sua fórmula reúne  18% de Nano Vitamina C, 0,5% de Ácido Ferúlico, 3% de Esqualano e 0,001% de Astaxantina, ativos poderosos que trabalham em sinergia para combater os radicais livres.

O sérum facial antioxidante tem como função prevenir o envelhecimento, reduzir linhas finas e trazer mais firmeza e luminosidade à pele, sem deixá-la oleosa. 

Principais ativos:
 - 18% Nano Vitamina C (nanoencapsulada): potente ação antioxidante; estimula a síntese de colágeno, uniformiza o tom e garante estabilidade prolongada e maior permeação;
 - 0,5% Ácido Ferúlico: antioxidante eficaz que protege contra os danos dos raios UV;
 - 3% Esqualano: restaura elasticidade e flexibilidade, forma barreira protetora para evitar a perda de água, e proporciona toque sedoso;
 - 0,001% Astaxantina: antioxidante ultrapotente (até 6 000 vezes mais eficaz que a vitamina C), protege contra dano UV e é responsável pela cor natural laranja do produto.

Dicas de uso:
 - Indicado para uso diário, de manhã e à noite, sobre a pele limpa e seca, aplicando antes do hidratante e, no período diurno, sempre antes do protetor solar para potencializar a proteção contra os raios UV.
 - Aplique 2 doses com o pump e massageie até completa absorção em rosto, pescoço e colo.
 
Como usar:
 - Com a pele limpa e seca, acione a válvula duas vezes do sérum facial vita c e aplique o produto massageando suavemente até completa absorção. Para uso diurno aplicar antes do protetor solar.

Dica Beyoung: 
Aplique VITA C 18 antes do protetor solar para aumentar a ação protetora contra os danos causados pelos raios UV. (Resultados obtidos através de um estudo in vivo de Determinação do Fator de Proteção Solar).

Composição:
ÁGUA, ÉTER DIETILENOGLICOL MONOETÍLICO, PROPANODIOL, ESQUALANO, GLICEROL, PROPILENOGLICOL, CROSPOLÍMERO-6 DE POLIACRILATO, ÁCIDO ASCÓRBICO, ÓLEO DE OLIVA, EXTRATO DE HAEMATOCOCCUS PLUVIALIS, ÓLEO DE GLYCINE MAX, TOCOFEROL, POLIETILENOGLICOL-12 DIMETICONA, DIMETICONA, FENOXIETANOL, ÁCIDO FREÚLICO, METABISSULFITO DE SÓDIO, HIDRÓXIDO DE SÓDIO, CLORETO DE SÓDIO, PERFUME, ETILEXILGLICERINA, EDETATO DISSÓDICO, ÁCIDO CÍTRICO.',
84.90,79.24,1,40,'Serum-Facial-Vitamina-C-1.png','Serum-Facial-Vitamina-C-2.png','Serum-Facial-Vitamina-C-3.png',14,44,6);
--#endregion


--#region Biopsor Shampoo Calmante Para Psoríase (Roberta)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(45,'#007F8E','#1198A7','#6ECED8');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Biopsor Shampoo Calmante Para Psoríase','Biozenthi','200ml',
'Biopsor shampoo calmante para auxiliar no controle da psoríase.',
'Descubra o poder dos ingredientes naturais para auxiliar no controle dos sintomas da Psoríase com o Biopsor Shampoo Calmante! Ele age proporcionando alívio e conforto para a pele.

LIVRE DE CORTICÓIDES.
Produto vegano, livre de glúten, parabenos, sulfatos e metais pesados. Não testado em animais.

Principais benefícios:
 - Ação calmante: Auxilia aliviando a coceira e a vermelhidão, promovendo conforto imediato à pele sensibilizada.
 - Hidratação intensa: Ajuda a manter a couro cabeludo e os fios hidratados, combatendo o ressecamento comum em casos de psoríase.
 - Limpeza suave: Limpa a couro cabeludo sem agredir ou ressecar, preservando a saúde da pele e do cabelo.
 - Redução da descamação: Auxilia no controle da descamação, proporcionando um couro cabeludo mais equilibrado e livre de descamações.
 - Propriedades regeneradoras: Contribui para a regeneração da pele afetada pela psoríase.
 - Com óleo essencial: Possui em sua fórmula o óleo essencial de menta que auxilia reduzindo a coceira e promove textura refrescante na pele.

Ingredientes principais:
 - Piritionato de Zinco: Ajuda a reduzir a inflamação e a descamação da pele.
 - Extrato de Jaborandi: Auxilia na melhoria da circulação do couro cabeludo, estimulando o crescimento saudável dos fios e aliviando a irritação.
 - Extrato de Alecrim: Possui propriedades antioxidantes e anti-inflamatórias que ajudam a aliviar a irritação e promover a cicatrização.
 - Extrato de Aloe Vera: Auxilia acalmando e hidratando profundamente
 - Óleo de Rosa Mosqueta: Promove a regeneração celular e hidratação profunda,
 - Óleo de Arruda: Ajuda a aliviar a inflamação, reduzir a irritação e promover a regeneração.
 - Sulfato de Magnésio: Auxilia reduzindo a inflamação e acalmando a pele. 
 - Entre outros ativos que em conjunto atuam reduzindo os sintomas da Psoríase.

Como usar:
Aplique em todo o couro cabeludo úmido, massageie e deixe agindo por pelo menos 3 minutos. Após, enxágue em água abundante. Repita a aplicação nas primeiras semanas de uso.
Aplique primeiro o shampoo nos cabelos úmidos e enxague após concluir o banho, desta maneira o shampoo irá agir por mais tempo. 

Composção:
Aqua (Agua), Vitis Vinifera Seed Oil (Óleo de Semente de Uva), Sodium C14-16 Olefin Sulfonate (Sulfonato de olefina de sódio), Glycerin (Glicerina), Decyl Glucoside (Decil Glucosídeo), Butyrospermum parkii butter (Manteiga de karité), Polyquaternium-7, Cocos nucifera Oil (Óleo de coco extra virgem), Hydroxypropyl guar (Goma guar), Aloe barbadensis Extract (Extrato de aloe vera), Rosa Canina Fruit Oil (Oleo de rosa mosqueta), Zinc Pyrithione (Piritionato de zinco), Pilocarpus pennatifolius leaf extract (Extrato de jaborandi), Magnesium sulfate (Sulfato de magnésio), Azadirachta Indica Seed Oil (Oleo de neem), Phenoxyethanol (Fenoxietanol), Ruta Graveolens Leaf Extract (Oleo de arruda), Mentha Piperita Oil (Oleo essencial menta pimenta), Caprylyl Glycol (Caprilil glicol).',
59.90,null,0,20,'shampoo-biopsor-vegano-1.png','shampoo-biopsor-vegano-2.jpg','shampoo-biopsor-vegano-3.jpg',15,45,6);
--#endregion


--#region Shampoo Match. Proteção da Cor (Maiara)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(46,'#8A0F1F','#981D2D','#C84C5C');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Shampoo Match. Proteção da Cor','O Boticário','250ml',
'O Shampoo Match. Proteção da Cor é a escolha ideal para cuidar dos cabelos tingidos durante o banho! Sua fórmula cremosa promove limpeza suave e previne o desbotamento dos fios coloridos. O uso contínuo da linha garante cor prolongada e mais radiante por até 40 dias.',
'O shampoo para cabelo colorido possui fórmula expert que dá match com o seu cabelo! Ele ainda é ideal para adicionar no seu cronograma capilar, confira os benefícios:
 · Limpa os fios sem ressecar;
 · Fórmula com espuma cremosa;
 · Reduz o desbotamento da cor durante o banho;
 · Multiproteção da cor contra agressões externas;
 · Fragrância que deixa o cabelo super cheiroso.

Cabelos coloridos pedem um cuidado especial. Match. Proteção da Cor, com filtro UV e Vitaminas, possui um sistema anti desbotamento que fixa a tintura no interior da fibra capilar, garantindo multiproteção da cor enquanto hidrata profundamente os fios.

Como usar:
 · Aplique o shampoo nos cabelos molhados fazendo uma massagem suave. Enxágue bem.
 · Pode ser usado diariamente ou sempre que necessário.

Orientação ao consumidor:
Evite contato com os olhos. Não aplique no couro cabeludo irritado ou lesionado. Descontinue o uso em caso de sensibilização. Conserve o produto bem fechado, longe da luz e do calor excessivo. Mantenha fora do alcance de crianças. Não usar em crianças. Dermatologicamente testado.

Ingredientes:
Água; Lauriletersulfato De Sódio; Cocoamidopropilbetaína; Fragrância; Diestearato De Peg-3; Coco-Glicosídeo; Monoleato De Glicerila; Dimeticonol; Fenoxietanol; Glicerol; Cloreto De Goma Guar Hidroxipropiltrimônio; Crospolímero De Acrilatos/Acrilato De Alquila C10-30; Hidróxido De Sódio; Pantenol; Acetato De Tocoferila; Ácido Cítrico; Cloreto De Cinamidopropiltrimônio; Edetato Dissódico; Ácido Benzoico; Propilenoglicol; Dodecilbenzenosulfonato De Tea; Proteína Da Semente De Oryza Sativa; Octinoxato; Ácido Fítico; Extrato De Oryza Sativa; Proteína De Trigo Hidrolisada; Proteína De Milho Hidrolisada; Proteína De Soja Hidrolisada; Gluconolactona; Benzoato De Sódio; Extrato Da Flor De Helianthus Annuus; Tocoferol; Álcool Feniletílico; Sorbato De Potássio; Caprililglicol; Citrato De Glicerídeos De Palma Hidrogenados; Polissorbato 20; Cloreto De Potássio; Ácido Láctico; Gliconato De Cálcio; Butilcarbamato De Iodopropinila; Butil-Hidroxitolueno; Alfa-Isometil Ionona; Cumarina; Hexil Cinamal; Limoneno; Linalol 

Nenhum produto do Boticário é testado em animais, ou seja, este item possui selo Cruelty Free. Shampoo vegano.',
45.90,null,0,40,'shampoo-match-protecao-da-cor-1.png','shampoo-match-protecao-da-cor-2.jpg',null,17,46,5);
--#endregion


--#region 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(47,'#2B2B2B','#525252','#858585');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Uomini Black Colônia','O Boticário','100ml',
'Envolta em mistério, essa fragrância masculina combina notas quentes de especiarias, como Pimenta Preta e Cardamono, com o calor envolvente do âmbar. ',
'Uomini sabe que em todo homem existe uma alma questionadora, que sonha levar uma vida mais autêntica. 

Inspirados nessa inquietação, Uomini Black Desodorante Colônia, clássico da perfumaria O Boticário, se reinventa com a mesma fragrância potente e ousada, mas com nova embalagem – afinal, a vida é curta demais para não quebrar regras e viver a vida de maneira intensa.

Família Olfativa: Oriental especiado.

Pirâmide Olfativa:
Topo: Pimenta Preta, Cardamomo, Tomilho, Coriandro. 
Corpo: Folhas de Canela, Gerânio, Patchouli, Pimenta de Java Head Space. 
Fundo: mbar, Fava Tonka, Musk, Baunilha.

Como usar:
Borrife a fragrância nas áreas onde há maior circulação do sangue, como o pescoço, dobras do cotovelo e atrás das orelhas. Para sentir a sua fragrância favorita por mais tempo, mantenha a sua pele sempre hidratada com nossos produtos de corpo e banho. 

Orientação ao consumidor:
Inflamável. Evite contato com os olhos. Não aplique em pele irritada ou lesionada e evite aplicar nas axilas. Caso ocorra irritação e/ou prurido no local, suspenda o uso imediatamente. Descontinue o uso em caso de sensibilização. Conserve o produto bem fechado, longe da luz e do calor excessivo. Somente para uso externo. Mantenha fora do alcance de crianças. Produto para perfumar e desodorizar a pele. Devido à presença de alguns ingredientes, a cor do produto pode variar, porém sem comprometer sua qualidade ou segurança. 

Nenhum produto do Boticário é testado em animais, ou seja, este item possui selo Cruelty Free.

Ingredientes:
ÁLCOOL DESNATURADO; ÁGUA; PERFUME; CAPRILATO DE POLIGLICERILA-3; CINAMALDEÍDO; CITRAL; CITRONELOL; CUMARINA; EUGENOL; GERANIOL; HEXIL CINAMAL; LIMONENO; LINALOL.',
194.90,180.99,1,40,'uomini-black-01.png','uomini-black-02.jpg',null,6,47,3);
--#endregion


--Mais produtos

--#region Protetor Solar Facial Anthelios FPS 60 (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(48,'#F76601','#F98634','#FFC852');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Protetor Solar Facial Anthelios FPS 60','La Roche-Posay','40g',
'O La Roche-Posay Anthelios XL Protect é um protetor solar facial sem cor, com textura gel creme, oil free (livre de óleos) e de rápida absorção, que proporciona 8h de hidratação e uma pele sequinha e protegida, sem deixar resíduos brancos.',
'O Protetor Solar Anthelios XL Protect é indicado para todos os tipos de pele, inclusive as oleosas, já que sua composição é oil free. Sua fórmula enriquecida com vitamina e, possui ação antioxidante e protege a pele não só contra os raios UVA/UVB, mas também contra a ação dos radicais livres. Além disso, conta com a tecnologia XL Protext, que proporciona maior resistência do filme protetor, mesmo em condições extremas.

Como usar:
Aplique de forma abundante sobre a pele antes da exposição ao sol, preferencialmente 30 minutos antes. Para manter a efetividade do Protetor Solar La Roche-Posay, reaplique o produto a cada 2 horas durante a exposição, principalmente após sudorese intensa, nadar ou secar-se com a toalha.

Benefícios e diferenciais:
 . Alta proteção contra raios UVA/UVB, com FPS 60 e PPD 25.
 . Possui ação antioxidante.
 . Previne o fotoenvelhecimento.
 . Hidrata a pele por até 8 horas.
 . Fórmula enriquecida com água termal La Roche-Posay.
 . Não deixa resíduos brancos na pele.
 . Não contém parabenos.
 
Advertências:
 . Uso externo. 
 . Não ingerir.
 . Caso haja contato com os olhos, lave-os abundantemente. 
 . Se houver irritação, suspenda o uso imediatamente e procure orientação médica.
 . Mantenha fora do alcance das crianças.
 
Composição:
Aqua / Water, Homosalate, Ethylhexyl Salicylate, Silica, Styrene/Acrylates Copolymer, Ethylhexyl Triazone, Bis-Ethylhexyloxyphenol Methoxyphenyl Triazine, Drometrizole Trisiloxane, Butyl Methoxydibenzoylmethane, Aluminum Starch Octenylsuccinate, Octocrylene, C12-15 Alkyl Benzoate, Glycerin, Pentylene Glycol, Potassium Cetyl Phosphate, Dimethicone, Perlite, Propylene Glycol, Terephthalylidene Dicamphor Sulfonic Acid, Titanium Dioxide, Triethanolamine, Phenoxyethanol, Stearyl Alcohol, Isopropyl Lauroyl Sarcosinate, Peg-8 Laurate, Caprylyl Glycol, Inulin Lauryl Carbamate, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Tocopherol, Xanthan Gum, Disodium Edta, Aluminum Hydroxide, Stearic Acid, Zinc Gluconate.',
89.90,73.62,1,40,'anthelios-la-roche-posay.png','anthelios-la-roche-posay-2.jpg','anthelios-la-roche-posay-3.jpg',13,48,5);
--#endregion


--#region Gel de Limpeza Mela B3 (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(49,'#6621A0','#8D2EDE','#B975F5');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Gel de Limpeza Mela B3','La Roche-Posay','120ml',
'O Mela B3 Gel de Limpeza da La Roche-Posay é a solução nº1 para quem deseja uma limpeza antimanchas eficaz.',
'Formulado com o exclusivo ativo patenteado Melasyl, desenvolvido após 18 anos de pesquisa para corrigir e prevenir manchas¹ como nunca antes, o gel também contém Niacinamida e 1% de PHA (ácido polihidroxilado) para proporcionar uma esfoliação suave e gentil, limpando sem ressecar. O resultado é uma pele mais uniforme, radiante, renovada e com manchas corrigidas.

Característica:
 . Corrige manchas da pele, diferenças de tonalidade e manchas pós-acne.
 . Eficácia clínica comprovada em todos os tons de pele.
 . Previne o reaparecimento.
 
Como usar:
 . Fazer espuma com uma noz de produto na mão previamente molhada.
 . Utilizar de manhã e de noite.
 . Aplique sobre o rosto, pescoço, colo ou mão, massageando suavemente. Enxaguar em seguida.

Dica de  uso:
Evitar contato direto com os olhos. Utilizar Anthelios Ultracover FPS 60 na rotina da manhã.',
102.90,89.52,1,80,'mela-b3-la-roche-1.png','mela-b3-la-roche-2.jpg','mela-b3-la-roche-3.jpg',14,49,2);
--#endregion


--#region Preenchedor de Rugas Q10 Expert Antissinais (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(50,'#F5D132','#FBDE60','#FFEEA3');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Preenchedor de Rugas Q10 Expert Antissinais','Nivea','15ml',
'O NIVEA Preenchedor Q10 Expert Antissinais é um preenchedor de linhas de expressão com resultados visíveis em 5 minutos.',
'NIVEA Preenchedor Q10 Expert Antissinais é um creme com fórmula exclusiva que gera resultados visíveis em apenas 5 minutos.
Serve para proporcionar melhora instantânea em rugas e linhas de expressão. Sua fórmula avançada atua rapidamente, reduzindo as rugas com uso contínuo.

Benefícios:
 . Anti-idade;
 . Firmador;
 . Todos os tipos de pele.

Destaques do produto:
 . Melhora a aparência das rugas e linhas de expressão em 5 minutos.
 . Com Q10 puro e Peptídeos de Bioxifil.
 . Melhora instantaneamente a aparência das rugas.
 . Aplicação localizada.
 . 5% de complexo ativo.

Como usar:
 . Aplicar em suas linhas e rugas na testa, ao redor dos olhos e dobras nasolabiais com o aplicador fácil de usar;
 . Espalhe o conteúdo uniformemente com a ponta dos dedos;
 . Use 2 vezes ao dia.

Aviso:
Uso externo. Evite contato com os olhos. Caso aconteça, enxágue com água em abundância. Em caso de irritação, suspenda o uso e procure orientação médica. Manter em local seco e arejado, ao abrigo de luz e fora do alcance de crianças.

Ingredientes:
Aqua, Dimethicone, Glycerin, Dimethicone Crosspolymer, Methylpropanediol, Alcohol Denat., Coco-Caprylate/Caprate, Octyldodecanol, Dicaprylyl Ether, Silica, Cetearyl Alcohol, Glyceryl Stearate, Tapioca Starch, Ubiquinone, Pimpinella Anisum Fruit Extract, Sodium Hyaluronate, Creatine, 1-Methylhydantoin-2-Imide, Panthenol, Pantolactone, Tocopherol, Sodium Cetearyl Sulfate, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Citric Acid, Trisodium EDTA, Sodium Chloride, Sodium Sulfate, Sodium Hydroxide, Phenoxyethanol, CI 77891, CI 77491, CI 15985, Parfum',
93.99,null,0,40,'nivea-antissinais-1.png','nivea-antissinais-2.jpg','nivea-antissinais-3.jpg',14,50,3);
--#endregion


--#region Gel Hidratante Facial (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(51,'#75B427','#95CE50','#BCE58B');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Gel Hidratante Facial','Nivea','100g',
'Hidratante em gel NIVEA com ácido hialurônico e pepino. Textura mais leve que o creme facial. Não obstrui os poros e hidrata por 24h. Cuide bem da sua pele!',
'NIVEA Hidratante Facial Gel é um aliado essencial para quem busca cuidar da pele de maneira eficaz e refrescante.
Este hidratante em gel é formulado com ácido hialurônico e pepino, proporcionando uma textura mais leve do que os cremes faciais tradicionais. Ele é especialmente projetado para peles oleosas, garantindo um equilíbrio perfeito de hidratação e controle da oleosidade. Uma das vantagens deste produto é sua capacidade de não obstruir os poros, permitindo que a pele respire livremente. Além disso, seu efeito refrescante revitaliza a pele do rosto, mantendo-a bem cuidada e hidratada por 24 horas. Com NIVEA Hidratante Facial Gel você pode desfrutar de uma pele livre de oleosidade, radiante e revigorada.

Destaques do produto:
 - Hidratação ideal para pele oleosa.
 - Sua fórmula especial deixa a pele sequinha e bem cuidada por 24 horas.
 - Não obstrui os poros e hidrata a pele por 24 horas.
 - Sensação de pele limpa.
 - Refresca e hidrata a pele do rosto.
 - Com ácido hialurônico e pepino.
 - Prolonga o efeito de maquiagem.

Como usar:
 - Limpe seu rosto antes de aplicá-lo.
 - Aplique na testa, do centro para fora, em movimentos circulares.
 - Aplique entre as sobrancelhas até o alto das bochechas.
 - Massageie as maçãs do rosto em movimentos circulares.

Ingredientes:
Aqua, Glycerin, PEG-8, Ceteareth-20, Sodium Hyaluronate, Cucumis Sativus Juice, Ammonium Acryloyldimethyltaurate/VP Copolymer, Phenoxyethanol, Ethylhexylglycerin, Sodium Benzoate, Lactic Acid, Potassium Sorbate, Alpha-Isomethyl Ionone, Citronellol, Linalool, Parfum

Ingredientes especiais:
 - Ácido hialurônico e estrato de pepino.',
30.58,null,0,60,'nivea-hidratanteemgel-1.png','nivea-hidratanteemgel-2.jpg','nivea-hidratanteemgel-3.jpg',11,51,3);
--#endregion


--#region Creme Hidratante Facial Para Pele Negra (bRUNA)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(52,'#BB9796','#D6B2B1','#ECD0CF');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Creme Hidratante Facial Para Pele Negra','Nivea','100g',
'Creme hidratante facial NIVEA Beleza Radiante desenvolvido especialmente para as necessidades da pele negra. Ideal para pele oleosa, pois controla a oleosidade e promove um efeito matte.',
'NIVEA Hidratante Facial 7 em 1 Beleza Radiante é um creme hidratante desenvolvido especialmente para atender às necessidades da pele negra. Sua fórmula única contém ingredientes como Ácido Hialurônico, Extrato de Pérolas e Cúrcuma, que proporcionam benefícios incríveis para a pele. 

Este hidratante oferece 7 benefícios em 1 só produto: reduz a aparência de marcas escurecidas, controla a oleosidade, uniformiza o tom de pele, ilumina, hidrata, possui proteção UVA/UVB e proporciona um efeito matte.
A textura leve e de rápida absorção do NIVEA Hidratante Facial 7 em 1 Beleza Radiante permite uma aplicação diária no rosto limpo. 

Destaques do produto:
 - Reduz aparência de marcas escurecidas.
 - Controla a oleosidade e promove um efeito matte.
 - Uniformiza o tom da pele, ilumina e hidrata.
 - Oferece proteção UVA/UVB.
 - Proporciona um efeito matte de longa duração.

Como usar:
 - Limpe seu rosto antes de aplicá-lo.
 - Aplique na testa, do centro para fora, em movimentos circulares.
 - Aplique entre as sobrancelhas até o alto das bochechas.
 - Massageie as maçãs do rosto em movimentos circulares.

Precauções: 
 - Uso externo.
 - Evite contato com os olhos. Caso aconteça, enxágue com água em abundância.
 - Em caso de irritação, suspenda o uso e procure orientação médica.
 - Manter em local seco e arejado, ao abrigo de luz e fora do alcance de crianças.
 - Este produto não é um protetor solar.',
30.58,null,0,50,'nivea-hidratante-pelenegra-1.png','nivea-hidratante-pelenegra-2.png','nivea-hidratante-pelenegra-3.png',11,52,3);
--#endregion


--#region Creme Hidratante Facial Nutritivo (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(53,'#3488BC','#49A2DA','#77C0EE');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Creme Hidratante Facial Nutritivo','Nivea','100g',
'Hidratante NIVEA para o rosto que cuida sem deixar a pele oleosa. Textura leve de rápida absorção.',
'NIVEA Creme Facial Nutritivo é um hidratante para o rosto que cuida da pele sem deixá-la oleosa.

Com fórmula à base de água, Karité e Vitaminas, esse creme deixa a pele com aspecto saudável e bonito. Além disso, ele funciona como um ótimo primer, preparando a pele para a aplicação da maquiagem. Com benefícios como hidratação por 24 horas e não deixar a pele oleosa, o Creme Facial NIVEA Nutritivo é perfeito para quem busca uma pele bem cuidada e pronta para o dia a dia.

O NIVEA Creme Facial Nutritivo é um verdadeiro aliado para o cuidado da pele do rosto, oferecendo uma solução abrangente para manter a sua pele saudável, hidratada e preparada para o dia a dia.

Destaques do produto:
 - Hidratação por 24 horas.
 - Prepara a pele para a maquiagem.
 - Não deixa a pele oleosa.
 - Nutre intensamente.
 - Contém manteiga de Karité.
 - Refresca a pele.
 - Rápida absorção.
 - Deixa a pele com aparência radiante.

Como usar:
 - Limpe seu rosto antes de aplicá-lo.
 - Aplique na testa, do centro para fora, em movimentos circulares.
 - Aplique entre as sobrancelhas até o alto das bochechas.
 - Massageie as maçãs do rosto em movimentos circulares.

Precauções:
 - Uso externo.
 - Evite contato com os olhos. Caso aconteça, enxágue com água em abundância.
 - Em caso de irritação, suspenda o uso e procure orientação médica.
 - Manter em local seco e arejado, ao abrigo de luz e fora do alcance de crianças.

Ingredientes:
Aqua, Glycerin, Butyrospermum Parkii Butter, Cetyl Palmitate, Olus Oil, Cetyl Alcohol, Isopropyl Palmitate, Dimethicone, Sodium Polyacrylate, Phenoxyethanol, Linalool, Citronellol, Alpha-Isomethyl Ionone, Geraniol, Limonene, Parfum, Sodium Hydroxide.

Ingrediente especial: 
Manteiga de karité',
30.27,null,0,45,'nivea-hidratante-nutritivo-1.png','nivea-hidratante-nutritivo-2.png',null,11,53,4);
--#endregion


--#region Creme Hidratante Facial Antissinais (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(54,'#A80529','#CF022D','#EA5373');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Creme Hidratante Facial Antissinais','Nivea','100g',
'Hidratante facial NIVEA que reduz sinais e linhas de expressão. Sua fórmula leve e de rápida absorção hidrata intensamente, sem deixar a pele oleosa.',
'NIVEA Creme Facial Antissinais é um hidratante facial diário que reduz sinais e linhas de expressão.

Com uma fórmula leve e de rápida absorção, este creme proporciona uma hidratação intensa de até 30 horas e o mais importante: sem deixar a pele com aspecto oleoso. Por possuir ingredientes hidro nutrientes e Vitamina E, NIVEA Creme Facial Antissinais previne as rugas, melhora a cicatrização e ainda protege a pele contra os raios UVA/UVB. Além disso, sua fórmula exclusiva firma a pele e ainda reduz linhas de expressão, deixando-a muito mais jovem e saudável.

Destaques do produto
 - Reduz rugas e firma a pele.
 - Hidratação intensa sem deixar a pele oleosa.
 - Com vitamina E, antioxidante poderoso.
 - Deixa a pele com aparência mais jovem.
 - Melhora a cicatrização.
 - Fórmula leve de rápida absorção.
 - Torna a pele mais firme e reduz linhas de expressão.
 - Protege contra raios UVA/UVB.

Como usar:
 - Limpe seu rosto antes de aplicá-lo.
 - Aplique na testa, do centro para fora, em movimentos circulares.
 - Aplique entre as sobrancelhas até o alto das bochechas.
 - Massageie as maçãs do rosto em movimentos circulares.

Ingredientes:
Parfum, Citronellol, Geraniol, Linalool, Trisodium EDTA, Phenoxyethanol, Ethylhexylglycerin, Sodium Hydroxide, Sodium Polyacrylate, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Xanthan Gum, Butyl Methoxydibenzoylmethane, Dimethicone, Tocopheryl Acetate, Cetyl Alcohol, Cetyl Palmitate, Butyrospermum Parkii Butter, Ethylhexyl Salicylate, Glycerin, Aqua.',
30.27,null,0,40,'nivea-hidratante-antissinais-1.png','nivea-hidratante-antissinais-2.jpg','nivea-hidratante-antissinais-3.jpg',11,54,6);
--#endregion


--#region Sérum Facial Cellular Com Ácido Hialurônico (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(55,'#BABABA','#C4C6CA','#DEDEDE');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES
('Sérum Facial Cellular Com Ácido Hialurônico','Nivea','30ml',
'NIVEA Cellular Sérum com Ácido Hialurônico que restaura a proteção natural da pele e oferece hidratação profunda.',
'NIVEA Sérum Facial Cellular com Ácido Hialurônico é um produto de cuidados projetado para oferecer uma hidratação profunda e restaurar a proteção natural da pele.

Este sérum inovador contém uma fórmula rica, com destaque para o Ácido Hialurônico e o Hidra Complex, que trabalham em conjunto para ativar as células da pele. Sua fórmula é rapidamente absorvida, proporcionando uma sensação refrescante à medida que penetra profundamente na pele.

Os benefícios deste sérum são notáveis. Ele suaviza a pele, aumenta a elasticidade, restaura a proteção natural da pele e, acima de tudo, fornece hidratação profunda. Isso resulta em uma pele com aparência mais saudável, radiante e revitalizada. 

Destaques do produto:
 - Suaviza visivelmente a superfície da pele.
 - Promove sensação de elasticidade à pele.
 - Restaura a proteção natural da pele.
 - Oferece hidratação profunda.
 - Redução de rugas.

Como usar:
Aplique 3-4 gotas pela manhã e à noite no rosto e pescoço previamente limpos.

Precauções:
 - Uso externo.
 - Evite contato com os olhos. Caso aconteça, enxágue com água em abundância.
 - Em caso de irritação, suspenda o uso e procure orientação médica.
 - Manter em local seco e arejado, ao abrigo de luz e fora do alcance de crianças.',
132.99,null,0,40,'nivea-serum-hialuronico-1.png','nivea-serum-hialuronico-2.jpg','nivea-serum-hialuronico-3.jpg',14,55,5);
--#endregion


--#region Sérum Reparador Diário Acne Control (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(56,'#018E7E','#03B59F','#3BDECB');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Sérum Reparador Diário Acne Control','Nivea','30ml',
'O NIVEA Sérum Reparador Diário Acne Control hidrata, acalma e controla a oleosidade, fortalecendo a barreira da pele para um cuidado completo.',
'O NIVEA Sérum Reparador Diário Acne Control foi desenvolvido especialmente para peles com tendência à acne, proporcionando um cuidado diário que promove uma pele saudável e equilibrada. Sua fórmula exclusiva combina ácido hialurônico, pró-vitamina B5 e niacinamida, ingredientes conhecidos por melhorar a aparência da pele e combater a acne. 

O NIVEA Sérum Reparador Diário Acne Control é o parceiro ideal para equilibrar, acalmar e hidratar a pele do rosto. Com uma fórmula avançada, ele fortalece a barreira cutânea enquanto ajuda a controlar a oleosidade, promovendo um cuidado completo para uma pele mais saudável. 

Destaques do produto:
 - Equilibra a pele
 - Ajuda a controlar a oleosidade
 - Fortalece a barreira da pele
 - Hidrata e acalma
 - Sem perfume
 - Dermatologicamente e clinicamente testado

Ingredientes:
 - Não inclui Perfume.
 - Aqua, Glycerin, Alcohol Denat., Niacinamide, Glycyrrhiza Inflata Root Extract, Sodium Hyaluronate, Panthenol, Pantolactone, Ceteareth-20, Cellulose Gum, 1,2-Hexanediol, Sodium Chloride, Sodium Sulfate, Citric Acid, Phenoxyethanol, CI 42090, CI 16035.
 - Ingredientes especiais: Ácido Hialurônico e Provitamina B5.',
75.50,60.99,1,59,'nivea-acne-control-1.png','nivea-acne-control-2.jpg',null,14,56,6);
--#endregion


--#region Hidratante Protetor Controle do Brilho & Oleosidade (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(57,'#177D26','#249B36','#7EED8D');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Hidratante Protetor Controle do Brilho & Oleosidade','Nivea','50ml',
'Hidratante NIVEA Controle do Brilho & Oleosidade para o rosto, ideal para quem tem pele mista a oleosa. Textura leve e fórmula oil free.',
'NIVEA Hidratante Protetor Nivea Controle do Brilho & Oleosidade é um produto projetado especialmente para peles mistas a oleosas.

Sua fórmula eficaz ajuda a controlar a produção excessiva de óleo, resultando em uma pele com aparência saudável e livre de brilho indesejado. Um dos principais ingredientes deste hidratante é o extrato de algas marinhas, que desempenha um papel fundamental no controle da oleosidade.

Destaques do produto
 - Textura leve.
 - Fórmula Oil Free.
 - Protege contra os raios UVA/UVB.
 - Algas marinhas ajudam a controlar o brilho e oleosidade da pele.
 - Contém Vitamina E, antioxidante, para uma pele mais saudável e bem cuidada.

Como usar:
 - Limpar o rosto antes de aplicá-lo.
 - Aplique o creme massageando delicadamente sua pele com pequenos movimentos circulares. Ideal para uso diário.

Precauções:
 - Uso externo.
 - Evite contato com os olhos. Caso aconteça, enxágue com água em abundância.
 - Em caso de irritação, suspenda o uso e procure orientação médica.
 - Manter em local seco e arejado, ao abrigo de luz e fora do alcance de crianças.
 - Este produto não é um protetor solar.

Ingredientes :
 - Aqua, Homosalate, Butyl Methoxydibenzoylmethane, Ethylhexyl Salicylate, Octocrylene, Methylpropanediol, Distarch Phosphate, Glycerin, Ethylhexyl Stearate, Phenylbenzimidazole Sulfonic Acid, Glyceryl Glucoside, Tocopheryl Acetate, Fucus Vesiculosus Extract, Sodium Chloride, Dimethicone, Caprylic/Capric Triglyceride, Cetearyl Alcohol, Glyceryl Stearate, Sodium Stearoyl Glutamate, Chondrus Crispus Extract, Ammonium Acryloyldimethyltaurate/VP Copolymer, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Xanthan Gum, Trisodium EDTA, Phenoxyethanol, Methylparaben, Citronellol, Geraniol, Benzyl Alcohol, Linalool, Parfum, Sodium Hydroxide
 - Ingredientes ativos: Vitamina E.
 - Ingredientes Especiais: Algas Marinhas.',
34.99,null,0,50,'nivea-controle-do-brilho-1.png','nivea-controle-do-brilho-2.jpg','nivea-controle-do-brilho-3.jpg',11,57,2);
--#endregion


--#region hidratante labial rosé (Roberta)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(58,'#E9647F','#F77D95','#FBA7B8');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Hidratante Labial Hidra Color Rosé','Nivea','4.80g',
'O NIVEA Hidra Color Rosé oferece proteção, cuidado e cor intensa com uma nova fórmula avançada 3 em 1. Ideal para o uso diário, protege os lábios contra ressecamento, raios UVA/UVB e promove uma hidratação de longa duração para o uso diário.',
'NIVEA Hidra Color Rosé é a combinação ideal de uma cor intensa com um cuidado diário para os seus lábios. Sua nova fórmula avançada 3 em 1 oferece 24h de hidratação, cor intensa para os lábios e bochechas e proteção contra raios UVA/UVB. Livre de óleo mineral, enriquecida com manteiga de karité, óleo de amêndoas orgânico e vitamina E. 

NIVEA Hidra Color Rosé vai muito além da beleza, promovendo hidratação de longa duração e protegendo os lábios do ressecamento e contra raios UVA/UVB com FPS 30. Possui uma cremosidade que desliza de maneira fácil e uniforme, com acabamento rosé intenso. Ajuda a proteger contra a perda de colágeno nos lábios. Auxilia na proteção contra a perda de colágeno induzida pelo sol (teste in vitro). O colágeno é conhecido por manter os lábios volumosos e firmes. 

Destaques do produto:
 - Protege os lábios contra o ressecamento.
 - 24h de hidratação.
 - Fórmula 3 em 1: Cuidado, proteção e cor intensa.
 - Cor para lábios e bochechas.
 - Proteção contra raios UVA/UVB.
 - Apropriado para uso diário.
 - Dermatologicamente testado.

Precauções:
 - Uso externo.
 - Em caso de irritação, suspenda o uso e procure orientação médica.
 - Manter em local seco e arejado e fora do alcance de crianças.
 - Não deixe o produto exposto ao sol.

Ingredientes:
Ricinus Communis Seed Oil, Cocoglycerides, Cera Alba, Octyldodecanol, Helianthus Annuus Seed Cera, Butyl Methoxydibenzoylmethane, Ethylhexyl Salicylate, Cetearyl Alcohol, CI 77891, Ethylhexyl Triazone, Hydrogenated Castor Oil, Tocopheryl Acetate, Tocopherol, Ascorbyl Palmitate, Helianthus Annuus Seed Oil, Aroma, Menthol, CI 15850, CI 77491.',
23.19,null,0,70,'nivea-hidra-color-rose-1.png','nivea-hidra-color-rose-2.jpg','nivea-hidra-color-rose-3.jpg',11,58,6);
--#endregion


--#region hidratante labia vermelho (Roberta)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(59,'#B01C38','#DC1E41','#F95875');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Hidratante Labial Hidra Color Vermelho','Nivea','4.80g',
'O NIVEA Hidra Color Vermelho oferece proteção, cuidado e cor intensa com uma nova fórmula avançada 3 em 1. Ideal para o uso diário, protege os lábios contra ressecamento, raios UVA/UVB e promove uma hidratação de longa duração para o uso diário.',
'NIVEA Hidra Color Vermelho é a combinação ideal de uma cor intensa com um cuidado diário para os seus lábios. Sua nova fórmula avançada 3 em 1 oferece 24h de hidratação, cor intensa para os lábios e bochechas e proteção contra raios UVA/UVB. Livre de óleo mineral, enriquecida com manteiga de karité, óleo de amêndoas orgânico e vitamina E.

NIVEA Hidra Color Rosé vai muito além da beleza, promovendo hidratação de longa duração e protegendo os lábios do ressecamento e contra raios UVA/UVB com FPS 30. Possui uma cremosidade que desliza de maneira fácil e uniforme, com acabamento rosé intenso. Ajuda a proteger contra a perda de colágeno nos lábios. Auxilia na proteção contra a perda de colágeno induzida pelo sol (teste in vitro). O colágeno é conhecido por manter os lábios volumosos e firmes.

Destaques do produto:
 - Protege os lábios contra o ressecamento.
 - 24h de hidratação.
 - Fórmula 3 em 1: Cuidado, proteção e cor intensa.
 - Cor para lábios e bochechas.
 - Proteção contra raios UVA/UVB.
 - Apropriado para uso diário.
 - Dermatologicamente testado.

Precauções:
 - Uso externo.
 - Em caso de irritação, suspenda o uso e procure orientação médica.
 - Manter em local seco e arejado e fora do alcance de crianças.
 - Não deixe o produto exposto ao sol.

Ingredientes:
 - Não inclui Óleo mineral.
 - Octyldodecanol, Cocoglycerides, Ricinus Communis Seed Oil, Cera Alba, Helianthus Annuus Seed Cera, Cetearyl Alcohol, Hydrogenated Castor Oil, Butyrospermum Parkii Butter, Aroma, Prunus Amygdalus Dulcis Oil, Tocopherol, Tocopheryl Acetate, Ascorbyl Palmitate, Helianthus Annuus Seed Oil, CI 77491, CI 15850.
 - Ingredientes especiais: Óleo de Amêndoa, Pura Vitamina E, Manteiga de Karité.',
23.19,null,0,70,'nivea-hidra-color-vermelho-1.png','nivea-hidra-color-vermelho-2.jpg','nivea-hidra-color-vermelho-3.jpg',11,59,6);
--#endregion


--#region hidratante labial coral (Roberta)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(60,'#EB6D70','#EB8387','#FCACAF');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Hidratante Labial Hidra Color Coral','Nivea','4.80g',
'O NIVEA Hidra Color Coral oferece proteção, cuidado e cor intensa com uma nova fórmula avançada 3 em 1. Ideal para o uso diário, protege os lábios contra ressecamento, raios UVA/UVB e promove uma hidratação de longa duração para o uso diário.',
'NIVEA Hidra Color Coral é a combinação ideal de uma cor intensa com um cuidado diário para os seus lábios. Sua nova fórmula avançada 3 em 1 oferece 24h de hidratação, cor intensa para os lábios e bochechas e proteção contra raios UVA/UVB. Livre de óleo mineral, enriquecida com manteiga de karité, óleo de amêndoas orgânico e vitamina E. 

NIVEA Hidra Color Rosé vai muito além da beleza, promovendo hidratação de longa duração e protegendo os lábios do ressecamento e contra raios UVA/UVB com FPS 30. Possui uma cremosidade que desliza de maneira fácil e uniforme, com acabamento rosé intenso. Ajuda a proteger contra a perda de colágeno nos lábios. Auxilia na proteção contra a perda de colágeno induzida pelo sol (teste in vitro). O colágeno é conhecido por manter os lábios volumosos e firmes.

Destaques do produto:
 - Protege os lábios contra o ressecamento.
 - 24h de hidratação.
 - Fórmula 3 em 1: Cuidado, proteção e cor intensa.
 - Cor para lábios e bochechas.
 - Proteção contra raios UVA/UVB.
 - Apropriado para uso diário.
 - Dermatologicamente testado.

Precauções:
 - Uso externo.
 - Em caso de irritação, suspenda o uso e procure orientação médica.
 - Manter em local seco e arejado e fora do alcance de crianças.
 - Não deixe o produto exposto ao sol.

Ingredientes:
Ricinus Communis Seed Oil, Cocoglycerides, Cera Alba, Octyldodecanol, Helianthus Annuus Seed Cera, Butyl Methoxydibenzoylmethane, Ethylhexyl Salicylate, Cetearyl Alcohol, CI 77891, Ethylhexyl Triazone, Hydrogenated Castor Oil, Tocopheryl Acetate, Tocopherol, Ascorbyl Palmitate, Helianthus Annuus Seed Oil, Aroma, Menthol, CI 15850, CI 15985, CI 77492',
23.19,null,0,70,'nivea-hidra-color-coral-1.png','nivea-hidra-color-coral-2.jpg','nivea-hidra-color-coral-3.jpg',11,60,6);
--#endregion


--#region hidratante labial amora shine (Roberta)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(61,'#6A1E4C','#963570','#B84F8C');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Hidratante Labial Amora Shine','Nivea','5.50g',
'Com manteiga de karité, óleo de abacate e de jojoba, NIVEA Hidratante Labial Amora Shine hidrata os lábios por 24 horas e possui um delicado brilho bordô.',
'NIVEA Hidratante Labial Amora Shine é um produto que oferece cuidado e proteção por 24 horas, de forma suave e confortável.

Este hidratante labial possui óleos naturais em sua composição, proporcionando hidratação profunda. Com um atraente aroma de amora e pigmentos brilhantes, ele acrescenta uma cor delicada aos lábios. Livre de óleos minerais, NIVEA Hidratante Labial Amora Shine tem uma aplicação uniforme dispensa o uso de espelho.

A embalagem é reciclável, reforçando seu compromisso com o meio ambiente. Dermatologicamente testado, é uma escolha confiável para lábios irresistíveis. Experimente o toque radiante da amora com Nivea Amora Shine. 

Destaques do produto:
 - Hidratação prolongada.
 - Aroma de amora.
 - Pigmentos brilhantes.
 - Cor delicada e suave aos lábios.
 - Cuidado intensivo para os lábios.

Aviso:
Não ingerir. Uso externo. Em caso de irritação, suspenda o uso e procure orientação médica. Manter em local seco e arejado e fora do alcance de crianças. Não deixe o produto exposto ao sol.

Ingredientes:
 - Não inclui Óleo mineral.
 - Ingredientes especiais: Óleo de abacate.',
23.19,null,0,70,'nivea-hidra-color-amora-1.png','nivea-hidra-color-amora-2.jpg','nivea-hidra-color-amora-3.jpg',11,61,6);
--#endregion


--#region Sabonete Facial em Gel Equilíbrio Nutritivo (Roberta)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(62,'#0071C1','#248CD6','#80CAFF');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Sabonete Facial em Gel Equilíbrio Nutritivo','Nivea','150g',
'Sabonete Facial em Gel Equilíbrio Nutritivo limpa profundamente sem ressecar, removendo impurezas e mantendo a hidratação natural da pele. Enriquecido com flor de lótus, Hydramine e vitamina E, proporciona frescor. Ideal para o uso diário.',
'NIVEA Sabonete Facial em Gel Equilíbrio Nutritivo foi cuidadosamente desenvolvido para oferecer uma limpeza profunda, sem agredir ou ressecar a pele. Sua fórmula nutritiva preserva o equilíbrio natural da pele, garantindo uma sensação de saúde e revitalização.

Com uma fórmula enriquecida com flor de lótus, Hydramine e vitamina E, o sabonete revigora a pele, removendo impurezas enquanto mantém a hidratação e proporciona uma sensação refrescante após o uso. 

Destaques do produto:
 - Limpa profundamente sem ressecar.
 - Revigora a pele mantendo sua hidratação natural equilibrada.
 - Contém vitamina E, antioxidante para uma pele mais saudável e bem cuidada.
 - Refresca a pele.
 - Protege a barreira natural de hidratação da pele.
 - Fórmula vegana - sem ingredientes de origem animal.
 - Livre de microplásticos.
 - Dermatologicamente testado.

Modo de uso:
Aplique o produto no rosto úmido, com movimentos circulares e suaves. Enxágue abundantemente com água. Evite contato com os olhos. Use pela manhã e à noite.

Ingredientes:
 - Aqua, Cocamidopropyl Betaine, Sodium Myreth Sulfate, Acrylates Copolymer, Glycerin, Nelumbo Nucifera Flower Extract, Tocopherol, Tocopheryl Acetate, Lauryl Glucoside, Sodium Lauryl Sulfate, PEG-40 Hydrogenated Castor Oil, PEG-200 Hydrogenated Glyceryl Palmate, Benzophenone-4, Sodium Chloride, Polyquaternium-10, Sodium Hydroxide, Phenoxyethanol, Methylparaben, Ethylparaben, Sodium Sulfate, Geraniol, Benzyl Alcohol, Linalool, Triethanolamine, Parfum, CI 42090, CI 16035.
 - Ingredientes especiais: Pura Vitamina E.',
27.59,null,0,60,'sabonete-facial-gel-nivea.png','sabonete-facial-gel-nivea-2.jpg',null,9,62,);
--#endregion


--#region Lenços de Limpeza Facial Ação Refrescante 25 Unidades (Roberta)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(63,'#00519A','#2778BE','#60A8E6');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES
('Lenços de Limpeza Facial Ação Refrescante 25 Unidades','Nivea',null,
"Lenços de Limpeza Ação Refrescante 3 em 1 removem maquiagem e máscaras para cílios à prova d'água, enquanto limpam, hidratam e refrescam a pele. Enriquecidos com extrato de flor de lótus e Pró-Vitamina B5 e Hidramina, protegem contra o ressecamento, proporcionando uma limpeza suave e eficaz.",
"NIVEA Lenços de Limpeza Ação Refrescante 3 em 1 são lenços de limpeza suaves e eficazes, ideais para remover maquiagem, inclusive máscara à prova d’água. Além de limpar profundamente, eles hidratam e refrescam a pele, proporcionando uma sensação revigorante. 

Os lenços removem até a maquiagem mais resistente e máscaras à prova d'água, deixando a pele limpa e fresca. Enriquecidos com extrato de flor de lótus, limpam suavemente o rosto, enquanto o Complexo Suave com Pró-Vitamina B5 e Hidramina protege a pele contra o ressecamento.

Destaques do produto:
 - Remove maquiagem e máscara para cílios à prova d'água.
 - Limpa a pele profundamente.
 - Hidrata e Refresca a pele.
 - Dermatologicamente e oftalmologicamente testado.
 - Remove os resíduos e impurezas da pele.
 - Limpa a pele gentilmente.

Ingredientes:
 - Aqua, Isopropyl Stearate, Nelumbo Nucifera Flower Extract, Panthenol, Glycerin, VP/Hexadecene Copolymer, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Ethylhexylglycerin, Decylene Glycol, Phenoxyethanol, Sodium Hydroxide, Citric Acid, Pantolactone, Linalool, Linalyl Acetate, Citronellol, Limonene, Citrus Aurantium Peel Oil, Geraniol, Alpha-Isomethyl Ionone, Benzyl Alcohol, Hexyl Cinnamal, Terpineol, Benzyl Salicylate, Geranyl Acetate, Cananga Odorata Oil/Extract, Parfum.
 - Ingredientes especiais: Provitamina B5.",
20.99,null,0,60,'lenços-limpeza-nivea.png','lenços-limpeza-nivea-2.jpg',22,63,);
--#endregion


--#region Mousse de Limpeza Facial Refrescante (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(64,'#00649E','#2599D9','#61C5FF');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Mousse de Limpeza Facial Refrescante','Nivea','150ml',
'Mousse de Limpeza Facial Refrescante limpa profundamente, removendo impurezas enquanto preserva a hidratação sem ressecar. Ideal para uma rotina de cuidados, e uma pele macia e refrescante.',
'O NIVEA Mousse de Limpeza Facial Refrescante limpa profundamente a pele sem ressecar. Sua fórmula é enriquecida com flor de Lótus, Vitamina E e Hydramine, ativo conhecido por proteger a barreira natural de hidratação da pele. 

NIVEA Mousse de Limpeza Facial Refrescante é indicado para uma limpeza diária profunda, ideal para todos os tipos de pele. Remove resíduos e impurezas enquanto preserva a hidratação natural da pele, proporcionando uma sensação de limpeza, frescor e suavidade após o uso.

Destaques do produto:
 - Limpa profundamente sem ressecar.
 - Proporciona uma ótima experiência de limpeza, graças à sua fórmula de espuma suave.
 - Dermatologicamente testado.
 - Refresca a pele.
 - Uso diário.
 - Embalagem feita de 97% de material reciclado - excluindo-se etiqueta, válvula e tampa.
 - Fórmula vegana (sem ingredientes de origem animal) & 99% biodegradável.

Modo de uso:
A fórmula se transforma em uma mousse macia quando usada. Massageie a espuma de limpeza na pele e retire com água. Aplique 2 vezes ao dia.

Ingredientes:
 - Aqua, Sorbitol, Glycerin, Decyl Glucoside, Disodium Cocoyl Glutamate, Tocopheryl Acetate, Nelumbo Nucifera Flower Extract, Cellulose Gum, Citric Acid, Sodium Benzoate, Propylene Glycol, Parfum.
 - Ingredienes especiais: Pura vitamina E.

Aviso:
Uso externo. Evite contato com os olhos. Caso aconteça, enxágue com água em abundância. Em caso de irritação, suspenda o uso e procure orientação médica. Manter em local seco e arejado, ao abrigo de luz e fora do alcance de crianças.',
33.59,null,0,70,'mousse-limpeza-nivea-1.png','mousse-limpeza-nivea-2.jpg',null,9,64,);
--#endregion


--#region Água Micelar Efeito Matte (Roberta)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(65,'#82B590','#A1D0AE','#C7F0D2');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES
('Água Micelar Efeito Matte','Nivea','200ml',
'Água Micelar Solução de Limpeza 7 em 1 Efeito Matte é uma solução de limpeza que possui complexo de aminoácidos e algas marinhas sendo ideal para remover todas as impurezas da pele, inclusive resíduos de maquiagem.',
'Água micelar que oferece 7 benefícios em um só produto. Limpa, hidrata, remove a oleosidade, tonifica, demaquila, acalma e refresca.

Com fórmula poderosa, esta solução de limpeza retira todas as impurezas da pele, inclusive resíduos de maquiagem. Indicado para pele mista a oleosa. 

Destaques do produto:
 - Limpa profundamente.
 - Demaquila.
 - Matifica.
 - Remove o excesso de oleosidade.
 - Suaviza.
 - Purifica.
 - Efeito detox.
 - 0% Resíduo de Produto.

Modo de uso:
 - Agite bem antes de usar. 
 - Use pela manhã e à noite com o auxílio de um algodão, limpando todo o rosto.
 - Para remover a maquiagem dos olhos com maior eficácia, deixe o algodão umedecido com o produto agir por alguns segundos sobre os olhos bem fechados.
 - Não é necessário enxaguar.
 
Ingredientes:
Aqua, Poloxamer 124, Alcohol, Fucus Vesiculosus Extract, Camellia Sinensis Leaf Extract, Glycerin, Sorbitol, Propylene Glycol, Decyl Glucoside, Sodium Chloride, Sodium Cocoyl Glutamate, Citric Acid, Caprylic/Capric Triglyceride, Polyquaternium-10, PEG-40 Hydrogenated Castor Oil, Sodium Sulfate, Sodium Acetate, Trisodium EDTA, 1,2-Hexanediol, Phenoxyethanol.

Aviso:
Uso externo. Em caso de irritação, suspenda o uso e procure orientação médica. Manter em local seco e arejado, ao abrigo de luz e fora do alcance de crianças.',
26.19,null,0,50,'agua-micelar-nivea-1.png','agua-micelar-nivea-2.png','agua-micelar-nivea-3.jpg',9,65,);
--#endregion


--#region  Esfoliante Peeling Antissinais Chronos Derma (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(66,'#B27E33','#DB9B3F','#FFC87A');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Esfoliante Peeling Antissinais Chronos Derma','Natura','15g',
'Esfoliante facial vegano e cruelty free com bioativo de cacau, que uniformiza a textura da pele, reduz linhas finas e devolve o brilho natural. Promove renovação celular intensa com efeito peeling de tripla esfoliação (química, física e enzimática), deixando a pele mais macia, luminosa e revitalizada desde o primeiro uso.',
'Benefícios:
• Uniformiza a textura e reduz linhas finas imediatamente.
• Suaviza a aparência de pele cansada.
• Devolve o brilho natural e a vitalidade.
• 95% pele mais uniforme, renovada e macia.
• O uso prolongado potencializa os resultados.
• Máxima potência na renovação celular.
• Efeito peeling tripla esfoliação, com união de esfoliantes químico, físico e enzimático.

Características:
• Possui bioativo: Cacau, repõe componentes essenciais da pele.
• Testado dermatologicamente.
• Idade sugerida: 18+.
• Cruelty free.
• Vegano.
• Ocasião: limpeza.
• Tipo de pele: todos os tipos de pele.
• Textura: esfoliante.
• Zona de aplicação: rosto e pescoço.

Dicas de uso:
Após a limpeza da pele, aplique o produto sobre o rosto molhado. massageie suavemente e enxágue em seguida. use de uma a duas vezes na semana, em dias alternados.

Ingredientes:
Aqua / water / eau, bambusa arundinacea stem powder, glycolic acid, glycerin, coco-caprylate, coconut alkanes, elaeis guineensis oil / elaeis guineensis (palm) oil, propanediol, stearyl alcohol, sodium hydroxide, glyceryl stearate, papain, parfum / fragrance, cetyl lactate, sodium acrylates copolymer, peg-100 stearate, glyceryl dipalmitate, glyceryl palmitate, glyceryl distearate, xanthan gum, lecithin, sodium benzoate, disodium edta, theobroma cacao seed butter / theobroma cacao (cocoa) seed butter / theobroma cacao (cacau) seed butter, citronellol, tocopherol, alpha-isomethyl ionone, cetyl alcohol, sodium carbonate, conobea scoparioides leaf oil / conobea scoparioides (pataqueira) leaf oil, sodium chloride.',
30.20,18.50,1,70,'esfoliante-facial-natura-1.png', 'esfoliante-facial-natura-2.jpg', 'esfoliante-facial-natura-3.jpg',10,66,)
--#endregion


--#region Sabonete Líquido Esfoliante para o Corpo Ekos Maracujá (Eliana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(67,'#D3A603','#F0BE0F','#FFDE66');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Sabonete Líquido Esfoliante para o Corpo Ekos Maracujá','Natura','185ml',
'Sabonete líquido esfoliante vegano com óleo de maracujá, que limpa suavemente e remove as células mortas enquanto mantém o pH natural da pele. Proporciona um banho relaxante e revigorante, deixando a pele macia, uniforme e delicadamente perfumada.',
'Benefícios:
• Limpa suavemente e esfolia com a potência antiestresse do maracujá.
• Seu sabonete líquido esfoliante favorito mudou, mas continua com textura e fragrância relaxante de sempre.
• Remove as células mortas durante o banho.
• Promove sensação de banho relaxante.
• Sabonete vegano que mantém o pH natural da pele.
• Deixa sua pele renovada e mais uniforme.
• Feito com óleo de maracujá, rico em ácidos graxos essenciais.
• A linha Ekos Maracujá fortalece a renda de 876 famílias guardiãs da natureza.

Características:
• Possui bioativo: maracujá.
• Testado dermatologicamente..
• Cruelty free.
• Vegano.
• Tipo de pele: todos os tipos de pele.

Dica de uso:
Espalhe o sabonete líquido esfoliante de Natura Ekos sobre o corpo até formar espuma. enxágue em seguida. não utilizar o sabonete corporal no rosto.

Ingredientes:
ÁGUA, DECIL GLICOSÍDEO, COCOIL GLUTAMATO DE SÓDIO, GLICEROL, PROPANODIOL, BEENATO DE ESTEARILA, CROSPOLÍMERO DE ACRILATOS/ACRILATO DE ALQUILA C10-30, PERFUME, COCOATO DE SACAROSE, COCOIL GLUTAMATO DISSÓDICO, ÉSTERES DA JOJOBA, HIDROXIACETOFENONA, SEMENTE DE MARACUJÁAZEDO EM PÓ, HIDRÓXIDO DE SÓDIO, LIMONENO, GLICONATO DE SÓDIO, HEXIL CINAMAL, ALFA-ISOMETIL IONONA, ÓLEO DA SEMENTE DE MARACUJÁ-AZEDO, CARBONATO DE SÓDIO, AMARELO DE TARTRAZINA, CLORETO DE SÓDIO, ÁCIDO CÍTRICO, SULFATO DE SÓDIO, TOCOFEROL.',
54.90,38.40,1,70,'esfoliante-corporal-ekos-natura-1.png', 'esfoliante-corporal-ekos-natura-2.jpg' ,'esfoliante-corporal-ekos-natura-3.jpg',26,67,);
--#endregion


--#region Polpa Esfoliante para o Corpo Ekos Castanha (Eliana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(68,'#B05C36','#BF734F','#DD9573');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Polpa Esfoliante para o Corpo Ekos Castanha','Natura','200g',
'Esfoliante corporal vegano com óleo de castanha, rico em ômegas 6 e 9, que remove impurezas e células mortas enquanto nutre profundamente. Deixa a pele macia, renovada e com um toque aveludado, mantendo a fragrância envolvente e o cuidado sustentável da linha Ekos Castanha.',
'Benefícios:
• Pele macia e renovada com a potência antirressecamento da castanha.
• Seu esfoliante favorito mudou, mas continua com textura e fragrância deliciosas.
• Esfoliante corporal feito com óleo bruto de castanha, rico em ômegas 6 e 9.
• Deixa a pele macia e renovada.
• Possui partículas esfoliantes que ajudam a remover impurezas e células mortas.
• A linha Ekos Castanha contribui para a regeneração da Amazônia e ajuda a fortalecer a renda de 689 famílias guardiãs da floresta ligadas à colheita sustentável.

Características:
• Possui bioativo: castanha.
• Testado dermatologicamente.
• Cruelty free.
• Vegano.
• Tipo de pele: todos os tipos de pele.
• Textura: esfoliante.

Dicas de uso:
Use o esfoliante corporal Natura Ekos durante o banho. aplique sobre a pele e massageie com movimentos circulares, exceto no rosto. realize a esfoliação corporal com Ekos Castanha 1 a 2 vezes por semana.

Ingredientes:
SUCROSE, DICAPRYLYL ETHER, ELAEIS GUINEENSIS OIL, HELIANTHUS ANNUUS SEED OIL, RICINUS COMMUNIS SEED OIL, ORYZA SATIVA BRAN CERA, ASTROCARYUM MURUMURU SEED BUTTER, SUCROSE COCOATE, THEOBROMA GRANDIFLORUM SEED BUTTER, PARFUM, PALMITIC ACID, AQUA, STEARIC ACID, BERTHOLLETIA EXCELSA SEED OIL, SILICA, GLYCERYL DIPALMITATE, GLYCERYL PALMITATE, LINUM USITATISSIMUM SEED POWDER, GLYCERYL DISTEARATE, GLYCERYL STEARATE, TOCOPHEROL, LINALOOL, BENZYL SALICYLATE, LIMONENE, COUMARIN, ALPHA-ISOMETHYL IONONE.',
95.90,85.90,1,80,'esfoliante-corporal-castanha-natura-1.png', 'esfoliante-corporal-castanha-natura-2.jpg', 'esfoliante-corporal-castanha-natura-3.jpg',26,68,);
--#endregion


--#region Sabonete em Barra Puro Vegetal Esfoliante Ekos (Eliana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(69,'#6F4285','#764C8B','#9971AD');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Sabonete em Barra Puro Vegetal Esfoliante Ekos','Natura',null,
'Kit com 4 sabonetes em barra veganos — castanha, maracujá, açaí e andiroba — que limpam sem ressecar e mantêm a hidratação natural da pele. Com óleos da biodiversidade amazônica, proporcionam fragrâncias envolventes, toque suave e renovação da pele em cada banho.',
'Contém uma caixa com 4 sabonetes em barra de 100 gramas cada, sendo 1 castanha, 1 maracujá, 1 açaí e 1 andiroba.

Benefícios:
• Pele limpa e protegida com a potência dos ativos amazônicos.
• O sabonete Ekos que você conhece e ama ganhou uma nova embalagem.
• Limpa sem ressecar.
• Sabonete esfoliante que ajuda arenovar a pele.
• 4 fragrâncias deliciosas para perfumar o corpo.
• Sabonetes veganos que mantêm a hidratação natural da pele.
• Feitos com óleos da biodiversidade brasileira.
• A linha Ekos contribui para regeneração da floresta e ajuda a fortalecer a renda de famílias guardiãs da Amazônia.

Características:
• Testado dermatologicamente.
• Cruelty free.
• Vegano.
• Tipo de pele: todos os tipos de pele.

Dica de uso:
Deslize o sabonete em barra de Natura Ekos por todo o corpo até formar espuma, exceto no rosto. enxágue em seguida.

Ingredientes:
INGREDIENTES/ INGREDIENTES (PORTUGUÊS): SODIUM PALMITATE/ PALMITATO DE SÓDIO, SODIUM OLEATE/ OLEATO DE SÓDIO, AQUA/ ÁGUA, GLYCERIN/ GLICEROL, SODIUM LINOLEATE/ LINOLEATO DE SÓDIO, SODIUM LAURATE/ LAURATO DE SÓDIO, SODIUM STEARATE/ ESTEARATO DE SÓDIO, ZEA MAYS STARCH/ AMIDO, SODIUM MYRISTATE/ MIRISTATO DE SÓDIO, PARFUM/ PERFUME, MYRISTIC ACID/ ÁCIDO MIRÍSTICO, CARAPA GUAIANENSIS SEED OIL/ ÓLEO DE SEMENTE DE ANDIROBA, SODIUM CAPRYLATE/ CAPRILATO DE SÓDIO, LINUM USITATISSIMUM SEED POWDER/ SEMENTE DE LINHAÇA EM PÓ, SODIUM CAPRATE/ CAPRATO DE SÓDIO, SODIUM ARACHIDATE/ ARAQUIDATO DE SÓDIO, SODIUM CHLORIDE/ CLORETO DE SÓDIO, TITANIUM DIOXIDE/ DIÓXIDO DE TITÂNIO, ETIDRONIC ACID/ ÁCIDO ETIDRÔNICO, BENZYL ALCOHOL/ ÁLCOOL BENZÍLICO, COUMARIN/ CUMARINA, CITRIC ACID/ ÁCIDO CÍTRICO, LIMONENE/ LIMONENO, POLYQUATERNIUM-39/ POLIQUATÉRNIO-39, TETRASODIUM EDTA/ EDETATO DE SÓDIO, HEXYL CINNAMAL/ HEXIL CINAMAL, EUGENOL, CINNAMYL ALCOHOL/ ÁLCOOL CINAMÍLICO, CI 77492/ ÓXIDO DE FERRO AMARELO, SODIUM BENZOATE/ BENZOATO DE SÓDIO.',
44.40,null,0,84,'sabonetes-barra-ekos-natura-1.png', 'sabonetes-barra-ekos-natura-2.jpg', 'sabonetes-barra-ekos-natura-3.jpg',26,69,);
--#endregion


--#region Esfoliante Térmico Ekos Andiroba (Eliana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(70,'#6A762D','#75803C','#ADB96E');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Esfoliante Térmico Ekos Andiroba','Natura','100g',
'Esfoliante corporal vegano com efeito térmico que aquece a pele e promove relaxamento imediato. Estimula a renovação celular, alivia o cansaço e deixa a pele macia, uniforme e delicadamente perfumada com notas verdes e frescas.',
'Benefícios:
• Esfolia e aquece a pele para auxiliar no relaxamento das tensões diárias.
• Aquece a pele em contato com a água.
• 93% afirmam que traz sensação imediata de relaxamento.
• Ajuda aliviar a sensação de cansaço corporal.
• Deixa a pele macia e perfumada com notas verdes e frescas.
• Estimula a renovação celular.
• Pele mais uniforme.

Características:
• Testado dermatologicamente.
• Cruelty free.
• Vegano.
• Tipo de pele: todos os tipos de pele.

Estudo realizado com 120 consumidores após 7 dias de uso do produto.

Dicas de uso:
Aplique sobre a pele limpa e úmida, massageando o corpo todo em movimentos circulares, exceto rosto. enxágue após o uso. aplique até 3 vezes por semana.',
89.90,null,0,69,'esfoliante-corporal-andiroba-1.png', 'esfoliante-corporal-andiroba-2.jpg', 'esfoliante-corporal-andiroba-3.jpg',26,70,)
--#endregion 


--#region Sabonete Esfoliante para o Rosto Biōme (Roberta)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(71,'#3A0249','#760494','#B971CC');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES
('Sabonete Esfoliante para o Rosto Biōme','Natura','65g',
'Sabonete facial esfoliante vegano em barra que limpa profundamente e remove células mortas, estimulando a renovação celular. Com Complexo Regenerativo e 96% de ingredientes de origem natural, deixa a pele mais saudável, luminosa e com textura uniforme.',
'Limpa sua pele com o mesmo cuidado que a prepara para regeneração.
O Sabonete Esfoliante para o Rosto Biōme limpa e esfolia sua pele, removendo sujidades e células mortas. Sua fórmula contém Complexo Regenerativo e Complexo de Partículas Esfoliantes com ingredientes de origem natural que estimulam a renovação celular de maneira eficaz, deixando a pele mais saudável e luminosa. Um produto em barra, vegano, com 96% de origem natural e embalagem zero plástico.

Características:
• Testado dermatologicamente.
• Cruelty free.
• Vegano.
• Ocasião: limpeza.
• Tipo de pele: todos os tipos de pele.
• Tipo de tratamento: uniformizar a textura.
• Zona de aplicação: rosto e pescoço.

Dicas de uso:
• Aplique o produto diretamente sobre o rosto molhado, massageando levemente até formar espuma. enxágue em seguida.
• Uso de até 3x na semana.

Ingredientes:
SODIUM COCOYL ISETHIONATE, ZEA MAYS STARCH / ZEA MAYS (CORN) STARCH, HYDROGENATED COCONUT ACID, PALMITIC ACID, STEARIC ACID, AQUA / WATER / EAU, SODIUM PALMITATE, SODIUM OLEATE, GLYCERIN, PARFUM / FRAGRANCE,TITANIUM DIOXIDE, PRUNUS ARMENIACA SEED POWDER / PRUNUS ARMENIACA (APRICOT) SEED POWDER, SODIUM CHLORIDE, STEARYL BEHENATE, SODIUM LINOLEATE, SODIUM LAURATE, TRIETHYL CITRATE, HYDROXYPROPYL GUAR, SODIUM STEARATE, HYDROXYACETOPHENONE, JOJOBA ESTERS, SODIUM MYRISTATE, ELAEIS GUINEENSIS OIL / ELAEIS GUINEENSIS (PALM) OIL, LIMONENE, SODIUM GLUCONATE, SODIUM CAPRYLATE, SODIUM CAPRATE, SODIUM ARACHIDATE, LINALOOL, ETIDRONIC ACID, TETRASODIUM EDTA, COPAIFERA OFFICINALIS RESIN / COPAIFERA OFFICINALIS (BALSAM COPAIBA) RESIN / COPAIFERA OFFICINALIS (COPAIBA) RESIN.',
54.90,null,0,30,'esfoliante-facial-barra-natura-2.jpg', 'esfoliante-facial-barra-natura-1.png',null,10,71,)
--#endregion 


--#region Sérum para Sobrancelhas Una (Roberta)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(72,'#AD827B','#B58982','#D6BBB7');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Sérum para Sobrancelhas Una','Natura','4g',
'Sérum vegano para sobrancelhas que nutre e fortalece os fios, promovendo maior volume e espessura. Enriquecido com vitaminas e aminoácidos, devolve vitalidade e realça o olhar com aparência natural e saudável.',
'Una sobrancelhas mais volumosas à nutrição dos fios.
Rico em vitamina e aminoácido, Una Sérum para Sobrancelhas Una é o item perfeito para devolver nutrição e vitalidade para os fios das suas sobrancelhas. com este sérum de Natura Una, seu olhar terá sobrancelhas mais volumosas, com fios mais espessos.

Características:
• Testado dermatologicamente.
• Cruelty free.
• Vegano.
• Textura: sérum.
• Zona de aplicação: sobrancelhas.

Dicas de uso:
Use Una Sérum nas sobrancelhas limpas e secas. após retirar o excesso de produto do pincel, aplique uma camada do sérum em toda a sobrancelha, principalmente nas áreas com pouco ou nenhum fio, na direção de crescimento dos fios. limpe o excesso de produto no local e espere secar.

Ingredientes:
AQUA / ÁGUA, PENTYLENE GLYCOL / PENTILENOGLICOL, PPG-5-CETETH-20 / PPG-5-PEG-20 ÉTER DE ÁLCOOL CETÍLICO , PVP / CROSPOVIDONA, GLYCERIN / GLICEROL, PHENOXYETHANOL / FENOXIETANOL, SODIUM POLYACRYLATE STARCH / POLIACRILATO DE AMIDO SÓDICO, POLYQUATERNIUM-10 / POLIQUATÉRNIO-10, TRIETHANOLAMINE / TROLAMINA, PEG-4 DILAURATE / DILAURATO DE PEG-4, PEG-4 LAURATE / LAURATO DE PEG-4, TETRASODIUM EDTA / EDETATO DE SÓDIO, IODOPROPYNYL BUTYLCARBAMATE / BUTILCARBAMATO DE IODOPROPINILA , PANTHENOL / PANTENOL, PEG-200 / MACROGOL, SODIUM HYDROXIDE / HIDRÓXIDO DE SÓDIO, BIOTINOYL TRIPEPTIDE-1 / BIOTINOIL TRIPEPTÍDEO-1.',
129.90,84.40,1,50,'serum-sobrancelhas-natura-2.jpg','serum-sobrancelhas-natura-1.png',null,4,72,)
--#endregion 


--#region lapis sobrancelhas natura (Viviane)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(73,'#693F31','#8D5E4E','#B08273');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Lápis para Sobrancelhas Faces Castanho','Natura', '1,14 g',
'Lápis vegano para sobrancelhas que define, preenche e disfarça falhas com cor intensa e textura macia. Acompanha escova na ponta para pentear e garantir um acabamento natural e bem delineado.',
'Benefícios:
• Define o formato, preenche, delineia e disfarça as falhas da sobrancelha.
• Cor intensa.
• Escova na ponta para pentear os fios.
• Textura macia.

Características:
• Testado dermatologicamente.
• Cruelty free.
• Vegano.

Dicas de uso:
Faça traços no sentido dos pelos preenchendo as sobrancelhas. utilize a escova para pentear os fios. para traços mais claros e suave, não pressione muito o lápis. para traços mais escuros, pressione levemente o lápis ao preencher as sobrancelhas.',
37.90,33.90,1,80,'lapis-sobrancelha-natura-2.jpg', 'lapis-sobrancelha-natura-1.png',null,4,73,)   
--#endregion


--#region Pincel PRO Sobrancelhas Una (Roberta)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(74,'#B68692','#D4A0AD','#EFC3CE');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Pincel PRO Sobrancelhas Una','Natura',null,
'Pincel duplo vegano com ponta chanfrada para desenhar sobrancelhas e delineados, e escova para pentear fios e cílios. Proporciona acabamento profissional com cerdas macias e menor impacto ambiental, feito com plástico reciclado.',
'Una acabamento profissional a menos impacto no planeta.
Cerdas macias, com um lado em formato chanfrado, ideal para desenhar sobrancelhas e delineados, e outro lado em formato de escova para pentear as sobrancelhas e os cílios. Os pinceis profissionais de Natura Una oferecem menos impacto no planeta: 10 toneladas de plástico reciclado retirado do meio ambiente em um ano.',
29.90,22.40,1,40, 'pincel-sobrancelha-1.png','pincel-sobrancelha-2.jpg',null,20,74,)
--#endregion 


--#region lapis retratil sobrancelhas natura (Viviane)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(75,'#734943','#976963','#B88A84');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Lápis Retrátil Para Sobrancelhas Una','Natura',null,
'Lápis retrátil vegano para sobrancelhas com 24h de duração e fórmula à prova d’água. Possui escova para esfumar e pentear, garantindo sobrancelhas naturalmente preenchidas e acabamento impecável ao longo do dia.',
'Una sobrancelhas naturalmente preenchidas a 24 horas de duração.
Lápis retrátil para sobrancelhas naturalmente preenchidas, com pincel para esfumar e pentear. Fácil de aplicar, com 24h de duração e à prova d´água. A escova para esfumar e pentear os fios suaviza os traços conferindo um acabamento natural. Cor: Castanho

Dicas de uso:
Faça traços no sentido dos pelos preenchendo as sobrancelhas. utilize o pincel para esfumar e pentear os fios. para traços mais claros e suave, não pressione muito o lápis retrátil. para traços mais escuros, pressione levemente o lápis retrátil ao preencher as sobrancelhas.

Ingredientes:
CERA MICROCRISTALLINA, HYDROGENATED COCO-GLYCERIDES, CAPRYLIC/CAPRIC TRIGLYCERIDE, HYDROGENATED JOJOBA OIL, RICINUS COMMUNIS SEED OIL, COPERNICIA CERIFERA WAX, BUTYROSPERMUM PARKII BUTTER, CAPRYLYL GLYCOL, PENTAERYTHRITYL TETRA-DI-T-BUTYL HYDROXYHYDROCINNAMATE, AQUA, TOCOPHEROL, CITRIC ACID. PODE CONTER / PUEDE CONTENER: MICA, CI 77499, CI 77891, CI 77491, CI 77492.',
34.70,null,0,'lapis-retratil-sobrancelha-2.jpg', 'lapis-retratil-sobrancelha-1.png',null,4,75,)   
--#endregion


--#region Pincel PRO Iluminador Una(Roberta)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(76,'#DDA2AA','#FFC4CC','#FBD5DA');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Pincel PRO Iluminador Una','Natura',null,
'Pincel vegano de cerdas macias e formato arredondado, ideal para aplicar iluminador com acabamento natural e uniforme. Garante esfumado perfeito e contribui para menor impacto ambiental, feito com plástico reciclado.',
'Una acabamento profissional a menos impacto no planeta.
Cerdas macias em formato arredondado, ideal para aplicar o iluminador de forma homogênea. Esfumado perfeito com acabamento natural e uniforme. Os pinceis profissionais de Natura Una oferecem menos impacto no planeta: 10 toneladas de plástico reciclado retirado do meio ambiente em um ano.

Características:
• Cruelty free.
• Zona de aplicação: rosto.

Dicas de uso:
Aplique o produto com movimentos leves de “vai e vem” nas áreas em que deseja destacar como: nariz, parte superior dos lábios, têmporas e arco das sobrancelhas. dica do expert: pode ser utilizado para esfumar o côncavo, caso deseje um esfumado rápido, mas profissional.',
49.90,32.40,1,70,'pince-pro-iluminador-natura-1.png','pince-pro-iluminador-natura-2.jpg',null,20,76,)
--#endregion 


--#region Esmalte Cremoso Nude (Adriana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(77,'#BB5767','#DE677A','#F59EAC');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Esmalte Cremoso Nude','Colorama','8ml',
'Esmalte cremoso de alta cobertura e brilho intenso, com fórmula duradoura e pincel flat de 220 cerdas para aplicação precisa. Garante unhas impecáveis, com cores vibrantes e acabamento profissional até a próxima esmaltação.',
'Sua textura é perfeita para todas as mulheres que desejam colorir suas unhas com uma fórmula de maior cobertura de cor e brilho. Além de conter um pincel, que auxilia na aplicação, para manter unhas impecáveis até a próxima esmaltação.

Benefícios:
* Fórmula com resina intensificadora de brilho, cor e duração;
*Pincel formato flat com 220 cerdas para melhor aplicação e adaptação ao formato da unha;
*Rótulo mais moderno para melhor visibilidade das cores através do frasco;
* Extensa gama de cores;
*Marca de tradição há mais de 70 anos no marcado brasileiro.

Indicado:
Os esmaltes Colorama Cremoso são indicados para todas as mulheres que buscam uma combinação perfeita, garantindo unhas impecáveis até a próxima esmaltação!
Vale destacar que não recomendamos o uso para o público infantil e, em casos de restrições pessoais, consule um médico.

Modo de Usar:
Indicamos iniciar o processo de esmaltação com o uso de uma de uma de nossas bases da linha de Cuidados. Logo após aplicar duas camadas de cor do seu Colorama Cremeoso preferido! Para finalizar, você pode optar por uma secagem rápida com o nosso Oléo Secante ou, se preferir, realçar ainda mais sua cor, use o nosso famoso "roxinho", a Cobertura Intensificadora da Cor',
6.64,null,0,102,'esmalte-colorama-nude-1.png', 'esmalte-colorama-nude-2.png', 'esmalte-colorama-nude-3.jpg',21,77,)
--#endregion 


--#region Cera Nutritiva de Unha Granado (Adriana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(78,'#FF3376','#FF5084','#FF719B');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Cera Nutritiva de Unha Granado','Granado','7g',
'Cera nutritiva que hidrata e fortalece unhas e cutículas, prevenindo o ressecamento e a quebra. Formulada com cera vegetal de cereais, leite de aveia e silicones, deixa as unhas com brilho e aspecto saudável, sem sensação gordurosa.',
'Cera Nutritiva Pink da Granado hidrata e fortalece unhas quebradiças e cutículas ressecadas. Proporciona brilho e um belo aspecto às unhas. Produzida com cera vegetal de cereais associada ao leite de aveia e uma combinação de silicones. Não possui aspecto gorduroso. Sem parabenos. Indicada para uso diário.

Modo de Usar:
Espalhar uniformemente o produto na região das unhas e cutículas até completa absorção. Usar diariamente, duas a três vezes ao dia.

Especificações:
Cruelty Free
Cuidado das Cutículas',
41.00,28.88,1,70,'cera-nutritiva-unhasecuticulas-granado-1.png', 'cera-nutritiva-unhasecuticulas-granado-2.jpg', 'cera-nutritiva-unhasecuticulas-granado-3.jpg',21,78)
--#endregion 


--#region  Esmalte Cremoso Meia Seda (Adriana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(79,'#A6646F','#BF808A','#E7B1BA');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Esmalte Cremoso Meia Seda','Dailus','8ml',
'Esmalte cremoso com textura uniforme e pincel flat de cerdas cheias que facilita a aplicação. Possui tampa anatômica e ampla variedade de cores vibrantes, garantindo unhas com acabamento perfeito e duradouro.',
'Os Esmalte Cremoso Dailus contam com grande variedade de cores, que vão desde tons rosados até tons de vermelhos, entre outros.

Indicação:
• Pode ser utilizada por todos;
• Para todos os tipos de pele.

Benefícios:
• Tampa anatômica
• Uniformidade na aplicação
• Pincel flat big blush (cerdas mais cheias)
• Cores lindas
• Textura cremosa

Modo de Usar:
• Remova o excesso do pincel do Esmalte Cremoso Dailus e aplique sobre as unhas.
• Se preferir, aplique uma segunda camada.',
9.49,null,0,89,'dailus-esmalte-meiadeseda-1.png', 'dailus-esmalte-meiadeseda-2.jpg','dailus-esmalte-meiadeseda-3.jpg',21,79,)
--#endregion


--#region  Esmalte Cremoso Worth a Pretty Penne (Adriana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(80,'#AF685A','#BD796B','#E2A497');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Esmalte Cremoso Worth a Pretty Penne','O.P.I',null,
'Esmalte OPI de alta qualidade com pigmentos intensos e ampla variedade de cores. Proporciona cobertura uniforme, brilho duradouro e acabamento profissional, ideal para todos os tipos de unhas.',
'O esmalte OPI tem fórmula exclusiva com qualidade que revolucionou o mercado. É a melhor escolha para quem gosta de fazer as unhas toda semana.

Benefícios:
• Pigmento de alta qualidade
• Portfólio com mais de 90 cores
• Este produto é ideal para todos os tipos de unhas

Modo de Usar:
• Passo 1. Aplique OPI Base Coat nas unhas e cutículas limpas.
• Passo 2. Para uma esmaltação perfeita, aplique uma pincelada do esmalte escolhido no centro da unha e depois nas laterais.
• Passo 3. Então, aplique uma segunda camada de esmalte nas unhas para intensificar a cor.
• Passo 4. Aplique uma camada de OPI Top Coat até as pontas das unhas para dar brilho, selar e proteger.

Precauções:
Produto Inflamável. Mantenha fora do alcance de crianças.
',
33.69,null,0,73,'opi-esmalte-naillacquer-1.png', 'opi-esmalte-naillacquer-2.jpg', 'opi-esmalte-naillacquer-3.jpg',21,80,)
--#endregion


--#region oleo secante unha (Adriana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(81,'#C55F8A','#EA80AC','#FBA7CA');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Óleo Secante para Unhas','Essence','8ml',
'Óleo secante vegano que acelera a secagem do esmalte em apenas 60 segundos. Enriquecido com vitamina E e óleo de amêndoas, nutre unhas e cutículas enquanto garante brilho e proteção, com aplicador prático em gotas.',
'Com o Óleo Secante Express Dry Drops Essence, o seu esmalte seca em apenas 60 segundos!

Enriquecido com vitamina E e óleo de amêndoas para cuidar das suas unhas. Além do seu aplicador gota a gota super prático e fácil.

Com o óleo secante Express Dry Drops Essence suas unhas ficam secas em segundos!

Benefícios:
As gotas do Express Dry Drops fazem com que o esmalte seque apenas em 60 segundos – basta aplicar uma gota por unha após a esmaltação;
Sua fórmula nutre as unhas e cutículas com vitamina E e óleo de amêndoas;
Sem parabenos, fragrâncias, acetona, corantes e conservantes.

Modo de Uso:
Aplicar uma gota em cada unha após a aplicação do esmalte. Pode ser usada antes do esmalte para cuidar das cutículas. Basta aplicar uma gota em cada unha, massagear e limpar com algodão umedecido em removedor de esmaltes.

Produto não tesado em animais. Produto Vegano.',
19.00,null,0,83,'essence-oleo-secante-1.png', 'essence-oleo-secante-2.jpg', 'essence-oleo-secante-3.jpg',21,81,)    
 --#endregion


--#region esmalte dior nuir (Adriana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(82,'#480316','#7A0525','#BA4564');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Esmalte Vernis 047 Nuit 1947','Dior',null,
'Esmalte Dior Vernis com acabamento brilho efeito gel e cores inspiradas nas coleções da Maison Dior. Enriquecido com extratos de peônia e pistache, oferece cobertura uniforme, longa duração e um toque luxuoso às unhas.',
'Dior Vernis é o esmalte que proporciona às mãos uma cor Couture Dior, tal como o icônico esmalte vermelho 999 ou o esmalte bege rosado Nude Look. Em um gesto simples, realça as unhas com uma tonalidade de acabamento brilhante e duração efeito gel para um resultado homogêneo.

Disponível em uma gama de cores inspiradas nas coleções da Maison, Dior Vernis é infundido com extratos de peônia e pistache.

Para enriquecer a experiência da manicure Dior, descubra a restante coleção para as unhas: removedor, top coat e creme fortalecedor.

Como Usar:
1. Comece aplicando nas unhas uma fina camada de Dior Base Vernis.
2. Aplique uma primeira camada muito fina de Dior Vernis no centro da unha e depois nos lados. Depois, aplique uma segunda camada mais generosa para dar profundidade à cor.
3. Maximize o brilho com uma camada de Top Coat Dior.',
219.00,186.15,1,49,'esmalte-dior-nuit-1.png', 'esmalte-dior-nuit-2.jpg', 'esmalte-dior-nuit-3.jpg',21,82,)  
--#endregion


--#region esmalte dior pastel mint (Adriana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(83,'#ADC4B4','#C8E3D0','#E2F4E7');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Esmalte Vernis 203 Pastel Mint Summer Look 24','Dior',null,
'Esmalte Dior Vernis com acabamento brilho efeito gel e cores inspiradas nas coleções da Maison Dior. Enriquecido com extratos de peônia e pistache, oferece cobertura uniforme, longa duração e um toque luxuoso às unhas.',
'Dior Vernis é o esmalte que proporciona às mãos uma cor Couture Dior, tal como o icônico esmalte vermelho 999 ou o esmalte bege rosado Nude Look. Em um gesto simples, realça as unhas com uma tonalidade de acabamento brilhante e duração efeito gel para um resultado homogêneo.

Disponível em uma gama de cores inspiradas nas coleções da Maison, Dior Vernis é infundido com extratos de peônia e pistache.

Para enriquecer a experiência da manicure Dior, descubra a restante coleção para as unhas: removedor, top coat e creme fortalecedor.

Como Usar:
1. Comece aplicando nas unhas uma fina camada de Dior Base Vernis.
2. Aplique uma primeira camada muito fina de Dior Vernis no centro da unha e depois nos lados. Depois, aplique uma segunda camada mais generosa para dar profundidade à cor.
3. Maximize o brilho com uma camada de Top Coat Dior.',
219.00,186.15,1,49,'esmalte-dior-pastelmint-1.png', 'esmalte-dior-pastelmint-2.jpg', 'esmalte-dior-pastelmint-3.jpg',21,83,)  
--#endregion


--#region esmalte dior dune (Adriana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(84,'#C87060','#E38C7D','#FBAFA2');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Esmalte Vernis 323 Dune','Dior',null,
'Esmalte Dior Vernis com acabamento brilho efeito gel e cores inspiradas nas coleções da Maison Dior. Enriquecido com extratos de peônia e pistache, oferece cobertura uniforme, longa duração e um toque luxuoso às unhas.',
'Dior Vernis é o esmalte que proporciona às mãos uma cor Couture Dior, tal como o icônico esmalte vermelho 999 ou o esmalte bege rosado Nude Look. Em um gesto simples, realça as unhas com uma tonalidade de acabamento brilhante e duração efeito gel para um resultado homogêneo.

Disponível em uma gama de cores inspiradas nas coleções da Maison, Dior Vernis é infundido com extratos de peônia e pistache.

Para enriquecer a experiência da manicure Dior, descubra a restante coleção para as unhas: removedor, top coat e creme fortalecedor.

Como Usar:
1. Comece aplicando nas unhas uma fina camada de Dior Base Vernis.
2. Aplique uma primeira camada muito fina de Dior Vernis no centro da unha e depois nos lados. Depois, aplique uma segunda camada mais generosa para dar profundidade à cor.
3. Maximize o brilho com uma camada de Top Coat Dior.',
219.00,186.15,1,49,'esmalte-dior-dune-1.png', 'esmalte-dior-dune-2.jpg', 'esmalte-dior-dune-3.jpg',21,84,)  
--#endregion


--#region esmalte dior denim (Adriana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(85,'#2F3361','#4F559C','#848CDB');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Esmalte Vernis 796 Denim','Dior',null,
'Esmalte Dior Vernis com acabamento brilho efeito gel e cores inspiradas nas coleções da Maison Dior. Enriquecido com extratos de peônia e pistache, oferece cobertura uniforme, longa duração e um toque luxuoso às unhas.',
'Dior Vernis é o esmalte que proporciona às mãos uma cor Couture Dior, tal como o icônico esmalte vermelho 999 ou o esmalte bege rosado Nude Look. Em um gesto simples, realça as unhas com uma tonalidade de acabamento brilhante e duração efeito gel para um resultado homogêneo.

Disponível em uma gama de cores inspiradas nas coleções da Maison, Dior Vernis é infundido com extratos de peônia e pistache.

Para enriquecer a experiência da manicure Dior, descubra a restante coleção para as unhas: removedor, top coat e creme fortalecedor.

Como Usar:
1. Comece aplicando nas unhas uma fina camada de Dior Base Vernis.
2. Aplique uma primeira camada muito fina de Dior Vernis no centro da unha e depois nos lados. Depois, aplique uma segunda camada mais generosa para dar profundidade à cor.
3. Maximize o brilho com uma camada de Top Coat Dior.',
219.00,186.15,1,49,'esmalte-dior-denim-1.png', 'esmalte-dior-denim-2.jpg', 'esmalte-dior-denim-3.jpg',21,84,) 
--#endregion


--#region esmalte dior rouge (Adriana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(86,'#99112A','#D11739','#F24A69');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Esmalte Vernis 853 Rouge Trafalgar','Dior',null,
'Esmalte Dior Vernis com acabamento brilho efeito gel e cores inspiradas nas coleções da Maison Dior. Enriquecido com extratos de peônia e pistache, oferece cobertura uniforme, longa duração e um toque luxuoso às unhas.',
'Dior Vernis é o esmalte que proporciona às mãos uma cor Couture Dior, tal como o icônico esmalte vermelho 999 ou o esmalte bege rosado Nude Look. Em um gesto simples, realça as unhas com uma tonalidade de acabamento brilhante e duração efeito gel para um resultado homogêneo.

Disponível em uma gama de cores inspiradas nas coleções da Maison, Dior Vernis é infundido com extratos de peônia e pistache.

Para enriquecer a experiência da manicure Dior, descubra a restante coleção para as unhas: removedor, top coat e creme fortalecedor.

Como Usar:
1. Comece aplicando nas unhas uma fina camada de Dior Base Vernis.
2. Aplique uma primeira camada muito fina de Dior Vernis no centro da unha e depois nos lados. Depois, aplique uma segunda camada mais generosa para dar profundidade à cor.
3. Maximize o brilho com uma camada de Top Coat Dior.',
219.00,186.15,1,49,'esmalte-dior-rouge-1.png', 'esmalte-dior-rouge-2.png',null,21,86) 
--#endregion


--#region esmalte dior cinema (Adriana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(87,'#BA3724','#EB452D','#EB5C49');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Esmalte Vernis 849 Rouge Cinema','Dior',null,
'Esmalte Dior Vernis com acabamento brilho efeito gel e cores inspiradas nas coleções da Maison Dior. Enriquecido com extratos de peônia e pistache, oferece cobertura uniforme, longa duração e um toque luxuoso às unhas.',
'Dior Vernis é o esmalte que proporciona às mãos uma cor Couture Dior, tal como o icônico esmalte vermelho 999 ou o esmalte bege rosado Nude Look. Em um gesto simples, realça as unhas com uma tonalidade de acabamento brilhante e duração efeito gel para um resultado homogêneo.

Disponível em uma gama de cores inspiradas nas coleções da Maison, Dior Vernis é infundido com extratos de peônia e pistache.

Para enriquecer a experiência da manicure Dior, descubra a restante coleção para as unhas: removedor, top coat e creme fortalecedor.

Como Usar:
1. Comece aplicando nas unhas uma fina camada de Dior Base Vernis.
2. Aplique uma primeira camada muito fina de Dior Vernis no centro da unha e depois nos lados. Depois, aplique uma segunda camada mais generosa para dar profundidade à cor.
3. Maximize o brilho com uma camada de Top Coat Dior.',
219.00,186.15,1,49,'esmalte-dior-cinema-1.png', 'esmalte-dior-cinema-2.jpg', 'esmalte-dior-cinema-3.jpg',21,87,)  
--#endregion


--#region esmalte dior grace (Adriana)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(88,'#C65665','#F0687A','#F08391');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Esmalte Vernis 558 Grace','Dior',null,
'Esmalte Dior Vernis com acabamento brilho efeito gel e cores inspiradas nas coleções da Maison Dior. Enriquecido com extratos de peônia e pistache, oferece cobertura uniforme, longa duração e um toque luxuoso às unhas.',
'Dior Vernis é o esmalte que proporciona às mãos uma cor Couture Dior, tal como o icônico esmalte vermelho 999 ou o esmalte bege rosado Nude Look. Em um gesto simples, realça as unhas com uma tonalidade de acabamento brilhante e duração efeito gel para um resultado homogêneo.

Disponível em uma gama de cores inspiradas nas coleções da Maison, Dior Vernis é infundido com extratos de peônia e pistache.

Para enriquecer a experiência da manicure Dior, descubra a restante coleção para as unhas: removedor, top coat e creme fortalecedor.

Como Usar:
1. Comece aplicando nas unhas uma fina camada de Dior Base Vernis.
2. Aplique uma primeira camada muito fina de Dior Vernis no centro da unha e depois nos lados. Depois, aplique uma segunda camada mais generosa para dar profundidade à cor.
3. Maximize o brilho com uma camada de Top Coat Dior.',
219.00,186.15,1,49,'esmalte-dior-grace-1.png', 'esmalte-dior-grace-2.jpg', 'esmalte-dior-grace-3.jpg',21,88)  
--#endregion


--#region Protetor Solar Corporal FPS 50 (Bruna)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(89,'#FBC532','#FFDA1F','#FFE45C');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Protetor Solar Corporal FPS 50','Sallve','200g',
'Protetor solar corporal FPS 50 com textura leve sem ficar pegajoso na pele. Com manteiga de karité e óleo de semente de uva. Não deixa resíduos brancos na pele e é resistente à água, suor e areia.',
'Um protetor solar com alta proteção FPS 50 UVA/UVB PA++++ com textura em creme, que além de proteger vai deixar sua pele macia e iluminada, mas não pegajosa, sendo também resistente à água, suor e areia. Além de proteger da radiação solar, o Protetor Solar Corporal hidrata a pele graças à manteiga de karité e ao óleo de semente de uva presentes na fórmula. Tem textura leve e toque seco, garantindo conforto na pele sem deixar resíduos esbranquiçados. É hipoalergênico e testado em peles sensíveis.

O que só ele faz?
 - Alta proteção solar FPS 50 UVA/UVB PA++++
 - Invisível na pele: não deixa resíduos brancos
 - Resistente à água, suor e areia
 - Não deixa a pele pegajosa
 - Testado em pele sensível e hipoalergênico

Avaliações de segurança:
 - Dermatologicamente testado - produto seguro para ser aplicado sobre a pele;
 - Hipoalergênico - formulado de maneira a minimizar possível surgimento de alergia;
 - Não-comedogênico - o produto não promoveu aumento em comedões abertos e fechados, nem em pápulas e pústulas;
 - Aceitabilidade cutânea em pele sensível - em avaliação, não tivemos eventos adversos, ou seja, não tivemos qualquer reação. é um produto de alta tolerância cutânea em pele sensível.

Ingredientes:
 - Água, Octocrileno, Homosalato, Propanodiol, Butil Metoxidibenzoilmetano, Salicilato de Etilhexila, Manteiga de Karité, Cetil Fosfato de Potássio, Adipato de Diisopropila, Etilhexiltriazone, Triacontanil PVP, Eter Dicaprílico, Undecano, Ácido Fenilbenzimidazol Sulfônico, Carbonato Dicaprílico, Estearato de Glicerila, Álcool Cetílico, Óleo de semente de uva, Sílica, Tridecano, Arginina, Hidroxiacetofenona, Goma Xantana, 1,2-Hexanodiol, Caprilil glicol, Crosspolímero de Acrilatos/Acrilato de Alquila C10-30, Ácido Cítrico, Gluconato de Sódio, Tetra-di-t-butil Hidroxiidrocinamato de Pentaeritritila, Tocoferol.
 - Ingredientes especiais: Manteiga de Karité e Óleo de Semente de Uva.',
89.90,null,0,82,'protetor-solar50-corporal-sallve-1.png', 'protetor-solar50-corporal-sallve-2.jpg', 'protetor-solar50-corporal-sallve-3.jpg',25,89,)
--#endregion 


--#region floratta red (Michael)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(90,'#892227','#EA1A25','#FB565E');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Floratta Red','O Boticário','75ml',
'Floratta Red é uma colônia feminina marcante e envolvente, inspirada na flor da maçã de Vermont. Combina notas de frutas vermelhas e laranja com um corpo floral delicado e toques de chocolate amargo, musk e âmbar, revelando uma fragrância jovem, romântica e irresistível.',
'Floratta Red Desodorante Colônia 75ml
A fragrância feminina do Floratta Red Desodorante Colônia é inspirada na flor da Maçã de Vermont.
A fragrância traz a delicadeza da flor da maçã e a doçura do fruto. Além de notas de saída de Frutas Vermelhas e Laranja.

O corpo do Floratta Red é puro floral. Uma combinação de Flor de Laranjeira, Violeta, Flor de Lótus, Tuberosa e Flor de Beijo. Já as notas de base, que deixam o rastro da fragrância, trazem Chocolate Amargo, Musk, Sândalo, Cedro e Âmbar.
O Floratta Red Desodorante Colônia é uma fragrância feminina marcante, jovem e envolvente que combina com mulheres de atitude que não passam vontade no romance!
Para potencializar a perfumação, a linha conta também com o Óleo Perfumado Desodorante Corporal Floratta Red para deixar a pele macia e perfumada com a mesma fragrância. É irresistível!  

Como Usar:
Borrife a fragrância nas áreas onde há maior circulação do sangue, como o pescoço, dobras do cotovelo e atrás das orelhas. Para sentir a sua fragrância favorita por mais tempo, mantenha a sua pele sempre hidratada com nossos produtos de Corpo e Banho.

Pirâmide Olfativa:
Topo: Frutas Vermelhas, Laranja, Maçã.
Corpo: Flor de Laranjeira, Tuberosa, Violeta, Flor de Lótus, Flor de Beijo.
Fundo: Chocolate Amargo, Musk, Sândalo, Cedro, Âmbar.

Ocasião:
Fragrância feminina para ser usada à noite, em encontros românticos.

Ingredientes:
Álcool Desnaturado; Água; Perfume; Caprililglicol; Salicilato de benzila; Butilfenil metilpropional; Citral; Citronelol; Cumarina; Hexil cinamal; Hidroxicitronelal; Isoeugenol; Limoneno.

Nenhum produto do Grupo Boticário é testado em animais. ',
159.90,135.90,1,80,'floratta-red-1.png', 'floratta-red-2.jpg', 'floratta-red-3.jpg',5,90,)
--#endregion 


--#region floratta rose bouquet (Michael)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(91,'#CA929C','#EAAEB9','#FDC9D2');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Floratta Rose Bouquet','O Boticário','75ml',
'Floratta Rose Bouquet é uma colônia feminina delicada e marcante que combina a suavidade das rosas-damascenas com a potência da gardênia. Com notas frutais e toques de madeiras elegantes, revela uma fragrância moderna, sofisticada e cheia de feminilidade.',
'Floratta Rose Bouquet Desodorante Colônia 75ml
O Desodorante Colônia Floratta Rose Bouquet te apresenta uma fragrância delicada e marcante, permitindo que você se sinta envolvida em um buquê de flores todos os dias. Seu acorde celebra a junção da delicadeza da rosa com a potência da gardênia, resultando em uma perfumação moderna que exala feminilidade, frescor e não te deixa passar despercebida.

Toda a elegância de Floratta Rose Bouquet se deve à infusão de uma tríade de rosas-damascenas, 

Combinadas com nuances frutais vibrantes e um toque sofisticado de madeiras confortáveis. Inspirada na clássica fragrância Floratta Rose, essa versão traz ainda mais modernidade e permite que você deixe o seu cheiro por onde passar. 

O desodorante colônia é a escolha versátil para o dia a dia, que une uma concentração equilibrada de fragrância similar ao eau de toilette com ingredientes de alta qualidade. Entrega perfumação com personalidade e um toque de refinamento, mantendo uma assinatura agradável em todos os momentos.

Como Usar:
Borrife a fragrância nas áreas onde há maior circulação do sangue, como o pescoço, dobras do cotovelo e atrás das orelhas. Para sentir a sua fragrância favorita por mais tempo, mantenha a sua pele sempre hidratada com nossos produtos de Corpo e Banho.

Pirâmide Olfativa:
Topo: Bergamota da Sicília, Laranja Sanguínea, Pera.
Corpo: Flor de Lótus, Semente de Cenoura, Rosa Essential LMR, Água de Rosas LMR for Life, Rosa de Isparta LMR For Life, assinatura de Floratta.
Fundo: Íris, Madeiras Brancas, Cashmeran, Musk Sinfonide.

Atenção:
Inflamável. Evite contato com os olhos. Não aplique em pele irritada ou lesionada e evite aplicar nas axilas. Caso ocorra irritação e/ou prurido no local, suspenda o uso imediatamente. Descontinue o uso em caso de sensibilização. Conserve o produto bem fechado, longe da luz e do calor excessivo. Somente para uso externo. Mantenha fora do alcance de crianças. Produto para perfumar e desodorizar a pele. Devido à presença de alguns ingredientes, a cor do produto pode variar, porém sem comprometer sua qualidade ou segurança. Não aplicar o produto diretamente nas roupas.

Ingredientes:
Alcool etilico denaturado, Agua, Perfume, Caprililglicol, Alfa-isometil ionona, Citral, Citronelol, Geraniol, Hexil cinamal, Hidroxicitronelal, Isoeugenol, Limoneno, Linalol, Oleo de patchouli, Alfa-terpineno, Terpinoleno, Cetonas rosas, Beta-cariofileno,Hexadecanolactona, Acetato de linalila, Terpineol, Tetrametil acetiloctaidronaftalenos, Trimetilbenzenopropanol, Oleo de casca de limao siciliano, Acetato de geranila, Pineno, Oleo da casca da bergamota.

Nenhum produto o Boticário é testado em animais, ou seja, este item possui selo Cruelty Free. ',
159,90,null,0,80,'floratta-rose-bouquet-1.png', 'floratta-rose-bouquet-2.jpg', 'floratta-rose-bouquet-3.jpg',5,91,)
--#endregion


--#region floratta gold (Michael)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(92,'#EEDD85','#FDED9B','#FFF3B8');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Floratta Gold','O Boticário','75ml',
'Floratta Gold é uma colônia feminina marcante e sofisticada, com notas florais e amadeiradas que refletem elegância e confiança. Combina acordes de orquídea, jasmim e pêssego com toques cremosos de sândalo, âmbar e baunilha, revelando uma fragrância envolvente e inesquecível.',
'Floratta Gold Desodorante Colônia 75ml
Floratta Gold Desodorante Colônia é uma fragrância feminina inconfundível, feita para mulheres confiantes e bem resolvidas.  
Encorpada e marcante, com toque cremoso de madeiras ambaradas, essa perfumação é especial para mulheres confiantes e bem resolvidas.

Floriental Amadeirado tão inesquecível quanto a combinação da orquídea com notas amadeiradas. Sua composição traz acordes de frutas como Abacaxi e Pêssego que ganham sofisticação com flores como Orquídea, Muguet e Jasmim, fechando em um delicioso toque amadeirado do Sândalo e Musk.  Além de notas de Baunilha que entregam um toque de delicadeza irresistível para essa fragrância.

Essa fragrância vegana já se tornou um clássico da perfumaria feminina do Boticário e reflete a mulher que acredita no amor e é tão cativante quanto as notas dessa composição.
Ideal para ser usada de dia, no trabalho ou em momentos de lazer, garante uma perfumação marcante, inesquecível e delicada que combina com sua rotina.

Atenção:
Inflamável. Evite contato com os olhos. 
Não aplique em pele irritada ou lesionada. Evite aplicar nas axilas. Caso ocorra irritação e/ou prurido no local, suspenda o uso imediatamente. Descontinue o uso em caso de sensibilização. Conserve o produto bem fechado, longe da luz e do calor excessivo. Somente para uso externo. Mantenha fora do alcance de crianças. Produto para perfumar e desodorizar a pele.

Pirâmide Olfativa:
Topo: Neroli, Abacaxi, Pêssego e Orquídea.
Corpo: Muguet, Heliotropina e Jasmim.
Fundo: Sândalo, Âmbar, Baunilha e Musk.

Ingredientes:
Álcool etílico; Água; Perfume; Octissalato; Caprilato de poliglicerila-3; Avobenzona; Amarelo de tartrazina; Vermelho 33; Azul brilhante; Cloreto de sódio; Sulfato de sódio; Alfa-isometil ionona; Álcool cinamílico; Geraniol; Hidroxicitronelal; Álcool benzílico.
Devido à presença de alguns ingredientes, a cor do produto pode variar, porém sem comprometer sua qualidade ou segurança.

Nenhum produto o Boticário é testado em animais, ou seja, este item possui selo Cruelty Free.',
159.90,null,0,80,'floratta-gold-1.png', 'floratta-gold-2.jpg', 'floratta-gold-3.jpg',5,92,)
--#endregion


--#region floratta romance de verão (Michael)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(93,'#E8247D','#E67C9D','#EAB396');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Floratta Romance de Verão','O Boticário','75ml',
'Floratta Romance de Verão é uma colônia feminina floral frutal que combina flores e frutas tropicais com um frescor envolvente. Inspirada na leveza e intensidade dos romances de verão, traz notas adocicadas na medida certa e um toque ensolarado que desperta boas lembranças.',
'Floratta Romance de Verão Desodorante Colônia 75ml
Um dia,  uma noite, um mês. Não importa.

Floratta O Boticário acredita que o romance que você viveu no verão jamais será esquecido. Por isso, criou Floratta Romance de Verão Desodorante Colônia, uma fragrância da perfumaria feminina adocicada na medida certa e inspirada em flores e frutas tropicais, com um frescor intenso como um romance de verão.

Essa fragrância floral frutal é igual à liberdade de uma tarde de verão: o blend de frutas tropicais trazem frescor impactante com dulçor moderado. Robusta desde a saída, combina um rico bouquet de notas florais e facetas cremosas amadeiradas e traz um toque ensolarado e intenso para os seus dias de verão.

Trazendo muitas borboletas no estômago, Floratta Romance de Verão vem para dar vida aos romances de verão, mostrando que um amor não precisa ser para sempre ser inesquecível!

Como Usar:
Borrife a fragrância nas áreas onde há maior circulação do sangue, como o pescoço, dobras do cotovelo e atrás das orelhas. Para sentir a sua fragrância favorita por mais tempo, mantenha a sua pele sempre hidratada com a loção corporal da linha.

Pirâmide Olfativa
Topo: Mandarina, Bergamota, Limão, Neroli, Pimenta Rosa, Frutas Tropicais.
Corpo: Rosa Damascena, Passion Flower (Scent Trek), Ylang Ylang, Magnólia.
Fundo: Patchouli, Sândalo, Baunilha, Âmbar, Musk.

Atenção:
Inflamável. Evite contato com os olhos. Não aplique em pele irritada ou lesionada e evite aplicar nas axilas. Caso ocorra irritação e/ou prurido no local, suspenda o uso imediatamente. Descontinue o uso em caso de sensibilização. Conserve o produto bem fechado, longe da luz e do calor excessivo. Somente para uso externo. Mantenha fora do alcance de crianças. Produto para perfumar e desodorizar a pele.

Ingredientes:
Álcool desnaturado; Água; Perfume; Octissalato; Avobenzona; Caprililglicol; Citrato de tris (tetrametilidroxipiperidinol); Amarelo de tartrazina; Vermelho escarlate 125; Salicilato de benzila; Citral; Cumarina; Hexil cinamal; Hidroxicitronelal; Limoneno; Linalol.
Devido à presença de alguns ingredientes, a cor do produto pode variar, porém sem comprometer sua qualidade ou segurança.

Nenhum produto do Boticário é testado em animais, ou seja, este item possui selo Cruelty Free.',
159.90,null,0,80,'floratta-romancedeverao-1.png', 'floratta-romancedeverao-2.jpg', 'floratta-romancedeverao-3.jpg',5,93,)
--#endregion


--#region floratta fleur (Michael)
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(94,'#692E66','#97398D','#AF78A2');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
("Floratta Fleur D' Éclipse",'O Boticário','75ml',
'Floratta Fleur D’Éclipse é um Eau de Parfum floral amadeirado que combina frescor e sofisticação. Inspirado no raro aroma da Flor de Osmanthus durante o eclipse solar, revela uma fragrância vibrante, frutal e romântica, perfeita para mulheres que buscam elegância com um toque de mistério.',
"Floratta Fleur D' Éclipse Eau De Parfum 75ml
Floratta Fleur D' Éclipse Eau de Parfum explora o universo floral sofisticado de uma fragrância jovial e impactante.

Sua fórmula captura o raro aroma que a Flor de Osmanthus exala durante o auge do eclipse solar, revelando a essência do reencontro entre o sol e a lua. Durante esse fenômeno o aroma da Flor é alterado de maneira natural, exalando uma fragrância mais rara, intensa, frutal e vibrante.

A fragrância Floral Amadeirada de Floratta Fleur D' Éclipse, traz na saída notas frescas e frutais de Bergamota e Pera, com leve toque especiado que confere impacto e brilho para a fragrância.
As notas amadeiradas de Vetiver e Patchouli finalizam a criação com modernidade e todo o romantismo que o seu novo Floratta Eau de Parfum merece.

Como Usar:
Borrife a fragrância nas áreas onde há maior circulação do sangue, como o pescoço, dobras do cotovelo e atrás das orelhas.

Pirâmide Olfativa:
Topo: Bergamota, , Pimenta Rosa, Lichia, Creme de Pêra.
Corpo: Osmanthus, Rosa da Turquia , Ylang , Flor de Magnólia.
Fundo: Vetiver, Patchouli, Âmbar, Musk.

Atenção:
Inflamável. Evite contato com os olhos. Não aplique em pele irritada ou lesionada. Descontinue o uso em caso de sensibilização. Conserve o produto bem fechado, longe da luz e do calor excessivo. Somente para uso externo. Mantenha fora do alcance de crianças. 

Ingredientes:
Álcool desnaturado; Perfume; Água; Octissalato; Avobenzona; Vermelho 33; Corante violeta 60730; Azul brilhante; Cloreto de sódio; Sulfato de sódio; Alfa-isometil ionona; Citral; Citronelol; Cumarina; Geraniol; Limoneno; Linalol.
Devido à presença de alguns ingredientes, a cor do produto pode variar, porém sem comprometer sua qualidade ou segurança.

Nenhum produto O Boticário é testado em animais, ou seja, este item possui selo Cruelty Free. Produto vegano.",
209.90,null,0,90,'Floratta-Fleur-Eclipse-1.png', 'Floratta-Fleur-Eclipse-2.jpg', 'Floratta-Fleur-Eclipse-3.jpg',5,)94
--#endregion


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(95,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Kit Tododia Máscaras Reparação, Nutrição e Hidratação', 'Natura', '250ml',
'Cronocapilar completo com fórmulas para hidratar, nutrir ou reparar seus fios.
O Cronocapilar de Natura Tododia tem três máscaras concentradas que proporcionam cuidado intenso desde o primeiro uso. Suas fórmulas com Tecnologia Prebiótica cuidam da raiz às pontas para hidratar, nutrir ou reparar os fios. Tododia é dia de cuidar dos seus cabelos com produtos gostosos e fragrâncias deliciosas que trazem bem-estar para sua rotina de um jeito simples e descomplicado.',
'Cronocapilar completo com fórmulas para hidratar, nutrir ou reparar seus fios.
O Cronocapilar de Natura Tododia tem três máscaras concentradas que proporcionam cuidado intenso desde o primeiro uso. Suas fórmulas com Tecnologia Prebiótica cuidam da raiz às pontas para hidratar, nutrir ou reparar os fios. Tododia é dia de cuidar dos seus cabelos com produtos gostosos e fragrâncias deliciosas que trazem bem-estar para sua rotina de um jeito simples e descomplicado.

Benefícios:
• Máscara Hidrata: feita com pantenol e extrato de aloe vera, que hidratam e retém a água dos fios. Essa máscara promove uma hidratação profunda e sem pesar, que recupera os fios dos desgastes do dia a dia. Devolve o brilho e movimento dos fios, deixando seu cabelo mais macio e solto. Fragrância fresca e delicada com notas de maçã verde.
• Máscara Nutre: feita com óleo de coco e óleo de amêndoa, que repõem os nutrientes. Essa máscara nutre profundamente, dá brilho e combate o frizz. Perfeita para revitalizar seu cabelo de maneira rápida e prática. Fragrância alegre e cremosa, com notas de pêssego.
• Máscara Repara: feita com arginina e óleo de abacate, que reparam fios danificados com uma recarga de aminoácidos. Essa máscara repara danos causados por procedimentos químicos e devolve o aspecto saudável dos fios. Fragrância feminina e envolvente, com notas de flor de cereja.

Conteúdo::
1 Máscara concentrada cronocapilar repara 250 ml.
1 Máscara concentrada cronocapilar nutre 250 ml.
1 Máscara concentrada cronocapilar hidrata 250 ml.

Dicas de uso:
Após lavar seus cabelos com os produtos de Tododia, aplique a máscara por todo o comprimento dos fios úmidos, evitando a raiz. Deixe agir por 3 minutos, aproveite o momento e relaxe. Em seguida, enxágue.

Ingredientes:
Máscara repara: ÁGUA, ÁLCOOL CETOESTEARÍLICO, METOSSULFATO DE BEENTRIMÔNIO, PALMITATO DE ISOPROPILA, DIMETICONOL, ÉSTERES CETÍLICOS, CLORETO DE CETRIMÔNIO, ESTEARAMIDOPROPIL DIMETILAMINA, PERFUME, FENOXIETANOL, ÓLEO DE HÍBRIDO DE HELIANTHUS ANNUUS, GOMA GUAR, ÁCIDO CÍTRICO, ÓLEO DE PERSEA RATISSIMA, ARGININA, DODECILBENZENOSULFONATO DE TEA, HEXIL CINAMAL, ÁCIDO LÁCTICO, EDETATO DISSÓDICO, DILAURATO DE PEG-4, LAURATO DE PEG-4, LIMONENO, ÁLCOOL BENZÍLICO, LINALOL, BUTILCARBAMATO DE IODOPROPINILA, MACROGOL, HIDRÓXIDO DE SÓDIO, CARBONATO DE SÓDIO, CLORETO DE SÓDIO.Mascara nutre: ÁGUA, ÁLCOOL CETOESTEARÍLICO, LAURATO DE ISOAMILA, CLORETO DE BEENTRIMÔNIO, GLICEROL, DIMETICONOL, ÉSTERES CETÍLICOS, ESTEARAMIDOPROPIL DIMETILAMINA, PERFUME, GOMA GUAR, FENOXIETANOL, DIEPTANOATO DE PROPILENOGLICOL, ÓLEO DE COCO, DIMETICONA, ÁCIDO CÍTRICO, ÁLCOOL ISOPROPÍLICO, ÓLEO DE AMÊNDOAS , ÁCIDO LÁCTICO, DODECILBENZENOSULFONATO DE TEA, HEXIL CINAMAL, EDETATO DISSÓDICO, SALICILATO DE BENZILA, DILAURATO DE PEG-4, LAURATO DE PEG-4, LINALOL, LIMONENO, ÁLCOOL BENZÍLICO, CITRONELOL, CUMARINA, BUTILCARBAMATO DE IODOPROPINILA , MACROGOL, HIDRÓXIDO DE SÓDIO, CARBONATO DE SÓDIO, CLORETO DE SÓDIO.Máscara hidrata:',
137,70,null,0,40,'kit-mascaras-natura-1.png','kit-mascaras-natura-2.jpg',null,16,95,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(96,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Máscara Concentrada Crono Capilar Tododia Hidrata','Natura1','250ml',
'Cuidado intenso para cabelos hidratados desde o primeiro uso.
A Máscara Concentrada Crono Capilar TodoDia Hidrata oferece um cuidado intenso e rápido, recuperando os fios dos desgastes diários.',
'Com uma fórmula leve e prática, ela hidrata profundamente sem pesar, devolvendo o brilho e a maciez desde o primeiro uso. Enriquecida com pantenol e extrato de aloe vera, que hidratam e retêm a umidade nos fios, esta máscara deixa o cabelo mais solto, macio e com movimento. A fragrância fresca e delicada com notas de maçã verde transforma o cuidado em um momento de bem-estar.

Benefícios:
 - Enriquecido com pantenol e extrato de aloe vera, que hidratam e retêm a umidade.
 - Fragrância fresca e delicada com notas de maçã verde.
 - Hidrata profundamente sem pesar.
 - Recupera os fios dos desgastes do dia a dia.
 - Devolve brilho e movimento aos cabelos.
 - Cabelos mais macios e soltos.
 - Fórmula com 98% de ingredientes de origem natural.

Características:
 - Tipo de cabelo: todos os tipos de cabelos
 - Cruelty free
 - Vegano
 - Ocasião: cuidado diário
 
Dicas de uso:
Aplique nos fios úmidos, evitando a raiz, e deixe agir por 3 minutos. Aproveite esse momento para relaxar e em seguida enxágue. Use regularmente para cabelos mais saudáveis e hidratados.

Ingredientes:
ÁGUA, ÁLCOOL CETÍLICO, CLORETO DE BEENTRIMÔNIO, ÁLCOOL ESTEARÍLICO, BIS-CETEARILAMODIMETICONA, FARNESENO HIDROGENADO, PERFUME, ESTEARAMIDOPROPIL DIMETILAMINA, FENOXIETANOL, ÓLEO DEHÍBRIDO DE HELIANTHUS ANNUUS, ÁLCOOL ISOPROPÍLICO, MALTODEXTRINA, PANTENOL, ÁCIDO LÁCTICO, EXTRATO DAFOLHA DE ALOE BARBADENSIS, ÁCIDO CÍTRICO, CETOMACROGOL 1000, CETOMACROGOL 1000, EDETATO DISSÓDICO,ÁLCOOL MIRISTÍLICO, DILAURATO DE PEG-4, LAURATO DE PEG-4, CAPRILILGLICOL, BUTILCARBAMATO DE IODOPROPINILA ,MACROGOL, ÁCIDO GLICÓLICO, HIDRÓXIDO DE SÓDIO, CARBONATO DE SÓDIO, CLORETO DE SÓDIO.',
45.90,32.13,1,30,'natura-mascara-tododia-hidrata-1.png', 'natura-mascara-tododia-hidrata-2.jpg', 'natura-mascara-tododia-hidrata-3.jpg',16,96,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(97,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Máscara Concentrada Crono Capilar Tododia Nutre','Natura','250ml',
'A Máscara Concentrada Crono Capilar TodoDia Nutre oferece cuidado intenso, revitalizando e nutrindo os cabelos profundamente.',
'Perfeita para recuperar cabelos ressecados e com frizz, sua fórmula rica em óleo de coco e óleo de amêndoa repõe os nutrientes essenciais dos fios, deixando-os com brilho, maciez e sem frizz. Com uma fragrância alegre e cremosa, que traz as notas encantadoras de pêssego e baunilha, ela transforma o cuidado capilar em um momento de prazer e bem-estar.

Benefícios:
 - Enriquecida com óleo de coco e óleo de amêndoa, que repõem os nutrientes.
 - Nutre e revitaliza cabelos ressecados.
 - Combate o frizz e recupera o brilho dos fios.
 - Cabelos macios e soltos desde o primeiro uso.
 - Fragrância alegre com notas de pêssego.
 - Fórmula com 95% de ingredientes de origem natural.

Características:
 - Tipo de cabelo: todos os tipos de cabelos
 - Cruelty free
 - Vegano
 - Ocasião: cuidado diário
 
Dicas de uso:
Aplique a máscara nos fios úmidos, evitando a raiz, e deixe agir por 3 minutos. Aproveite esse tempo para relaxar e, em seguida, enxágue bem. Para melhores resultados, use regularmente.

Ingredientes:
ÁGUA, ÁLCOOL CETOESTEARÍLICO, LAURATO DE ISOAMILA, CLORETO DE BEENTRIMÔNIO, GLICEROL, DIMETICONOL, ÉSTERES CETÍLICOS, ESTEARAMIDOPROPIL DIMETILAMINA, PERFUME, GOMA GUAR, FENOXIETANOL, DIEPTANOATO DE PROPILENOGLICOL, ÓLEO DE COCO, DIMETICONA, ÁCIDO CÍTRICO, ÁLCOOL ISOPROPÍLICO, ÓLEO DE AMÊNDOAS , ÁCIDO LÁCTICO, DODECILBENZENOSULFONATO DE TEA, HEXIL CINAMAL, EDETATO DISSÓDICO, SALICILATO DE BENZILA, DILAURATO DE PEG-4, LAURATO DE PEG-4, LINALOL, LIMONENO, ÁLCOOL BENZÍLICO, CITRONELOL, CUMARINA, BUTILCARBAMATO DE IODOPROPINILA , MACROGOL, HIDRÓXIDO DE SÓDIO, CARBONATO DE SÓDIO, CLORETO DE SÓDIO.',
45.90,27.54,1,30,'natura-mascara-tododia-nutre-1.png', 'natura-mascara-tododia-nutre-2.png', 'natura-mascara-tododia-nutre-3.png',16,97,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(98,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Máscara Concentrada Crono Capilar Tododia Repara','Natura','250ml',
'A Máscara Concentrada Crono Capilar TodoDia Repara oferece um cuidado intenso, restaurando cabelos enfraquecidos e danificados por procedimentos químicos.',
'Sua fórmula enriquecida com arginina e óleo de abacate proporciona uma recarga de aminoácidos que repara os fios, devolvendo seu aspecto saudável. Com uma fragrância envolvente de flor de cereja, a máscara transforma o cuidado capilar em um momento de prazer e bem-estar. Ideal para quem busca cabelos mais fortes, saudáveis desde o primeiro uso.

Benefícios:
 - Repara danos causados por procedimentos químicos.
 - Recupera cabelos enfraquecidos e danificados.
 - Enriquecida com arginina e óleo de abacate, que restauram os fios.
 - Devolve o aspecto saudável dos fios.
 - Fragrância envolvente com notas de flor de cereja.
 - Fórmula com 95% de ingredientes de origem natural.

Características:
 - Tipo de cabelo: todos os tipos de cabelos
 - Cruelty free
 - Vegano
 - Ocasião: cuidado diário
 
Dicas de uso:
Aplique a máscara nos fios úmidos, evitando a raiz, e deixe agir por 3 minutos. Aproveite para relaxar enquanto o produto repara os fios. Enxágue bem em seguida.

Ingredientes:
ÁGUA, ÁLCOOL CETOESTEARÍLICO, METOSSULFATO DE BEENTRIMÔNIO, PALMITATO DE ISOPROPILA, DIMETICONOL, ÉSTERES CETÍLICOS, CLORETO DE CETRIMÔNIO, ESTEARAMIDOPROPIL DIMETILAMINA, PERFUME, FENOXIETANOL, ÓLEO DE HÍBRIDO DE HELIANTHUS ANNUUS, GOMA GUAR, ÁCIDO CÍTRICO, ÓLEO DE PERSEA RATISSIMA, ARGININA, DODECILBENZENOSULFONATO DE TEA, HEXIL CINAMAL, ÁCIDO LÁCTICO, EDETATO DISSÓDICO, DILAURATO DE PEG-4, LAURATO DE PEG-4, LIMONENO, ÁLCOOL BENZÍLICO, LINALOL, BUTILCARBAMATO DE IODOPROPINILA, MACROGOL, HIDRÓXIDO DE SÓDIO, CARBONATO DE SÓDIO, CLORETO DE SÓDIO.',
45.90,null,0,30,'natura-mascara-tododia-repara-1.png', 'natura-mascara-tododia-repara-2.png', 'natura-mascara-tododia-repara-3.png',16,98,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(99,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Spray Hidratante Tododia Maçã Verde e Aloe Vera','Natura','200ml',
'Natura Tododia Spray Hidratante Maçã Verde e Aloe Vera é a combinação perfeita de frescor e hidratação para seus cabelos.',
'Com uma fórmula leve e refrescante, proporciona hidratação instantânea, deixando seus cabelos com menos frizz, macios, soltinhos e com brilho radiante. Sua fragrância deliciosa, inspirada na maçã verde e na aloe vera, traz a sensação de bem-estar e vitalidade, ideal para o dia a dia.

Benefícios:
 - Para todas as curvaturas.
 - Textura leve que não pesa.
 - Fios soltinhos e radiantes.
 - Cabelos sem frizz por mais tempo.
 - Hidratação prolongada.
 - Fragrância fresca e delicada com notas de maçã verde.
 - Cabelos mais macios e sedosos.
 - Proteção térmica para evitar danos causados pelo calor do secador.
 - Fórmula com 95% ingredientes de origem natural.
 - Recupera os fios dos desgastes do dia a dia.

Características:
 - Tipo de cabelo: todos os tipos de cabelos
 - Cruelty free
 - Vegano
 - Ocasião: cuidado diário
 
Dicas de uso:
Aplique nos fios secos ou úmidos, do comprimento às pontas, evitando a raiz. Sem enxágue.',
37.90,null,0,30,'spray-hidratante-tododia-maca-1.png', 'spray-hidratante-tododia-maca-2.jpg', 'spray-hidratante-tododia-maca-3.jpg',16,99,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(100,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Shampoo Hidratante Tododia Maçã Verde e Aloe Vera','Natura','300ml',
'O Shampoo Hidratante Tododia Maçã Verde e Aloe Vera limpa e hidrata sem pesar os fios. ',
'Limpa e deixa seus cebelos soltinhos. Sua fórmula equilibrada deixa os cabelos soltinhos e brilhantes. Tododia é dia de cuidar dos seus cabelos com produtos gostosos e fragrâncias deliciosas que trazem bem-estar para sua rotina de um jeito simples e descomplicado. Essa linha conta com a exclusiva Tecnologia Prebiótica, que cuida da raiz às pontas.

Características:
 - Tipo de cabelo: todos os tipos de cabelos
 - Cruelty free
 - Vegano
 - Ocasião: cuidado diário

Dicas de uso:
 - Deixe a sua rotina mais gostosa.
 - Aplique o shampoo nos cabelos molhados. Massageie até formar espuma e enxágue em seguida.
 
Ingredientes:
ÁGUA, LAURILSULFATO DE SÓDIO, COCOAMIDOPROPILBETAÍNA, DECIL GLICOSÍDEO , GLICEROL, COCOATO DE PEG-7 GLICERILA, PERFUME, CLORETO DE SÓDIO, BENZOATO DE SÓDIO, POLIQUATÉRNIO-39, ÁCIDOCÍTRICO, SORBATO DE POTÁSSIO, TRIOLEATO DE PEG-120 METIL GLICOSE, PROPILENOGLICOL, GLICONATO DE SÓDIO, HIDRÓXIDO DE SÓDIO, MALTODEXTRINA, EXTRATO DA FOLHA DE ALOE BARBADENSIS, ÓLEO DA SEMENTE DE ORBIGNYA OLEIFERA, CARBONATO DE SÓDIO.',
33.90,null,0,30,'shampoo-hidratante-tododia-maca-1.png','shampoo-hidratante-tododia-maca-2.png','shampoo-hidratante-tododia-maca-3.png',15,100,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(101,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Condicionador Hidratante Tododia Maçã Verde e Aloe Vera','Natura','280ml',
'O Condicionador Hidratante Tododia Maçã Verde e Aloe Vera promove uma hidratação profunda e sem pesar.',
'Hidrata sem pesar os fios.
Sua textura cremosa desliza entre os fios, deixando eles soltinhos e brilhantes. Tododia é dia de cuidar dos seus cabelos com produtos gostosos e fragrâncias deliciosas que trazem bem-estar para sua rotina de um jeito simples e descomplicado. Essa linha conta com a exclusiva Tecnologia Prebiótica, que cuida da raiz às pontas.

Características:
 - Tipo de cabelo: todos os tipos de cabelos
 - Cruelty free
 - Vegano
 - Ocasião: cuidado diário

Dicas de uso:
Aplique o condicionador nos cabelos molhados. Espalhe por todo o comprimento do cabelo, evitando a raiz. Enxágue em seguida.

Ingredientes:
ÁGUA, ÁLCOOL CETOESTEARÍLICO, CLORETO DE BEENTRIMÔNIO, ESTEARAMIDOPROPIL DIMETILAMINA, PERFUME, FENOXIETANOL, FARNESENO HIDROGENADO, DICAPRILIL ÉTER, LAURATO DE ISOAMILA, DIMETICONOL, MALTODEXTRINA, ÁLCOOL ISOPROPÍLICO, EXTRATO DA FOLHA DE ALOE BARBADENSIS, ÓLEO DE HÍBRIDO DE HELIANTHUS ANNUUS, ÁCIDO CÍTRICO, ÓLEO DE COCO, DIEPTANOATO DE PROPILENOGLICOL, ÁCIDO LÁCTICO, EDETATO DISSÓDICO, DILAURATO DE PEG-4, LAURATO DE PEG-4, DODECILBENZENOSULFONATO DE TEA, BUTILCARBAMATO DE IODOPROPINILA , MACROGOL, ÁLCOOL BENZÍLICO, TOCOFEROL, HIDRÓXIDO DE SÓDIO, CARBONATO DE SÓDIO, CLORETO DE SÓDIO.',
35.90,null,0,30,'condicionador-hidratante-tododia-maca-1.png', 'condicionador-hidratante-tododia-maca-2.jpg', 'condicionador-hidratante-tododia-maca-3.jpg',15,101,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(102,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Shampoo Reparador Tododia Flor de Cereja e Abacate','Natura','300ml',
'O Shampoo Reparador Tododia Flor de Cereja e Abacate limpa e recupera os cabelos danificados pelo uso de produtos químicos.',
'Limpeza suave com espuma envolvente e perfumada.
Sua fórmula com óleo de abacate não agride os fios e ainda evita o ressecamento. Tododia é dia de cuidar dos seus cabelos com produtos gostosos e fragrâncias deliciosas que trazem bem-estar para sua rotina de um jeito simples e descomplicado. Essa linha conta com a exclusiva Tecnologia Prebiótica, que cuida da raiz às pontas.

Benefícios:
 - Repara os fios e melhora a sua resistência.
 - Evita o ressecamento.
 - Espuma envolvente.
 - Fragrância feminina e envolvente, com notas de flor de cereja.
 - Limpeza suave que não agride os fios.
 - Para todas as curvaturas.
 - Repara cabelos danificados por procedimentos químicos.
 - Fórmula com 92% ingredientes de origem natural.

Características:
 - Tipo de cabelo: todos os tipos de cabelos
 - Cruelty free
 - Vegano
 - Ocasião: cuidado diário

Dicas de uso:
 - Deixe a sua rotina mais gostosa.
 - Aplique o shampoo nos cabelos molhados. Massageie até formar espuma e enxágue em seguida.

Ingredientes:
ÁGUA, LAURILSULFATO DE SÓDIO, COCOAMIDOPROPILBETAÍNA, CLORETO DE SÓDIO, COPOLÍMERO DE ÁCIDO METACRÍLICO E ACRILATO DE ETILA, DECIL GLICOSÍDEO , DIMETICONOL, ÁCIDO CÍTRICO, PERFUME, COCO-GLICOSÍDEO, DIESTEARATO DE ETILENOGLICOL, BENZOATO DE SÓDIO, POLIQUATÉRNIO-6, HIDRÓXIDO DE SÓDIO, SORBATO DE POTÁSSIO, POLIQUATÉRNIO-39, TRIOLEATO DE PEG-120 METIL GLICOSE, PROPILENOGLICOL, ARGININA, ÓLEO DE RÍCINO HIDROGENADO ETOXILADO, GLICONATO DE SÓDIO, POLIQUATÉRNIO-22, ÓLEO DE PERSEA GRATISSIMA, GLICEROL, HEXIL CINAMAL, DODECILBENZENOSULFONATO DE TEA, LIMONENO, MONOLEATO DE GLICERILA, MONOESTEARATO DE GLICERILA, ÁLCOOL BENZÍLICO, ÓLEO DA SEMENTE DE ORBIGNYA OLEIFERA, ÁCIDO BENZOICO, CARBONATO DE SÓDIO, BUTILCARBAMATO DE IODOPROPINILA.',
33.90,null,0,30,'shampoo-reparador-tododia-flor-1.png', 'shampoo-reparador-tododia-flor-2.jpg', 'shampoo-reparador-tododia-flor-3.jpg',15,102,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(103,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Condicionador Reparador Tododia Flor de Cereja e Abacate','Natura','280ml',
'O Condicionador Reparador Tododia Flor de Cereja e Abacate recupera os cabelos danificados pelo uso de produtos químicos.',
'Fios selados e com menos pontas duplas.
Sua fórmula com óleo de abacate sela os fios e reduz pontas duplas. Tododia é dia de cuidar dos seus cabelos com produtos gostosos e fragrâncias deliciosas que trazem bem-estar para sua rotina de um jeito simples e descomplicado. Essa linha conta com a exclusiva Tecnologia Prebiótica, que cuida da raiz às pontas.

Benefícios:
 - Repara e revitaliza os fios.
 - Repara cabelos danificados por procedimentos químicos.
 - Fórmula com 94% ingredientes de origem natural.
 - Para todas as curvaturas.
 - Fragrância feminina e envolvente, com notas de flor de cereja.
 - Deixa os fios com aspecto saudável.
 - Reduz pontas duplas.

Características:
 - Tipo de cabelo: todos os tipos de cabelos
 - Cruelty free
 - Vegano
 - Ocasião: cuidado diário

Dicas de uso:
Aplique o condicionador nos cabelos molhados. Espalhe por todo o comprimento do cabelo, evitando a raiz. Enxágue em seguida.

Ingredientes:
ÁGUA, ÁLCOOL CETOESTEARÍLICO, CLORETO DE BEENTRIMÔNIO, BIS-CETEARILAMODIMETICONA, DIMETICONOL, FENOXIETANOL, PERFUME, ÁLCOOL ISOPROPÍLICO, ÓLEO DE PERSEA GRATISSIMA,CETOMACROGOL 1000, CETOMACROGOL 1000, ARGININA, ÁCIDO CÍTRICO, DODECILBENZENOSULFONATO DE TEA,EDETATO DISSÓDICO, DILAURATO DE PEG-4, LAURATO DE PEG-4, HEXIL CINAMAL, LIMONENO, CAPRILILGLICOL, ÁLCOOLBENZÍLICO, BUTILCARBAMATO DE IODOPROPINILA , MACROGOL, ÁCIDO GLICÓLICO, HIDRÓXIDO DE SÓDIO, CARBONATO DESÓDIO, CLORETO DE SÓDIO.',
35.90,null,0,30,'condicionador-reparador-tododia-flor-1.png', 'condicionador-reparador-tododia-flor-2.jpg', 'condicionador-reparador-tododia-flor-3.jpg',15,103)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(104,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Shampoo Nutritivo Tododia Pêssego e Amêndoa','Natura','300ml',
'O Shampoo Nutritivo Tododia Pêssego e Amêndoa limpa os cabelos sem ressecar.',
'Protege do ressecamento e realça o brilho dos fios.
Sua fórmula com óleo de amêndoa deixa os fios mais macios, nutridos e sedosos. Tododia é dia de cuidar dos seus cabelos com produtos gostosos e fragrâncias deliciosas que trazem bem-estar para sua rotina de um jeito simples e descomplicado. Essa linha conta com a exclusiva Tecnologia Prebiótica, que cuida da raiz às pontas.

Características:
 - Tipo de cabelo: todos os tipos de cabelos
 - Cruelty free
 - Vegano
 - Ocasião: cuidado diário
 
Dicas de uso:
Deixe a sua rotina mais gostosa.
Aplique o shampoo nos cabelos molhados. Massageie até formar espuma e enxágue em seguida.',
33.90,null,0,30,'shampoo-nutritivo-tododia-pessego-1.png', 'shampoo-nutritivo-tododia-pessego-2.jpg','shampoo-nutritivo-tododia-pessego-3.jpg',15,104,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(105,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Condicionador Nutritivo Tododia Pêssego e Amêndoa','Natura','280ml',
'O Condicionador Nutritivo Tododia Pêssego e Amêndoa nutre intensamente e devolve o brilho natural dos cabelos.',
'Nutre intensamente e devolve o brilho natural.
Sua fórmula com óleo de amêndoa deixa os fios sedosos e com menos frizz. Tododia é dia de cuidar dos seus cabelos com produtos gostosos e fragrâncias deliciosas que trazem bem estar para sua rotina de um jeito simples e descomplicado. Essa linha conta com a exclusiva Tecnologia Prebiótica, que cuida da raiz às pontas.

Benefícios:
 - Fragrância alegre e cremosa, com notas de pêssego.
 - Desembaraça.
 - Reduz o frizz.
 - Textura cremosa que desmaia o fio.
 - Nutre intensamente.
 - Devolve o brilho natural.
 - Fórmula com 96% ingredientes de origem natural.
 - Para todas as curvaturas.
 - Cabelos mais sedosos.
 
Características:
 - Tipo de cabelo: todos os tipos de cabelos
 - Cruelty free
 - Vegano
 - Ocasião: cuidado diário

Dicas de uso:
Aplique o condicionador nos cabelos molhados. Espalhe por todo o comprimento do cabelo, evitando a raiz. Enxágue em seguida.

Ingredientes:
ÁGUA, ÁLCOOL CETOESTEARÍLICO, PALMITATO DE ISOPROPILA, CLORETO DE BEENTRIMÔNIO,DIMETICONA, ÓLEO DE AMÊNDOAS , GOMA GUAR, FENOXIETANOL, PERFUME, ÁLCOOL ISOPROPÍLICO, HEXIL CINAMAL,ÁCIDO CÍTRICO, EDETATO DISSÓDICO, DILAURATO DE PEG-4, LAURATO DE PEG-4, LINALOL, SALICILATO DE BENZILA,LIMONENO, CITRONELOL, CUMARINA, BUTILCARBAMATO DE IODOPROPINILA , MACROGOL, HIDRÓXIDO DE SÓDIO,CARBONATO DE SÓDIO, CLORETO DE SÓDIO.',
35.90,null,0,30,'condicionador-nutritivo-tododia-pessego-1.png', 'condicionador-nutritivo-tododia-pessego-2.jpg', ',condicionador-nutritivo-tododia-pessego-3.jpg',15,105,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(106,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 




--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(106,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Shampoo de Tratamento Antissinais Regenerador Capilar Lumina','Natura','300ml',
'Ação antissinais com proteção antioxidante para o couro cabeludo e fios.',
'Neutraliza o efeito dos radicais livres e desacelera os sinais do tempo. Fórmula com Tecnologia Bioproteína Tripla Ação + Ativo ProMelanina: protege a melanina e estimula a formação da cor natural dos cabelos.
Nova fragrância com bergamota, frésia e sândalo.

Benefícios com o uso da linha completa:
 - Previne e reverte a aparição dos fios brancos
 - Protege e estimula a produção de melanina, mantendo a pigmentação natural dos fios
 - Tratamento progressivo com resultados cientificamente comprovados.

Características:
 - Tipo de cabelo: todos os tipos de cabelos
 - Cruelty free
 - Vegano
 
Dicas de uso:
 - Aplique o shampoo de Natura Lumina nos cabelos molhados, massageando o couro cabeludo. Enxágue em seguida.
 
Ingredientes:
ÁGUA, SULFATO DE SÓDIO LAURETE, COCAMIDOPROPIL BETAÍNA, COPOLÍMERO DE ÁCIDO METACRÍLICO E ACRILATO DE ETILA, PERFUME, ÁCIDO CÍTRICO, ÓXIDO DE LAURAMINA, DIESTEARATO DE ETILENOGLICOL, TRIETANOLAMINA, BIS-CETEARIL AMODIMETICONA, CAFEÍNA, LAURETE-4, BENZOATO DE SÓDIO, POLIQUATÉRNIO-6, POLIQUATÉRNIO-22, SORBATO DE POTÁSSIO, PROPANODIOL, LINALOL, EDETATO DISSÓDICO, ÓLEO DA SEMENTE DE CASTANHA-DO-PARÁ, GLICEROL, LIMONENO, HIDRÓXIDO DE SÓDIO, CETEARETE-25, CETEARETE-7, HEXIL CINAMAL, MANTEIGA DA SEMENTE DE MURUMURU [ASTROCARYUM MURUMURU], ÁCIDO BENZOICO, CAPRILILGLICOL, FENOXIETANOL, EXTRATO DE GROSELHA-DA-ÍNDIA, ÁCIDO GLICÓLICO, POLIPEPTÍDEO-1 DE SR-ARANHA, ÓLEO DE RÍCINO HIDROGENADO PEG-40, CLORETO DE SÓDIO, TOCOFEROL, 1,2-HEXANODIOL.',
52.90,null,0,30,'shampoo-antissinais-lumina-1.png', 'shampoo-antissinais-lumina-2.jpg', 'shampoo-antissinais-lumina-3.jpg',16,106,)



--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(107,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Sérum de Prevenção Antissinais Regenerador Capilar Lumina','Natura','100ml',
'Previne e posterga a aparição de fios brancos, mantendo a pigmentação natural dos fios.',
'Previne e reverte a aparição dos fios brancos, protege e estimula a produção de melanina, mantendo a pigmentação natural dos fios. Tratamento progressivo com resultados cientificamente comprovados, com o uso diário do sérum por 90 dias.

Características:
 - Tipo de cabelo: todos os tipos de cabelos
 - Cruelty free
 - Vegano
 
Dicas de uso:
Antes de dormir, aplique o sérum Lumina em toda a extensão do couro cabeludo. Posicione o aplicador próximo ao couro cabeludo e acione a válvula. Em seguida, massageie com as pontas dos dedos. Não enxaguar. No dia seguinte, caso sinta necessidade, lave os cabelos. O produto pode ser aplicado no couro cabeludo com os cabelos limpos, úmidos ou secos.

Ingredientes:
ÁGUA, ÁLCOOL ETÍLICO, ÓLEO DE RÍCINO HIDROGENADO PEG-40, PROPANODIOL, PERFUME, CAFEÍNA, GLICEROL, SORBATO DE POTÁSSIO, CROSPOLÍMERO DE ACRILATOS/ACRILATO DE ALQUILA C10-30, LINALOL, TRIETANOLAMINA, EDETATO DISSÓDICO, LIMONENO, EXTRATO DE GROSELHA-DA-ÍNDIA, HEXIL CINAMAL, POLIPEPTÍDEO-1 DE SR-ARANHA, CITRAL, CITRONELOL, GERANIOL, ÁCIDO CÍTRICO, CAPRILILGLICOL, 1,2-HEXANODIOL.',
89.90,null,0,'serum-antissinais-lumina-1.png', 'serum-antissinais-lumina-2.jpg', 'serum-antissinais-lumina-3.jpg',16,107,)



--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(108,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Shampoo Cabelo Corpo e Barba Essencial','Natura','100ml',
'Limpa e perfuma o cabelo, a barba e o corpo com a fragrância amadeirada de Essencial.',
'Perfeito para homens que gostam de um ritual de cuidados prático e com fragrância amadeirada. Este shampoo 3 em 1 limpa o corpo, a barba e os cabelos sem pesar. Ideal para ser combinado em um presente com os demais produtos de Essencial.

Benefícios:
• Prático, pode ser usado no cabelo, barba e corpo.
• Limpa sem pesar.
• Fragrância amadeirada que combina com o Deo Parfum da linha.
• Fórmula 87% de origem natural.
• Produto vegano.

Características:
 - Tipo de cabelo: todos os tipos de cabelos
 - Cruelty free
 - Vegano

Conteúdo: 100 ml.

Ingredientes:
AQUA, SODIUM LAURETH SULFATE, COCAMIDOPROPYL BETAINE, PARFUM, PPG-1-PEG-9 LAURYL GLYCOL ETHER, PHENOXYETHANOL, SODIUM CHLORIDE, POLYQUATERNIUM-10, LINALOOL, CITRIC ACID, LIMONENE TRIETHANOLAMINE, TETRASODIUM EDTA, PEG-4 DILAURATE, PEG-4 LAURATE, SODIUM HYDROXIDE, HYDROXYCITRONELLAL, HEXYL CINNAMAL, PEG-120 METHYL GLUCOSE TRIOLEATE, PROPYLENE GLYCOL, BENZYL BENZOATE, CITRAL, IODOPROPYNYL BUTYLCARBAMATE, PEG-200. INGREDIENTES (PORTUGUÊS): ÁGUA, LAURILETERSULFATO DE SÓDIO, COCOAMIDOPROPILBETAÍNA, PERFUME, PPG-1-PEG-9 LAURIL GLICOL ÉTER, FENOXIETANOL, CLORETO DE SÓDIO, POLIQUATÉRNIO-1O, LINALOL, ÁCIDO CÍTRICO, LIMONENO, TROLAMINA, EDETATO DE SÓDIO, DILAURATO DE PEG-4, LAURATO DE PEG-4, HIDRÓXIDO DE SÓDIO, HIDROXICITRONELAL, HEXIL CINAMAL, TRIOLEATO DE PEG-120 METIL GLICOSE, PROPILENOGLICOL, BENZOATO DE BENZILA, CITRAL, BUTILCARBAMATO DE IODOPROPINILA, MACROGOL.',
35.50,17.70,1,30,'shampoo-cabelo-corpo-barba-essencial-1.png', 'shampoo-cabelo-corpo-barba-essencial-2.jpg', 'shampoo-cabelo-corpo-barba-essencial-3.jpg',15,108,)



--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(109,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Sérum Noturno Força e Reparação Molecular Lumina','Natura','100ml',
'Sérum que repara as ligações internas do fio a nível molecular para 5 vezes mais força e potencializa o tratamento do sistema força e reparação',
'Produto multifuncional, também pode ser usado como pré-shampoo e finalizador. Nova fragrância autoral que combina bergamota, rosa, cedro e musk.

Sistema de tratamento força e reparação molecular:
• Cabelos 5 vezes mais fortes e protegidos contra danos futuros.
• Tratamento progressivo com resultados cientificamente comprovados desde a primeira aplicação.


3 formas de usar:
• Modo 1: Como tratamento noturno
Recupera a massa capilar para ação antiquebra, elimina 95% das pontas duplas e promove 2 vezes mais brilho.
• Modo 2: como pré-shampoo
Protege as pontas dos fios antes da lavagem para prevenir os danos.
• Modo 3: no pós-banho
Finaliza, trata e alinha as cutículas para mais elasticidade e força. Sem enxágue, pode ser usado com os cabelos molhados ou secos.

Características:
• Tipo de cabelo: todos os tipos de cabelos
• Cruelty free
• Vegano
• Tipo de tratamento: força e reparação molecular.

Dicas de uso:
Aplique o produto nas mãos, espalhe e aplique nos cabelos úmidos ou secos, evitando a raiz. Use com ou sem enxágue.

Ingredientes:
ÁGUA, POLIQUATÉRNIO-37, DICAPRILATO/DICAPRATO DE PROPILENOGLICOL, COCOATO DE DECILA, DIMETICONA, PERFUME, TREALOSE, FENOXIETANOL, CLORETO DE HIDROXIPROPIL GUAR HIDROXIPROPILTRIMÔNIO, PPG-1 PEG-6 ÉTER DE ÁLCOOL TRIDECÍLICO, LINALOL, EDETATO DISSÓDICO, HEXIL CINAMAL, DILAURATO DE PEG-4, LAURATO DE PEG-4, ÁCIDO CÍTRICO, SALICILATO DE BENZILA, LIMONENO, CITRAL, BUTILCARBAMATO DE IODOPROPINILA , MACROGOL, SR-ARANHA POLIPEPTÍDEO-1, HIDROXICITRONELAL, CITRONELOL, GERANIOL, HIDRÓXIDO DE SÓDIO, CAPRILILGLICOL, 1,2-HEXANODIOL, CARBONATO DE SÓDIO, CLORETO DE SÓDIO.',
73.90,58.90,1,30,'serum-noturno-lumina-1.png', 'serum-noturno-lumina-2.jpg', 'serum-noturno-lumina-3.jpg',16,109,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(110,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Shampoo Reequilibrante Anticaspa','Natura','300ml',
'Elimina até 99% da caspa sem agredir o couro cabeludo.
A linha para Tratamento Anticaspa de Lumina mudou! São novas embalagens e ainda mais tecnologia para cuidar do seu cabelo.',
'Com BioProteína Tripla Ação e Ativo Dermocontrole, esse sistema deixa o cabelo até 99% livre da caspa sem ressecar e promove o reequilíbrio da microbiota para controle da caspa por mais tempo. O Shampoo Reequilibrante Anticaspa Lumina é um passo essencial nesse ritual, com fórmula que promove limpeza suave sem ressecar ou agredir.

Características:
• Tipo de cabelo: todos os tipos de cabelos
• Cruelty free
• Vegano
• Tipo de tratamento: anticaspa.

Dicas de uso:
Aplique o shampoo nos cabelos molhados, massageando o couro cabeludo com movimentos circulares. Enxágue. Pós o uso do shampoo, você pode complementar o ritual de cuidados com o condicionador Lumina de sua preferência.',
52.90,39.90,1,30,'shampoo-anticaspa-lumina-1.png', 'shampoo-anticaspa-lumina-2.jpg', 'shampoo-anticaspa-lumina-3.jpg',15,110,)



--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(111,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Creme de Pentear Ativador para Definição e Nutrição de Cabelos Crespos','Natura','300ml',
'Cabelos 73% mais definidos, 2 vezes mais brilhantes e com ação antiencolhimento.
A linha para Cabelos Crespos de Lumina mudou! Agora o seu Sistema de Definição e Nutrição tem novas embalagens, nova fragrância e ainda mais tecnologia para cuidar do seu cabelo.',
'Com BioProteína Tripla Ação e Complexo de Linhaça e Óleo de Rícino, esse sistema promove cabelos crespos até 73% mais definidos e com 2 vezes mais brilho. O Creme de Pentear Ativador para Cabelos Crespos Lumina é um passo essencial nesse ritual, com fórmula que deixa os fios mais fáceis de pentear e com ação antiencolhimento.

Características:
• Tipo de cabelo: crespos
• Cruelty free
• Vegano
• Tipo de tratamento: definição e nutrição.

Dicas de uso:
Aplique o creme de pentear nos cabelos úmidos ou secos, evitando a raiz. Sem enxágue.

Ingredientes:
ÁGUA, ÁLCOOL CETOESTEARÍLICO, ISONONANOATO DE ISONONILA, TRIGLICERÍDEO CAPRÍLICO/CÁPRICO, PALMITATO DE ETILEXILA, EXTRATO DA SEMENTE DE LINUM USITATISSIMUM, ESTEARAMIDOPROPIL DIMETILAMINA, EXTRATO DA SEMENTE DE SALVIA HISPANICA, PERFUME, FENOXIETANOL, HIETELOSE, MANTEIGA DA SEMENTE DE ASTROCARYUM MURUMURU, ÁCIDO CÍTRICO, ÓLEO DE RÍCINO, ÁCIDO LÁCTICO, EDETATO DISSÓDICO, DILAURATO DE PEG-4, LAURATO DE PEG-4, ÁLCOOL BENZÍLICO, AMIL CINAMAL, ÁCIDO CAPRÍLICO, XILITOL, CUMARINA, BUTILCARBAMATO DE IODOPROPINILA , MACROGOL, SR-ARANHA POLIPEPTÍDEO-1, LIMONENO, TROLAMINA, ACETATO DE SÓDIO, CITRONELOL, CAPRILILGLICOL, 1,2-HEXANODIOL.',
54.90,null,0,30,'cremedepentear-crespo-lumina-1.png', 'cremedepentear-crespo-lumina-2.jpg', 'cremedepentear-crespo-lumina-3.jpg',15,111)



--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(112,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Creme de Pentear Selador de Cutículas para Nutrição e Reparação Profunda','Natura','250ml',
'Cabelo protegido, brilhante, com 2 vezes menos volume e 4 vezes menos frizz.
A linha para Cabelos Secos ou Ressecados de Lumina mudou! Agora o seu Sistema de Nutrição e Reparação Profunda tem novas embalagens e ainda mais tecnologia para cuidar do seu cabelo.',
'Com BioProteína Tripla Ação e Ativo Nutrirrevitalização, esse sistema promove 2 vezes mais nutrição com reparação e selagem dos fios. O Creme de Pentear Selador de Cutículas Cabelos Secos ou Ressecados Lumina é um passo essencial nesse ritual, com fórmula que blinda, hidrata e protege os fios.

Características:
• Tipo de cabelo: todos os tipos de cabelos
• Cruelty free
• Vegano
• Tipo de tratamento: nutrição e reparação profunda.

Dicas de uso:
• Passo 1: lave os cabelos com o Shampoo Nutritivo e o Condicionador Polinutrição para promover limpeza e nutrição imediata dos fios.
• Passo 2: utilize a Máscara Reparadora para potencializar o tratamento. em seguida, aplique a Ampola de Reparação para obter 2 vezes mais força e resistência.
• Passo 3: finalize com o Creme de Pentear Selador de Cutículas para alcançar 2 vezes menos volume e 4 vezes menos frizz.',
54.90,null,0,30,'cremedepentear-reparacao-lumina-1.png', 'cremedepentear-reparacao-lumina-2.jpg', 'cremedepentear-reparacao-lumina-3.jpg',15,112,)



--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(113,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Shampoo Ekos Murumuru','Natura','300ml',
'Limpeza suave que prepara seus cabelos para o tratamento antidanos.
Feito com manteiga bruta de murumuru, que combate o ressecamento e os danos capilares, o Shampoo Ekos Murumuru deixa seu cabelo nutrido e com aspecto saudável.',
'Sua fórmula mais potente e radicalmente natural limpa os fios sem agredir o couro cabeludo, preparando-o para o ritual de tratamento biocosmético capilar antidanos.

Características:
• Tipo de cabelo: todos os tipos de cabelos
• Cruelty free
• Vegano
• Tipo de tratamento: reconstrução.

Dicas de uso:
Aplique uma pequena quantidade do produto no cabelo molhado e massageie o couro cabeludo. Em seguida, enxágue bem. Para potencializar os resultados e a ação antidanos, combine seu uso com o Condicionador Ekos Murumuru e outros produtos da linha.

Ingredientes:
AQUA / ÁGUA, SODIUM COCOYL ISETHIONATE / COCOIL ISETIONATO DE SÓDIO, DECYL GLUCOSIDE / DECIL GLICOSÍDEO , COCAMIDOPROPYL BETAINE / COCOAMIDOPROPILBETAÍNA, GLYCERIN / GLICEROL, COCONUT ACID / ÁCIDO DE COCO, PARFUM / PERFUME, PEG-7 GLYCERYL COCOATE / COCOATO DE PEG-7 GLICERILA, ACRYLATES/C10-30 ALKYL ACRYLATE CROSSPOLYMER / CROSPOLÍMERO DE ACRILATOS/ACRILATO DE ALQUILA C10-30, HYDROXYACETOPHENONE / HIDROXIACETOFENONA, GLYCOL DISTEARATE / DIESTEARATO DE ETILENOGLICOL, SORBITOL, POTASSIUM SORBATE / SORBATO DE POTÁSSIO, SODIUM BENZOATE / BENZOATO DE SÓDIO, LAURETH-4 / LAUROMACROGOL 400, POLYQUATERNIUM-10 / POLIQUATÉRNIO-10, CITRIC ACID / ÁCIDO CÍTRICO, SODIUM HYDROXIDE / HIDRÓXIDO DE SÓDIO, SODIUM GLUCONATE / GLICONATO DE SÓDIO, BENZYL SALICYLATE / SALICILATO DE BENZILA, LINALOOL / LINALOL, LIMONENE / LIMONENO, COUMARIN / CUMARINA, ASTROCARYUM MURUMURU SEED BUTTER / MANTEIGA DA SEMENTE DE ASTROCARYUM MURUMURU, BENZOIC ACID / ÁCIDO BENZOICO, PEG-150 PENTAERYTHRITYL TETRASTEARATE / TETRAESTEARATO DE PEG-150 PENTAERITRITILA, PEG-6 CAPRYLIC/CAPRIC GLYCERIDES / GLICERÍDEOS CAPRÍLICO/CÁPRICO PEG-6, SODIUM CARBONATE / CARBONATO DE SÓDIO, CI 19140 / AMARELO DE TARTRAZINA , CI 15510 / CORANTE LARANJA 15510, SODIUM CHLORIDE / CLORETO DE SÓDIO, SODIUM SULFATE / SULFATO DE SÓDIO.',
56.90,44.90,1,30,'shampoo-murumu-ekos-1.png', 'shampoo-murumu-ekos-2.jpg', 'shampoo-murumu-ekos-3.jpg',15,113,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(114,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Condicionador Ekos Murumuru','Natura','300ml',
'Restaura, desembaraça e nutre os fios.
Feito com manteiga bruta de murumuru, o Condicionador Ekos Murumuru é potente para reconstruir a fibra capilar.',
'Esse condicionador com ação antidanos desembaraça os fios, deixando o cabelo mais macio, hidratado e nutrido.

Características:
• Tipo de cabelo: todos os tipos de cabelos
• Cruelty free
• Vegano
• Tipo de tratamento: reconstrução.

Dicas de uso:
Após lavar o cabelo com o Shampoo Ekos Murumuru, aplique o Condicionador Ekos Murumuru, massageie e deixe agir por 1 minuto. Em seguida, enxágue bem. Esse condicionador pode ser usado diariamente. Para potencializar os resultados e a ação antiqueda, combine seu uso com os demais produtos da linha Ekos Murumuru.

Ingredientes:
AQUA / ÁGUA, CETEARYL ALCOHOL / ÁLCOOL CETOESTEARÍLICO, ISOPROPYL PALMITATE / PALMITATO DE ISOPROPILA, DICAPRYLYL CARBONATE / CARBONATO DE DICAPRILILA, PROPANEDIOL / PROPANODIOL, ASTROCARYUM MURUMURU SEED BUTTER / MANTEIGA DA SEMENTE DE ASTROCARYUM MURUMURU, PARFUM / PERFUME, STEARAMIDOPROPYL DIMETHYLAMINE / ESTEARAMIDOPROPIL DIMETILAMINA, SORBITOL, BEHENTRIMONIUM CHLORIDE / CLORETO DE BEENTRIMÔNIO, CAPRYLOYL GLYCERIN/SEBACIC ACID COPOLYMER / COPOLÍMERO DE CAPRILOIL GLICERINA/ÁCIDO SEBÁCICO, HYDROXYACETOPHENONE / HIDROXIACETOFENONA, HYDROXYETHYLCELLULOSE / HIETELOSE, DIHEPTYL SUCCINATE / SUCCINATO DE DIEPTILA, CETRIMONIUM CHLORIDE / CLORETO DE CETRIMÔNIO, CITRIC ACID / ÁCIDO CÍTRICO, SODIUM GLUCONATE / GLICONATO DE SÓDIO, LACTIC ACID / ÁCIDO LÁCTICO, ISOPROPYL ALCOHOL / ÁLCOOL ISOPROPÍLICO, BENZYL SALICYLATE / SALICILATO DE BENZILA, LINALOOL / LINALOL, LIMONENE / LIMONENO, COUMARIN / CUMARINA, SODIUM ACETATE / ACETATO DE SÓDIO, TOCOPHEROL / TOCOFEROL, SODIUM HYDROXIDE / HIDRÓXIDO DE SÓDIO, CI 19140 / AMARELO DE TARTRAZINA , CI 15510 / CORANTE LARANJA 15510, SODIUM CHLORIDE / CLORETO DE SÓDIO, SODIUM SULFATE / SULFATO DE SÓDIO, SODIUM CARBONATE / CARBONATO DE SÓDIO.',
59.90,47.90,1,30,'condicionador-ekos-murumuru-1.png', 'condicionador-ekos-murumuru-2.jpg', 'condicionador-ekos-murumuru-3.jpg',15,114,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(115,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Ekos Frescor Maracujá','Natura','150ml',
'Fragrância encantadora e refrescante como um sossego no embalo de uma rede. Ddestaca o azedinho doce do maracujá em contraste com o conforto das notas de musk e madeiras.',
'Desodorante colônia com ingrediente natural da biodiversidade brasileira, extraído da polpa do maracujá.

Gota olfativa:
• Possui bioativo: maracujá
• Concentração: deo colônia
• Família olfativa: frutal
• Notas de topo: anis, maçã, bergamota, alecrim, mandarina e maracujá.
• Notas de corpo: muguet, rosa, jasmim e violeta.
• Notas de fundo: cedro, musk, musgo de carvalho e sândalo.
• Cruelty free
• Vegano
• Ocasião: dia a dia, pós banho
• Subfamília: floral

Dicas de uso:
Aplique a fragrância de Ekos Maracujá em áreas como punhos, pescoço e atrás das orelhas.

Ingredientes:
ALCOHOL, AQUA, PARFUM, POLYGLYCERYL-3 CAPRYLATE, PASSIFLORA EDULIS FRUIT, BENZOPHENONE-2, BHT, DENATONIUM BENZOATE, CI 19140, CI 14700, SODIUM CHLORIDE, SODIUM SULFATE, LIMONENE, HEXYL CINNAMAL, LINALOOL, BUTYLPHENYL METHYLPROPIONAL, COUMARIN, CITRONELLOL, ALPHA-ISOMETHYL IONONE, CITRAL, BENZYL BENZOATE, GERANIOL.',
124.90,null,0,30,'fragrancia-ekos-maracuja-1.png', 'fragrancia-ekos-maracuja-2.jpg', 'fragrancia-ekos-maracuja-3.jpg',8,115)



--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(116,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Creme Hidratante para as Mãos Ekos Castanha','Natura','75g',
'48 horas de hidratação para as mãos e unhas com a potência antirressecamento da castanha. Seu hidratante favorito mudou, mas continua com textura e fragrância deliciosas.',
'Creme de mãos feito com óleo bruto de castanha, rico em ômegas 6 e 9, que promove nutrição intensa e combate os sinais do ressecamento, hidratando imediatamente. Ajuda a potencializar o brilho das unhas, com textura cremosa de rápida absorção.

Características:
• Possui bioativo: castanha
• Testado dermatologicamente
• Cruelty free
• Vegano
• Tipo de pele: todos os tipos de pele

Dicas de uso:
Aplique o creme para mãos de Natura Ekos sempre que sentir necessidade. Espalhe nas mãos e unhas com movimentos deslizantes, dos dedos em direção ao pulso.',
57.90,null,0,30,'cremeparamao-ekos-castanha-1.png', 'cremeparamao-ekos-castanha-2.jpg', 'cremeparamao-ekos-castanha-3.jpg',23,116,)



--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(117,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Condicionador Ekos Patauá','Natura','100ml',
'Leve seu condicionador com potente ação antiqueda para onde quiser.
Feito com óleo bruto de patauá, o Condicionador Ekos Patauá desembaraça os fios e reforça a fibra capilar.',
'Sua fórmula potente e radicalmente natural deixa os fios 2 vezes* mais resistentes contra a quebra. Esta embalagem de 100 ml é perfeita para levar em viagens.

Características:
• Tipo de cabelo: todos os tipos de cabelos
• Cruelty free
• Vegano
• Tipo de tratamento: antiqueda.

Ingredientes:
AQUA/ ÁGUA, SORBITOL/ SORBITOL, CETEARYL ALCOHOL/ ÁLCOOL CETOESTEARÍLICO, PROPANEDIOL/ PROPANODIOL, BEHENTRIMONIUM CHLORIDE/ CLORETO DE BEENTRIMÔNIO, ASTROCARYUM MURUMURU SEED BUTTER/ MANTEIGA DA SEMENTE DE MURUMURU, ISOPROPYL PALMITATE/ PALMITATO DE ISOPROPILA, ISOAMYL LAURATE/ LAURATO DE ISOAMILA, CETYL ESTERS/ ÉSTERES CETÍLICOS, HYDROXYPROPYL GUAR/ GOMA GUAR, PARFUM/ PERFUME, HYDROXYACETOPHENONE/ HIDROXIACETOFENONA, OENOCARPUS BATAUA FRUIT OIL/ ÓLEO DO FRUTO DE PATAUÁ, PROPYLENE GLYCOL DIHEPTANOATE/ DIEPTANOATO DE PROPILENOGLICOL, ISOPROPYL ALCOHOL/ ÁLCOOL ISOPROPÍLICO, SODIUM GLUCONATE/ GLICONATO DE SÓDIO, BENZYL SALICYLATE/ SALICILATO DE BENZILA, TOCOPHEROL/ TOCOFEROL, HEXYL CINNAMAL/ HEXIL CINAMAL, LINALOOL/ LINALOL, GERANIOL/ GERANIOL, CITRIC ACID/ ÁCIDO CÍTRICO, CI 19140/ AMARELO DE TARTRAZINA , SODIUM HYDROXIDE/ HIDRÓXIDO DE SÓDIO, CI 14700/ VERMELHO ESCARLATE 125, CI 42090/ AZUL BRILHANTE, SODIUM CHLORIDE/ CLORETO DE SÓDIO, SODIUM SULFATE/ SULFATO DE SÓDIO, SODIUM CARBONATE/ CARBONATO DE SÓDIO.',
40.30,20.10,1,30,'condicionador-ekos-pataua-1.png', 'condicionador-ekos-pataua-2.jpg', 'condicionador-ekos-pataua-3.jpg',15,117,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(118,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Shampoo Ekos Patauá','Natura','100ml',
'Leve seu shampoo com potente ação antiqueda para onde quiser.
Feito com óleo bruto de patauá, o Shampoo Ekos Patauá reforça os fios desde a raiz e combate o enfraquecimento capilar. ',
'Sua fórmula potente e radicalmente natural promove uma limpeza suave, sem agredir os fios, enquanto prepara o cabelo para o ritual de tratamento biocosmético antiqueda. Esta embalagem de 100 ml é perfeita para levar em viagens.

Características:
• Tipo de cabelo: todos os tipos de cabelos
• Cruelty free
• Vegano
• Tipo de tratamento: antiqueda.

Ingredientes:
AQUA/ ÁGUA, COCAMIDOPROPYL BETAINE/ COCOAMIDOPROPILBETAÍNA, SODIUM COCOYL ISETHIONATE/ COCOIL ISETIONATO DE SÓDIO, DISODIUM COCOYL GLUTAMATE/ COCOIL GLUTAMATO DISSÓDICO, GLYCERIN/ GLICEROL, DECYL GLUCOSIDE/ DECIL GLICOSÍDEO , PARFUM/ PERFUME, CITRIC ACID/ ÁCIDO CÍTRICO, COCONUT ACID/ ÁCIDO DE COCO, PEG-150 PENTAERYTHRITYL TETRASTEARATE/ TETRAESTEARATO DE POLIETILENOGLICOL-150 PENTAERITRITILA, HYDROXYACETOPHENONE/ HIDROXIACETOFENONA, DISODIUM EDTA/ EDETATO DISSÓDICO, POTASSIUM SORBATE/ SORBATO DE POTÁSSIO, SODIUM BENZOATE/ BENZOATO DE SÓDIO, PEG-7 GLYCERYL COCOATE/ COCOATO DE POLIETILENOGLICOL-7 GLICERILA, PEG-6 CAPRYLIC/CAPRIC GLYCERIDES/ GLICERÍDEOS CAPRÍLICO/CÁPRICO POLIETILENOGLICOL-6, POLYQUATERNIUM-6/ POLIQUATÉRNIO-6, BENZYL SALICYLATE/ SALICILATO DE BENZILA, HEXYL CINNAMAL/ HEXIL CINAMAL, LINALOOL/ LINALOL, SODIUM HYDROXIDE/ HIDRÓXIDO DE SÓDIO, GERANIOL/ GERANIOL, OENOCARPUS BATAUA FRUIT OIL/ ÓLEO DO FRUTO DE PATAUÁ, CI 61570/ CORANTE VERDE 61570, CI 15510/ CORANTE LARANJA 15510, SODIUM CHLORIDE/ CLORETO DE SÓDIO, SODIUM SULFATE/ SULFATO DE SÓDIO, SODIUM CARBONATE/ CARBONATO DE SÓDIO.',
38.30,19.10,1,30,'shampoo-ekos-pataua-1.png', 'shampoo-ekos-pataua-2.jpg', 'shampoo-ekos-pataua-3.jpg',15,118,)



--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(119,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Tônico Noturno de Crescimento Ekos Patauá','Natura','30ml',
'Acelera o crescimento e deixa os fios fixos no couro por mais tempo.
O Tônico Noturno de Crescimento Ekos Patauá evita a queda transitória do cabelo, acelera o crescimento dos fios em até 3 vezes e aumenta a densidade capilar.',
'Sua fórmula potente e radicalmente natural deixa o cabelo mais forte, ancorado ao couro cabeludo e com maior espessura da fibra capilar desde a raiz.

Características:
• Tipo de cabelo: todos os tipos de cabelos
• Cruelty free
• Vegano
• Tipo de tratamento: antiqueda.

Dicas de uso:
Utilize o Tônico Capilar Ekos Patauá antes de dormir. Agite o produto e aplique em toda a extensão do couro cabeludo, massageando com as pontas dos dedos. Não lave a cabeça logo após a aplicação do produto. Pela manhã, se sentir necessidade, lave o cabelo com os produtos da linha Ekos Patauá. Para melhores resultados, utilize o tônico diariamente. 
Importante: lave bem as mãos após a aplicação do produto.

Ingredientes:
AQUA/ ÁGUA, ALCOHOL/ ÁLCOOL ETÍLICO, GLYCERIN/ GLICEROL, PEG-40 HYDROGENATED CASTOR OIL/ ÓLEO DE RÍCINO HIDROGENADO ETOXILADO, PROPANEDIOL/ PROPANODIOL, OENOCARPUS BATAUA FRUIT OIL/ ÓLEO DO FRUTO DE PATAUÁ, PARFUM/ PERFUME, CITRIC ACID/ ÁCIDO CÍTRICO, HYDROXYACETOPHENONE/ HIDROXIACETOFENONA, SODIUM GLUCONATE/ GLICONATO DE SÓDIO, TOCOPHEROL/ TOCOFEROL, BENZYL SALICYLATE/ SALICILATO DE BENZILA, HEXYL CINNAMAL/ HEXIL CINAMAL, LINALOOL/ LINALOL, GERANIOL/ GERANIOL, LIMONENE/ LIMONENO, ALPHA-ISOMETHYL IONONE/ ALFA-ISOMETIL IONONA, SODIUM HYDROXIDE/ HIDRÓXIDO DE SÓDIO, SODIUM CARBONATE/ CARBONATO DE SÓDIO, SODIUM CHLORIDE/ CLORETO DE SÓDIO.',
73.90,null,0,30,'tonico-ekos-pataua-1.png', 'tonico-ekos-pataua-2.jpg', 'tonico-ekos-pataua-3.jpg',16,119,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(120,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES
('Óleo Trifásico Desodorante Corporal Ekos Maracujá','Natura','200ml',
'100% mais hidratação para a pele com a potência antiestresse do maracujá. Acalma e reequilibra a pele, com textura surpreendente e que deixa a pele perfumada, protegida e iluminada.',
'Feito com óleo de maracujá, rico em ácidos graxos essenciais.

Características:
• Possui bioativo: maracujá
• Testado dermatologicamente
• Cruelty free
• Vegano
• Tipo de pele: todos os tipos de pele.

Dicas de uso:
Agite o óleo corporal de Natura Ekos antes de usar. Aplique sobre o corpo, massageando a pele. Este óleo perfumado pode ser usado com e sem enxágue.',
96.90,null,0,30,'oleo-maracuja-ekos-1.png', 'oleo-maracuja-ekos-2.jpg', 'oleo-maracuja-ekos-3.jpg',24,220.) 



--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(121,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Esfoliante para o Corpo Tododia Acerola e Hibisco','Natura','190g',
'Esfolia, limpa e remove impurezas sem agredir a pele. Com fórmula com textura em gel, possui sementes de damasco, que esfoliam e removem profundamente as impurezas.',
'Deixa a pele macia, mais lisa e saudável, e preparada para receber a nutrição de Tododia, previnindo a formação de pelos encravados.

Características:
• Família olfativa: cítrico
• Subfamília: frutal
• Testado dermatologicamente
• Cruelty free
• Vegano
• Tipo de pele: todos os tipos de pele.

Dicas de uso:
Aplique por todo o corpo com movimentos circulares, exceto no rosto. Enxágue em seguida e pronto, sinta sua pele mais macia. Utilize até 3 vezes por semana.

Ingredientes:
ÁGUA, GLICEROL, PALMITATO DE ISOPROPILA, PROPANODIOL, SORBITOL, BEENATO DE ESTEARILA, COCOATO DE ISOAMILA, PERFUME, FENOXIETANOL, ÉSTERES DA JOJOBA, CARBÔMER, HIDROXIACETOFENONA, GOMA XANTANA , SEMENTE DE PRUNUS ARMENIACA EM PÓ, ACETATO DE TOCOFERILA, HIDRÓXIDO DE SÓDIO, EDETATO DISSÓDICO, LIMONENO, HEXIL CINAMAL, LINALOL, CITRAL, VERMELHO 33, CARBONATO DE SÓDIO, AMARELO DE TARTRAZINA , CLORETO DE SÓDIO, SULFATO DE SÓDIO.',
49.90,null,0,30,'esfoliante-corporal-tododia-acerola-1.png', 'esfoliante-corporal-tododia-acerola-2.jpg', 'esfoliante-corporal-tododia-acerola-3.jpg',26,121,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(122,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Sabonete Líquido Esfoliante para o Corpo Ekos Tukumã','Natura','185ml',
'Pele renovada e mais uniforme com a potência antissinais do tukumã. Sabonete líquido que limpa suavemente e esfolia a pele, removendo as células mortas durante o banho.',
'Sabonete e esfoliante vegano que mantém o pH natural da pele, deixando sua pele renovada e mais uniforme. Feito com óleo bruto de tukumã, um potente antissinais.

Características:
• Possui bioativo: tukumã
• Testado dermatologicamente
• Cruelty free
• Vegano
• Tipo de pele: todos os tipos de pele.

Dicas de uso:
Espalhe o sabonete líquido esfoliante de Natura Ekos sobre o corpo até formar espuma. Enxágue em seguida. Não utilizar o sabonete corporal no rosto.',
54.90,null,0,30,'sabonete-esfoliante-tukuma-ekos-1.png', 'sabonete-esfoliante-tukuma-ekos-2.jpg', 'sabonete-esfoliante-tukuma-ekos-3.jpg',26,122,)



--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrad26,122,)
VALUES  
(123,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Creme Desodorante Hidratante para o Corpo Ekos Maracujá','Natura','400ml',
'Até 95% de ação calmante para a pele com a potência antiestresse do maracujá. Pele protegida e hidratada por até 72 horas. Hidratante corporal que reequilibra a pele, com textura leve e rápida absorção.',
'Creme com ação desodorante, feito com óleo de maracujá, rico em ácidos graxos essenciais.

Resultados visíveis na pele:
• Imediatamente: protege, hidrata e acalma a pele.
• Após 7 dias de uso: suaviza a pele, melhorando sua textura.
• Após 14 dias de uso: a ação do óleo bruto de maracujá, rico em ácido graxos essenciais, combate osindicadores de estresse cutâneo, como o desconforto causado pelo ressecamento.
• Aapós 30 dias de uso: pele reequilibrada com aumento do nível de hidratação natural e redução dos sinais de estresse cutâneo.

Características:
• Possui bioativo: maracujá
• Testado dermatologicamente
• Cruelty free
• Vegano
• Tipo de pele: todos os tipos de pele.

Dicas de uso:
Aplique o creme corporal de Natura Ekos sobre a pele do corpo. Espalhe massageando a pele até a absorção completa do produto. Não utilizar o hidratante corporal no rosto.

Ingredientes:
ÁGUA, PALMITATO DE ISOPROPILA, GLICEROL, PERFUME, PROPANODIOL, AMIDO DE TAPIOCA, ÓLEO DE SEMENTE DE MARACUJÁ, ÁLCOOL CETEARÍLICO, ÓLEO DE PALMISTE, ÓLEO DA FRUTA DE TUCUMÃ[ASTROCARYUM VULGARE], MONOESTEARATO DE GLICERILA, HIDROXIACETOFENONA, ESTEARATO PEG-100, POLIACRILATO DE SÓDIO, LIMONENO, DIPALMITATO DE GLICERILA, PALMITATO DE GLICERILA, ADIPATO DE DIBUTILA,DIESTEARATO DE GLICERILA, GOMA XANTANA, HEXIL CINAMAL, LINALOL, CAPRILATO DE POLIGLICERILA-3, GLICONATO DE SÓDIO, PENTAERITRITIL TETRA-DI-T-BUTIL HIDROXI-HIDROCINAMATO, CUMARINA, CITRONELOL, ALFA-ISOMETIL IONONA,BENZOATO DE BENZILA, TOCOFEROL, HIDROXICITRONELAL, CITRAL.',
88.90,null,0,30,'cremecorporal-maracuja-ekos-1.png', 'cremecorporal-maracuja-ekos-2.jpg', 'cremecorporal-maracuja-ekos-3.jpg',23,123,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(124,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Gelatina Cachos e Crespos Tododia Amora e Óleo de Coco','Natura','240g',
'Definição prolongada, fixação e brilho.
A Gelatina Tododia Amora e Óleo de Coco cuida do seu cabelo com Tecnologia Prebiótica. Para cachos e crespos definidos por mais tempo. ',
'Sua fórmula multiúso funciona como creme de pentear, finalizador e na fixação de baby hair. Fragrância com notas florais e de amora.

Características:
• Tipo de cabelo: cacheados e crespos
• Cruelty free
• Vegano

Dicas de uso:
Aplique uma pequena quantidade nas mãos e espalhe pelo cabelo. Reaplique caso sinta necessidade.',
37.90,null,0,30,'geleia-cachos-tododia-1.png', 'geleia-cachos-tododia-2.jpg', 'geleia-cachos-tododia-3.jpg',17,124,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(125,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Máscara Regeneradora para Reconstrução de Danos Extremos','Natura','250ml',
'Regenera até as camadas mais profundas e promove 2 vezes mais reparação.
 A Máscara Regeneradora para Cabelos Quimicamente Danificados Lumina é um passo essencial nesse ritual, com fórmula que regenera a estrutura capilar e prolonga o efeito da progressiva e da coloração.',
'Com BioProteína Tripla Ação e Ativo Reconstrutor, esse sistema promove reconstrução de até 89% dos danos extremos e prevenção de até 2,9 vezes dos danos futuros.

Características:
• Tipo de cabelo: todos os tipos de cabelos
• Cruelty free
• Vegano
• Tipo de tratamento: reconstrução de danos extremos

Dicas de uso:
• Passo 1: lave os cabelos com o Shampoo Reestruturante e o Condicionador Provitalidade para promover limpeza e reparação, trazendo mais força e resistência aos fios.
• Passo 2: utilize o Primer para obter máxima potência do tratamento que reconstrói a camada interna dos fios. em seguida, aplique a Máscara Reconstrutora, que potencializa o tratamento deixando os fios resistentes à quebra.
• Passo 3: aplique o Sérum Regenerador Progressivo para obter 3 vezes mais regeneração da camada interna dos cabelos.

Ingredientes:
ÁGUA, ÁLCOOL CETOESTEARÍLICO, DIMETICONA, MANTEIGA DA SEMENTE DE ASTROCARYUM MURUMURU, METOSSULFATO DE BEENTRIMÔNIO, QUATÉRNIO-87, SORBITOL, PERFUME, FENOXIETANOL, BIS-CETEARIL AMODIMETICONA, HIETELOSE, ÓLEO DA SEMENTE DE BERTHOLLETIA EXCELSA, CETOMACROGOL 1000, CETOMACROGOL 1000, EDETATO DISSÓDICO, DILAURATO DE PEG-4, LAURATO DE PEG-4, PROTEÍNA DE TRIGO HIDROLISADA , LINALOL, PROTEÍNA DA SEMENTE DE AVENA SATIVA, PROTEÍNA DE PRUNUS AMYGDALUS DULCIS, LIMONENO, SALICILATO DE BENZILA, HEXIL CINAMAL, CITRONELOL, CAPRILILGLICOL, ÁCIDO CÍTRICO, BUTILCARBAMATO DE IODOPROPINILA, MACROGOL, SR-ARANHA POLIPEPTÍDEO-1, TROLAMINA, ACETATO DE SÓDIO, ÁCIDO GLICÓLICO, ESTEARATO DE SÓDIO, 1,2-HEXANODIOL, SORBATO DE POTÁSSIO, CLORETO DE SÓDIO, AMARELO DE TARTRAZINA, VERMELHO ESCARLATE 125, AZUL BRILHANTE, SULFATO DE SÓDIO.',
73.90,null,0,30,'mascara-reconstrucao-lumina-1.png', 'mascara-reconstrucao-lumina-2.jpg', 'mascara-reconstrucao-lumina-3.jpg',16,125,)


--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(120,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 



--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(120,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 



--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(120,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 



--#region --#endregion 
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(120,'','','');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 



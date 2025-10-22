
INSERT INTO usuario (id_usuario,nome,email,telefone,cpf,data_nascimento,senha,tipo,foto,id_endereco)
VALUES 
(2,'Ozzy Osbourne','ozzyosbourne@gmail.com','(67) 66666-6666','666.666.666-66','1948-12-03','morcego','Associado',null,null);                   --corporal
(3,'Eliana Giardini','elianagiardini@gmail.com','(21) 99384-7383','111.111.111-11','1990-06-30','associado','Associado',null,null);             --perfume
(4,'Michael Rusbad','rusbejackson@gmail.com','(11) 99823-6372','222.222.222-22','2002-09-24','associado','Associado',null,null);                --maquiagem
(5,'Viviane Gonçalves','vivgonca@gmail.com','(67) 99182-8272','333.333.333-33','1999-07-19','associado','Associado',null,null);                 --cabelo
(6,'Maiara Lima','maytheforcebwu@gmail.com','(49) 99272-3729','444.444.444-44','2003-11-01','associado','Associado',null,null);                 --aleatorio

		-- Ambos eu cadastrei pelo site mesmo, então a senha está criptografada



----Obsevação: <<TODOS>> os produtos estão inseridos entre associados do id 2, 3, 4, 5 e 6.
--------------- POR FAVOR, ATENTEM-SE AOS IDs!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

-- INSERTS JÁ REALIZADOS:

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
23.90,22.70,1,50,'milk-1.png','milk-2.jpg','milk-3.jpg',23,1,2);

-------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO Cores(id_cores, corPrincipal, hexDegrade1, hexDegrade2)
VALUES (2,'#00728C', '#25abc9','#50cce7');

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
69.90,null,0,30,'biscoito.png','biscoito-2.png','biscoito-3.png',8,2,3);



----------------------------------------------------------------------------------------------------------------------------------------------
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
40.99,19.99,1,40,'vult-base.png','vult-base-2.jpg','vult-base-3.jpg',1,3,4);


------------------------------------------------------------------------------------------------------------------------------------------------------------------
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
209.90,179.90,1,50,'coffee.png','coffee-2.jpg','coffee-3.jpg',6,4,3);





----------------------------------------AGORA SERÃO PRODUTOS NOVOS QUE EU PEGUEI-------------------------------------------------------------------------------------------------------


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


-------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(6,'#000000','#dcb4bf','#f5d7e0');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Body Splash Cuide-se Bem Deleite','O Boticário','200ml',
'O Body Splash Cuide-Se Bem Deleite possui 200ml.',
'O Body Splash Cuide-Se Bem Deleite traz uma fragrância leve e suave que prolonga o cheirinho da sua loção corporal preferida e a sensação de frescor pós banho. Ideal para o dia a dia, este body splash vai envolver sua pele com uma fragrância suave e delicada, deixando uma sensação refrescante e hidratada o dia todo.

Como Usar:
Aplique sobre o corpo como desejar, reaplicando se necessário.

Orientações ao consumidor:
Inflamável. Evite contato com os olhos. Não aplique em pele irritada ou lesionada e evite aplicar nas axilas. Descontinue o uso em caso de sensibilização. Conserve o produto bem fechado, longe da luz e do calor excessivo. Somente para uso externo. Mantenha fora do alcance de crianças. Produto para perfumar e desodorizar a pele.

Devido à presença de alguns ingredientes, a cor do produto pode variar, porém sem comprometer sua qualidade ou segurança.',
89.90,null,0,40,'bodysplash-deleite.png','bodysplash-deleite-2.jpg','bodysplash-deleite-3.jpg',8,6,3);



---------------------------------------------------------------------------------------------------------------------------------------------------------------------
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
139.90,null,0,15,'lily.png','lily-2.jpg','lily-3.jpg',23,7,2);



------------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(8,'#60aaca','#a4cee0','#f4e3c5');


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


------------------------------------------------------------------------------------------------------------------------------------------------------------------------
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



------------------------------------------------------------------------------------------------------------------------------------------------------------------------
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



---------------------------------------------------------------------------------------------------------------------------------------------------------------------
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



-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
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


-------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(13,'#f54e00','#eb8252','#eddebd');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Base e Corretivo Matte Velvet Skin Baunilha I','Mari Maria Makeup','25g',
'Este produto inovador combina a função de base e corretivo.',
'Descubra a perfeição com a Base e Corretivo Velvet Skin. Este produto inovador combina a função de base e corretivo, oferecendo um acabamento aveludado que proporciona uma cobertura de média a alta, ideal para esconder imperfeições e realçar a beleza natural da sua pele. 

Composição: 
DECAMETILCICLOPENTASILOXANO, MIRISTATO DE ISOPROPILA, ISODODECANO, TRIMETILSILOXISSILICATO, OCTENIL SUCCINATO DE AMIDO ALUMÍNIO, ÓLEO MINERAL, TRIIDROXIESTEARINA, CERA BRANCA DE ABELHA, OZOQUERITA, SÍLICA, HECTORITA DISTEARDIMÔNIO, FENOXIETANOL, ACETATO DE TOCOFERILA, CARBONATO DE PROPILENO, CROSPOLÍMERO DE DIMETICONA, COPOLÍMERO DE ETILENO/PROPILENO/ESTIRENO, COPOLÍMERO DE BUTILENO/ETILENO/ESTIRENO, ETILHEXILGLICERINA, BUTIL- HIDROXITOLUENO PODE CONTER : CORANTE BRANCO 77891, CORANTE AMARELO 77492, CORANTE VERMELHO 77491, CORANTE PRETO 77499.',
69.90,null,0,20,'base-mari-maria.png','base-mari-maria-2.jpg','base-mari-maria-3.png',1,13,5);



---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
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



---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(15,'#64c2c2','#8eddd6','#c2f0ec');

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




------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(16,'#970005','#fe001a','#f74a4a');

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



-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(17,'#4e316b','#b262dd','#e1b4fa');

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



------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
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



-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
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
13.49,null,0,14,'oleo-avela-paixao.png','oleo-avela-paixao-2.jpg','oleo-avela-paixao-3.jpg',24,19,2);



------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
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



----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
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



-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(22,'#7c0023','#b5254b','#e95078ff');

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



------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(23,'#eb5763','#e76c7e','#f2c0d6');

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



---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(24,'#801d31','#c45269','#ec8b9fff');

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
69.90,null,0,20,'gloss-cherry-vizzela.png','gloss-cherry-vizzela-2.jpg','gloss-cherry-vizzela-3.jpg',3,64,4);



---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(25,'#33c4fdff','#9cd2ffff','rgba(191, 225, 253, 1)');

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





---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(26,'#ffaaeaff','#fcc0edff','#fad3f0ff');

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



---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(27,'#d8d759','#fafa85ff','#fafab1ff');

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



---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
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



---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
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



---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(30,'#678ec2','#7faae2ff','#a8ccfcff');

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



---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(31,'#2de8f9','#5eedfaff','#99f5fdff');

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



---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(32,'#cb9e74','#e5b68aff','#f7cea7ff');

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



---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(33,'#794599','#b672e0ff','#daaaf8ff');

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






-------------------------PRODUTOS DO MARCOS
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(34,'#5B398F','#15AF93','#4DBDA4');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Loção Desodorante Hidratante Cuide-se Bem Bob Esponja & Sandy Bochechas','O Boticário','200ml',
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




-----------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES 
(35,'#C0C0C0','#D6D6D6','#EAEAEA');


INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Elástico de Concha do Mar',null,null,
'Elástico de cabelo com pingente em formato de concha metálica, elegante e perfeito para dar um toque sofisticado ao penteado.',
'Adicione um charme especial ao seu visual com este elástico de cabelo adornado com uma concha metálica prateada. Além de ser funcional e garantir firmeza ao prender os fios, ele é um acessório estiloso que remete ao universo marítimo, ideal para compor penteados delicados ou destacar um look casual com um toque de elegância. 
Confortável para uso diário, é perfeito para quem ama detalhes únicos e sofisticados.',
12.00,null,0,100,'elastico-de-concha-do-mar.png','elastico-de-concha-do-mar-2.png','elastico-de-concha-do-mar.png',18,35,5);



-----------------------------------------------------------------------------------------------
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



-----------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(37,'#0081B8','#33b0e6','#7cd6fd');

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



-----------------------------------------------------------------------------------------------
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



-----------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES
(39,'#070707','#404040','#757575');

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



-----------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(40,'#3E0D11','#73181F','#A6232D');

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



-----------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(41,'#C9758F','#F58EAE','#F5A5C4');

INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
('Pincéis de Maquiagem Profissionais Com Cabo Transparente',null,'16 pincéis',
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



-----------------------------------------------------------------------------------------------
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



-----------------------------------------------------------------------------------------------
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



-----------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(44,'#F68B00','#FFA018','#FFA837');

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



-----------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(45,'#007F8E','#00C9E0','#62D1E0');

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


-----------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  
(46,'#981D2D','#C44152','#C45F6B');

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


-----------------------------------------------------------------------------------------------
INSERT INTO cores (id_cores,corPrincipal,hexDegrade1,hexDegrade2)
VALUES  


INSERT INTO produto (nome,marca,tamanho,descricaoBreve,descricaoTotal,preco,precoPromo,fgPromocao,qtdEstoque,img1,img2,img3,id_subCategoria,id_cores,id_associado)
VALUES 
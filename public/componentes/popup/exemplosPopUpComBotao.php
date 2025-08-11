<?php


require_once __DIR__ . "../../botao/botao.php";
require_once __DIR__ . "../../popup/popUp.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste PI</title>
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/botoesComponente.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popup/popUpComponente.css">

    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    
<?php
    //------------------------------------------------------------------------------------------------------------
    // 1 - Importar os componentes: 
    // require_once __DIR__."/./components/botao.php" 
    // require_once __DIR__."/./components/popUp.php";
     
    // 2 - Linkar os css: 
    // <link rel="stylesheet" href="/TestesPI/botoesComponente.css"> 
    // <link rel="stylesheet"href="/TestesPI/popUpComponente.css">
     
    // 3 - Verificar se as imagens existem
     
    // 4 - Puxar o JavaScript:
    // <script src="popUp.js"></script>
     
    // 5 - Se for utilizar componente de botão para abrir um componente de popUp:

    //------------------------------------------------------------------------------------------------------------
    //Primeiro "instanciar" botão que vai dentro do popUp:
    //Parametros: Texto (Qualquer coisa); tipo do botão (btn-black, btn-white, btn-green, btn-red); tela que irá redirecionar; largura do botão (opcional); altura (opcional); tamanho da fonte (opcional) 

    //Segundo: Definir o popUp:
    //Parametros: $id (serve para chamar na função JavaScript); caminho da imagem dentro do popUp; tamanho da imagem; titulo (opcional --> ""); subtitulo (opcional --> ""); botão 01 (opcional -> null); botão 02 (opcional -> ""); largura (opcional); cor de fundo (opcional); cor da fonte (opcional); tamanho titulo (opcional), tamanho subtitulo (opcional)

    //Terceiro: Definir o botão que vai na tela antes do popUp
    //Parametros: Texto (Qualquer coisa); tipo do botão (btn-black, btn-white, btn-green, btn-red); função chamada no JS (para popUp's é: abrirPopUp(\"nomeDoIdPopUp\") BARRA E ASPAS DUPLAS É OBRIGATORIO; largura (opcional); altura (opcional); tamanho da fonte (opcional)
    //------------------------------------------------------------------------------------------------------------
        

    // Confirmação padrão ---------------------------------------------------------------------
    $btnSim = botaoPersonalizadoRedirect("Sim", "btn-black", "app/views/auth/login.php?resposta?sim", "100px");
    $btnNao = botaoPersonalizadoRedirect("Não", "btn-white", "app/views/auth/login.php?resposta?nao", "100px");

    echo PopUpConfirmar("confirmacao", "Confirmar?", $btnSim, $btnNao, "300px", "white", "", "1.7rem");

    echo botaoPersonalizadoOnClick("Confirmar", "btn-green", "abrirPopUp(\"confirmacao\")");
    // Confirmação padrão ---------------------------------------------------------------------
    

    // Add Lista de Desejos ---------------------------------------------
    echo PopUpComImagemETitulo("addListaDesejos", "img-favorito.png", "100px", "Adicionado à lista de desejos!");
    
    echo botaoPersonalizadoOnClick("Add à lista de desejos", "btn-black", "abrirPopUp(\"addListaDesejos\")");
    // Add Lista de Desejos ---------------------------------------------
    
    
    // Validação de cadastro ---------------------------------------------------------------------
    $btnVoltarTelaInicial = botaoPersonalizadoRedirect("Voltar a Tela de Inicio", "btn-white", "app/views/auth/login.php?cadastro=enviado", "200px", "30px", "0.9rem");
    
    echo PopUpComImagemETitulo("cadEnviado", "img-pessoa.png", "80px", "Cadastro Enviado para Validação", "Entraremos em contato via WhatsApp após validar", $btnVoltarTelaInicial, "", "", "white", "", "", "0.8rem", );
    
    echo botaoPersonalizadoOnClick("Enviar para validação", "btn-black", "abrirPopUp(\"cadEnviado\")", "200px", "", "1.1rem");
    // Validação de cadastro ---------------------------------------------------------------------
    
    
    // Confirmação atendimento pelo whatsapp -------------------------------
    $btnCancelar = botaoPersonalizadoRedirect("Cancelar", "btn-red", "app/views/auth/login.php?whatsapp=cancelar", "120px", "40px", "1rem");
    
    $btnConfirmar = botaoPersonalizadoRedirect("Continuar", "btn-green", "app/views/auth/login.php?whatsapp=confirmar", "120px", "40px", "1rem");
    
    echo PopUpComImagemETitulo("popUpComTituloESub", "img-confirmar.png", "100px", "Vamos continuar o atendimento pelo WhatsApp
    ", "(Sobre as informações de pagamento e entrega)", $btnCancelar, $btnConfirmar);
    
    echo botaoPersonalizadoOnClick("Continuar pelo whats", "btn-black", "abrirPopUp(\"popUpComTituloESub\")", "200px", "", "1.1rem");
    // Confirmação atendimento pelo whatsapp -------------------------------


    // Relatorio de receitas ---------------------------------------------------------------------
    $btnDentroPopUp = botaoPersonalizadoRedirect("Fazer Download em PDF", "btn-black", "app/views/auth/login.php?relatorio=abrir", "200px", "50px");
    
    echo PopUpConfirmar("popUpRelatorio", "Relatório de Receitas", $btnDentroPopUp, "", "500px", "gray", "white", "30px");
    
    echo botaoPersonalizadoOnClick("Relatório de Receitas", "btn-black", "abrirPopUp(\"popUpRelatorio\")", "450px", "120px", "26px");
    // Relatorio de receitas ---------------------------------------------------------------------
    ?>

<script src="/projeto-integrador-et.com/public/componentes/popup/popUp.js"></script>

</body>
</html>
<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/cardLancamento/produtoLancamento.php"; // import do card

    session_start();
    // $tipo_usuario = $_SESSION['tipo_usuario'] ?? 'Cliente';
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? "Associado";
    $login = false; // Estado de login do usuário (false = deslogado / true = logado)


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TermosDeUsoPrivacidade</title>
    <link rel="stylesheet" href="../../../public/css/TermoDeUso.css">
    <link rel="stylesheet" href="../../../public/componentes/header/style.css">
    <link rel="stylesheet" href="../../../public/componentes/sidebar/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   
</head>
<body>

    <?php
    echo createHeader($login,$tipo_usuario); // função que cria o header
    ?>
    
    

    <!--Ondas-->
    <div class="preto">
    </div>

    <section>
        <div class="wave wave1">
            <div class="wave wave2"></div>
        </div>
    </section>

    
    <main class="termos-box">
        <h2>Termos de Uso e Privacidade</h2>
            <div class="conteudo-termos">
                <p><strong>1. Termos:</strong><br>
                Ao acessar ao site ET.com, concorda em cumprir estes termos de serviço, todas as leis e regulamentos aplicáveis ​​e concorda que é responsável pelo cumprimento de todas as leis locais aplicáveis. Se você não concordar com algum desses termos, está proibido de usar ou acessar este site. Os materiais contidos neste site são protegidos pelas leis de direitos autorais e marcas comerciais aplicáveis.</p>

                <p><strong>2. Uso de Licença:</strong><br>
                É concedida permissão para baixar temporariamente uma cópia dos materiais (informações ou software) no site ET.com , apenas para visualização transitória pessoal e não comercial. Esta é a concessão de uma licença, não uma transferência de título e, sob esta licença, você não pode: modificar ou copiar os materiais; usar os materiais para qualquer finalidade comercial ou para exibição pública (comercial ou não comercial); tentar descompilar ou fazer engenharia reversa de qualquer software contido no site ET.com; remover quaisquer direitos autorais ou outras notações de propriedade dos materiais; ou transferir os materiais para outra pessoa ou 'espelhe' os materiais em qualquer outro servidor. Esta licença será automaticamente rescindida se você violar alguma dessas restrições e poderá ser rescindida por ET.com a qualquer momento. Ao encerrar a visualização desses materiais ou após o término desta licença, você deve apagar todos os materiais baixados em sua posse, seja em formato eletrônico ou impresso.</p>

                <p><strong>3. Isenção de responsabilidade:</strong><br>
                Os materiais no site da ET.com são fornecidos 'como estão'. A ET.com não oferece garantias, expressas ou implícitas, e, por este meio, isenta e nega todas as outras garantias, incluindo, sem limitação, garantias implícitas ou condições de comercialização, adequação a um fim específico ou não violação de propriedade intelectual ou outra violação de direitos. Além disso, a ET.com não garante ou faz qualquer representação relativa à precisão, aos resultados prováveis ​​ou à confiabilidade do uso dos materiais em seu site ou de outra forma relacionado a esses materiais ou em sites vinculados a este site.</p>

                <p><strong>4. Limitações:</strong><br>
                Em nenhum caso a ET.com ou seus fornecedores serão responsáveis ​​por quaisquer danos (incluindo, sem limitação, danos por perda de dados ou lucro ou devido a interrupção dos negócios) decorrentes do uso ou da incapacidade de usar os materiais em ET.com, mesmo que ET.com ou um representante autorizado tenha sido notificado oralmente ou por escrito da possibilidade de tais danos. Como algumas jurisdições não permitem limitações em garantias implícitas, ou limitações de responsabilidade por danos conseqüentes ou incidentais, essas limitações podem não se aplicar a você.</p>

                <p><strong>5. Precisão dos materiais:</strong><br>
                Os materiais exibidos no site da ET.com podem incluir erros técnicos, tipográficos ou fotográficos. Nós não garantimos que qualquer material em nosso site seja preciso, completo ou atual. A ET.com pode fazer alterações nos materiais contidos em seu site a qualquer momento, sem aviso prévio. No entanto, não se compromete a atualizar os materiais.</p>

                <p><strong>6. Links:</strong><br>
                A ET.com não analisou todos os sites vinculados ao seu site e não é responsável pelo conteúdo de nenhum site vinculado. A inclusão de qualquer link não implica endosso por ET.com do site. O uso de qualquer site vinculado é por conta e risco do usuário.</p>

                <p><strong>Modificações:</strong><br>
                O ET.com pode revisar estes termos de serviço do site a qualquer momento, sem aviso prévio. Ao usar este site, você concorda em ficar vinculado à versão atual desses termos de serviço.</p>

                <p><strong>Lei aplicável:</strong><br>
                Estes termos e condições são regidos e interpretados de acordo com as leis da ET.com e você se submete irrevogavelmente à jurisdição exclusiva dos tribunais naquele estado ou localidade.</p>
            </div>
  </main>

    <script src="../../../public/componentes/header/script.js"></script>
    <script src="../../../public/componentes/sidebar/script.js"></script>

</body>
</html>




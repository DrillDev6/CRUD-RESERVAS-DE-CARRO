<?php
require_once '../config/configura.php'; // Configurações do sistema
require_once '../model/ModelConect.php'; // Conexão com o banco de dados    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento Veiculos 2</title>
    <link rel="stylesheet" href="<?php echo DIRPAGE . 'lib/composer/css/calendar.css'; ?>">
    <link rel="stylesheet" href="<?php echo DIRPAGE . 'lib/composer/js/FullCalendar/main.min.css'; ?>">
    <link rel="shortcut icon" type="img/png"
        href="htdocs/img/Logotipo_Small.png">

</head>

<body>

    <div class="calendar"></div>

    <p>Teste de html</p>


    <?php

    $objectConect = new Models\ModelConect();


    var_dump($objectConect->conectDB());

    ?>

    <script src="<?php echo DIRPAGE . 'lib/composer/js/FullCalendar/main.min.js'
                                                                ?>"></script>
    <script src="<?php echo DIRPAGE . 'lib/composer/js/javascript.js'
                                                                ?>"></script>


</body>

</html>


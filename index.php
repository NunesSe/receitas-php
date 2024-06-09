<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas</title>
</head>
<body>
    <?php 
        session_start();
        require_once "./layouts/header.php";
        require_once "banco.php";
        // Botão de sair pressionado


        $verificar = $_SESSION ?? null;
        if($verificar == null) {
            require "layouts/nao-logado.php";
        } else {
            require "layouts/logado.php";
        }

    ?>
</body>
</html>
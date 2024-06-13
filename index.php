<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-3 mb-2 bg-dark text-white d-flex justify-content-center align-items-center vh-100">
    <?php 
        echo "<div class='text-center'>";
            echo "<div class='p-3 mb-2 bg-white text-dark rounded-pill' style='width: 370px;'>";
                session_start();
                require_once "./layouts/header.php";
                require_once "banco.php";
                // Botão de sair pressionado
                echo "</div>";
                
                $verificar = $_SESSION ?? null;
                if($verificar == null) {
                    require "layouts/nao-logado.php";
                } else {
                    require "layouts/logado.php";
                }
                
            echo "</div>";
        ?>
</body>
</html>

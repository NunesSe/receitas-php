<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-0 mb-2 bg-dark text-white position-relative position-absolute top-50 start-0 translate-middle">
    <?php 
        echo "<div class='text-center position-absolute top-0 start-50 translate-middle'>";
            echo "<div class='p-3 mb-2 bg-white text-dark rounded' style='width: 100vw;'>";
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

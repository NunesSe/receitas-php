<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Receita</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-3 mb-2 bg-dark text-white d-flex justify-content-center align-items-center vh-100">
    
<?php 
    echo "<div class='text-center'>";
        echo "<div class='p-3 mb-2 bg-white text-dark rounded' style='width: 370px;'>";
        session_start();
        require_once "../banco.php";
        require_once "../layouts/header.php";
        $verificar = $_SESSION["usuario"] ?? null;
        if($verificar == null) {
            header("Location: login.php");
            return;
        }
        echo "</div>";
        require_once "../forms/receita-cadastro.php";

        $categoriaId = $_POST["categoria"] ?? null;
        $titulo = $_POST["titulo"] ?? null;
        $descricao = $_POST["texto"] ?? null;
        
        if($categoriaId != null && $titulo != null && $descricao != null) {
            cadastrarReceita($titulo, $categoriaId, $descricao, $_SESSION["usuario"]);
            echo "Receita cadastrada!";
        }
        echo "</div>";
?>
</body>
</html>
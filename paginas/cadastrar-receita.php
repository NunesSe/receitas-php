<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Receita</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-0 mb-2 bg-dark text-white d-flex position-absolute top-0 start-50 translate-middle vh-100">
    
<?php 
    echo "<div class='text-center position-absolute top-0 start-50 translate-middle'>";
        session_start();
        require_once "../banco.php";
        require_once "../layouts/header.php";
        $verificar = $_SESSION["usuario"] ?? null;
        if($verificar == null) {
            header("Location: login.php");
            return;
    
        }
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
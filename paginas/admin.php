<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Menu</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="p-0 mb-2 bg-dark text-white d-flex position-absolute top-0 start-50 translate-middle vh-100">
    <div class='text-center position-absolute top-0 start-50 translate-middle'>
        <?php 
            session_start();
            $nomeCategoria = $_POST["nome_categoria"] ?? null;

            require_once "header.php";
            require_once "../banco.php";
            echo "<div style=\"display: flex; justify-content: center;\">";
            require_once "../forms/adicionar-categoria-form.php";
            echo "</div>";

            if ($nomeCategoria) {
                adicionarCategoria($nomeCategoria);
                echo "<div style='margin-top: 250px; 'class='alert alert-success '>Categoria '$nomeCategoria' adicionada com sucesso!</div>";
            } 
        ?>
    </div>
</body>
</html>
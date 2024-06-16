<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Receitas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="p-0 mb-2 bg-dark text-white d-flex position-absolute top-0 start-50 translate-middle vh-100">


    <?php
    echo "<div class='text-center position-absolute top-0 start-50 translate-middle'>";

    session_start();
    $verificar = $_SESSION["usuario"] ?? null;
    if ($verificar == null) {
        header("Location: login.php");
        return;
    }
    require_once "header.php";
    require_once "../banco.php";
    $receitas = buscarReceitasPorUsuario($_SESSION["usuario"]);
    if ($receitas->num_rows == 0) {
        echo "Você não possui nenhuma receita!";
        return;
    }
    while ($obj_receita = $receitas->fetch_object()) {
        echo "<div style=\"width: 300px;margin: 0 auto; border: 1px solid gray; margin-bottom: 3px;\">";

        echo "$obj_receita->tituloReceita";
        echo "<br>";
        echo "De $obj_receita->nomeUsuario (@$obj_receita->usuario)";
        echo "<br>";
        echo "Categoria: $obj_receita->nomeCategoria";
        echo "<br>";
        echo "$obj_receita->textoReceita";
        echo "<br>";
        echo "<a href=\"http://localhost/receitas-php/paginas/editar-receitas.php?id={$obj_receita->receitaId}\">Editar Receita</a>";
        echo "<br>";
        echo "<a href=\"http://localhost/receitas-php/paginas/deletar-receitas.php?id={$obj_receita->receitaId}\">Deletar Receita</a>";
        echo "</div>";
    }

    echo "</div>";

    ?>
</body>

</html>
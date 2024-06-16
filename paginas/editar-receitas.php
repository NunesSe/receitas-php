<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> 
</head>
<body class="p-0 mb-2 bg-dark text-white d-flex position-absolute top-0 start-50 translate-middle vh-100">

<?php 
    echo "<div class='text-center position-absolute top-0 start-50 translate-middle'>";

    session_start();
    $verificar = $_SESSION["usuario"] ?? null;
    if($verificar == null) {
        header("Location: login.php");
        return;
    }
    require_once "header.php";
    require_once "../banco.php";
    $busca = buscarReceitasPorId($_GET["id"]);
    $obj = $busca->fetch_object();
    if($obj->usuario != $_SESSION["usuario"]) {
        header("Location: ../index.php");
    }
?>

<form action="" method="post">
    <label for="">Autor</label>
    <input type="text" name="" value="<?=$_SESSION["usuario"]?>" id="" readonly>
    <br>

    <label for="">Titulo: </label>
    <input type="text" name="titulo" id="" placeholder="<?=$obj->tituloReceita?>">
    <br>
    <label for="">Categoria</label>

    <select name="categoria">

        <?php
            require_once "../banco.php";
            $busca = buscarCategorias();
            
            while ($obj_categoria = $busca->fetch_object()) { 
                echo "<option value=\"$obj_categoria->categoria_id\">$obj_categoria->nome</option> <br>";
            }
        ?>
    </select>
    <br>
    <label for="">Descrição</label>
    <input type="text" name="texto" id="" placeholder="<?=$obj->textoReceita?>">

    <br>
    <input class="btn btn-light"type="submit" value="Editar receita!">
</form>

<?php 
    echo "</div>";
    $categoriaId = $_POST["categoria"] ?? null;
    $titulo = $_POST["titulo"] ?? null;
    $descricao = $_POST["texto"] ?? null;
    
    if($categoriaId != null && $titulo != null && $descricao != null) {
        atualizarReceita($_GET["id"], $titulo, $categoriaId, $descricao);
        echo "$categoriaId";
        echo "Receita atualizada!";
    }
?>
    
</body>
</html>
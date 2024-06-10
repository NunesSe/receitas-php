<?php 
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
    <input type="submit" value="Editar receita!">
</form>

<?php 
    $categoriaId = $_POST["categoria"] ?? null;
    $titulo = $_POST["titulo"] ?? null;
    $descricao = $_POST["texto"] ?? null;
    
    if($categoriaId != null && $titulo != null && $descricao != null) {
        atualizarReceita($_GET["id"], $titulo, $categoriaId, $descricao);
        echo "$categoriaId";
        echo "Receita atualizada!";
    }
?>
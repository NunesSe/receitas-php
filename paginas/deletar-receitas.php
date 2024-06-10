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
    <input type="text" name="" value="<?=$_SESSION["usuario"]?>" id="" disabled>
    <br>

    <label for="">Titulo: </label>
    <input type="text" name="titulo" id="" disabled value="<?=$obj->tituloReceita?>">
    <br>
       
    <br>
    <label for="">Descrição</label>
    <input type="text" name="texto" id="" disabled value="<?=$obj->textoReceita?>">

    <br>
    <input name="deletar" type="submit" value="Deletar receita!">
</form>

<?php 

    $deletar = $_POST["deletar"] ?? null;
    if($deletar != null) {
        deletarReceita($_GET["id"]);
        header("Location: ../index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar</title>
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
    <input type="text" name="" value="<?=$_SESSION["usuario"]?>" id="" disabled>
    <br>

    <label for="">Titulo: </label>
    <input type="text" name="titulo" id="" disabled value="<?=$obj->tituloReceita?>">
    <br>
       
    <br>
    <label for="">Descrição</label>
    <input type="text" name="texto" id="" disabled value="<?=$obj->textoReceita?>">

    <br>
    <input class="btn btn-light" name="deletar" type="submit" value="Deletar receita!">
</form>

<?php 
    echo "</div>";
    $deletar = $_POST["deletar"] ?? null;
    if($deletar != null) {
        deletarReceita($_GET["id"]);
        header("Location: ../index.php");
    }

?>
</body>
</html>
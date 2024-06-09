<?php 
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
?>
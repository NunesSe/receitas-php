<?php 
session_start();
    require_once "../layouts/header.php";
    require_once "../banco.php";
    $receitas = buscarReceitasPorUsuario($_SESSION["usuario"]); 
     while ($obj_receita = $receitas->fetch_object()) {
        echo "$obj_receita->tituloReceita";
        echo "<br>";
        echo "De $obj_receita->nomeUsuario (@$obj_receita->usuario)";
        echo "<br>";
        echo "Categoria: $obj_receita->nomeCategoria";
        echo "<br>";
        echo "$obj_receita->textoReceita";
        echo "<hr>";
    }
?>
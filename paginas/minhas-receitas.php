<?php 
    session_start();
    $verificar = $_SESSION["usuario"] ?? null;
    if($verificar == null) {
        header("Location: login.php");
        return;
    }
    require_once "header.php";
    require_once "../banco.php";
    $receitas = buscarReceitasPorUsuario($_SESSION["usuario"]); 
    if($receitas->num_rows == 0) {
        echo "Você não possui nenhuma receita!";
        return;
    }
     while ($obj_receita = $receitas->fetch_object()) {
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
        echo "<hr>";
    }


?>
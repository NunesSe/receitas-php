<a href="http://localhost/receitas-php/paginas/cadastrar-receita.php">Cadastrar uma receita</a>
<br>
<form action="" method="post">
    <select name="categoriaFiltro">

        <?php
        $busca = buscarCategorias();

        while ($obj_categoria = $busca->fetch_object()) {
            echo "<option value=\"$obj_categoria->categoria_id\">$obj_categoria->nome</option> <br>";
        }
        ?>
    </select>
    <input type="submit" value="Aplicar filtro">
    
</form>
<form action="" method="post">
    <input value="resetar" type="submit" value="Resetar filtro">
</form>

<?php

    $categoriaFiltro = $_POST["categoriaFiltro"] ?? null;

    $resetou = $_POST["resetar"] ?? null;
    if($resetou != null) {
        $_POST["categoriaFiltro"] == null;
    }    

    if($categoriaFiltro != null) {
        $receitas = buscarReceitasPorCategoriaId($categoriaFiltro);
    } 
    if($categoriaFiltro == null) {
        $receitas = buscarReceitas();
    }
    
    if($receitas->num_rows == 0) {
        echo "Não foi encontrada nenhuma receita!";
    } else {

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
    }
?>
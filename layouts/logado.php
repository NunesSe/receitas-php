<a href="http://localhost/receitas-php/paginas/cadastrar-receita.php" class="btn btn-outline-light">Cadastrar uma receita</a>
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
        echo "<div class='alert alert-danger' role='alert'>Não foi encontrada nenhuma receita!</div>";
        
    } else {

        
        while ($obj_receita = $receitas->fetch_object()) {
            echo "<br>
            <div class=\"card\" style=\"width: 20rem; color: black; margin: 0 auto;\">
                <div class=\"card-body\">
                    <h5 class=\"card-title\">$obj_receita->tituloReceita</h5>
                    <h6 class=\"card-subtitle mb-2 text-body-secondary\">De $obj_receita->nomeUsuario (@$obj_receita->usuario)</h6>
                    <h6 class=\"card-subtitle mb-2 text-body-secondary\">De Categoria: $obj_receita->nomeCategoria</h6>
                    <p class=\"card-text\">$obj_receita->textoReceita.</p>
                </div>
            </div>";
        }
    }
?>
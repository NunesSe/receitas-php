<form action="" method="post">
    <label for="">Autor</label>
    <input type="text" name="" value="<?=$_SESSION["usuario"]?>" id="" readonly>
    <br>

    <label for="">Titulo: </label>
    <input type="text" name="titulo" id="">
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
    <input type="text" name="texto" id="">

    <br>
    <input type="submit" value="Enviar receita!">
</form>
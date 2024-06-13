
<?php 

    if(isset($_POST["sair"])) {
        unset($_SESSION["usuario"]);
        header("Location: index.php");
    }
?>


        
       
            <a href="http://localhost/receitas-php" style="margin-right: 33.33333333333333%;">Receitas</a>
            <br>
                <?php 
                    $validacao = $_SESSION["usuario"] ?? null;
                    if($validacao != null) {
                        echo "
                            <form method=\"post\">
                                <input type=\"submit\" name=\"sair\"  value=\"Sair\" id=\"\" class=\"btn btn-dark\" style=\"margin=0; display=flex;\">
                            </form>
                        <a href=\"http://localhost/receitas-php/paginas/minhas-receitas.php\" style=\"margin-left: 33.33333333333333%;\">Minha receitas</a>";
        
                    } else {
                        echo "<a href=\"http://localhost/receitas-php/paginas/login.php\">Logar</a>";
                    }

                    
                ?>
            
        
<?php 

    if(isset($_POST["sair"])) {
        unset($_SESSION["usuario"]);
        header("Location: login.php");
    }
?>


        
       
            <a href="http://localhost/receitas-php">Receitas</a>
            <br>
                <?php 
                    $validacao = $_SESSION["usuario"] ?? null;
                    if($validacao != null) {
                        echo 
                        "<a href=\"http://localhost/receitas-php\">
                            <form method=\"post\">
                                <input type=\"submit\" name=\"sair\"  value=\"Sair\" id=\"\">
                            </form>
                        </a>
                        <a href=\"http://localhost/receitas-php/paginas/minhas-receitas.php\">Minha receitas</a>";
        
                    } else {
                        echo "<a href=\"http://localhost/receitas-php/paginas/login.php\">Logar</a>";
                    }

                    
                ?>
            
        

<?php 

    if(isset($_POST["sair"])) {
        unset($_SESSION["usuario"]);
        header("Location: index.php");
    }
?>


        
<div class='p-3 mb-5 bg-white text-dark rounded' style='width: 100vw; display: flex; justify-content: center;'>
       
            <a href="http://localhost/receitas-php" style="margin-right: 33.33333333333333%;">Receitas</a>
            <br>
                <?php 
                    $validacao = $_SESSION["usuario"] ?? null;
                    if($validacao != null) {
                        echo "
                            <form method=\"post\">
                                <div style=\"text-align: center;\">
                                    <input type=\"submit\" name=\"sair\"  value=\"Sair\" id=\"\" class=\"btn btn-dark\" style=\"margin: 0 auto; display: block;\">
                                </div>
                            </form>
                        <a href=\"http://localhost/receitas-php/paginas/minhas-receitas.php\" style=\"margin-left: 33.33333333333333%;\">Minha receitas</a>";
        
                    } else {
                        echo "<a href=\"http://localhost/receitas-php/paginas/login.php\">Logar</a>";
                    }

                    
                ?>
</div>
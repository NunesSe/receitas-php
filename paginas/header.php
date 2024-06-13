<?php 

    if(isset($_POST["sair"])) {
        unset($_SESSION["usuario"]);
        header("Location: login.php");
    }
?>

<header>
    <nav>
        <ul>
       
            <li><a href="http://localhost/receitas-php">Receitas</a></li>
            <li>
                <?php 
                    $validacao = $_SESSION["usuario"] ?? null;
                    if($validacao != null) {
                        echo 
                        "<a href=\"http://localhost/receitas-php\">
                            <form method=\"post\">
                                <input type=\"submit\" name=\"sair\"  value=\"Sair\" id=\"\" class=\"btn btn-outline-light\">
                            </form>
                        </a>
                        <a href=\"http://localhost/receitas-php/paginas/minhas-receitas.php\">Minha receitas</a>";
        
                    } else {
                        echo "<a href=\"http://localhost/receitas-php/paginas/login.php\">Logar</a>";
                    }

                    
                ?>
            </li>
        </ul>
    </nav>
</header>
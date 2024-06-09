<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <p>
        <?php 
            session_start();
            require_once "../layouts/header.php";
            require_once "../banco.php";
            require_once "../forms/cadastro-form.php";

            $usuario = $_POST["usuario"] ?? null;
            $nome = $_POST["nome"] ?? null;
            $senha = $_POST["senha"] ?? null;

            if($usuario != null && $nome != null && $senha != null) {
                if(usuarioJaExiste($usuario)) {
                    echo "Usuario já esta sendo utilizado! Tente novamente!";
                    return;
                } 

                criarUsuario($usuario, $nome, $senha);
                echo "Usuario cadastrado com sucesso!";
                $_SESSION["usuario"] = $usuario;
            }
        ?>
    </p>
</body>
</html>
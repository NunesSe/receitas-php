<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php 
        session_start();

        $validacao = $_SESSION["usuario"] ?? null;

        require_once "../layouts/header.php";
        if($validacao != null) {
 
            header("Location: ../index.php");
            return;
        }

        require_once "../banco.php";
        require_once "../forms/login-form.php";

        $usuario = $_POST["usuario"] ?? null;
        $senha = $_POST["senha"] ?? null;

        if($usuario != null && $senha != null) {
            $busca = buscarUsuario($usuario);

            if($busca->num_rows == 0) {
                echo "Usuario não encontrado!";
                return;
            }

            if(!password_verify($senha ,$busca->fetch_object()->senha_hash)) {
                echo "<br> Senha incorreta!";
                return;
            }

            $_SESSION["usuario"] = $usuario;
            header("Location: http://localhost/receitas-php");
            echo "Bem vindo!!";
        }
    ?>
</body>
</html>
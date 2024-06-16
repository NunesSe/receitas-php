<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white position-relative position-absolute top-50 start-0 translate-middle">
    <div class="text-center">
        <?php 
            session_start();

            $validacao = $_SESSION["usuario"] ?? null;

            if($validacao != null) {
                header("Location: ../index.php");
                return;
            }
            require_once "../layouts/header.php";
            require_once "../banco.php";
            require_once "../forms/login-form.php";
            
            $usuario = $_POST["usuario"] ?? null;
            $senha = $_POST["senha"] ?? null;

            if($usuario != null && $senha != null) {
                $busca = buscarUsuario($usuario);

                if($busca->num_rows == 0) {
                    echo "<div class='alert alert-danger' role='alert'>Usuário não encontrado!</div>";
                } else if(!password_verify($senha, $busca->fetch_object()->senha_hash)) {
                    echo "<div class='alert alert-danger' role='alert'>Senha incorreta!</div>";
                } else {
                    $_SESSION["usuario"] = $usuario;
                    header("Location: http://localhost/receitas-php");
                    echo "<div class='alert alert-success' role='alert'>Bem-vindo!</div>";
                }
            }
        ?>
    </div>
</body>
</html>

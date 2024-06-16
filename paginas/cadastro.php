<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class=" bg-dark text-white d-flex justify-content-center align-items-center ">
    <div class="text-center  mb-2">
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
                    echo "<div class='alert alert-danger' role='alert'>Usuário já está sendo utilizado! Tente novamente!</div>";
                } else {
                    criarUsuario($usuario, $nome, $senha);
                    echo "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso!</div>";
                    $_SESSION["usuario"] = $usuario;
                }
            }
        ?>
    </div>
</body>
</html>

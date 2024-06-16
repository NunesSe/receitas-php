<?php 

    $banco = new mysqli("localhost", "root", "", "receitas");

    function criarUsuario(string $usuario, string $nome, string $senha) {
        global $banco;


        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $q = "INSERT INTO `usuarios` (`usuario_id`, `usuario`, `nome`, `senha_hash`, `senha_normal`) VALUES (NULL, '$usuario', '$nome', '$senha_hash', '$senha')";
        $banco->query($q);
    }

    function usuarioJaExiste(string $usuario) {
        global $banco;
        $q = "SELECT * FROM usuarios WHERE usuario='$usuario'";
        $busca = $banco->query($q);
        if($busca->num_rows > 0) {
            return true;
        }
        return false;
    }

    function buscarUsuario(string $usuario) {
        global $banco;

        $q = "SELECT * FROM usuarios WHERE usuario='$usuario'";

        $busca = $banco->query($q);

        return $busca;
    }

    function buscarCategorias() {
        global $banco;

        $q = "SELECT * FROM categorias";

        $busca = $banco->query($q);

        return $busca;
    }

    function cadastrarReceita(string $titulo, int $categoriaId, string $texto, string $usuario) {
        global $banco;

        $usuarioId = buscarUsuario($usuario)->fetch_object()->usuario_id;
        $q = "INSERT INTO `receitas` (`receita_id`, `usuario_id`, `categoria_id`, `titulo`, `texto`) VALUES (NULL, '$usuarioId', '$categoriaId', '$titulo', '$texto')";

        $banco->query($q);
    }

    function buscarReceitas() {
        global $banco;
        $q = "SELECT r.titulo AS tituloReceita, r.texto AS textoReceita, c.nome AS nomeCategoria, u.nome AS nomeUsuario, u.usuario AS usuario
        FROM receitas r
        JOIN categorias c ON r.categoria_id = c.categoria_id
        JOIN usuarios u ON r.usuario_id = u.usuario_id;";

        $busca = $banco->query($q);

        return $busca;
    }

    function buscarReceitasPorCategoriaId(int $id) {
        global $banco;
        $q = "SELECT r.titulo AS tituloReceita, r.texto AS textoReceita, c.nome AS nomeCategoria, u.nome AS nomeUsuario, u.usuario AS usuario
        FROM receitas r
        JOIN categorias c ON r.categoria_id = c.categoria_id
        JOIN usuarios u ON r.usuario_id = u.usuario_id
        WHERE c.categoria_id = $id;";

        $busca = $banco->query($q);

        return $busca;
    }

    function buscarReceitasPorUsuario(string $usuario) {
        global $banco;
        $usuarioId = buscarUsuario($usuario)->fetch_object()->usuario_id;

        $q = "SELECT r.receita_id AS receitaId, r.titulo AS tituloReceita, r.texto AS textoReceita, c.nome AS nomeCategoria, u.nome AS nomeUsuario, u.usuario AS usuario
        FROM receitas r
        JOIN categorias c ON r.categoria_id = c.categoria_id
        JOIN usuarios u ON r.usuario_id = u.usuario_id
        WHERE u.usuario_id = $usuarioId;";

        $busca = $banco->query($q);
        return $busca;
    }

    function buscarReceitasPorId(int $id) {
        global $banco;
        $q = "SELECT r.titulo AS tituloReceita, r.texto AS textoReceita, c.nome AS nomeCategoria, u.nome AS nomeUsuario, u.usuario AS usuario
        FROM receitas r
        JOIN categorias c ON r.categoria_id = c.categoria_id
        JOIN usuarios u ON r.usuario_id = u.usuario_id
        WHERE r.receita_id = $id;";

        $busca = $banco->query($q);

        return $busca;
    }

    function atualizarReceita($receitaId, $titulo, $categoria, $descricao) {
        global $banco;

        $q = "UPDATE receitas SET categoria_id = '$categoria', titulo = '$titulo', texto = '$descricao' WHERE receita_id = '$receitaId'";

        $banco->query($q);
    }

    function deletarReceita($id) {
        global $banco;

        $q = "DELETE FROM receitas WHERE receita_id = '$id'";

        $banco->query($q);
    }

?>

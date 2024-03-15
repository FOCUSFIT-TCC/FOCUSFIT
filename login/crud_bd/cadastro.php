<?php
include "../../utils/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Query para inserir os dados na tabela
    $sql = "INSERT INTO users_login (nome, username, email, password, perfil_id ) VALUES ('$nome', '$nome', '$email', '$senha', 2)";

    if ($conexao->query($sql) === TRUE) {
        // Cadastro realizado com sucesso
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href = '../login.php';</script>";
    } else {
        // Erro no cadastro
        echo "<script>alert('Erro no cadastro: " . $conexao->error . "'); history.go(-1);</script>";
    }
}

$conexao->close();
?>

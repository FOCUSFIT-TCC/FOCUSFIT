<?php

include_once('../utils/conexao.php');

// Inicia a sessão
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    // Se não estiver logado, redirecione para a página de login
    header('Location: ../../../login/login.php');
    exit;
}

// Obtém o ID do usuário da sessão
$user_id = $_SESSION['user_id'];

// Consulta o banco de dados para obter o e-mail do usuário
$sql = "SELECT email FROM users_login WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se a consulta foi bem-sucedida
if ($result->num_rows > 0 && $_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $result->fetch_assoc();
    $user_email = $user['email'];

    //se precisar salvar o peso e altura, já está coletando aqui na página
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $imc_calculado = $_POST['imc_calculado'];

    $sql_existe_info = "SELECT * FROM user_infos WHERE user_id = $user_id LIMIT 1";
    $statement_existe_info = $conexao->prepare($sql_existe_info);
    $statement_existe_info->execute();
    $result_existe_info = $statement_existe_info->get_result();

    $sql_imc = "";

    if ($result_existe_info->num_rows > 0) {

        $sql_imc = "UPDATE user_infos SET imc = $imc_calculado WHERE user_id = $user_id";

    } else {
        
        $sql_imc = "INSERT INTO user_infos (user_id, imc) VALUES ($user_id, $imc_calculado)";

    }

    if ($conexao->query($sql_imc) === TRUE) {
        echo "<script>window.location.href = '../objetivo/objetivo.php';</script>";
    } else {
        echo "<script>alert('Ops... não conseguimos salvar o seu IMC!'); window.location.href = 'calc.php';</script>";
    }



} else {
    // Se não puder obter o e-mail, redirecione para a página de login
    header('Location: ../../login.php');
    exit;
}

?>
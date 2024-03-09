<?php
// Inclua o arquivo de conexão
include_once('../../utils/conexao.php');

// Inicia a sessão
session_start();

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtenha os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Crie a consulta SQL usando instruções preparadas
    $sql = "SELECT * FROM users_login WHERE email = ? AND password = ?";
    
    // Prepare a consulta
    $stmt = $conexao->prepare($sql);

    // Verifique se a preparação foi bem-sucedida
    if ($stmt) {
        // Vincule os parâmetros corretamente
        $stmt->bind_param('ss', $email, $senha);

        // Execute a consulta
        $stmt->execute();

        // Obtenha o resultado
        $result = $stmt->get_result();

        // Verifique se a consulta retornou algum resultado
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $user_id = $user['id'];
            $user_email = $user['email'];
            
            // Armazena o ID do usuário na sessão
            $_SESSION['user_id'] = $user_id;
            
            // Armazena o e-mail no localStorage
            echo "<script>localStorage.setItem('user_email', '$user_email');</script>";
            
            // Redireciona para a calculadora IMC
            header('Location: ../../usuario/usuario.php');
            exit;
        } else {
            // Credenciais inválidas
            echo "<script>alert('Credenciais inválidas. Tente novamente.'); history.go(-1);</script>";
        }

        // Feche a consulta
        $stmt->close();
    } else {
        // Lidere com erro na preparação da consulta
        echo "Erro na preparação da consulta: " . $conexao->error;
    }

    

    // Feche a conexão
    $conexao->close();
}
?>

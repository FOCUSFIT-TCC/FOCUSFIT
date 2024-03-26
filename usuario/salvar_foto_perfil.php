<?php
include_once('../utils/conexao.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../../login/login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['url'])) {
    $url_foto = $_GET['url'];

    // Atualiza o campo foto_perfil na tabela user_info
    $sql_update_foto_perfil = "UPDATE users_login SET foto = ? WHERE id = ?";
    
    // Preparação da consulta
    $stmt_update_foto_perfil = $conexao->prepare($sql_update_foto_perfil);

    if (!$stmt_update_foto_perfil) {
        die('Erro na preparação da consulta: ' . $conexao->error);
    }

    // Vincula os parâmetros corretamente
    $stmt_update_foto_perfil->bind_param('si', $url_foto, $user_id);

    // Executa a consulta
    $stmt_update_foto_perfil->execute();

    // Verifica erros na execução da consulta
    if ($stmt_update_foto_perfil->error) {
        die('Erro na execução da consulta: ' . $stmt_update_foto_perfil->error);
    }

    // Feche a consulta
    $stmt_update_foto_perfil->close();
    header('Cache-Control: max-age=31536000'); // Cache por 1 ano
    
    echo 'Foto de perfil atualizada com sucesso!';
    echo "<script>window.location.href='usuario.php';</script>";
} else {
    echo 'Parâmetros ausentes ou inválidos.';
}
?>

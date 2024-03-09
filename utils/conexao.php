<?php
// Configurações de conexão com o banco de dados
$host = "localhost"; // ou o endereço do seu servidor MySQL
$usuario = "root";
$senha = "";
$banco = "db_focusfit";

// Cria a conexão
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica a conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// Configuração do charset para utf8 (opcional)
$conexao->set_charset("utf8");
?>

<?php
include_once('../utils/conexao.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../../login/login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Consulta o banco de dados para obter as informações do usuário
$sql_user = "SELECT email, username FROM users_login WHERE id = ?";
$stmt_user = $conexao->prepare($sql_user);
$stmt_user->bind_param('i', $user_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();

if ($result_user->num_rows > 0) {
    $user = $result_user->fetch_assoc();
    $user_email = $user['email'];
    $username = $user['username'];

    // Obtém o link da foto de perfil
    $sql_foto_perfil = "SELECT foto_perfil FROM user_infos WHERE user_id = ?";
    $stmt_foto_perfil = $conexao->prepare($sql_foto_perfil);
    $stmt_foto_perfil->bind_param('i', $user_id);
    $stmt_foto_perfil->execute();
    $result_foto_perfil = $stmt_foto_perfil->get_result();

    if ($result_foto_perfil->num_rows > 0) {
        $foto_perfil = $result_foto_perfil->fetch_assoc()['foto_perfil'];
    } else {
        $foto_perfil = ''; // Se não houver foto de perfil, define como uma string vazia
    }

    $stmt_foto_perfil->close();
} else {
    header('Location: ../../login.php');
    exit;
}

// Consulta o banco de dados para obter as informações da tabela users_infos
$sql_infos = "SELECT idade, objetivo, imc, tipo_plano FROM user_infos WHERE user_id = ?";
$stmt_infos = $conexao->prepare($sql_infos);

if (!$stmt_infos) {
    die('Erro na consulta SQL: ' . $conexao->error);
}

$stmt_infos->bind_param('i', $user_id);
$stmt_infos->execute();
$result_infos = $stmt_infos->get_result();

if ($result_infos->num_rows > 0) {
    $infos = $result_infos->fetch_assoc();
    $idade = $infos['idade'];
    $objetivo = $infos['objetivo'];
    $imc = $infos['imc'];
    $tipo_de_plano = $infos['tipo_de_plano'] ?? "Plano Inicial"; // Se for null, define como "Plano Inicial"
} else {
    $idade = $objetivo = $imc = $tipo_de_plano = "N/A"; // Se não houver informações, define como "N/A"
}

$stmt_infos->close();
$stmt_user->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Foto de Perfil | FOCUSFIT</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css'>
    <link rel="stylesheet" href="../../FOCUSFIT/assets/css/usuario/usuario.css">
    
</head>
<body>
    <main>
    <br><br>    
    <h1 class="heading"> <span>Perfil</span> </h1>
  <br><br> <br>

<div class="container">
    <br>
    <div>
        <img src="img/user.png" alt="" class="fotodeperfil" id="usericon">
        <p class="nome"><?php echo $username; ?></p> <br> <br>
        <p class="e-mail"><?php echo $user_email; ?></p>

        
    <br><br><br>
    <b>
        <center>
        <table class="table1">
    <tr>
        <td><p class="informacoes">Idade:</p></td>
        <td><p class="informacoes"><?php echo $idade; ?></p></td>
    </tr>
    <tr>
        <td><p class="informacoes">Objetivo:</p></td>
        <td><p class="informacoes"><?php echo $objetivo; ?></p></td>
    </tr>
    <tr>
        <td><p class="informacoes">IMC:</p></td>
        <td><p class="informacoes"><?php echo $imc; ?></p></td>
    </tr>
    <tr>
        <td><p class="informacoes">Tipo de Plano:</p></td>
        <td><p class="informacoes"><?php echo $tipo_de_plano; ?></p></td>
    </tr>
</table>
</center>   
</b>



        <br> <br> <br> <a href="../Calculadora_IMC/calc.php" class="btn1">Iniciar Teste</a>
    </div>
</div>


</main>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Links rápidos</h3>
                <a class="links" href="../index.html">Início</a>
                <a class="links" href="../index.html#about">Sobre</a>
                <a class="links" href="../index.html#features">Serviços</a>
                <a class="links" href="../index.html#pricing">Planos</a>
                <a class="links" href="../index.html#blogs">blogs</a>
            </div>
        
            <div class="box">
                <h3>Nossos Contatos</h3>
                <p> <i class="fas fa-phone"></i> +55 12 97600-0166 </p>
                <p> <i class="fas fa-envelope"></i> focusfit.tcc@gmail.com  </p>
                <p> <i class="fas fa-map"></i> São Paulo, Brasil</p>
                <div class="share">
                    <a href="https://www.instagram.com/focusfit.tcc/" class="fab fa-instagram"></a>
                    <a href="https://twitter.com/FocusFit184204" class="fab fa-twitter"></a>
                    <a href="https://br.pinterest.com/focusfittcc/" class="fab fa-pinterest"></a>
                    
                </div>
            </div>
            <div class="box">
                <h3>Novidades</h3>
                <p>Se inscreva para receber as novidades</p>
                <form action="">
                    <input type="email" name="" class="email" placeholder="digite seu e-mail" id="">
                    <input type="submit" value="Inscrever-se" class="btn">
                </form>
            </div>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/f0c76a2bf3.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    
</body>
</html>

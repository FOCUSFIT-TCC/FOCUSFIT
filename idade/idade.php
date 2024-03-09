<?php
// Inclua o arquivo de conexão
include_once('../utils/conexao.php');

// Inicia a sessão
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    // Se não estiver logado, redirecione para a página de login
    header('Location: ../login/login.php');
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
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $user_email = $user['email'];
} else {
    // Se não puder obter o e-mail, redirecione para a página de login
    header('Location: ../login/login.php');
    exit;
}

// Se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifique se a chave "idade" está presente no $_POST
    if (isset($_POST['idade'])) {
        // Obtém o valor da idade
        $idade = $_POST['idade'];
        
        $sql_update_idade = "UPDATE user_infos SET idade = ? WHERE user_id = ?";
        $statement_update_idade = $conexao->prepare($sql_update_idade);
        $statement_update_idade->bind_param('si', $idade, $user_id);
    
        if ($statement_update_idade->execute()) {
    
          $statement_update_idade->close();
          header('Location: ../usuario/usuario.php');
          exit;
    
        } else {
    
          $statement_update_idade->close();
          echo "<script>alert('Ops... não conseguimos salvar sua idade!'); window.location.href='idade.php';</script>";
    
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Objetivo | FOCUSFIT</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css'>
  <link rel="stylesheet" href="../assets/css/objetivo/style.css">
</head>
<body>

<div class="container">
  <br><br>
  <h1 class="heading"> <span>Escolha sua idade</span> </h1>
  <br><br> <br>
  <form action="" method="post">

    <div class="grid-wrapper grid-col-auto">
      <label for="radio-card-1" class="radio-card">
        <input type="radio" name="idade" value="jovem (18-26)" id="radio-card-1" checked />
        <div class="card-content-wrapper">
          <span class="check-icon"></span>
          <div class="card-content">
            <img src="../assets/images/idade/jovem.png" alt="" />
            <h4>Jovem.</h4>
            <h5>18-26 anos</h5>
          </div>
        </div>
      </label>
      <!-- /.radio-card -->

      <label for="radio-card-2" class="radio-card">
        <input type="radio" name="idade" value="adulto (27-60)" id="radio-card-2" />
        <div class="card-content-wrapper">
          <span class="check-icon"></span>
          <div class="card-content">
            <img src="../assets/images/idade/adulto.png" alt="" />
            <h4>Adulto.</h4>
            <h5>27-60 anos</h5>
          </div>
        </div>
      </label>
      <label for="radio-card-3" class="radio-card">
        <input type="radio" name="idade" value="idoso (60+)" id="radio-card-3" />
        <div class="card-content-wrapper">
          <span class="check-icon"></span>
          <div class="card-content">
            <img src="../assets/images/idade/velho.png" alt="" />
            <h4>Idoso.</h4>
            <h5>Apartir dos 60</h5>
          </div>
        </div>
      </label>
    
    </div>
    <br> <br> <br>
    <center>
      <button type="submit" class="btn">Continuar</button>
    </center>

  </form>
</div>
<!-- /.container -->

</body>
</html>

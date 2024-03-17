<?php
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

  // Verifique se a chave "objetivo" está presente no $_POST
  if (isset($_POST['objetivo'])) {

    // Obtém o valor do objetivo
    $objetivo = $_POST['objetivo'];

    $sql_update_idade = "UPDATE user_infos SET objetivo = ? WHERE user_id = ?";
    $statement_update_idade = $conexao->prepare($sql_update_idade);
    $statement_update_idade->bind_param('si', $objetivo, $user_id);

    if ($statement_update_idade->execute()) {

      $statement_update_idade->close();
      header('Location: ../idade/idade.php');
      exit;

    } else {

      $statement_update_idade->close();
      echo "<script>alert('Ops... não conseguimos salvar seu objetivo!'); window.location.href='objetivo.php';</script>";

    }


  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Objetivo | FOCUSFIT</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css'>
  <link rel="shortcut icon" type="imagex/png" class="imagex"  href="../img/logos/pag.png">
  <link rel="stylesheet" href="../assets/css/objetivo/style.css">
</head>

<body>

  <div class="container">
    <br><br>
    <h1 class="heading"> <span>Escolha seu Objetivo</span> </h1>
    <br><br> <br>
    <form action="" method="post">
      <div class="grid-wrapper grid-col-auto">
        <label for="radio-card-1" class="radio-card">
          <input type="radio" name="objetivo" value="ganho de massa" id="radio-card-1" checked />
          <div class="card-content-wrapper">
            <span class="check-icon"></span>
            <div class="card-content">
              <img src="../assets/images/objetivo/hipertrofia.png" alt="" />
              <h4>Ganho de Massa.</h4>
              <h5>Treino e dieta para construir músculos com eficiência. 💪</h5>
            </div>
          </div>
        </label>
        <!-- /.radio-card -->

        <label for="radio-card-2" class="radio-card">
          <input type="radio" name="objetivo" value="perca de peso" id="radio-card-2" />
          <div class="card-content-wrapper">
            <span class="check-icon"></span>
            <div class="card-content">
              <img src="../assets/images/objetivo/magro.png" alt="" />
              <h4>Perca de Peso.</h4>
              <h5>Alcance seus objetivos de forma saudável e sustentável. 🏋️‍♀️🥗</h5>
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
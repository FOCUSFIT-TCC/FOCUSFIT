<?php
// Inclui o arquivo de conexão
require_once('../utils/conexao.php');

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Recupera o ID do formulário
    $id = $_POST['id'];

    // Consulta para obter o ID do usuário com base no ID fornecido
    $sql_select_user = "SELECT * FROM user_infos WHERE id = $id";
    $result_select_user = $conexao->query($sql_select_user);

    if ($result_select_user->num_rows > 0) {
        // Se o usuário existir, atualize a coluna tipo_plano para 'básico'
        $sql_update_tipo_plano = "UPDATE user_infos SET tipo_plano = 'básico' WHERE id = $id";
        if ($conexao->query($sql_update_tipo_plano) === TRUE) {
           
        } else {
            
        }
    } else {
       
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" type="imagex/png" class="imagex" href="../img/logos/pag.png">
    <link rel="stylesheet" href="style/ecner.css">

    <title>AGRADECIEMENTOS | FOCUSFIT</title>
</head>

<body>
<div class="ct">
<div class=thankyoucontent>
 <div class="wrapper-1">
    <div class="wrapper-2">
       <img src="https://i.ibb.co/Lkn7rkG/thank-you-envelope.png" alt="thank-you-envelope" border="0">
     <h1>OBRIGADO!</h1>
      <p> Agradecemos sua compra.</p> 
      <p>Nossa equipe focusfit esta processando seu pedido. </p>
      <button class="go-home"><a href="../usuario/usuario.php">
        CONTINUAR</a>
      </button>
    </div>
   
  
</div>
</div>



</body>

</html>
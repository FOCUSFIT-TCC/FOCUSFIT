<?php
include_once('..//utils/conexao.php');

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
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $user_email = $user['email'];
} else {
    // Se não puder obter o e-mail, redirecione para a página de login
    header('Location: ../../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/calculadora_imc/style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Calculadora de IMC</title>

</head>

<body>

    <main id="container">
        <section id="img">
            <img src="../assets/images/calculadora_imc/illustration.png">
        </section>

        <section id="calculator">

            <form id="form" action="salvar_dados.php" method="post">

                <h1 id="title">
                    Calculadora - IMC
                </h1>

                <div class="input-box">
                    <label for="peso">
                        Peso em kg
                    </label>
                    <div class="input-field">
                        <i class="fa-solid fa-weight-hanging"></i>
                        <input type="number" id="peso" name="peso" required>
                        <span>
                            Kg
                        </span>
                    </div>
                </div>

                <div class="input-box">
                    <label for="altura">
                        Altura em metros
                    </label>
                    <div class="input-field">
                        <i class="fa-solid fa-ruler"></i>
                        <input type="number" step="0.01" min="0.01" id="altura" name="altura" required>
                        <span>
                            m
                        </span>
                    </div>
                </div>
                
                <button type="button" id="calculate" onClick="calcularIMC()">
                    Calcular
                </button>
            
            <div id="infos" class="hidden">
                <div id="result">
                    <div id="imc">
                        <input type="hidden" id="imc_calculado" name="imc_calculado" />
                        <span id="value"></span>
                        <span>Seu IMC</span>
                    </div>
                    <div id="description">
                        <span></span>
                    </div>  
                </div>
                <button type="submit" id="continuar">
                    Prosseguir
                </button>
                <div id="more_info">
                    <a href="https://mundoeducacao.uol.com.br/saude-bem-estar/imc.htm">
                        Mais informações sobre o IMC
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
            </div>   
            
            </form>    
        </section>
    </main>
    <script src="../assets/scripts/calculadora_imc/script.js"></script>
</body>
</html>

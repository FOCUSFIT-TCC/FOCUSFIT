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


  $sql_foto_perfil = "SELECT foto FROM users_login WHERE id  = ?";
  $stmt_foto_perfil = $conexao->prepare($sql_foto_perfil);
  $stmt_foto_perfil->bind_param('i', $user_id);
  $stmt_foto_perfil->execute();
  $result_foto_perfil = $stmt_foto_perfil->get_result();

  if ($result_foto_perfil->num_rows > 0) {
    $foto_perfil = $result_foto_perfil->fetch_assoc()['foto'];
  } else {
    $foto_perfil = ''; // string vazia;prc
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
  $tipo_de_plano = $infos['tipo_plano'] ?? "Plano Inicial"; // Se for null, define como "Plano Inicial"
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
  <title>Perfil | FOCUSFIT</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css'>
  <link rel="shortcut icon" type="imagex/png" class="imagex" href="../img/logos/pag.png">
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
   <!-- Adicione um identificador único à sua imagem de perfil -->
<img src="<?php echo $foto_perfil; ?>" alt="" class="fotodeperfil" id="usericon">

<?php
// Verifique se a foto de perfil está vazia ou nula

    // Use JavaScript para adicionar um evento de clique à imagem
    echo "
    <script>
        // Função para lidar com o clique na imagem de perfil
        document.getElementById('usericon').addEventListener('click', function() {
            // Exibir o prompt para inserir a URL da foto
            var foto = prompt('Insira a URL da sua foto');
            // Verificar se o usuário inseriu uma URL
            if (foto !== null && foto !== '') {
                // Codificar a URL
                var foto_tratada = encodeURI(foto);
                // Redirecionar para a página de salvar a foto com a URL fornecida
                window.location.href = 'salvar_foto_perfil.php?url=' + foto_tratada;
            }
        });
    </script>
    ";

?>
        <br> <br><br> <br><br> <br>
        <p class="nome"><?php echo $username; ?></p> <br> <br>  <br>  <br> 
        <p class="e-mail"><?php echo $user_email; ?></p> <br><br>
        <p class="id"><?php echo "ID: ". $user_id; ?></p> 
       

        <br><br><br>
        <b>
          <center>
            <table class="table1">
              <tr>
                <td>
                  <p class="informacoes">Idade:</p>
                </td>
                <td>
                  <p class="informacoes"><?php echo $idade; ?></p>
                </td>
              </tr>
              <tr>
                <td>
                  <p class="informacoes">Objetivo:</p>
                </td>
                <td>
                  <p class="informacoes"><?php echo $objetivo; ?></p>
                </td>
              </tr>
              <tr>
                <td>
                  <p class="informacoes">IMC:</p>
                </td>
                <td>
                  <p class="informacoes"><?php echo $imc; ?></p>
                </td>
              </tr>
              <tr>
                <td>
                  <p class="informacoes">Tipo de Plano:</p>
                </td>
                <td>
                  <p class="informacoes"><?php echo $tipo_de_plano; ?></p>
                </td>
              </tr>
            </table>

        </b>

        <br><br><br><br> <br><br> <br>
        <h1 class="heading"> <span>Tarefas Semanais</span> </h1>


        <div class="container2">
          <div class="card">
            <div class="face face1">
              <div class="content">
                <i class="fa-solid fa-glass-water"></i>
                <h3>Hidrate-se</h3>
              </div>
            </div>
            <div class="face face2">
              <div class="content">
                <p><b style="color: #ff0000;">Hidrate-se Diariamente </b> <br>Descrição: "Beba água diariamente para manter-se saudável."</p>
                <i> <b>
                    <p style="color: #ff0000;"><i class="fa-solid fa-coins" style="color: #ff0000;"></i> : 550</p>
                  </b></i>
                <br> <a class="btnd" href="../wiki/focus_coins.html">Ler Sobre</a> <br>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="face face1">
              <div class="content">
                <i class="fa-solid fa-shoe-prints"></i>
                <h3>Corra</h3>

              </div>
            </div>
            <div class="face face2">
              <div class="content">
                <p><b style="color: #ff0000;">Corra 25km na Semana </b> <br>Descrição: "Corra 25km semanalmente para melhorar sua saúde."</p>
                <i> <b>
                    <p style="color: #ff0000;"><i class="fa-solid fa-coins" style="color: #ff0000;"></i> : 2550</p>
                  </b></i>
                <br> <a class="btnd" href="../wiki/focus_coins.html">Ler Sobre</a><br>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="face face1">
              <div class="content">
                <i class="fa-solid fa-jedi"></i>
                <h3>Flexões</h3>
              </div>
            </div>
            <div class="face face2">
              <div class="content">
                <p><b style="color: #ff0000;">300 Flexões na Semana </b> <br>Descrição: "Complete 300 flexões esta semana para fortalecimento."</p>
                <i> <b>
                    <p style="color: #ff0000;"><i class="fa-solid fa-coins" style="color: #ff0000;"></i> : 1000</p>
                  </b></i>
                <br> <a class="btnd" href="../wiki/focus_coins.html">Ler Sobre</a> <br>
              </div>
            </div>
          </div>


        </div>
        <br> <br> <br> <br> <br> <br> <a href="../Calculadora_IMC/calc.php" class="btn1">Iniciar Teste</a>
      </div>
    </div>
    </center>

    <br><br><br><br> <br><br> <br>
    <h1 class="heading"> <span>Destaques</span> </h1> <br>

    <div class="ag-format-container">
      <div class="ag-courses_box">
        <div class="ag-courses_item">
          <a href="../funcoes/clima/index.html" class="ag-courses-item_link">
            <div class="ag-courses-item_bg"></div>

            <div class="ag-courses-item_title">
              Clima
            </div>

            <div class="ag-courses-item_date-box">
              Start:
              <span class="ag-courses-item_date">
                18.03.24
              </span>
            </div>
          </a>
        </div>

        <div class="ag-courses_item">
          <a href="../wiki/focus_coins.html" class="ag-courses-item_link">
            <div class="ag-courses-item_bg"></div>

            <div class="ag-courses-item_title">
              API própria
            </div>

            <div class="ag-courses-item_date-box">
              Start:
              <span class="ag-courses-item_date">
                01.02.24
              </span>
            </div>
          </a>
        </div>

        <div class="ag-courses_item">
          <a href="#" class="ag-courses-item_link">
            <div class="ag-courses-item_bg"></div>

            <div class="ag-courses-item_title">
              Lojas Parceiras
            </div>

            <div class="ag-courses-item_date-box">
              Start:
              <span class="ag-courses-item_date">
                09.02.24
              </span>
            </div>
          </a>
        </div>

        <div class="ag-courses_item">
          <a href="https://discord.gg/JMPhUXUCrM" class="ag-courses-item_link">
            <div class="ag-courses-item_bg"></div>

            <div class="ag-courses-item_title">
              Avaliador Físico
            </div>

            <div class="ag-courses-item_date-box">
              Start:
              <span class="ag-courses-item_date">
                01.01.24
              </span>
            </div>
          </a>
        </div>

        <div class="ag-courses_item">
          <a href="https://forms.gle/GnBkAjXHrBK7mnRU8" class="ag-courses-item_link">
            <div class="ag-courses-item_bg"></div>

            <div class="ag-courses-item_title">
              Se tornar STAFF?
            </div>

            <div class="ag-courses-item_date-box">
              Start:
              <span class="ag-courses-item_date">
                07.05.24
              </span>
            </div>
          </a>
        </div>

        <div class="ag-courses_item">
          <a href="https://discord.gg/JMPhUXUCrM" class="ag-courses-item_link">
            <div class="ag-courses-item_bg"></div>

            <div class="ag-courses-item_title">
              Discord
            </div>
            <div class="ag-courses-item_date-box">
              Start:
              <span class="ag-courses-item_date">
                04.05.24
              </span>
            </div>
          </a>
        </div>



      </div>
    </div>

  </main>

  <br><br><br><br><br><br><br><br><br><br>
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
        <p> <i class="fas fa-envelope"></i> focusfit.tcc@gmail.com </p>
        <p> <i class="fas fa-map"></i> São Paulo, Brasil</p>
        <div class="share">
          <a href="https://www.instagram.com/focusfit.tcc/" class="fab fa-instagram"></a>
          <a href="https://twitter.com/FocusFit184204" class="fab fa-twitter"></a>
          <a href="https://br.pinterest.com/focusfittcc/" class="fab fa-pinterest"></a>
          <a href="https://discord.gg/C84gVqG7wF" class="fab fa-discord"></a>

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
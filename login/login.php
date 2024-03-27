<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagex/png" class="imagex"  href="../img/logos/pag.png">
    <script src="https://kit.fontawesome.com/324b71f187.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@300;400;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/colors.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/login-container.css">
    <link rel="stylesheet" href="./css/form-container.css">
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="./css/form-title.css">
    <link rel="stylesheet" href="./css/form-social.css">
    <link rel="stylesheet" href="./css/social-icon.css">
    <link rel="stylesheet" href="./css/form-input-container.css">
    <link rel="stylesheet" href="./css/form-input.css">
    <link rel="stylesheet" href="./css/form-button.css">
    <link rel="stylesheet" href="./css/overlay-container.css">
    <link rel="stylesheet" href="./css/overlay.css">
    <link rel="stylesheet" href="./css/mobile-text.css">

    <script src="./js/login.js" defer></script>
    <title>Login | FOCUSFIT </title>
</head>

<body>
    <main>
        <div class="login-container" id="login-container">
            <div class="form-container">
            <form class="form form-login" method="post" action="crud_bd/login.php">
                    <h2 class="form-title">Entrar com</h2>
                    <div class="form-social">
                     
                        <a href="#" class="social-icon">
                        <i class="fa-solid fa-hammer"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                       
                    </div>
                    <p class="form-text">ou utilize sua conta</p>
                    <div class="form-input-container">
                    <input type="email" class="form-input" name="email" placeholder="Email" required>
                <input type="password" class="form-input" name="senha" placeholder="Senha" required>
                    </div>
                    <a href="#" class="form-link">Esqueceu a senha?</a> 
                    <a   style="font-size: 13px; margin-top: -5px;" href="#" class="form-link">É um staff?</a> 
                    <button type="submit" class="form-button">Logar</button>
                    <p class="mobile-text">
                        Não tem conta?
                        <a href="#" id="open-register-mobile">Registre-se</a>
                    </p>
                </form>
                <form class="form form-register" method="post" action="crud_bd/cadastro.php">
                    <h2 class="form-title">Criar Conta</h2>
                    <div class="form-social">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <p class="form-text">ou cadastre seu email</p>
                    <div class="form-input-container">
                        <input type="username" class="form-input" placeholder="Nome" name="nome">
                        <input type="email" class="form-input" placeholder="Email" name="email">
                        <input type="password" class="form-input" placeholder="Senha" name="senha">
                    </div>
                    <button type="submit" class="form-button">Cadastrar</button>
                    <p class="mobile-text">
                        Já tem conta?
                        <a href="#" id="open-login-mobile">Login</a>
                    </p>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <h2 class="form-title form-title-light">Já tem conta?</h2>
                    <p class="form-text">Para entrar na nossa plataforma faça login com suas informações</p>
                    <button class="form-button form-button-light" id="open-login">Entrar</button>
                </div>
                <div class="overlay">
                    <h2 class="form-title form-title-light">Olá Aluno!</h2>
                    <p class="form-text">Cadastre-se e comece a usar a nossa plataforma on-line</p>
                    <button class="form-button form-button-light" id="open-register">Cadastrar</button>
                </div>
            </div>
        </div>
    </main>
</body>

<script src="https://kit.fontawesome.com/f0c76a2bf3.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
</html>

<?php
include "../utils/conexao.php"
    ?>
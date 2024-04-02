<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='style/main.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" type="imagex/png" class="imagex" href="../img/logos/pag.png">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <title>COMPRA | FOCUSFIT</title>
</head>

<body>
    <h1 class="heading"> <span>Planos</span> </h1>
    <section id="pricing" class="pricing">
        <div class="information">
            <span>Plano de Preços</span>
            <h3>Plano de preços acessível para você</h3>
            <p>Plano grátis (já incluso com a criação da conta)</p>
            <p> <i class="fas fa-check"></i>Musculação geral</p>
            <p> <i class="fas fa-check"></i>Treino para homens</p>
            <p> <i class="fas fa-check"></i>Treino para mulheres</p>
            <p> <i class="fas fa-check"></i>Exercícios Cardiovasculares</p>

        </div>

        <div class="plan basic">
            <h3>Plano Básico</h3>
            <div class="price"><span>R$</span>90<span>/mês</span></div>
            <div class="list">
                <p> <i class="fas fa-check" style="color: #ffe600; font-size: 23px;"></i>Plano grátis</p>

                <p> <i class="fas fa-check"></i> Tabela nutricional</p>
                <p> <i class="fas fa-check"></i>IA auxiliadora</p>
                <p> <i class="fas fa-check"></i>Treino em casa</p>
            </div>
            <a href="#" class="btn" id="comprarPlano">Comprar</a>
        </div>

        <div class="plan">
            <h3>Plano Premium</h3>
            <div class="price"><span>R$</span>110<span>/mês</span></div>
            <div class="list">
                <p> <i class="fas fa-check" style="color: #ffe600;  font-size: 23px;"></i>Plano Básico</p>
                <p> <i class="fas fa-check"></i>Dietas</p>
                <p> <i class="fas fa-check"></i>Academias próximas</p>
                <p> <i class="fas fa-check"></i>Conteúdo antecipado</p>
                <p> <i class="fas fa-check"></i>Nutricionistas parceiros</p>
                <p> <i class="fas fa-check"></i>Suplementação possível</p>
            </div>
            <a href="#" class="btn" id="comprarPlano">Comprar</a>
        </div>
    </section>

    <?php
    // Verifique se o e-mail está vazio ou nulo
    
    // Use JavaScript para adicionar um evento de clique ao botão de compra do plano
    echo "
            <script>
            document.getElementById('comprarPlano').addEventListener('click', function() {
                var email = prompt('Insira o seu e-mail para comprar o plano');
                if (email !== null && email !== '') {
                    // Redirecionar para a página de processamento da compra com o e-mail fornecido como parâmetro na URL
                    window.location.href = 'processar_compra.php?email=' + encodeURIComponent(email);
                }
            });

            </script>

           
";
    ?>


</body>

</html>
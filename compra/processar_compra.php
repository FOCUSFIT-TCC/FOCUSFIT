<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='style/main.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" type="imagex/png" class="imagex" href="../img/logos/pag.png">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <title>FINALIZAR COMPRA | FOCUSFIT</title>
</head>
<body>





<div class="container">
  <form action="ecner.php" method="post">
    <div class="row">
      <h4>Conta</h4>
      <div class="input-group input-group-icon">
        <input type="text" name="id" placeholder="ID"/>
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="password" placeholder="Senha"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
    </div>
    <div class="row">
      <div class="col-half">
        <h4>Data de Nascimento</h4>
        <div class="input-group">
          <div class="col-third">
            <input type="text" placeholder="DD"/>
          </div>
          <div class="col-third">
            <input type="text" placeholder="MM"/>
          </div>
          <div class="col-third">
            <input type="text" placeholder="YYYY"/>
          </div>
        </div>
      </div>
      <div class="col-half">
        <h4>Gênero</h4>
        <div class="input-group">
          <input id="gender-male" type="radio" name="gender" value="male"/>
          
          <label for="gender-male">Homem</label>
          <input id="gender-female" type="radio" name="gender" value="female"/>
          <label for="gender-female">Mulher</label>
        </div>
      </div>
    </div>
    <div class="row">
      <h4>Método de Pagamento</h4>
      <div class="input-group">
        <input id="payment-method-card" type="radio" name="payment-method" value="card" checked="true"/>
        <label for="payment-method-card"><span><i class="fa fa-cc-visa"></i>Cartão de Crédito</span></label>
        <input id="payment-method-paypal" type="radio" name="payment-method" value="paypal"/>
        <label for="payment-method-paypal"> <span><i class="fa fa-cc-paypal"></i>Paypal</span></label>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Número do cartão"/>
        <div class="input-icon"><i class="fa fa-credit-card"></i></div>
      </div>
      <div class="col-half">
        <div class="input-group input-group-icon">
          <input type="text" placeholder="CVV"/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
      </div>
      <div class="col-half">
        <div class="input-group">
          <select>
            <option>Janeiro - Junho</option>
            <option> Julho - Dezembro</option>
          </select>
          <select>
            <option>2020 - 2022</option>
            <option>2022 - 2026</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <h4>Termos e condições</h4>
      <div class="input-group">
        <input id="terms" type="checkbox"/>
        <label for="terms">Aceito os termos e condições de adesão a este serviço e confirmo que li a política de privacidade.</label>
      </div>
    </div>
    <center>
    <button type="submit" class="noselect"><span class='text'>Finalizar</span><span class="icon"><i style="font-size: 14px; color: white;" class="fa-solid fa-arrow-right"></i></button>
    </center>
 
  </form>
</div>
<script src="https://kit.fontawesome.com/f0c76a2bf3.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
</body>
</html>

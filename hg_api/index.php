<?php

require_once 'app/config/config.php';
require_once 'app/modules/hg_api.php';

$hg = new hg_api(HG_API_KEY);
$dollar = $hg->requestDollar();
$euro  = $hg->requestEuro();
$bitcoin = $hg->requestBitcoin();

if($hg->getErro() == false){
    $dollarVariation = ($dollar['variation'] < 0 ? 'danger' : 'primary');
}

if($hg->getErro() == false){
  $euroVariation = ($euro['variation'] < 0 ? 'danger' : 'primary');
}

if($hg->getErro() == false){
  $bitcoinVariation = ($bitcoin['variation'] < 0 ? 'danger' : 'primary');
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center py-4">Cotação de moedas</h1>
            </div>
        </div>
        <div class="row">

          <div class="col-4 py-4 border">
            <h3>Cotação do dólar: </h3>
                  <?php if($hg->getErro() == false): ?>
                  <p class="my-4">USD: <span class="badge badge-pill badge-<?php echo($dollarVariation); ?>"><?php echo $dollar['buy'] ?></span></p>
                  <?php else: ?>
                  <p class="my-4"><span class="badge badge-pill badge-danger">Serviço Indisponível</span></p>
                  <?php endif; ?>
          </div>

          <div class="col-4 py-4 border">
            <h3>Cotação do Euro: </h3>
                  <?php if($hg->getErro() == false): ?>
                  <p class="my-4">EUR: <span class="badge badge-pill badge-<?php echo($euroVariation); ?>"><?php echo $euro['buy'] ?></span></p>
                  <?php else: ?>
                  <p class="my-4"><span class="badge badge-pill badge-danger">Serviço Indisponível</span></p>
                  <?php endif; ?>
          </div>

          <div class="col-4 py-4 border">
            <h3>Cotação do Bitcoin: </h3>
                  <?php if($hg->getErro() == false): ?>
                  <p class="my-4">BitCoin: <span class="badge badge-pill badge-<?php echo($bitcoinVariation); ?>"><?php echo $bitcoin['buy'] ?></span></p>
                  <?php else: ?>
                  <p class="my-4"><span class="badge badge-pill badge-danger">Serviço Indisponível</span></p>
                  <?php endif; ?>
          </div>

        </div>
      
        <div class="py-4" style="bottom:0"><p>FONTE: HG BRASIL Finance API</p></div>
        
      </div>
      
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
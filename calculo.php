<?php

if ($_POST) {
  $distancia = $_POST['distancia'];
  $autonomia = $_POST['autonomia'];
  $valorGasolina = 4.80;
  $valorAlcool = 3.80;
  $valorDiesel = 3.90;
  $mensagem = "";
  if  (is_numeric($autonomia) && is_numeric($distancia)){
    if (($distancia>0) && ($autonomia >0)) {
      $consumoGasolina = ($distancia/$autonomia) * $valorGasolina;
      $consumoGasolina = number_format($consumoGasolina,2,',','.');
      $consumoAlcool = ($distancia/$autonomia) * $valorAlcool;
      $consumoAlcool = number_format($consumoAlcool,2,',','.');
      $consumoDiesel = ($distancia/$autonomia) * $valorDiesel;
      $consumoDiesel = number_format($consumoDiesel,2,',','.');

      $mensagem.="<div class='sucesso'>";
      $mensagem.="Total Gasto:";
      $mensagem.="<ul>";
      $mensagem.="<li><b>Gasolina:</b> R$".$consumoGasolina."</li>";
      $mensagem.="<li><b>Alcool:</b> R$".$consumoAlcool."</li>";
      $mensagem.="<li><b>Diesel:</b> R$".$consumoDiesel. "</li>";
      $mensagem.="</ul>";
      $mensagem.="</div>";        
      } else {
        $mensagem.= "<div class='error'>";
        $mensagem.= "<b>O Valor Recebido deve ser maior que Zero!";
        $mensagem.= "</div>";
      }
  } else {
    $mensagem.= "<div class='error'>";
    $mensagem.= "<b>O Valor Recebido deve conter somente números!";
    $mensagem.= "</div>";      
  }
} else {
    $mensagem.= "<div class='error'>";
    $mensagem.= "<b>Nenhum Dado Foi recebido pelo Formulário!";
    $mensagem.= "</div>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cálculo De Consumo</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <main>
    <div class="painel">
      <h2>Resultado</h2>
        <div class="conteudo-painel">
          <?php
            echo $mensagem;
          ?>
          <a class ="botao" href="index.php">Voltar</a>
        </div>  
    </div>  
  </main>
</body>
</html>
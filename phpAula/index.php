<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
  </head>
  <body>


    <?php
    
      function somar($v1, $v2, $v3){
        
        $soma = $v1 + $v2 + $v3;

        return $soma;
      }

      echo somar(4, 7, 9);

    ?>

    <?php
    
      $nome = "Stuart";
      echo "<h1>$nome</h1>";
    
    ?>

    <?php
    
    $nome = "stuart";
    $num =  15;
    
    var_dump($num);
    ?>



    <script src="script.js"></script>
  </body>
</html>

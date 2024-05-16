<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>

        <h1>Positivo, negativo ou igual a zero</h1>
        <form action="" method="GET">
            <input type="text" name="num1" id="" placeholder="Primeiro Numero">
            <button type="submit">Enviar</button>
        </form>

        <?php
        
            if(isset($_GET['num1']) > 0){
                echo "<br>Positivo";
            }
            elseif(isset($_GET['num1']) < 0){
                echo "<br>Negativo";
            }
            else{
                echo "<br>O numero é";
            }
        
        ?>
    </body>
</html>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>

        <h1>Arrays</h1>

        <?php

            //primeira fora de cria um array
            $cursos = array ("maquiagem", "java", "php");
            echo "Array cursos com o tipo de variavel: ";
            var_dump($cursos);//chama o array e fala o tipo da variavel


            echo "<br><br>";

            //segunda forma de criar um array
            $carros = ["HB20", "Fiesta", "Hylux"];
            echo "Array carros com o tipo de variavel: ";
            var_dump($carros);

            echo "<br><br>";

            //conta os elementos do array e imprime na tela
            echo "Quantidade de valores no array cursos: ".count($cursos);
            echo "<br><br>";
            echo "Quantidade de valores no array carros: ".count($carros);

        ?>

        <hr>
        <h1>for</h1>

        <?php

            for($i=0; $i <=10; $i++){
                echo "$i <br>";
            }
        ?>


        <hr>
        <h1>foreach</h1>

        <?php

        $calendario = ["janeiro", "fevereiro", "março"];
        
        foreach($calendario as $mes){
            //foreach percorre uma lista até o fim e para cada valor ele armazena na variavel mes
            echo "$mes <br>";

        }

        echo "<hr>";

        for($x=0; $x < count($calendario); $x++){
            echo "$calendario[$x] <br>";
        }

        // echo "Segunda posição do array é: $calendario[1]<br>";

        // echo "Com esse codigo eu troco a terceira posição de março para dezembro => ", $calendario[2]="Dezembro";
        
        ?>
    </body>

</html>
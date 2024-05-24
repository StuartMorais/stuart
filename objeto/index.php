<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>


    <!-- criação de objetos -->
        <?php
        
            class carro{
                public $marca;
                public $modelo;
                public $cor;

                public function __construct($marca, $modelo, $cor){
                    $this->marca = $marca;
                    $this->modelo = $modelo;
                    $this->cor = $cor;
                }

                public function mensagem()
                {
                    echo "o carro é $this->marca e a cor é $this->cor";                    
                }
            }

            $carro1 = new carro("nissan", "GTR", "preto");

            echo $carro1->mensagem();
            echo " o modelo é ",$carro1->modelo;

        ?>

    </body>

</html>
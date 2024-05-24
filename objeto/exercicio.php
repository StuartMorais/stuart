<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
        class livro{
            public $titulo;
            public $autor;
            public $ano;
            public $paginas;

            public function __construct($titulo,$autor,$ano,$paginas)
            {
                $this->titulo = $titulo;
                $this->autor = $autor;
                $this->ano = $ano;
                $this->paginas = $paginas;
            }

            public function mensagem(){
                echo $this-> titulo;
            }
        }

        $livro1 = new livro ("Viagens","Stuart", "2024", "46");

        echo "<h1>", $livro1->mensagem(), "</h1>";
        
        echo "O mais novo lançamento do escritor $livro1->autor é o o tão esperado $livro1->titulo quer será lançado ainda em $livro1->ano com $livro1->paginas paginas";
    
    ?>
</body>
</html>
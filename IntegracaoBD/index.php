<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <?php
        require('server.php');

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $titulo = $_GET['titulo'];
            $autor = $_GET['autor'];
            $ano = $_GET['ano'];
            $paginas = $_GET['paginas'];

            $sql = $pdo -> prepare("INSERT INTO livro VALUES (null, '$titulo','$ano',  '$paginas', '$autor');");
            $sql -> execute();

        }

    // $sql = $pdo -> prepare("INSERT INTO livro VALUES (NULL,'Viagens','2000-11-11',15,'Stuart')");
    // $sql -> execute();
    
        // class livro{
        //     public $titulo;
        //     public $autor;
        //     public $ano;
        //     public $paginas;

        //     public function __construct($titulo,$autor,$ano,$paginas)
        //     {
        //         $this->titulo = $titulo;
        //         $this->autor = $autor;
        //         $this->ano = $ano;
        //         $this->paginas = $paginas;
        //     }

        //     public function mensagem(){
        //         echo $this-> titulo;
        //     }
        // }
    
    ?>

    <form action="" method="POST">

        <label for="titulo">Titulo</label><br>
        <input type="text" name="titulo" id="titulo"><br><br>

        <label for="autor">Autor</label><br>
        <input type="text" name="autor" id="autor"><br><br>

        <label for="ano">Ano de criação</label><br>
        <input type="date" name="ano" id="ano"><br><br>

        <label for="paginas">Quantidade de paginas</label><br>
        <input type="text" name="paginas" id="paginas"><br><br>

        
        <button type="submit"> enviar </button>

    </form>
</body>
</html>
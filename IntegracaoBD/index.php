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

            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $ano = $_POST['ano'];
            $paginas = $_POST['paginas'];

            $sql = $pdo -> prepare("INSERT INTO livro VALUES (null, ?, ?, ?, ?);");
            $sql -> execute(array($titulo, $ano, $paginas, $autor));

            header("location:vlw.php");
        }
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
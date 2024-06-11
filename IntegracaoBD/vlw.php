<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <?php require('server.php'); ?>

    <?php

        $sql = $pdo->prepare("SELECT * FROM livro;");
        $sql->execute();

        $dados = $sql->fetchAll();

    ?>

    <table class="table table-hover table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Ano</th>
                <th scope="col">Paginas</th>
                <th scope="col">Autor</th>
            </tr>
        </thead>
        <tbody>

                <?php
                
                    foreach($dados as $chave){

                            //tem que fazer echo junto com o tr se não a table aquebra
                        echo "
                            <tr>
                            
                                <th scope='row'>$chave[id_livro]</th>
                                <td>$chave[titulo]</td>
                                <td>$chave[ano_cri]</td>
                                <td>$chave[qtd_paginas]</td>
                                <td>$chave[autor]</td>
                            
                            </tr>";

                    }
                
                ?>
                
        </tbody>
    </table>

</body>

</html>
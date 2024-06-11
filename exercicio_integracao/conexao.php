<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "escola";

    $pdo = new PDO("mysql:host=$servidor; dbname=$banco", $usuario, $senha);

?>
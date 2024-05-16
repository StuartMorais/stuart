<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

    <body>

        <form action="" method="POST">

            <input type="text" name="login" placeholder="Login">
            <input type="password" name="senha" placeholder="Senha">
            <button type="submit">Logar</button>

        </form>

        <?php
        
            if(isset($_POST['senha']) == "123" && isset($_POST['login'])=="stuart"){
                echo "senha correta";
            }

        ?>


    </body>

</html>
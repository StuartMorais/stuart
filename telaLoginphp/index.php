<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/bootstrap.min.css"> 
    <title>Document</title>
</head>
    <body>
        <div class="loginDiv">
            <form action="" method="POST">
                <input type="text" name="login" id="loginId" placeholder="Login"><br>
                <input type="password" name="senha" id="senhaId" placeholder="Senha"><br>

                <button type="submit" style="margin-top: 5px;">Login</button>
            </form>

            <?php

                if(isset($_POST['login']) == 'bruh' && isset($_POST['senha'])== '123'){
                    echo 'senha correta';
                }elseif(isset($_POST['login']) != 'bruh' && isset($_POST['senha'])!= '123'){
                    echo 'senha errada';
                }

            ?>
        </div>
    </body>
</html>
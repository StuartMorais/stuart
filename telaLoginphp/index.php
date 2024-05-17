<!DOCTYPE html>
<html lang="pt-br">
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
        
                if(isset($_POST['login'])== "stuart" && isset($_POST['senha']) == "123"){
                    header("location:home.php");
                }

            ?>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <!-- input email -->
            <input type="email" name="email" class="form-control <?php if(isset($errorEmail)){if($errorEmail != "nenhum"){echo "is-invalid";}} ?>" id="exampleFormControlInput1" placeholder="name@example.com">

            <!-- Validação -->
            <div class="invalid-feedback">
                <?php
                
                    if(isset($errorEmail)){
                        if($errorEmail != "nenhum"){
                            echo $errorEmail;
                        }
                    }
                
                ?>
            </div>

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">senha</label>
            <!-- input senha -->
            <input type="password" name="senha" class="form-control <?php if(isset($errorSenha)){if($errorSenha != "nenhum"){echo "is-invalid";}} ?>" id="exampleFormControlInput1">

            <!-- Validação -->
            <div class="invalid-feedback">
                <?php
                    
                    if(isset($errorSenha)){
                        if($errorSenha != "nenhum"){
                            echo $errorSenha;
                        }
                    }
                
                ?>
            </div>

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Repita a senha</label>
            <!-- input repetir senha -->
            <input type="password" name="reSenha" class="form-control <?php if(isset($errorReSenha)){if($errorReSenha != "nenhum"){echo "is-invalid";}} ?>" id="exampleFormControlInput1">

            <!-- Validação -->
            <div class="invalid-feedback">
                <?php
                    
                    if(isset($errorReSenha)){
                        if($errorReSenha != "nenhum"){
                            echo $errorReSenha;
                        }
                    }
                
                ?>
            </div>

        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Primeiro nome</span>

            <input type="text" id="cidade" name="primeiroNome" class="form-control <?php if(isset($erropNome)){if($erropNome != "nenhum"){echo "is-invalid";}} ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="margin-right: 5px;">

            <!-- Validação -->
            <div class="invalid-feedback">
                <?php

                    if(isset($erropNome)){
                        if($erropNome != "nenhum"){
                            echo $erropNome;
                        }
                    }
                
                ?>
            </div>

            <span class="input-group-text">Sobrenome</span>
            <input type="text" id="sobrenome" name="sobreNome" class="form-control <?php if(isset($errosNome)){if($errosNome != "nenhum"){echo "is-invalid";}} ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">

            <!-- Validação -->
            <div class="invalid-feedback">
                <?php

                    if(isset($errosNome)){
                        if($errosNome != "nenhum"){
                            echo $errosNome;
                        }
                    }
                
                ?>
            </div>

        </div>
        <div class="form-floating mb-3">

            <textarea class="form-control <?php if(isset($errorExp)){if($errorExp != "nenhum"){echo "is-invalid";}} ?>" name="exp" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Descreva suas experiencias</label>
            <!-- Validação -->
            <div class="invalid-feedback">
                <?php

                    if(isset($errorExp)){
                        if($errorExp != "nenhum"){
                            echo $errorExp;
                        }
                    }
                
                ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $reSenha = $_POST['reSenha'];
            $pNome = $_POST['primeiroNome'];
            $sNome = $_POST['sobreNome'];
            $exp = $_POST['exp'];

            //verificador do email
            if(empty($email)){
                $errorEmail = "por favor, informe o email";
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errorEmail = "Invalid email format";
                } else {
                    $errorEmail = 'nenhum';
                }
            }

            //verificador da senha
            if(empty($senha)){
                $errorSenha = "por favor, informe senha";
            }else{
                if(strlen($senha)<6){
                    $errorSenha = "Senha tem que ter mais que 6 characteres";
                }else{
                    $errorSenha = "nenhum";
                }
            }

            //verificador do repetir senha
            if(empty($reSenha)){
                $errorReSenha = "por favor, informe senha";
            }else{
                if($reSenha != $senha){
                    $errorReSenha = "Senhas diferentes";
                }else{
                    $errorReSenha = "nenhum";
                }
            }

            //verificador do nome
            if (empty($pNome)) {
                $erropNome = "por favor, informe nome";
            } else {
                if (!preg_match("/^[a-zA-Z-' ]*$/",$pNome)) {
                    $erropNome = "Only letters and white space allowed";
                }else{
                    $erropNome = "nenhum";
                }
                
            }

            //verificador do sobrenome
            if (!preg_match("/^[a-zA-Z-' ]*$/",$sNome)) {
                $errosNome = "Only letters and white space allowed";
            } else {
                if (!preg_match("/^[a-zA-Z-' ]*$/",$sNome)) {
                    $errosNome = "Only letters and white space allowed";
                } else{
                    $errosNome = "nenhum";
                }
            }

            //verificador do txt
            if(empty($exp)){
                $errorExp = "Por favor, escreva algo";
            } else {
                $errorExp = "nenhum";
            }

            if($errorEmail == "nenhum" && $errorSenha == "nenhum" && $errorReSenha = "nenhum" && $erropNome == "nenhum" && $errosNome == "nenhum" && $errorExp = "nenhum"){
                header("location:obrigado.php");
            }
        }

    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
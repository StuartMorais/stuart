<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" rel="stylesheet" >
      <link rel="stylesheet" href="style.css">
      <title>Document</title>
  </head>
  <body>

    <?php 
    
    
      require('conexao.php');


      
    
      if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        
        $sql = $pdo->prepare("SELECT * FROM formulario WHERE email_aluno = ? AND senha = ?");
        $sql->execute([$email, $senha]);

        $dados = $sql->fetch();
    
        if($dados && $dados['email_aluno'] == $email && $dados['senha'] == $senha){
          header('location:vlw.php');
        } else {
          echo "senha errada";
        }

      }
  
    ?>


  <div class="wrapper fadeInDown">

    <div class="content-login">

        <h2 class="active"> Login </h2>

        <form class="box-login" method="post" action="#">
          <input type="email" id="email" class="campo" name="email" placeholder="E-mail">
          <input type="text" id="password" class="campo" name="senha" placeholder="Senha">
          <input type="submit" class="botao" value="Entrar">
        </form>


        <div class="box-lembrar-senha">  
          <a class="link" href="#">Lembrar Senha ?</a>
        </div>

    </div>

  </div>
  </body>
</html>
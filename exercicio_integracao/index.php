<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" rel="stylesheet" >
    
</head>
<body>
<?php
    require('conexao.php');

    


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome =  $_POST['nome'];
        $email = $_POST['email'];
        $senha =  md5($_POST['senha']);
        $endereco =  $_POST['endereco'];
        $cidade =  $_POST['cidade'];
        $estado =  $_POST['estado'];
        $cep =  $_POST['cep'];


        $sql = $pdo -> prepare("INSERT INTO formulario VALUES (null, ?, ?, ?, ?, ?, ?, ?);");
        $sql -> execute(array ($nome, $email, $senha, $endereco, $cidade, $estado, $cep));

        if(empty($nome)){
            $erroNome = "Por favor, informe um nome";
        } else {
            if (!preg_match("/^[a-zA-Z-' ]*$/",$nome)) {
                $erroNome = "Apenas letras";
            }
            else{
            $erroNome = "Nenhum";
            }
        }

        if(empty($email)){
            $erroEmail = "Por favor, informe um email";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erroEmail = "Por favor, informe um email válido";
            }else{
                $erroEmail = "Nenhum";
            }
        }

        if(empty($senha)){
            $erroSenha = "Por favor, informe uma senha";
        } else {
            if (strlen($senha) < 6) {
                $erroSenha = "Por favor, informe uma senha de pelo menos 6 digitos";
            }else{
                $erroSenha = "Nenhum";
            }
        }

        if(empty($repeteSenha)){
            $erroRepeteSenha = "Por favor, repetir a senha";
        } else {
            if ($repeteSenha != $senha) {
                $erroRepeteSenha = "As senhas precisam ser iguais";
            }else{
                $erroRepeteSenha = "Nenhum";
            }
        }

        if($erroEmail == "Nenhum" && $erroSenha == "Nenhum"){
            //header('Location: obrigado.html');
        }
        
        
    }
    ?>
    <div class="container mt-5">
        <h1 style="text-align: center;">Validação de Formulário</h1>
        <form class="row g-3 mb-5 mt-5" action="" method="post" >
            
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" id="inputAddress2" placeholder="Digite seu nome">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email <i class="mdi mdi-information-outline" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Campo obrgatório" ></i></label>
            
            <input type="email" name="email" class="form-control <?php if(isset($erroEmail)){if($erroEmail !== "Nenhum"){echo "is-invalid";}} ?>" id="inputEmail4" required value="<?php if(isset($_POST['email'])) {echo $_POST['email'];}?>">
            <div class="invalid-feedback">
                <?php if(isset($erroEmail)){if($erroEmail !== "Nenhum"){echo $erroEmail;}} ?>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Senha <i class="mdi mdi-information-outline" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Campo obrgatório" ></i></label>
            <input type="password" name="senha" class="form-control" id="inputPassword4" required>
            <div class="invalid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Endereço</label>
            <input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Digite seu endereço">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Cidade</label>
            <input type="text" name="cidade" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Estado</label>
            <select id="inputState" name="estado" class="form-select">
                <option selected disabled>Escolha...</option>
                <option>Paraíba</option>
                <option>Pernambuco</option>
                <option>São Paulo</option>
            <option>Bahia</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputZip" class="form-label">CEP</label>
            <input type="text" name="cep" class="form-control" id="inputZip">
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary"> Enviar <span class="mdi mdi-send"></span></button>
        </div>
</form>

<?php
    $sql = $pdo -> prepare("SELECT * FROM formulario");
    $sql -> execute();
    $dados = $sql -> fetchAll();
?>


<?php
    if(count($dados)>0){
        echo '<table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">senha</th>
            <th scope="col">endereco</th>
            <th scope="col">cidade</th>
            <th scope="col">estado</th>
            <th scope="col">cep</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>';

        foreach($dados as $chave => $valor){
            
            echo "<tbody>
                    <tr>
                        <th>".$valor['id_aluno']."</th>
                        <td>".$valor['nome_aluno']."</td>
                        <td>".$valor['email_aluno']."</td>
                        <td>".$valor['senha']."</td>
                        <td>".$valor['endereco']."</td>
                        <td>".$valor['cidade']."</td>
                        <td>".$valor['estado']."</td>
                        <td>".$valor['cep']."</td>
                        <td><a href='#'>Atualizar</a> | <button type='submit' name='$valor['']'> delete </button></td>
                    </tr>
                </tbody>";
        }
        echo '</table>';             
    }else{
        echo "<p>Nenhum usuário encontrado</p>";
    }

    if(isset($_POST['deletebtn'])){
        $delete_stmt = $pdo->prepare("DELETE FROM formulario WHERE id_aluno = :id");
    }

?>


  



</div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>
</html>
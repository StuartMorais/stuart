<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" rel="stylesheet" >
</head>
<body>
<div class="container mt-5">
    <h1 style="text-align: center;">Formulário de Cadastro</h1>
    <form class="row g-3 mb-5 mt-5" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" id="inputAddress2" placeholder="Digite seu nome" value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : ''; ?>">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email <i class="mdi mdi-information-outline" data-bs-toggle="tooltip" data-bs-placement="top" title="Campo obrigatório" ></i></label>
            <input type="email" name="email" class="form-control <?php echo isset($erroEmail) && $erroEmail !== "Nenhum" ? 'is-invalid' : ''; ?>" id="inputEmail4" required value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
            <div class="invalid-feedback">
                <?php echo isset($erroEmail) && $erroEmail !== "Nenhum" ? $erroEmail : ''; ?>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Senha <i class="mdi mdi-information-outline" data-bs-toggle="tooltip" data-bs-placement="top" title="Campo obrigatório" ></i></label>
            <input type="password" name="senha" class="form-control <?php echo isset($erroSenha) && $erroSenha !== "Nenhum" ? 'is-invalid' : ''; ?>" id="inputPassword4" required>
            <div class="invalid-feedback">
                <?php echo isset($erroSenha) && $erroSenha !== "Nenhum" ? $erroSenha : ''; ?>
            </div>
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Endereço</label>
            <input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Digite seu endereço" value="<?php echo isset($_POST['endereco']) ? $_POST['endereco'] : ''; ?>">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Cidade</label>
            <input type="text" name="cidade" class="form-control" id="inputCity" value="<?php echo isset($_POST['cidade']) ? $_POST['cidade'] : ''; ?>">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Estado</label>
            <select id="inputState" name="estado" class="form-select">
                <option selected disabled>Escolha...</option>
                <option <?php echo isset($_POST['estado']) && $_POST['estado'] == 'Paraíba' ? 'selected' : ''; ?>>Paraíba</option>
                <option <?php echo isset($_POST['estado']) && $_POST['estado'] == 'Pernambuco' ? 'selected' : ''; ?>>Pernambuco</option>
                <option <?php echo isset($_POST['estado']) && $_POST['estado'] == 'São Paulo' ? 'selected' : ''; ?>>São Paulo</option>
                <option <?php echo isset($_POST['estado']) && $_POST['estado'] == 'Bahia' ? 'selected' : ''; ?>>Bahia</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputZip" class="form-label">CEP</label>
            <input type="text" name="cep" class="form-control" id="inputZip" value="<?php echo isset($_POST['cep']) ? $_POST['cep'] : ''; ?>">
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Enviar <span class="mdi mdi-send"></span></button>
        </div>
    </form>

    <?php
    // Include your database connection file
    require('conexao.php');

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $senha = isset($_POST['senha']) ? md5($_POST['senha']) : '';
        $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
        $cep = isset($_POST['cep']) ? $_POST['cep'] : '';

        // Validation logic (modify as per your requirements)
        $erroEmail = '';
        $erroSenha = '';

        if (empty($nome)) {
            $erroNome = "Por favor, informe um nome";
        } else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $nome)) {
                $erroNome = "Apenas letras são permitidas no nome";
            }
        }

        if (empty($email)) {
            $erroEmail = "Por favor, informe um email";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erroEmail = "Por favor, informe um email válido";
            }
        }

        if (empty($senha)) {
            $erroSenha = "Por favor, informe uma senha";
        } else {
            if (strlen($senha) < 6) {
                $erroSenha = "A senha deve ter pelo menos 6 caracteres";
            }
        }

        // If no validation errors, proceed with database insertion
        if (empty($erroEmail) && empty($erroSenha)) {
            try {
                $sql = $pdo->prepare("INSERT INTO formulario (nome_aluno, email_aluno, senha, endereco, cidade, estado, cep) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $sql->execute([$nome, $email, $senha, $endereco, $cidade, $estado, $cep]);

                // Optionally, you can redirect to a success page after insertion
                // header('Location: success.php');
                // exit();
                
                echo "<div class='alert alert-success mt-3' role='alert'>
                        Cadastro realizado com sucesso!
                      </div>";
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger mt-3' role='alert'>
                        Ocorreu um erro ao cadastrar: " . $e->getMessage() . "
                      </div>";
            }
        }
    }

    // Deletamento
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete'])) {
        $id_aluno = $_POST['delete'];

        try {
            $sql = $pdo->prepare("DELETE FROM formulario WHERE id_aluno = ?");
            $sql->execute([$id_aluno]);

            echo "<div class='alert alert-success mt-3' role='alert'>
                    Registro deletado com sucesso!
                  </div>";
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger mt-3' role='alert'>
                    Ocorreu um erro ao deletar o registro: " . $e->getMessage() . "
                  </div>";
        }
    }

    // Fetch and display existing data from database
    $sql = $pdo->prepare("SELECT * FROM formulario");
    $sql->execute();
    $dados = $sql->fetchAll();

    if (count($dados) > 0) {
        echo '<table class="table table-striped table-hover mt-5">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>';

        foreach ($dados as $valor) {
            echo "<tr>
                    <td>" . $valor['id_aluno'] . "</td>
                    <td>" . $valor['nome_aluno'] . "</td>
                    <td>" . $valor['email_aluno'] . "</td>
                    <td>" . $valor['senha'] . "</td>
                    <td>" . $valor['endereco'] . "</td>
                    <td>" . $valor['cidade'] . "</td>
                    <td>" . $valor['estado'] . "</td>
                    <td>" . $valor['cep'] . "</td>
                    <td>
                        <form method='post'>
                            <button type='submit' name='delete' value='" . $valor['id_aluno'] . "' class='btn btn-danger'>Delete</button>
                        </form>
                    </td>
                  </tr>";
        }

        echo '</tbody>
            </table>';
    } else {
        echo "<p class='mt-5'>Nenhum usuário cadastrado ainda.</p>";
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });
</script>
</body>
</html>

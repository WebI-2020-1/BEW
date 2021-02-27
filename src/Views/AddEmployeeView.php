<?php
    class AddEmployeeView{
        //
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de funcionários</title>
    <link rel="stylesheet" href="/public/css/employee.css">
</head>
  <script src="https://unpkg.com/feather-icons"></script>
<body>
    <?php include "components/Sidebar.php" ?>
    <main class="wide">
      <header>
          <i class="menu-toggle" data-feather="menu"></i>
          <h1>CADASTRAR FUNCIONÁRIO</h1>
      </header>
      <div class="content">
        <form action="/adding/employee" method="POST">
            <div class="itemTodo">
              <label name="nome">
                <i data-feather="user" class="icone"></i>Nome
              </label>
              <input type="text" name="nome" class="input">
            </div>
            <div class="item">
              <label name="nivelAcesso">
                <i data-feather="key" class="icone"></i>Nível de Acesso
              </label>
              <select name="nivelAcesso" class="input">
                  <option value="1">1</option>
                  <option value="2">2</option>
              </select>
            </div>
            <div class="item">
              <label for="cpf">
                <i data-feather="file" class="icone"></i>CPF
              </label>
              <input type="text" name="cpf" class="input">
            </div>
            <div class="itemTodo">
              <label for="endereco">
                <i data-feather="map-pin" class="icone"></i>Endereço
              </label>
              <input type="text" name="endereco" class="input">
            </div>
            <div class="item">
              <label for="telefone">
              <i data-feather="phone" class="icone"></i>Telefone
              </label>
              <input type="text" name="telefone" class="input">
            </div>
            <div class="item">
              <label for="dataNascimento">
              <i data-feather="calendar" class="icone"></i>Data de Nascimento
              </label>
              <input type="date" name="dataNascimento" class="input">
            </div>
            <div class="itemTodo">
              <label for="email">
              <i data-feather="mail" class="icone"></i>Email
              </label>
              <input type="text" name="email" class="input">
            </div>
            <div class="item">
              <label for="usuario">
              <i data-feather="user-plus" class="icone"></i>Usuário
              </label>
              <input type="text" name="usuario" class="input">
            </div>
            <div class="item">
              <label for="senha">
              <i data-feather="lock" class="icone"></i>Senha
              </label>
              <input type="text" name="senha" class="input"><br>
            </div>

            <button class="botao btnCancelar item">
              CANCELAR <i data-feather="x" class="btnIcone"></i>
              </button>
            <button type="submit" class="botao btnCadastrar item">
              CADASTRAR <i data-feather="check" class="btnIcone"></i>
            </button>

        </form>
        <h1>
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </h1>
      </div>
    </main>

    <script src="/public/js/global.js"></script>
</body>
</html>

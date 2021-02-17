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
    <link rel="stylesheet" href="../../public/css/employee.css">
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
        <form action="/adding/employee" method="POST" class="formulario">
            <label name="nome">
              <i data-feather="user"></i>Nome
            </label>
            <input type="text" name="nome" class="input">
            <label name="nivelAcesso">
              <i data-feather="key"></i>Nível de Acesso
            </label>
            <select name="nivelAcesso" class="input">
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            <label for="cpf">
              <i data-feather="file"></i>CPF
            </label>
            <input type="text" name="cpf" class="input">
            <label for="endereco">
              <i data-feather="map-pin"></i>Endereço
            </label>
            <input type="text" name="endereco" class="input">
            <label for="telefone">
            <i data-feather="phone"></i>Telefone
            </label>
            <input type="text" name="telefone" class="input">
            <label for="dataNascimento">
            <i data-feather="calendar"></i>Data de Nascimento
            </label>
            <input type="date" name="dataNascimento" class="input">
            <label for="email">
            <i data-feather="mail"></i>Email
            </label>
            <input type="text" name="email" class="input">
            <label for="usuario">
            <i data-feather="user-plus"></i>Usuário
            </label>
            <input type="text" name="usuario" class="input">
            <label for="senha">
            <i data-feather="lock"></i>Senha
            </label>
            <input type="text" name="senha" class="input"><br>
            <button>Cancelar</button>
            <button type="submit">Cadastrar</button>
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

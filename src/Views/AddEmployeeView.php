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
</head>
<body>
    <form action="/adding/employee" method="POST">
        <label name="nome">Nome</label>        
        <input type="text" name="nome" id="nome"><br>
        <label name="nivelAcesso">Nível de Acesso</label>        
        <select name="nivelAcesso" id="nivelAcesso"><br>
            <option value="1">1</option>
            <option value="2">2</option>
        </select><br>
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf"><br>
        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" id="endereco"><br>
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone"><br>
        <label for="dataNascimento">Data de Nascimento</label>
        <input type="date" name="dataNascimento" id="dataNascimento"><br>
        <label for="email">Email</label>
        <input type="text" name="email" id="email"><br>
        <label for="usuario">Usuário</label>
        <input type="text" name="usuario" id="usuario"><br>
        <label for="senha">Senha</label>
        <input type="text" name="senha" id="senha"><br>

        <button type="submit">Cadastrar</button>
    </form>
    <h1>
        <?php 
            echo $_SESSION['message']; 
            unset($_SESSION['message']);
        ?>
    </h1>
</body>
</html>
<?php
    class AddClientView{
        //
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de clientes</title>
</head>
<body>
    <form action="/adding/client" method="POST">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome"><br>
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf"><br>
        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" id="endereco"><br>
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone"><br>
        <label for="dataNascimento">Data de nascimento</label>
        <input type="date" name="dataNascimento" id="dataNascimento"><br>
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
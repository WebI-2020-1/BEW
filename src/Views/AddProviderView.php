<?php
    class AddProviderView{
        //
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            color: #19bf72;
        }
    </style>
</head>
<body>
    <form action="/adding/provider" method="post">
        <label for="nome">Nome</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="cnpj">CNPJ</label><br>
        <input type="text" id="cnpj" name="cnpj"><br>
        <label for="endereco">Endereço</label><br>
        <input type="text" id="endereco" name="endereco"><br>
        <label for="telefone">Telefone</label><br>
        <input type="text" id="telefone" name="telefone"><br>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email"><br>
        <button type="submit">Enviar</button>
        <a href="/provider">Cancelar</a>
    </form>
    <h1>
        <?php 
            echo $_SESSION['message']; 
            unset($_SESSION['message']);
        ?>
    </h1>
</body>
</html>
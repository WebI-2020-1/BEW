<?php
    class AddCategoryView{
        //
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de categoria</title>
</head>
<body>
    <form action="/adding/category" method="POST">
        <label for="nome">Nome da categoria</label>
        <input type="text" name="nome" id="nome" required></br>
        <button type="submit">Entrar</button>
    </form>
    <h1>
    <?php 
        echo $_SESSION['message']; 
        unset($_SESSION['message']);
    ?>
</h1>
</body>
</html>
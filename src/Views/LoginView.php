<?php
    class LoginView{
        
    }
?>
<html lang='pt-BR'>
<head>
  <title> Login de Usuário </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<form method="POST" action="login/log-into">
<label>Login:</label><input type="text" name="login" id="login"><br>
<label>Senha:</label><input type="password" name="password" id="password"><br>
<button type="submit">Entrar</button>
<a href="/register">Cadastre-se</a>
<h1>
    <?php 
        echo $_SESSION['message']; 
        unset($_SESSION['message']);
    ?>
</h1>
</form>
</body>
</html>

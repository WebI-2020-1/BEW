<?php
    class LoginView{
        //
    }
?>
<html>
<head>
<title> Login de Usuário </title>
</head>
<body>
<form method="POST" action="login/log-into">
<label>Login:</label><input type="text" name="login" id="login"><br>
<label>Senha:</label><input type="password" name="senha" id="senha"><br>
<button type="submit">Entrar</button>
<a href="/register">Cadastre-se</a>
</form>
</body>
</html>
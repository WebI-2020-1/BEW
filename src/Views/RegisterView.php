<?php
    class RegisterView{
        //
    }
?>
<html>
<head>
<title> Registro de Usuário </title>
</head>
<body>
<form method="POST" action="/register">
<label>Login:</label><input type="text" name="login" id="login"><br>
<label>Senha:</label><input type="password" name="senha" id="senha"><br>
<label>Confirmar senha:</label><input type="password" name="senhas" id="senhas"><br>
<button type="submit">Cadastrar</button>
<a href="/login">Logue-se</a>
</form>
</body>
</html>
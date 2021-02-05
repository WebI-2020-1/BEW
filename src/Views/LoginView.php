<?php
    class LoginView{

    }
?>
<html lang='pt-BR'>
<head>
  <title> Login de Usuário </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../public/css/login.css">
</head>

<script src="https://unpkg.com/feather-icons"></script>

<body>
  <div class="container">
    <img src="../../public/img/logoAbelha.png" alt="logo da Abelha" id="logo">
    <h1 id="titulo">BEW</h1>
    <form method="POST" action="login/log-into">
      <i data-feather="user"></i><label>Login:</label>
      <input type="text" name="login" id="login" class="blocologin"><br>
      <i data-feather="lock"></i><label>Senha:</label>
      <input type="password" name="password" id="password" class="blocologin"><br>
      <button type="submit" class="blocologin btnEnter">Entrar</button><br>
      <a href="/register">Esqueci minha senha</a> <i data-feather="arrow-right"></i>
      <h1>
          <?php
              echo $_SESSION['message'];
              unset($_SESSION['message']);
          ?>
      </h1>
    </form>
  </div>
</body>

<script>
  feather.replace()
</script>

</html>

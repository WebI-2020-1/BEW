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
    <!-- <img src="../../public/img/logo2.svg" alt="logo da Abelha" id="logo"> -->
    <form method="POST" action="login/log-into" class="formularioLogin">
      <div class="inputContainer">
        <i data-feather="user" class="inputIcon"></i>
        <input type="text" name="login" id="login" placeholder="Usuário" class="input">
      </div>
      <div class="inputContainer">
        <i data-feather="lock" class="inputIcon"></i>
        <input type="password" name="password" id="password" placeholder="Senha" class="input">
      </div>
      <button type="submit" class="input btnEnter">Entrar</button>
      <a href="/register" class="esqueciSenha">Esqueci minha senha <i data-feather="arrow-right" id="iconSenha"></i></a>
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

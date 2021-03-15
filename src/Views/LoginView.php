<?php
    class LoginView{

    }
?>
<html lang='pt-BR'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/login.css">
    <title> Login de Usuário </title>
    <script>
        const host =  '<?php echo $env; ?>';
    </script>
</head>

<script src="https://unpkg.com/feather-icons"></script>

<body>
  <div class="container">
    <img src="../../public/img/logo.svg" alt="logo da Abelha" class="logo">
    <form method="POST" action="login/log-into" class="formularioLogin">
      <div class="inputContainer">
        <i data-feather="user" class="inputIcon"></i>
        <input type="text" name="login" id="login" placeholder="Usuário" class="input">
      </div>
      <div class="inputContainer">
        <i data-feather="lock" class="inputIcon"></i>
        <input type="password" name="password" id="password" placeholder="Senha" class="input">
      </div>
      <button type="submit" class="input">Entrar</button>
      <a href="/register" class="esqueciSenha">Esqueci minha senha <i data-feather="arrow-right"></i></a>
      <div class="modal mensagem disabled">
            <div>
                <button type="button" onclick="location.href=`${host}/login`">
                    <i data-feather="x"></i>
                </button>
                <?php
                if ($_SESSION['message'] != '') {
                    echo "<h3>" . $_SESSION['message'] . "</h3>";
                    unset($_SESSION['message']);
                    echo "<script type='text/javascript'>document.querySelector('.modal.mensagem').classList.toggle('disabled');</script>";
                }
                ?>
            </div>
        </div>
    </form>
  </div>
</body>

<script src="/public/js/global.js"></script>
<script src="/public/js/login.js"></script>

</html>

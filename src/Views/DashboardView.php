<?php
class DashboardView
{
  //
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/css/dashboard.css">
  <script src="/public/js/global.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <title>Dashboard</title>
</head>

<body>
  <?php include "components/sidebar.php" ?>

  <main>
    <i class="menu-toggle disabled" data-feather="menu"></i>
    <div class="content">
      <img class="logo" src="/public/img/logo-branco.svg" alt="logo do BEW">
      <h1>Business Enterprise Webshop</h1>
      <br>
      <div class="shortcuts">
        <button>Efetuar venda</button>
        <button>Efetuar compra</button>
      </div>
    </div>
  </main>

  <script>
    feather.replace();
  </script>
</body>

</html>

<?php
class DashboardView
{
    public function __construct($params)
    {
?>
        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/public/css/dashboard.css">
            <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
            <title>Dashboard</title>
        </head>

        <body>
            <?php include "components/Sidebar.php" ?>
            <main class="wide">
                <header>
                    <i class="menu-toggle" data-feather="menu"></i>
                </header>
                <div class="content">
                    <img class="logo" src="/public/img/logo-branco.svg" alt="logo do BEW">
                    <h1>Business Enterprise Webshop</h1>
                    <br>
                    <div class="shortcuts">
                        <a href="/add/sale">Efetuar venda</a>
                        <a href="/add/purchase">Efetuar compra</a>
                    </div>
                </div>
            </main>
        </body>

        <script src="/public/js/global.js"></script>

        </html>
<?php
    }
}

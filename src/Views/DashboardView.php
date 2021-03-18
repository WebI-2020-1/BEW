<?php
class DashboardView
{
    public function __construct($params){
        $env = parse_ini_file('env.ini')['HOST']; ?>
?>
        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/public/css/dashboard.css">

            <title>Dashboard</title>

            <script>
                const host = '<?php echo $env; ?>';
            </script>
        </head>

        <body>
            <?php include "components/Sidebar.php" ?>
            <main>
                <header>
                    <i class="menu-toggle disabled" data-feather="menu"></i>
                </header>
                <div class="content">
                    <img class="logo" src="/public/img/logo-branco.svg" alt="logo do BEW">
                    <h1>Business Enterprise Webshop</h1>
                    <br>
                    <div class="shortcuts">
                        <button type="button" onclick="location.href=`${host}/add/client`">Adicionar cliente</button>
                        <button type="button" onclick="location.href=`${host}/add/product`">Adicionar produto</button>
                        <button type="button" onclick="location.href=`${host}/add/sale`">Efetuar venda</button>
                        <button type="button" onclick="location.href=`${host}/add/purchase`">Efetuar compra</button>
                    </div>
                </div>
            </main>
        </body>

        <script src="/public/js/global.js"></script>

        </html>
<?php
    }
}

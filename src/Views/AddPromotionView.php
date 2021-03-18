<?php
class AddPromotionView
{
    public function __construct()
    {
        $env = parse_ini_file('env.ini')['HOST']; ?>
        <!DOCTYPE html>
        <html lang="pt-BR">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/public/css/addPromotion.css">
            <title>Cadastro de promoções</title>
            <script>
                const host = '<?php echo $env; ?>';
            </script>
        </head>

        <body>
            <?php include "components/Sidebar.php" ?>
            <main>
                <header>
                    <i class="menu-toggle disabled" data-feather="menu"></i>
                    <h1>CADASTRAR PROMOÇÃO</h1>
                </header>

                <div class="content">
                    <form action="/adding/promotion" method="POST">
                        <div class="conteudo-cadastro">
                            <label for="nome" class="label1">Nome da promoção</label>
                            <input type="text" name="nome" id="nome">
                            <label for="dataInicio" class="label2">Data Inicio</label>
                            <input type="date" name="dataInicio" id="dataInicio">
                            <label for="dataFim" class="label3">Data Fim</label>
                            <input type="date" name="dataFim" id="dataFim">
                        </div>
                        <div class="botoes">
                            <button type="reset" onclick="location.href=`${host}/promotion`">CANCELAR <i data-feather="x"></i></button>
                            <button type="submit" class="submit">CADASTRAR <i data-feather="check"></i></button>
                        </div>
                    </form>
                    <div class="modal mensagem disabled">
                        <div>
                            <button type="button" onclick="location.href=`${host}/promotion`">
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
                </div>
            </main>
            <script src="/public/js/global.js"></script>
        </body>

        </html>
<?php }
}
?>

<?php
class EditCategoryView
{
    public function __construct($params)
    {
        $env = parse_ini_file('env.ini')['HOST']; ?>
        <!DOCTYPE html>
        <html lang="pt-BR">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/public/css/addCategory.css">
            <title>Editar Categoria</title>

            <script>
                const host = '<?php echo $env; ?>';
            </script>
        </head>

        <body>
            <?php include "components/Sidebar.php" ?>
            <main class="wide">
                <header>
                    <i class="menu-toggle" data-feather="menu"></i>
                    <h1>EDITAR CATEGORIA</h1>
                </header>

                <div class="content">
                    <form action="/update/category" method="POST">
                        <div class="conteudo-cadastro">
                            <label for="nome">Nome da categoria</label>
                            <input type="hidden" name="categoryId" value="<?php echo $params['category']['id']; ?>">
                            <input type="text" name="nome" id="nome" value="<?php echo $params['category']['nome']; ?>" required></br>
                        </div>
                        <div class="botoes">
                            <button type="reset" onclick="location.href=`${host}/category`">CANCELAR <i data-feather="x"></i></button>
                            <button type="submit" class="submit">SALVAR <i data-feather="check"></i></button>
                        </div>
                    </form>
                    <div class="modal mensagem disabled">
                        <div>
                            <button type="button" onclick="location.href=`${host}/category`">
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

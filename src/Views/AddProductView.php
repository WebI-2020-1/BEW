<?php
global $categories;
class AddProductView
{
    public function __construct($params)
    {
        $categories = $params['categories'];
        $env = parse_ini_file('env.ini')['HOST'];

?>
        <!DOCTYPE html>
        <html lang="pt-BR">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/public/css/addProduct.css">
            <title>Cadastro de produtos</title>

            <script>
                const host = '<?php echo $env; ?>';
            </script>
        </head>

        <body>
            <?php include "components/Sidebar.php" ?>
            <main>
                <header>
                    <i class="menu-toggle disabled" data-feather="menu"></i>
                    <h1>ADICIONAR PRODUTO</h1>
                </header>

                <div class="content">
                    <form action="/adding/product" method="POST">
                        <div class="conteudo-cadastro">
                            <label for="nome" class="label1">Nome do produto</label>
                            <input type="text" name="nome" id="nome" required>
                            <label for="unidade" class="label2">Unidade</label>
                            <input type="text" name="unidade" id="unidade" required>
                            <label for="valorVenda" class="label3">Valor de venda do produto</label>
                            <input type="number" name="valorVenda" id="valor_venda" required min="0">
                            <label for="codigoBarras" class="label4">Codigo de barras do produto</label>
                            <input type="text" name="codigoBarras" id="codigo_barras" required>
                            <label for="categoria" class="label5">Categoria</label>
                            <select name="categoria" id="categoria" required>
                                <option selected disabled>Selecione uma opção</option>'
                                <?php
                                foreach ($categories as $category) {
                                    echo "<option value='{$category['id']}'>{$category['nome']}</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="botoes">
                            <button type="reset" onclick="location.href=`${host}/product`">CANCELAR <i data-feather="x"></i></button>
                            <button type="submit" class="submit">CADASTRAR <i data-feather="check"></i></button>
                        </div>
                    </form>
                    <div class="modal mensagem disabled">
                        <div>
                            <button type="button" onclick="location.href=`${host}/product`">
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
<?php
    }
}

<?php
class EditPromotionProductView
{
    public function __construct($params)
    {
        $env = parse_ini_file('env.ini')['HOST']; ?>
        <!DOCTYPE html>
        <html lang="pt-BR">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/public/css/addProductPromotion.css">

            <title>Editar relação da promoção</title>
            <script>
                const host = '<?php echo $env; ?>';
            </script>
        </head>

        <body>
            <?php include "components/Sidebar.php" ?>
            <main>
                <header>
                    <i class="menu-toggle disabled" data-feather="menu"></i>
                    <h1>ADICIONAR PRODUTO À UMA PROMOÇÃO</h1>
                </header>

                <div class="content">
                    <form action="/update/promotion-product" method="POST">
                        <div class="conteudo-cadastro">
                            <input type="hidden" name="promotionProductId" value="<?php echo $params['id'] ?>">
                            <label for="nome" class="label1">Promoção</label>
                            <select name="idPromocao" id="idPromocao">
                                <option disabled>Selecione uma promoção</option>
                                <?php foreach ($params['promotions'] as $promotion) { ?>
                                    <option value="<?php echo $promotion['id'] ?>" <?php echo $params['idPromotion'] == $promotion['id'] ? 'selected' : '' ?>><?php echo $promotion['nome'] ?></option>
                                <?php } ?>
                            </select>
                            <label for="dataInicio" class="label2">Produto</label>
                            <select name="idProduto" id="idProduto">
                                <option disabled>Selecione um produto</option>
                                <?php foreach ($params['products'] as $product) { ?>
                                    <option value="<?php echo $product['id'] ?>" <?php echo $params['idProduct'] == $product['id'] ? 'selected' : '' ?>><?php echo $product['nome'] ?></option>
                                <?php } ?>
                            </select>
                            <label for="valorDesconto" class="label3">Valor de desconto</label>
                            <input type="text" name="valorDesconto" value="<?php echo $params['valorDesconto'] ?>" id="valorDesconto">
                        </div>
                        <div class="botoes">
                            <button type="reset" onclick="location.href=`${host}/promotion-product`">CANCELAR <i data-feather="x"></i></button>
                            <button type="submit" class="submit">CADASTRAR <i data-feather="check"></i></button>
                        </div>
                    </form>
                    <div class="modal mensagem disabled">
                        <div>
                            <button type="button" onclick="location.href=`${host}/promotion-product`">
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

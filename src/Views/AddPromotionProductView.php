<?php
    class AddPromotionProductView{
        public function __construct($params){ ?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Relacionar promoção</title>
            </head>
            <body>
            <form action="/adding/promotion-product" method="POST">
                <label for="nome">Promoção</label>
                <select name="idPromocao">
                    <option selected disabled>Selecione uma promoção</option>
                    <?php foreach($params['promotions'] as $promotion){?>
                        <option value="<?php echo $promotion['id'] ?>"><?php echo $promotion['nome'] ?></option>
                    <?php } ?>
                </select></br>
                <label for="dataInicio">Produto</label>
                <select name="idProduto">
                    <option selected disabled>Selecione um produto</option>
                    <?php foreach($params['products'] as $products){?>
                        <option value="<?php echo $products['id'] ?>"><?php echo $products['nome'] ?></option>
                    <?php } ?>
                </select></br>
                <label for="valorDesconto">Valor de desconto</label>
                <input type="text" name="valorDesconto"></br>
                <button type="submit">Cadastrar</button>
            </form>
            <h1>
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
            </h1>
            </body>
            </html>
    <?php }
    }
?>
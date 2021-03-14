<?php
    class EditPromotionProductView{
        public function __construct($params){ ?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Editar relação da promoção</title>
            </head>
            <body>
            <form action="/update/promotion-product" method="POST">
                <input type="hidden" name="promotionProductId" value="<?php echo $params['id'] ?>">
                <label for="nome">Promoção</label>
                <select name="idPromocao">
                    <option disabled>Selecione uma promoção</option>
                    <?php foreach($params['promotions'] as $promotion){?>
                        <option value="<?php echo $promotion['id'] ?>" <?php echo $params['idPromotion'] == $promotion['id'] ? 'selected' : '' ?> ><?php echo $promotion['nome'] ?></option>
                    <?php } ?>
                </select></br>
                <label for="dataInicio">Produto</label>
                <select name="idProduto">
                    <option disabled>Selecione um produto</option>
                    <?php foreach($params['products'] as $product){?>
                        <option value="<?php echo $product['id'] ?>" <?php echo $params['idProduct'] == $product['id'] ? 'selected' : '' ?> ><?php echo $product['nome'] ?></option>
                    <?php } ?>
                </select></br>
                <label for="valorDesconto">Valor de desconto</label>
                <input type="text" name="valorDesconto" value="<?php echo $params['valorDesconto'] ?>"></br>
                <button type="submit">Editar</button>
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
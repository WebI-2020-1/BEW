<?php
    class PromotionProductView{
        public function __construct($params) { ?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Relações das promoções</title>
                <style>
                    *{
                        color:#19bf72;
                    }
                </style>
            </head>
            <body>
                <a href="/add/promotion-product">Adicionar promoção ao produto</a>
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Produto</td>
                            <td>Promoção</td>
                            <td>Valor de desconto</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($params['promotionProducts'] as $promotion){ ?>
                            <tr>
                                <td><?php echo $promotion['id'] ?></td>
                                <td><?php echo $promotion['nomeProduto'] ?></td>
                                <td><?php echo $promotion['nomePromocao'] ?></td>
                                <td><?php echo $promotion['valorDesconto'] ?></td>
                                <td>
                                    <a href="/edit/promotion-product&id=<?php echo $promotion['id'] ?>">Editar</a>
                                    <a href="/delete/promotion-product&id=<?php echo $promotion['id'] ?>">Deletar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
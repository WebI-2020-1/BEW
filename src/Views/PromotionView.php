<?php
    class PromotionView{
        public function __construct($params){  ?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Promoções</title>
                <style>
                    *{
                        color:#19bf72;
                    }
                </style>
            </head>
            <body>
                <a href="/add/promotion">Adicionar promoção</a>
                <a href="/promotion-product">Relacionar promoção</a>
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Data inicio</td>
                            <td>Data fim</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($params['promotions'] as $promotion){ ?>
                            <tr>
                                <td><?php echo $promotion['id'] ?></td>
                                <td><?php echo $promotion['nome'] ?></td>
                                <td><?php echo $promotion['dataInicio'] ?></td>
                                <td><?php echo $promotion['dataFim'] ?></td>
                                <td>
                                    <a href="/edit/promotion&id=<?php echo $promotion['id'] ?>">Editar</a>
                                    <a href="/delete/promotion&id=<?php echo $promotion['id'] ?>">Deletar</a>
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
<?php
    class ProductView{
        public function __construct($params){ ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <style>
                    *{
                        color:#19bf72;
                    }
                </style>
            </head>
            <body>
            <a href="/add/product">Adicionar produtos</a>
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Unidade</td>
                            <td>Quantidade</td>
                            <td>Valor de compra</td>
                            <td>Valor de venda</td>
                            <td>Codigo de barras</td>
                            <td>Ação</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($params['products'] as $product){ ?>
                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td><?php echo $product['nome']; ?></td>
                                <td><?php echo $product['unidade']; ?></td>
                                <td><?php echo $product['quantidade']; ?></td>
                                <td><?php echo $product['valorCompra']; ?></td>
                                <td><?php echo $product['valorVenda']; ?></td>
                                <td><?php echo $product['codigoBarras']; ?></td>
                                <td>Deletar/Editar</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </body>
            </html>
        <?php }
    }
?>
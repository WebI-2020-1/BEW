<?php
    class SaleView{ 
        public function __construct($params){
            $env = parse_ini_file('env.ini')['HOST'];
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Consultar vendas</title>
                <style>
                    body{
                        background-color: #fff !important;
                    }
                    .modal {
                        position: fixed;
                        top: 0;
                        right: 0;
                        bottom: 0;
                        left: 0;
                        font-family: Arial, Helvetica, sans-serif;
                        background: rgba(0, 0, 0, 0.8);
                        z-index: 99999;
                        opacity: 0;
                        -webkit-transition: opacity 400ms ease-in;
                        -moz-transition: opacity 400ms ease-in;
                        transition: opacity 400ms ease-in;
                        pointer-events: none;
                    }

                    .modal:target {
                        opacity: 1;
                        pointer-events: auto;
                    }

                    .modal>div {
                        width: 400px;
                        position: relative;
                        margin: 10% auto;
                        padding: 15px 20px;
                        background: #fff;
                    }

                </style>
                <script>const host =  '<?php echo $env; ?>';</script>
            </head>
            <body>
                <a href="/add/sale">Adicionar venda</a>
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Quantidade de itens</td>
                            <td>Valor</td>
                            <td>Cliente</td>
                            <td>Forma de pagamento</td>
                            <td>Data de venda</td>
                            <td>Ação</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($params['sales'] as $sale) { ?>
                        <tr> 
                            <td><?php echo $sale['idVenda']; ?></td>
                            <td><?php echo $sale['quantidade']; ?></td>
                            <td><?php echo $sale['valor']; ?></td>
                            <td><?php echo $sale['nomeCliente']; ?></td>
                            <td><?php echo $sale['formaPagamento']; ?></td>
                            <td><?php echo $sale['dataVenda']; ?></td>
                            <td><a href="#modal_<?php echo $sale['idVenda']; ?>">Visualizar</a></td>
                        </tr>
                        <div id="modal_<?php echo $sale['idVenda']; ?>" class="modal">
                            <div>
                                <a href="#close" title="close" class="close">x</a>
                                <div id="products_<?php echo $sale['idVenda']; ?>">
                                <span><b>ID da venda:</b><?php echo $sale['idVenda']; ?></span><br>
                                <span><b>Quantidade do produto:</b><?php echo $sale['quantidade']; ?></span><br>
                                <span><b>Valor total:</b><?php echo $sale['valor']; ?></span><br>
                                <span><b>Nome do cliente</b><?php echo $sale['nomeCliente']; ?></span><br>
                                <span><b>Forma de pagamento:</b><?php echo $sale['formaPagamento']; ?></span><br>
                                <span><b>Data da venda:</b><?php echo $sale['dataVenda']; ?></span><br>
                                <h3>Produtos</h3>
                                </div>
                            </div>
                        </div>
                        <script src="/public/js/SaleFunctions.js"></script>
                        <script>
                            mountClients(<?php echo $sale['idVenda']?>);
                        </script>
                    <?php } ?>
                    </tbody>
                </table>
            </body>
            </html>
<?php   }
    } 
?>
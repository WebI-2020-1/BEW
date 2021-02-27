<?php
    class SaleView{
        public function __construct($params){
            $env = parse_ini_file('env.ini')['HOST'];
            ?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Consultar vendas</title>
                <link rel="stylesheet" href="/public/css/sale.css">
                <script>const host =  '<?php echo $env; ?>';</script>
            </head>

            <script src="https://unpkg.com/feather-icons"></script>

            <body>
            <?php include "components/Sidebar.php" ?>
            <main class="wide">
                <header>
                    <i class="menu-toggle" data-feather="menu"></i>
                    <div class="header-conteudo">
                        <h1>CONSULTAR VENDA</h1>
                        <div class="botoesDireito">
                            <a href="/add/sale" class="btnAddVenda">Adicionar venda<i data-feather="plus"></i></a>
                            <form action="" class="pesquisar">
                                <input type="search" name="pesquisar" id="" placeholder="Pesquisar na tabela">
                                <button type="submit"><i data-feather="search"></i></button>
                            </form>
                        </div>
                    </div>
                </header>
                <div class="content">
                    <table class="tabela-vendas">
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
                                    <td><a href="#modal_<?php echo $sale['idVenda']; ?>"><i data-feather="search"></i></a></td>
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
            </div>
        </main>
            </body>

            <script src="/public/js/global.js"></script>

            </html>
            <?php   }
    }
?>

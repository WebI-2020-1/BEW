<?php
class SaleView {
    public function __construct($params) {
        $env = parse_ini_file('env.ini')['HOST'];

        if(empty($env) || !isset($env)){
            $env = getenv('HOST');
        }
?>
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/public/css/sale.css">
            <title>Vendas</title>
            <script>
                const host =  '<?php echo $env; ?>';
            </script>
        </head>
        <body>
        <?php include "components/Sidebar.php" ?>
        <main>
            <header>
                <i class="menu-toggle disabled" data-feather="menu"></i>
                <div class="header-conteudo">
                    <h1>VENDAS</h1>
                    <div class="botoesDireito">
                        <a href="/add/sale" class="btnAdd">Adicionar venda<i data-feather="plus"></i></a>
                        <div class="pesquisar">
                            <input type="text" id="input" name="pesquisar" placeholder="Pesquisar na tabela" onkeyup="filtrarVenda()">
                            <i data-feather="search" class="iconePesquisa"></i>
                        </div>
                    </div>
                </div>
            </header>
            <div class="content">
                <table class="tabela-consulta">
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
                                <td><?php echo date("d/m/Y", strtotime($sale['dataVenda'])); ?></td>
                                <td><button type="button" class="abrir-modal" onclick="consultarVenda(<?php echo $sale['idVenda']; ?>)">
                                    <i data-feather="search"></i></button>
                                </td>
                            </tr>
                            <div class="modal disabled">
                                <div class="venda">
                                    <button type="button" class="fechar-modal">
                                        <i data-feather="x"></i>
                                    </button>
                                    <div class="conteudoVenda"></div>
                                </div>
                            </div> 
                        <?php } ?>
                    </tbody>
                </table>
                <div class="modal mensagem disabled">
                    <div>
                        <button type="button" onclick="location.href=`${host}/sale`">
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
        <script src="/public/js/SaleFunctions.js"></script>

        </body>
    </html>
<?php   }
    }
?>

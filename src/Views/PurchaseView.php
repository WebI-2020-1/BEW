<?php
    class PurchaseView{
        public function __construct($params){
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
                <link rel="stylesheet" href="/public/css/purchase.css">
                <title>Compras</title>
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
                        <h1>COMPRAS</h1>
                        <div class="botoesDireito">
                            <a href="/add/purchase" class="btnAdd">Adicionar compra<i data-feather="plus"></i></a>
                            <div class="pesquisar">
                                <input type="text" id="input" name="pesquisar" placeholder="Pesquise pelo id" onkeyup="filtrarCompra()">
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
                                <td>Valor total</td>
                                <td>Nota Fiscal</td>
                                <td>Fornecedor</td>
                                <td>Data de compra</td>
                                <td>Ação</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($params['purchases'] as $purchase) { ?>
                                <tr>
                                    <td><?php echo $purchase['idCompra']; ?></td>
                                    <td><?php echo $purchase['quantidade']; ?></td>
                                    <td><?php echo 'R$ ' . number_format($purchase['valorTotal'], 2, ',', '.'); ?></td>
                                    <td><?php echo $purchase['notaFiscal']; ?></td>
                                    <td><?php echo $purchase['nomeFornecedor']; ?></td>
                                    <td><?php echo date("d/m/Y", strtotime($purchase['dataCompra'])); ?></td>
                                    <td><button type="button" class="abrir-modal" onclick="consultarCompra(<?php echo $purchase['idCompra']; ?>)">
                                        <i data-feather="search"></i></button>
                                    </td>
                                </tr>
                                <div class="modal disabled">
                                    <div class="compra">
                                        <button type="button" class="fechar-modal">
                                            <i data-feather="x"></i>
                                        </button>
                                        <div class="conteudoCompra"></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="modal mensagem disabled">
                        <div>
                            <button type="button" onclick="location.href=`${host}/purchase`">
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
            <script src="/public/js/PurchaseFunctions.js"></script>
            </body>
        </html>
        <?php }
    }
?>

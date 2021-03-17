<?php
class AddSaleView
{
    public function __construct($params)
    {
        $env = parse_ini_file('env.ini')['HOST'];
        if (empty($env) || !isset($env)) {
            $env = getenv('HOST');
        }
?>
        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/public/css/addSales.css">
            <title>Nova Venda</title>
            <script>
                const host = '<?php echo $env; ?>';
            </script>
        </head>

        <body>
            <?php include "components/Sidebar.php" ?>
            <main>
                <header>
                    <i class="menu-toggle disabled" data-feather="menu"></i>
                    <h1>EFETUAR VENDA</h1>
                </header>

                <div class="content">
                    <form action="/adding/sale" method="POST" id="formSale">

                        <div class="buttons-modal">
                            <button type="button" class="abrir-modal">Adicionar Produto<i data-feather="file-plus"></i></button>
                            <button type="button" class="abrir-modal">Forma de Pagamento<i data-feather="dollar-sign"></i></button>
                            <button type="button" class="abrir-modal">Selecionar Cliente<i data-feather="user"></i></button>
                        </div>


                        <div class="modal produtos disabled">
                            <div>
                                <button type="button" class="fechar-modal">
                                    <i data-feather="x"></i>
                                </button>
                                <label for="product-search">Filtrar<i data-feather="filter"></i></label>
                                <input type="text" name="product-search" placeholder="Digite o nome do produto" onkeyup="filtrarProduto(this.value)">
                                <div class="table">
                                    <table class="lista produtos">
                                        <thead>
                                            <tr class="topo-tabela">
                                                <th colspan="5">PRODUTOS</th>
                                            </tr>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nome</th>
                                                <th>Quantidade</th>
                                                <th>Valor Unitario</th>
                                                <th>Selecionar</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="modal pagamentos disabled">
                            <div>
                                <button type="button" class="fechar-modal">
                                    <i data-feather="x"></i>
                                </button>
                                <div class="table">
                                    <table>
                                        <thead>
                                            <tr class="topo-tabela">
                                                <th colspan="3">FORMAS DE PAGAMENTO</th>
                                            </tr>
                                            <tr>
                                                <th>Código</th>
                                                <th>Tipo</th>
                                                <th>Selecionar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($params['paymentMethods'] as $paymentMethod) {
                                                echo "
                                            <tr>
                                                <td>{$paymentMethod['id']}</td>
                                                <td>{$paymentMethod['descricao']}</td>
                                                <td><button type='button' class='check' onclick='selecionarPagamento({$paymentMethod['id']}, \"{$paymentMethod['descricao']}\")'><i data-feather='arrow-right'></i></button></td>
                                            </tr>
                                            ";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="modal clientes disabled">
                            <div>
                                <button type="button" class="fechar-modal">
                                    <i data-feather="x"></i>
                                </button>
                                <label for="product-search">Filtrar<i data-feather="filter"></i></label>
                                <input type="text" name="customer-search" placeholder="Digite o nome do cliente" onkeyup="filtrarCliente(this.value)">
                                <div class="table">
                                    <table class="lista clientes">
                                        <thead>
                                            <tr class="topo-tabela">
                                                <th colspan="3">CLIENTES</th>
                                            </tr>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nome</th>
                                                <th>Selecionar</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tabela-produtos">
                            <table>
                                <thead>
                                    <tr class="topo-tabela">
                                        <th colspan="6">LISTA DE PRODUTOS</th>
                                    </tr>
                                    <tr>
                                        <th>N° item</th>
                                        <th>Nome</th>
                                        <th>Quantidade</th>
                                        <th>Valor Unitario</th>
                                        <th>Total</th>
                                        <th>Remover</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                        <div class="info">
                            <div class="cliente">
                                <h2>Cliente</h2>
                                <span>
                                    <input name="cliente" required style="opacity: 0; width: 0; pointer-events: none;">
                                </span>
                            </div>

                            <div class="pagamento">
                                <h2>Pagamento</h2>
                                <span><input name="pagamento" required style="opacity: 0; width: 0; pointer-events: none;"></span>
                            </div>

                            <div class="total">
                                <h2>Total</h2>
                                <span>R$ 0.00</span>
                            </div>

                            <div class="btn-sale">
                                <button type="reset" onclick="location.href=`${host}/sale`">CANCELAR <i data-feather="x"></i></button>
                                <button type="submit" class="submit">FINALIZAR <i data-feather="check"></i></button>
                            </div>
                        </div>
                    </form>
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
            <script src="/public/js/addSaleFunctions.js"></script>
        </body>

        </html>
<?php
    }
}

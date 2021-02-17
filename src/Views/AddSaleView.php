<?php
class AddSaleView
{
    public function __construct($params)
    {
        $env = parse_ini_file('env.ini')['HOST'];
?>
        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/public/css/sales.css">
            <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
            <title>Vendas</title>
            <script>
                const host = '<?php echo $env; ?>';
            </script>
        </head>

        <body>
            <?php include "components/Sidebar.php" ?>
            <main class="wide">
                <header>
                    <i class="menu-toggle" data-feather="menu"></i>
                    <h1>CADASTRAR VENDA</h1>
                </header>
                <div class="content">
                    <form action="/adding/sale" method="POST">
                        <a href="#addProduct" class="botao-adicionar-produto">ADICIONAR ITEM<i data-feather="plus"></i></a>
                        <div id="addProduct" class="modal">
                            <div>
                                <a href="#close" title="close" class="close">x</a>
                                <h2>ADICIONAR ITEM</h2>
                                <input type="text" id="getProducts" onkeyup="getProducs()">
                                <table id="list"></table>
                            </div>
                        </div>
                        <table>
                            <thead>
                                <tr class="cabecalho-tabela">
                                    <th colspan="6">LISTA DE PRODUTOS</th>
                                </tr>
                                <tr class="cabecalho-tabela">
                                    <th>N° item</th>
                                    <th>Nome</th>
                                    <th>Quantidade</th>
                                    <th>Valor Unitario</th>
                                    <th>Total</th>
                                    <th>Remover</th>
                                </tr>
                            </thead>
                            <tbody id="products">
                            </tbody>
                        </table>
                        <div class="select">
                            <select name="formaPagamento" id="formaPagamento">
                                <option selected disabled>Selecione a forma de pagamento</option>

                                <?php
                                foreach ($params['paymentMethods'] as $paymentMethod) {
                                    echo "<option value='{$paymentMethod[' id']}'>{$paymentMethod['descricao']}</option>";
                                }
                                ?>
                            </select>
                            <select name="cliente" id="cliente">
                                <option selected disabled>Selecione um cliente</option>;
                            </select>
                            <a href="#addClient">Adicionar cliente</a>
                            <div id="addClient" class="modal">
                                <a href="#close" title="close" class="close">x</a>
                                <label for="nome">Nome</label>
                                <input type="text" id="nomeClient"><br>
                                <label for="cpf">CPF</label>
                                <input type="text" id="cpfClient"><br>
                                <label for="endereco">Endereço</label>
                                <input type="text" id="enderecoClient"><br>
                                <label for="telefone">Telefone</label>
                                <input type="text" id="telefoneClient"><br>
                                <label for="dataNascimento">Data de nascimento</label>
                                <input type="date" id="dataNascimentoClient"><br>
                                <button onclick="addClient()">Cadastrar</button>
                                <h1 id="resultClient"></h1>
                            </div>
                        </div>

                        <div>Valor total:<h1 id="valueTotal">0</h1>
                        </div>
                        <button type="button">CANCELAR VENDA</button>
                        <button type="submit">FINALIZAR VENDA</button>
                        <h1>
                            <?php
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                            ?>
                        </h1>
                    </form>
                </div>
            </main>

            <script src="/public/js/global.js"></script>
            <script src="/public/js/addSaleFunctions.js"></script>
        </body>

        </html>
<?php
    }
}

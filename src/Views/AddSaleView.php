<?php
class AddSaleView
{
  public function __construct($params)
  {
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
</head>

<body>
    <?php include "components/Sidebar.php" ?>
    <main class="wide">
        <i class="menu-toggle" data-feather="menu"></i>
        <div class="content">
            <form action="/adding/sale" method="POST">
                <table>
                    <thead>
                        <tr>
                            <td>N° item</td>
                            <td>Nome</td>
                            <td>Quantidade</td>
                            <td>Valor Unitario</td>
                            <td>Total</td>
                            <td>Remover</td>
                        </tr>
                    </thead>
                    <tbody id="products"></tbody>
                </table>
                <a href="#addProduct">Adicionar item</a><br>
                <select name="cliente" id="cliente">
                    <option selected disabled>Selecione uma opção</option>;
                </select>
                <a href="#addClient">Adicionar cliente</a>
                <div>Valor total:<h1 id="valueTotal">0</h1>
                </div>
                <div id="addProduct" class="modal">
                    <div>
                        <a href="#close" title="close" class="close">x</a>
                        <h2>Adicionar item</h2>
                        <input type="text" id="getProducts" onkeyup="getProducs()">
                        <table id="list"></table>
                    </div>
                </div>
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
                <label for="formaPagamento">Forma de pagamento</label>
                <select name="formaPagamento" id="formaPagamento">
                    <option selected disabled>Selecione uma opção</option>

                    <?php
              foreach ($params['paymentMethods'] as $paymentMethod) {
                echo "<option value='{$paymentMethod[' id']}'>{$paymentMethod['descricao']}</option>";
              }
              ?>
                </select></br>
                <button type="submit">Finalizar venda</button>
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
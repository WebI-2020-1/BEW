<?php
    class AddSaleView{
        public function __construct($params){
            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <style>
                    .modal {
                        position: fixed;
                        top: 0;
                        right: 0;
                        bottom: 0;
                        left: 0;
                        font-family: Arial, Helvetica, sans-serif;
                        background: rgba(0,0,0,0.8);
                        z-index: 99999;
                        opacity:0;
                        -webkit-transition: opacity 400ms ease-in;
                        -moz-transition: opacity 400ms ease-in;
                        transition: opacity 400ms ease-in;
                        pointer-events: none;
                    }
                    .modal:target {
                        opacity: 1;
                        pointer-events: auto;
                    }
                    .modal > div {
                        width: 400px;
                        position: relative;
                        margin: 10% auto;
                        padding: 15px 20px;
                        background: #fff;
                        }
                    *{
                        color:var(--verde);
                    }
                    body form{
                        display:block !important;
                    }
                </style>
            </head>
            <body>
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
                <div>Valor total:<h1 id="valueTotal">0</h1></div>
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
                    <option selected disabled>Selecione uma opção</option>';
                    foreach($params['paymentMethods'] as $paymentMethod){
                        echo "<option value='{$paymentMethod['id']}'>{$paymentMethod['descricao']}</option>";
                    }
            echo '</select></br>
            <button type="submit">Finalizar venda</button><h1>';
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
            echo '</h1>
            <script src="../../public/js/addSaleFunctions.js"></script></form></body></html>';
        }
    }
?>

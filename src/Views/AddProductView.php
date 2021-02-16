<?php
    global $categories;
    class AddProductView{
        public function __construct($params){
            $categories = $params['categories'];

            ?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Cadastro de produtos</title>
            </head>
            <body>
                <form action="/adding/product" method="POST">
                    <label for="nome">Nome do produto</label>
                    <input type="text" name="nome" id="nome"></br>
                    <label for="unidade">Unidade</label>
                    <input type="text" name="unidade" id="unidade"></br>
                    <label for="valorVenda">Valor de venda do produto</label>
                    <input type="text" name="valorVenda" id="valor_venda"></br>
                    <label for="codigoBarras">Codigo de barras do produto</label>
                    <input type="text" name="codigoBarras" id="codigo_barras"></br>
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria">
                        <option selected disabled>Selecione uma opção</option>'
                        <?php
                        foreach($categories as $category){
                            echo "<option value='{$category['id']}'>{$category['nome']}</option>";
                        }?>
                    </select></br>
                    <button type="submit">Cadastrar</button>
                </form>
                <h1>
                  <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
            </h1>
            </body>
            </html>';
            <?php
        }
    }

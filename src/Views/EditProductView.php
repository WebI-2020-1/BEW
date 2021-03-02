<?php
    class EditProductView{
        public function __construct($params){ ?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Editar de produtos</title>
            </head>
            <body>
                <form action="/update/product" method="POST">
                    <input type="hidden" name="productId" value="<?php echo $params['id']; ?>">
                    <label for="nome">Nome do produto</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $params['product']['nome']; ?>"></br>
                    <label for="unidade">Unidade</label>
                    <input type="text" name="unidade" id="unidade" value="<?php echo $params['product']['unidade']; ?>"></br>
                    <label for="valorVenda">Valor de venda do produto</label>
                    <input type="text" name="valorVenda" id="valor_venda" value="<?php echo $params['product']['valorVenda']; ?>"></br>
                    <label for="codigoBarras">Codigo de barras do produto</label>
                    <input type="text" name="codigoBarras" id="codigo_barras" value="<?php echo $params['product']['codigoBarras']; ?>"></br>
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria">
                        <option disabled>Selecione uma opção</option>
                        <?php
                        foreach($params['categories'] as $category){
                            echo "<option value='{$category['id']}'".($params['product']['idCategoria'] == $category['id'] ? ' selected ' : '').">{$category['nome']}</option>";
                        }?>
                    </select></br>
                    <button type="submit">Atualizar</button>
                </form>
                <h1>
                    <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    ?>
                </h1>
            </body>
            </html>
        <?php }
    }
?>
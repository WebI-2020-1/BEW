<?php
    global $categories;
    class AddProductView{
        public function __construct($params){
            $GLOBALS['categories'] = $params['categories'];
        }
    }
    debug($categories);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produtos</title>
</head>
<body>
    <form action="/" method="POST">
        <label for="nome">Nome do produto</label>
        <input type="text" name="nome" id="nome"></br>
        <label for="unidade">Unidade</label>
        <select name="unidade" id="unidade">
            <option selected disabled>Selecione uma opção</option>
            <option value="kg">Quilograma</option>
            <option value="l">Litro</option>
            <option value="ml">Mililitro</option>
        </select></br>
        <label for="quantidade">Quantidade do produto</label>
        <input type="number" name="quantidade" id="quantidade"></br>
        <label for="valor_compra">Valor de compra do produto</label>
        <input type="number" name="valor_compra" id="valor_compra"></br>
        <label for="valor_venda">Valor de venda do produto</label>
        <input type="number" name="valor_venda" id="valor_venda"></br>
        <label for="codigo_barras">Codigo de barras do produto</label>
        <input type="text" name="codigo_barras" id="codigo_barras"></br>
        <label for="categoria">Categoria</label>
        <select name="categoria" id="categoria">
            <option selected disabled>Selecione uma opção</option>
            <?php foreach($categories as $category){ ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['nome']; ?></option>
            <?php } ?>
        </select></br>
    </form>
</body>
</html>
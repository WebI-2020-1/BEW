<?php
    class EditPromotionView{
        public function __construct($params){ ?>
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Cadastro de promoções</title>
        </head>
        <body>
        <form action="/update/promotion" method="POST">
            <input type="hidden" name="promotionId" id="nome" value="<?php echo $params['id'] ?>">
            <label for="nome">Nome da promoção</label>
            <input type="text" name="nome" id="nome" value="<?php echo $params['nome'] ?>"></br>
            <label for="dataInicio">Data Inicio</label>
            <input type="date" name="dataInicio" id="dataInicio" value="<?php echo $params['dataInicio'] ?>"></br>
            <label for="dataFim">Data Fim</label>
            <input type="date" name="dataFim" id="dataFim" value="<?php echo $params['dataFim'] ?>"></br>
            <button type="submit">Editar</button>
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
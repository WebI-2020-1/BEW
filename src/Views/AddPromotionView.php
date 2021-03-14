<?php
    class AddPromotionView{ 
        public function __construct(){ ?>
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Cadastro de promoções</title>
        </head>
        <body>
        <form action="/adding/promotion" method="POST">
            <label for="nome">Nome da promoção</label>
            <input type="text" name="nome" id="nome"></br>
            <label for="dataInicio">Data Inicio</label>
            <input type="date" name="dataInicio" id="dataInicio"></br>
            <label for="dataFim">Data Fim</label>
            <input type="date" name="dataFim" id="dataFim"></br>
            <button type="submit">Cadastrar</button>
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
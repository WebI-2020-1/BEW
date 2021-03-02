<?php
    class EditProviderView{
        public function __construct($params){ ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <style>
                    *{
                        color: #19bf72;
                    }
                </style>
            </head>
            <body>
                <form action="/update/provider" method="post">
                    <input type="hidden" name="providerId" value="<?php echo $params['provider']['id']; ?>" >
                    <label for="nome">Nome</label><br>
                    <input type="text" id="nome" name="nome" value="<?php echo $params['provider']['nome']; ?>"><br>
                    <label for="cnpj">CNPJ</label><br>
                    <input type="text" id="cnpj" name="cnpj" value="<?php echo $params['provider']['cnpj']; ?>"><br>
                    <label for="endereco">Endereço</label><br>
                    <input type="text" id="endereco" name="endereco" value="<?php echo $params['provider']['endereco']; ?>"><br>
                    <label for="telefone">Telefone</label><br>
                    <input type="text" id="telefone" name="telefone" value="<?php echo $params['provider']['telefone']; ?>"><br>
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" value="<?php echo $params['provider']['email']; ?>"><br>
                    <button type="submit">atualizar</button>
                    <a href="/provider">Cancelar</a>
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
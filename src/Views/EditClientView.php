<?php
    class EditClientView{
        public function __construct($params){ ?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Cadastro de clientes</title>
            </head>
            <body>
                <form action="/update/client" method="POST">
                    <input type="hidden" name="clientId" value="<?php echo $params['client']['id'] ?>">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $params['client']['nome'] ?>"><br>
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" value="<?php echo $params['client']['cpf'] ?>"><br>
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco" value="<?php echo $params['client']['endereco'] ?>"><br>
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" value="<?php echo $params['client']['telefone'] ?>"><br>
                    <label for="dataNascimento">Data de nascimento</label>
                    <input type="date" name="dataNascimento" id="dataNascimento" value="<?php echo $params['client']['dataNascimento'] ?>"><br>
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

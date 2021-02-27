<?php
    class ClientView{
        public function __construct($params){ ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <style>
                    *{
                        color:#19bf72;
                    }
                </style>
            </head>
            <body>
            <a href="/add/client">Adicionar cliente</a>
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>CPF</td>
                            <td>Endereço</td>
                            <td>Telefone</td>
                            <td>Data de nascimento</td>
                            <td>Ação</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($params['clients'] as $client){ ?>
                            <tr>
                                <td><?php echo $client['id']; ?></td>
                                <td><?php echo $client['nome']; ?></td>
                                <td><?php echo $client['cpf']; ?></td>
                                <td><?php echo $client['endereco']; ?></td>
                                <td><?php echo $client['telefone']; ?></td>
                                <td><?php echo $client['dataNascimento']; ?></td>
                                <td>Deletar/Editar</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </body>
            </html>
        <?php }
    }

?>
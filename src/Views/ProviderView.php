<?php
    class ProviderView{
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
            <a href="/add/provider">Adicionar fornecedor</a>
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>CNPJ</td>
                            <td>Endereço</td>
                            <td>Telefone</td>
                            <td>Email</td>
                            <td>Ação</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($params['providers'] as $provider){ ?>
                            <tr>
                                <td><?php echo $provider['id']; ?></td>
                                <td><?php echo $provider['nome']; ?></td>
                                <td><?php echo $provider['cnpj']; ?></td>
                                <td><?php echo $provider['endereco']; ?></td>
                                <td><?php echo $provider['telefone']; ?></td>
                                <td><?php echo $provider['email']; ?></td>
                                <td>
                                    <a href="/edit/provider&id=<?php echo $provider['id']; ?>">Editar</a>
                                    <a href="/delete/provider&id=<?php echo $provider['id']; ?>">Deletar</a>
                                </td>
                                
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
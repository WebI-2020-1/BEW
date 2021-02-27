<?php 
    class EmployeeView{
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
            <a href="/add/employee">Adicionar funcionário</a>
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Nivel de acesso</td>
                            <td>CPF</td>
                            <td>Endereço</td>
                            <td>Telefone</td>
                            <td>Email</td>
                            <td>Data de nascimento</td>
                            <td>Usuário</td>
                            <td>Ação</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($params['employees'] as $employee){ ?>
                            <tr>
                                <td><?php echo $employee['id']; ?></td>
                                <td><?php echo $employee['nome']; ?></td>
                                <td><?php echo $employee['nivelAcesso']; ?></td>
                                <td><?php echo $employee['cpf']; ?></td>
                                <td><?php echo $employee['endereco']; ?></td>
                                <td><?php echo $employee['telefone']; ?></td>
                                <td><?php echo $employee['email']; ?></td>
                                <td><?php echo $employee['dataNascimento']; ?></td>
                                <td><?php echo $employee['usuario']; ?></td>
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
<?php
    class CategoryView{
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
            <a href="/add/category">Adicionar categoria</a>
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Ação</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($params['categories'] as $category){ ?>
                            <tr>
                                <td><?php echo $category['id']; ?></td>
                                <td><?php echo $category['nome']; ?></td>
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
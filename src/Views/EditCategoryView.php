<?php
    class EditCategoryView{
        public function __construct($params){ ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <form action="/update/category" method="POST">
                <label for="nome">Nome da categoria</label>
                <input type="hidden" name="categoryId" value="<?php echo $params['category']['id']; ?>">
                <input type="text" name="nome" id="nome" value="<?php echo $params['category']['nome']; ?>" required></br>
                <button type="submit">Editar</button>
            </form>
            <h1>
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
            </h1>
            </html>
        <?php }
    }
?>
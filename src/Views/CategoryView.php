<?php
    class CategoryView{
        public function __construct($params){
            $env = parse_ini_file('env.ini')['HOST'];
?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="public/css/category.css">
                <title>Categorias</title>
                <script>
                    const host =  '<?php echo $env; ?>';
                </script>
            </head>
            <body>
            <?php include "components/Sidebar.php" ?>
            <main>
            <header>
                <i class="menu-toggle disabled" data-feather="menu"></i>
                <div class="header-conteudo">
                    <h1>CATEGORIAS</h1>
                    <div class="botoesDireito">
                        <a href="/add/category" class="btnAdd">Adicionar categoria<i data-feather="plus"></i></a>
                        <div class="pesquisar">
                            <input type="text" id="input" name="pesquisar" placeholder="Pesquisar na tabela" onkeyup="filtrarCategoria()">
                            <i data-feather="search" class="iconePesquisa"></i>
                        </div>
                    </div>
                </div>
            </header>
            <div class="content">
                <table class="tabela-consulta">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Editar</td>
                            <td>Remover</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($params['categories'] as $category){ ?>
                            <tr>
                                <td><?php echo $category['id']; ?></td>
                                <td><?php echo $category['nome']; ?></td>
                                <td class="btnAcao">
                                    <a href="/edit/category&id=<?php echo $category['id']; ?>">
                                        <button class="btnEditar"><i data-feather="edit"></i></button>
                                    </a>
                                </td>
                                <td class="btnAcao">
                                    <a href="/delete/category&id=<?php echo $category['id']; ?>" >
                                        <button class="btnDeletar"><i data-feather="trash"></i></button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="modal mensagem disabled">
                    <div>
                        <button type="button" onclick="location.href=`${host}/category`">
                            <i data-feather="x"></i>
                        </button>
                        <?php
                        if ($_SESSION['message'] != '') {
                            echo "<h3>" . $_SESSION['message'] . "</h3>";
                            unset($_SESSION['message']);
                            echo "<script type='text/javascript'>document.querySelector('.modal.mensagem').classList.toggle('disabled');</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            </main>

            <script src="/public/js/CategoryFunctions.js"></script>
            <script src="/public/js/global.js"></script>

            </body>
            </html>
        <?php }
    }
?>

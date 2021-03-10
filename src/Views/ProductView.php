<?php
    class ProductView{
        public function __construct($params){ ?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="/public/css/product.css">
                <title>Produtos</title>
            </head>

            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
            <script src="https://unpkg.com/feather-icons"></script>

            <body>
            <?php include "components/Sidebar.php" ?>
            <main class="wide">
            <header>
                <i class="menu-toggle" data-feather="menu"></i>
                <div class="header-conteudo">
                    <h1>PRODUTOS</h1>
                    <div class="botoesDireito">
                        <a href="/add/product" class="btnAdd">Adicionar produto<i data-feather="plus"></i></a>
                        <form action="" class="pesquisar">
                            <input type="search" name="pesquisar" id="" placeholder="Pesquisar na tabela">
                            <button type="submit"><i data-feather="search"></i></button>
                        </form>
                    </div>
                </div>
            </header>
            <div class="content">
                <table class="tabela-consulta">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Unidade</td>
                            <td>Quantidade</td>
                            <td>Valor de compra</td>
                            <td>Valor de venda</td>
                            <td>Ação</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($params['products'] as $product){ ?>
                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td><?php echo $product['nome']; ?></td>
                                <td><?php echo $product['unidade']; ?></td>
                                <td><?php echo $product['quantidade']; ?></td>
                                <td><?php echo $product['valorCompra']; ?></td>
                                <td><?php echo $product['valorVenda']; ?></td>
                                <td><button type="button" class="abrir-modal" onclick="consultarProduto(<?php echo $product['id']; ?>)">
                                    <i data-feather="search"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                        <div class="modal disabled">
                            <div class="produto">
                                <button type="button" class="fechar-modal">
                                    <i data-feather="x"></i>
                                </button>
                                <div class="conteudoProduto"></div>
                                <a href="/edit/product&id=<?php echo $product['id']; ?>">Editar</a>
                                <a href="/delete/product&id=<?php echo $product['id']; ?>">Deletar</a>
                                <a href="" class="btnEditar">Editar<i data-feather="edit"></i></a>
                            </div>
                        </div>
                    </tbody>
                </table>
                </div>
                <h1>
                    <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    ?>
                </h1>
            </main>
            </body>

            <script src="/public/js/global.js"></script>
            <script src="/public/js/ProductFunctions.js"></script>

            </html>
        <?php }
    }
?>

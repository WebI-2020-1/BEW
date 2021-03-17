<?php
    class ProductView{
        public function __construct($params){
            $env = parse_ini_file('env.ini')['HOST'];
?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="/public/css/product.css">
                <title>Produtos</title>
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
                    <h1>PRODUTOS</h1>
                    <div class="botoesDireito">
                        <?php if($_SESSION['dados_usuario']['nivelAcesso'] == 2){ ?>
                            <a href="/add/product" class="btnAdd">Adicionar produto<i data-feather="plus"></i></a>
                        <?php } ?>
                        <div class="pesquisar">
                            <input type="text" id="input" name="pesquisar" placeholder="Pesquisar na tabela" onkeyup="filtrarProduto()">
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
                            <div class="modal disabled">
                                <div class="produto">
                                    <button type="button" class="fechar-modal">
                                        <i data-feather="x"></i>
                                    </button>
                                    <div class="conteudoProduto"></div>
                                    <?php if($_SESSION['dados_usuario']['nivelAcesso'] == 2){ ?>
                                        <div class="botoesModal">
                                            <a class="btnEditar">Editar <i data-feather="edit"></i></a>
                                            <a class="btnDeletar">Deletar <i data-feather="trash"></i></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
                <div class="modal mensagem disabled">
                    <div>
                        <button type="button" onclick="location.href=`${host}/product`">
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
            </main>

            <script src="/public/js/ProductFunctions.js"></script>
            <script src="/public/js/global.js"></script>

            </body>
            </html>
        <?php }
    }
?>

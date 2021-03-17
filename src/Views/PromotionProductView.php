<?php
    class PromotionProductView{
        public function __construct($params) {
            $env = parse_ini_file('env.ini')['HOST'];
?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="/public/css/promotion.css">
                <title>Relações das promoções</title>
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
                    <h1>RELAÇÕES DAS PROMOÇÕES</h1>
                    <div class="botoesDireito">
                        <a href="/add/promotion-product" class="btnAdd">Adicionar promoção ao produto<i data-feather="plus"></i></a>
                        <div class="pesquisar">
                            <input type="text" id="input" name="pesquisar" placeholder="Pesquisar na tabela" onkeyup="filtrarPromocaoProduto()">
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
                            <td>Produto</td>
                            <td>Promoção</td>
                            <td>Valor de desconto</td>
                            <td>Editar</td>
                            <td>Deletar</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($params['promotionProducts'] as $promotion){ ?>
                            <tr>
                                <td><?php echo $promotion['id'] ?></td>
                                <td><?php echo $promotion['nomeProduto'] ?></td>
                                <td><?php echo $promotion['nomePromocao'] ?></td>
                                <td><?php echo $promotion['valorDesconto'] ?></td>
                                <td class="btnAcao">
                                    <a href="/edit/promotion-product&id=<?php echo $promotion['id'] ?>">
                                        <button class="btnEditar"><i data-feather="edit"></i></button>
                                    </a>
                                </td>
                                <td class="btnAcao">
                                    <a href="/delete/promotion-product&id=<?php echo $promotion['id'] ?>">
                                    <button class="btnDeletar"><i data-feather="trash"></i></button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="modal mensagem disabled">
                    <div>
                        <button type="button" onclick="location.href=`${host}/promotion`">
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

            <script src="/public/js/PromotionProductFunctions.js"></script>
            <script src="/public/js/global.js"></script>

            </body>
            </html>
    <?php }
    }
?>

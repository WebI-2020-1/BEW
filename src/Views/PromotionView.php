<?php
    class PromotionView{
        public function __construct($params){
            $env = parse_ini_file('env.ini')['HOST'];
?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="/public/css/promotion.css">
                <title>Promoções</title>
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
                    <h1>PROMOÇÕES</h1>
                    <div class="botoesDireito">
                      <?php if($_SESSION['dados_usuario']['nivelAcesso'] == 2){ ?>
                        <a href="/add/promotion" class="btnAdd">Adicionar promoção<i data-feather="plus" class="iconeAdd"></i></a>
                        <a href="/promotion-product" class="btnAdd">Relacionar promoção<i data-feather="plus" class="iconeAdd"></i></a>
                      <?php } ?>
                        <div class="pesquisar">
                            <input type="text" id="input" name="pesquisar" placeholder="Pesquisar na tabela" onkeyup="filtrarPromocao()">
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
                            <td>Data inicio</td>
                            <td>Data fim</td>
                          <?php if($_SESSION['dados_usuario']['nivelAcesso'] == 2){ ?>
                            <td>Editar</td>
                            <td>Deletar</td>
                          <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($params['promotions'] as $promotion){ ?>
                            <tr>
                                <td><?php echo $promotion['id'] ?></td>
                                <td><?php echo $promotion['nome'] ?></td>                                           
                                <td><?php echo date("d/m/Y", strtotime($promotion['dataInicio']))?></td>
                                <td><?php echo date("d/m/Y", strtotime($promotion['dataFim']))?></td>
                                
                                <?php if($_SESSION['dados_usuario']['nivelAcesso'] == 2){ ?>
                                  <td class="btnAcao">
                                      <a href="/edit/promotion&id=<?php echo $promotion['id'] ?>">
                                          <button class="btnEditar"><i data-feather="edit"></i></button>
                                      </a>
                                  </td>
                                  <td class="btnAcao">
                                      <a href="/delete/promotion&id=<?php echo $promotion['id'] ?>">
                                      <button class="btnDeletar"><i data-feather="trash"></i></button>
                                      </a>
                                  </td>    
                                <?php } ?>
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

            <script src="/public/js/PromotionFunctions.js"></script>
            <script src="/public/js/global.js"></script>

            </body>
            </html>
        <?php }
    }
?>

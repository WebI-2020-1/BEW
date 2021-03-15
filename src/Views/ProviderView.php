<?php
    class ProviderView{
        public function __construct($params){
            $env = parse_ini_file('env.ini')['HOST'];
?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="public/css/provider.css">
                <title>Fornecedores</title>
                <script>
                    const host =  '<?php echo $env; ?>';
                </script>
            </head>
            <body>
            <?php include "components/Sidebar.php" ?>
            <main class="wide">
            <header>
                <i class="menu-toggle" data-feather="menu"></i>
                <div class="header-conteudo">
                    <h1>FORNECEDORES</h1>
                    <div class="botoesDireito">
                        <a href="/add/provider" class="btnAdd">Adicionar fornecedor<i data-feather="plus"></i></a>
                        <div class="pesquisar">
                            <input type="text" id="input" name="pesquisar" placeholder="Pesquisar na tabela" onkeyup="filtrarFornecedor()">
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
                                <td><?php echo $provider['telefone']; ?></td>
                                <td><?php echo $provider['email']; ?></td>
                                <td><button type="button" class="abrir-modal" onclick="consultarFornecedor(<?php echo $provider['id']; ?>)">
                                    <i data-feather="search"></i></button>
                                </td>
                            </tr>
                            <div class="modal disabled">
                                <div class="fornecedor">
                                    <button type="button" class="fechar-modal">
                                        <i data-feather="x"></i>
                                    </button>
                                    <div class="conteudoFornecedor"></div>
                                    <div class="botoesModal">
                                        <a href="/edit/provider&id=<?php echo $provider['id']; ?>" class="btnEditar">Editar<i data-feather="edit"></i></a>
                                        <a href="/delete/provider&id=<?php echo $provider['id']; ?>" class="btnDeletar">Deletar <i data-feather="trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="modal mensagem disabled">
                    <div>
                        <button type="button" onclick="location.href=`${host}/provider`">
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

            <script src="/public/js/ProviderFunctions.js"></script>
            <script src="/public/js/global.js"></script>

            </body>
            </html>
        <?php }

    }
?>

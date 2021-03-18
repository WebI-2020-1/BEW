<?php
class AddProviderView
{
    public function __construct()
    {
        $env = parse_ini_file('env.ini')['HOST'];
?>
        <!DOCTYPE html>
        <html lang="pt-BR">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/public/css/addProvider.css">
            <title>Cadastro de Fornecedor</title>

            <script>
                const host = '<?php echo $env; ?>';
            </script>
        </head>

        <body>
            <?php include "components/Sidebar.php" ?>
            <main>
                <header>
                    <i class="menu-toggle disabled" data-feather="menu"></i>
                    <h1>ADICIONAR FORNECEDOR</h1>
                </header>

                <div class="content">
                    <form action="/adding/provider" method="post">
                        <div class="conteudo-cadastro">
                            <label for="nome" class="label1">Nome</label>
                            <input type="text" id="nome" name="nome" required>
                            <label for="cnpj" class="label2">CNPJ</label>
                            <input type="text" id="cnpj" name="cnpj" required>
                            <label for="endereco" class="label3">Endereço</label>
                            <input type="text" id="endereco" name="endereco" required>
                            <label for="telefone" class="label4">Telefone</label>
                            <input type="text" id="telefone" name="telefone" required>
                            <label for="email" class="label5">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="botoes">
                            <button type="reset" onclick="location.href=`${host}/provider`">CANCELAR <i data-feather="x"></i></button>
                            <button type="submit" class="submit">CADASTRAR <i data-feather="check"></i></button>
                        </div>
                    </form>
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
            <script src="/public/js/global.js"></script>
        </body>

        </html>
<?php
    }
}

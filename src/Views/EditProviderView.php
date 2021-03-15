<?php
class EditProviderView
{
    public function __construct($params)
    {
        $env = parse_ini_file('env.ini')['HOST']; ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/public/css/addProvider.css">
            <title>Edição de Fornecedor</title>

            <script>
                const host = '<?php echo $env; ?>';
            </script>
        </head>

        <body>
            <?php include "components/Sidebar.php" ?>
            <main class="wide">
                <header>
                    <i class="menu-toggle" data-feather="menu"></i>
                    <h1>EDITAR FORNECEDOR</h1>
                </header>

                <div class="content">
                    <form action="/update/provider" method="post">
                        <div class="conteudo-cadastro">
                            <input type="hidden" name="providerId" value="<?php echo $params['provider']['id']; ?>">
                            <label for="nome" class="label1">Nome</label><br>
                            <input type="text" id="nome" name="nome" value="<?php echo $params['provider']['nome']; ?>">
                            <label for="cnpj" class="label2">CNPJ</label><br>
                            <input type="text" id="cnpj" name="cnpj" value="<?php echo $params['provider']['cnpj']; ?>">
                            <label for="endereco" class="label3">Endereço</label><br>
                            <input type="text" id="endereco" name="endereco" value="<?php echo $params['provider']['endereco']; ?>">
                            <label for="telefone" class="label4">Telefone</label><br>
                            <input type="text" id="telefone" name="telefone" value="<?php echo $params['provider']['telefone']; ?>">
                            <label for="email" class="label5">Email</label><br>
                            <input type="email" id="email" name="email" value="<?php echo $params['provider']['email']; ?>">
                        </div>
                        <div class="botoes">
                            <button type="reset" onclick="location.href=`${host}/provider`">CANCELAR <i data-feather="x"></i></button>
                            <button type="submit" class="submit">SALVAR <i data-feather="check"></i></button>
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
<?php }
}
?>

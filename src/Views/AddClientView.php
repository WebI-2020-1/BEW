<?php
class AddClientView
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
            <link rel="stylesheet" href="/public/css/addClient.css">
            <title>Cadastro de clientes</title>

            <script>
                const host = '<?php echo $env; ?>';
            </script>
        </head>

        <body>
            <?php include "components/Sidebar.php" ?>
            <main class="wide">
                <header>
                    <i class="menu-toggle" data-feather="menu"></i>
                    <h1>ADICIONAR CLIENTE</h1>
                </header>

                <div class="content">
                    <form action="/adding/client" method="POST">
                        <div class="conteudo-cadastro">
                            <label for="nome" class="label1">Nome</label>
                            <input type="text" name="nome" id="nome" required>
                            <label for="cpf" class="label2">CPF</label>
                            <input type="text" name="cpf" id="cpf" required>
                            <label for="endereco" class="label3">Endereço</label>
                            <input type="text" name="endereco" id="endereco" required>
                            <label for="telefone" class="label4">Telefone</label>
                            <input type="text" name="telefone" id="telefone" required>
                            <label for="dataNascimento" class="label5">Data de nascimento</label>
                            <input type="date" name="dataNascimento" id="dataNascimento" required>
                        </div>
                        <div class="botoes">
                            <button type="reset" onclick="location.href=`${host}/client`">CANCELAR <i data-feather="x"></i></button>
                            <button type="submit" class="submit">CADASTRAR <i data-feather="check"></i></button>
                        </div>
                    </form>
                    <div class="modal mensagem disabled">
                        <div>
                            <button type="button" onclick="location.href=`${host}/client`">
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
?>

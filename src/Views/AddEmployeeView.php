<?php
class AddEmployeeView
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
        <link rel="stylesheet" href="/public/css/addEmployee.css">
        <title>Cadastro de funcionários</title>

        <script>
            const host = '<?php echo $env; ?>';
        </script>
    </head>

    <body>
        <?php include "components/Sidebar.php" ?>
        <main class="wide">
        <header>
            <i class="menu-toggle" data-feather="menu"></i>
            <h1>CADASTRAR FUNCIONÁRIO</h1>
        </header>
        <div class="content">
            <form action="/adding/employee" method="POST">
                <div class="conteudo-cadastro">
                    <label for="nome" class="label1">Nome</label>
                    <input type="text" name="nome" id="nome">
                    <label for="nivelAcesso" class="label2">Nível de Acesso</label>
                    <select name="nivelAcesso" id="nivelAcesso">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                    <label for="cpf" class="label3">CPF</label>
                    <input type="text" name="cpf" id="cpf">
                    <label for="endereco" class="label4">Endereço</label>
                    <input type="text" name="endereco" id="endereco">
                    <label for="telefone" class="label5">Telefone</label>
                    <input type="text" name="telefone" id="telefone">
                    <label for="dataNascimento" class="label6">Data de Nascimento</label>
                    <input type="date" name="dataNascimento" id="dataNascimento">
                    <label for="email" class="label7">Email</label>
                    <input type="text" name="email" id="email">
                    <label for="usuario" class="label8">Usuário</label>
                    <input type="text" name="usuario" id="usuario">
                    <label for="senha" class="label9">Senha</label>
                    <input type="text" name="senha" id="senha"><br>
                </div>
                <div class="botoes">
                    <button type="reset" onclick="location.href=`${host}/employee`">CANCELAR <i data-feather="x"></i></button>
                    <button type="submit" class="submit">CADASTRAR <i data-feather="check"></i></button>
                </div>
                </button>
            </form>
            <div class="modal mensagem disabled">
                <div>
                    <button type="button" onclick="location.href=`${host}/employee`">
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

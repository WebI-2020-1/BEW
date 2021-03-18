<?php
    class EditEmployeeView{
        public function __construct($params){
            $env = parse_ini_file('env.ini')['HOST'];
?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="/public/css/addEmployee.css">
                <title>Edição de funcionários</title>

                <script>
                    const host = '<?php echo $env; ?>';
                </script>
            </head>

            <body>
                <?php include "components/Sidebar.php" ?>
                <main>
                <header>
                    <i class="menu-toggle disabled" data-feather="menu"></i>
                    <h1>EDITAR FUNCIONÁRIO</h1>
                </header>
                <div class="content">
                    <form action="/update/employee" method="POST" class="formulario">
                        <div class="conteudo-cadastro">
                            <input type="hidden" name="employeeId"value="<?php echo $params['employee']['id']; ?>">
                            <label name="nome" class="label1">Nome</label>
                            <input type="text" name="nome" id="nome" value="<?php echo $params['employee']['nome']; ?>">
                            <label name="nivelAcesso" class="label2">Nível de Acesso</label>
                            <select name="nivelAcesso" id="nivelAcesso">
                                <option value="1" <?php echo $params['employee']['nivelAcesso'] == 1 ? 'selected' : ''; ?> >Limitado</option>
                                <option value="2" <?php echo $params['employee']['nivelAcesso'] == 2 ? 'selected' : ''; ?> >Total</option>
                            </select>
                            <label for="cpf" class="label3">CPF</label>
                            <input type="text" name="cpf" id="cpf" value="<?php echo $params['employee']['cpf']; ?>">
                            <label for="endereco" class="label4">Endereço</label>
                            <input type="text" name="endereco" id="endereco" value="<?php echo $params['employee']['endereco']; ?>">
                            <label for="telefone" class="label5">Telefone</label>
                            <input type="text" name="telefone" id="telefone" value="<?php echo $params['employee']['telefone']; ?>">
                            <label for="dataNascimento" class="label6">Data de Nascimento</label>
                            <input type="date" name="dataNascimento" id="dataNascimento" value="<?php echo $params['employee']['dataNascimento']; ?>">
                            <label for="email" class="label7">Email</label>
                            <input type="text" name="email" id="email" value="<?php echo $params['employee']['email']; ?>">
                            <label for="usuario" class="label8">Usuário</label>
                            <input type="text" name="usuario" id="usuario" value="<?php echo $params['employee']['usuario']; ?>">
                            <label for="senha" class="label9">Senha</label>
                            <input type="password" name="senha" id="senha" value="<?php echo $params['employee']['usuario']; ?>"><br>
                        </div>
                        <div class="botoes">
                            <button type="reset" onclick="location.href=`${host}/employee`">CANCELAR <i data-feather="x"></i></button>
                            <button type="submit" class="submit">CADASTRAR <i data-feather="check"></i></button>
                        </div>

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
        <?php }
    }
?>

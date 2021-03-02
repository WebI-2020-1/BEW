<?php
    class EditEmployeeView{
        public function __construct($params){ ?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Edição de funcionários</title>
                <link rel="stylesheet" href="../../public/css/employee.css">
            </head>
            <script src="https://unpkg.com/feather-icons"></script>
            <body>
                <?php include "components/Sidebar.php" ?>
                <main class="wide">
                <header>
                    <i class="menu-toggle" data-feather="menu"></i>
                    <h1>EDITAR FUNCIONÁRIO</h1>
                </header>
                <div class="content">
                    <form action="/update/employee" method="POST" class="formulario">
                        <input type="hidden" name="employeeId" value="<?php echo $params['employee']['id']; ?>">
                        <div class="itemTodo">
                        <label name="nome">
                            <i data-feather="user" class="icone"></i>Nome
                        </label>
                        <input type="text" name="nome" class="input" value="<?php echo $params['employee']['nome']; ?>">
                        </div>
                        <div class="item">
                        <label name="nivelAcesso">
                            <i data-feather="key" class="icone"></i>Nível de Acesso
                        </label>
                        <select name="nivelAcesso" class="input">
                            <option value="1" <?php echo $params['employee']['nivelAcesso'] == 1 ? 'selected' : ''; ?> >1</option>
                            <option value="2" <?php echo $params['employee']['nivelAcesso'] == 2 ? 'selected' : ''; ?> >2</option>
                        </select>
                        </div>
                        <div class="item">
                        <label for="cpf">
                            <i data-feather="file" class="icone"></i>CPF
                        </label>
                        <input type="text" name="cpf" class="input" value="<?php echo $params['employee']['cpf']; ?>">
                        </div>
                        <div class="itemTodo">
                        <label for="endereco">
                            <i data-feather="map-pin" class="icone"></i>Endereço
                        </label>
                        <input type="text" name="endereco" class="input" value="<?php echo $params['employee']['endereco']; ?>">
                        </div>
                        <div class="item">
                        <label for="telefone">
                        <i data-feather="phone" class="icone"></i>Telefone
                        </label>
                        <input type="text" name="telefone" class="input" value="<?php echo $params['employee']['telefone']; ?>">
                        </div>
                        <div class="item">
                        <label for="dataNascimento">
                        <i data-feather="calendar" class="icone"></i>Data de Nascimento
                        </label>
                        <input type="date" name="dataNascimento" class="input" value="<?php echo $params['employee']['dataNascimento']; ?>">
                        </div>
                        <div class="itemTodo">
                        <label for="email">
                        <i data-feather="mail" class="icone"></i>Email
                        </label>
                        <input type="text" name="email" class="input" value="<?php echo $params['employee']['email']; ?>">
                        </div>
                        <div class="item">
                        <label for="usuario">
                        <i data-feather="user-plus" class="icone"></i>Usuário
                        </label>
                        <input type="text" name="usuario" class="input" value="<?php echo $params['employee']['usuario']; ?>">
                        </div>
                        <div class="item">
                        <label for="senha">
                        <i data-feather="lock" class="icone"></i>Senha
                        </label>
                        <input type="password" name="senha" class="input" value="<?php echo $params['employee']['usuario']; ?>"><br>
                        </div>

                        <button class="botao btnCancelar item">
                        CANCELAR <i data-feather="x" class="btnIcone"></i>
                        </button>
                        <button type="submit" class="botao btnCadastrar item">
                        ATUALIZAR <i data-feather="check" class="btnIcone"></i>
                        </button>

                    </form>
                    <h1>
                        <?php
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        ?>
                    </h1>
                </div>
                </main>

                <script src="/public/js/global.js"></script>
            </body>
            </html>
        <?php }
    }
?>
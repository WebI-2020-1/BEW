<?php
    class EmployeeModel extends DB{
        public function login($params){
            $login = addslashes($params['login']);
            $password = addslashes($params['password']);
            $sql = "SELECT * FROM Funcionario WHERE usuario = '{$login}' AND senha = md5('{$password}')";
            $result = DB::getFirst($sql);

            return $result;
        }

        public function create($params){
            $nome = addslashes($params['nome']);
            $nivelAcesso = addslashes(($params['nivelAcesso']));
            $cpf = addslashes($params['cpf']);
            $endereco = addslashes($params['endereco']);
            $telefone = addslashes($params['telefone']);
            $dataNascimento = addslashes($params['dataNascimento']);
            $email = addslashes($params['email']);
            $usuario = addslashes($params['usuario']);
            $senha = addslashes($params['senha']);


            $sql = "INSERT INTO Funcionario (nome, nivelAcesso, cpf, endereco, telefone, dataNascimento, usuario, senha, email)
            VALUES('{$nome}', '{$nivelAcesso}', '{$cpf}', '{$endereco}', '{$telefone}', '{$dataNascimento}', '{$usuario}', md5('{$senha}'), '{$email}')";

            return DB::execute($sql);
        }

        public function getAllEmployees(){
            $sql = "SELECT * FROM Funcionario ORDER BY nome ASC;";

            return DB::getAll($sql);
        }

        public function getEmployeeById($params){
            $id = addslashes($params['id']);

            $sql = "SELECT * FROM Funcionario WHERE id = '{$id}';";

            return DB::getFirst($sql);
        }

        public function update($params){
            $nome = addslashes($params['nome']);
            $nivelAcesso = addslashes(($params['nivelAcesso']));
            $cpf = addslashes($params['cpf']);
            $endereco = addslashes($params['endereco']);
            $telefone = addslashes($params['telefone']);
            $dataNascimento = addslashes($params['dataNascimento']);
            $email = addslashes($params['email']);
            $usuario = addslashes($params['usuario']);
            $senha = addslashes($params['senha']);
            $id = addslashes($params['employeeId']);

            $sql = "UPDATE Funcionario SET nome = '{$nome}', nivelAcesso = '{$nivelAcesso}', cpf = '{$cpf}', endereco = '{$endereco}', telefone = '{$telefone}', dataNascimento = '{$dataNascimento}', email = '{$email}', usuario = '{$usuario}', senha = md5('{$senha}') WHERE id = '{$id}'";

            return DB::execute($sql);
        }

        public function delete($params){
            $id = addslashes($params['id']);

            $sql = "DELETE FROM Funcionario WHERE id = '{$id}'";

            return DB::execute($sql);
        }
    }
?>

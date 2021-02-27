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
            $sql = "SELECT * FROM Funcionario;";

            return DB::getAll($sql);
        }
    }
?>
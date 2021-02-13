<?php
    class ClientModel extends DB{
        public function create($params){
            $nome = addslashes($params['nome']);
            $cpf = addslashes($params['cpf']);
            $endereco = addslashes($params['endereco']);
            $telefone = addslashes($params['telefone']);
            $dataNascimento = addslashes($params['dataNascimento']);

            $sql = "INSERT INTO Cliente (nome, cpf, endereco, telefone, dataNascimento) 
            VALUES ('{$nome}', '{$cpf}', '{$endereco}', '{$telefone}', '{$dataNascimento}')";

            return DB::execute($sql);
        }
        public function getAllClients(){
            $sql = "SELECT * FROM Cliente;";

            return DB::getAll($sql);
        }
    }
?>
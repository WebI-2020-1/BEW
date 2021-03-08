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
        public function getClient($params){
            $cliente = addslashes($params['itemSearch']);
            $sql = "SELECT * FROM Cliente WHERE nome like '%{$cliente}%'";

            return DB::getAll($sql);
        }
        public function getClientById($params){
            $id = addslashes($params['id']);

            $sql = "SELECT * FROM Cliente WHERE id = '{$id}'";

            return DB::getFirst($sql);
        }
        public function update($params){
            $nome = addslashes($params['nome']);
            $cpf = addslashes($params['cpf']);
            $endereco = addslashes($params['endereco']);
            $telefone = addslashes($params['telefone']);
            $dataNascimento = addslashes($params['dataNascimento']);
            $id = addslashes($params['clientId']);

            $sql = "UPDATE Cliente SET nome = '{$nome}', cpf = '{$cpf}', endereco = '{$endereco}', telefone = '{$telefone}', dataNascimento = '{$dataNascimento}' WHERE id = '{$id}'";

            return DB::execute($sql);
        }
        public function delete($params){
            $id = addslashes($params['id']);

            $sql = "DELETE FROM Cliente WHERE id = '{$id}'";

            return DB::execute($sql);

        }
    }
?>
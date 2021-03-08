<?php
    class ProviderModel extends DB{
        public function create($params){
            $nome = addslashes($params['nome']);
            $cnpj = addslashes($params['cnpj']);
            $endereco = addslashes($params['endereco']);
            $telefone = addslashes($params['telefone']);
            $email = addslashes($params['email']);

            $sql = "INSERT INTO Fornecedor (nome, cnpj, endereco, telefone, email) VALUES
            ('{$nome}', '{$cnpj}', '{$cnpj}', '{$telefone}', '{$email}')";

            return DB::execute($sql);
        }
        public function getAllProviders(){
            $sql = "SELECT * FROM Fornecedor;";

            return DB::getAll($sql);
        }
        public function getProviderById($params){
            $id = addslashes($params['id']);

            $sql = "SELECT * FROM Fornecedor WHERE id = '{$id}'";

            return DB::getFirst($sql);
        }
        
        public function update($params){
            $nome = addslashes($params['nome']);
            $cnpj = addslashes($params['cnpj']);
            $endereco = addslashes($params['endereco']);
            $telefone = addslashes($params['telefone']);
            $email = addslashes($params['email']);
            $id = addslashes($params['providerId']);

            $sql = "UPDATE Fornecedor SET nome = '{$nome}', cnpj = '{$cnpj}', endereco = '{$endereco}', telefone = '{$telefone}', email = '{$email}' WHERE id = '{$id}'";

            return DB::execute($sql);
        }
        public function delete($params){
            $id = addslashes($params['id']);

            $sql = "DELETE FROM Fornecedor WHERE id = '{$id}'";

            return DB::execute($sql);
        }
    }
?>
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
    }
?>
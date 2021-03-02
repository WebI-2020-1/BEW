<?php
    class ProductModel extends DB{
        public function create($params){
            $nome = addslashes($params['nome']);
            $unidade = addslashes($params['unidade']);
            $valorVenda = addslashes($params['valorVenda']);
            $codigoBarras = addslashes($params['codigoBarras']);
            $categoria = addslashes($params['categoria']);

            $sql = "INSERT INTO Produto (nome, unidade, valorVenda, codigoBarras, idCategoria) 
            VALUES ('{$nome}', '{$unidade}', '{$valorVenda}', '{$codigoBarras}', '{$categoria}');";
            
            return DB::execute($sql);
        }
        public function getProducts($params){
            $itemSearch = addslashes($params['itemSearch']);
            $sql = "SELECT * FROM Produto WHERE nome like '%{$itemSearch}%'";
            
            return DB::getAll($sql);
        }
        public function getAllProducts(){
            $sql = "SELECT * FROM  Produto;";

            return DB::getAll($sql);
        }
        public function getProductById($params){
            $id = addslashes($params['id']);
            $sql = "SELECT * FROM Produto WHERE id = '{$id}'";

            return DB::getFirst($sql);
        }
        public function update($params){
            $id = addslashes($params['productId']);
            $nome = addslashes($params['nome']);
            $unidade = addslashes($params['unidade']);
            $valorVenda = addslashes($params['valorVenda']);
            $codigoBarras = addslashes($params['codigoBarras']);
            $categoria = addslashes($params['categoria']);

            $sql = "UPDATE Produto SET nome = '{$nome}', unidade = '{$unidade}', valorVenda = '{$valorVenda}', codigoBarras = '{$codigoBarras}', idCategoria = '{$categoria}' WHERE id = '{$id}'";
            
            return DB::execute($sql);
        }

        public function delete($params){
            $id = addslashes($params['id']);

            $sql = "DELETE FROM Produto WHERE id = '{$id}'";

            return DB::execute($sql);
        }
    }
?>
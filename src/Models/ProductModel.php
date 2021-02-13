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
    }
?>
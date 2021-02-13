<?php
    class ProductSaleModel extends DB{
        public function create($params){
            $quantidade = addslashes($params['quantidade']);
            $idProduto = addslashes($params['idProduto']);
            $idVenda = addslashes($params['idVenda']);

            $sql = "INSERT INTO ProdutoVenda (quantidade, idProduto, idVenda) VALUES ({$quantidade}, {$idProduto}, {$idVenda});";
            
            return DB::execute($sql);
        }        
    }
?>
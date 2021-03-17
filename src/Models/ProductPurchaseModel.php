<?php
    class ProductPurchaseModel extends DB{
        public function create($params){
            $quantidade = addslashes($params['quantidade']);
            $idProduto = addslashes($params['idProduto']);
            $idCompra = addslashes($params['idCompra']);
            $valorUnitario = addslashes($params['valorUnitarioProduto']);

            $sql = "INSERT INTO ProdutoCompra (valorUnitario, quantidade, idProduto, idCompra) VALUES
            ('{$valorUnitario}', '{$quantidade}', '{$idProduto}', '{$idCompra}');";
            
            return DB::execute($sql);
        } 
        public function getProductsByVendaId($params){
            $idCompra = addslashes($params['idCompra']);
            $sql = "SELECT 
                        pc.*,
                        p.nome,
                        pc.valorUnitario
                    FROM 
                        ProdutoCompra AS pc
                    INNER JOIN
                        Produto AS p on p.id = pc.idProduto
                    WHERE pc.idCompra = '{$idCompra}'";

            return DB::getAll($sql);
        }
    }
?>
<?php
    class PromotionProductModel extends DB{
        public function create($params){
            $idProduto = addslashes($params['idProduto']);
            $idPromocao = addslashes($params['idPromocao']);
            $valorDesconto = addslashes($params['valorDesconto']);

            $sql = "INSERT INTO ProdutoPromocao (valorDesconto, idPromocao, idProduto) VALUES
            ('{$valorDesconto}', '{$idPromocao}', '{$idProduto}')";

            return DB::execute($sql);
        }
        public function getAllPromotionPromotions(){
            $sql = "SELECT p.nome as nomeProduto, pr.nome as nomePromocao, pp.* FROM ProdutoPromocao AS pp INNER JOIN Produto AS p ON p.id = pp.idProduto INNER JOIN Promocao AS pr ON pr.id = pp.idPromocao";

            return DB::getAll($sql);
        }
        public function getPromotionProductById($params){
            $id = addslashes($params['id']);

            $sql = "SELECT * FROM ProdutoPromocao WHERE id = '{$id}'";
            
            return DB::getFirst($sql);
        }
        public function update($params){
            $id = addslashes($params['promotionProductId']);
            $idProduto = addslashes($params['idProduto']);
            $idPromocao = addslashes($params['idPromocao']);
            $valorDesconto = addslashes($params['valorDesconto']);

            $sql = "UPDATE ProdutoPromocao SET valorDesconto = '{$valorDesconto}', idPromocao = '{$idPromocao}', idProduto = '{$idProduto}' WHERE id = '{$id}'";

            return DB::execute($sql);
        }
        public function delete($params){
            $id = addslashes($params['id']);

            $sql = "DELETE FROM ProdutoPromocao WHERE id = '{$id}'";

            return DB::execute($sql);
        }
    }
?>
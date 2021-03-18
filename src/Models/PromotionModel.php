<?php
    class PromotionModel extends DB{
        public function create($params){
            $nome = addslashes($params['nome']);
            $dataInicio = addslashes($params['dataInicio']);
            $dataFim = addslashes($params['dataFim']);

            $sql = "INSERT INTO Promocao (nome, dataInicio, dataFim) VALUES
            ('{$nome}', '{$dataInicio}', '{$dataFim}');";

            return DB::execute($sql);
        }
        public function getAllPromotions(){
            $sql = "SELECT * FROM Promocao";

            return DB::getAll($sql);
        }
        public function getPromotionById($params){
            $id = addslashes($params['id']);

            $sql = "SELECT * FROM Promocao WHERE id = '{$id}'";

            return DB::getFirst($sql);
        }
        public function update($params){
            $id = addslashes($params['promotionId']);
            $nome = addslashes($params['nome']);
            $dataInicio = addslashes($params['dataInicio']);
            $dataFim = addslashes($params['dataFim']);

            $sql = "UPDATE Promocao SET nome = '{$nome}', dataInicio = '{$dataInicio}', dataFim = '{$dataFim}' WHERE id = '{$id}'";

            return DB::execute($sql);
        }
        public function delete($params){
            $id = addslashes($params['id']);

            $sql = "DELETE FROM Promocao WHERE id = '{$id}'";

            return DB::execute($sql);
        }
        public function checkPromotion(){
            $sql = "DELETE FROM ProdutoPromocao WHERE idPromocao in(SELECT GROUP_CONCAT(id) FROM Promocao WHERE dataFim < NOW());";

            return DB::execute($sql);
        }
    }
?>
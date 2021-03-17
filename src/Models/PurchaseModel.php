<?php
    class PurchaseModel extends DB{
        public function create($params){
            $idFornecedor= addslashes($params['fornecedor']);
            $idFuncionario = addslashes($params['funcionario']);            
            $notaFiscal = uniqid();

            $sql = "INSERT INTO Compra (notaFiscal, idFornecedor, idFuncionario) VALUES ('{$notaFiscal}', '{$idFornecedor}', '{$idFuncionario}');";

            return DB::executeGetLastId($sql);
        }
        public function getAllPurchase(){
            $sql = "SELECT
                        c.id AS idCompra,
                        c.quantidade AS quantidade,
                        c.valorTotal AS valorTotal,
                        c.notaFiscal AS notaFiscal,
                        f.nome AS nomeFornecedor,
                        c.created AS dataCompra
                    FROM Compra AS c
                    INNER JOIN Fornecedor AS f ON f.id = c.idFornecedor;";

            return DB::getAll($sql);
        }
        public function getPurchase($params){
            $id = addslashes($params['idSearch']);
            $sql = "SELECT
                    c.id AS idCompra,
                    c.quantidade AS quantidade,
                    c.valorTotal AS valor,
                    fo.nome AS nomeFornecedor,
                    c.created AS dataCompra,
                    f.nome AS nomeFuncionario
                FROM Compra AS c
                INNER JOIN Fornecedor AS fo ON fo.id = c.idFornecedor
                INNER JOIN Funcionario AS f ON f.id = c.idFuncionario
                AND c.id = '{$id}';";

            return DB::getFirst($sql);
        }
    }
?>
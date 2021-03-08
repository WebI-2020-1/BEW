<?php
    class SaleModel extends DB{
        public function create($params){
            $idCliente = addslashes($params['cliente']);
            $idFuncionario = addslashes($params['funcionario']);
            $idFormaPagamento = addslashes($params['formaPagamento']);
            $notaFiscal = uniqid();

            $sql = "INSERT INTO Venda (notaFiscal, idCliente, idFuncionario, idFormaPagamento) VALUES ('{$notaFiscal}', '{$idCliente}', '{$idFuncionario}', '{$idFormaPagamento}');";

            return DB::executeGetLastId($sql);
        }
        public function getAllSales(){
            $sql = "SELECT
                        v.id AS idVenda,
                        v.quantidade AS quantidade,
                        v.valorTotal AS valor,
                        c.nome AS nomeCliente,
                        fp.descricao AS formaPagamento,
                        v.created AS dataVenda
                    FROM Venda AS v
                    INNER JOIN Cliente AS c ON c.id = v.idCliente
                    INNER JOIN FormaPagamento AS fp ON fp.id = v.idFormaPagamento;";

            return DB::getAll($sql);
        }
        public function getSale($params){
            $id = addslashes($params['idSearch']);
            $sql = "SELECT
                    v.id AS idVenda,
                    v.quantidade AS quantidade,
                    v.valorTotal AS valor,
                    c.nome AS nomeCliente,
                    fp.descricao AS formaPagamento,
                    v.created AS dataVenda,
                    f.nome AS nomeFuncionario
                FROM Venda AS v
                INNER JOIN Cliente AS c ON c.id = v.idCliente
                INNER JOIN FormaPagamento AS fp ON fp.id = v.idFormaPagamento
                INNER JOIN Funcionario AS f ON f.id = v.idFuncionario
                AND v.id = '{$id}';";

            return DB::getFirst($sql);
        }
    }
?>

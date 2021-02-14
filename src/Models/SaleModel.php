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
    }
?>
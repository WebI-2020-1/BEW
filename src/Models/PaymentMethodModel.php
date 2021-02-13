<?php
    class PaymentMethodModel extends DB{
        public function getPaymentMethods(){
            $sql = "SELECT * FROM FormaPagamento;";

            return DB::getAll($sql);
        }
    }
?>
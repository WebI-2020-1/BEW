<?php
    require_once(__DIR__.'../../../autoload.php');
    require_once('src/helpers/SessionValidate.php');
    
    class SaleController{
        public function index(){
            $sale = new AddSaleView();
        }

        public function store(){
            debug('show');
        }
    }
?>
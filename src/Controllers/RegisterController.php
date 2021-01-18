<?php
    require_once(__DIR__.'/../../autoload.php');

    class RegisterController{
        public function index(){
            $register = new RegisterView();
        }
        public function store($params){
            debug($params);
        }
    }
?>
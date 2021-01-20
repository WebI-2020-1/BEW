<?php
    require_once(__DIR__.'/../../autoload.php');
    class LoginController{
        public function index(){
            $login = new LoginView();
        }
        public function store($params){
            debug($params);
        }
    }
?>
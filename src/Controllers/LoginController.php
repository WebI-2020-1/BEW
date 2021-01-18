<?php
    require_once(__DIR__.'/../../autoload.php');
    class LoginController{
        public function index($params){
            $login = new LoginView($params);
        }
        public function store($params){
            debug($params);
        }
    }
?>
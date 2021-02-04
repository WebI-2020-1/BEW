<?php
    require_once(__DIR__.'/../../autoload.php');
    require_once('src/helpers/SessionValidate.php');
    
    class DashboardController{
        public function index($params){
            $dashboard = new DashboardView($params);
        }
    }
?>
<?php
    require_once(__DIR__.'/../autoload.php');

    class Routes{
        public function __construct($link){
            if(strpos($link,'register') != false || $link == 'register'){
                $register = new RegisterController();
                $register->index();
            }elseif(strpos($link,'login') != false || $link == 'login'){
                $login = new LoginController();
                $login->index();
            }elseif(strpos($link,'login/log-into') != false || $link == 'login/log-into'){
                $login = new LoginController();
                $login->store($_POST);
            }else{
                require_once(__DIR__.'/../src/Views/404.php');
            }
        }
    }
?>
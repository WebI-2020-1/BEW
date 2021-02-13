<?php
    require_once(__DIR__.'/../../autoload.php');
    class LoginController{
        public function index($params){
            session_destroy();
            $login = new LoginView($params);
        }
        public function store($params){
            $employee = new EmployeeModel();
            $result = $employee->login($params);

            if(!empty($result)){
                $_SESSION['dados_usuario'] = $result;
                return redirect('/dashboard');
            }else{
                return redirect('/login', 'Usuário ou senha incorretos');
            }
        }
    }
?>
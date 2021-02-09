<?php
    class EmployeeModel extends DB{
        public function login($params){
            $login = addslashes($params['login']);
            $password = addslashes($params['password']);
            $sql = "SELECT * FROM Funcionario WHERE usuario = '{$login}' AND senha = md5('{$password}')";
            $result = DB::getFirst($sql);
            
            return $result;
        }
    }
?>
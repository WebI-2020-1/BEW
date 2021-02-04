<?php
    class FuncionarioModel extends DB{
        public function login($param){
            $result = DB::getFirst("select * from Funcionario where usuario = '{$param['login']}' and senha = md5('{$param['password']}')");
            
            return $result;
        }
    }
?>
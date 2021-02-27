<?php
    require_once(__DIR__.'../../../autoload.php');
    require_once('src/helpers/SessionValidate.php');

    class EmployeeController{
        public function index(){
            $employee = new AddEmployeeView();
        }

        public function store($params){
            $employee = new EmployeeModel();
            $result = $employee->create($params);
            if($result){
                return redirect('/add/employee', 'Funcionário cadastrado com sucesso');
            }else{
                return redirect('/add/employee', 'Algo deu errado, tente novamente');
            }
        }

        public function show(){
            $employee = new EmployeeModel();
            $params['employees'] = $employee->getAllEmployees();
            $employee = new EmployeeView($params);
        }
    }

?>
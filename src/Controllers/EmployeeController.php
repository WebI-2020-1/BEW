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
        public function getEmployee($params){
            $employee = new EmployeeModel();
            echo json_encode($employee->getEmployeeById($params));
        }
        public function edit($params){
            $employee = new EmployeeModel();
            $params['employee'] = $employee->getEmployeeById($params);
            $employee = new EditEmployeeView($params);
        }
        public function update($params){
            $employee = new EmployeeModel();
            $result = $employee->update($params);

            if($result){
                return redirect('/employee', 'Funcionário atualizado com sucesso');
            }else{
                return redirect('/employee', 'Algo deu errado, tente novamente');
            }
        }
        public function delete($params){
            $employee = new EmployeeModel();
            $result = $employee->delete($params);
            if($result){
                return redirect('/employee', 'Funcionário deletado com sucesso');
            }else{
                return redirect('/employee', 'Algo deu errado, tente novamente');
            }
        }
    }

?>

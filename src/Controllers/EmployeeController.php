<?php
    require_once(__DIR__.'../../../autoload.php');
    require_once('src/helpers/SessionValidate.php');

    class EmployeeController{
        public function index(){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $employee = new AddEmployeeView();
            }else{
                return redirect('/dashboard', 'Usuário sem permissão');
            }
        }

        public function store($params){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $employee = new EmployeeModel();
                $result = $employee->create($params);
                if($result){
                    return redirect('/add/employee', 'Funcionário cadastrado com sucesso');
                }else{
                    return redirect('/add/employee', 'Algo deu errado, tente novamente');
                }
            }else{
                return redirect('/dashboard', 'Usuário sem permissão');
            }
        }

        public function show(){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $employee = new EmployeeModel();
                $params['employees'] = $employee->getAllEmployees();
                $employee = new EmployeeView($params);
            }else{
                return redirect('/dashboard', 'Usuário sem permissão');
            }
        }
        public function getEmployee($params){
            $employee = new EmployeeModel();
            echo json_encode($employee->getEmployeeById($params));
        }
        public function edit($params){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $employee = new EmployeeModel();
                $params['employee'] = $employee->getEmployeeById($params);
                $employee = new EditEmployeeView($params);
            }else{
                return redirect('/dashboard', 'Usuário sem permissão');
            }
        }
        public function update($params){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $employee = new EmployeeModel();
                $result = $employee->update($params);

                if($result){
                    return redirect('/employee', 'Funcionário atualizado com sucesso');
                }else{
                    return redirect('/employee', 'Algo deu errado, tente novamente');
                }
            }else{
                return redirect('/dashboard', 'Usuário sem permissão');
            }
        }
        public function delete($params){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $employee = new EmployeeModel();
                $result = $employee->delete($params);
                if($result){
                    return redirect('/employee', 'Funcionário deletado com sucesso');
                }else{
                    return redirect('/employee', 'Algo deu errado, tente novamente');
                }
            }else{
                return redirect('/dashboard', 'Usuário sem permissão');
            }
        }
    }

?>

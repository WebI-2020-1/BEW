<?php
    require_once(__DIR__.'../../../autoload.php');
    require_once('src/helpers/SessionValidate.php');
    require_once('src/helpers/Validate.php');

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
                $data = array(
                    'Nome' => $params['nome'],
                    'Nivel_de_acesso' => $params['nivelAcesso'],
                    'CPF' => $params['cpf'],
                    'Endereco' => $params['endereco'],
                    'Telefone' => $params['telefone'],
                    'Data_de_nascimento' => $params['dataNascimento'],
                    'Email' => $params['email'],
                    'Usuário' => $params['usuario'],
                    'Senha' => $params['senha']
                );
                $validator = array(
                    'Nome' => 'required',
                    'Nivel_de_acesso' => 'required',
                    'CPF' => 'required|cpf',
                    'Endereco' => 'required',
                    'Telefone' => 'required',
                    'Data_de_nascimento' => 'required',
                    'Email' => 'required|email',
                    'Usuário' => 'required',
                    'Senha' => 'required'
                );

                $resultValidation = validate($data,$validator);
                if($resultValidation['success']){
                    $employee = new EmployeeModel();
                    $result = $employee->create($params);
                    if($result){
                        return redirect('/employee', 'Funcionário cadastrado com sucesso');
                    }else{
                        return redirect('/add/employee', 'Ocorreu um erro interno. Contate os desenvolvedores.');
                    }
                }else{
                    return redirect('/employee', $resultValidation['message']);
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
                $data = array(
                    'Nome' => $params['nome'],
                    'Nivel_de_acesso' => $params['nivelAcesso'],
                    'CPF' => $params['cpf'],
                    'Endereco' => $params['endereco'],
                    'Telefone' => $params['telefone'],
                    'Data_de_nascimento' => $params['dataNascimento'],
                    'Email' => $params['email'],
                    'Usuário' => $params['usuario'],
                    'Senha' => $params['senha'],
                    'ID_do_funcionario' => $params['employeeId']
                );
                $validator = array(
                    'Nome' => 'required',
                    'Nivel_de_acesso' => 'required',
                    'CPF' => 'required|cpf',
                    'Endereco' => 'required',
                    'Telefone' => 'required',
                    'Data_de_nascimento' => 'required',
                    'Email' => 'email',
                    'Usuário' => 'required',
                    'Senha' => 'required',
                    'ID_do_funcionario' => 'required'
                );

                $resultValidation = validate($data,$validator);
                if($resultValidation['success']){
                    $employee = new EmployeeModel();
                    $result = $employee->update($params);

                    if($result){
                        return redirect('/employee', 'Funcionário atualizado com sucesso');
                    }else{
                        return redirect('/employee', 'Ocorreu um erro interno. Contate os desenvolvedores.');
                    }
                }else{
                    return redirect('/employee', $resultValidation['message']);
                }
            }else{
                return redirect('/dashboard', 'Usuário sem permissão');
            }
        }
        public function delete($params){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $data = array(
                    'ID_do_funcionario' => $params['id']
                );
                $validator = array(
                    'ID_do_funcionario' => 'required'
                );
                $resultValidation = validate($data,$validator);
                
                if($resultValidation['success']){
                    $employee = new EmployeeModel();
                    $result = $employee->delete($params);
                    if($result){
                        return redirect('/employee', 'Funcionário deletado com sucesso');
                    }else{
                        return redirect('/employee', 'Ocorreu um erro interno. Contate os desenvolvedores.');
                    }
                }else{
                    return redirect('/employee', $resultValidation['message']);
                }
            }else{
                return redirect('/dashboard', 'Usuário sem permissão');
            }
        }
    }

?>

<?php
    require_once(__DIR__.'../../../autoload.php');
    require_once('src/helpers/SessionValidate.php');
    require_once('src/helpers/Validate.php');

    class ClientController{
        public function index(){
            $client = new AddClientView();
        }

        public function store($params){
            $param['dataNascimento'] = str_replace('/','-',$params['dataNascimento']);

            $data = array(
                'Nome' => $params['nome'],
                'CPF' => $params['cpf'],
                'Endereco' => $params['endereco'],
                'Telefone' => $params['telefone'],
                'Data_de_nascimento' => $params['dataNascimento']
            );
            $validator = array(
                'Nome' => 'required',
                'CPF' => 'required|cpf',
                'endereco' => 'required',
                'telefone' => 'required',
                'Data_de_nascimento' => 'required'
            );
            $resultValidation = validate($data,$validator);
            if($resultValidation['success']){
                $client = new ClientModel();
                $result = $client->create($params);

                if($result){
                    return redirect('/client','Cliente cadastrado com sucesso.');
                }else{
                    return redirect('/add/client','Ocorreu um erro interno. Contate os desenvolvedores..');
                }
            }else{
                return redirect('/add/client', $resultValidation['message']);
            }

        }
        public function addSaleClient($params){
            $param['dataNascimento'] = str_replace('/','-',$params['dataNascimento']);

            $data = array(
                'Nome' => $params['nome'],
                'CPF' => $params['cpf'],
                'Endereco' => $params['endereco'],
                'Telefone' => $params['telefone'],
                'Data_de_nascimento' => $params['dataNascimento']
            );
            $validator = array(
                'Nome' => 'required',
                'CPF' => 'required|cpf',
                'endereco' => 'required',
                'telefone' => 'required',
                'Data_de_nascimento' => 'required'
            );
            $resultValidation = validate($data,$validator);

            if($resultValidation['success']){
                $client = new ClientModel();
                $result = $client->create($params);

                if($result){
                    echo json_encode('Cliente cadastrado com sucesso.');
                }else{
                    echo json_encode('Ocorreu um erro interno. Contate os desenvolvedores..');
                }
            }else{
                return redirect('/add/client', $resultValidation['message']);
            }
        }
        public function getAllClients(){
            $client = new ClientModel();
            echo json_encode($client->getAllClients());
        }

        public function getClient($params){
            $client = new ClientModel();
            echo json_encode($client->getClient($params));
        }
        public function getClientById($params){
            $client = new ClientModel();

            echo json_encode($client->getClientById($params));
        }

        public function show(){
            $client = new ClientModel();
            $params['clients'] = $client->getAllClients();
            $client = new ClientView($params);
        }

        public function edit($params){
            $client = new ClientModel();
            $params['client'] = $client->getClientById($params);
            $client = new EditClientView($params);
        }

        public function update($params){
            $param['dataNascimento'] = str_replace('/','-',$params['dataNascimento']);

            $data = array(
                'Nome' => $params['nome'],
                'CPF' => $params['cpf'],
                'Endereco' => $params['endereco'],
                'Telefone' => $params['telefone'],
                'Data_de_nascimento' => $params['dataNascimento'],
                'ID_do_cliente' => $params['clientId']
            );
            $validator = array(
                'Nome' => 'required',
                'CPF' => 'required|cpf',
                'endereco' => 'required',
                'telefone' => 'required',
                'Data_de_nascimento' => 'required',
                'ID_do_cliente' => 'required'
            );
            $resultValidation = validate($data,$validator);

            if($resultValidation['success']){
                $client = new ClientModel();
                $result = $client->update($params);

                if($result){
                    return redirect('/client','Cliente atualizado com sucesso.');
                }else{
                    return redirect('/client','Ocorreu um erro interno. Contate os desenvolvedores..');
                }
            }else{
                return redirect('/client', $resultValidation['message']);
            }
                
        }

        public function delete($params){
            $data = array(
                'ID_do_cliente' => $params['id']
            );
            $validator = array(
                'ID_do_cliente' => 'required'
            );
            $resultValidation = validate($data,$validator);

            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                if($resultValidation['success']){
                    $client = new ClientModel();
                    $result = $client->delete($params);

                    if($result){
                        return redirect('/client','Cliente deletado com sucesso.');
                    }else{
                        return redirect('/client','Ocorreu um erro interno. Contate os desenvolvedores..');
                    }
                }else{
                    return redirect('/client', $resultValidation['message']);
                }
            }else{
                return redirect('/client','Usuário sem permissão.');
            }
        }
    }
?>

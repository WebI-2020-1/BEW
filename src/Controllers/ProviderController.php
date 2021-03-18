<?php
    require_once(__DIR__.'/../../autoload.php');
    require_once('src/helpers/SessionValidate.php');
    require_once('src/helpers/Validate.php');

    class ProviderController{
        public function index(){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $provider = new AddProviderView();
            }else{
                return redirect('/provider', 'Usuário sem permissão.');
            }
        }

        public function store($params){
            $data = array(
                'Nome' => $params['nome'],
                'CNPJ' => $params['cnpj'],
                'Endereco' => $params['endereco'],
                'Telefone' => $params['telefone'],
                'Email' => $params['email']
            );
            $validator = array(
                'Nome' => 'required',
                'CNPJ' => 'required|cnpj',
                'Endereco' => 'required',
                'Telefone' => 'required',
                'Email' => 'required|email',
            );
            $resultValidation = validate($data,$validator);
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                if($resultValidation['success']){
                    $provider = new ProviderModel();
                    $result = $provider->create($params);
    
                    if($result){
                        return redirect('/provider', 'Forncedor cadastrado com sucesso');
                    }else{
                        return redirect('/add/provider', 'Ocorreu um erro interno. Contate os desenvolvedores.');
                    }
                }else{
                    return redirect('/provider', $resultValidation['message']);
                }
            }else{
                return redirect('/provider', 'Usuário sem permissão.');
            }
        }

        public function show(){
            $provider = new ProviderModel();
            $params['providers'] = $provider->getAllProviders();
            $providerView = new ProviderView($params);
        }
        public function getProvider($params){
            $provider = new ProviderModel();

            echo json_encode($provider->getProviderById($params));
        }

        public function getProviderByName($params){
            $provider = new ProviderModel();
            echo json_encode($provider->getProviderByName($params));
        }

        public function edit($params){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $provider = new ProviderModel();
                $params['provider'] = $provider->getProviderById($params);
                $provider = new EditProviderView($params);
             }else{
                return redirect('/provider', 'Usuário sem permissão.');
            }
        }

        public function update($params){
            $data = array(
                'Nome' => $params['nome'],
                'CNPJ' => $params['cnpj'],
                'Endereco' => $params['endereco'],
                'Telefone' => $params['telefone'],
                'Email' => $params['email'],
                'ID_do_fornecedor' => $params['providerId']
            );
            $validator = array(
                'Nome' => 'required',
                'CNPJ' => 'required|cnpj',
                'Endereco' => 'required',
                'Telefone' => 'required',
                'Email' => 'required|email',
                'ID_do_fornecedor' => 'required'
            );
            $resultValidation = validate($data,$validator);
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                if($resultValidation['success']){
                    $provider = new ProviderModel();
                    $result = $provider->update($params);

                    if($result){
                        return redirect('/provider', 'Fornecedor atualizado com sucesso');
                    }else{
                        return redirect('/provider', 'Ocorreu um erro interno. Contate os desenvolvedores.');
                    }
                }else{
                    return redirect('/provider', $resultValidation['message']);
                }
            }else{
                return redirect('/provider', 'Usuário sem permissão.');
            }
        }
        public function delete($params){
            $data = array(
                'ID_do_fornecedor' => $params['id']
            );
            $validator = array(
                'ID_do_fornecedor' => 'required'
            );
            $resultValidation = validate($data,$validator);
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                if($resultValidation['success']){
                    $provider = new ProviderModel();
                    $result = $provider->delete($params);

                    if($result){
                        return redirect('/provider', 'Fornecedor deletado com sucesso');
                    }else{
                        return redirect('/provider', 'Ocorreu um erro interno. Contate os desenvolvedores.');
                    }
                }else{
                    return redirect('/provider', $resultValidation['message']);
                }

            }else{
                return redirect('/provider', 'Usuário sem permissão.');
            }
        }
        public function getAllProviders(){
            $provider = new ProviderModel();
            echo json_encode($provider->getAllProviders());
        }
    }
?>

<?php
    require_once(__DIR__.'/../../autoload.php');
    require_once('src/helpers/SessionValidate.php');

    class ProviderController{
        public function index(){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $provider = new AddProviderView();
            }else{
                return redirect('/provider', 'Usuário sem permissão.');
            }
        }

        public function store($params){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $provider = new ProviderModel();
                $result = $provider->create($params);

                if($result){
                    return redirect('/add/provider', 'Forncedor cadastrado com sucesso');
                }else{
                    return redirect('/add/provider', 'Algo deu errado, tente novamente');
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
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $provider = new ProviderModel();
                $result = $provider->update($params);

                if($result){
                    return redirect('/provider', 'Fornecedor atualizado com sucesso');
                }else{
                    return redirect('/provider', 'Algo deu errado, tente novamente');
                }
            }else{
                return redirect('/provider', 'Usuário sem permissão.');
            }
        }
        public function delete($params){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $provider = new ProviderModel();
                $result = $provider->delete($params);

                if($result){
                    return redirect('/provider', 'Fornecedor deletado com sucesso');
                }else{
                    return redirect('/provider', 'Algo deu errado, tente novamente');
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

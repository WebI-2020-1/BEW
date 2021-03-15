<?php
    require_once(__DIR__.'/../../autoload.php');
    require_once('src/helpers/SessionValidate.php');

    class ProviderController{
        public function index(){
            $provider = new AddProviderView();
        }

        public function store($params){
            $provider = new ProviderModel();
            $result = $provider->create($params);

            if($result){
                return redirect('/add/provider', 'Forncedor cadastrado com sucesso');
            }else{
                return redirect('/add/provider', 'Algo deu errado, tente novamente');
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

        public function edit($params){
            $provider = new ProviderModel();
            $params['provider'] = $provider->getProviderById($params);
            $provider = new EditProviderView($params);
        }

        public function update($params){
            $provider = new ProviderModel();
            $result = $provider->update($params);

            if($result){
                return redirect('/provider', 'Fornecedor atualizado com sucesso');
            }else{
                return redirect('/provider', 'Algo deu errado, tente novamente');
            }
        }
        public function delete($params){
            $provider = new ProviderModel();
            $result = $provider->delete($params);

            if($result){
                return redirect('/provider', 'Fornecedor deletado com sucesso');
            }else{
                return redirect('/provider', 'Algo deu errado, tente novamente');
            }
        }
    }
?>

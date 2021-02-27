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
    }
?>
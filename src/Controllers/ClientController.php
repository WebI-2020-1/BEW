<?php
    require_once(__DIR__.'../../../autoload.php');
    require_once('src/helpers/SessionValidate.php');
    
    class ClientController{
        public function index(){
            $client = new AddClientView();
        }

        public function store($params){
            $client = new ClientModel();

            $cpf_valid = preg_match('/([0-9]{2}[\.]?[0-9]{3}[\.]?[0-9]{3}[\/]?[0-9]{4}[-]?[0-9]{2})|([0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2})/',$params['cpf']);
            $param['dataNascimento'] = str_replace('/','-',$params['dataNascimento']);

            if($cpf_valid){
                $result = $client->create($params);

                if($result){
                    return redirect('/add/client','Cliente cadastrado com sucesso.');
                }else{
                    return redirect('/add/client','Algo deu errado, tente novamente.');
                }
            }

        }
        // EMAIL-> /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    }
?>
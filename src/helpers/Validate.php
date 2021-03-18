<?php
    function validate($params, $validators, $success = false){
        foreach($params as $key => $param){
            $validate = explode('|',$validators[$key]);
            foreach($validate as $val){
                switch ($val) {
                    case 'required':
                        if(!empty($param)){
                            $success = true;
                            continue;
                        }else{
                            $message = $key.' é um campo obrigatório e não foi passado';
                            return array('success' => false, 'message' => str_replace('_',' ',$message) ?? null);
                        }
                        break;
                    case 'email':
                        if(preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',$param)){
                            $success = true;
                            continue;
                        }else{
                            $message = $key.' não é valido';
                            return array('success' => false, 'message' => str_replace('_',' ',$message) ?? null);
                        }
                        break;
                    case 'cpf':
                        if(preg_match('/([0-9]{2}[\.]?[0-9]{3}[\.]?[0-9]{3}[\/]?[0-9]{4}[-]?[0-9]{2})|([0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2})/',$param) && strlen(str_replace('.','',str_replace('-','',$param))) == 11){
                            $success = true;
                            continue;
                        }else{
                            $message = $key.' não é valido';
                            return array('success' => false, 'message' => str_replace('_',' ',$message) ?? null);
                        }
                        break;
                    case 'cnpj':
                        if(preg_match('/([0-9]{2}[\.]?[0-9]{3}[\.]?[0-9]{3}[\/]?[0-9]{4}[-]?[0-9]{2})|([0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2})/',$param)){
                            $success = true;
                            continue;
                        }else{
                            $message = $key.' não é valido';
                            return array('success' => false, 'message' => str_replace('_',' ',$message) ?? null);
                        }
                        break;
                }
            }
        }
        return array('success' => $success, 'message' => str_replace('_',' ',$message ?? null));
    }
?>
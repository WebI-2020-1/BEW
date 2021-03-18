<?php
    require_once(__DIR__.'/../../autoload.php');
    require_once('src/helpers/SessionValidate.php');
    require_once('src/helpers/Validate.php');
    class PromotionController{
        public function index(){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $promotion = new AddPromotionView();
            }else{
                return redirect('/promotion', 'Usuário sem permissão.');
            }
        }
        public function store($params){
            $data = array(
                'Nome' => $params['nome'],
                'Data_de_inicio' => $params['dataInicio'],
                'Data_fim' => $params['dataFim']
            );
            $validator = array(
                'Nome' => 'required',
                'Data_de_inicio' => 'required',
                'Data_fim' => 'required'
            );
            $resultValidation = validate($data,$validator);
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                if($resultValidation['success']){
                    $promotion = new PromotionModel();
                    $result = $promotion->create($params);
    
                    if($result){
                        return redirect('/promotion', 'Promoção cadastrada com sucesso.');
                    }else{
                        return redirect('/promotion', 'Aldo deu errado, tente novamente.');
                    }
                }else{
                    return redirect('/promotion', $resultValidation['message']);
                }
            }else{
                return redirect('/promotion', 'Usuário sem permissão.');
            }
        }
        public function show(){
            $promotion = new PromotionModel();
            $params['promotions'] = $promotion->getAllPromotions();
            $promotion = new PromotionView($params);
        }
        public function edit($params){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $promotion = new PromotionModel();
                $params = $promotion->getPromotionById($params);
                $promotion = new EditPromotionView($params);
            }else{
                return redirect('/promotion', 'Usuário sem permissão.');
            }
        }
        public function update($params){
            $data = array(
                'ID_da_promocao' => $params['promotionId'],
                'Nome' => $params['nome'],
                'Data_de_inicio' => $params['dataInicio'],
                'Data_fim' => $params['dataFim']
            );
            $validator = array(
                'Nome' => 'required',
                'Data_de_inicio' => 'required',
                'Data_fim' => 'required',
                'ID_da_promocao' => 'required'
            );
            $resultValidation = validate($data,$validator);
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                if($resultValidation['success']){
                    $promotion = new PromotionModel();
                    $result = $promotion->update($params);

                    if($result){
                        return redirect('/promotion', 'Promoção atualizada com sucesso.');
                    }else{
                        return redirect('/promotion', 'Aldo deu errado, tente novamente.');
                    }
                }else{
                    return redirect('/promotion', $resultValidation['message']);
                }
            }else{
                return redirect('/promotion', 'Usuário sem permissão.');
            }
        }
        public function delete($params){
            $data = array(
                'ID_da_promocao' => $params['id']
            );
            $validator = array(
                'ID_da_promocao' => 'required'
            );
            $resultValidation = validate($data,$validator);
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                if($resultValidation['success']){
                    $promotion = new PromotionModel();
                    $result = $promotion->delete($params);

                    if($result){
                        return redirect('/promotion', 'Promoção deletada com sucesso.');
                    }else{
                        return redirect('/promotion', 'Aldo deu errado, tente novamente.');
                    }
                }else{
                    return redirect('/promotion', $resultValidation['message']);
                }
            }else{
                return redirect('/promotion', 'Usuário sem permissão.');
            }
        }
    }
?>
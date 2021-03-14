<?php
    require_once(__DIR__.'/../../autoload.php');
    require_once('src/helpers/SessionValidate.php');
    class PromotionController{
        public function index(){
            $promotion = new AddPromotionView();
        }
        public function store($params){
            $promotion = new PromotionModel();
            $result = $promotion->create($params);

            if($result){
                return redirect('/promotion', 'Promoção cadastrada com sucesso.');
            }else{
                return redirect('/promotion', 'Aldo deu errado, tente novamente.');
            }
        }
        public function show(){
            $promotion = new PromotionModel();
            $params['promotions'] = $promotion->getAllPromotions();
            $promotion = new PromotionView($params);
        }
        public function edit($params){
            $promotion = new PromotionModel();
            $params = $promotion->getPromotionById($params);
            $promotion = new EditPromotionView($params);
        }
        public function update($params){
            $promotion = new PromotionModel();
            $result = $promotion->update($params);

            if($result){
                return redirect('/promotion', 'Promoção atualizada com sucesso.');
            }else{
                return redirect('/promotion', 'Aldo deu errado, tente novamente.');
            }
        }
        public function delete($params){
            $promotion = new PromotionModel();
            $result = $promotion->delete($params);

            if($result){
                return redirect('/promotion', 'Promoção deletada com sucesso.');
            }else{
                return redirect('/promotion', 'Aldo deu errado, tente novamente.');
            }
        }
    }
?>
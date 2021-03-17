<?php
    class PromotionProductController{
        public function __construct(){
            if($_SESSION['dados_usuario']['nivelAcesso'] != 2){
                return redirect('/promotion', 'Usuário sem permissão.');
            }

        }
        public function index(){
            $product = new ProductModel();
            $promotion = new PromotionModel();
            $params['products'] = $product->getAllProducts();
            $params['promotions'] = $promotion->getAllPromotions();
            $promotionProduct = new AddPromotionProductView($params);
        }
        public function store($params){
            $promotionProduct = new PromotionProductModel();
            $result = $promotionProduct->create($params);

            if($result){
                return redirect('/promotion-product', 'Relação da promoção ao produto cadastrada com sucesso.');
            }else{
                return redirect('/promotion-product', 'Aldo deu errado, tente novamente.');
            }
        }
        public function show(){
            $promotionProduct = new PromotionProductModel();
            $params['promotionProducts'] = $promotionProduct->getAllPromotionPromotions();
            $promotionProduct = new PromotionProductView($params);
        }
        public function edit($params){
            $promotionProduct = new PromotionProductModel();
            $params = $promotionProduct->getPromotionProductById($params);
            $product = new ProductModel();
            $promotion = new PromotionModel();
            $params['products'] = $product->getAllProducts();
            $params['promotions'] = $promotion->getAllPromotions();  
            $promotionProduct = new EditPromotionProductView($params);
        }
        public function update($params){
            $promotionProduct = new PromotionProductModel();
            $result = $promotionProduct->update($params);

            if($result){
                return redirect('/promotion-product', 'Relação da promoção ao produto atualizada com sucesso.');
            }else{
                return redirect('/promotion-product', 'Aldo deu errado, tente novamente.');
            }
        }
        public function delete($params){
            $promotionProduct = new PromotionProductModel();
            $result = $promotionProduct->delete($params);

            if($result){
                return redirect('/promotion-product', 'Relação da promoção ao produto deletada com sucesso.');
            }else{
                return redirect('/promotion-product', 'Aldo deu errado, tente novamente.');
            }
        }
    }
?>
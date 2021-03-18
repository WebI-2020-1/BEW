<?php
    require_once(__DIR__.'/../../autoload.php');
    require_once('src/helpers/SessionValidate.php');
    require_once('src/helpers/Validate.php');
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
            $data = array(
                'ID_do_produto' => $params['idProduto'],
                'ID_da_promocao' => $params['idPromocao'],
                'Valor_de_desconto' => $params['valorDesconto']
            );
            $validator = array(
                'ID_do_produto' => 'required',
                'ID_da_promocao' => 'required',
                'Valor_de_desconto' => 'required'
            );
            $resultValidation = validate($data,$validator);
            if($resultValidation['success']){
                $promotionProduct = new PromotionProductModel();
                $result = $promotionProduct->create($params);
    
                if($result){
                    return redirect('/promotion-product', 'Relação da promoção ao produto cadastrada com sucesso.');
                }else{
                    return redirect('/promotion-product', 'Aldo deu errado, tente novamente.');
                }
            }else{
                return redirect('/promotion-product', $resultValidation['message']);
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
            $data = array(
                'ID_do_produto' => $params['idProduto'],
                'ID_da_promocao' => $params['idPromocao'],
                'Valor_de_desconto' => $params['valorDesconto'],
                'ID_da_promocao_do_produto' => $params['promotionProductId']
            );
            $validator = array(
                'ID_do_produto' => 'required',
                'ID_da_promocao' => 'required',
                'Valor_de_desconto' => 'required',
                'ID_da_promocao_do_produto' => 'required'
            );
            $resultValidation = validate($data,$validator);
            if($resultValidation['success']){
                $promotionProduct = new PromotionProductModel();
                $result = $promotionProduct->update($params);

                if($result){
                    return redirect('/promotion-product', 'Relação da promoção ao produto atualizada com sucesso.');
                }else{
                    return redirect('/promotion-product', 'Aldo deu errado, tente novamente.');
                }
            }else{
                return redirect('/promotion-product', $resultValidation['message']);
            }
        }
        public function delete($params){
            $data = array(
                'ID_da_promocao_do_produto' => $params['id']
            );
            $validator = array(
                'ID_da_promocao_do_produto' => 'required'
            );
            $resultValidation = validate($data,$validator);
            if($resultValidation['success']){
                $promotionProduct = new PromotionProductModel();
                $result = $promotionProduct->delete($params);

                if($result){
                    return redirect('/promotion-product', 'Relação da promoção ao produto deletada com sucesso.');
                }else{
                    return redirect('/promotion-product', 'Aldo deu errado, tente novamente.');
                }
            }else{
                return redirect('/promotion-product', $resultValidation['message']);
            }
        }
    }
?>
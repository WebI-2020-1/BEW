<?php
    require_once(__DIR__.'../../../autoload.php');
    require_once('src/helpers/SessionValidate.php');
    require_once('src/helpers/Validate.php');

    class SaleController{
        public function index(){
            $paymentMethod = new PaymentMethodModel();
            $params['paymentMethods'] = $paymentMethod->getPaymentMethods();
            $sale = new AddSaleView($params);
        }

        public function store($params){
            $sale = new SaleModel();
            $params['funcionario'] = $_SESSION['dados_usuario']['id'];

            $data = array(
                'Cliente' => $params['cliente'],
                'Funcionario' => $params['funcionario'],
                'Forma_de_pagamento' => $params['formaPagamento']
            );
            $validator = array(
                'Cliente' => 'required',
                'Funcionario' => 'required',
                'Forma_de_pagamento' => 'required'
            );
            $resultValidation = validate($data,$validator);
            if($resultValidation['success']){
                $saleResult = $sale->create($params);
                $productSale = new ProductSaleModel();
                $resultProductSale = true;
                foreach($params['produtos'] as $key => $produto){
                    $params['idProduto'] = $produto;
                    $params['idVenda'] = $saleResult['lastInsertedId'];
                    $params['quantidade'] = $params['quantidadeVenda'][$key];

                    $data = array(
                        'Quantidade' => $params['quantidade'],
                        'ID_do_produto' => $params['idProduto'],
                        'ID_da_venda' => $params['idVenda']
                    );
                    $validator = array(
                        'Quantidade' => 'required',
                        'ID_do_produto' => 'required',
                        'ID_da_venda' => 'required'
                    );
                    $resultValidation = validate($data,$validator);
                    if($resultValidation['success']){
                        if(!$productSale->create($params)){
                            $resultProductSale = false;
                        }
                    }else{
                        return redirect('/sale',$resultValidation['message']);        
                    }
                }
                if($saleResult['success'] && $resultProductSale){
                    return redirect('/sale','Venda efetuada com sucesso.');
                }else{
                    return redirect('/add/sale','Ocorreu um erro interno. Contate os desenvolvedores..');
                }
            }else{
                return redirect('/sale',$resultValidation['message']);
            }

        }
        public function show(){
            $sales = new SaleModel();
            $params['sales'] = $sales->getAllSales();
            $sale = new SaleView($params);
        }
        public function getProducts($params){
            $productSale = new ProductSaleModel();

            echo json_encode($productSale->getProductsByVendaId($params));
        }
        public function getSale($params){
            $sale = new SaleModel();

            echo json_encode($sale->getSale($params));
        }
    }
?>

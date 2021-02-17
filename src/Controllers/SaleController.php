<?php
    require_once(__DIR__.'../../../autoload.php');
    require_once('src/helpers/SessionValidate.php');
    
    class SaleController{
        public function index(){
            $paymentMethod = new PaymentMethodModel();
            $params['paymentMethods'] = $paymentMethod->getPaymentMethods();
            $sale = new AddSaleView($params);
        }

        public function store($params){
            $sale = new SaleModel();
            $params['funcionario'] = $_SESSION['dados_usuario']['id'];
            $saleResult = $sale->create($params);
            $productSale = new ProductSaleModel();
            $resultProductSale = true;
            foreach($params['produtos'] as $key => $produto){
                $params['idProduto'] = $produto;
                $params['idVenda'] = $saleResult['lastInsertedId'];
                $params['quantidade'] = $params['quantidadeVenda'][$key];
                if(!$productSale->create($params)){
                    $resultProductSale = false;
                }
            }
            if($saleResult['success'] && $resultProductSale){
                return redirect('/add/sale','Venda efetuada com sucesso.');
            }else{
                return redirect('/add/sale','Algo deu errado, tente novamente.');
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
    }
?>
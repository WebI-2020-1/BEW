<?php
    require_once(__DIR__.'/../../autoload.php');
    require_once('src/helpers/SessionValidate.php');
    class PurchaseController{
        public function index(){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $purchase = new AddPurchaseView();
            }else{
                return redirect('/dashboard','Usuário sem permissão.');
            }
        }
        public function store($params){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $purchase = new PurchaseModel();
                $params['funcionario'] = $_SESSION['dados_usuario']['id'];
                $purchaseResult = $purchase->create($params);
                $productPurchase = new ProductPurchaseModel();
                $resultProductPurchase = true;
                foreach($params['produtos'] as $key => $produto){
                    $params['idProduto'] = $produto;
                    $params['idCompra'] = $purchaseResult['lastInsertedId'];
                    $params['quantidade'] = $params['quantidadeCompra'][$key];
                    $params['valorUnitarioProduto'] = $params['valorUnitario'][$key];

                    if(!$productPurchase->create($params)){
                        $resultProductPurchase = false;
                    }
                }
                if($purchaseResult['success'] && $resultProductPurchase){
                    return redirect('/purchase','Compra efetuada com sucesso.');
                }else{
                    return redirect('/purchase','Algo deu errado, tente novamente.');
                }
            }else{
                return redirect('/dashboard','Usuário sem permissão.');
            }
        }
        public function show(){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $purchase = new PurchaseModel();
                $params['purchases'] = $purchase->getAllPurchase();
                $purchase = new PurchaseView($params);
            }else{
                return redirect('/dashboard','Usuário sem permissão.');
            }
        }
        public function getProducts($params){
            $productPurchase = new ProductPurchaseModel();

            echo json_encode($productPurchase->getProductsByVendaId($params));
        }
        public function getPurchase($params){
            $purchase = new PurchaseModel();

            echo json_encode($purchase->getPurchase($params));
        }
    }
?>
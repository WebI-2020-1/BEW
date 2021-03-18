<?php
    require_once(__DIR__.'/../../autoload.php');
    require_once('src/helpers/SessionValidate.php');
    require_once('src/helpers/Validate.php');
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

                $data = array(
                    'Funcionario' => $params['funcionario'],
                    'Fornecedor' => $params['fornecedor']
                );
                $validator = array(
                    'Funcionario' => 'required',
                    'Fornecedor' => 'required'
                );
                $resultValidation = validate($data,$validator);
                if($resultValidation['success']){
                    $purchaseResult = $purchase->create($params);
                    $productPurchase = new ProductPurchaseModel();
                    $resultProductPurchase = true;
                    foreach($params['produtos'] as $key => $produto){
                        $params['idProduto'] = $produto;
                        $params['idCompra'] = $purchaseResult['lastInsertedId'];
                        $params['quantidade'] = $params['quantidadeCompra'][$key];
                        $params['valorUnitarioProduto'] = $params['valorUnitario'][$key];
                        
                        $data = array(
                            'Quantidade' => $params['quantidade'],
                            'ID_do_produto' => $params['idProduto'],
                            'ID_da_compra' => $params['idCompra'],
                            'Valor_unitario_do_produto' => $params['valorUnitarioProduto']
                        );

                        $validator = array(
                            'Quantidade' => 'required',
                            'ID_do_produto' => 'required',
                            'ID_da_compra' => 'required',
                            'Valor_unitario_do_produto' => 'required'
                        );
                        if($resultValidation['success']){
                            if(!$productPurchase->create($params)){
                                $resultProductPurchase = false;
                            }
                        }else{
                            return redirect('/purchase',$resultValidation['message']);   
                        }
                    }
                    if($purchaseResult['success'] && $resultProductPurchase){
                        return redirect('/purchase','Compra efetuada com sucesso.');
                    }else{
                        return redirect('/add/purchase','Ocorreu um erro interno. Contate os desenvolvedores..');
                    }
                }else{
                    return redirect('/purchase',$resultValidation['message']);
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
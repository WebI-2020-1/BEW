<?php
    require_once(__DIR__.'/../../autoload.php');
    require_once('src/helpers/SessionValidate.php');
    require_once('src/helpers/Validate.php');

    class ProductController{
        public function index(){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $category = new CategoryModel();
                $params['categories'] = $category->getAllCategories();

                $product = new AddProductView($params);
            }else{
                return redirect('/product','Usuário sem permissão.');
            }
        }

        public function store($params){
            $data = array(
                'Nome' => $params['nome'],
                'Unidade' => $params['unidade'],
                'Valor_de_venda' => $params['valorVenda'],
                'Codigo_de_barras' => $params['codigoBarras'],
                'Categoria' => $params['categoria']
            );
            $validator = array(
                'Nome' => 'required',
                'Unidade' => 'required',
                'Valor_de_venda' => 'required',
                'Codigo_de_barras' => 'required',
                'Categoria' => 'required'
            );
            $resultValidation = validate($data,$validator);
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                if($resultValidation['success']){
                    $product = new ProductModel();
                    $result = $product->create($params);
    
                    if($result){
                        return redirect('/product','Produto inserido com sucesso.');
                    }else{
                        return redirect('/add/product','Ocorreu um erro interno. Contate os desenvolvedores..');
                    }
                }else{
                    return redirect('/product',$resultValidation['message']);
                }
            }else{  
                return redirect('/product','Usuário sem permissão.');
            }
        }

        public function show(){
            $product = new ProductModel();
            $params['products'] = $product->getAllProducts();
            $product = new ProductView($params);
        }

        public function getProducts($params){
            $products = new ProductModel();
            echo json_encode($products->getProducts($params));
        }
        public function getProduct($params){
            $product = new ProductModel();
            echo json_encode($product->getProductById($params));
        }
        public function edit($params){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $product = new ProductModel();
                $category = new CategoryModel();
                $params['product'] = $product->getProductById($params);
                $params['categories'] = $category->getAllCategories();
                $product = new EditProductView($params);
            }else{
                return redirect('/product','Usuário sem permissão.');
            }
        }

        public function update($params){
            $data = array(
                'Nome' => $params['nome'],
                'Unidade' => $params['unidade'],
                'Valor_de_venda' => $params['valorVenda'],
                'Codigo_de_barras' => $params['codigoBarras'],
                'Categoria' => $params['categoria'],
                'ID_do_produto' => $params['productId']
            );
            $validator = array(
                'Nome' => 'required',
                'Unidade' => 'required',
                'Valor_de_venda' => 'required',
                'Codigo_de_barras' => 'required',
                'Categoria' => 'required',
                'ID_do_produto' => 'required'
            );
            $resultValidation = validate($data,$validator);

            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                if($resultValidation['success']){
                    $product = new ProductModel();
                    $result = $product->update($params);

                    if($result){
                        return redirect('/product', 'Produto atualizado com sucesso.');
                    }else{
                        return redirect('/product', 'Ocorreu um erro interno. Contate os desenvolvedores..');
                    }
                }else{
                    return redirect('/product',$resultValidation['message']);
                }
            }else{
                return redirect('/product','Usuário sem permissão.');
            }
        }

        public function delete($params){
            $data = array(
                'ID_do_produto' => $params['id']
            );
            $validator = array(
                'ID_do_produto' => 'required'
            );
            $resultValidation = validate($data,$params);
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                if($resultValidation['success']){
                    $product = new ProductModel();
                    $result = $product->delete($params);

                    if($result){
                        return redirect('/product', 'Produto deletado com sucesso.');
                    }else{
                        return redirect('/product', 'Aldo deu errado, tente novamente.');
                    }
                }else{
                    return redirect('/product',$resultValidation['message']);
                }
            }else{
                return redirect('/product','Usuário sem permissão.');
            }
        }
    }
?>

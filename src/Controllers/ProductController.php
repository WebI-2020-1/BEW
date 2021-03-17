<?php
    require_once(__DIR__.'/../../autoload.php');
    require_once('src/helpers/SessionValidate.php');

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
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $product = new ProductModel();
                $result = $product->create($params);

                if($result){
                    return redirect('/add/product','Produto inserido com sucesso.');
                }else{
                    return redirect('/add/product','Algo deu errado, tente novamente.');
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
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $product = new ProductModel();
                $result = $product->update($params);

                if($result){
                    return redirect('/product', 'Produto atualizado com sucesso.');
                }else{
                    return redirect('/product', 'Algo deu errado, tente novamente.');
                }
            }else{
                return redirect('/product','Usuário sem permissão.');
            }
        }

        public function delete($params){
            if($_SESSION['dados_usuario']['nivelAcesso'] == 2){
                $product = new ProductModel();
                $result = $product->delete($params);

                if($result){
                    return redirect('/product', 'Produto deletado com sucesso.');
                }else{
                    return redirect('/product', 'Aldo deu errado, tente novamente.');
                }
            }else{
                return redirect('/product','Usuário sem permissão.');
            }
        }
    }
?>

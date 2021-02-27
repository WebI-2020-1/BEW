<?php
    require_once(__DIR__.'/../../autoload.php');
    require_once('src/helpers/SessionValidate.php');

    class ProductController{
        public function index(){
            $category = new CategoryModel();
            $params['categories'] = $category->getAllCategories();

            $product = new AddProductView($params);
        }

        public function store($params){
            $product = new ProductModel();
            $result = $product->create($params);

            if($result){
                return redirect('/add/product','Produto inserido com sucesso.');
            }else{
                return redirect('/add/product','Algo deu errado, tente novamente.');
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
    }
?>
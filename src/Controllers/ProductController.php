<?php
    require_once(__DIR__.'/../../autoload.php');
    require_once('src/helpers/SessionValidate.php');

    class ProductController{
        public function index(){
            $category = new CategoryModel();
            $params['categories'] = $category->getAllCategories();

            $product = new AddProductView($params);
        }
    }
?>
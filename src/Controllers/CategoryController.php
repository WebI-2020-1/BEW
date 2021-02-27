<?php
    require_once(__DIR__.'/../../autoload.php');
    require_once('src/helpers/SessionValidate.php');

    class CategoryController{
        public function index(){
            $category = new AddCategoryView();
        }
        public function store($params){
            $category = new CategoryModel();
            $result = $category->create($params);

            if($result){
                return redirect('/add/category','Categoria inserida com sucesso');
            }else{
                return redirect('/add/category','Aconteceu um erro, tente novamente mais tarde.');
            }
        }
        
        public function show(){
            $category = new CategoryModel();
            $params['categories'] = $category->getAllCategories();
            $category = new CategoryView($params);
        }
    }
?>
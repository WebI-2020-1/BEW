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
                return redirect('/add/category','Algo deu errado, tente novamente.');
            }
        }
        
        public function show(){
            $category = new CategoryModel();
            $params['categories'] = $category->getAllCategories();
            $category = new CategoryView($params);
        }
        public function edit($params){
            $category = new CategoryModel();
            $params['category'] = $category->getCategoryById($params);
            $category = new EditCategoryView($params);
        }
        public function update($params){
            $category = new CategoryModel();
            $result = $category->update($params);

            if($result){
                return redirect('/category', 'Categoria atualizada com sucesso.');
            }else{
                return redirect('/category', 'Algo deu errado, tente novamente.');
            }
        }

        public function delete($params){
            $category = new CategoryModel();
            $result = $category->delete($params);

            if($result){
                return redirect('/category', 'Categoria deletada com sucesso.');
            }else{
                return redirect('/category', 'Algo deu errado, tente novamente.');
            }
        }
    }
?>
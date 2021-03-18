<?php
    require_once(__DIR__.'/../../autoload.php');
    require_once('src/helpers/SessionValidate.php');
    require_once('src/helpers/Validate.php');

    class CategoryController{
        public function index(){
            $category = new AddCategoryView();
        }
        public function store($params){
            $data = array(
                'Nome_da_categoria' => $params['nome']
            );
            $validator = array(
                'Nome_da_categoria' => 'required'
            );
            $resultValidation = validate($data,$validator);
            if($validator['success']){
                $category = new CategoryModel();
                $result = $category->create($params);
                if($result){
                    return redirect('/category','Categoria inserida com sucesso');
                }else{
                    return redirect('/add/category','Ocorreu um erro interno. Contate os desenvolvedores..');
                }
            }else{
                return redirect('/add/category',$resultValidation['message']);
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
            $data = array(
                'Nome_da_categoria' => $params['nome'],
                'ID_da_categoria' => $params['categoryId']
            );
            $validator = array(
                'Nome_da_categoria' => 'required',
                'ID_da_categoria' => 'required'
            );
            $resultValidation = validate($data,$validator);
            if($validator['success']){
                $category = new CategoryModel();
                $result = $category->update($params);

                if($result){
                    return redirect('/category', 'Categoria atualizada com sucesso.');
                }else{
                    return redirect('/category', 'Ocorreu um erro interno. Contate os desenvolvedores..');
                }
            }else{
                return redirect('/category',$resultValidation['message']);
            }
        }

        public function delete($params){
            $data = array(
                'ID_da_categoria' => $params['id']
            );
            $validator = array(
                'ID_da_categoria' => 'required'
            );
            $resultValidation = validate($data,$validator);
            if($validator['success']){
                $category = new CategoryModel();
                $result = $category->delete($params);

                if($result){
                    return redirect('/category', 'Categoria deletada com sucesso.');
                }else{
                    return redirect('/category', 'Ocorreu um erro interno. Contate os desenvolvedores..');
                }
            }else{
                return redirect('/category',$resultValidation['message']);
            }
        }
    }
?>
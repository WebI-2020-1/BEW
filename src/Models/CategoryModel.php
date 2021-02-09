<?php
    class CategoryModel extends DB{
        public function create($params){
            $nome = addslashes($params['nome']);
            $sql = "INSERT INTO Categoria(nome) VALUES('{$nome}');";
            $category = DB::execute($sql);

            return $category;
        }
        public function getAllCategories(){
            $sql = "SELECT * FROM Categoria;";
            $categories = DB::getAll($sql);
            
            return $categories;
        }
    }
?>
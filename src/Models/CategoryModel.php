<?php
    class CategoryModel extends DB{
        public function create($params){
            $nome = addslashes($params['nome']);
            $sql = "INSERT INTO Categoria(nome) VALUES('{$nome}');";
            $category = DB::execute($sql);

            return $category;
        }
        public function getAllCategories(){
            $sql = "SELECT * FROM Categoria ORDER BY nome ASC;";
            $categories = DB::getAll($sql);
            
            return $categories;
        }

        public function getCategoryById($params){
            $id = addslashes($params['id']);

            $sql = "SELECT * FROM Categoria WHERE id = '{$id}'";

            return DB::getFirst($sql);
        }
        public function update($params){
            $nome = addslashes($params['nome']);
            $id = addslashes($params['categoryId']);
            $sql = "UPDATE Categoria SET nome = '{$nome}' WHERE id = '{$id}'";

            return DB::execute($sql);
        }
        public function delete($params){
            $id = addslashes($params['id']);

            $sql = "DELETE FROM Categoria WHERE id = '{$id}'";

            return DB::execute($sql);
        }
    }
?>
<?php
    class ProductModel extends DB{
        public function create($params){
            $nome = addslashes($params['nome']);
            $unidade = addslashes($params['unidade']);
            $valorVenda = addslashes($params['valorVenda']);
            $codigoBarras = addslashes($params['codigoBarras']);
            $categoria = addslashes($params['categoria']);

            $sql = "INSERT INTO Produto (nome, unidade, valorVenda, codigoBarras, idCategoria)
            VALUES ('{$nome}', '{$unidade}', '{$valorVenda}', '{$codigoBarras}', '{$categoria}');";

            return DB::execute($sql);
        }
        public function getProducts($params){
            $itemSearch = addslashes($params['itemSearch']);

            $sql = "SELECT
                    p.*,
                    CASE
                        WHEN
                            pp.valorDesconto IS NOT NULL
                                AND pr.dataInicio <= NOW()
                                AND pr.dataFim >= NOW()
                        THEN
                            FORMAT((p.valorVenda - pp.valorDesconto),
                                2)
                        ELSE FORMAT(p.valorVenda, 2)
                    END AS valorVenda
                FROM
                    Produto AS p
                        LEFT JOIN
                    ProdutoPromocao AS pp ON p.id = pp.idProduto
                        LEFT JOIN
                    Promocao AS pr ON pr.id = pp.idPromocao
                WHERE p.nome like '%{$itemSearch}%'";

            return DB::getAll($sql);
        }
        public function getAllProducts(){
            $sql = "SELECT * FROM  Produto ORDER BY nome ASC;";

            return DB::getAll($sql);
        }
        public function getProductById($params){
            $id = addslashes($params['id']);
            //$sql = "SELECT * FROM Produto WHERE id = '{$id}'";
            $sql = "SELECT p.id,
                p.nome,
                p.unidade,
                p.quantidade,
                p.valorVenda,
                p.valorCompra,
                p.codigoBarras,
                c.nome AS nomeCategoria
                FROM Produto AS p
                INNER JOIN Categoria AS c ON c.id = p.idCategoria
                WHERE p.id = '{$id}';";


            return DB::getFirst($sql);
        }
        public function update($params){
            $id = addslashes($params['productId']);
            $nome = addslashes($params['nome']);
            $unidade = addslashes($params['unidade']);
            $valorVenda = addslashes($params['valorVenda']);
            $codigoBarras = addslashes($params['codigoBarras']);
            $categoria = addslashes($params['categoria']);

            $sql = "UPDATE Produto SET nome = '{$nome}', unidade = '{$unidade}', valorVenda = '{$valorVenda}', codigoBarras = '{$codigoBarras}', idCategoria = '{$categoria}' WHERE id = '{$id}'";

            return DB::execute($sql);
        }

        public function delete($params){
            $id = addslashes($params['id']);

            $sql = "DELETE FROM Produto WHERE id = '{$id}'";

            return DB::execute($sql);
        }
    }
?>

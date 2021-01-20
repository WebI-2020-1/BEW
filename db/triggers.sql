DELIMITER $$
    CREATE TRIGGER ProdutoVendaInsert BEFORE INSERT ON ProdutoVenda
    FOR EACH ROW BEGIN

    -- valorUnitario (ProdutoVenda) = valorVenda (Produto)
    -- valorTotal (ProdutoVenda) = quantidade * valorUnitario
        SET NEW.valorUnitario = (SELECT valorVenda FROM Produto WHERE id = NEW.idProduto);
        SET NEW.valorTotal = NEW.quantidade * NEW.valorUnitario;

    -- quantidade (Produto) -= quantidade (ProdutoVenda)
        UPDATE Produto
        SET quantidade = quantidade - NEW.quantidade
        WHERE id = NEW.idProduto;
    -- quantidade (Venda) += quantidade(ProdutoVenda)
    -- valorTotal (Venda) += valorTotal (ProdutoVenda)
        UPDATE Venda
        SET quantidade = quantidade + NEW.quantidade,
            valorTotal = valorTotal + NEW.valorTotal
        WHERE id = NEW.idVenda;
END $$

    CREATE TRIGGER ProdutoVendaUpdate BEFORE UPDATE ON ProdutoVenda
    FOR EACH ROW BEGIN

    -- valorTotal (ProdutoVenda) = quantidade * valorUnitario
        SET NEW.valorTotal = NEW.quantidade * OLD.valorUnitario;
    -- quantidade (Produto) -= quantidade (ProdutoVenda)
        UPDATE Produto
        SET quantidade = quantidade + (OLD.quantidade - NEW.quantidade)
        WHERE id = NEW.idProduto;

    -- quantidade (Venda) += quantidade(ProdutoVenda)
    -- valorTotal (Venda) += valorTotal (ProdutoVenda)
        UPDATE Venda
        SET quantidade = quantidade - (OLD.QUANTIDADE - NEW.quantidade),
            valorTotal = valorTotal + OLD.valorTotal
        WHERE id = NEW.idVenda;
END $$

    CREATE TRIGGER ProdutoCompraInsert BEFORE INSERT ON ProdutoCompra
    FOR EACH ROW BEGIN
    -- valorCompra (Produto) = valorUnitario (Compra)
    -- quantidade (Produto) += quantidade (ProdutoCompra)
        UPDATE Produto
            SET valorCompra = NEW.valorUnitario,
                quantidade = quantidade + NEW.quantidade
            WHERE id = NEW.idProduto;

    -- valorTotal (ProdutoCompra) - quantidade * valor unitario
            SET NEW.valorTotal = NEW.quantidade * NEW.valorUnitario;

    -- quantidade (Compra) += quantidade (ProdutoCompra)
    -- valorTotal (Compra) += valorTotal (ProdutoCompra)
        UPDATE Compra
            SET quantidade = quantidade + NEW.quantidade,
                valorTotal = valorTotal + NEW.valorTotal
            WHERE id = NEW.idCompra;
    --
END $$

    CREATE TRIGGER ProdutoCompraUpdate BEFORE UPDATE ON ProdutoCompra
    FOR EACH ROW BEGIN
    -- valorCompra (Produto) = valorUnitario (Compra)
        IF (NEW.created = (SELECT MAX(created) FROM ProdutoCompra WHERE idProduto = NEW.idProduto)) THEN
            UPDATE Produto
                SET valorCompra = NEW.valorUnitario
                WHERE id = NEW.idProduto;
        END IF;

    -- quantidade (Produto) += quantidade (ProdutoCompra)
        UPDATE Produto
            SET quantidade = quantidade - (OLD.quantidade - NEW.quantidade)
            WHERE id = NEW.idProduto;

    -- valorTotal (ProdutoCompra) - quantidade * valor unitario
        SET NEW.valorTotal = NEW.quantidade * NEW.valorUnitario;


    -- quantidade (Compra) += quantidade (ProdutoCompra)
    -- valorTotal (Compra) += valorTotal (ProdutoCompra)
        UPDATE Compra
            SET quantidade = quantidade - (OLD.quantidade - NEW.quantidade),
                valorTotal = valorTotal + OLD.valorTotal
            WHERE id = NEW.idCompra;
END $$

DELIMITER ;
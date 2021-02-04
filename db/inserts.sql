INSERT INTO Categoria (nome) VALUES
    ('cereais'),
    ('apícolas');

INSERT INTO Produto (nome, unidade, valorVenda, codigoBarras, idCategoria) VALUES
    ('Quinoa Orgânica', '250g', 4.50, 'abc1234', 1),
    ('Mel', '1kg', 23.50, 'mel2456', 2),
    ('Abelha Orgânica', '10un', 50.00, 'bee50u', 2);

INSERT INTO funcionario (nome, nivelAcesso, cpf, endereco, telefone, dataNascimento, usuario, senha, email) VALUES
    ('Natasha', 0, '123.456.789-00', 'Rua A', '(12) 34567-8900', '2000-02-18', 'Nat', '202cb962ac59075b964b07152d234b70', 'natasha@buonasera.com'),
    ('Katuxa', 1, '012.345.678-90', 'Rua B', '(01) 23456-7890', '1998-08-02', 'Kat', '250cf8b51c773f3f8dc8b4be867a9a02', 'katuxa@buonasera.com');

INSERT INTO Cliente (nome, cpf, endereco, telefone, dataNascimento) VALUES
    ('Tiago', '555.111.777-22', 'Rua Bonacera', '(77) 4002-8922', '1995-07-24'),
    ('Lili', '432.542.142-11', 'Rua MariaJuana', '(55) 99922-5432', '1990-09-12');

INSERT INTO FormaPagamento (descricao) VALUES
    ('Dinheiro'),
    ('Débito'),
    ('Crédito');

INSERT INTO Fornecedor (nome, cnpj, endereco, telefone, email) VALUES
    ('Lucas', '05.103.548/0001-80', 'Rua Jesus', '(12) 99255-4242', 'lucas@lapa.com'),
    ('Uelio', '17.733.974/0001-87', 'Rua C', '(55) 95641-5423', 'uelio@vet.com');
    
INSERT INTO Compra (notaFiscal, idFornecedor, idFuncionario) VALUES
    ('123', 1, 2),
    ('456', 2, 1);

INSERT INTO produtocompra (valorUnitario, quantidade, idProduto, idCompra) VALUES
    (2.00, 80, 1, 1),
    (2.50, 20, 1, 2),
    (12.50, 100, 2, 2),
    (22.00, 15, 3, 2);

INSERT INTO Venda (notaFiscal, idCliente, idFuncionario, idFormaPagamento) VALUES
    ('543134', 2, 1, 1),
    ('454547', 1, 2, 2);

INSERT INTO ProdutoVenda (quantidade, idProduto, idVenda) VALUES
    (5, 1, 1),
    (2, 3, 1),
    (4, 2, 2),
    (1, 3, 2);

INSERT INTO Promocao (nome, dataInicio, dataFim) VALUES
    ('Promoção da Abelhinha', '2021-01-21', '2021-01-30');

INSERT INTO ProdutoPromocao (valorDesconto, idPromocao, idProduto) VALUES
    (5.50, 1, 2),
    (8.00, 1, 3);

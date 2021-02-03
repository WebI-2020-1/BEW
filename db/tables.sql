CREATE TABLE Categoria (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP(),
    edited DATETIME
);
CREATE TABLE Produto (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    unidade VARCHAR(10) NOT NULL,
    quantidade INT DEFAULT 0,
    valorVenda FLOAT(2) DEFAULT 0,
    desconto FLOAT(2) DEFAULT 0,
    valorCompra FLOAT(2) DEFAULT 0,
    codigoBarras VARCHAR(50),
    idCategoria INT REFERENCES Categoria(id),
    created DATETIME DEFAULT CURRENT_TIMESTAMP(),
    edited DATETIME
);
CREATE TABLE Funcionario (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    nivelAcesso INT NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    endereco VARCHAR(80),
    telefone VARCHAR(15),
    dataNascimento DATE,
    usuario VARCHAR(20),
    senha VARCHAR(20),
    email VARCHAR(50),
    created DATETIME DEFAULT CURRENT_TIMESTAMP(),
    edited DATETIME
);
CREATE TABLE Cliente (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    endereco VARCHAR(80),
    telefone VARCHAR(15),
    dataNascimento DATE,
    created DATETIME DEFAULT CURRENT_TIMESTAMP(),
    edited DATETIME
);
CREATE TABLE FormaPagamento (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(80) NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP(),
    edited DATETIME
);
CREATE TABLE Fornecedor (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    cnpj VARCHAR(18) NOT NULL,
    endereco VARCHAR(80),
    telefone VARCHAR(15),
    email VARCHAR(50),
    created DATETIME DEFAULT CURRENT_TIMESTAMP(),
    edited DATETIME
);
CREATE TABLE Venda (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    quantidade INT DEFAULT 0,
    valorTotal FLOAT(2) DEFAULT 0,
    notaFiscal VARCHAR(44),
    idCliente INT REFERENCES Cliente(id),
    idFuncionario INT REFERENCES Funcionario(id),
    idFormaPagamento INT REFERENCES FormaPagamento(id),
    created DATETIME DEFAULT CURRENT_TIMESTAMP(),
    edited DATETIME
);
CREATE TABLE ProdutoVenda(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    valorUnitario FLOAT(2) DEFAULT 0,
    quantidade INT DEFAULT 0,
    valorTotal FLOAT(2) DEFAULT 0,
    idProduto INT REFERENCES Produto(id),
    idVenda INT REFERENCES Venda(id),
    created DATETIME DEFAULT CURRENT_TIMESTAMP(),
    edited DATETIME
);
CREATE TABLE Compra (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    quantidade INT DEFAULT 0,
    valorTotal FLOAT(2) DEFAULT 0,
    notaFiscal VARCHAR(44),
    idFornecedor INT REFERENCES Fornecedor(id),
    idFuncionario INT REFERENCES Funcionario(id),
    created DATETIME DEFAULT CURRENT_TIMESTAMP(),
    edited DATETIME
);
CREATE TABLE ProdutoCompra (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    valorUnitario FLOAT(2) DEFAULT 0,
    quantidade INT DEFAULT 0,
    valorTotal FLOAT(2) DEFAULT 0,
    idProduto INT REFERENCES Produto(id),
    idCompra INT REFERENCES Compra(id),
    created DATETIME DEFAULT CURRENT_TIMESTAMP(),
    edited DATETIME
);
CREATE TABLE Promocao (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    dataInicio DATE NOT NULL,
    dataFim DATE,
    created DATETIME DEFAULT CURRENT_TIMESTAMP(),
    edited DATETIME
);
CREATE TABLE ProdutoPromocao (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    valorDesconto FLOAT(2) NOT NULL,
    idProduto INT REFERENCES Produto(id),
    idPromocao INT REFERENCES Promocao(id),
    created DATETIME DEFAULT CURRENT_TIMESTAMP(),
    edited DATETIME
);
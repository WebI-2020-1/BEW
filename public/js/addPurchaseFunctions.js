/* --------------- EXIBIR/ESCONDER MODAIS --------------- */
// elementos que abrem e fecham os modais
const abrirModalElements = document.querySelectorAll(".abrir-modal");
const fecharModalElements = document.querySelectorAll(".fechar-modal");

// funções de abrir/fechar modais
const toggleModalProdutos = () =>
  document.querySelector(".modal.produtos").classList.toggle("disabled");
const toggleModalFornecedores = () =>
  document.querySelector(".modal.fornecedores").classList.toggle("disabled");

// adicionando evento de abrir modal + listar
abrirModalElements[0].addEventListener("click", () => { toggleModalProdutos(); listarProdutos(); });
abrirModalElements[1].addEventListener("click", () => { toggleModalFornecedores(); listarFornecedores(); });

// adicionando evento de fechar modal + limpar
fecharModalElements[0].addEventListener("click", () => { toggleModalProdutos(); limparProdutos(); });
fecharModalElements[1].addEventListener("click", () => { toggleModalFornecedores(); limparFornecedores(); });

/* --------------- FORNECEDORES -------------- */
const modalFornecedoresLista = document.querySelector(".lista.fornecedor tbody");


const listarFornecedores = () => {
  axios
    .get(`${host}/getAllProviders`)
    .then((response) => {
      const fornecedores = response.data;
      fornecedores.forEach((fornecedor) => {
        modalFornecedoresLista.insertAdjacentHTML(
          "beforeend",
          `
            <tr>
              <td>${fornecedor.id}</td>
              <td>${fornecedor.nome}</td>
              <td><button type="button" onclick="selecionarFornecedor(${fornecedor.id}, '${fornecedor.nome}')">${feather.icons.check.toSvg()}</button></td>
            </tr>
            `
        );
      });
    })
    .catch((err) => console.log(err));
}

const limparFornecedores = () => {
  modalFornecedoresLista.innerHTML = '';
}

// função para adicionar o fornecedor selecionado
const selecionarFornecedor = (id, nome) => {
  const fornecedorSpan = document.querySelector(".info .fornecedor span");
  fornecedorSpan.innerHTML = `${nome} <input type="hidden" name="fornecedor" value="${id}">`;
  limparFornecedores();
  toggleModalFornecedores();
};

const filtrarFornecedor = (value) => {
  axios
    .post(
      `${host}/getProviderByName`,
      (`itemSearch=${value}`),
      {
        headers: {
          "Content-type": "application/x-www-form-urlencoded",
        },
      }
    )
    .then((response) => {
      limparFornecedores();
      const fornecedores = response.data;
      fornecedores.forEach((fornecedor) => {
        modalFornecedoresLista.insertAdjacentHTML(
          "beforeend",
          `<tr>
          <td>${fornecedor.id}</td>
          <td>${fornecedor.nome}</td>
          <td><button type="button" onclick="selecionarFornecedor(${fornecedor.id}, '${fornecedor.nome}')">${feather.icons.check.toSvg()}</button></td>
        </tr>`
        );
      });
    })
    .catch((err) => console.log(err));
}

/* --------------- PRODUTO --------------- */
const modalProdutosInput = document.querySelector(".modal.produtos input");
const modalProdutosLista = document.querySelector(".lista.produtos tbody");

const listarProdutos = () => {
  axios
    .post(
      `${host}/getProducts`,
      ("itemSearch="),
      {
        headers: {
          "Content-type": "application/x-www-form-urlencoded",
        },
      }
    )
    .then((response) => {
      const produtos = response.data;
      produtos.forEach((produto) => {
        const { id, nome, quantidade, valorVenda } = produto;
        modalProdutosLista.insertAdjacentHTML(
          "beforeend",
          `<tr>
          <td>${id}</td>
          <td>${nome}</td>
          <td>${quantidade}</td>
          <td>${valorVenda}</td>
          <td><button type="button" onclick="selecionarProduto(${id}, '${nome}', ${quantidade}, ${valorVenda})">${feather.icons.check.toSvg()}</button></td>
        </tr>`
        );
      });
    })
    .catch((err) => console.log(err));
}

const limparProdutos = () => {
  modalProdutosLista.innerHTML = '';
}

const produtosTabela = document.querySelector(".tabela-produtos tbody");

const selecionarProduto = (id, nome, quantidade, valorVenda) => {

  if (!document.querySelector(`#product_${id}`)) {
    produtosTabela.insertAdjacentHTML(
      "beforeend",
      `<tr id="product_${id}">
        <td>${id} <input type="hidden" name="produtos[]" value="${id}"></td>
        <td>${nome}</td>
        <td><input type="number" name="quantidadeCompra[]" min="1" max="${quantidade}" placeholder="0" onkeyup="calcularTotalProduto(this.value, ${id})" required></td>
        <td><input id="valorUnitario_${id}" type="number" name="valorUnitario[]" min="1" max="${quantidade}" placeholder="0" onkeyup="calcularTotalProduto(this.value, ${id})" required></td>
        <td class="total-produto">0</td>
        <td><button type="button" onclick="removerProduto(${id})">${feather.icons.trash.toSvg()}</button></td>
      </tr>`
    );
  } else {
    alert("Item já adicionado.");
  }
};

const calcularTotalVenda = () => {
  let total = 0;

  document.querySelectorAll('.total-produto').forEach(element => {
    total += parseFloat(element.innerHTML);
  });

  const totalSpan = document.querySelector(".info .total span");
  totalSpan.innerHTML = `R$ ${total.toFixed(2)}`;
}

const calcularTotalProduto = (quantidade, id) => {
  let valor = document.querySelector(`#valorUnitario_${id}`).value;
  document.querySelector(`#product_${id} .total-produto`).innerHTML = (valor * quantidade).toFixed(2);
  calcularTotalVenda();
}

const removerProduto = (id) => {
  const produto = document.getElementById('product_' + id);
  produtosTabela.removeChild(produto);
  calcularTotalVenda();
}

const filtrarProduto = (value) => {
  axios
    .post(
      `${host}/getProducts`,
      (`itemSearch=${value}`),
      {
        headers: {
          "Content-type": "application/x-www-form-urlencoded",
        },
      }
    )
    .then((response) => {
      limparProdutos();
      const produtos = response.data;
      produtos.forEach((produto) => {
        const { id, nome, quantidade, valorVenda } = produto;
        modalProdutosLista.insertAdjacentHTML(
          "beforeend",
          `<tr>
          <td>${id}</td>
          <td>${nome}</td>
          <td>${quantidade}</td>
          <td>${valorVenda}</td>
          <td><button type="button" onclick="selecionarProduto(${id}, '${nome}', ${quantidade}, ${valorVenda})">${feather.icons.check.toSvg()}</button></td>
        </tr>`
        );
      });
    })
    .catch((err) => console.log(err));
}


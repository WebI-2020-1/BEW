/* --------------- EXIBIR/ESCONDER MODAIS --------------- */
// elementos que abrem e fecham os modais
const abrirModalElements = document.querySelectorAll(".abrir-modal");
const fecharModalElements = document.querySelectorAll(".fechar-modal");

// funções de abrir/fechar modais
const toggleModalProdutos = () =>
  document.querySelector(".modal.produtos").classList.toggle("disabled");
const toggleModalPagamentos = () =>
  document.querySelector(".modal.pagamentos").classList.toggle("disabled");
const toggleModalClientes = () =>
  document.querySelector(".modal.clientes").classList.toggle("disabled");

// adicionando evento de abrir modal + listar
abrirModalElements[0].addEventListener("click", () => { toggleModalProdutos(); listarProdutos(); });
abrirModalElements[1].addEventListener("click", toggleModalPagamentos);
abrirModalElements[2].addEventListener("click", () => { toggleModalClientes(); listarClientes(); });

// adicionando evento de fechar modal + limpar
fecharModalElements[0].addEventListener("click", () => { toggleModalProdutos(); limparProdutos(); });
fecharModalElements[1].addEventListener("click", toggleModalPagamentos);
fecharModalElements[2].addEventListener("click", () => { toggleModalClientes(); limparClientes(); });

/* --------------- CLIENTES -------------- */
const modalClientesLista = document.querySelector(".lista.clientes tbody");


const listarClientes = () => {
  axios
      .get(`${host}/getAllClients`)
      .then((response) => {
        const clientes = response.data;
        clientes.forEach((cliente) => {
          modalClientesLista.insertAdjacentHTML(
            "beforeend",
            `
            <tr>
              <td>${cliente.id}</td>
              <td>${cliente.nome}</td>
              <td><button type="button" onclick="selecionarCliente(${cliente.id}, '${cliente.nome}')">Selecionar</button></td>
            </tr>
            `
          );
        });
      })
      .catch((err) => console.log(err));
}

const limparClientes = () => {
  modalClientesLista.innerHTML = '';
}

// função para adicionar o cliente selecionado
const selecionarCliente = (id, nome) => {
  const clienteSpan = document.querySelector(".info .cliente span");
  clienteSpan.innerHTML = `${nome} <input type="hidden" name="cliente" value="${id}">`;
  toggleModalClientes();
};

const filtrarCliente = (value) => {
  axios
    .post(
      `${host}/getClient`,
      (`itemSearch=${value}`),
      {
        headers: {
          "Content-type": "application/x-www-form-urlencoded",
        },
      }
    )
    .then((response) => {
      limparClientes();
      const cliente = response.data;
      cliente.forEach((cliente) => {
        modalClientesLista.insertAdjacentHTML(
          "beforeend",
          `<tr>
          <td>${cliente.id}</td>
          <td>${cliente.nome}</td>
          <td><button type="button" onclick="selecionarCliente(${cliente.id}, '${cliente.nome}')">Selecionar</button></td>
        </tr>`
        );
      });
    })
    .catch((err) => console.log(err));
}

/*
modalClientesInput.addEventListener('keyup', () => {
  const itemSearch = modalClientesInput.value;
  axios.post(host + '/getClients',
    { "itemSearch": itemSearch, })
    .then(response => {
      const clientes = response.data;
      clientes.forEach(cliente => {
        document.querySelector('.lista.clientes tbody').innerHTML = `
      <tr>
        <td>${cliente.id}</td>
        <td>${cliente.nome}</td>
      </tr>
      `;
      })
    })
  .catch(err => console.log(err))
})
*/

/*
function addClient() {
  var nomeClient = document.getElementById('nomeClient').value;
  var cpfClient = document.getElementById('cpfClient').value;
  var enderecoClient = document.getElementById('enderecoClient').value;
  var telefoneClient = document.getElementById('telefoneClient').value;
  var dataNascimentoClient = document.getElementById('dataNascimentoClient').value;

  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var result = JSON.parse(this.response);
      document.getElementById('resultClient').innerHTML = result;
    }
  };
  xhttp.open("POST", host+"/adding/sale-client", true);
  xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhttp.send('nome=' + nomeClient + '&cpf=' + cpfClient + '&endereco=' + enderecoClient + '&telefone=' + telefoneClient + '&dataNascimento=' + dataNascimentoClient);
  mountClients();
}
*/

/* --------------- PAGAMENTO --------------- */
const selecionarPagamento = (id, descricao) => {
  const pagamentoSpan = document.querySelector(".info .pagamento span");
  pagamentoSpan.innerHTML = `${descricao} <input type="hidden" name="formaPagamento" value="${id}">`;
  toggleModalPagamentos();
};

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
          <td><button type="button" onclick="selecionarProduto(${id}, '${nome}', ${quantidade}, ${valorVenda})">Selecionar</button></td>
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
        <td><input type="number" name="quantidadeVenda[]" min="1" max="${quantidade}" placeholder="0" onkeyup="calcularTotalProduto(${valorVenda}, this.value, ${id})" required></td>
        <td>${valorVenda.toFixed(2)}</td>
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

const calcularTotalProduto = (valor, quantidade, id) => {
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
          <td><button type="button" onclick="selecionarProduto(${id}, '${nome}', ${quantidade}, ${valorVenda})">Selecionar</button></td>
        </tr>`
        );
      });
    })
    .catch((err) => console.log(err));
}

/*
function getProducs() {
  var itemSearch = document.getElementById('getProducts').value;
  document.getElementById("list").innerHTML = "";
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var result = JSON.parse(this.response);
      for (var index in result) {
        document.getElementById("list").insertAdjacentHTML('beforeend', "<tr><td>" + result[index].nome + "</td><td>" + result[index].quantidade + " Unidades restantes</td><td><button type='button' onclick='addProduct(" + JSON.stringify(result[index]) + ")'>Adicionar produto</button></td></tr>");
      }
    }
  };
  xhttp.open("POST", host+"/getProducts", true);
  xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhttp.send('itemSearch=' + itemSearch);
}

function addProduct(product) {
  var products = document.getElementById('products');
  if (!document.getElementById('product_' + product.id)) {
    products.insertAdjacentHTML('beforeend', `<tr id="product_` + product.id + `">
            <td>`+ product.id + `<input type="hidden" name="produtos[]" value=` + product.id + `></td>
            <td>`+ product.nome + `</td>
            <td><input type="number" name="quantidadeVenda[]" id="quantidadeVenda_`+ product.id + `" onkeyup="calcTotal(` + product.id + `,` + product.valorVenda + `)" placeholder="0"></td>
            <td>`+ parseFloat(product.valorVenda).toFixed(2) + `</td>
            <td class="total" id="total_`+ product.id + `">0</td>
            <td><button type="button" onclick="removeProduct(`+ product.id + `)"><img src="../img/trash.svg"></button></td>
            </tr>`);
  } else {
    alert('Item ja adicionado.');
  }
  mountTotal();
}
*/

document.querySelector('.submit').addEventListener('click', () => {
  document.getElementById('formSale').submit();
})

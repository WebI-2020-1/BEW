/* --------------- EXIBIR/ESCONDER MODAIS --------------- */

// elementos que abrem e fecham os modais
const abrirModalElements = document.querySelectorAll(".abrir-modal");
const fecharModalElements = document.querySelectorAll(".fechar-modal");

// funções de abrir/fechar modais
const toggleModal = () => document.querySelector(".modal").classList.toggle("disabled");

abrirModalElements.forEach((elemento) => { elemento.addEventListener("click", toggleModal) });
fecharModalElements.forEach((elemento) => { elemento.addEventListener("click", () => { toggleModal(); limparCompra(); })});

/* --------------- PRODUTOS DA COMPRA -------------- */
const arrayProdutos = []
const mountProducts = (value) => {
  axios
  .post(
    `${host}/purchase/getProducts`,
    (`idCompra=${value}`),
    {
      headers: {
        "Content-type": "application/x-www-form-urlencoded",
      },
          }
      )
      .then((response) => {
        arrayProdutos[0] = response.data;
      })
      .catch((err) => console.log(err));
};

/* --------------- Compra -------------- */
const modalCompra = document.querySelector(".conteudoCompra");

function adicionaZero(numero){
  if (numero <= 9)
      return "0" + numero;
  else
      return numero;
}

const consultarCompra = (id) => {
  mountProducts(id)
  axios
    .post(`${host}/getPurchase`,
        (`idSearch=${id}`),
        {
            headers: {
                "Content-type": "application/x-www-form-urlencoded",
            },
        }
    )
    .then((response) => {
      const compra = response.data;
      const dataCompra = new Date(compra.dataCompra);
      const dataFormatada = `${adicionaZero(dataCompra.getDate().toString())}/${adicionaZero(dataCompra.getMonth()+1).toString()}/${dataCompra.getFullYear()} ${dataCompra.getHours()}:${dataCompra.getMinutes()}`
      modalCompra.insertAdjacentHTML('beforeend',
      `
      <h2>Compra ${compra.idCompra}</h2>
      <table class="info">
      <tr>
        <th>Fornecedor</th>
        <td>${compra.nomeFornecedor}</td>
      </tr>
      <tr>
        <th>Funcionário</th>
        <td>${compra.nomeFuncionario}</td>
      </tr>
      <tr>
        <th>Data da Compra</th>
        <td>${dataFormatada}</td>
      </tr>
      </table>
      <table class="tabelaProdutos">
      <thead>
      <tr>
      <th colspan="3">Produtos</th>
      </tr>
      <tr>
      <th>Nome</th>
      <th>Quantidade</th>
      <th>Valor Unitário</th>
      </tr>
      </thead>
      <tbody>
      </tbody>
      </table>`);

      const tabelaProdutos = document.querySelector(".tabelaProdutos");

      arrayProdutos[0].forEach((produto) => {
        tabelaProdutos.insertAdjacentHTML('beforeend', `<tr>
          <td>${produto.nome}</td>
          <td>${produto.quantidade}</td>
          <td>${produto.valorUnitario}</td>
        </tr>`);
      });

      modalCompra.insertAdjacentHTML('beforeend',
        `<table class="totais">
          <thead>
            <th>Quantidade Total</th>
            <th>Valor Total</th>
          </thead>
          <tbody>
            <td>${compra.quantidade}</td>
            <td>${compra.valor}</td>
          </tbody>
        </table>`
      )

      document.querySelector('.btnEditar').href = 'edit/purchase&id=' + compra.idCompra;
    })
    .catch((err) => console.log(err));
}

const limparCompra = () => {
  modalCompra.innerHTML = "";
}


const filtrarCompra = () => {
  const tr = document.querySelectorAll(".tabela-consulta tbody tr");
  const filter = document.getElementById("input").value;
  for (let i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
/*
function mountClients(idVenda) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var result = JSON.parse(this.response);
            for(var i in result){
                document.getElementById('products_'+idVenda).insertAdjacentHTML('beforeend', '<span>'+result[i].nome+' - '+result[i].valorUnitario+'</span><br>');
            }
            document.getElementById('products_'+idVenda).insertAdjacentHTML('beforeend', '<a href="#">Editar</a>');
        }
    };
    xhttp.open("POST", host+"/sale/getProducts", true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('idVenda='+idVenda);
}
*/

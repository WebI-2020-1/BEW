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
const mountProducts = (value) => {
    axios
        .post(
            `${host}/sale/getProducts`,
            (`idVenda=${value}`),
            {
                headers: {
                    "Content-type": "application/x-www-form-urlencoded",
                },
            }
        )
        .then((response) => {
          console.log(response)
        })
        .catch((err) => console.log(err));;
};

const abrirModalElements = document.querySelectorAll(".abrir-modal");
const fecharModalElements = document.querySelectorAll(".fechar-modal");

const toggleModal = () => document.querySelector(".modal").classList.toggle("disabled");

abrirModalElements.forEach((elemento) => { elemento.addEventListener("click", toggleModal) });
fecharModalElements.forEach((elemento) => { elemento.addEventListener("click", () => { toggleModal(); limparVenda(); })});

const modalVenda = document.querySelector(".conteudoVenda");

const consultarVenda = (id) => {
  console.log(id);
  axios
      .post(`${host}/getSale`,
          (`idSearch=${id}`),
          {
              headers: {
                  "Content-type": "application/x-www-form-urlencoded",
              },
          }
      )
      .then((response) => {
        const venda = response.data;
        console.log(mountProducts(id));
        console.log(venda);
        modalVenda.innerHTML =
          `teste: ${venda.id}`;
        ;
      })
      .catch((err) => console.log(err));
}

const limparVenda = () => {
  modalVenda.innerHTML = "";
}

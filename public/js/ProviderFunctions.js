/* --------------- EXIBIR/ESCONDER MODAIS --------------- */

// elementos que abrem e fecham os modais
const abrirModalElements = document.querySelectorAll(".abrir-modal");
const fecharModalElements = document.querySelectorAll(".fechar-modal");

// funções de abrir/fechar modais
const toggleModal = () => document.querySelector(".modal").classList.toggle("disabled");

abrirModalElements.forEach((elemento) => { elemento.addEventListener("click", toggleModal) });
fecharModalElements.forEach((elemento) => { elemento.addEventListener("click", () => { toggleModal(); limparFornecedor(); })});

/* --------------- FORNECEDOR -------------- */
const modalFornecedor = document.querySelector(".conteudoFornecedor");

const consultarFornecedor = (id) => {
  axios
  .post(
    `${host}/getProvider`,
    (`id=${id}`),
    {
      headers: {
        "Content-type": "application/x-www-form-urlencoded",
      },
          }
      )
      .then((response) => {
        const fornecedor = response.data;
        modalFornecedor.innerHTML = `
        <h2>${fornecedor.nome}</h2>
        <table class="info">
        <tr>
          <th>ID</th>
          <td>${fornecedor.id}</td>
        </tr>
        <tr>
          <th>CNPJ</th>
          <td>${fornecedor.cnpj}</td>
        </tr>
        <tr>
          <th>Telefone</th>
          <td>${fornecedor.telefone}</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>${fornecedor.email}</td>
        </tr>
        <tr>
          <th>Endereço</th>
          <td>${fornecedor.endereco}</td>
        </tr>
        </table>
        `;

        document.querySelector('.btnEditar').href = 'edit/provider&id=' + fornecedor.id;
        document.querySelector('.btnDeletar').href = 'delete/provider&id=' + fornecedor.id;
      })
      .catch((err) => console.log(err));
};

const limparFornecedor = () => {
  modalFornecedor.innerHTML = "";
};

const filtrarFornecedor = () => {
  const tr = document.querySelectorAll(".tabela-consulta tbody tr");
  const filter = document.getElementById("input").value.toUpperCase();
  for (let i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

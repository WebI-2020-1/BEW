/* --------------- EXIBIR/ESCONDER MODAIS --------------- */

// elementos que abrem e fecham os modais
const abrirModalElements = document.querySelectorAll(".abrir-modal");
const fecharModalElements = document.querySelectorAll(".fechar-modal");

// funções de abrir/fechar modais
const toggleModal = () => document.querySelector(".modal").classList.toggle("disabled");

abrirModalElements.forEach((elemento) => { elemento.addEventListener("click", toggleModal) });
fecharModalElements.forEach((elemento) => { elemento.addEventListener("click", () => { toggleModal(); limparCliente(); })});

/* --------------- CLIENTE -------------- */
const modalCliente = document.querySelector(".conteudoCliente");

const consultarCliente = (id) => {
  axios
  .post(
    `${host}/getClientById`,
    (`id=${id}`),
    {
      headers: {
        "Content-type": "application/x-www-form-urlencoded",
      },
          }
      )
      .then((response) => {
        const cliente = response.data;
        console.log(response);
        modalCliente.innerHTML = `
        <h2>${cliente.nome}</h2>
        <table class="info">
        <tr>
          <th>ID</th>
          <td>${cliente.id}</td>
        </tr>
        <tr>
          <th>CPF</th>
          <td>${cliente.cpf}</td>
        </tr>
        <tr>
          <th>Telefone</th>
          <td>${cliente.telefone}</td>
        </tr>
        <tr>
          <th>Data de Nascimento</th>
          <td>${cliente.dataNascimento}</td>
        </tr>
        <tr>
          <th>Endereço</th>
          <td>${cliente.endereco}</td>
        </tr>
        </table>
        `;
        document.querySelector('.btnEditar').href = 'edit/client&id=' + cliente.id;
        document.querySelector('.btnDeletar').href = 'delete/client&id=' + cliente.id;
      })
      .catch((err) => console.log(err));
};

const limparCliente = () => {
  modalCliente.innerHTML = "";
};

const filtrarCliente = () => {
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

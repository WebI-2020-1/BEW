/* --------------- EXIBIR/ESCONDER MODAIS --------------- */

// elementos que abrem e fecham os modais
const abrirModalElements = document.querySelectorAll(".abrir-modal");
const fecharModalElements = document.querySelectorAll(".fechar-modal");

// funções de abrir/fechar modais
const toggleModal = () => document.querySelector(".modal").classList.toggle("disabled");

abrirModalElements.forEach((elemento) => { elemento.addEventListener("click", toggleModal) });
fecharModalElements.forEach((elemento) => { elemento.addEventListener("click", () => { toggleModal(); limparFuncionario(); })});

/* --------------- FUNCIONARIO -------------- */
const modalFuncionario = document.querySelector(".conteudoFuncionario");

const consultarFuncionario = (id) => {
  axios
    .post(`${host}/getEmployee`,
        (`id=${id}`),
        {
            headers: {
                "Content-type": "application/x-www-form-urlencoded",
            },
        }
    )
    .then((response) => {
      const funcionario = response.data;
      modalFuncionario.innerHTML =
        `<h2>${funcionario.nome}</h2>
        <table class="info">
        <tr>
          <th>ID</th>
          <td>${funcionario.id}</td>
        </tr>
        <tr>
          <th>Nível de Acesso</th>
          <td>${funcionario.nivelAcesso}</td>
        </tr>
        <tr>
          <th>CPF</th>
          <td>${funcionario.cpf}</td>
        </tr>
        <tr>
          <th>Telefone</th>
          <td>${funcionario.telefone}</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>${funcionario.email}</td>
        </tr>
        <tr>
          <th>Endereço</th>
          <td>${funcionario.endereco}</td>
        </tr>
        <tr>
          <th>Data de Nascimento</th>
          <td>${funcionario.dataNascimento}</td>
        </tr>
        <tr>
          <th>Usuário</th>
          <td>${funcionario.usuario}</td>
        </tr>
        </table>`;

      document.querySelector('.btnEditar').href = 'edit/employee&id=' + funcionario.id;
      document.querySelector('.btnDeletar').href = 'delete/employee&id=' + funcionario.id;
    })
    .catch((err) => console.log(err));
}

const limparFuncionario = () => {
  modalFuncionario.innerHTML = "";
}

const filtrarFuncionario = () => {
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

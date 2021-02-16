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
  xhttp.open("POST", "http://bew.com/getProducts", true);
  xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhttp.send('itemSearch=' + itemSearch);
}
function addProduct(product) {
  var products = document.getElementById('products');
  if (!document.getElementById('product_' + product.id)) {
    products.insertAdjacentHTML('beforeend', `<tr id="product_` + product.id + `">
            <td>`+ product.id + `<input type="hidden" name="produtos[]" value=` + product.id + `></td>
            <td>`+ product.nome + `</td>
            <td><input type="number" name="quantidadeVenda[]" id="quantidadeVenda_`+ product.id + `" onkeyup="calcTotal(` + product.id + `,` + product.valorVenda + `)"></td>
            <td>`+ product.valorVenda + `</td>
            <td class="total" id="total_`+ product.id + `">0</td>
            <td><button type="button" onclick="removeProduct(`+ product.id + `)">Remover</button></td>
            </tr>`);
  } else {
    alert('Item ja adicionado.');
  }
  mountTotal();
}
function removeProduct(productId) {
  var products = document.getElementById('products');
  var product = document.getElementById('product_' + productId);
  products.removeChild(product);
  mountTotal();
}
function calcTotal(productId, productValue) {
  var quantidade = document.getElementById("quantidadeVenda_" + productId).value;
  var total = quantidade * productValue;
  document.getElementById('total_' + productId).innerHTML = total;
  mountTotal();
}
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
  xhttp.open("POST", "http://bew.com/adding/sale-client", true);
  xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhttp.send('nome=' + nomeClient + '&cpf=' + cpfClient + '&endereco=' + enderecoClient + '&telefone=' + telefoneClient + '&dataNascimento=' + dataNascimentoClient);
  mountClients();
}
function mountTotal() {
  var total = document.querySelectorAll('.total');
  var valueTotal = 0;
  total.forEach((e) => {
    valueTotal += parseFloat(document.getElementById(e.id).textContent);
  });
  document.getElementById('valueTotal').innerHTML = valueTotal;
}
function mountClients() {
  document.getElementById("cliente").innerHTML = '<option selected disabled>Selecione uma opção</option>;';
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var result = JSON.parse(this.response);
      for (var index in result) {
        document.getElementById("cliente").insertAdjacentHTML('beforeend',
          "<option value=" + result[index].id + ">" + result[index].nome + "</option>");
      }
    }
  };
  xhttp.open("GET", "http://bew.com/getAllClients", true);
  xhttp.send();
}
mountClients();

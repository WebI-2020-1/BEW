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
// script.js
document.addEventListener("DOMContentLoaded", function () {
    // Faz uma requisição AJAX para obter os dados da tabela
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var dados = JSON.parse(this.responseText);
        montarTabela(dados);
      }
    };
    xhr.open("GET", "http://localhost:3000/dados", true);
    xhr.send();
  
    // Função para montar a tabela
    function montarTabela(dados) {
      var tabela = document.getElementById("tabelaCarga");
      var tbody = tabela.getElementsByTagName("tbody")[0];
  
      dados.forEach(function (dado) {
        var row = tbody.insertRow();
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);
        var cell8 = row.insertCell(7);
        var cell9 = row.insertCell(8);
        var cell10 = row.insertCell(9);
        var cell11 = row.insertCell(10);
        var cell12 = row.insertCell(11);
        var cell13 = row.insertCell(12);
        var cell14 = row.insertCell(13);
        var cell15 = row.insertCell(14);
        var cell16 = row.insertCell(15);
        var cell17 = row.insertCell(16);
        var cell18 = row.insertCell(17);
  
        cell1.innerHTML = dado.DATA;
        cell2.innerHTML = dado.OPERACAO;
        cell3.innerHTML = dado.HORA;
        cell4.innerHTML = dado.RECEBIDO;
        cell5.innerHTML = dado.RT;
        cell6.innerHTML = dado.DESCRICAO;
        cell7.innerHTML = dado.SUBCLASSE;
        cell8.innerHTML = dado.TIPO;
        cell9.innerHTML = dado.ORIGEM;
        cell10.innerHTML = dado.DESTINO;
        cell11.innerHTML = dado.PREVISAO;
        cell12.innerHTML = dado.SAIDA;
        cell13.innerHTML = dado.QUANTIDADE;
        cell14.innerHTML = dado.PESO;
        cell15.innerHTML = dado.RETIRADO;
        cell16.innerHTML = dado.IDENTIFICACAO;
        cell17.innerHTML = dado.EMPRESA;
        cell18.innerHTML = dado.VALOR;
      });
    }
  });
  
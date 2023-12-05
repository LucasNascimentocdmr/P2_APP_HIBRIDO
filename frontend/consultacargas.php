<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Consulta Cargas</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    .custom-btn {
      background-color: #37517e;
      color: #fff;
    }


    #filters {
      text-align: center;
      margin-bottom: 20px;
    }

    #filters input[type="text"] {
      width: 200px;
      /* Largura dos campos de entrada */
      margin: 5px;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }


    .filter-dropdown {
      width: 220px;
      margin: 5px;
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
      font-family: "Open Sans", sans-serif;
    }

    .footer {
      padding: 20px 0;
      background-color: #f4f4f4;
      text-align: center;
    }

    .footer span {
      font-size: 14px;
    }
  </style>

</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <!--<img src="" width="50" height="30" alt="">-->
        <span>Controle de Cargas - Consulta</span>
      </a>
      <div class="ml-auto">
        <a class="btn btn-danger" href="/pagina-autenticada">Voltar</a>
        <a class="btn btn-danger" href="/login">Sair</a>
      </div>
    </div>
  </nav>

  <div class="card text-center">

    <div class="section-title">
      <h2>Consulta de Cargas</h2>
    </div>

  </div>

  <br>
  <br>

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.2/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>tabela </title>
  </head>



  <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
    <thead>
      <tr>
        <th>DATA:</th>
        <th>OPERAÇÃO:</th>
        <th>HORA:</th>
        <th>RECEBIDO:</th>
        <th>RT:</th>
        <th>DESCRIÇÃO:</th>
        <th>SUBCLASSE DA CARGA:</th>
        <th>TIPO DE CARGA:</th>
        <th>ORIGEM:</th>
        <th>UNIDADE DE DESTINO:</th>
        <th>DATA PREVISTA PARA EMBARQUE:</th>
        <th>DATA / HORA DA SAIDA:</th>
        <th>QUANTIDADE:</th>
        <th>PESO:</th>
        <th>RETIRADO POR:</th>
        <th>DOCUMENTO DE ID.:</th>
        <th>EMPRESA:</th>
        <th>VALOR DA CARGA:</th>
        <th> </th>
      </tr>

    </thead>
    
  </table>

  <script>
  document.addEventListener('DOMContentLoaded', () => {
    // Fazer a requisição para a rota que retorna os dados do banco de dados
    fetch('/dados')
      .then(response => response.json())
      .then(data => {
        // Manipular os dados recebidos e preencher a tabela
        const table = document.getElementById('example').getElementsByTagName('tbody')[0];

        data.forEach(row => {
          const newRow = table.insertRow(table.rows.length);

          // Adicione uma célula para cada coluna na tabela
          newRow.insertCell(0).textContent = row.DATA;
          newRow.insertCell(1).textContent = row.OPERACAO;
          newRow.insertCell(2).textContent = row.HORA;
          newRow.insertCell(3).textContent = row.RECEBIDO;
          newRow.insertCell(4).textContent = row.RT;
          newRow.insertCell(5).textContent = row.DESCRICAO;
          newRow.insertCell(6).textContent = row.SUBCLASSE_DA_CARGA;
          newRow.insertCell(7).textContent = row.TIPO_DE_CARGA;
          newRow.insertCell(8).textContent = row.ORIGEM;
          newRow.insertCell(9).textContent = row.UNIDADE_DE_DESTINO;
          newRow.insertCell(10).textContent = row.DATA_PREVISTA_PARA_EMBARQUE;
          newRow.insertCell(11).textContent = row.DATA_HORA_DA_SAIDA;
          newRow.insertCell(12).textContent = row.QUANTIDADE;
          newRow.insertCell(13).textContent = row.PESO;
          newRow.insertCell(14).textContent = row.RETIRADO_POR;
          newRow.insertCell(15).textContent = row.DOCUMENTO_DE_ID;
          newRow.insertCell(16).textContent = row.EMPRESA;
          newRow.insertCell(17).textContent = row.VALOR_DA_CARGA;
          newRow.insertCell(18).textContent = ''; // Coluna vazia

          // Repita esse processo para cada coluna na sua tabela
        });
      })
      .catch(error => console.error('Erro ao obter dados:', error));
  });
</script>


  <footer id="footer" class="footer">
    <div class="container">
      <div class="footer-bottom clearfix">
        <span>&copy; 2023 <strong>ENG.SOFTWARE LUCAS</strong>P2 DESENVOLVIMENTO DE APLICATIVOS HIBRIDOS</span>
      </div>
    </div>
  </footer>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
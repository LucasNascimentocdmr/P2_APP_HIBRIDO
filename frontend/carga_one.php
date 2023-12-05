<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cargas - SBMI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<style>
    .space-below {
        margin-bottom: 40px;
    }
</style>

<body>

    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="cargas.png" width="50" height="30" alt="">
                <span>Controle de Cargas - SBMI</span>
            </a>
            <div class="ml-auto">
                <a class="btn btn-danger" href="/pagina-autenticada">Voltar</a>
                <a class="btn btn-danger" href="/login">Sair</a>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <!-- Contact Start -->
    <div class="contact">
        <div class="container">


            <div class="card text-center">


                <!-- <div class = card>-->
                <a class="card-link no-underline text-dark" data-toggle="collapse" href="#relatorios"
                    arial-controls="relatorios">
                    <div class="card-header">
                        <h5><i class="fa fa-arrow-down arrow-red nav-link active"></i> Despacho de Cargas<h5>

                    </div>

                </a>

                <form action="/carga_one" method="post" class="row g-3">
                    <div class="col-md-6">
                        <label for="RECEBIDO" class="form-label">Recebido por</label>
                        <input type="text" class="form-control" id="RECEBIDO" name="RECEBIDO">
                    </div>

                    <div class="col-md-3">
                        <label for="operacao" class="form-label">Operação</label>
                        <select class="form-control" id="OPERACAO" name="OPERACAO" required>
                            <option value="RECEBIMENTO">Recebimento</option>
                            <option value="DESPACHO">Despacho</option>
                        </select>
                    </div>


                    <div class="col-md-3">
                        <label for="DATA" class="form-label">DATA do Despacho</label>
                        <input type="date" class="form-control" id="DATA" name="DATA" required>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            var dataInput = document.getElementById("DATA");

                            // Obtém a data atual no formato YYYY-MM-DD
                            var dataAtual = new Date().toISOString().split('T')[0];

                            dataInput.value = dataAtual;
                        });
                    </script>

                    <div class="col-md-3">
                        <label for="HORA" class="form-label">Horário</label>
                        <input type="time" class="form-control" id="HORA " name="HORA">
                    </div>



                    <div class="col-md-3">
                        <label for="RT" class="form-label">RT</label>
                        <input type="text" class="form-control" id="RT" name="RT" required>
                    </div>

                    <div class="col-md-3">
                        <label for="DESCRICAO" class="form-label">Descrição</label>
                        <input type="text" class="form-control" id="DESCRICAO" name="DESCRICAO">
                    </div>

                    <div class="col-md-3">
                        <label for="SUBCLASSE" class="form-label">Subclasse da Carga</label>
                        <input type="text" class="form-control" id="SUBCLASSE" name="SUBCLASSE">
                    </div>

                    <div class="col-md-3">
                        <label for="TIPO" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="TIPO" name="TIPO">
                    </div>

                    <div class="col-md-3">
                        <label for="ORIGEM" class="form-label">Origem</label>
                        <input type="text" class="form-control" id="ORIGEM" name="ORIGEM" required>
                    </div>

                    <div class="col-md-3">
                        <label for="DESTINO" class="form-label">Destino</label>
                        <input type="text" class="form-control" id="DESTINO" name="DESTINO">
                    </div>

                    <div class="col-md-3">
                        <label for="PREVISAO" class="form-label">Previsão</label>
                        <input type="date" class="form-control" id="PREVISAO" name="PREVISAO">
                    </div>

                    <div class="col-md-3">
                        <label for="SAIDA" class="form-label">Saída</label>
                        <input type="datetime-local" class="form-control" id="SAIDA" name="SAIDA">
                    </div>

                    <div class="col-md-3">
                        <label for="QUANTIDADE" class="form-label">Quantidade</label>
                        <input type="text" class="form-control" id="QUANTIDADE" name="QUANTIDADE" required>
                    </div>

                    <div class="col-md-3">
                        <label for="PESO" class="form-label">Peso (Kg)</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="PESO" name="PESO" step="0.01"
                                pattern="\d+(\.\d{1,2})?" required>
                            <span class="input-group-text">KG</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="RETIRADO" class="form-label">Retirado por</label>
                        <input type="text" class="form-control" id="RETIRADO" name="RETIRADO">
                    </div>

                    <div class="col-md-3">
                        <label for="IDENTIFICACAO" class="form-label">Identificação</label>
                        <input type="text" class="form-control" id="IDENTIFICACAO" name="IDENTIFICACAO">
                    </div>

                    <div class="col-md-3">
                        <label for="EMPRESA" class="form-label">Empresa</label>
                        <input type="text" class="form-control" id="EMPRESA" name="EMPRESA"
                            oninput="this.value = this.value.replace(/[^A-Za-z]/g, '').toUpperCase();">
                    </div>

                    <div class="col-md-3">
                        <label for="VALOR" class="form-label">Valor da Carga (BRL)</label>
                        <div class="input-group">
                            <span class="input-group-text">R$</span>
                            <input type="text" class="form-control" id="VALOR" name="VALOR" placeholder="0,00"
                                oninput="formatCurrency(this)" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="OBS" class="form-label">Observações</label>
                        <input type="text" class="form-control" id="OBS" name="OBS"
                            oninput="this.value = this.value.replace(/[^A-Za-z]/g, '').toUpperCase();">
                    </div>

                    <div class="col-md-12 space-below">
                        <button type="submit" class="btn btn-danger">Enviar <i class="fa fa-arrow-right"></i></button>
                    </div>
                </form>

                <script>
                    function formatCurrency(input) {
                        let value = input.value.replace(/\D/g, '');
                        value = (parseFloat(value) / 100).toFixed(2);
                        input.value = value;
                    }
                </script>
                <!-- fim do formulario -->
            </div>


            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="lib/waypoints/waypoints.min.js"></script>
            <script src="lib/counterup/counterup.min.js"></script>

            <!-- Contact Javascript File -->
            <script src="mail/jqBootstrapValidation.min.js"></script>
            <script src="mail/contact.js"></script>

            <!-- Template Javascript -->
            <script src="js/main.js"></script>

            <br>
            <BR>
            <br>
            <br>

            <footer class="bg-light text-center text-lg-start">
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2023 SBMI - AEROPORTO DE MARICÁ
                    <!--<a class="text-dark" href="https://mdbootstrap.com/"></a>-->
                </div>

            </footer>
</body>

</html>
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

    #retirado,
    #documento,
    #empresa {
        display: none;
    }
</style>

<body>

    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                
                <span>Controle de Cargas </span>
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
                        <h5><i class="fa fa-arrow-down arrow-red nav-link active"></i> Recebimento de Cargas<h5>

                    </div>

                </a>



                <form action="/carga_two" method="post" class="row g-3">

                    <div class="col-md-6">
                        <label for="recebido" class="form-label">Recebido por</label>
                        <input type="text" class="form-control" id="recebido" name="recebido" >
                    </div>

                    <div class="col-md-3">
                        <label for="operacao" class="form-label">Operação</label>
                        <input type="text" class="form-control" id="operacao" name="operacao" value="RECEBIMENTO"
                            readonly>
                    </div>

                    <div class="col-md-3">
                        <label for="data" class="form-label">Data de Recebimento</label>
                        <input type="date" class="form-control" id="data" name="data" required>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            var dataInput = document.getElementById("data");

                            // Obtém a data atual no formato YYYY-MM-DD
                            var dataAtual = new Date().toISOString().split('T')[0];

                            dataInput.value = dataAtual;
                        });
                    </script>

                    <div class="col-md-3">
                        <label for="hora" class="form-label">Horário</label>
                        <input type="time" class="form-control" id="hora" name="hora" required>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            var horaInput = document.getElementById("hora");

                            // Obtém a hora atual no formato HH:MM
                            var dataAtual = new Date();
                            var hora = dataAtual.getHours().toString().padStart(2, '0');
                            var minutos = dataAtual.getMinutes().toString().padStart(2, '0');
                            var horaAtual = hora + ':' + minutos;

                            horaInput.value = horaAtual;
                        });
                    </script>




                    <div class="col-md-3">
                        <label for="rt" class="form-label">RT</label>
                        <input type="text" class="form-control" id="rt" name="rt" required>
                    </div>

                    <div class="col-md-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name="descricao">
                    </div>

                    <div class="col-md-3">
                        <label for="sub" class="form-label">Subclasse da Carga</label>
                        <input type="text" class="form-control" id="sub" name="sub">
                    </div>

                    <div class="col-md-3">
                        <label for="tclasse" class="form-label">Tipo de Classe</label>
                        <input type="text" class="form-control" id="tclasse" name="tclasse">
                    </div>

                    <div class="col-md-3">
                        <label for="origem" class="form-label">Origem</label>
                        <input type="text" class="form-control" id="origem" name="origem" required>
                    </div>

                    <div class="col-md-3">
                        <label for="destino" class="form-label">Destino</label>
                        <input type="text" class="form-control" id="destino" name="destino">
                    </div>

                    <div class="col-md-3">
                        <label for="datap" class="form-label">Data Prevista para Embarque</label>
                        <input type="date" class="form-control" id="datap" name="datap">
                    </div>

                    <div class="col-md-3">
                        <label for="datas" class="form-label">Data/Hora da Saída</label>
                        <input type="datetime-local" class="form-control" id="datas" name="datas">
                    </div>

                    <div class="col-md-3">
                        <label for="quantidade" class="form-label">Quantidade</label>
                        <input type="text" class="form-control" id="quantidade" name="quantidade" required>
                    </div>

                    <div class="col-md-3">
                        <label for="peso" class="form-label">Peso (Kg)</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="peso" name="peso" step="0.01"
                                pattern="\d+(\.\d{1,2})?" required>
                            <span class="input-group-text">KG</span>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <label for="valor" class="form-label">Valor da Carga (BRL)</label>
                        <div class="input-group">
                            <span class="input-group-text">R$</span>
                            <input type="text" class="form-control" id="valor" name="valor" placeholder="0,00"
                                oninput="formatCurrency(this)" required>
                        </div>
                    </div>

                    <script>
                        function formatCurrency(input) {
                            // Remove todos os caracteres não numéricos
                            let value = input.value.replace(/\D/g, '');

                            // Formata o valor como moeda (BRL)
                            value = (parseFloat(value) / 100).toFixed(2);

                            // Atualiza o valor no campo de entrada
                            input.value = value;
                        }
                    </script>


                    <div class="col-md-3">
                        <label for="obs" class="form-label">Observações</label>
                        <input type="text" class="form-control" id="obs" name="obs"
                            oninput="this.value = this.value.replace(/[^A-Za-z]/g, '').toUpperCase();">
                    </div>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <div class="col-md-12 space-below">
                        <button type="submit" class="btn btn-danger">Enviar <i class="fa fa-arrow-right"></i></button>
                    </div>


                </form>
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
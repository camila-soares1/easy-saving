<?php
	require('config.php');

    function fromDb($mysqli,$sql) {
        
        $result = mysqli_query($mysqli, $sql);
	    $data = mysqli_fetch_array($result);
	    $data1 = $data[0];
        return $data1;
      }
    session_start();
    $userID = $_SESSION['user-id'];
    $monthCurrent = date('m');

	//query to get data from the table investimento TOTAL
	$sql = "SELECT sum(valor) FROM investimento where utilizador_id=$userID and categoria=\"PPR\"";
    $ppr = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM investimento where utilizador_id=$userID and categoria=\"Acoes\"";
    $acoes = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM investimento where utilizador_id=$userID and categoria=\"Depositos\"";
    $depositos = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM investimento where utilizador_id=$userID and categoria=\"Criptomoedas\"";
    $cripto = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM investimento where utilizador_id=$userID and categoria=\"Obrigacoes\"";
    $obrigacoes = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM investimento where utilizador_id=$userID and categoria=\"Outros investimentos\"";
    $outros = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM investimento where utilizador_id=$userID and categoria=\"Certificados de aforro\"";
    $aforro = fromDb($mysqli,$sql);

	//query to get data from the table investimento MENSAL
    $sql = "SELECT sum(valor) FROM investimento where utilizador_id=$userID and categoria=\"PPR\" and month(data_invest) = month(current_date())";
    $pprm = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM investimento where utilizador_id=$userID and categoria=\"Acoes\" and month(data_invest) = month(current_date())";
    $acoesm = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM investimento where utilizador_id=$userID and categoria=\"Depositos\" and month(data_invest) = month(current_date())";
    $depositosm = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM investimento where utilizador_id=$userID and categoria=\"Criptomoedas\" and month(data_invest) = month(current_date())";
    $criptom = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM investimento where utilizador_id=$userID and categoria=\"Obrigacoes\" and month(data_invest) = month(current_date())";
    $obrigacoesm = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM investimento where utilizador_id=$userID and categoria=\"Outros investimentos\" and month(data_invest) = month(current_date())";
    $outrosm = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM investimento where utilizador_id=$userID and categoria=\"Certificados de aforro\" and month(data_invest) = month(current_date())";
    $aforrom = fromDb($mysqli,$sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <title>EasySaving - An??lise Financeira</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">easysaving </div>
            </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                    <!-- Nav Item - Visao Geral -->
                    <li class="nav-item">
                        <a class="nav-link" href="visaogeral.php">
                                <i class="fas fa-fw fa-home"></i>
                                <span>Vis??o Geral</span></a>
                        </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Nav Item - Movimentos Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="movimentos.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Movimentos</span></a>
            </li>

            <!-- Nav Item - Analise Financeira -->
            <li class="nav-item">
                <a class="nav-link" href="receitas_despesas.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>An??lise Financeira</span></a>
            </li>

            <!-- Nav Item - Metas -->
            <li class="nav-item">
                <a class="nav-link" href="metas.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Metas</span></a>
            </li>


            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            
            <!-- Nav Item - Configuracoes Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="configuracoes.html">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Configura????es</span></a>
                    </li>

            <!-- Nav Item - Logout Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="login.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><br>An??lise Financeira</h1>
                    </div>

                    <div class="card shadow">
                        <div class="card-header pb-4">
                            <h6 class="m-0 font-weight-bold text-primary margem_analise">< Abril 2021 ></h6>
                        </div>
    
                        <div class="card-header pb-4">

                        <div class="margem_analise">
                        
    
                        <a class="nav-link text-center text-gray-800 larg_analise_desp larg_bloc font-weight-bold" href="receitas_despesas.php">Receitas X Despesas</a>

                        <span class="text-center text-gray-800 dist_barra larg_bloc font-weight-bold">|</span>
    
                        <a class="nav-link text-center text-gray-800 larg_analise_cat larg_bloc font-weight-bold" href="categorias.php">Categorias</a>

                        <span class="text-center text-gray-800 dist_barra larg_bloc font-weight-bold">|</span>
                        
                        <span class="nav-link  text-center text-gray-800 larg_analise_inv larg_bloc font-weight-bold"><u>Investimentos</u></span>

                    </div>
                        </div>
    

                    <!-- Content Row -->
                

                    <div class="row">

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4 margem_graf_cat">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Investimento - Total</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="investimentoTotal"></canvas>
                                        <script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("investimentoTotal");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
      
    labels: ["Dep??sitos a Prazo","A????es","Criptomoedas", "PPR (Plano Poupan??a Reforma)", "Certificados de Aforro", "Obriga????es", "Outras Investimentos"],
    datasets: 
    [{
        data: [<?php echo $depositos; ?>,<?php echo $acoes; ?>,<?php echo $cripto; ?>,<?php echo $ppr; ?>,<?php echo $aforro; ?>,<?php echo $obrigacoes; ?>,<?php echo $outros; ?>],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#fa5229', '#eafa1e', '#d36ff0', '#c3c9e9'],
      hoverBackgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#fa5229', '#eafa1e', '#d36ff0', '#c3c9e9'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }]
},
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: true
    },
    cutoutPercentage: 80,
  },
});
</script>
                                    </div>
                                    <!--<div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Casa
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Alimenta????o
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Educa????o
                                        </span>
                                    </div>-->
                                </div>
                            </div>
                        </div>

                        <!-- Donut Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4 margem_graf_cat">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Investimento - Mensal</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="investimentoMensal"></canvas>
                                        <script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("investimentoMensal");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
      
    labels: ["Dep??sitos a Prazo","A????es","Criptomoedas", "PPR (Plano Poupan??a Reforma)", "Certificados de Aforro", "Obriga????es", "Outras Investimentos"],
    datasets: 
    [{
        data: [<?php echo $depositosm; ?>,<?php echo $acoesm; ?>,<?php echo $criptom; ?>,<?php echo $pprm; ?>,<?php echo $aforrom; ?>,<?php echo $obrigacoesm; ?>,<?php echo $outrosm; ?>],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#fa5229', '#eafa1e', '#d36ff0', '#c3c9e9'],
      hoverBackgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#fa5229', '#eafa1e', '#d36ff0', '#c3c9e9'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }]
},
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: true
    },
    cutoutPercentage: 80,
  },
});
</script>
                                    </div>
                                    <!--
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Dep??sitos
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Sal??rio
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> A????es
                                        </span>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>

               
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; EasySaving 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

</body>

</html>

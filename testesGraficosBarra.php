<?php/*
	require('config.php');

    function fromDb($mysqli,$sql) {
        
        $result = mysqli_query($mysqli, $sql);
	    $data = mysqli_fetch_array($result);
	    $data1 = $data[0];
        return $data1;
      }

	//query to get data from the table despesa
	$sql = "SELECT sum(valor) FROM despesa where utilizador_id=2 and month(data_desp) = month(current_date())";
    $despesa = fromDb($mysqli,$sql);


	//query to get data from the table receita
  $sql = "SELECT sum(valor) FROM receita where utilizador_id=2 and month(data_desp) = month(current_date())";
  $receita = fromDb($mysqli,$sql);
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EasySaving - Análise Financeira</title>

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
                                <span>Visão Geral</span></a>
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
                    <span>Análise Financeira</span></a>
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
                    <span>Configurações</span></a>
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
                        <h1 class="h3 mb-0 text-gray-800"><br>Análise Financeira</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header pb-4">
                            <h6 class="m-0 font-weight-bold text-primary margem_analise">< Abril 2021 ></h6>
                        </div>
    
                        <div class="card-header pb-4">

                        <div class="margem_analise">
                        
    
                        <span class="nav-link text-center text-gray-800 larg_analise_desp larg_bloc font-weight-bold"><u>Receitas X Despesas</u></span>

                        <span class="text-center text-gray-800 dist_barra larg_bloc font-weight-bold">|</span>
    
                        <a class="nav-link text-center text-gray-800 larg_analise_cat larg_bloc font-weight-bold" href="categorias.php">Categorias</a>

                        <span class="text-center text-gray-800 dist_barra larg_bloc font-weight-bold">|</span>
                        
                        <a class="nav-link  text-center text-gray-800 larg_analise_inv larg_bloc font-weight-bold" href="investimentos.php">Investimentos</a>

                    </div>
                        </div>

                    <!-- Content Row -->
                    

                        <div class="col-xl-8 col-lg-7">

                            <!-- Bar Chart -->

                            <div class="card shadow mb-4 margem_graf_desp">
                                <div class="card-header py-3 align-items-center">
                                    <h6 class="m-0 font-weight-bold text-primary">Receitas X Despesas</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar width=800px height=400px">
                                    <canvas id="graficoBarra"></canvas>

<script>
  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
var ctx = document.getElementById("graficoBarra");
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["2015-01", "2015-02", "2015-03", "2015-04", "2015-05", "2015-06", "2015-07", "2015-08", "2015-09", "2015-10", "2015-11", "2015-12"],
    datasets: [{
      label: '# of Tomatoes',
      data: [12, 19, 3, 5, 2, 3, 20, 3, 5, 6, 2, 1],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    responsive: false,
    scales: {
      xAxes: [{
        ticks: {
          maxRotation: 90,
          minRotation: 80
        },
          gridLines: {
          offsetGridLines: true // à rajouter
        }
      },
      {
        position: "top",
        ticks: {
          maxRotation: 90,
          minRotation: 80
        },
        gridLines: {
          offsetGridLines: true // et matcher pareil ici
        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
                                   

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; EasySaving 2021</span>
                    </div>
                </div>
            </footer>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
   

    //Bootstrap core JavaScript
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    //Core plugin JavaScript
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    //Custom scripts for all pages
    <script src="js/sb-admin-2.min.js"></script>

    //Page level plugins
    <script src="vendor/chart.js/Chart.min.js"></script>

    //Page level custom scripts
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>










  


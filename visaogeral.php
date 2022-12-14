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

	//query to get data from the table despesa
	$sql = "SELECT sum(valor) FROM despesa where utilizador_id=$userID and categoria=\"Alimentacao\" and month(data_desp) = month(current_date())";
    $alimentacao = fromDb($mysqli,$sql);
    $alimentacao = $alimentacao > 0 ? number_format((float)$alimentacao, 2, '.', '') : 0; 

    $sql = "SELECT sum(valor) FROM despesa where utilizador_id=$userID and categoria=\"Casa\" and month(data_desp) = month(current_date())";
    $casa = fromDb($mysqli,$sql);
    $casa = $casa > 0 ? number_format((float)$casa, 2, '.', '') : 0; 

    $sql = "SELECT sum(valor) FROM despesa where utilizador_id=$userID and categoria=\"Educacao\" and month(data_desp) = month(current_date())";
    $educacao = fromDb($mysqli,$sql);
    $educacao = $educacao > 0 ? number_format((float)$educacao, 2, '.', '') : 0; 

    $sql = "SELECT sum(valor) FROM despesa where utilizador_id=$userID and categoria=\"Saude\" and month(data_desp) = month(current_date())";
    $saude = fromDb($mysqli,$sql);
    $saude = $saude > 0 ? number_format((float)$saude, 2, '.', '') : 0; 

    $sql = "SELECT sum(valor) FROM despesa where utilizador_id=$userID and categoria=\"Transporte\" and month(data_desp) = month(current_date())";
    $transporte = fromDb($mysqli,$sql);
    $transporte = $transporte > 0 ? number_format((float)$transporte, 2, '.', '') : 0; 

    $sql = "SELECT sum(valor) FROM despesa where utilizador_id=$userID and categoria=\"Lazer\" and month(data_desp) = month(current_date())";
    $lazer = fromDb($mysqli,$sql);
    $lazer = $lazer > 0 ? number_format((float)$lazer, 2, '.', '') : 0; 

    $sql = "SELECT sum(valor) FROM despesa where utilizador_id=$userID and categoria=\"Outras despesas\" and month(data_desp) = month(current_date())";
    $outras = fromDb($mysqli,$sql);
    $outras = $outras > 0 ? number_format((float)$outras, 2, '.', '') : 0; 

	//query to get data from the table receita
    $sql = "SELECT sum(valor) FROM receita where utilizador_id=$userID and categoria=\"Salario\" and month(data_rec) = month(current_date())";
    $salario = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM receita where utilizador_id=$userID and categoria=\"Emprestimo\" and month(data_rec) = month(current_date())";
    $emprestimo = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM receita where utilizador_id=$userID and categoria=\"Outras receitas\" and month(data_rec) = month(current_date())";
    $outrasRec = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM investimento where utilizador_id=$userID";
    $investTotal = fromDb($mysqli,$sql);
    $investTotal = $investTotal > 0 ? number_format((float)$investTotal, 2, '.', '') : 0; 

    $sql = "SELECT sum(valor) FROM receita where utilizador_id='$userID'";
    $receitaTotal = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM despesa where utilizador_id='$userID'";
    $despesaTotal = fromDb($mysqli,$sql);

    $total = $receitaTotal - $despesaTotal - $investTotal;
    $total = number_format("$total",2,".","");

    //Receitas gr??fico barras
    $sql = "SELECT sum(valor) FROM receita where utilizador_id=$userID and MONTH(data_rec) = $monthCurrent";
    $incomeMonth = fromDb($mysqli,$sql);
    $incomeMonth = $incomeMonth > 0 ? number_format((float)$incomeMonth, 2, '.', '') : 0; 
    
    $month = ($monthCurrent - 1) >= 1 ? $monthCurrent - 1 : 12 - (1 - $monthCurrent);
    $sql = "SELECT sum(valor) FROM receita where utilizador_id=$userID and MONTH(data_rec) = $month";
    $minus1IncomeMonth = fromDb($mysqli,$sql);
    $minus1IncomeMonth = $minus1IncomeMonth > 0 ? number_format((float)$minus1IncomeMonth, 2, '.', '') : 0;

    $month = ($monthCurrent - 2) >= 1 ? $monthCurrent - 2 : 12 - (2 - $monthCurrent);
    $sql = "SELECT sum(valor) FROM receita where utilizador_id=$userID and MONTH(data_rec) = $month";
    $minus2IncomeMonth = fromDb($mysqli,$sql);
    $minus2IncomeMonth = $minus2IncomeMonth > 0 ? number_format((float)$minus2IncomeMonth, 2, '.', '') : 0;

    $month = ($monthCurrent - 3) >= 1 ? $monthCurrent - 3 : 12 - (3 - $monthCurrent);
    $sql = "SELECT sum(valor) FROM receita where utilizador_id=$userID and MONTH(data_rec) = $month";
    $minus3IncomeMonth = fromDb($mysqli,$sql);
    $minus3IncomeMonth = $minus3IncomeMonth > 0 ? number_format((float)$minus3IncomeMonth, 2, '.', '') : 0;

    $month = ($monthCurrent - 4) >= 1 ? $monthCurrent - 4 : 12 - (4 - $monthCurrent);
    $sql = "SELECT sum(valor) FROM receita where utilizador_id=$userID and MONTH(data_rec) = $month";
    $minus4IncomeMonth = fromDb($mysqli,$sql);
    $minus4IncomeMonth = $minus4IncomeMonth > 0 ? number_format((float)$minus4IncomeMonth, 2, '.', '') : 0;

    $month = ($monthCurrent - 5) >= 1 ? $monthCurrent - 5 : 12 - (5 - $monthCurrent);
    $sql = "SELECT sum(valor) FROM receita where utilizador_id=$userID and MONTH(data_rec) = $month";
    $minus5IncomeMonth = fromDb($mysqli,$sql);
    $minus5IncomeMonth = $minus5IncomeMonth > 0 ? number_format((float)$minus5IncomeMonth, 2, '.', '') : 0;


    //Despesas gr??fico barras
    $sql = "SELECT sum(valor) FROM despesa where utilizador_id=$userID and MONTH(data_desp) = $monthCurrent";
    $spendMonth = fromDb($mysqli,$sql);
    $spendMonth = $spendMonth > 0 ? number_format((float)$spendMonth, 2, '.', '') : 0; 

    $month = ($monthCurrent - 1) >= 1 ? $monthCurrent - 1 : 12 - (1 - $monthCurrent);
    $sql = "SELECT sum(valor) FROM despesa where utilizador_id=$userID and MONTH(data_desp) = $month";
    $minus1SpendMonth = fromDb($mysqli,$sql);
    $minus1SpendMonth = $minus1SpendMonth > 0 ? number_format((float)$minus1SpendMonth, 2, '.', '') : 0;

    $month = ($monthCurrent - 2) >= 1 ? $monthCurrent - 2 : 12 - (2 - $monthCurrent);
    $sql = "SELECT sum(valor) FROM despesa where utilizador_id=$userID and MONTH(data_desp) = $month";
    $minus2SpendMonth = fromDb($mysqli,$sql);
    $minus2SpendMonth = $minus2SpendMonth > 0 ? number_format((float)$minus2SpendMonth, 2, '.', '') : 0;

    $month = ($monthCurrent - 3) >= 1 ? $monthCurrent - 3 : 12 - (3 - $monthCurrent);
    $sql = "SELECT sum(valor) FROM despesa where utilizador_id=$userID and MONTH(data_desp) = $month";
    $minus3SpendMonth = fromDb($mysqli,$sql);
    $minus3SpendMonth = $minus3SpendMonth > 0 ? number_format((float)$minus3SpendMonth, 2, '.', '') : 0;

    $month = ($monthCurrent - 4) >= 1 ? $monthCurrent - 4 : 12 - (4 - $monthCurrent);
    $sql = "SELECT sum(valor) FROM despesa where utilizador_id=$userID and MONTH(data_desp) = $month";
    $minus4SpendMonth = fromDb($mysqli,$sql);
    $minus4SpendMonth = $minus4SpendMonth > 0 ? number_format((float)$minus4SpendMonth, 2, '.', '') : 0;

    $month = ($monthCurrent - 5) >= 1 ? $monthCurrent - 5 : 12 - (5 - $monthCurrent);
    $sql = "SELECT sum(valor) FROM despesa where utilizador_id=$userID and MONTH(data_desp) = $month";
    $minus5SpendMonth = fromDb($mysqli,$sql);
    $minus5SpendMonth = $minus5SpendMonth > 0 ? number_format((float)$minus5SpendMonth, 2, '.', '') : 0;

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
    <title>EasySaving - Vis??o Geral</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                <div class="sidebar-brand-text mx-3">easysaving</div>
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
                <a class="nav-link collapsed" href="index.php">
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><br>Vis??o Geral</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4 ">
                            <div class="card border-left-primary shadow h-100 py-2 ">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center  altura_card">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Saldo Atual</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">???<?php echo $total; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-euro-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Receita - Mensal</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">???<?php echo $incomeMonth; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- Pending Requests Card Example -->
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Despesa - Mensal</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">???<?php echo $spendMonth; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Investimento - Total
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">???<?php echo $investTotal; ?></div>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <div class="col-xl-8 col-lg-7">

                            <!-- Bar Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Receitas X Despesas</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4 margem_graf_cat">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Categorias - Despesas</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="categoriasDespesas"></canvas>
                                        <script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("categoriasDespesas");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
      
    labels: ["Alimenta????o","Casa","Educa????o", "Sa??de", "Transporte", "Lazer", "Outras Despesas"],
    datasets: 
    [{
        data: [<?php echo $alimentacao; ?>,<?php echo $casa; ?>,<?php echo $educacao; ?>,<?php echo $saude; ?>,<?php echo $transporte; ?>,<?php echo $lazer; ?>,<?php echo $outras; ?>],
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

    <script >
        var chartsGlobalVars = {};
        chartsGlobalVars.despesaDoMes = <?php echo $spendMonth; ?>;
        chartsGlobalVars.despesaDoMesMenos1 = <?php echo $minus1SpendMonth; ?>;
        chartsGlobalVars.despesaDoMesMenos2 = <?php echo $minus2SpendMonth; ?>;
        chartsGlobalVars.despesaDoMesMenos3 = <?php echo $minus3SpendMonth; ?>;
        chartsGlobalVars.despesaDoMesMenos4 = <?php echo $minus4SpendMonth; ?>;
        chartsGlobalVars.despesaDoMesMenos5 = <?php echo $minus5SpendMonth; ?>;

        chartsGlobalVars.receitaDoMes = <?php echo $incomeMonth; ?>;
        chartsGlobalVars.receitaDoMesMenos1 = <?php echo $minus1IncomeMonth; ?>;
        chartsGlobalVars.receitaDoMesMenos2 = <?php echo $minus2IncomeMonth; ?>;
        chartsGlobalVars.receitaDoMesMenos3 = <?php echo $minus3IncomeMonth; ?>;
        chartsGlobalVars.receitaDoMesMenos4 = <?php echo $minus4IncomeMonth; ?>;
        chartsGlobalVars.receitaDoMesMenos5 = <?php echo $minus5IncomeMonth; ?>;
        

        //chartsGlobalVars.currentMonth = <?php echo $monthCurrent; ?>; para n??o meter meses ?? m??o

    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
    

</body>

</html>
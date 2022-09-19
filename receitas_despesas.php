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

    //Receitas gráfico barras
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


    //Despesas gráfico barras
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
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
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
        

        //chartsGlobalVars.currentMonth = <?php echo $monthCurrent; ?>; para não meter meses à mão

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
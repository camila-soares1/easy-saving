<?php
	require('config.php');

    function fromDb($mysqli,$sql) {
        
        $result = mysqli_query($mysqli, $sql);
	    $data = mysqli_fetch_array($result);
	    $data1 = $data[0];
        return $data1;
      }

      session_start();
      $utilizador_id = $_SESSION['user-id'];
      //$utilizador_id = 2;


	//query to get data from the table despesa
	$sql = "SELECT sum(valor) FROM receita where utilizador_id='$utilizador_id'";
    $receitas = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM despesa where utilizador_id='$utilizador_id'";
    $despesas = fromDb($mysqli,$sql);

    $sql = "SELECT sum(valor) FROM investimento where utilizador_id='$utilizador_id'";
    $investimentos = fromDb($mysqli,$sql);

    $total = $receitas - $despesas - $investimentos;
    $total = number_format("$total",2,".","");
    //$total = $total > 0 ? number_format((float)$total, 2, '.', '') : 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>EasySaving - Movimentos</title>

    

    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    
    <script type="text/javascript" charset="utf8" src=//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js></script>
    
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    
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
                                        
                                        <div class="modal fade" id="modal-mensagem">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    
                                                    <div class="modal-body">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        
                                                        
                                                        
                                                            <div  class="form-group">
                                                                <form action="insert.php" method="POST">
                                                                    <p>Tipo de movimento</p>
                                                                    
                                                                    <input type="radio" id="despesa" name="chk" value="despesa">
                                                                    <label for="despesa">Despesa</label>
                                                                    <input type="radio" id="receita" name="chk" value="receita">
                                                                    <label for="receita">Receita</label>
                                                                    <input type="radio" id="investimento" name="chk" value="investimento">
                                                                    <label for="investimento">Investimento</label>
                                                                    <br>
                                                                    <br>
                                                                    <p>Categoria</p>
                                                                    <select required name="categoria" id="describe" class="form-control form-control-user" >
                                                                        <option name="name" value="1">Categoria<br></option>
                                                                    </select>
                                                                    <br>
                                                                    <p>Descrição</p>
                                                                    <input type="text" name="descricao" class="form-control form-control-user"
                                                                    id="inputCategoria" placeholder="Cinema, supermercado..." required>
                                                                    <br>
                                                                    <p>Valor</p>
                                                                    <input type="descricao" name="valor" class="form-control form-control-user"
                                                                    id="inputDescricao" placeholder="€ 0.00" required>
                                                                    <br>
                                                                    <p>Data</p>
                                                                    <input type="text" name="data" class="form-control form-control-user"
                                                                    id="inputData" placeholder="aaaa-mm-dd" required>
                                                                    <div class="modal-footer">
                                                                        <input type="submit" name="submit" value="Confirma" class="btn btn-primary">
                                                                        
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                   
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <!-- Begin Page Content -->
                                            <div class="container-fluid">
                                                
                                                <!-- Page Heading -->
                                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                    <h1 class="h3 mb-0 text-gray-800"><br>Movimentos <a  class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#modal-mensagem">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-plus"></i>
                                                        </span>
                                                        <span class="text">Adicionar movimento</span>
                                                    </a></h1>
                                                </div>
                                                
                                                <!-- DataTales Example -->

                                                <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Saldo Atual</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-euro-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <div class="card shadow mb-4">
                                                    
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" id="movimentos" width="100%" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th>id</th>
                                                                    <th>Tipo</th>
                                                                    <th>Categoria</th>
                                                                    <th>Descrição</th>
                                                                    <th>Data</th>
                                                                    <th>Valor</th>
                                                                    <th>Editar</th>

                                                                </tr>
                                                            </thead>

                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <!-- /.container-fluid 

                                                <td>   
                                                                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                                                                    <i class="fas fa-wrench"></i>
                                                                                </a>
                                                                                <a href="#" class="btn btn-danger btn-circle btn-sm">
                                                                                    <i class="fas fa-trash"></i>
                                                                                </a>
                                                                            </td>
                                                                            -->
                                                
                                            </div>


                                            <!-- End of Main Content -->
                                            
                                            <!-- Footer -->
                                            <footer class="sticky-footer bg-white">
                                                <div class="container my-auto">
                                                    <div class="copyright text-center my-auto">
                                                        <span>Copyright &copy; Your Website 2020</span>
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
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <a class="btn btn-primary" href="index.html">Logout</a>
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
                                <script src="js/sb-admin-2.js"></script>
                                
                                
                                <!-- Page level plugins -->
                                <script src="vendor/datatables/jquery.dataTables.min.js"></script>
                                <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
                                
                                 <!--Page level custom scripts 
                                <script src="js/demo/datatables-demo.js"></script>
                                -->
                                
                                
                                
                                
                            </body>

                            <script type="text/javascript">

$(document).ready(function() {

    $('#movimentos').DataTable( {
    ajax: 'pro.php',
    columns: [
        { "data": "identificador", visible: false },
        { "data": "tipo" },
        { "data": "categoria" },
        { "data": "descricao" },
        { "data": "data_desp" },
        { "data": "valor"},
        { "data": "valor", visible: false}
    ],
    order: [[ 4, "desc" ]],
    sort:true,
    retrieve: true
    
    
    } );


  




});

</script>
                            
                            </html>

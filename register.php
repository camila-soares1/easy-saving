<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EasySaving - Criar Conta</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/easy-saving.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crie uma Conta!</h1>
                            </div>
                            <?php
                            var_dump($_SESSION);
                            if($_SESSION['status_registo']): 
                            ?>
                            <div class="text-center" id="caixa-verde">
                                <p class="margem-registo">Registo efetuado!</p>
                                <p>Faça login introduzindo o e-mail e a senha <a href="index.php">aqui</a></p>
                            </div>
                            <?php
                            endif;
                            unset($_SESSION['status_registo']);
                            ?>
                            <?php
                            if($_SESSION['email_existe']): 
                            ?>
                            <div class="text-center" id="caixa-azul">
                                <p>O e-mail introduzido já existe. Introduza outro e tente novamente.</p>
                            </div>
                            <?php
                            endif;
                            unset($_SESSION['email_existe']);
                            ?>
                            <form class="user" action="registar.php" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email" name="email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Senha" name="senha">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Confirmar a Senha" name="confirmacao">
                                    </div>
                                </div>
                                <button type="submit" href="index.php" class="btn btn-primary btn-user btn-block text-center">
                                    Criar Conta
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Esqueceu-se da senha?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="index.php">Já tem uma conta? Login!</a>
                            </div>
                        </div>
                    </div>
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

</body>

</html>
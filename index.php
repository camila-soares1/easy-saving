<?php
session_start();
include('conexao.php');

if(empty($_POST['utilizador']) || empty($_POST['senha'])) {
    header('Location: index.html');
    exit();
}

$utilizador = mysqli_real_escape_string($conexao, $_POST['utilizador']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from utilizador where email = '{$utilizador}' and pass = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

$userID;

while($rowLoop = $result->fetch_assoc()) {
    $userID = $rowLoop["id"];

}


$_SESSION['user-id'] = $userID;
//file_put_contents('php://stderr', print_r($row, TRUE));

if($row == 1) {
    $_SESSION['utilizador'] = $utilizador;
    header('Location: visaogeral.php');
    exit();
} else {
    header('Location: index.html');
    exit();
}
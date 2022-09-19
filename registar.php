<?php
session_start();
include("conexao.php");

$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
$confirmacao = mysqli_real_escape_string($conexao, trim(md5($_POST['confirmacao'])));

$sql = "select count(*) as total from utilizador where email = '$email'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
    $_SESSION['email_existe'] = true;
    header('Location: register.php');
    exit;
}

$sql = "INSERT INTO utilizador (email, pass) VALUES ('$email', '$senha')";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_registo'] = true;
}

$conexao->close();

header('Location: register.php');
exit;
?>
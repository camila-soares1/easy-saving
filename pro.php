<?php


require('config.php');

session_start();
$utilizador_id = $_SESSION['user-id'];


$sql = "SELECT 'despesa' as tipo, id as identificador, valor, categoria, data_desp, descricao FROM despesa where utilizador_id='$utilizador_id' union all SELECT 'receita' as tipo, id as identificador, valor, categoria, data_rec, descricao from receita where utilizador_id='$utilizador_id' union all select 'investimento' as tipo, id as identificador, valor, categoria, data_invest, descricao from investimento where utilizador_id='$utilizador_id'";
$result = $mysqli->query($sql);




while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $data[] = $row;
}


$results = [
"data" => $data ];


header('Content-type: application/json');
echo json_encode($results);

//echo json_encode($data);


?>
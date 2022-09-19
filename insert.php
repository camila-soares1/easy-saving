
<?php
include_once ('./dbConn.php');
// Set the variables for the person we want to add to the database
 // Check if the form is submitted
 
 if ( isset( $_POST['submit'] ) ) {
  // retrieve the form data by using the element's name attributes value as key
  
  session_start();
  $utilizador_id = $_SESSION['user-id'];


  $tipo = $_REQUEST['chk'];
  $categoria = $_REQUEST['categoria'];
  $descricao = $_REQUEST['descricao'];
  $valor = $_REQUEST['valor'];
  $time = $_REQUEST['data'];
 // $data = date('Y-m-d', $time);
  //$linha_data = new DateTime($_REQUEST['data']);
  //$data = date('Y-m-d H:i:s', $linha_data);
  var_dump($categoria);
  echo ("<br>");
  //$newformat = date('Y-m-d',$time)
  //$time = strtotime('10/16/2003');
  //$ymd = DateTime::createFromFormat('m-d-Y', '10-16-2003')->format('Y-m-d');
  var_dump($_REQUEST);
  //die();
 }

 switch($categoria) {
   case "Alimentação":
    $categoria = "Alimentacao";
    break;
  case "Educação":
    $categoria = "Educacao";
    break;
  case "Saúde":
    $categoria = "Saude";
    break;
  case "Salário":
    $categoria = "Salario";
    break;
  case "Empréstimo":
    $categoria = "Emprestimo";
    break;
  case "Depósitos a prazo":
    $categoria = "Depositos";
    break;
  case "Ações":
    $categoria = "Acoes";
    break;
  case "Obrigações":
    $categoria = "Obrigacoes";
  case "PPR (Plano Poupança Reforma)":
      $categoria = "PPR";
    break;
  default:
    break;
 }

 
 switch ($tipo) {
  case "despesa":
    $my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO despesa (utilizador_id, valor, categoria, data_desp, descricao) VALUES (:utilizador_id, :valor, :categoria, :data_, :descricao)");;
    break;
  case "receita":
    $my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO receita (utilizador_id, valor, categoria, data_rec, descricao) VALUES (:utilizador_id, :valor, :categoria, :data_, :descricao)");2;
    break;
  default:
    $my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO investimento (utilizador_id, valor, categoria, data_invest, descricao) VALUES (:utilizador_id, :valor, :categoria, :data_, :descricao)");;
}





// Here we create a variable that calls the prepare() method of the database object
// The SQL query you want to run is entered as the parameter, and placeholders are written like this :placeholder_name
//$my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO despesa (utilizador_id, valor, categoria, data_desp, descricao) VALUES (:utilizador_id, :valor, :categoria, :data_desp, :descricao)");
// Now we tell the script which variable each placeholder actually refers to using the bindParam() method
// First parameter is the placeholder in the statement above - the second parameter is a variable that it should refer to

$my_Insert_Statement->bindParam(':utilizador_id',  $utilizador_id);
$my_Insert_Statement->bindParam(':valor', $valor);
$my_Insert_Statement->bindParam(':categoria', $categoria);
$my_Insert_Statement->bindParam(':data_', $time);
//$stmt->bindParam(':time_added', $date, PDO::PARAM_STR)
$my_Insert_Statement->bindParam(':descricao', $descricao);
// Execute the query using the data we just defined
// The execute() method returns TRUE if it is successful and FALSE if it is not, allowing you to write your own messages here
if ($my_Insert_Statement->execute()) {
  header('Location: movimentos.php');
  //echo "New record created successfully";
} else {
  echo "Unable to create record";
}



?>
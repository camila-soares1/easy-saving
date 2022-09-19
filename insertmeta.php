
<?php
include_once ('./dbConn.php');
// Set the variables for the person we want to add to the database
 // Check if the form is submitted

 session_start();
$utilizador_id = $_SESSION['user-id'];
 
 if ( isset( $_POST['submit'] ) ) {
  // retrieve the form data by using the element's name attributes value as key
  
  //$id_utilizador = mysql_real_escape_string($_SESSION['utilizador_id']);
  $id_utilizador = 2;
  
  $tipo = $_REQUEST['chk'];
  $categoria = $_REQUEST['categoria'];
  $mes = $_REQUEST['mes'];
  $valor = $_REQUEST['valor'];
  
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
    break;
  default:
    break;
 }


// Here we create a variable that calls the prepare() method of the database object
// The SQL query you want to run is entered as the parameter, and placeholders are written like this :placeholder_name
$my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO meta (utilizador_id, valor, categoria, mes) VALUES (:utilizador_id, :valor, :categoria, :mes)");
// Now we tell the script which variable each placeholder actually refers to using the bindParam() method
// First parameter is the placeholder in the statement above - the second parameter is a variable that it should refer to

$my_Insert_Statement->bindParam(':utilizador_id', $id_utilizador);
$my_Insert_Statement->bindParam(':valor', $valor);
$my_Insert_Statement->bindParam(':categoria', $categoria);
$my_Insert_Statement->bindParam(':mes', $mes);

// Execute the query using the data we just defined
// The execute() method returns TRUE if it is successful and FALSE if it is not, allowing you to write your own messages here
if ($my_Insert_Statement->execute()) {
  //header('Location: movimentos.php');
  header('Location: metas.php');
  //echo "New record created successfully";
} else {
  echo "Unable to create record";
}



?>
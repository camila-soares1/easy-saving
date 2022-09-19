<?php
	require('config.php');


	/*

	$data1 = '';
	$data2 = '';
	$data3 = '';
	$data4 = '';
	$data5 = '';
	$data6 = '';

	*/

	//query to get data from the table
	$sql = "SELECT sum(valor) FROM despesa where utilizador_id=2 and categoria=\"alimentacao\"";
    $result = mysqli_query($mysqli, $sql);
	$data = mysqli_fetch_array($result);
	$data1 = $data[0];
	echo $data1;
	
	
/*/
	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$data1 = $data1 . '"'. $row['id'].'",';
		$data2 = $data2 . '"'. $row['utilizador_id'] .'",';
		$data3 = $data3 . '"'. $row['valor'].'",';
		$data4 = $data4 . '"'. $row['categoria'] .'",';
		$data5 = $data5 . '"'. $row['data_desp'].'",';
		$data6 = $data6 . '"'. $row['descricao'] .'",';
	}

	$data1 = trim($data1,",");
	$data2 = trim($data2,",");
	$data3 = trim($data3,",");
	$data4 = trim($data4,",");
	$data5 = trim($data5,",");
	$data6 = trim($data6,",");

	*/
?>

<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
		<title>Accelerometer data</title>



	</head>

	<body>	   
	    <div class="container">	
   
			<canvas id="chart" style="width: 100%; height: 65vh; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>

			<script>
				var ctx = document.getElementById("chart").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'doughnut',
		        data: {
		            labels: ["Alimentação","Casa","Educação", "Saúde", "Transporte", "Lazer", "Outras Despesas"],
		            datasets: 
		            [{
		                data: [<?php echo $data1; ?>,10,15,25,10,22,15],
		                backgroundColor: 'transparent',
		                borderColor:'red',
		                borderWidth: 3
		            }]
		        },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
		        }
		    });
			</script>
	    </div>
	    
	</body>
</html>
<?php
	require('config.php');

	//query to get data from the table
	$sql = "SELECT sum(valor) FROM despesa where utilizador_id=2 and categoria=\"alimentacao\"";
    $result = mysqli_query($mysqli, $sql);
	$data = mysqli_fetch_array($result);
	$data1 = $data[0];

	

?>

<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
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
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>

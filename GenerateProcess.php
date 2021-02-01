 <?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'ugc';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	if(isset($_POST['generate'])) 
	{

		$university_name = $_POST['Uname'];
		$Pfrom = $_POST['Pfrom'];
		$Pto   = $_POST['Pto'];

		$year= "";
		$total_student = "";
		$Total_Faculty_grad_Phd ="";
		$noOf_Conducted_Research_Projects = "";

		$sql1 = "SELECT *  FROM `student` WHERE university_name = '$university_name' AND year BETWEEN $Pfrom AND $Pto  ";
		$sql2 = "SELECT *  FROM `faculty` WHERE university_name = '$university_name' AND year BETWEEN $Pfrom AND $Pto  ";
		$sql3 = "SELECT *  FROM `research` WHERE university_name = '$university_name' AND year BETWEEN $Pfrom AND $Pto  ";

		$result = mysqli_query($mysqli, $sql1);

		$result2 = mysqli_query($mysqli, $sql2);

		$result3 = mysqli_query($mysqli, $sql3);

		if($result -> num_rows > 0){
		while ($row = mysqli_fetch_array($result)) {

		$university_name = $university_name . '"'. $row['university_name'] .'",';
		
		$year = $year . '"'. $row['year'] .'",';

		$total_student = $total_student . '"'. $row['total_student'] .'",';
		

		
	}

	$university_name = trim($university_name,",");
	$year = trim($year,",");
	$total_student = trim($total_student,",");


	}

	else{

	echo "0 result";
}

	if($result2 -> num_rows > 0){
		while ($row = mysqli_fetch_array($result2)) {

		$Total_Faculty_grad_Phd = $Total_Faculty_grad_Phd . '"'. $row['Total_Faculty_grad_Phd'] .'",';
		

		
	}

	$Total_Faculty_grad_Phd = trim($Total_Faculty_grad_Phd,",");


	}
	else{

	echo "0 result";
}

	if($result3 -> num_rows > 0){
		while ($row = mysqli_fetch_array($result3)) {

		$noOf_Conducted_Research_Projects = $noOf_Conducted_Research_Projects . '"'. $row['noOf_Conducted_Research_Projects'] .'",';
		

		
	}

	$noOf_Conducted_Research_Projects = trim($noOf_Conducted_Research_Projects,",");


	}
	else{

	echo "0 result";
}



	$mysqli-> close();
		






		
		

	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Chart Representation</title>
	<meta charset="UTF-8">
  	<meta name="description" content="UGC Final Report">
  	<meta name="keywords" content="UGC">
 	<meta name="Salman" content="UGC">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  	<!-- <meta http-equiv="refresh" content="30"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet"  href="../css/style.css">
	

	<style type="text/css">			
			body{
				font-family: Arial;
			    margin: 80px 100px 10px 100px;
			    padding: 0;
			    color: white;
			    text-align: center;
			    background: #555652;
			}

			.container {
				color: #E8E9EB;
				background: #222;
				border: #555652 1px solid;
				padding: 10px;
			}
		</style>




</head>
<body>
	<h1 id="title">Graphical Representation/year</h1>

	<br><br><br>
	
	<h2>Total Student Representation </h2>

<div class="container">	
			<canvas id="chartBarTotalStudent" style="width: 100%; height: 65vh; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>
			<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

			<script>
				var ctx = document.getElementById("chartBarTotalStudent").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'line',
		        data: {
		            labels: [<?php echo $year ?>],
		            datasets: 
		            [{
		                label: 'Total Student',
		                data: [<?php echo $total_student ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(255,99,132)',
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

	    <br><br><br>

	  
	
	<h2>Total PHD Holder Representation </h2>

<div class="container">	
			<canvas id="chartBarTotalPhdHolder" style="width: 100%; height: 65vh; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>
			<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

			<script>
				var ctx = document.getElementById("chartBarTotalPhdHolder").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'bar',
		        data: {
		            labels: [<?php echo $year ?>],
		            datasets: 
		            [{
		                label: 'Total PHD Holder',
		                data: [<?php echo $Total_Faculty_grad_Phd ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(255,99,132)',
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

	    	    <br><br><br>

	  
	
	<h2>Total NoOf conducted Research Projects Representation </h2>

<div class="container">	
			<canvas id="chartBarTotalResearchProjects" style="width: 100%; height: 65vh; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>
			<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

			<script>
				var ctx = document.getElementById("chartBarTotalResearchProjects").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'bar',
		        data: {
		            labels: [<?php echo $year ?>],
		            datasets: 
		            [{
		                label: 'NoOf conducted Research Projects',
		                data: [<?php echo $noOf_Conducted_Research_Projects ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(255,99,132)',
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

	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	


</body>
</html>
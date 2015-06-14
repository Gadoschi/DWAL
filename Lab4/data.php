<?php
	
	session_start();
	if($_SESSION['user'] == NULL){
		header("Location: login.html");
	}

?>
<!DOCTYPE html>
<html>
<head>

	<title>ZKD 2014</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" href="css/grid.css" />
	<meta charset="UTF-8" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="Chart.js"></script>
	 <script src='Chart.min.js'></script>
        <meta name = "viewport" content = "initial-scale = 1, user-scalable = no">

	<script>
        $(document).ready(function() {
                $('#search').keyup(function() {
                        var term = $("#search").val();
                        $("tr").slideDown("fast");
                        $("tr:not(:contains('" + term + "'), .headers)").slideUp("fast");
                         
                });
        });
     </script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body id="top">
	<header class="site-header">
		<div class="row">
			<h1 class="logo"><img src="images/logo.png" style="width: 400px; height: 60px;"/></h1>
			<a href="classes/logout.php">Odjava: <?php echo $_SESSION['user']; ?></a>
			<a href="#top">Znanja</a>
			<a href="#skolovanje">Školovanje</a>
			<a href="#top">Osobno</a>
					
		</div>
	</header>
	

    <section class="gray-boxes row">
		<nav class="main-navigation">
			<ul>
			  <li><a href="index.html">Pocetna</a></li>
			  <li><a href="popis_proizvoda.php">Popis proizvoda</a></li>
			  <li><a href="unos_proizvoda.php">Unos proizvoda</a></li>
			  <li><a href="generiraj_pdf.php">Generiraj PDF</a></li>
			  <li><a href="data.php">Chartovi</a></li>
			  <li><a href="#">Kako nas naci</a></li>
			  <li><a href="#">Kontakt</a></li>
			</ul>
		</nav>
		
	

  <div class="column column-9">
	<input type="text" id="search" placeholder="Upišite jelo koje trazite"/>
      <?php
		
		include 'classes/connection.php';
		
		echo '';
		$sql = "SELECT * FROM menu";
		$query = mysqli_query($db, $sql);
		echo "<table><tr><th>Naziv</th><th>Tip</th><th>Opis proizvoda</th><th>Vegetarijanski</th><th>Halal</th><th>Košer</th><th>Alergeni</th><th>Cijena</th></tr>";
		while($row = mysqli_fetch_array($query))
		{
			echo "<tr><td>";
			echo $row['naziv'];
			echo "</td>";
			echo "<td>";
			echo $row['tip'];
			echo "</td>";
			echo "<td>";
			echo $row['opis'];
			echo "</td>";
			echo "<td>";
			echo $row['vegetarijanski'];
			echo "</td>";
			echo "<td>";
			echo $row['halal'];
			echo "</td>";
			echo "<td>";
			echo $row['koser'];
			echo "</td>";
			echo "<td>";
			echo $row['alergeni'];
			echo "</td>";
			echo "<td>";
			echo $row['cijena'] . ' kn';
			echo "</td></tr>";
		}
	  echo "</table>";
	  ?>
	  <?php
		$ostalo = 'ostalo';
		include 'classes/connection.php';
		$sql = "SELECT naziv,count(*) FROM menu WHERE tip='ostalo'";
		$result = mysqli_query($db, $sql);
		$row = mysqli_fetch_assoc($result);
		$size = $row['COUNT(*)'];
	  ?>
		<script>
			var br = $('td:contains(ostalo)').length;
			var br2 = $('td:contains(keks)').length;
			var br3 = $('td:contains(kola)').length;
			var br4 = $('td:contains(jaja)').length;
		</script> 
		<canvas id="canvas" height="450" width="600"></canvas>
	<?php 
			$le = "<script>document.write (br);</script>";
			$array=array
			(
				'0' => array
					(
						'product' => 'ostalo',
						'total' => 3
					),
				'1' => array
					(
						'product' => 'kolač',
						'total' => 4
					),
				'2' => array
					(
						'product' => 'keks',
						'total' => 2
					)
			);

	?>


	<script>
        var lab=[];
        var data=[];
        <?php 
        foreach($array as $tem)
        {

            ?>

            lab.push('<?php echo $tem['product']; ?>');
            data.push('<?php echo $tem['total']; ?>');
        <?php }

        ?>

        var barChartData = {
            labels : lab,
            datasets : [
                {
                    fillColor : "rgba(220,220,220,0.5)",
                    strokeColor : "rgba(220,220,220,1)",
                    data : data
                },

            ]

        }

    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData);

    </script>
		
		<div id="canvas-holder">
			<canvas id="chart-area" width="300" height="300"/>
		</div>
	<script>
		var pieData = [
				{
					value: br,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Ostalo"
				},
				{
					value: br2,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Keks"
				},
				{
					value: br3,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Kolač"
				},
				{
					value: br4,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Jaja"
				}

			];

			window.onload = function(){
				var ctx = document.getElementById("chart-area").getContext("2d");
				window.myPie = new Chart(ctx).Pie(pieData);
			};



	</script>
	
	
    </div>
	</section>
	

	<footer class="site-footer">
		<p>Copyright &copy ZKD j.d.o.o. @2015. </p>
		
	</footer>
	
</body>
</html>
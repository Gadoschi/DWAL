<!DOCTYPE html>
<html>
<head>

	<title>ZKD 2014</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" href="css/grid.css" />
	<meta charset="UTF-8" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>
        $(document).ready(function() {
                $('#search').keyup(function() {
                        var term = $("#search").val();
                        $("tr").slideDown("fast");
                        $("tr:not(:contains('" + term + "'), .headers)").slideUp("fast");
                         
                });
        });
        </script>
</head>

<body id="top">
	<header class="site-header">
		<div class="row">
			<h1 class="logo"><img src="images/logo.png" style="width: 400px; height: 60px;"/></h1>
			<a href="login.html">Prijava</a>
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
	
    </div>
	</section>
   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


	<footer class="site-footer">
		<p>Copyright &copy ZKD j.d.o.o. @2015. </p>
		
	</footer>
	
</body>
</html>
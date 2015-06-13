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
			  <li><a href="#">Kako nas naci</a></li>
			  <li><a href="#">Kontakt</a></li>
			</ul>
		</nav>
		
	

  <div class="column column-9">
	<legend>Pretraga po tipu</legend>
      <form action="generate-pdf.php" method="POST">
		<input type="text" name="pretraga" id="pretraga" />
		<input type="submit" name="submit" value="Generiraj" />
	  </form>
	
    </div>
	</section>
				


	<footer class="site-footer">
		<p>Copyright &copy ZKD j.d.o.o. @2015. </p>
		
	</footer>
	
</body>
</html>
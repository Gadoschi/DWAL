<!DOCTYPE html>
<html>
<head>

	<title>ZKD 2014</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" href="css/grid.css" />
	<meta charset="UTF-8" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
			  <li><a href="#">Naša prica</a></li>
			  <li><a href="#">Kako nas naci</a></li>
			  <li><a href="#">Kontakt</a></li>
			</ul>
		</nav>

    <div class="column column-9">
		<fieldset >
			<legend>Unos podataka</legend>
			<form action="unos_proizvoda.php" method="post">
			<label for="naziv" id="naziv" name="naziv">Naziv:</label>
			<input type="text" id="naziv" name="naziv" required placeholder="Naziv proizvoda"></br></br>
			<label for="tip" id="tip" name="tip">Tip proizvoda:</label>
				<select  id="tip" name="tip">
								<option value="Ništa" name="Ništa">Ništa</option>
								<option value="Ostalo" name="Ostalo">Ostalo</option>
								<option value="Kolač" name="Kolač">Kolač</option>
								<option value="Čokolada" name="Čokolada">Čokolada</option>
								<option value="Keks" name="Keks">Keks</option>
								<option value="Torta" name="Torta">Torta</option>
								<option value="Piće" name="Piće">Piće</option>
				</select></br></br>
			<label for="tip2" name="tip2" id="tip2">Tip proizvoda koji nije u tablici:</label>
			<input type="text" name="tip2" id="tip2" /> </br></br>
			<label for="opis" id="opis" name="opis">Opis proizvoda:</label>
			<input type="text" id="opis" name="opis" required placeholder="Opis proizvoda"></br></br>
			
			<label for="vegetarijanski" id="vegetarijanski" name="vegetarijanski">Vegetarijanski</label>
				<select id="vegetarijanski" name="vegetarijanski">
					<option value="DA" name="DA">DA</option>
					<option value="NE" name="NE">NE</option>
				</select></br></br>
				
			<label for="halal" id="halal" name="halal">Halal:</label>
				<select id="halal" name="halal">
					<option value="DA" name="DA">DA</option>
					<option value="NE" name="NE">NE</option>
				</select></br></br>
				
			<label for="koser" id="koser" name="koser">Košer:</label>
				<select id="koser" name="koser">
					<option value="DA" name="DA">DA</option>
					<option value="NE" name="NE">NE</option>
				</select></br></br>
				
			<label for="alergeni" id="alergeni" name="alergeni">Alergeni:</label>
				<select id="alergeni" name="alergeni">
					<option name="Nema" value="Nema">Nema</option>
					<option name="soja" value="soja">Soja</option>
					<option name="jaja" value="jaja">Jaja</option>
					<option name="kikiriki" value="kikiriki">Kikiriki</option>
					<option name="mlijeko" value="mlijeko">Mlijeko</option>
					<option name="soja" value="soja">Soja</option>
					<option name="soja" value="soja">Soja</option>
					<option name="soja" value="soja">Soja</option>
				</select></br></br>
			<label for="alergeni2" name="alergeni2" id="alergeni2">Alergeni koji nisu u tablici:</label>
			<input type="text" name="alergeni2" id="alergeni2" /> </br></br>
			<label for="cijena" id="cijena" name="cijena">Cijena: </label>
				<input type="text" name="cijena" id="cijena" required placeholder="Cijena - 12,35">kn</br></br>
			
			<input type="submit" name="submit" value="Unos" />
			</form>
 
			</fieldset>	
		
			<?php
			
				if(isset($_POST['submit']))
				{
					include 'classes/connection.php';
					$naziv = mysqli_real_escape_string($db, $_POST['naziv']);
					$tip = mysqli_real_escape_string($db, $_POST['tip']);
					$tip2 = mysqli_real_escape_string($db, $_POST['tip2']);
					$opis = mysqli_real_escape_string($db, $_POST['opis']);
					$vegetarijanski = mysqli_real_escape_string($db, $_POST['vegetarijanski']);
					$halal = mysqli_real_escape_string($db, $_POST['halal']);
					$koser = mysqli_real_escape_string($db, $_POST['koser']);
					$alergeni = mysqli_real_escape_string($db, $_POST['alergeni']);
					$alergeni2 = mysqli_real_escape_string($db, $_POST['alergeni2']);
					$cijena = mysqli_real_escape_string($db, $_POST['cijena']);
					
					$sql = "INSERT INTO `menu` (`id`, `naziv`, `tip`, `opis`, `vegetarijanski`, `halal`, `koser`, `alergeni`, `cijena`) VALUES (NULL, '$naziv', '$tip', '$opis', '$vegetarijanski', '$halal', '$koser', '$alergeni', '$cijena')";
					$result = mysqli_query($db, $sql);
					if($result){
						echo "Uspješno ste unijeli podatke!";
						header("Refresh:2;url=index.html");
					}else{
						echo "Nešto je pošlo po zlu!";
						header("Refresh:2;url=unos_proizvoda.php");
					}
				}
					
			?>
		
    </div>
	</section>
   



	<footer class="site-footer">
		<p>Copyright &copy ZKD j.d.o.o. @2015. </p>
		
	</footer>
	
</body>
</html>
<!DOCTYPE html>
<html>
  <head>
    <title>Unos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
    <link rel="stylesheet" href="app.min.css">
	<meta charset="UTF-8" />

  </head>

  <body>
		<form class="app-input" action="mob.php" method="post">
			<label class="app-input" for="naziv" id="naziv" name="naziv">Naziv:</label>
			<input class="app-input" type="text" id="naziv" name="naziv" required placeholder="Naziv proizvoda"></br></br>
			<label class="app-input" for="tip" id="tip" name="tip">Tip proizvoda:</label>
				<select id="tip" name="tip">
								<option value="Ništa" name="Ništa">Ništa</option>
								<option value="Ostalo" name="Ostalo">Ostalo</option>
								<option value="Kolač" name="Kolač">Kolač</option>
								<option value="Čokolada" name="Čokolada">Čokolada</option>
								<option value="Keks" name="Keks">Keks</option>
								<option value="Torta" name="Torta">Torta</option>
								<option value="Piće" name="Piće">Piće</option>
				</select></br></br>
			<label class="app-input" for="tip2" name="tip2" id="tip2">Tip proizvoda koji nije u tablici:</label>
			<input class="app-input" type="text" name="tip2" id="tip2" /> </br></br>
			<label class="app-input" for="opis" id="opis" name="opis">Opis proizvoda:</label>
			<input class="app-input" type="text" id="opis" name="opis" required placeholder="Opis proizvoda"></br></br>
			
			<label class="app-input" for="vegetarijanski" id="vegetarijanski" name="vegetarijanski">Vegetarijanski</label>
				<select id="vegetarijanski" name="vegetarijanski">
					<option value="DA" name="DA">DA</option>
					<option value="NE" name="NE">NE</option>
				</select></br></br>
				
			<label class="app-input" for="halal" id="halal" name="halal">Halal:</label>
				<select id="halal" name="halal">
					<option value="DA" name="DA">DA</option>
					<option value="NE" name="NE">NE</option>
				</select></br></br>
				
			<label class="app-input" for="koser" id="koser" name="koser">Košer:</label>
				<select id="koser" name="koser">
					<option value="DA" name="DA">DA</option>
					<option value="NE" name="NE">NE</option>
				</select></br></br>
				
			<label class="app-input" for="alergeni" id="alergeni" name="alergeni">Alergeni:</label>
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
			<label class="app-input" for="alergeni2" name="alergeni2" id="alergeni2">Alergeni koji nisu u tablici:</label>
			<input class="app-input" type="text" name="alergeni2" id="alergeni2" /> </br></br>
			<label class="app-input" for="cijena" id="cijena" name="cijena">Cijena: </label>
				<input class="app-input" type="text" name="cijena" id="cijena" required placeholder="Cijena - 12,35">kn</br></br>
			
			<input class="app-input" type="submit" name="submit" value="Spremi" />
			</br></br></br></br></br></br></br></br></br></br>
			</br></br></br></br></br></br></br></br></br></br>
			</form>
			
			
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
					
					if($tip2 == NULL && $alergeni2 == NULL){
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
					
					if($tip2 != NULL && $alergeni2 == NULL){
						$sql = "INSERT INTO `menu` (`id`, `naziv`, `tip`, `opis`, `vegetarijanski`, `halal`, `koser`, `alergeni`, `cijena`) VALUES (NULL, '$naziv', '$tip2', '$opis', '$vegetarijanski', '$halal', '$koser', '$alergeni', '$cijena')";
						$result = mysqli_query($db, $sql);
						if($result){
							echo "Uspješno ste unijeli alternativne tip podatke!";
							header("Refresh:2;url=index.html");
						}
					}
					
					if($alergeni2 != NULL && $tip2 == NULL){
						$sql = "INSERT INTO `menu` (`id`, `naziv`, `tip`, `opis`, `vegetarijanski`, `halal`, `koser`, `alergeni`, `cijena`) VALUES (NULL, '$naziv', '$tip', '$opis', '$vegetarijanski', '$halal', '$koser', '$alergeni2', '$cijena')";
						$result = mysqli_query($db, $sql);
						if($result){
							echo "Uspješno ste unijeli alternativne alergen podatke!";
							header("Refresh:2;url=index.html");
						}
					}
					
					if($alergeni2 != NULL && $tip2 != NULL){
						$sql = "INSERT INTO `menu` (`id`, `naziv`, `tip`, `opis`, `vegetarijanski`, `halal`, `koser`, `alergeni`, `cijena`) VALUES (NULL, '$naziv', '$tip2', '$opis', '$vegetarijanski', '$halal', '$koser', '$alergeni2', '$cijena')";
						$result = mysqli_query($db, $sql);
						if($result){
							echo "Uspješno ste unijeli alternativne alergen i tip podatke!";
							header("Refresh:2;url=index.html");
						}
					}
			
				}
					
			?>

		
    
    <script src="zepto.js"></script>
    <script src="app.min.js"></script>
  </body>
</html>

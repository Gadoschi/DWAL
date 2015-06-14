<html>
<head>
	<title>ZKD 2014</title>
	<meta charset='UTF-8'>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" href="css/grid.css" />
</head>

<body>

	<header class="site-header">
		<div class="row">
			<h1 class="logo"><img src="images/logo.png" style="width: 400px; height: 60px;"/></h1>
			<a href="login.html">Prijava</a>
		</div>
	</header>
  
    <div class="row">
		<nav class="main-navigation">
			<ul>
			  <li><a href="#">Pocetna</a></li>
			   <li><a href="registracija.php">Registracija</a></li>
			  <li><a href="#">Naša prica</a></li>
			  <li><a href="#">Kako nas naci</a></li>
			  <li><a href="#">Kontakt</a></li>
			</ul>
		</nav>
		
		<div class="login">
			
			<form name="login" action="registracija.php" method="POST" accept-charset='UTF-8'>
			<fieldset >
				<legend>Registracija</legend>
				<input type="hidden" name="submitted" id="submitted" value='1'/>
				 
					<label for="username" >Korisničko Ime*:</label>
					<input type="text" name="username" id="username"  maxlength="50" />
						</br></br>
					<label for="password" >Lozinka*:</label>
					<input type="password" name="password" id="password" maxlength="50" />
						</br></br>
					<label for="ime" >Ime i prezime*:</label>
					<input type="ime" name="ime" id="ime" maxlength="50" />
						</br></br>
				<input type="submit" name="Submit" value='Prijava' />
				<input type="reset" name="reset" value="Otkaži" />
 
			</fieldset>	
			
		</div>
		
	</div>
	
	<?php
	
		if(isset($_POST['Submit'])){
			
			include 'classes/connection.php';
			
			$username = mysqli_real_escape_string($db, $_POST['username']);
			$password = mysqli_real_escape_string($db, $_POST['password']);
			$ime = mysqli_real_escape_string($db, $_POST['ime']);
			if(strlen($password) < 6){
				echo "Lozinka mora imati minimalno 6 znakova!";
				header("Refresh:2; url=registracija.php");
				return false;
			}else{
				$password = md5($password);
				$sql = "INSERT INTO  `baza`.`korisnici` (`id` ,`username` ,`password` ,`ime`) VALUES (NULL ,  '$username',  '$password',  '$ime')";
				$result = mysqli_query($db, $sql);
				if($result){
					echo "Podaci su uspješno uneseni!";
					header("Refresh:2;url=login.html");
				}else{
					echo "Nešto je pošlo po zlu, pokušajte ponovno!";
					header("Refresh:2;url=registracija.php");
				}
			}
			
			
		}
	
	?>


	<footer class="site-footer">

		<p>Copyright &copy; ZKD j.d.o.o. @2015.</p>
		
	</footer>
	
</body>
</html>
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
			  <li><a href="fopen.php">Fopen</a></li>
			  <li><a href="#">Kako nas naci</a></li>
			  <li><a href="#">Kontakt</a></li>
			</ul>
		</nav>
		
	

  <div class="column column-9">
	
	<form method="GET" action="fopen.php">
		<input type="text" name="proizvodjac" placeholder="Proizvođač"><br>
		<input type="text" name="proizvod"placeholder="Proizvod"><br>
		<input type="submit" name="submit" value="Traži">
	</form>
	
		<div id='map_holder'></div>
			<br/>
			<button id="prev">Prijašnji</button>
			<button id="next">Idući</button>
					
		
		<div class="column-9">
			</br>

		</div>
	
    </div>
	</section>
	
		<?php
		
		if(isset($_GET['submit']))
		
		{	
				include 'classes/connection.php';
				$json = file_get_contents("http://stipe.predanic.com/TVZ/podaci.php");
				//echo $json;
				$obj = json_decode($json);
				$proizvodjac= $_GET["proizvodjac"];
				$proizvod= $_GET["proizvod"];
				foreach ($obj as $key => $value) {
				if( isset( $_GET['proizvodjac'] ))
				{
				//echo $proizvodjac;
				//echo $proizvod;
				//echo $value->naziv;
					if ($value->naziv==$proizvodjac){
						echo 'ID: '.$value->id .'<br>';
						echo 'ID proizvodjaca: '.$value->id_proizvodjaca .'<br>';
						echo 'Proizvod: '.$value->proizvod .'<br>';
						echo 'Cijena: '.$value->cijena .'<br>';
						echo 'Stanje u skladistu: '.$value->stanje_na_skladistu .'<br>';
						echo 'Naziv proizvodjaca: '.$value->naziv .'<br>';
						echo '///////////////////////////////////////////////////////////////////'.'<br>';
					}
				}
				

				if( isset( $_GET['proizvod'] ))
				{
					echo $proizvod;
					echo $value->proizvod;
				if ($value->proizvod==$proizvod){
					echo 'ID: '.$value->id .'<br>';
					echo 'ID proizvodjaca: '.$value->id_proizvodjaca .'<br>';
					echo 'Proizvod: '.$value->proizvod .'<br>';
					echo 'Cijena: '.$value->cijena .'<br>';
					echo 'Stanje u skladistu: '.$value->stanje_na_skladistu .'<br>';
					echo 'Naziv proizvodjaca: '.$value->naziv .'<br>';
					echo '///////////////////////////////////////////////////////////////////'.'<br>';
					}

				}
				

				if( isset( $_GET['proizvodjac'] ) && isset( $_GET['proizvod'] ) ){
				if ( $value->naziv==$proizvodjac  && $value->proizvod==$proizvod){
					echo 'ID: '.$value->id .'<br>';
					echo 'ID proizvodjaca: '.$value->id_proizvodjaca .'<br>';
					echo 'Proizvod: '.$value->proizvod .'<br>';
					echo 'Cijena: '.$value->cijena .'<br>';
					echo 'Stanje u skladistu: '.$value->stanje_na_skladistu .'<br>';
					echo 'Naziv proizvodjaca: '.$value->naziv .'<br>';
					echo '///////////////////////////////////////////////////////////////////'.'<br>';
					}
				}
				}
		}
				?>

		<script type="text/javascript">
		$(document).ready(function(){
			var myArray = <?php print(json_encode($potential)); ?>;
			console.log(myArray);
			var l = myArray.length;
			console.log(l);
			var myArray = ["Saab", "Volvo", "BMW"];
			var i = -1;
			
				$('#prev').click(function(){
				i--;
				displayPic(i);
					});
					
				$('#next').click(function(){
					i++;
					displayPic(i);
				});
				function displayPic(i) {        
				$('#map_holder').empty();
				$('#map_holder').append(myArray[i]);
				console.log(myArray[i]);

			if(i == 0) 
				$('#prev').hide();
			else  
				$('#prev').show();     

			if(i == myArray.length-1)
				$('#next').hide();
			else
				$('#next').show();   
			}
		});
		</script>
	
	<footer class="site-footer">
		<p>Copyright &copy ZKD j.d.o.o. @2015. </p>
		
	</footer>
	
</body>
</html>
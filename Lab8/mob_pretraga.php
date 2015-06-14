<!DOCTYPE html>
<html>
  <head>
    <title>Unos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
    <link rel="stylesheet" href="app.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<meta charset="UTF-8" />

  </head>

  <body>
  
  <?php
	include 'classes/connection.php';
    $sql = "SELECT * FROM `menu`";
    $result = mysqli_query($db, $sql);
    $potential = mysql_fetch_array($result);
    //echo json_encode($potential);
?>

	<div id="map_holder">  </div>
	
		<div id="sljedeci">
			<input type="submit" id="next" name="submit" value="sljedeći"/>
		</div>
		
		<div id="prethodni">
			<input type="submit" id="prev" name="submit" value="prethodni"/>
		</div>
		
    
    <script src="zepto.js"></script>
		
			<!--	<script>
						var myArray = <?php echo json_encode($rows); ?>;
						console.log(myArray[0]);
						var obj = JSON.parse(myArray);
					</script>	!-->
	
		<script type="text/javascript">
		$(document).ready(function(){
			
			var myArray = ["Gibanica 12kn", "Sirnica 10kn", "Burek 12kn", "Baklava 20kn", "Mađarica 10kn"];
			var i = 0;
			displayPic(0);
			
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
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="app.min.js"></script>
  </body>
</html>

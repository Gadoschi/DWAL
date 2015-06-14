<?php

include 'classes/connection.php';
$q = "SELECT * FROM menu";

$sth = mysqli_query ($db, $q);
$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
    }

print json_encode($rows);

?>

<html>
<head>
</head>
<body>

<p id="demo"></p>
<script>
var cars = ["Saab", "Volvo", "BMW"];
document.getElementById("demo").innerHTML = cars[0];
</script>


<script>
var myArray = <?php echo json_encode($rows); ?>;
console.log(myArray[0]);

			var obj = JSON.parse(myArray);
			</script>

<script type="text/javascript">

		$(document).ready(function(){
			
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

		<div id='map_holder'></div>
			<br/>
			<button id="prev">Prijašnji</button>
			<button id="next">Idući</button>

</body>
</html>
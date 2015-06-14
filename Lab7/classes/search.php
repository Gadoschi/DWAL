<?php

	require_once 'Connection.simple.php';
	$conn = dbConnect();
	$OK = true; // We use this to verify the status of the update.
	// If 'buscar' is in the array $_POST proceed to make the query.
	if (isset($_GET['name'])) {
		// Create the query
		$data = "%".$_GET['name']."%";
		$sql = 'SELECT * FROM menu WHERE naziv like ?';
		// we have to tell the PDO that we are going to send values to the query
		$stmt = $conn->prepare($sql);
		// Now we execute the query passing an array toe execute();
		$results = $stmt->execute(array($data));
		// Extract the values from $result
		$rows = $stmt->fetchAll();
		$error = $stmt->errorInfo();
		//echo $error[2];
	}
	// If there are no records.
	if(empty($rows)) {
		echo "<tr>";
			echo "<td colspan='4'>Nema zapisa o tom proizvodu</td>";
		echo "</tr>";
	}
	else {
		foreach ($rows as $row) {
			echo "<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['naziv']."</td>";
				echo "<td>".$row['tip']."</td>";
				echo "<td>".$row['cijena']." kn</td>";
			echo "</tr>";
		}
	}
?>
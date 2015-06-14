<?php

	require_once 'Connection.simple.php';
	$conn = dbConnect();
	$OK = true; // We use this to verify the status of the update.
	// If 'buscar' is in the array $_POST proceed to make the query.
	if (isset($_GET['id'])) {
		// Create the query
		$data = trim($_GET['id']);
		$sql = 'SELECT * FROM menu WHERE id = ?';
		// we have to tell the PDO that we are going to send values to the query
		$stmt = $conn->prepare($sql);
		// Now we execute the query passing an array toe execute();
		$results = $stmt->execute(array($data));
		// Extract the values from $result
		$row = $stmt->fetch();
		$error = $stmt->errorInfo();
		//echo $error[2];
	}
	// If there are no records.
	if(empty($row) && !isset($row)) {
		echo '{"id":"","0":"","naziv":"Nema zapisa","1":"","tip":"","2":"","cijena":"","3":""}';
	}
	else {
		echo json_encode($row);
	}
?>
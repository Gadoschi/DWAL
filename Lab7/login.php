<html>
<head>
<meta charset="UTF-8" />
</head>

<body>

<?php
session_start(); 

$username=$_POST['username'];
$password=$_POST['password'];

include 'classes/connection.php';

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($db, $username);
$password = mysqli_real_escape_string($db, $password);
$password = md5($password);

$sql = "SELECT * FROM korisnici WHERE password = '$password' AND username = '$username' ";
$query = mysqli_query($db, $sql);
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['user']=$username; // Initializing Session
echo "Uspješno ste se prijavilia!";
header("Refresh:2;url=index.php"); // Redirecting To Other Page
} else {
$error = "Korisničko ime ili lozinka su netočni!";
echo $error;
header("Refresh:2;url=login.html");
}
mysqli_close($db); // Closing Connection


?>

</body>
</html>
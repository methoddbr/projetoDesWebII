<?php	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "motorlocacao";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	//diego
	$db = new Mysqli;
	$db->connect('localhost','root','','motorlocacao');
		
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>
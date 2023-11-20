<html>
	<body>
<?php

$dbsevername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "MNE_SERVICES";
 
	//create connection
	$conn=mysqli_connect($dbsevername,$dbusername,$dbpassword,$dbname);
	
	//check connection
	if($conn->connect_error)
	{
		die("connection failed:".$conn->connect_error);
	}
	echo "Connected successfully";
		?>
		</body>
		</html>
		
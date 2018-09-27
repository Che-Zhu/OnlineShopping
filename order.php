<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Shopping</title>
</head>
<body background="background.jpg">
	<?php 
		$conn = mysqli_connect('localhost','root', '', 'pizzastore');
		if ( !$conn ) {
				die("Connection failed: " .mysqli_connect_error());      /* Establish connection with database */
		} 
	?>

</body>
</html>
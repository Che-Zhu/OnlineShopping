<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>CheckOut</title>
</head>
<body background="background.jpg">
		<?php 
		$conn = mysqli_connect('localhost','root', '', 'pizzastore');
		if ( !$conn ) {
				die("Connection failed: " .mysqli_connect_error());      /* Establish connection with database */
		} 



		for ($i=0; $i < count($_SESSION['pizzaSession']); $i++) { 
			echo "<img src=".$_SESSION['pizzaSession'][$i].">";

			echo "<img src=".$_SESSION['sauce'][$i].">";
			echo 
			echo "<br>";
		}
		?>







	<h1>Please enter the required information to process your order:</h1>


	<form method="post" action="confirm.php">
		<label for="firstName">First Name</label>
		<input type="text" name="FirstName" id="firstName"> <br>
		<label for="lastName">Last Name</label>
		<input type="text" name="LastName" id="lastName"> <br>
		<label for="email">Email</label>
		<input type="email" name="Email" id="email"> <br>
		<input type="submit" name="submit" value="Confirm">
	</form>

</html>
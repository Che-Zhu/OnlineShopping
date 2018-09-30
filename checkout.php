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

			$sizeTemp = $_SESSION['pizzaSession'][$i];

			$sqlSize = "SELECT Size, Price FROM pizza WHERE Picture = '$sizeTemp'";
			$size = mysqli_query($conn, $sqlSize);
			$row = mysqli_fetch_array($size, MYSQLI_ASSOC);
			echo "<span>The size of the pizza is: </span>";
			echo $row["Size"];
			echo "<span>The price of the pizza is: </span>";
			echo $row ["Price"];



			echo "<img src=".$_SESSION['sauce'][$i].">";

			echo "<br>";
		}
		?>









	<h1>Please enter the required information to process your order:</h1>







	<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" >
		<label for="firstName">First Name</label>
		<input type="text" name="FirstName" id="firstName"> <br>
		<label for="lastName">Last Name</label>
		<input type="text" name="LastName" id="lastName"> <br>
		<label for="email">Email</label>
		<input type="email" name="Email" id="email"> <br>
		<input type="submit" name="submit" value="Confirm">
	</form>

	<?php
		// define variables and set to empty values
		$firstName = $lastName = $firstf = $firstff = $lastf = $laftff = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
  			$firstName = $_POST["FirstName"];
			$lastName = $_POST["LastName"];
		
			$checkFirst = "SELECT GivenName FROM customer WHERE GivenName = '$firstName'";
			$checkLast = "SELECT GivenName FROM customer WHERE LastName = '$lastName'";
			$firstf = mysqli_query($conn, $checkFirst);
			$lastf = mysqli_query($conn, $checkLast);
			$firstff = mysqli_fetch_array($firstf, MYSQLI_ASSOC);
			$lastff = mysqli_fetch_array($lastf, MYSQLI_ASSOC);
			if ($firstName == NULL || $firstff == NULL || $lastName == NULL || $lastff == NULL) {
				echo '<p>The information you provided does not match with our database!</p>';
				return false;
			}
		}


?>

</html>
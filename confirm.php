<?php
	session_start();
	$lastName=$_POST['LastName'];
	$firstName=$_POST['FirstName'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Confirm</title>
</head>
<body>
	<h1>Order Confirmed!</h1>
	<?php
		echo "<p>Your Last Name:</p>";
		echo $lastName;
		echo "<br>";
		echo "<p>Your First Name:</p>";
		echo $firstName;
		echo "<br>";
		echo "<p>Total charge for the order:<p>";

	?>
</body>
</html>


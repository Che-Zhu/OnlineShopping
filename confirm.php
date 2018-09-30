<?php
	session_start();

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
		echo $_SESSION['firstName'];
		echo "<br>";
		echo "<p>Your First Name:</p>";
		echo $_SESSION['lastName'];
		echo "<br>";
		echo "<p>Total charge for the order:<p>";
		echo $_SESSION['totalPrice'];

	?>
</body>
</html>


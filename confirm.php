<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Confirm</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body background="background1.jpg">
	<h1>Order Confirmed!</h1>
	<?php
		echo '<div style="text-align: center;">', "<p>Your Last Name:</p>", $_SESSION['firstName'], "<br>", "<p>Your First Name:</p>",
		$_SESSION['lastName'], "<br>", "<p>Total charge for the order:<p>", $_SESSION['totalPrice'], "</div>";

	?>
</body>
</html>

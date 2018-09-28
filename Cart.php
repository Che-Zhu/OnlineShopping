<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
</head>
<body background="background.jpg">
	<?php
		$pizza=$_POST["valuePizza"];     /* number of pizza */
		$sauce=$_POST["sauce"];          /* sauce ID */
	?>
	<h1>You have selected the following items:</h1>
	<div style="display: inline;">
		<div style="display: inline-block; float: left; width: 50%;">
			<p>You selected pizzas:</p>
			<img src=<?php echo $_SESSION['pizzaSe'] ?>>
			<p style="display: inline;">Number of pizzas: <?php echo $pizza ?></p>
		</div>
		<div style="display: inline-block;">
			<p>You selected sauce:</p>
			<img src=<?php echo $_POST["sauce"] ?>>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>


	<br>	
	<div>
	<a href="order.php" >Order another pizza</a>
	</div>
	<a href="test.php">test</a>
</body>
</html>
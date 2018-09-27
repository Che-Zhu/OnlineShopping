<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Shopping</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body background="background.jpg">
	<?php 
		$conn = mysqli_connect('localhost','root', '', 'pizzastore');
		if ( !$conn ) {
				die("Connection failed: " .mysqli_connect_error());      /* Establish connection with database */
		} 


		$sql = "SELECT * FROM pizza";
		$pizzaDetail = mysqli_query($conn, $sql) 
		or die('Problem with query' . mysqli_error());       /* Get the pizza info from database */
	?>

	<h1>Order a pizza now</h1>
		
	<?php 
		while ($row = mysqli_fetch_array($pizzaDetail, MYSQLI_ASSOC)) { /* Display pictures and set pizzaID as value, they were retrieved from database */
	?>
	<a href="sauce.php?pizza=<?php echo $row["Picture"] ?>"" name="pizza">
		<img src=<?php echo $row["Picture"] ?>  vaule=<?php echo $row["PizzaID"] ?>>                   
	</a>
	<?php
		}
	?>



</body>
</html>
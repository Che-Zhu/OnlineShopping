<?php
$pizzaSelect=$_GET["pizza"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sauce and quantity</title>
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


	<h1>Please select the quantity of your pizza</h1>
	<p>You chose:</p>
	<form>
	<div>
	<img src=<?php echo $pizzaSelect ?>>
	<select>
		<?php
			$i=0;
			while ($i<= 10) {         /* Decide how many pizza can be ordered once */
		?>
				<option value=<?php echo $i ?>><?php echo $i ?></option>        
		<?php
			$i++;
			}
		?>
			
	</select>
	</div>
	</form>

</body>
</html>
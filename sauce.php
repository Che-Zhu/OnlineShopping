<?php
session_start();
$pizzaSelect=$_GET["pizza"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sauce and quantity</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body background="background1.jpg">
	<?php
		$conn = mysqli_connect('localhost','root', '', 'pizzastore');
		if ( !$conn ) {
				die("Connection failed: " .mysqli_connect_error());      /* Establish connection with database */
		}


		$sql = "SELECT * FROM pizza";
		$pizzaDetail = mysqli_query($conn, $sql)
		or die('Problem with query' . mysqli_error());       /* Get the pizza info from database */

		$sau = "SELECT * FROM sauce";
		$sauDetail = mysqli_query($conn, $sau)
		or die('Problem with query' . mysqli_error());       /* Get the sauce info from database */
	?>


	<h1>Please select the quantity of your pizza</h1>
	<p style="text-align: center;">You chose:</p>
	<form action="Cart.php" method="post">
	<div style="text-align: center;">
	<img src=<?php echo $pizzaSelect ?>>
	<?php $_SESSION['pizzaSe']=$pizzaSelect ?>











	<select name="valuePizza" >
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

	<dev style="text-align: center;">
		<?php
		while ($row = mysqli_fetch_array($sauDetail, MYSQLI_ASSOC)) { /* Display pictures and set pizzaID as value, they were retrieved from database */
	?>
		<img src=<?php echo $row["SaucePic"] ?>>
		<div style="text-align: center;">
			<button value=<?php echo $row["SaucePic"] ?> name="sauce" >Add this sauce to Pizza</button>
		</div>

		<?php
			}
		?>
	</dev>
	</form>

</body>
</html>

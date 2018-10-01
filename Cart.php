<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body background="background1.jpg">
	<?php
		$pizza=$_POST["valuePizza"];     /* number of pizza */
		$sauce=$_POST["sauce"];          /* sauce ID */
	?>
	<h1>You have selected the following items:</h1>




	<?php
	if (!isset($_SESSION['pizzaSession'])) {
		$_SESSION['pizzaSession']=array();
	}
	array_push($_SESSION['pizzaSession'], $_SESSION['pizzaSe']);      /* collection of pizza pictures */

	if (!isset($_SESSION['pizzaNum'])) {
		$_SESSION['pizzaNum']=array();                             /* collection of amount of pizzas */
	}
	array_push($_SESSION['pizzaNum'], $pizza);


	if (!isset($_SESSION['sauce'])) {
		$_SESSION['sauce']=array();                             /* collection of sauces */
	}
	array_push($_SESSION['sauce'], $sauce);

	$cou=0;              /* counting pizza number */
	?>






	<div style="display: inline;">
		<div style="display: inline-block; float: left; width: 50%;">
			<p style="text-align: center;">You selected pizzas:</p>


			<?php
			foreach ($_SESSION['pizzaSession'] as $key => $value) {

			?>
			<img src=<?php echo $value ?>>
			<?php
			echo '<div style="text-align: center;">','<span >Number of Pizzas:</span>', $_SESSION['pizzaNum'][$cou], '</div>';

			$cou++;
			?>
			<br>
			<?php
				}
			?>


		</div>
		<div style="display: inline-block;">
			<p>You selected sauce:</p>
			<?php
			foreach ($_SESSION['sauce'] as $key => $value) {
			?>

			<img src=<?php echo $value ?>>
			<br>
			<?php
			}
			?>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>


	<br>
	<div style="float: left;">
	<a href="order.php" style="float: left;">Order another pizza</a>
	</div>

	<a href="checkout.php" style="float: right;">Check Out</a>
</body>
</html>

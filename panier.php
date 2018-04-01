<?php
include_once(__DIR__ . "/backend/general.php");
@session_start();
if ($_SESSION['group'] == "admin") {
	header("Location: admin.php");
}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>CowShop</title>
		<meta name="description" content="CowShop">
		<meta name="author" content="42">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<div class="header">
			<?php include("./header.php"); ?>
		</div>		
		<div class="man-box form">
			<?php
			$product = file_to_data(__DIR__ . "/private/product");
			/* print_r($product); */
			$list = explode(" ", "toto11 toto12 toto21 toto22");
			echo '<h2> Panier </h2>';
			echo '<hr><br>';
			$tot = 0;
			if (!empty($list)) {
				foreach ($list as $p) {
					if (!isset($product[$p])) continue;
					$tot += $product[$p]['price'];
					echo "<div class=\"textbox\">";
					echo "<div class=\"left\">Product: <strong>".$p."</strong></div>";
					echo "<div class=\"right\">Price: <i>".$product[$p]['price']."</i> €</div><br>";
					echo "</div><br>";
				}
			} else {
				echo '<p>The cart is empty</p>';
			}
			echo '<br><hr>';
			echo 'Total: '.$tot.'€';
			?>
		</div>
	</body>
</html>

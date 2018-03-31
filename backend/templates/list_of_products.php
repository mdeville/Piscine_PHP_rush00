<?PHP

/*
** Needs to be updated with :
** 	- <a href="goto page of product" >
*/

include __DIR__."/../general.php";

function list_product()
{
	if (($products = file_to_data(__DIR__."/../../private/product")) === false)
		return false;
	foreach ($products as $item)
	{
		echo '<li class="products">'.$item['name'].'</li>'."\n";
	}
}
?>
<html>
<head>
<!--<link rel="stylesheet" href="/rush00/css/main.css">-->
	<style>
		.product_list {
			list-style: none;
			margin: 0;
			padding: 0;
		}
	
		.products {
			font-family: Lato, sans-serif;
		}
	</style>
</head>
<body>
	<ul class="product_list">
<?PHP
list_product();
?>
	</ul>
</body>
</html>

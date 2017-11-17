<!DOCTYPE html>
<html>
<head>
	<title>Receipt</title>
</head>
<body>
	<h1>Order Receipt</h1>
	<!-- Using GET method means that the receipt can be bookmarked -->
	<!-- PHP standard output is used throughout the peice of code -->
	<h3>Customer Name: <?php print($_GET["name"]) ?></h3>
	<h3>Payment Method: <?php print($_GET["payment"]) ?></h3>
	<!-- A table to display order -->
	<table border="border">
		<tr>
			<th></th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Cost</th>
		</tr>
		<tr>
			<th>Apple</th>
			<th>$0.69</th>
			<th><?php print($_GET["apple"]) ?></th>
			<!-- Use number_format to keep only 2 decimal places in case of floating point calculation error -->
			<th><?php print("$".number_format($_GET["apple"]*0.69,2)) ?></th>
		</tr>
		<tr>
			<th>Orange</th>
			<th>$0.59</th>
			<th><?php print($_GET["orange"]) ?></th>
			<th><?php print("$".number_format($_GET["orange"]*0.59,2)) ?></th>
		</tr>
		<tr>
			<th>Banana</th>
			<th>$0.39</th>
			<th><?php print($_GET["banana"]) ?></th>
			<th><?php print("$".number_format($_GET["banana"]*0.39,2)) ?></th>
		</tr>
		<tr>
			<th>Total</th>
			<th></th>
			<th></th>
			<th><?php print("$".number_format($_GET["apple"]*0.69+$_GET["orange"]*0.59+$_GET["banana"]*0.39,2)) ?></th>
		</tr>		
	</table>
</body>
</html>
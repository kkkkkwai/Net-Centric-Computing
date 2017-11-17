<?php
// Execute the following code only when it is led by a submission
// Otherwise redirect to error page
if(isset($_POST["Submit"])){
	// Store query strings in variables for later use
	$name=$_POST["name"];
	$num_apple=$_POST["num_apple"];
	$num_orange=$_POST["num_orange"];
	$num_banana=$_POST["num_banana"];
	$total_cost=$_POST["total_cost"];
	$payment=$_POST["payment"];

	// If there's no order.txt, it means previous order information is lost.
	// Hence redirect to error page
	if(file_exists("order.txt")){
		// Redirect to receipt page to display receipt
		// Query strings(name/value pairs) are sent through url 
		header("Location: receipt.php?name=$name&apple=$num_apple&orange=$num_orange&banana=$num_banana&total=$total_cost&payment=$payment");
		updateFile($num_apple,$num_orange,$num_banana);
	}
	else{
		header("Location: error.html");
	}
}
else{
	header("Location: error.html");
}

// The function is to update the total order information in order.txt
function updateFile($apple, $orange, $banana){
	$file=fopen("order.txt","r") or exit("Unable to open file order.txt");
	// $new stores the array to be added upon
	$new=array("apple"=>$apple, "orange"=>$orange, "banana"=>$banana);
	$order=array("apple"=>0, "orange"=>0, "banana"=>0);
	// First break down the line into array
	// Then add up the number in the array and new order info
	// Total number is stored in $order array
	foreach ($order as $fruit => $num) {
		$line=fgets($file);
		$num=explode(":", $line);
		$order[$fruit]=$num[1]+$new[$fruit];
	}
	fclose($file);
	$file=fopen("order.txt", "w") or exit("Unable to open file order.txt");
	// Output the lines to text file.
	foreach ($order as $fruit => $num) {
		fwrite($file, "Total number of ".$fruit.":".$num."\r\n");
	}
	fclose($file);
}
?>
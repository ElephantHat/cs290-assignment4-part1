<?php

//ERROR REPORTING
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$errors = [];

function valCheck(){
	global $errors;
	$retval = true;

	if (!empty($_GET['min-multiplicand']) && !empty($_GET['max-multiplicand'])){
		if(!(!is_numeric($_GET['min-multiplicand']) || strpbrk($_GET['min-multiplicand'], '.')) && 
			!(!is_numeric($_GET['max-multiplicand']) || strpbrk($_GET['max-multiplicand'], '.'))){

			if((int)$_GET['min-multiplicand'] >= (int)$_GET['max-multiplicand']){
				$retval=false;
				array_push($errors, 'ERROR: Value "min-multiplicand" must be less than "max-multiplicand".');
			}
		}
		else{
			if(!is_numeric($_GET['min-multiplicand']) || strpbrk($_GET['min-multiplicand'], '.')){
				$retval=false;
				array_push($errors, 'ERROR: Value "min-multiplicand" must be an integer.');
			}
			if(!is_numeric($_GET['max-multiplicand']) || strpbrk($_GET['max-multiplicand'], '.')){
				$retval=false;
				array_push($errors, 'ERROR: Value "max-multiplicand" must be an integer.');
			}
		}
	}
	else{
		if (empty($_GET['min-multiplicand'])){
			$retval=false;
			array_push($errors, 'ERROR: Value "min-multiplicand" must exist.');
		}
		if (empty($_GET['max-multiplicand'])){
			$retval=false;
			array_push($errors, 'ERROR: Value "max-multiplicand" must exist.');
		}
	}

	if (!empty($_GET['min-multiplier']) && !empty($_GET['max-multiplier'])){
		if(!(!is_numeric($_GET['min-multiplier']) || strpbrk($_GET['min-multiplier'], '.')) && 
			!((!is_numeric($_GET['max-multiplier']) || strpbrk($_GET['max-multiplier'], '.')))){

			if((int)$_GET['min-multiplier'] >= (int)$_GET['max-multiplier']){
				$retval=false;
				array_push($errors, 'ERROR: Value "min-multiplier" must be less than "max-multiplier".');
			}
		}
		else{
			if(!is_numeric($_GET['min-multiplier']) || strpbrk($_GET['min-multiplier'], '.')){
				$retval=false;
				array_push($errors, 'ERROR: Value "min-multiplier" must be an integer.');
			}
			if(!is_numeric($_GET['max-multiplier']) || strpbrk($_GET['max-multiplier'], '.')){
				$retval=false;
				array_push($errors, 'ERROR: Value "max-multiplier" must be an integer.');
			}
		}
	}
	else{
		if (empty($_GET['min-multiplier'])){
			$retval=false;
			array_push($errors, 'ERROR: Value "min-multiplier" must exist.');
		}
		if (empty($_GET['max-multiplier'])){
			$retval=false;
			array_push($errors, 'ERROR: Value "max-multiplier" must exist.');
		}
	}
	return $retval;
}


function getArray(){
	$mincand = (int)$_GET['min-multiplicand'];
	$maxcand = (int)$_GET['max-multiplicand'];
	$minpli = (int)$_GET['min-multiplier'];
	$maxpli = (int)$_GET['max-multiplier'];
	
	$h = $maxcand -$mincand+2;
	$l = $maxpli-$minpli+2;
	$arr=[];

	//Initialize empty 2d array
	for ($i=0; $i<$h; $i++){
		$arr2 = [];
		array_push($arr, $arr2);
	}

	//Empty upper left corner
	array_push($arr[0], "");

	//Left column from min to max multiplicand
	for($i = 1; $i<$h; $i++){
		array_push($arr[$i], $mincand+$i-1);
	}

	//Top row from min to max multiplier
	for($i =$minpli ; $i<=$maxpli; $i++){
		array_push($arr[0], $i);
	}

	//Multiplication values!
	for ($i=1; $i<$h; $i++){
		for ($j=1; $j<$l; $j++){
			array_push($arr[$i], $arr[$i][0]*$arr[0][$j]);
		}
	}

 	return $arr;
}

function makeTable($arr){
	echo "<table>";
	for ($i=0; $i<count($arr); $i++){
		echo "<tr>";
		for ($j=0; $j<count($arr[0]); $j++){
			echo "<td>".$arr[$i][$j]."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";


	echo '<script type="text/javascript">
		$("tr:nth-child(odd)").addClass("grey");
		$("tr:first-child").removeClass("grey").addClass("darkgrey");
		$("td:first-child").addClass("darkgrey");
		</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<title>CS290 Assignment 4.1 - PHP Multiplication Tables</title>
</head>
<body>

<?php 
if(valCheck()){
	$arr = getArray();
//	print_r($A);
	makeTable($arr);
}
else{
	foreach ($errors as $val){
		echo $val, "<br>";
	}
}
?>

</body>
</html>

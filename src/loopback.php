<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$loopbackInfo = array("Type" => $_SERVER['REQUEST_METHOD']);


if ($_SERVER['REQUEST_METHOD'] == "GET") {
	  if ($_GET  == null) 
		  $paramArray = array("parameters" => null);
	  else
		  $paramArray = array("parameters" => $_GET);
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if ($_POST  == null) 
		  $paramArray = array("parameters" => "null");
	  else
		  $paramArray = array("parameters" => $_POST);
}

$loopbackInfo = array_merge($loopbackInfo, $paramArray);
print_r(json_encode($loopbackInfo));
 
?>

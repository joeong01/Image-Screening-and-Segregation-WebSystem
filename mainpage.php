<?php
    session_start();
    error_reporting(0);
    include('include/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" type="image/png" href="images/Ideal-Logo-Square_Transparent.png" sizes="192x192" >
		<title>Ideal Vision Image Screening System</title>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="css/style.css" rel="stylesheet">
	</head>

	<body id="page-top">

<?php
		include ('include/Header.php'); // include contents from header.php

	    include ('include/Footer.php');

    	// Bootstrap core JavaScript
		// Placed at the end of the document so the pages load faster 
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>";
		echo "<script src='js/bootstrap.min.js'></script>";
		echo "<script src='js/SmoothScroll.js'></script>";
		echo "<script src='js/theme-scripts.js'></script>";
	echo "</body>";
echo "</html>";
?>

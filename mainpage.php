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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
		<!-- Custom styles for this template -->
		<link href="css/style.css" rel="stylesheet">
		<link href="css/button.css" rel="stylesheet">
		<link href="css/slider.css" rel="stylesheet">
		<link href="css/displayDefect.css" rel="stylesheet">

	</head>

	<body id="page-top">

	<?php 
		include ('include/Header.php'); // include contents from header.php 
	?>		
<div class="section-title">
	<div class="slider">
        <div class="btn" onclick="prev()">
            <img src="images/Left.png"/>
        </div>
        <div class="img-box">  
            <img src="Pic/1.png" class="slider-img">
        </div>
        <div class="btn" onclick="next()">
            <img src="images/Right.png"/>
        </div>
    </div>
		
	<div class="display-centered">
		<button class="btn1 button-glow-green glow-button-green">Pass</button>
			
			<!-- Button trigger modal -->
			
		<button class="btn1 button-glow-red glow-button-red" data-toggle="modal" data-target="#mymodal">Fail</button>

		<div class="modal" id="mymodal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Modal title</h5>        			
					</div>
					<div class="modal-body" style="overflow:auto;">
						<?php
						    $dir = dirname("../Image-Screening-and-Segregation-System-main/Defect/..");
							$folder = array_diff(scandir($dir), array('..', '.'));

							echo "<form action='defectProcess.php' method='get' onclick='getImg'>";
							echo "<table>";
								foreach ($folder as $category){
									echo "<tr>";
										echo "<td>";
											echo "<input type='checkbox' name='categories[]' value= $category>";
										echo "</td>";
										echo "<td>";
											echo "$category";
										echo "</td>";
									echo "</tr>";
								}
								echo "<tr>";
									echo "<td colspan='2'>";
										echo "<a href='XXXXXXXX.php'>Add new Category??</a>";
									echo "</td>";
								echo "</tr>";
							echo "</table>";
						?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn1 btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn1 btn-success">Save</button>
					</div>
				</div>
			</div>
		</div>	
	</div>
							</div>
	
	<?php 

	include ('include/Footer.php');

    	// Bootstrap core JavaScript
		// Placed at the end of the document so the pages load faster 
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>";
		echo "<script src='js/bootstrap.min.js'></script>";
		echo "<script src='js/SmoothScroll.js'></script>";
		echo "<script src='js/theme-scripts.js'></script>";
		echo "<script src='js/slider.js'></script>";
	echo "</body>";
echo "</html>";
?>

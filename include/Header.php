<?php
    session_start();
    error_reporting(0);
    include('include/dbconnection.php');
?>

<head>
	<link href="../css/dropdown_viewImage.css" rel="stylesheet">
</head>
<!-- Navigation -->
		
<nav class='navbar navbar-default'>
	<div class='container'>
		<!--Brand and toggle get grouped for better mobile display -->
		<div class='navbar-header page-scroll'>
			<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
				<span class='sr-only'>Toggle navigation</span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
			</button>
			
			<a class='navbar-brand page-scroll' href='#page-top'><img src='images/logo.png' width = '120' height = '55'></a>
		</div>

		<!--Collect the nav links, forms, and other content for toggling -->
		<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
			<ul class='nav navbar-nav navbar-right'>
				<li class='hidden'>
					<a href='#page-top'></a>
				</li>
				<li>
					<a href='mainpage.php'>Image Screening</a>
				</li>
				<li>
					<a href='.php'>Edit Defect Categories</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View Images<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href='.php'>Pass Images</a></li>
						<li><a href='.php'>Defect Images</a></li>
					</ul>
				</li>
				<li>
					<a href='SignIn.php'>Settings</a>
				</li>
				<li>
					<a href='SignIn.php?logout=1'><font color='red'>Logout</font></a>
				</li>
			</ul>
		</div>
				
	<!-- /.navbar-collapse -->
	</div>
<!-- /.container-fluid -->
</nav>

		

<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="CSS/style.css" />

<body>
    <?php 
	//start the session
	session_start ();
		
    include ('LogoHeader.php');
        
    echo "<div id='menu'>";

     //If already log in
	 if (isset($_SESSION['userId'])){
		 
		 echo "<ul>";
            //List all the content in the menu and the link of the content
            echo "<li class='menuitem'><a href='mainpage.php'>Image Screening</a></li>";
            echo "<li class='menuitem'><a href='.php'>Edit Defect Categories</a></li>";
            echo "<li class='menuitem'><a href='.php'>Pass Images</a></li>";
            echo "<li class='menuitem'><a href='.php'>Fail Images</a></li>";
            echo "<li class='menuitem'><a href='SignIn.php'>Settings</a></li>";
			echo "<li class='menuitem'><a href='SignIn.php?logout=1'><font color='red'>Logout</font></a></li>";
        echo "</ul>";
     }
	 
	 //the session will be destroyed if the users clicked log out
	 if(isset($_GET['logout'])){
			header("refresh:1; url=home.php");
			session_unset();
			session_destroy();
		}
		
    echo "</div>";

<?php
    session_start();
    error_reporting(0);
    include('include/dbconnection.php');

    //if form submmited
    if (isset($_POST['submitted'])){ 
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
		<title>Sign In</title>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="css/style.css" rel="stylesheet">
	</head>

	<body id="page-top">

<?php
        include ('include/LogoHeader.php'); // include contents from header.php
        
        echo "<div id='signInUpContent'>";
        //declare variables
        $userId = $_POST['userId'];
        //$password = md5($_POST['password']);
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE userID = '$userId' AND userPassword = '$password' LIMIT 1";
        $sql2 = "SELECT * FROM users WHERE userID = '$userId' LIMIT 1";
        $result = mysqli_query($con,$sql);
        $result2 = mysqli_query($con,$sql2);

        // If any of the field is empty
        if (empty($userId) || empty($password)){
            echo "<div id='sign-in-form'>";
                echo "<img src='images/signInLogo.png' alt='user icon' width='70' height='70'><p>&nbsp;</p>";
                echo "<h1><font face='Impact'>Sign In</font></h1>"; 
                echo "<form action='signin.php' method='post'>"; //create a post method form

                    //user id
                    echo"<input type='text' READONLY id='input-box' method='post' name='id' placeholder='User ID'>"; //Will not accept any input

                    if (empty($userId)) { // if id is empty
                        echo"<p id='error'><b>*You did not fill in User ID*</b></p>";
                    }

                    //user password
                    echo"<input type='password' READONLY id='input-box' method='post' name='pass' placeholder='Password'>"; //Will not accept any input

                    if (empty($password)) { // if password is empty
                        echo"<p id='error'><b>*You did not fill in Password*</b></p>";
                    }

                    //try again
                    echo "<p>&nbsp;</p><hr><p>&nbsp;</p><p>&nbsp;</p>";
                    echo "<button>Try Again ?</button>"; // this button will direct user back to sign in page
                    echo "<p>&nbsp;</p>";
                    echo "<p>Do you have an account? <a href='signup.php'>Sign up</a></p>";
    
                echo "</form> "; // end form
            echo "</div>"; // end css of the sign-in-form
        }

        //Succesful Login if password and id matches database
        else if (mysqli_num_rows($result)==1){
            $_SESSION['ivuid'] = $userId;
            header('location:mainpage.php');
        }
        
        // If any of the field is incorrect input
        else{
            echo "<div id='sign-in-form'>";
                echo "<img src='images/signInLogo.png' alt='user icon' width='70' height='70'><p>&nbsp;</p>";
                echo "<h1>Sign In</h1>"; 
                echo "<form action='signin.php' method='post'>"; //create a post method form

                    //user id
                    echo"<input type='text' READONLY id='input-box' method='post' name='id' placeholder='User ID'>"; //Will not accept any input
            
                    if (mysqli_num_rows($result2)==0) { // If Id does not match database
                        echo"<p id='error'><b>*Incorrect ID*</b></p>";
                    }

                    //user password
                    echo"<input type='password' READONLY id='input-box' method='post' name='pass' placeholder='Password'>"; //Will not accept any input

                    if (mysqli_num_rows($result)==0) { // If password does not match the id
                        echo"<p id='error'><b>*Incorrect Password*</b></p>";
                    }
            
                    //try again
                    echo "<button>Try Again ?</button>"; // this button will direct user back to sign in page
                    echo "<p>Do you have an account? <a href='signup.php'>Sign up</a></p>";

                echo "</form> "; // end form
            echo "</div>"; // end css of the sign-in-form
        }

        include ('include/Footer.php');
        echo "</div>";// end the css of the signInUpContent
        echo "</div>";// end the css for the container

        // Bootstrap core JavaScript
		// Placed at the end of the document so the pages load faster 
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>";
		echo "<script src='js/bootstrap.min.js'></script>";
		echo "<script src='js/SmoothScroll.js'></script>";
		echo "<script src='js/theme-scripts.js'></script>";
?>
    </body>
</html>
<?php
}
    
    
    //--------------------------------------------------------------------
    //If form not submitted 
    else { 
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
		<title>Sign In</title>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="css/style.css" rel="stylesheet">
	</head>

	<body id="page-top">
<?php   
        include ('include/LogoHeader.php'); // include contents from header.php
        
        echo "<section id='about' class='mz-module'>";

            echo "<div id='signInUpContent'>";
                echo "<div id='sign-in-form'>";
                    echo "<img src='images/signInLogo.png' alt='user icon' width='70' height='70'><p>&nbsp;</p>";
       
                    // Title for the page      
                    echo "<h1><font face='Impact'>Sign In</font></h1>";
                    echo "<form action='signin.php' method='post'>";

                        //input details
                        echo "<input type='text' name = 'userId' id='input-box' placeholder='User ID'>";
                        echo "<input type='password' name = 'password' id='input-box' placeholder='Password'>";
                        echo "<p>&nbsp;</p>";
                        echo "<button type='submit' name='submit'>Sign In</button>"; 
                        echo "<input type='hidden' name='submitted' value='true'><br>";
                        echo "<p>Do you have an account? <a href='signup.php'>Sign up</a></p>"; 
                        // If user do not have account, this will direct them to sign up

                    echo "</form> ";
                echo "</div>"; // end sign-in-form css
            echo "</div>";// end signInUpContent css
        echo "</section>";
    
        include ('include/Footer.php'); // include contents from footer.php

        // Bootstrap core JavaScript
		// Placed at the end of the document so the pages load faster 
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>";
		echo "<script src='js/bootstrap.min.js'></script>";
		echo "<script src='js/SmoothScroll.js'></script>";
		echo "<script src='js/theme-scripts.js'></script>";
?>
    </body>
</html>

<?php
}
?>

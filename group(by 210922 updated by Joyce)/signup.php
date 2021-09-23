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
		<title>Sign Up</title>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="css/style.css" rel="stylesheet">
	</head>

	<body id="page-top">

<?php
        include ('include/LogoHeader.php'); 
        echo "<section id='about' class='mz-module'>";
            echo "<div id='signInUpContent'>";

                //declare variables 
                $submit =$_POST['submit'];
                $email =$_POST['email'];
                $id =$_POST['id'];
                $name =$_POST['name'];
                $password =$_POST['password'];
                $conPassword =$_POST['conPassword'];

                $sql = "SELECT * FROM users WHERE userID='$id' LIMIT 1";
                $result = mysqli_query($con, $sql);

                $ret = mysqli_query($con, "SELECT userEmail FROM users WHERE userEmail = '$email");
                $result2 = mysqli_fetch_array($ret);

                // If any of the field is empty or contains error  
                if (empty($email) || empty($id) || empty($name)|| empty($password) || empty($conPassword) || 
                !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)||
                mysqli_num_rows($result)==1||!ctype_alpha(str_replace(' ', '', $name))||
                strlen($password)<=5||((!preg_match('/[^A-Za-z]/', $password))) || ($result2 > 0)){

                    echo "<div id='sign-up-form2'>";
                        echo "<img src='images/signInLogo.png' alt='user icon' width='70' height='70'><p>&nbsp;</p>";
                        echo "<h1><font face='Impact'>Sign Up</font></h1>";
                        echo "<form action='signup.php' method='post'>";
            
                            //email
                            echo "<input type='text' READONLY id='input-box' placeholder='Email Address '>";//Will not accept any input

                            if (empty($email)) { //If email is empty
                                echo "<p id='error' ><b>*Email not filled up. Please fill in Email*</b></font></p>";
                            }
                            else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) { //If email is invalid
                                echo "<p id='error' ><b>*Email is not valid*</b></font></p>";
                            }
                            else if ($result2 > 0){
                                echo "<p id='error' > <b>*This email is already associated with another account.*</b></font></p>";
                            }

                            //user id
                            echo "<input type='text' READONLY id='input-box' placeholder='User ID'>";//Will not accept any input

                            if (empty($id)) { //If id is empty
                                echo "<p id='error' ><b>*ID not filled up. Please fill in ID*</b></font></p>";
                            }
                            else if (mysqli_num_rows($result)==1) { // If Id exist in database
                                echo"<p id='error' >*ID Already Exist*</p>";
                            }

                            //username
                            echo "<input type='name' READONLY id='input-box' placeholder='User Name'>";//Will not accept any inpu

                            if (empty($name)) { //if user name is empty
                                echo "<p id='error' ><b>*User Name not filled up. Please fill in User Name*</b></font></p>";
                            }
                            else if (!ctype_alpha(str_replace(' ', '', $name))) {//if user name contain number
                                echo "<p id='error' ><b>*User name cannot contain number*</b></font></p>";
                            }

                            //password
                            echo "<input type='password' READONLY id='input-box' placeholder='New Password (8 or more characters)'>";//Will not accept any input

                            if (empty($password)) { //if password is empty
                                echo "<p id='error' ><b>*Password not filled up. Please fill in Password*</b></font></p>";
                            }
                            else if (strlen($password)<=7) { //if password length less than 8
                                echo "<p id='error' ><b>*Password cannot be lesser than 8 characters*</b></font></p>";
                            }
                            else if ((!preg_match('/[^A-Za-z]/', $password))||(is_numeric($password) == 1)){ //if password does not contain number or character
                                echo "<p id='error' ><b>*Password must contain alphabet and number*</b></font></p>";
                            }

                            //confirm password
                            echo "<input type='password' READONLY id='input-box' placeholder='Confirm Password'>";//Will not accept any input

                            if (empty($conPassword)) { //if confirm password is empty
                                echo "<p id='error' ><b>*Password Confirmation not filled up. Please fill in Password Confirmation *</b></font></p>";
                            }
                            else if ($conPassword !== $password) { //if password does not match with confrim password
                                echo "<p id='error' ><b>*Password is not the same as new password*</b></font></p>";
                            }

                            echo "<p>Return to <a href='signin.php'>Sign In</a></p>"; 
                            echo "<button>Try Again ?</button>"; 
                        echo "</form> "; 
                    echo "</div>"; //end the css of the sign-up-form
                    echo "<p>&nbsp;</p><p>&nbsp;</p>"; 
                echo "</section>";
                include ('include/Footer.php');
        }

        //If login sucessful
        else {
        echo "<section id='about' class='mz-module'>";
            echo "<div id='sign-up-form'>";
                echo "<img src='images/signInLogo.png' alt='user icon' width='70' height='70'><p>&nbsp;</p>";
                echo "<h1>You Have Been Successfully Registered !</h1>"; 
                echo "<p>&nbsp;</p><hr>&nbsp;</p>";
                echo "<p>Return to <a href='signin.php'>Sign In</a></p>"; 
            echo "</div>"; // end the css of the sign-up-form
                                            
            $password = md5($password);

			//insert data into table
			$sql = "INSERT INTO users(userID,UserName,userEmail,userPassword)
					VALUES ('$id','$name','$email','$password')";
						
			if(mysqli_query($con,$sql)){
				echo "<p></p>";
			}else{
				echo "<p style=\"color:red\">Could not insert table:<br>";
				echo mysqli_error($con);
			}
						
			mysqli_close($con);										
        }
        
        echo "</div>"; // end the css of the signInUpContent
    echo "</div>";// end the css for the container
echo "</section>";
include ('include/Footer.php');

}
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
		<title>Sign Up</title>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="css/style.css" rel="stylesheet">
	</head>

	<body id="page-top">

<?php        
        include ('include/LogoHeader.php'); 
        echo "<section id='about' class='mz-module'>";
            echo "<div id='signInUpContent'>";
                echo "<div id='sign-up-form'>";
                    echo "<img src='images/signInLogo.png' alt='user icon' width='70' height='70'><p>&nbsp;</p>";

                    // Title for the page    
                    echo "<h1><font face='Impact'>Sign Up</font></h1>";
                    echo "<form action='signup.php' method='post'>";

                        // input details of the Sign up page
                        echo "<input type='text' name='email' id='input-box' method='post' placeholder='Email Address'>";
                        echo "<input type='text' name='id' id='input-box' method='post' placeholder='User ID'>";
                        echo "<input type='name' name='name' id='input-box' method='post' placeholder='User Name'>";
                        echo "<input type='password' name='password' id='input-box' method='post' placeholder='New Password (8 or more characters)'>";
                        echo "<input type='password' name='conPassword' id='input-box' method='post' placeholder='Confirm Password'>";
                        echo "<p>Return to <a href='signin.php'>Sign In</a></p>"; 
                        echo "<button type='submit' name='submit'>Sign Up</button>"; 
                        echo "<input type='hidden' name='submitted' value='true'><br>"; 
                        // hidden input type with value used to check if form submitted

                    echo "</form> ";

                echo "</div>"; // end sign-up-form css
            echo "</div>";// end the css of the signInUpContent
        echo "</section>";
        include ('include/Footer.php');

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

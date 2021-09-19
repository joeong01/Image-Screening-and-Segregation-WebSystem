<?php
    session_start();
    error_reporting();
    include('include/dbconnection.php');
?>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="CSS/slider.css">
    </head>

    <body>
        
        <?php include ('include/Header.php'); // include contents from header.php ?>

        <div class="slider">
            <button class="btn" onclick="prev()" style="float: left;">
                <img src="img/Left.png" />
            </button>
            <div class="img-box">  
                <img src="img/1.png" class="slider-img">
            </div>
            <button class="btn" onclick="next()" style="float: right;">
                <img src="img/Right.png" />
            </button>
        </div>

        <?php include ('include/Footer.php'); ?>

        <script src="JavaScript/slider.js"></script>
        
    </body>
</html>

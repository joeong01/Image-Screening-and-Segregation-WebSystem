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
            <div class="btn" onclick="prev()">
                <img src="images/Left.png" />
            </div>
            <div class="img-box">  
                <img src="Pic/1.png" class="slider-img">
            </div>
            <div class="btn" onclick="next()" style="margin-left: 700px;">
                <img src="images/Right.png" />
            </div>
        </div>

        <?php include ('include/Footer.php'); // include contents from footer.php ?>

        <script src="JavaScript/slider.js"></script>
        
    </body>
</html>

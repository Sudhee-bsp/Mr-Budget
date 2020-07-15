<?php
require "includes/common.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="about.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Info</title>
    <style>
        .abt{
            padding-top: 0%;
            margin-top: 9%;
            
        }
        footer{
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 2rem;
            background-color: black;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include("includes/header.php"); ?>    
    <div class="container abt">
        <div class="row">
            <div class="container">
                <div class="col-md-6 col-sm-8">
                    <label><h1>Who Are We?</h1></label>
                    <p>We are a group of Young Tecnocrats who come up with an idea of solving budget and time issues which  we usually face in daily lives.We are here to provide a budget controller according to your aspects <br>Budget Control is biggest financial issue in the present world.One should look after their budget control to get ride off from their financial crisis. </p>
                </div>
                <div class="col-md-6 col-sm-8">
                    <label><h1>Why Choose Us?</h1></label>
                    <p>We provide with a predominant way to control and manage your budget estimations with ease of accessing for multiple users</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="col-md-6 col-sm-8">
                    <label><h1>Contact Us</h1></label>
                    <p><b>Official</b></p>
                    <p><b>Email : </b>manisss180@gmail.com</p>
                    <p><b>Email : </b>sudheendrapai.b@gmail.com</p>
                    <p><b>WhatsApp:</b>+91-9866268670</p>
                </div>
                <div class="col-md-6 col-sm-8">
                    <label><h3>Updates</h3></label>
                    <p><b>Updated to latest version</b></p>
                    <p> V 1.7</p>
                </div>
            </div>
        </div>
    </div>
    <?php include("includes/footer.php"); ?>
</body>
 
<script src="./removeBanner.js"></script>

</html>
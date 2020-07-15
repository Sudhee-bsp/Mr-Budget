<?php
  require("includes/common.php");

if (isset($_SESSION['email'])) {
    header('location: homepage.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Budget</title>
    <style>
        @media(min-width: 320px){
        
        .btn{
            color: white;
            background-color: darkcyan;
        }
        #banner_image{
            margin-top: 0%;
            padding-top: 100px;
            padding-bottom: 100px;
            text-align: center;
            color: #f8f8f8;
            background: url(img/bd.webp) no-repeat center center;
            background-size: cover;
        }
        #banner_content{
            width: 95%;
            padding-top: 4%;
            padding-bottom: 6%;
            margin-top: 5%;
            margin-left: 2%;
            margin-right: 19%;
            margin-bottom: 12%;
            background-color: rgba(0, 0, 0, 0.7);
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
        }
        @media(min-width: 360px){
        
        .btn{
            color: white;
            background-color: darkcyan;
        }
        #banner_image{
            margin-top: 0%;
            padding-top: 170px;
            padding-bottom: 170px;
            text-align: center;
            color: #f8f8f8;
            background: url(img/bd.webp) no-repeat center center;
            background-size: cover;
        }
        #banner_content{
            width: 95%;
            padding-top: 4%;
            padding-bottom: 6%;
            margin-top: 5%;
            margin-left: 2%;
            margin-right: 19%;
            margin-bottom: 12%;
            background-color: rgba(0, 0, 0, 0.7);
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
        }
        @media(min-height: 780px){
        
        .btn{
            color: white;
            background-color: darkcyan;
        }
        #banner_image{
            margin-top: 0%;
            padding-top: 195px;
            padding-bottom: 300px;
            text-align: center;
            color: #f8f8f8;
            background: url(img/bd.webp) no-repeat center center;
            /*background-size: cover;*/
            background-size: 100vw 100vh;
        }
        #banner_content{
            width: 95%;
            padding-top: 4%;
            padding-bottom: 6%;
            margin-top: 5%;
            margin-left: 2%;
            margin-right: 19%;
            margin-bottom: 12%;
            background-color: rgba(0, 0, 0, 0.7);
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
        }
        @media(min-height: 800px){
        
        .btn{
            color: white;
            background-color: darkcyan;
        }
        #banner_image{
            margin-top: 0%;
            padding-top: 225px;
            padding-bottom: 320px;
            text-align: center;
            color: #f8f8f8;
            background: url(img/bd.webp) no-repeat center center;
            background-size: cover;
        }
        #banner_content{
            width: 95%;
            padding-top: 4%;
            padding-bottom: 6%;
            margin-top: 5%;
            margin-left: 2%;
            margin-right: 19%;
            margin-bottom: 12%;
            background-color: rgba(0, 0, 0, 0.7);
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
        }
        @media(min-height: 849px){
        
        .btn{
            color: white;
            background-color: darkcyan;
        }
        #banner_image{
            margin-top: 0%;
            padding-top: 500px;
            padding-bottom: 500px;
            text-align: center;
            color: #f8f8f8;
            background: url(img/bd.webp) no-repeat center center;
            background-size: cover;
        }
        #banner_content{
            width: 95%;
            padding-top: 4%;
            padding-bottom: 6%;
            margin-top: 5%;
            margin-left: 2%;
            margin-right: 19%;
            margin-bottom: 12%;
            background-color: rgba(0, 0, 0, 0.7);
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
        }
        @media(min-width: 400px){
        
        .btn{
            color: white;
            background-color: darkcyan;
        }
        #banner_image{
            margin-top: 0%;
            padding-top: 250px;
            padding-bottom: 240px;
            text-align: center;
            color: #f8f8f8;
            background: url(img/bd.webp) no-repeat center center;
            /*background-size: cover;*/
            background-size: cover;
            /*height: 812px;*/
        }
        #banner_content{
            width: 95%;
            padding-top: 4%;
            padding-bottom: 6%;
            margin-top: 5%;
            margin-left: 2%;
            margin-right: 19%;
            margin-bottom: 12%;
            background-color: rgba(0, 0, 0, 0.7);
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
        }
        @media(min-width: 720px){
        
        .btn{
            color: white;
            background-color: darkcyan;
        }
        #banner_image{
            margin-top: 0%;
            padding-top: 330px;
            padding-bottom: 330px;
            text-align: center;
            color: #f8f8f8;
            background: url(img/bd.webp) no-repeat center center;
            background-size: cover;
        }
        #banner_content{
            width: 95%;
            padding-top: 4%;
            padding-bottom: 6%;
            margin-top: 5%;
            margin-left: 2%;
            margin-right: 19%;
            margin-bottom: 12%;
            background-color: rgba(0, 0, 0, 0.7);
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
        }
        @media(min-width: 1000px){
        
        .btn{
            color: white;
            background-color: darkcyan;
        }
        #banner_image{
            margin-top: 0%;
            padding-top: 500px;
            padding-bottom: 490px;
            text-align: center;
            color: #f8f8f8;
            background: url(img/bd.webp) no-repeat center center;
            background-size: cover;
        }
        #banner_content{
            width: 95%;
            padding-top: 4%;
            padding-bottom: 6%;
            margin-top: 5%;
            margin-left: 2%;
            margin-right: 19%;
            margin-bottom: 12%;
            background-color: rgba(0, 0, 0, 0.7);
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
        }
        @media(min-width: 1200px){
        .btn{
            color: white;
            background-color: darkcyan;
        }
        #banner_image{
            margin-top: 0%;
            padding-top: 100px;
            padding-bottom: 80px;
            text-align: center;
            color: #f8f8f8;
            background: url(img/bd.webp) no-repeat center center;
            background-size: cover;
            height: 700px;
        }
        #banner_content{
            width: 95%;
            padding-top: 4%;
            padding-bottom: 6%;
            margin-top: 10%;
            margin-left: 2%;
            margin-right: 19%;
            margin-bottom: 12%;
            background-color: rgba(0, 0, 0, 0.7);
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
        }
    </style>
</head>
<body>
        <?php include 'includes/header.php'; ?>
    <div id="banner_image">
        <div class="container">
            <div id="banner_content">
                <h1>We Help You Control Your Budget</h1>
                <a href="login.php" class="btn btn-lg active">Start Today</a>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>
</body>
 
<script src="./removeBanner.js"></script>

</html>
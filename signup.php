<?php
  require("includes/common.php");

if (isset($_SESSION['email'])) {
    header('location: homepage.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="signup.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        .panel{
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translatex(-50%) translateY(-50%);
        }
        @media(min-width: 320px){
            .panel{
                width:70%;
            }
        }
        @media(min-width: 480px){
            .panel{
                width:50%;
            }
        }
        @media(min-width: 640px){
            .panel{
                width:60%;
            }
        }
        @media(min-width: 960px){
            .panel{
                width:25%;
            }
        }


        .panel-heading{
            text-align: center;
            font-size: 200%;
        }
        .btn{
            color: white;
            background-color: darkcyan;
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
    <div class="container">
        <div class="row row_style">
        <div class="col">    
        <div class="panel panel-default">
            <div class="panel-heading">
                SIGN UP
            </div>
            <div class="panel-body">
                <form action="signup-script.php" method="POST">
                    <label>Name:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>
                    <label>Email:</label>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Enter Valid Email" required>
                    </div>
                    <label>Password:</label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password(Min. 6 Characters)" required>
                    </div>
                    <label>Phone Number:</label>
                    <div class="form-group">
                        <input type="tel" class="form-control" name="contact" placeholder="Enter Valid Phone Number(EX:8448444853)" required>
                    </div>
                    <input type="submit" name="signup" value="Sign Up" class="btn btn-block">
                </form>
            </div>
        </div>
        </div>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>
</body>
 
<script src="./removeBanner.js"></script>

</html>
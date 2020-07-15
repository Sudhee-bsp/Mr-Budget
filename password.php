<?php
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <style>
        .panel{
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translatex(-50%) translateY(-50%);
        }
        @media(min-width: 320px){
            .panel{
                width:90%;
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
                width:30%;
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
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <div class="row row_style">
        <div class="col">    
        <div class="panel panel-default">
            <div class="panel-heading">
                Change Password
            </div>
            <div class="panel-body">
                <form action="password-script.php" method="POST">
                    
                    <label>Old Password</label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="old_password" placeholder="Password(Min. 6 Characters)">
                    </div>
                    <label>New Password</label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="new_password" placeholder="Password(Min. 6 Characters)">
                    </div>
                    <label>Confirm New  Password</label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="New_password" placeholder="Password(Min. 6 Characters)">
                    </div>
                    <input type="submit" name="signup" value="Change" class="btn btn-block">
                </form>
            </div>
        </div>
        </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
 
<script src="./removeBanner.js"></script>

</html>
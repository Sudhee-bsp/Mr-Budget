<?php
  require("includes/common.php");
  if (! isset($_SESSION['email'])) {
    header('location: index.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="create_plan.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Plan</title>
    <style>
        .panel{
        position: absolute;
        top: 45%;
        left: 50%;
        transform: translatex(-50%) translateY(-50%);
        }
        @media(min-width: 320px){
            .panel{
                width:80%;
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
                width:35%;
            }
        }
            .panel-heading{
                text-align: center;
                font-size: 200%;
            }
            .btn-outline-primary{
                color: darkcyan;
                border-color: darkcyan;
                background-color: white;
            }
            .btn-outline-primary:hover{
                background-color: darkcyan;
                color: white;
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
        <div class="panel panel-primary">
            <div class="panel-heading" style="background-color: darkcyan;">
                Create New Plan
            </div>
            <div class="panel-body">
                <form action="plan-details.php" method="POST">
                    <label>Initial Budget</label>
                    <div class="form-group">
                        <input type="number" class="form-control" name="initial_budget" min="50" placeholder="Initial Budget (EX:4000)" required>
                    </div>
                    <label>How many people you want to add in your group?</label>
                    <div class="form-group">
                        <input type="number" class="form-control" min="1" name="people_number" placeholder="No.Of People" required>
                    </div>
                    
                    <button type="submit" class="btn-outline-primary btn-block btn-lg b">Next</button>
                </form>
            </div>
            
        </div>
        </div>
        </div>
    </div>
    <?php include("includes/footer.php")?>
</body>
 
<script src="./removeBanner.js"></script>

</html>
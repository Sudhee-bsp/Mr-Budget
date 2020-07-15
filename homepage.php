<?php
  include("includes/common.php");
  if (! isset($_SESSION['email'])) {
    header('location: index.php');
  }

$user_id = $_SESSION['user_id'];
$query = "SELECT plan_id  FROM plan_details WHERE user_id='" . $user_id . "' ";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
if ($num > 0)  {
    header('location: plan.php');
    
}

$que_name = "SELECT name FROM users WHERE email='" . $_SESSION['email'] . "' ";
$res_name = mysqli_query($con, $que_name)or die($mysqli_error($con));
$n = mysqli_fetch_array($res_name);
$name = $n['name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="homepage.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        .p1{
            margin-top: 15%;
            
        }
        .panel{
            position: absolute;
            top: 42%;
            left: 50%;
            transform: translatex(-50%) translateY(-50%);
        }
        @media(min-width: 320px){
            .panel{
                width:70%;
                height:30%;
            }
            
        }
        @media(min-width: 480px){
            .panel{
                width:50%;
                height:50%;
            }
        }
        @media(min-width: 640px){
            .panel{
                width:60%;
                height:30%;
            }
        }
        @media(min-width: 960px){
            .panel{
                width:25%;
                height:25%;
            }
            
        }
        @media(min-width: 1024px){
            .panel{
                width:25%;
                height:15%;
            }
        }
        @media(min-width: 1200px){
            .panel{
                width:17%;
                height:25%;
            }
        }
        .panel-body{
            padding-top:30%;
            padding-left:25%;
            color: darkcyan;
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
    <?php include("./includes/header.php"); ?>
    
        <div class="container">
            <h2 class="p1">Welcome <?php echo "<span style='color: green;'>".$name."</span>"; ?>! You don't have any Active plans</h2>
            <div class="panel panel-default">
                <div class="panel-body ">
                    <a href="create_plan.php" class="text"><span class="glyphicon glyphicon-plus-sign"></span>Create New Plan</a>
                </div>
            </div>
        </div> 
    <?php include("includes/footer.php");?>
</body>
 
<script src="./removeBanner.js"></script>

</html>

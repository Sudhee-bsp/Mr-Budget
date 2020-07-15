<?php
  require("includes/common.php");
  if (! isset($_SESSION['email'])) {
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
    <title>Plan</title>
    <style>        
        @media(min-width: 320px){
            .btn-outline-primary{
            color: darkcyan;
            border-color: darkcyan;
            background-color: white;
        }
        .btn-outline-primary:hover{
            background-color: darkcyan;
            color: white;
        }
            .panel{
            position:absolute;
            margin-top: 20%;
            margin-left:17%;
            margin-bottom:16%;
            width:70%;
            }
            .pan{
                height:100%;
            }
            footer{
                position: fixed;
                right: 0;
                bottom: 0;
                left: 0;
                padding: 0.2rem;
                background-color: black;
                color: white;
                text-align: center;
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
                width:40%;
            }
        }
        @media(min-width: 1200px){
            .panel{
                position:absolute;
                margin-top:7%;
                margin-bottom:5%;
                margin-left:23%;
                width:45%;
            }
            footer{
            position: fixed;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 1rem;
            background-color: black;
            color: white;
            text-align: center;
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
        
    </style>
</head>
<body>
    <?php include("includes/header.php"); ?>
    <div class="container pan">
        <div class="row row_style">
        <div class="col">    
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="create_plan_script.php" method="POST">
                    <label>Title</label>
                    <div class="form-group">
                        <input type="text" class="form-control" required name="title" placeholder="Enter Title(Ex: Trip To GOA)"required>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>From</label>
                            <div class="form-group">
                                <input type="date" class="form-control"id="id_from" min="2020-04-01" max="2020-12-20" required name="from_date" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <label>To</label>
                            <div class="form-group">
                                <input type="date" class="form-control" id="id_to" min="2020-04-01"  max="2020-12-20" required name="to_date" placeholder="dd/mm/yyyy">
                                
                            </div>                       
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['initial_budget']) && isset($_POST['people_number'])) {
                        $initial_budget = $_POST['initial_budget'];
                        $people_number = $_POST['people_number'];}
                    ?>
                    <div class="row">
                        <div class="col-sm-8">
                            <label>Initial Budget</label>
                            <div class="form-group">
                                <input type="text" class="form-control" required name="in_bd" <?php echo "value=$initial_budget"?> readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        <label>No.of People</label>
                            <div class="form-group">
                            <input type="text" class="form-control" required name="people" <?php echo "value=$people_number"?> readonly>
                            </div>                       
                        </div>
                    </div>
                    <?php 
                    $r=1;
                    while($r<=$people_number){?>
                        <label>Person <?php echo $r ?></label>
                        <div class='form-group'>
                            
                            <input type='text' class='form-control'  required name='name[<?php $r ?>]' placeholder='Person <?php echo $r ?> Name'>
                        </div>
                        <?php $r=$r+1;
                    }
                    ?>
                    <button type="submit" class="btn-outline-primary btn-block btn-lg b">Submit</button>
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
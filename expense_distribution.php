<?php 
include("includes/common.php");
if (! isset($_SESSION['email'])) {
  header('location: index.php');
}



$user_id = $_SESSION['user_id'];
$query = "SELECT plan_id  FROM plan_details WHERE user_id='" . $user_id . "' ";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
if ($num == 0)  {
    header('location: homepage.php');
    
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
  <title>Plans</title>
  <link rel="stylesheet" href="">
  <style>
    @media(min-width:320px){
        .cnt{
        margin-top:10%;
        margin-left:-1%;
        margin-right:4%;
    }
    .p1{
        text-align:left;
    }
    .p2{
    margin-top:-10%;
    text-align:right;
    }
    .pn1{
        border-width:2px;
        width:90%;
        margin-top:10%;
        margin-bottom:15%;
        margin-left:8%;
        margin-right:5%;
    }
    
    .panel-heading{
            text-align: center;
            font-size: 150%;
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
            position: fixed;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 0.5rem;
            background-color: black;
            color: white;
            text-align: center;
    }
    }
    @media(min-width:576px){
        .cnt{
        margin-top:5%;
    }
    .p1{
        text-align:left;
    }
    .p2{
    margin-top:-10%;
    text-align:right;
    }
    .pn1{
        border-width:2px;
        width:50%;
        margin-top:13%;
        margin-bottom:-5%;
        margin-left:25%;
    }
    
    .panel-heading{
            text-align: center;
            font-size: 150%;
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
            position: fixed;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 0.5rem;
            background-color: black;
            color: white;
            text-align: center;
    }
    }
    @media(min-width:768px){
        .cnt{
        margin-top:5%;
    }
    .p1{
        text-align:left;
    }
    .p2{
    margin-top:-10%;
    text-align:right;
    }
    .pn1{
        border-width:2px;
        width:47%;
        margin-top:4%;
        margin-bottom:5%;
    
    }
    
    .panel-heading{
            text-align: center;
            font-size: 150%;
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
            position: fixed;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 0.5rem;
            background-color: black;
            color: white;
            text-align: center;
    }
    }
    @media(min-width:992px){
        .cnt{
        margin-top:5%;
    }
    .p1{
        text-align:left;
    }
    .p2{
    margin-top:-10%;
    text-align:right;
    }
    .pn1{
        border-width:2px;
        width:47%;
        margin-top:20%;
        margin-bottom:5%;
        margin-left:30%;
    }
    
    .panel-heading{
            text-align: center;
            font-size: 150%;
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
            position: fixed;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 0.5rem;
            background-color: black;
            color: white;
            text-align: center;
    }
    }  
    @media(min-width: 1200px){
    .p1{
        text-align:left;
    }
    .p2{
    margin-top:-6%;
    text-align:right;
    }
    .pn1{
        border-width:2px;
        width:47%;
        margin-top:0%;
        margin-bottom:5%;
    
    }
    
    .panel-heading{
            text-align: center;
            font-size: 150%;
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
            position: fixed;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 0.5rem;
            background-color: black;
            color: white;
            text-align: center;
    }
    }
  </style>
</head>
<body>
    <?php include "includes/header.php"; ?>
    <div class="container cnt">
    <div class="row ">  
    <?php
    $pid=$_POST['exp_dist']; 
    $query1 = "SELECT * FROM expense WHERE plan_id='$pid' ";
    $res1=mysqli_query($con,$query1) or die($mysqli_error($con));
    $row=mysqli_fetch_array($res1);
    
    $query2 = "SELECT * FROM plan_details WHERE plan_id='$pid' ";
    $res2=mysqli_query($con,$query2) or die($mysqli_error($con));
    $dist2=mysqli_fetch_array($res2);
    
    $query3 = "SELECT * FROM person_names WHERE pid='$pid' ";
    $res3=mysqli_query($con,$query3) or die($mysqli_error($con));
    $dist3=mysqli_fetch_array($res3);
    ?>

            <?php if(mysqli_num_rows($res1) == 0){ ?> 
                <div class="col-sm-12">
                <div class="panel panel-primary pn1" style="border-color:darkcyan;">
                    <div class="panel-heading" style="background-color:darkcyan; ">
                        <div class="row">
                            <div class="col-sm-7 t1 ">
                                <h1><?php echo $dist2['title'];?></h1>
                            </div>
                        </div>    
                    </div>
                    <div class="panel-body">
                        <form action="plans_expenses.php" method="POST">
                            <div class="form-group">
                                <p class="p1">
                                <label>initial Budget</label>  
                                </p>
                                <p class="p2">
                                    <?php echo '₹' . $dist2['initial_budget']; ?>
                                </p>
                            </div>
                            <?php
                            $namer=mysqli_query($con,$query3) or die($mysqli_error($con));
                            if(mysqli_num_rows($namer) > 0){
                            while ($row = mysqli_fetch_array($namer)) {?>
                                    <div class="row r1">
                                        <div class="col-sm-11 c3">
                                        <label><?php echo $row['person_name']; ?></label>  
                                        </div>
                                        <div class="col-sm-1 c4">
                                            <?php echo '₹0'; ?>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                            <br>
                            <div class="form-group">
                                <p class="p1" >
                                    <label>Total Amount Spent</label>  
                                </p>
                                <p class="p2">
                                    <?php $tot_spnt=$_POST['amount_spent'];
                                    echo '₹0';?>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="p1" >
                                    <label>Remaining Amount</label>  
                                </p>
                                <?php if ($tot_spnt < $dist2['initial_budget']){ ?>
                                <p class="p2" style="color: green;">
                                    <b><?php $rem_amnt=$dist2['initial_budget']-$tot_spnt;
                                    echo '₹' . $rem_amnt; 
                                    }?></b>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="p1" >
                                <label>Individual shares</label>  
                                </p>
                                <p class="p2">
                                    <?php 
                                    $individual_shares=$tot_spnt / $dist2['people_number'];
                                    echo '₹0'  ?>
                                </p>
                            </div>
                            <?php $name_row1=mysqli_query($con,$query3) or die($mysqli_error($con));
                            if(mysqli_num_rows($name_row1)> 0){
                            while ($row_1= mysqli_fetch_array($name_row1)) {?>
                                    <div class="form-group">
                                        <p class="p1">
                                        <label><?php echo $row_1['person_name']; ?></label>  
                                        </p>
                                        <p class="p2">
                                            <?php 
                                            echo '₹0' ?>
                                        </p>
                                    </div>
                            <?php } 
                            }?>
                            <div class="form-group">
                            <p class="text-center"><button type="submit" name="view_plan" value="<?php echo $pid; ?>" class="btn btn-outline-primary" style="border-color:darkcyan; border-width:2px;"><b><span  class="glyphicon glyphicon-arrow-left"></span>Go back</b></button></p>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                
            <?php } ?>
            <div class='row'>
            <?php if(mysqli_num_rows($res1) > 0){ ?>
                <div class="visible-xs visible-sm visible-md visible-lg">
                <div class="panel panel-primary pn1" style="border-color:darkcyan;">
                    <div class="panel-heading" style="background-color:darkcyan; ">
                        <p class="text-center"><h1><?php echo $dist2['title'];?></h1></p>
                    </div>
                    <div class="panel-body">
                        <form action="plans_expenses.php" method="POST">
                            <div class="form-group">
                                <p class="p1">
                                <label>initial Budget</label>  
                                </p>
                                <p class="p2">
                                    <?php echo '₹' . $dist2['initial_budget']; ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <?php $nr1=mysqli_query($con,$query3) or die(mysqli_error($con));
                                while ($r1= mysqli_fetch_array($nr1)) {?>
                                <p class="p1">
                                <label><?php echo $r1['person_name']; ?></label>  
                                </p>
                                <?php 
                                $p_n1=$r1['person_name'];
                                
                                $qry="SELECT * FROM expense WHERE name='$p_n1' AND plan_id='$pid'";
                                $res_1 = mysqli_query($con, $qry) or die(mysqli_error($con));
                                $a_s1=0;
                                while($r_1= mysqli_fetch_array($res_1)){
                                    $a_s1=$a_s1+$r_1['amount_spent'];

                                }
                                ?>
                                <p class="p2" >
                                    <b><?php echo '₹' . $a_s1; ?></b>
                                </p> 
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <p class="p1" >
                                <label>Total Amount Spent</label>  
                                </p>
                                <p class="p2">
                                    <?php $tot_spnt=$_POST['amount_spent'];
                                    echo '₹' . $tot_spnt;?>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="p1" >
                                <label>Remaining Amount</label>  
                                </p>
                                <?php if ($tot_spnt < $dist2['initial_budget']){ ?>
                                    <p class="p2" style="color: green;">
                                    <b><?php $rem_amnt=$dist2['initial_budget']-$tot_spnt;
                                    echo '₹' . $rem_amnt; 
                                    }?></b></p>
                                <?php if ($tot_spnt > $dist2['initial_budget']){ ?>
                                    <p class="p2" style="color: red;">
                                    <b><?php $amnt=$tot_spnt-$dist2['initial_budget'];
                                    echo 'Overspent by ₹' . $amnt; 
                                    }?></b></p>
                            </div>
                            <div class="form-group">
                                <p class="p1" >
                                <label>Individual shares</label>  
                                </p>
                                <p class="p2">
                                    <?php 
                                    $individual_shares=$tot_spnt / $dist2['people_number'];
                                    echo '₹' .number_format((float)$individual_shares, 2, '.', ''); ?>
                                </p>
                            </div>

                            <div class="form-group">
                                <?php $name_row1=mysqli_query($con,$query3) or die($mysqli_error($con));
                                while ($row_1= mysqli_fetch_array($name_row1)) {?>
                                <p class="p1">
                                <label><?php echo $row_1['person_name']; ?></label>  
                                </p>
                                <?php 
                                $p_n=$row_1['person_name'];
                                
                                $qry="SELECT amount_spent FROM expense WHERE name='$p_n' AND plan_id='$pid'";
                                $res_1 = mysqli_query($con, $qry) or die($mysqli_error($con));
                                $a_s=0;
                                while($row_1= mysqli_fetch_array($res_1)){
                                    $a_s=$a_s+$row_1['amount_spent'];
                                }
                                $share=$a_s-$individual_shares;
                                if($share > 0){ ?>
                                    <p class="p2" style="color: green;">
                                    <b><?php echo 'Gets back ₹' . number_format((float)abs($share), 2, '.', ''); ?>
                                        </b></p> <?php  } ?>
                                <?php if($share < 0){ ?>
                                    <p class="p2" style="color: red;">
                                    <b><?php echo 'Owes ₹' . number_format((float)abs($share), 2, '.', ''); ?>
                                </b></p> <?php } 
                                }?>
                                
                            </div>
                            <div class="form-group">
                            <p class="text-center"><button type="submit" name="view_plan" value="<?php echo $pid; ?>" class="btn btn-outline-primary b1" style="border-color:darkcyan; border-width:2px;"><b><span  class="glyphicon glyphicon-arrow-left"></span>Go back</b></button></p>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                
            <?php } ?>
            </div>
    </div>
    </div> 
            
    <?php include("includes/footer.php");?>
</body>
 
<script src="./removeBanner.js"></script>

</html>
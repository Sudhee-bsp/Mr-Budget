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

$que_name = "SELECT name FROM users WHERE email='" . $_SESSION['email'] . "' ";
$res_name = mysqli_query($con, $que_name)or die($mysqli_error($con));
$n = mysqli_fetch_array($res_name);
$name = $n['name'];

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
  <style>
/* The Modal (background) */
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 250px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    }

    /* The Close Button */
    .close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    }

    .close:hover,
    .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    }

  /* iphone 5/SE */
    @media(min-width:320px){
        h2{
                position:absolute;
                top:6%;
                left:5%;
            }
            .cnt{
                margin-top:50%;
                height:100%;
            }
            .panel{
                margin-top:0%;
                border-width:2px;
                margin-bottom:5%;
                margin-left:0%;
                width:85%;
                padding-bottom:1%;
                margin-bottom:25%;
            }
            .p1{
                text-align:left;
            }
            .p2{
                margin-top:-15%;
                text-align:right;
            }
            
            .pls{
                position:fixed;
                margin-top:132%;
                font-size:55px;
                color:darkcyan; 
                margin-left: 82%;
                
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
            font-size: 150%;
        }
        .bt1{
            margin-top:7%;
            border-width:2px;
            color: darkcyan;
            border-color: darkcyan;
            background-color: white;
        }
        .bt1:hover{
            background-color: darkcyan;
            color: white;
        }    
        .bt2{
            margin-top:0%;
            border-width:2px;
            color: red;
            border-color: red;
            background-color: white;
        }
        .bt2:hover{
            background-color: red;
            color: white;
        }  
        .yesbtn{
            border-color: darkcyan;
            background-color: white;
        }
        .nobtn{
            border-color: darkcyan;
            background-color: white;
        }
        .yesbtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
        .nobtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
    }

    /* samsung a20 */
    @media(min-width:360px){
        .cnt{
                margin-top:50%;
                height:100%;
            }
            .panel{
                margin-top:2%;
                border-width:2px;
                margin-bottom:5%;
                margin-left:0%;
                width:85%;
                padding-bottom:1%;
                margin-bottom:20%;
            }
            .p1{
                text-align:left;
            }
            .p2{
                margin-top:-15%;
                text-align:right;
            }
            
            .pls{
                position:fixed;
                margin-top:150%;
                font-size:58px;
                color:darkcyan; 
                margin-left: 83%;
                margin-bottom: 10%;
            }
            .bt1{
            margin-top:7%;
            border-width:2px;
            color: darkcyan;
            border-color: darkcyan;
            background-color: white;
        }
        .bt1:hover{
            background-color: darkcyan;
            color: white;
        }    
        .bt2{
            margin-top:0%;
            border-width:2px;
            color: red;
            border-color: red;
            background-color: white;
        }
        .bt2:hover{
            background-color: red;
            color: white;
        }  
        .yesbtn{
            border-color: darkcyan;
            background-color: white;
        }
        .nobtn{
            border-color: darkcyan;
            background-color: white;
        }
        .yesbtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
        .nobtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
    }
    @media(min-width:280px){
        .cnt{
                margin-top:50%;
                height:100%;
            }
            .panel{
                margin-top:2%;
                border-width:2px;
                margin-bottom:5%;
                margin-left:0%;
                width:85%;
                padding-bottom:1%;
                margin-bottom:20%;
            }
            .p1{
                text-align:left;
            }
            .p2{
                margin-top:-15%;
                text-align:right;
            }
            
            .pls{
                position:fixed;
                margin-top:150%;
                font-size:53px;
                color:darkcyan; 
                margin-left: 83%;
                margin-bottom: 10%;
            }
            .bt1{
            margin-top:7%;
            border-width:2px;
            color: darkcyan;
            border-color: darkcyan;
            background-color: white;
        }
        .bt1:hover{
            background-color: darkcyan;
            color: white;
        }    
        .bt2{
            margin-top:0%;
            border-width:2px;
            color: red;
            border-color: red;
            background-color: white;
        }
        .bt2:hover{
            background-color: red;
            color: white;
        }  
        .yesbtn{
            border-color: darkcyan;
            background-color: white;
        }
        .nobtn{
            border-color: darkcyan;
            background-color: white;
        }
        .yesbtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
        .nobtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
    }
    @media(min-width:420px){
        .cnt{
                margin-top:30%;
                height:100%;
            }
            .panel{
                margin-top:2%;
                border-width:2px;
                margin-bottom:5%;
                margin-left:0%;
                width:85%;
                padding-bottom:1%;
                margin-bottom:20%;
            }
            .p1{
                text-align:left;
            }
            .p2{
                margin-top:-15%;
                text-align:right;
            }
            
            .pls{
                position:fixed;
                margin-top:160%;
                font-size:55px;
                color:darkcyan; 
                margin-left: 85%;
                
            }
            .bt1{
            margin-top:7%;
            border-width:2px;
            color: darkcyan;
            border-color: darkcyan;
            background-color: white;
        }
        .bt1:hover{
            background-color: darkcyan;
            color: white;
        }    
        .bt2{
            margin-top:0%;
            border-width:2px;
            color: red;
            border-color: red;
            background-color: white;
        }
        .bt2:hover{
            background-color: red;
            color: white;
        } 
        .yesbtn{
            border-color: darkcyan;
            background-color: white;
        }
        .nobtn{
            border-color: darkcyan;
            background-color: white;
        }
        .yesbtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
        .nobtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
    }
    @media(min-width:510px){
        .cnt{
                margin-top:30%;
                height:100%;
            }
            .panel{
                margin-top:2%;
                border-width:2px;
                margin-bottom:5%;
                margin-left:0%;
                width:70%;
                padding-bottom:1%;
                margin-bottom:20%;
            }
            .p1{
                text-align:left;
            }
            .p2{
                margin-top:-15%;
                text-align:right;
            }
            
            .pls{
                position:fixed;
                margin-top:40%;
                font-size:55px;
                color:darkcyan; 
                margin-left: 50%;
                
            }
            .bt1{
            margin-top:7%;
            border-width:2px;
            color: darkcyan;
            border-color: darkcyan;
            background-color: white;
        }
        .bt1:hover{
            background-color: darkcyan;
            color: white;
        }    
        .bt2{
            margin-top:0%;
            border-width:2px;
            color: red;
            border-color: red;
            background-color: white;
        }
        .bt2:hover{
            background-color: red;
            color: white;
        } 
        .yesbtn{
            border-color: darkcyan;
            background-color: white;
        }
        .nobtn{
            border-color: darkcyan;
            background-color: white;
        }
        .yesbtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
        .nobtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
    }
    @media(min-width:576px){
        .cnt{
                margin-top:30%;
                height:100%;
            }
            .panel{
                margin-top:2%;
                border-width:2px;
                margin-bottom:5%;
                margin-left:0%;
                width:80%;
                padding-bottom:1%;
                margin-bottom:20%;
            }
            .p1{
                text-align:left;
            }
            .p2{
                margin-top:-8%;
                text-align:right;
            }
            
            .pls{
                position:fixed;
                margin-top:50%;
                font-size:55px;
                color:darkcyan; 
                margin-left: 50%;
                
            }
            .bt1{
            margin-top:7%;
            border-width:2px;
            color: darkcyan;
            border-color: darkcyan;
            background-color: white;
        }
        .bt1:hover{
            background-color: darkcyan;
            color: white;
        }    
        .bt2{
            margin-top:0%;
            border-width:2px;
            color: red;
            border-color: red;
            background-color: white;
        }
        .bt2:hover{
            background-color: red;
            color: white;
        } 
        .yesbtn{
            border-color: darkcyan;
            background-color: white;
        }
        .nobtn{
            border-color: darkcyan;
            background-color: white;
        }
        .yesbtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
        .nobtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
    }
    @media(min-width:593px){
        .cnt{
                margin-top:30%;
                height:100%;
            }
            .panel{
                margin-top:2%;
                border-width:2px;
                margin-bottom:5%;
                margin-left:0%;
                width:80%;
                padding-bottom:1%;
                margin-bottom:20%;
            }
            .p1{
                text-align:left;
            }
            .p2{
                margin-top:-8%;
                text-align:right;
            }
            
            .pls{
                position:fixed;
                margin-top:140%;
                font-size:55px;
                color:darkcyan; 
                margin-left: 84%;
                
            }
            .bt1{
            margin-top:7%;
            border-width:2px;
            color: darkcyan;
            border-color: darkcyan;
            background-color: white;
        }
        .bt1:hover{
            background-color: darkcyan;
            color: white;
        }    
        .bt2{
            margin-top:0%;
            border-width:2px;
            color: red;
            border-color: red;
            background-color: white;
        }
        .bt2:hover{
            background-color: red;
            color: white;
        } 
        .yesbtn{
            border-color: darkcyan;
            background-color: white;
        }
        .nobtn{
            border-color: darkcyan;
            background-color: white;
        }
        .yesbtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
        .nobtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
    }
    @media(min-width:606px){
        .cnt{
                margin-top:30%;
                height:100%;
            }
            .panel{
                margin-top:2%;
                border-width:2px;
                margin-bottom:5%;
                margin-left:0%;
                width:80%;
                padding-bottom:1%;
                margin-bottom:20%;
            }
            .p1{
                text-align:left;
            }
            .p2{
                margin-top:-8%;
                text-align:right;
            }
            
            .pls{
                position:fixed;
                margin-top:140%;
                font-size:55px;
                color:darkcyan; 
                margin-left: 84%;
                
            }
            .bt1{
            margin-top:7%;
            border-width:2px;
            color: darkcyan;
            border-color: darkcyan;
            background-color: white;
        }
        .bt1:hover{
            background-color: darkcyan;
            color: white;
        }    
        .bt2{
            margin-top:0%;
            border-width:2px;
            color: red;
            border-color: red;
            background-color: white;
        }
        .bt2:hover{
            background-color: red;
            color: white;
        } 
        .yesbtn{
            border-color: darkcyan;
            background-color: white;
        }
        .nobtn{
            border-color: darkcyan;
            background-color: white;
        }
        .yesbtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
        .nobtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
    }
    @media(min-width:650px){
        .cnt{
                margin-top:30%;
                height:100%;
            }
            .panel{
                margin-top:2%;
                border-width:2px;
                margin-bottom:5%;
                margin-left:0%;
                width:80%;
                padding-bottom:1%;
                margin-bottom:20%;
            }
            .p1{
                text-align:left;
            }
            .p2{
                margin-top:-8%;
                text-align:right;
            }
            
            .pls{
                position:fixed;
                margin-top:25%;
                font-size:55px;
                color:darkcyan; 
                margin-left: 50%;
                
            }
            .bt1{
            margin-top:7%;
            border-width:2px;
            color: darkcyan;
            border-color: darkcyan;
            background-color: white;
        }
        .bt1:hover{
            background-color: darkcyan;
            color: white;
        }    
        .bt2{
            margin-top:0%;
            border-width:2px;
            color: red;
            border-color: red;
            background-color: white;
        }
        .bt2:hover{
            background-color: red;
            color: white;
        } 
        .yesbtn{
            border-color: darkcyan;
            background-color: white;
        }
        .nobtn{
            border-color: darkcyan;
            background-color: white;
        }
        .yesbtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
        .nobtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
    }

    /* iPad  */
    @media(min-width:720px){
        .cnt{
                margin-top:20%;
                height:100%;
            }
            .panel{
                margin-top:2%;
                border-width:2px;
                margin-bottom:5%;
                margin-left:0%;
                width:80%;
                padding-bottom:1%;
                margin-bottom:20%;
            }
            .p1{
                text-align:left;
            }
            .p2{
                margin-top:-6%;
                text-align:right;
            }
            .p3{
                margin-top:-7%;
                text-align:right;
            }
            .pls{
                position:fixed;
                margin-top:110%;
                font-size:100px;
                color:darkcyan; 
                margin-left: 80%;
                
            }
            .bt1{
            margin-top:7%;
            border-width:2px;
            color: darkcyan;
            border-color: darkcyan;
            background-color: white;
        }
        .bt1:hover{
            background-color: darkcyan;
            color: white;
        }    
        .bt2{
            margin-top:0%;
            border-width:2px;
            color: red;
            border-color: red;
            background-color: white;
        }
        .bt2:hover{
            background-color: red;
            color: white;
        }
        .yesbtn{
            border-color: darkcyan;
            background-color: white;
        }
        .nobtn{
            border-color: darkcyan;
            background-color: white;
        }
        .yesbtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
        .nobtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
    }
    
    @media(min-width:800px){
        .cnt{
                margin-top:20%;
                height:100%;
            }
            .panel{
                margin-top:2%;
                border-width:2px;
                margin-bottom:5%;
                margin-left:5%;
                width:80%;
                padding-bottom:1%;
                margin-bottom:20%;
            }
            .p1{
                text-align:left;
            }
            .p2{
                margin-top:-6%;
                text-align:right;
            }
            
            .pls{
                position:fixed;
                margin-top:55%;
                font-size:60px;
                color:darkcyan; 
                margin-left:53%;
                
            }
            .bt1{
            margin-top:7%;
            border-width:2px;
            color: darkcyan;
            border-color: darkcyan;
            background-color: white;
        }
        .bt1:hover{
            background-color: darkcyan;
            color: white;
        }    
        .bt2{
            margin-top:0%;
            border-width:2px;
            color: red;
            border-color: red;
            background-color: white;
        }
        .bt2:hover{
            background-color: red;
            color: white;
        } 
        .yesbtn{
            border-color: darkcyan;
            background-color: white;
        }
        .nobtn{
            border-color: darkcyan;
            background-color: white;
        }
        .yesbtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
        .nobtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
    }
    @media(min-width:920px){
        .cnt{
                margin-top:20%;
                height:100%;
            }
            .panel{
                margin-top:2%;
                border-width:2px;
                margin-bottom:5%;
                margin-left:5%;
                width:80%;
                padding-bottom:1%;
                margin-bottom:20%;
            }
            .p1{
                text-align:left;
            }
            .p2{
                margin-top:-6%;
                text-align:right;
            }
            
            .pls{
                position:fixed;
                margin-top:25%;
                font-size:60px;
                color:darkcyan; 
                margin-left: 93%;
                
            }
            .bt1{
            margin-top:7%;
            border-width:2px;
            color: darkcyan;
            border-color: darkcyan;
            background-color: white;
        }
        .bt1:hover{
            background-color: darkcyan;
            color: white;
        }    
        .bt2{
            margin-top:0%;
            border-width:2px;
            color: red;
            border-color: red;
            background-color: white;
        }
        .bt2:hover{
            background-color: red;
            color: white;
        } 
        .yesbtn{
            border-color: darkcyan;
            background-color: white;
        }
        .nobtn{
            border-color: darkcyan;
            background-color: white;
        }
        .yesbtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
        .nobtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
    }
    @media(min-width:1023px){
        .cnt{
                margin-top:20%;
                height:100%;
            }
            .panel{
                margin-top:2%;
                border-width:2px;
                margin-bottom:5%;
                margin-left:0%;
                width:80%;
                padding-bottom:1%;
                margin-bottom:20%;
            }
            .p1{
                text-align:left;
            }
            .p2{
                margin-top:-6%;
                text-align:right;
            }
            .p3{
                margin-top:-7%;
                text-align:right;
            }
            .pls{
                position:fixed;
                margin-top:110%;
                font-size:100px;
                color:darkcyan; 
                margin-left: 85%;
                
            }
            .bt1{
            margin-top:7%;
            border-width:2px;
            color: darkcyan;
            border-color: darkcyan;
            background-color: white;
        }
        .bt1:hover{
            background-color: darkcyan;
            color: white;
        }    
        .bt2{
            margin-top:0%;
            border-width:2px;
            color: red;
            border-color: red;
            background-color: white;
        }
        .bt2:hover{
            background-color: red;
            color: white;
        }
        .yesbtn{
            border-color: darkcyan;
            background-color: white;
        }
        .nobtn{
            border-color: darkcyan;
            background-color: white;
        }
        .yesbtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
        .nobtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
    }
    @media(min-width: 1200px){
        
            h1{
                position:absolute;
                top:6%;
                left:5%;
            }
            .cnt{
                margin-top:10%;
                height:100%;
            }
            .panel{
                margin-top:2%;
                border-width:2px;
                margin-bottom:5%;
                margin-left:5%;
                width:73%;
                padding-bottom:1%;
                margin-bottom:20%;
            }
            .p1{
                text-align:left;
            }
            .p2{
                margin-top:-15%;
                text-align:right;
            }
            .p3{
                margin-top:-17%;
                text-align:right;
            }
            .pls{
                position:fixed;
                margin-top:40%;
                font-size:70px;
                color:darkcyan; 
                margin-left: 93%;
                
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
            font-size: 150%;
        }
        .bt1{
            margin-top:7%;
            border-width:2px;
            color: darkcyan;
            border-color: darkcyan;
            background-color: white;
        }
        .bt1:hover{
            background-color: darkcyan;
            color: white;
        }    
        .bt2{
            margin-top:0%;
            border-width:2px;
            color: red;
            border-color: red;
            background-color: white;
        }
        .bt2:hover{
            background-color: red;
            color: white;
        }
        .yesbtn{
            border-color: darkcyan;
            background-color: white;
        }
        .nobtn{
            border-color: darkcyan;
            background-color: white;
        }
        .yesbtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
        .nobtn:hover{
            border-color: darkcyan;
            background-color: darkcyan;
            color: white;
        }
        .modal-content{
            width: 40%;
        }
    }
  </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <h2>Welcome <?php echo "<span style='color: green;'>".$name."</span>"; ?>! <br> Your Plans</h2>  
    <div class="container cnt">
    <div class="row ">  
    <?php 
    $user_id=$_SESSION['user_id'];
    $query = "SELECT * FROM plan_details WHERE user_id='$user_id' ";
    $result = mysqli_query($con, $query)or die(mysqli_error($con));
    if(mysqli_num_rows($result)>=1){?>
                <?php while ($row = mysqli_fetch_array($result)) {?>
                <div class="col-sm-12 col-md-6 col-lg-4 visible-xs visible-sm visible-md visible-lg">
                <div class="panel panel-primary" style="border-color:darkcyan;">
                    <div class="panel-heading" style="background-color:darkcyan; ">
                            <p class="text-center">
                                <?php echo $row["title"]; ?> 
                            </p>
                            <p class="p3">
                                <span class="glyphicon glyphicon-user"></span>&nbsp<?php echo  $row["people_number"]; ?>
                            </p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <p class="p1">    
                               <label>Budget</label>  
                            </p>
                            <p class="p2">
                                <?php echo '₹' . $row["initial_budget"]; ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <p class="p1">
                               <label>Date</label>  
                            </p>
                            <p class="p2">
                                <?php 
                                $from=date_create($row["from_date"]);
                                $to=date_create($row["to_date"]);
                                $char='-';
                                echo date_format($from,'d M')." ".$char." ".date_format($to,'d M Y'); ?>
                            </p>
                        </div>
                        <?php $p_id=$row["plan_id"];
                             
                        ?>
                        <form action="plans_expenses.php" method="POST">
                            <button type="submit" class="btn btn-outline-primary btn-block bt1 " name="view_plan" value="<?php echo $p_id; ?>"  style= "border-color: darkcyan;"> <b>View Plan</b> </button>
                        </form> 
                        <br>
                        <button class="btn btn-danger btn-block bt2" style= "border-color: red;"> <b>Delete plan</b> </button>
                            <div class="modal myModal">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <p><b>Are you sure want to DELETE this plan?</b></p>
                                    <form action="delete.php" method="POST">
                                        <button class="btn btn-outline-primary btn-block yesbtn" name="delete_plan" type="submit" value="<?php echo $p_id; ?>"> YES </button>
                                    </form>
                                    <br>
                                    <form action="" method="POST">
                                        <button class="btn btn-outline-primary btn-block nobtn" type="submit"> NO </button>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
                </div>
                <?php }
            }?>
        </div>
    </div>
    <a href="create_plan.php"><span class='glyphicon glyphicon-plus-sign pls'></span></a>
    <?php include("includes/footer.php");?>
</body>
 
<script src="./removeBanner.js"></script>

<script>
    
    var modal = document.getElementsByClassName("myModal");
    var btn = document.getElementsByClassName("bt2");
    var span = document.getElementsByClassName("close");

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    for(let i=0;i<btn.length;i++){
        btn[i].onclick = function() {
            modal[i].style.display = "block";
        }
    }
    for(let i=0;i<span.length;i++){
        span[i].onclick = function() {
        modal[i].style.display = "none";
        }
    }
    
</script>
</html>
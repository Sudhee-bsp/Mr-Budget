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
$plan_id=$_POST['view_plan'];
$query1 = "SELECT *  FROM expense WHERE plan_id='" . $plan_id . "' ";
$result1 = mysqli_query($con, $query1)or die($mysqli_error($con));
$num1 = mysqli_num_rows($result1);
if ($num1 > 0)  {
    header('location: plans_expenses.php');
    
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
  <style>
    
        @media(min-width: 320px){
            .pan2{
            position: absolute;
            margin-top: 140%;
            margin-left:20%;
            width:100%;
            margin-bottom:15%;         }
          .pan1{
            position: absolute;
            margin-top: 70%;
            margin-left:70%;
            width:105%;
            transform: translatex(-50%) translateY(-50%);
          }
          .p1{
            margin-right:-80%;
          }
          .p2{
            margin-left:80%;
            
          }
          .p3{
            margin-left:78%;
          }
          .p4{
            margin-left:55%;
          }
          .exp{
            position:absolute;
            margin-top:120%;
            margin-left:50%;
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
        .ph1{
            text-align: center;
            font-size: 200%;
        }
        .ph2{
            text-align: center;
            font-size: 150%;
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
        @media(min-width: 375px){
            .pan2{
            position: absolute;
            margin-top: 140%;
            margin-left:20%;
            width:120%;
            margin-bottom:3%;         }
          .pan1{
            position: absolute;
            margin-top: 70%;
            margin-left:80%;
            width:120%;
            transform: translatex(-50%) translateY(-50%);
          }
          .p1{
            margin-right:-80%;
          }
          .p2{
            margin-left:80%;
            
          }
          .p3{
            margin-left:78%;
          }
          .p4{
            margin-left:55%;
          }
          .exp{
            position:absolute;
            margin-top:120%;
            margin-left:30%;
          }
          
        }
        @media(min-width: 411px){
          .pan2{
            position: absolute;
            margin-top: 190%;
            margin-left:20%;
            width:200%;
            margin-bottom:15%;         }
          .pan1{
            position: absolute;
            margin-top: 70%;
            margin-left:100%;
            width:130%;
            transform: translatex(-50%) translateY(-50%);
          }
          .p1{
            margin-right:-80%;
          }
          .p2{
            margin-left:80%;
            
          }
          .p3{
            margin-left:78%;
          }
          .p4{
            margin-left:65%;
          }
          .exp{
            height:7%;
            width:50%;
            position:absolute;
            margin-top:140%;
            margin-left:30%;
          }
        }
        @media(min-width: 640px){
          .pan2{
            position: absolute;
            margin-top: 130%;
            margin-left:10%;
            width:100%;
            margin-bottom:15%;         }
          .pan1{
            position: absolute;
            margin-top: 50%;
            margin-left:60%;
            width:100%;
            transform: translatex(-50%) translateY(-50%);
          }
          .p1{
            margin-right:-80%;
          }
          .p2{
            margin-left:80%;
            
          }
          .p3{
            margin-left:78%;
          }
          .p4{
            margin-left:65%;
          }
          .exp{
            height:7%;
            width:50%;
            position:absolute;
            margin-top:100%;
            margin-left:30%;
          }
        }
        @media(min-width: 770px){
          .pan2{
            position: absolute;
            margin-top: 70%;
            margin-left:25%;
            width:60%;
            margin-bottom:5%;         }
          .pan1{
            position: absolute;
            margin-top: 30%;
            margin-left:40%;
            width:68%;
            transform: translatex(-50%) translateY(-50%);
          }
          .p1{
            margin-right:-80%;
          }
          .p2{
            margin-left:80%;
            
          }
          .p3{
            margin-left:78%;
          }
          .p4{
            margin-left:55%;
          }
          .exp{
            position:absolute;
            margin-top:50%;
            margin-left:50%;
            width:30%;
          }
        }
        @media(min-width: 960px){
          .pan2{
            position: absolute;
            margin-top: 70%;
            margin-left:25%;
            width:60%;
            margin-bottom:5%;         }
          .pan1{
            position: absolute;
            margin-top: 30%;
            margin-left:40%;
            width:68%;
            transform: translatex(-50%) translateY(-50%);
          }
          .p1{
            margin-right:-80%;
          }
          .p2{
            margin-left:80%;
            
          }
          .p3{
            margin-left:78%;
          }
          .p4{
            margin-left:55%;
          }
          .exp{
            position:absolute;
            margin-top:50%;
            margin-left:50%;
            width:30%;
          }
        }

        @media(min-width: 1200px){
          .pan2{
            position: absolute;
            margin-top: 27%;
            margin-left:61.5%;
            width:30%;
            margin-bottom:5%;         }
          .pan1{
            position: absolute;
            margin-top: 15%;
            margin-left:28%;
            width:45%;
            transform: translatex(-50%) translateY(-50%);
          }
          .p1{
            margin-right:-80%;
          }
          .p2{
            margin-left:80%;
            
          }
          .p3{
            margin-left:75%;
          }
          .p4{
            margin-left:45%;
          }
          .exp{
            position:absolute;
            margin-top:13%;
            margin-left:66%;
            width:25%;
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
        .ph1{
            text-align: center;
            font-size: 200%;
        }
        .ph2{
            text-align: center;
            font-size: 150%;
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
    <?php include 'includes/header.php';?>
    <?php 
    $plan_id=$_POST['view_plan'];
    $query = "SELECT * FROM plan_details WHERE plan_id='$plan_id' ";
    $result = mysqli_query($con, $query)or die(mysqli_error($con));
    if(mysqli_num_rows($result)>=1){?>
        <?php while ($row = mysqli_fetch_array($result)) {?>
            <div class="panel panel-primary pan1" style="border-color:darkcyan;">
                <div class="panel-heading ph1" style="background-color:darkcyan; ">
                    <div class="row">
                        <div class="col-sm-7 text-center">
                            <?php echo $row["title"]; ?> 
                        </div>
                        <div class="col-sm-5">
                            <div class="p1">
                            <span class="glyphicon glyphicon-user "></span>&nbsp<?php echo  $row["people_number"]; ?>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="panel-body">
                  <div class="row">
                      <div class="col-sm-6">
                          <label>Budget</label>  
                      </div>
                      <div class="col-sm-6">
                          
                          <div class="p2"><?php echo '₹' . $row["initial_budget"]; ?></div> 
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <label>Remaining Amount</label>  
                      </div>
                      <div class="col-sm-6">
                        <?php if($row["initial_budget"]>0){ ?>
                        <div class="p3" style="color: green; font-size:1.9rem;"><?php echo '₹' . $row["initial_budget"]; ?></div> <?php } ?>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6" >
                          <label>Date</label>  
                      </div>
                      <div class="col-sm-6">
                          <div class="p4"><?php 
                          $from=date_create($row["from_date"]);
                          $to=date_create($row["to_date"]);
                          $char='-';
                          echo date_format($from,'d M')." ".$char." ".date_format($to,'d M Y'); ?></div>
                      </div>
                  </div>
                </div>
            </div>
        <?php } 
      }?>




      <form action="">
      <button type="submit" class="btn btn-outline-primary exp" style="border-color:darkcyan;">Expense Distribution</button>
      </form>
      <div class="container">
        <div class="row row_style">
        <div class="col">    
        <div class="panel pan2" style="border-color: darkcyan;">
            <div class="panel-heading ph2" style="background-color: darkcyan; color:white; border-color: darkcyan;">
              Add New Expense
            </div>
            <div class="panel-body">
                <form action="plans_expenses.php" method="POST">
                    <label>Title</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="exp_title" placeholder="Expense Name">
                    </div>
                    <label>Date</label>
                    <div class="form-group">
                    
                        <input type="date" class="form-control" name="date" min="<?php echo date_format($from,'m Y'); ?>"  max="<?php echo date_format($to_dt,'m Y') ?>" required placeholder="dd">
                              
                    </div>
                    <label>Amount Spent</label>
                    <div class="form-group">
                        <input type="tel" class="form-control" name="amount_spent" placeholder="Amount spent">
                    </div>
                    
            
                    <select name="names" style=" font-size:20px; color: grey;" class="form-control" >
                      <option value="0" selected disabled >Choose</option>
                      <?php  $query_1="SELECT person_name FROM person_names WHERE pid='$plan_id'"; 
                      $res = mysqli_query($con, $query_1)or die(mysqli_error($con));
                      if(mysqli_num_rows($res)>=1){
                        while ($r = mysqli_fetch_array($res)) {?>
                          <option    value="<?php echo $r['person_name']; ?>" ><?php echo $r['person_name']; ?> </option>                         
                        <?php }
                      } ?>  
                    </select>   
                       
                    <label>Upload Bill</label>
                    <div class="form-group">
                      <input type="file" class="form-control" name="bill">
                    </div>
                    <button type="submit" name="plan_id" class="btn-outline-primary btn-block btn-lg b" value="<?php echo $plan_id; ?>">Add</button>
                </form>
            </div>
            
        </div>
        </div>
        </div>
    </div>
    <?php include("includes/footer.php");?>
</body>
 
<script src="./removeBanner.js"></script>

</html>
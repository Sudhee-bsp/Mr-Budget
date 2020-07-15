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


if(isset($_POST['plan_id'])){
    
    $person_name = $_POST['names'];
    $expense_title = $_POST['exp_title'];
    $date = $_POST['date'];
    $amount_spent= $_POST['amount_spent'];
    
    $pid= $_POST['plan_id'];
    // $image= $_POST['bill_img']; 


    $query = "SELECT * FROM expense WHERE plan_id='$pid' AND expense_title='$expense_title' AND amount_spent='$amount_spent' 	AND name='$person_name'  AND date='$date'";
    $res2=mysqli_query($con, $query) or die(mysqli_error($con));
    $num = mysqli_num_rows($res2);
    if ($num > 0)  {
    header('location: plan.php');

    }

    else{
        $image = "";
        if(!empty($_FILES['bill']['tmp_name']) && file_exists($_FILES['bill']['tmp_name'])){
            $image = addslashes($_FILES['bill']['tmp_name']);
            $image = file_get_contents($image);
            $image = base64_encode($image);
        }
            
    $query = "INSERT INTO  expense ( plan_id, expense_title, amount_spent, name , bill, date) VALUE ('$pid','$expense_title', '$amount_spent', '$person_name', 	'$image', '$date')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $expense_id = mysqli_insert_id($con);

    }
}

else{
    $pid=$_POST['view_plan'];
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
  <link rel="stylesheet" href="plans_expense.css">
  
</head>
<body>
    <?php include 'includes/header.php';?>
    
    <?php
    $plan_id = $pid;
    $query = "SELECT * FROM plan_details WHERE plan_id='$plan_id' ";
    $result = mysqli_query($con, $query)or die(mysqli_error($con));
    if(mysqli_num_rows($result)>=1){?>
        <?php while ($row = mysqli_fetch_array($result)) {?>
            <div class="container">
            <div class="panel panel-primary pan1" style="border-color:darkcyan;">
                <div class="panel-heading ph1" style="background-color:darkcyan; ">
                        <p class="text-center">
                            <?php echo $row["title"]; ?> 
                        </p>
                        <p class="p2">
                            <span class="glyphicon glyphicon-user "></span>&nbsp<?php echo  $row["people_number"]; ?>
                        </p>    
                </div>
                <div class="panel-body">
                    <form action="plan.php">
                        <div class="form-group r">
                          <p class="p1"><label>Budget</label></p>  
                          <p class="p2"><?php echo '₹' . $row["initial_budget"]; ?></p> 
                        </div>                     
                        <div class="form-group r" >
                            <p class="p1"><label>Remaining Amount</label></p>
                      
                            <?php 
                            
                            $qury="SELECT amount_spent FROM expense WHERE plan_id= '$plan_id' ";
                            $res1 = mysqli_query($con, $qury)or die($mysqli_error($con));
                            $balance=$row['initial_budget'];
                            $spent=0;
                            if(mysqli_num_rows($res1)>0){
                                
                                while ($r = mysqli_fetch_array($res1)) {
                                    $amount_spent=$r['amount_spent'];
                                    $balance=$balance-$amount_spent;
                                    $spent=$spent+$r['amount_spent'];
                                }
                            }
                            if($balance > 0){    ?>
                            <p class="p2" style="color: green; font-size: 1.5rem;">
                            <b><?php echo '₹' . $balance; ?> <?php } ?></b>
                            </p>
                            <?php if($spent > $row['initial_budget']){    ?>
                            <p class="p2" style="color: red; font-size: 15px;">
                            <b><?php 
                            $amnt=$spent - $row['initial_budget'];
                            echo  'Overspent by ₹' . $amnt; ?> <?php } ?></b></p>
                        </div> 
                        <div class="form-group r">
                            <p class="p1"><label>Date</label></p>
                            <?php 
                            $from=date_create($row["from_date"]);
                            $to=date_create($row["to_date"]);
                            $char='-'; ?>
                            <p class="p3"> <?php echo date_format($from,'d M')." ".$char." ".date_format($to,'d M Y'); ?></p>
                        </div>
                        <div class="form-group">
                            <p class="text-center"><button type="submit" name="view_plan" value="<?php echo $pid; ?>" class="btn btn-outline-primary " style="border-color:darkcyan; border-width:2px;"><b><span  class="glyphicon glyphicon-chevron-left"></span>Go back</b></button></p>
                            </div> 
                    </form>
                </div>
            </div>
            </div>
        <?php } 
      }?>
      <form action="expense_distribution.php" method="POST">
      <input type="hidden" value="<?php echo $spent; ?>" name="amount_spent">
      <button type="submit" name="exp_dist" value="<?php echo $pid; ?>" class="btn btn-outline-primary exp" style="border-color:darkcyan;"><b>Expense Distribution</b></button>
      </form>



    
      
      
      <div class="container">
        <div class="row row_style">
        <div class="visible-xs visible-sm visible-md visible-lg">    
        <div class="panel pan2" style="border-color: darkcyan;">
            <div class="panel-heading ph2" style="background-color: darkcyan; color:white; border-color: darkcyan;font-size: 22px">
              Add New Expense
            </div>
            <div class="panel-body">
                <form action="plans_expenses.php" method="POST" enctype="multipart/form-data">
                    <label>Title</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="exp_title" placeholder="Expense Name" required>
                    </div>
                    <label>Date</label>
                    <div class="form-group">
                        <?php 
                                $query = "SELECT * FROM plan_details WHERE plan_id='$plan_id' ";
                                $result = mysqli_query($con, $query)or die(mysqli_error($con));
                                if(mysqli_num_rows($result)>=1){
                                    while ($row = mysqli_fetch_array($result)) {
                                        $f = $row['from_date'];
                                        $t = $row['to_date'];
                                    }
                                }
                        ?>
                        <input type="date" class="form-control" name="date" min="<?php echo $f; ?>"  max="<?php echo $t; ?>" required placeholder="dd">
                              
                    </div>
                    <label>Amount Spent</label>
                    <div class="form-group">
                        <input type="tel" class="form-control" name="amount_spent" placeholder="Amount spent" required>
                    </div>
                    
                    <label>Spent by</label>
                    <select name="names" style=" font-size:20px; color: grey;" class="form-control" required>
                      <option value="0" selected disabled >Choose</option>
                      <?php  $query_1="SELECT person_name FROM person_names WHERE pid='$plan_id'"; 
                      $res = mysqli_query($con, $query_1)or die(mysqli_error($con));
                      if(mysqli_num_rows($res)>=1){
                        while ($r = mysqli_fetch_array($res)) {?>
                          <option    value="<?php echo $r['person_name']; ?>" ><?php echo $r['person_name']; ?> </option>                         
                        <?php }
                      } ?>  
                    </select>   
                       <br>
                    <label>Upload Bill (optional)</label>
                    <div class="form-group">
                      <input type="file" class="form-control" name="bill" optional>
                    </div>
                    <button type="submit" name="plan_id" class="btn-outline-primary btn-block btn-lg b" value="<?php echo $plan_id; ?>">Add</button>
                </form>
            </div>
            
        </div>
        </div>
        </div>
    </div>

    
    <div class="container cnt">
    <div class="row ">  
    <?php 
    
    $query = "SELECT * FROM expense WHERE plan_id='$pid' ";
    $result = mysqli_query($con, $query)or die(mysqli_error($con));
    if(mysqli_num_rows($result)>=1){?>
                <?php while ($row = mysqli_fetch_array($result)) {?>
                <div class="col-lg-5">
                <div class="panel panel-primary pn1" style="border-color:darkcyan;">
                    <div class="panel-heading" style="background-color:darkcyan; ">
                            <p class="text-center" style="font-size:18px"><?php echo $row["expense_title"]; ?> </p>
                    </div>
                    <div class="panel-body">
                        <form action="bill.php" method="POST">
                            <div class="form-group">
                                <p class="p1">
                                <label>Amount</label>  
                                </p>
                                <p class="sp2">
                                    <?php echo '₹' . $row["amount_spent"]; ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="p1">
                                <label>Paid by</label>  
                                </p>
                                <p class="sp2">
                                    <?php echo $row["name"]; ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="sp1" >
                                <label>Paid on</label>  
                                </p>
                                <p class="sp2">
                                    <?php 
                                    $from=date_create($row["date"]);                                
                                    echo date_format($from,'d M-Y')?>
                                </p>
                            </div>
                            <div class="form-group">
                                <?php 
                                if(! $row['bill']){ ?>
                                <p class="text-center"><a  class="c8"><b>You Don't have bill</b></a><p>
                                <?php }
                                else{ 
                                    $val = $row['expense_id'];  ?>
                                    
                                        <p class="text-center p"><button type="submit" name="bill" formtarget="Bill" class='c9' target="_blank" value="<?php echo $val; ?>"><b>Show Bill</b></button></p>
                                    
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                <?php }
            }?>
        </div>
      </div>
      
          
      
            
    <?php include("includes/footer.php");?>
</body>
 
<script src="./removeBanner.js"></script>

</html>
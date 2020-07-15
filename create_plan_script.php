<?php
require("includes/common.php");

$initial_budget = $_POST['in_bd'];
$people_number = $_POST['people'];
$title = $_POST['title'];
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$person=$_POST['name'];
$user_id = $_SESSION['user_id'];

$from=date_create($from_date);
$to=date_create($to_date);
if($to < $from){
    echo "<script>alert('From Date must be less than To Date')</script>";
    echo "<script>location.href='create_plan.php'</script>";
}

else{
    $query = "INSERT INTO  plan_details ( user_id, initial_budget, people_number, title, from_date, to_date) VALUES('$user_id','$initial_budget', '$people_number', '$title', '$from_date', '$to_date')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $plan_id = mysqli_insert_id($con);
    $_SESSION['plan_id'] = $plan_id;
    
    $pid = $_SESSION['plan_id'];
    $i=0;
    while($i<count($person)){
        $query_2= "INSERT INTO  person_names ( pid, person_name) VALUES('$pid','$person[$i]')";
        mysqli_query($con, $query_2) or die(mysqli_error($con));
        $i++;
    }


echo "<script>alert('Your New Budget Planner Added Successfully')</script>";
echo "<script>location.href='signup.php'</script>";
}
?>
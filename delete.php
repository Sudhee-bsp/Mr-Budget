<?php 
require("includes/common.php");

$pid= $_POST['delete_plan'];
$query = "DELETE FROM plan_details WHERE plan_id='$pid'";
mysqli_query($con, $query) or die(mysqli_error($con));
header("location: plan.php");
            
       

?>


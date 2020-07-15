<?php
    $con = mysqli_connect("localhost", "id13808217_mani", "Manisss-0806", "id13808217_control_budget")
    or die(mysqli_error($con));


    if(!isset($_SESSION)){
      session_start();
    }
    
?>
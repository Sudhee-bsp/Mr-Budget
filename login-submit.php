<?php

require("includes/common.php");

$email = $_POST['email'];
$email = mysqli_real_escape_string($con, $email);
$password = $_POST['password'];
$password = mysqli_real_escape_string($con, $password);
$password = MD5($password);

$query = "SELECT id, email FROM users WHERE email='" . $email . "' AND password='" . $password . "'";
$result = mysqli_query($con, $query)or die(mysqli_error($con));
$num = mysqli_num_rows($result);
if ($num == 0) {
    echo "<script>alert('Enter Correct Email/Password')</script>";
    echo "<script>location.href='login.php'</script>";
    
} else {
  $row = mysqli_fetch_array($result);
  $_SESSION['email'] = $row['email'];
  $_SESSION['user_id'] = $row['id'];
  echo "<script>alert('You are logged in')</script>";
  echo "<script> location.href='homepage.php' </script>";
  exit(" ");
}
?>

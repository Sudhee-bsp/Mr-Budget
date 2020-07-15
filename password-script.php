<?php
// This page updates the user password
require("includes/common.php");

if (!isset($_SESSION['email'])) {
    header('location: index.php');
}

$old_pass = $_POST['old_password'];
$old_pass = mysqli_real_escape_string($con, $old_pass);
$old_pass = MD5($old_pass);

$new_pass = $_POST['new_password'];
$new_pass = mysqli_real_escape_string($con, $new_pass);
$new_pass = MD5($new_pass);



$rep_pass = $_POST['New_password'];
$rep_pass = mysqli_real_escape_string($con, $rep_pass);
if ( strlen($rep_pass) < 6) {
    echo "<script>alert('Min.6 digits required')</script>";
    echo "<script>location.href='password.php'</script>";
    exit(' ');
}
$rep_pass = MD5($rep_pass);



if ($new_pass !== $rep_pass) {
    echo "<script>alert('Password Does not Match')</script>";
    echo "<script>location.href='password.php'</script>";
    exit(' ');
}

$query = "SELECT email, password FROM users WHERE email ='" . $_SESSION['email'] . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$row = mysqli_fetch_array($result);



$orig_pass = $row['password'];


if($old_pass !== $orig_pass){
    echo "<script>alert('Wrong Old Password')</script>";
    echo "<script>location.href='password.php'</script>";
    exit('');
}


if($old_pass == $orig_pass){
    
    if (strlen($rep_pass) >=6 && strlen($new_pass) >= 6 && $new_pass == $rep_pass) {
        $query = "UPDATE  users SET password = '" . $new_pass . "' WHERE email = '" . $_SESSION['email'] . "'";
        mysqli_query($con, $query) or die($mysqli_error($con));
        echo "<script>alert('Password Updated Sucessfully')</script>";
        echo "<script>location.href='logout.php'</script>";
        exit(' ');
        }
    
}
?>

<?php

require("includes/common.php");


  $name = $_POST['name'];
  $name = mysqli_real_escape_string($con, $name);

  $email = $_POST['email'];
  $email = mysqli_real_escape_string($con, $email);

  $password = $_POST['password'];
  $password = mysqli_real_escape_string($con, $password);
  if (strlen($password) < 6) {
    echo "<script>alert('Password: Min. 6 digits required')</script>";
    echo "<script>location.href='signup.php'</script>";
    exit(' ');
  }
  $password = MD5($password);

  $contact = $_POST['contact'];
  $contact = mysqli_real_escape_string($con, $contact);

  
  $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
  $regex_num = "/^[789][0-9]{9}$/";

  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($con, $query)or die($mysqli_error($con));
  $num = mysqli_num_rows($result);

  if ($num != 0) {
    echo "<script>alert('Email already exist')</script>";
    echo "<script>location.href='signup.php'</script>";
  } else if (!preg_match($regex_email, $email)) {
    echo "<script>alert('Not a valid Email Id')</script>";
    echo "<script>location.href='signup.php'</script>";
  } else if (!preg_match($regex_num, $contact)) {
    echo "<script>alert('Not a valid Phone number')</script>";
    echo "<script>location.href='signup.php'</script>";
  }else {
    $query = "INSERT INTO users(name, email, password, contact)VALUES('" . $name . "','" . $email . "','" . $password . "','" . $contact . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $user_id = mysqli_insert_id($con);
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $user_id;
    echo "<script>alert('User successfully registered')</script>";
    echo "<script>location.href='homepage.php'</script>";
  }
?>

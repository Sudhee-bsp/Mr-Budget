<?php
    require("includes/common.php");
    // include('scripts/login-script.php');
    if (isset($_SESSION['email'])) {
      header('location: homepage.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="login.css?<?php ?>" />
    <meta charset="UTF-8" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
  </head>
  <body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
      <div class="row row_style">
        <div class="col-xs-8">
              
              <div class="login-div">
                <form action="login-submit.php" method="POST">
                
                  <div class="logo"></div>
                  <!-- <div class="title">Ct₹l Budget</div> -->
                  <div class="sub-title">LOGIN</div>
                  
                  <div class="fields">

                    <div class="username">
                      <input type="username" name="email" class="user-input" placeholder="Email"/>
                    </div>
                    <div class="password">
                      <input type="password" name="password" class="pass-input" placeholder="Password"/>
                    </div>

                  </div>

                  <!-- <button name="login" class="loginin-button">Login</button> -->
                  <input type="submit" name="login" value="Login" class="loginin-button">
                  <div class="link">
                    <a href="signup.php">New Member? Please Sign up</a>
                  </div>
              </form>
             </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include './includes/footer.php' ?>
  </body>
  
  <script src="./removeBanner.js"></script>
</html>

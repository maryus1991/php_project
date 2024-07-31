<?php
require_once('./config/loader.php')
?>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <div class="container" id="container">
    <div class="form-container sign-up">

<!--        sign up form-->
      <form action="actions/sign_up.php" method="post">
        <h1>Create Account</h1>
        <div class="social-icons">
          <a href="#" class="icons"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="#" class="icons"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="icons"><i class="fa-brands fa-github"></i></a>
          <a href="#" class="icons"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <span>or use your email to registration</span>
        <input name="userName" type="text" placeholder="userName">
        <input name="Email" type="email" placeholder="Email">
        <input name="MObileNumber" type="text" placeholder="MObileNumber">
        <input name="Password" type="password" placeholder="Password">
        <button type="submit" name="signup">Sign Up</button>
      </form>
    </div>
    <div class="form-container sign-in">
        <!--          log in form -->
      <form method="post" action="actions/sign_in.php">
        <h1>Sign In</h1>
            <br>

            <span>use your Mobile / Username / email/ password</span>
            <?php if (isset($_GET['noresult']) == 1 ){
                print '<span style="color: darkred">Not Regesterd or Not Correct Information</span>';
            } ?>
            <input type="text" name="login_emu" placeholder="Mobile / Username / email">
            <input type="password" name="loginpass" placeholder="Password">
            <a href="#">Forget your Password?</a>
            <div style="display: inline;">
                <button type="submit" name="signin" >Sign In</button>
                <a style="margin-left: 15px" href="otp.php">Send OTP</a>        
            </div>
      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Welcome Back!</h1>
          <p>Enter your Personal details to use all of site features</p>
          <button class="hidden" id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Hello, Friend!</h1>
          <p>Register with your Personal details to use all of site features</p>
          <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="./assets/script/js/script.js"></script>
</html>
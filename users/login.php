<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Jarvis Escrow</title>
    <!-- Bootsrap CDN-->

    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">

    <!-- Font Awesome CDN-->
    <script src="https://kit.fontawesome.com/75a3de8c57.js" crossorigin="anonymous"></script>


    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/loginPage.css">

</head>

<body>



  <div class = "formContainer">


  <h2 class="display2" style="text-align: center; color: white;">Log in</h2>    
       <form class = "loginForm" method="post" action="login.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
              <label>Username</label>
              <input type="text" name="username" required>
            </div>
            <div class="input-group">
              <label>Password</label>
              <input type="password" name="password" required>
            </div>
            <div class="input-group">
              <button type="submit" class="btn" name="login_user">Login</button>
            </div>
            
            <p style="font-size: 15px;"> 
              Not yet a member? <a href="register.php">Sign up</a>
            </p>
        

        
        <p style="font-size: 15px;"><a href="/password-reset/">Forgot your password?</a></p>
        
        </form>
    </div>
 
</body>
</html>
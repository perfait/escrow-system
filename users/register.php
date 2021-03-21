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


<div class="fixed10col roomydiv">

    <div class="register-layout-wrapper">
        <div class="first-col">
            <h2 class="display2" style="text-align: center; color: white;">Create an account</h2>

              <form method="post" action="register.php">
                  <?php include('errors.php'); ?>
                  <div class="input-group">
                    <label>First Name</label>
                    <input type="text" name="firstname" required>
                  </div>
                  <div class="input-group">
                    <label>Last Name</label>
                    <input type="text" name="lastname" required>
                  </div>
                  <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>" required>
                  </div>
                  <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>" placeholder="e.g johnsmith@gmail.com" required>
                  </div>
                  <div class="input-group">
                    <label>Phone number</label>
                    <input type="text" name="contact" placeholder="0725342512" required>
                  </div>

                  <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password_1" required>
                  </div>
                  <div class="input-group">
                    <label>Confirm password</label>
                    <input type="password" name="password_2" required>
                  </div>
                  <div class="input-group">
                    <button type="submit" class="btn" name="reg_user" >Register</button>
                  </div>
                  <p style="font-size: 15px;">
                    Already a member? <a href="login.php">Sign in</a>
                  </p>
    
           </form>
        </div>
 
</body>
</html>
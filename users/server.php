<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'escrow');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "Username is required"); }
  if (empty($lastname)) { array_push($errors, "Username is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($contact)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users (firstname, lastname, username, email, password, phone) 
          VALUES('$firstname','$lastname','$username', '$email', '$password', '$contact')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: login.php');
  }
}

// ... 
    // ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $useremailArray=mysqli_query($GLOBALS['db'],"select email FROM users where username='$username'");
            while ($row = $useremailArray->fetch_assoc()){
            $useremail = $row['email'];
 }

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['useremail'] = $useremail;
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: my_transactions.php');
      $useremail = $_SESSION['useremail'];
    }else {
      array_push($errors, "Wrong username/password combination");
    }

    //$useremail = $_SESSION['useremail'];
    $transactionPartner=mysqli_query($GLOBALS['db'],"select transaction_partner FROM transactions where customer_email= '$useremail' OR transaction_partner='$useremail'");
    while ($row = $transactionPartner->fetch_assoc()){
    $retrievedtransactionPartner = $row['transaction_partner'];

    $_SESSION['transactionPartner'] = $retrievedtransactionPartner;
  }
    

  
    $customerEmail=mysqli_query($GLOBALS['db'],"select customer_email FROM transactions where customer_email= '$useremail' OR transaction_partner='$useremail'");
    while ($row = $customerEmail->fetch_assoc()){
    $retrievedCustomerEmail = $row['customer_email'];

    $_SESSION['customerEmail'] = $retrievedCustomerEmail;
  }
  }


    

}


function getData(){

  $mail = $_SESSION['useremail'];

  $sql="SELECT id, transaction_title, transaction_partner, amount, status
  FROM transactions
  WHERE customer_email= '$mail' OR transaction_partner='$mail'
  ORDER BY id DESC";

  $result = mysqli_query($GLOBALS['db'],$sql);

  if(mysqli_num_rows($result)>0){
      return $result;
  }

}

      



?>


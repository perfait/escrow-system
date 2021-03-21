<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');
require_once('models/Transaction.php');
require_once('deposit.php');
require_once('server.php');



\Stripe\Stripe::setApiKey('sk_test_51HPST1LbdPtfQnAz39zgd7jkCi6TpSthwZG1raTFisft6HpP3EEVDJbzAlCpVMOqe2nSkucYbIVdLbhmWbDYoRgm00XFvQcJA6');

//SANITIZE POST ARRAY
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$amount = $POST['amount'];
$token = $POST['stripeToken'];
$partner = $_POST['seller_email'];




if($partner){

  $check=mysqli_query($GLOBALS['db'],"select * from users where email='$partner'");
  $checkrows=mysqli_num_rows($check);

if($checkrows>0) {

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token
  ));
  
  // Charge Customer
  $charge = \Stripe\Charge::create(array(
    "amount" => $amount,
    "currency" => "usd",
    "description" => "Payment to escrow",
    "customer" => $customer->id
  ));

// Customer Data
$customerData = [
    'id' => $charge->customer,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email
  ];

  // Instantiate Customer
$customer = new Customer();

// Add Customer To DB
$customer->addCustomer($customerData);




// Transaction Data
$transactionData = [
    'id' => $charge->id,
    'customer_id' => $charge->customer,
    'product' => $charge->description,
    'amount' => $charge->amount,
    'currency' => $charge->currency,
    'status' => $charge->status,
  ];
  
  // Instantiate Transaction
  $transaction = new Transaction();
  
  // Add Transaction To DB
  $transaction->addTransaction($transactionData);


  header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);

}

else{
  header("Location: http://localhost/escrow/users/errors/deposit_error.php");

}


}
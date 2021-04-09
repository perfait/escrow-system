<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

require_once("server.php");

$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'escrow');
$name = $_SESSION['username'];
$transaction_id = $_SESSION['transactionId'];
$buyer_email = $_SESSION['buyerEmail'];


if(isset($_POST['verify_transaction'])){
    //$message = $_POST['message'];
    $query ="INSERT INTO `notifications` (`transaction_id`, `name`, `buyer_email`, `type`, `message`) 
    VALUES ('$transaction_id', '$name', '$buyer_email', 'comment', 'Please confirm the receipt of goods from buyer')";
    if(mysqli_query($db, $query)){
        echo '<script>alert("The buyer will release your money on receipt of goods"); location = "http://localhost/escrow/users/verification.php"</script>';
    }
}


?>
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


if(isset($_POST['launch_dispute'])){
    header("Location: file-upload-download/index.php");
}


?>
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


if(isset($_POST['go_to_verify'])){
    checkData();
}


//$transaction_title = $row['transaction_title'];
//$amount = $row['amount'];

function checkData(){

        $transaction_id = $_POST['transaction_id'];

        $check=mysqli_query($GLOBALS['db'],"select * from transactions where id ='$transaction_id'");
        $checkrows=mysqli_num_rows($check);

        $detailsArray=mysqli_query($GLOBALS['db'],"select * FROM transactions where id='$transaction_id'");
        while ($row = $detailsArray->fetch_assoc()){
        $buyerEmail= $row['customer_email'];
        $transaction_title= $row['transaction_title'];
        $amount= $row['amount'];
         }

        if($checkrows>0) {
            $_SESSION['buyerEmail'] = $buyerEmail;
            $_SESSION['transactionTitle'] = $transaction_title;
            $_SESSION['amount'] = $amount;
            $_SESSION['transactionId'] = $transaction_id;

            header("Location: http://localhost/escrow/users/dispute_verification.php");
        } else {
            echo '<script>alert("Invalid transaction code"); location = "http://localhost/escrow/users/disputes.php"</script>';
            exit;
            
        }

}


?>
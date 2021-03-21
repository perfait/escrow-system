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


if(isset($_POST['verify_transaction'])){
    checkData();
}


function checkData(){

    header("Location: http://localhost/escrow/users/file-upload-download/");

        

}


?>
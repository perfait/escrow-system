<?php
    include("notifications_operations.php");
    include('templates/header.php');


    if(!isset($_SESSION)) 
{ 
	session_start(); 
} 


require_once('server.php');
?>



<?php
include('templates/footer.php');
?>

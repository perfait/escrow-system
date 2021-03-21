<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

require_once("verification_operations.php");
require_once('server.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jarvis Escrow</title>
    <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fixed.css">
    <link rel="stylesheet" href="css/stripe.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<!--navbar-->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	<a class="navbar-brand" href="#"><img src="img/nuno.png"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
	data-target="#navbarResponsive">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class = "navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="my_transactions.php">Home</a>
			</li>

		</ul>

		<ul class = "navbar-nav ml-auto">

		<li>
		<a class="nav-link" href="#">Welcome-<?php echo $_SESSION['username'] ?></a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="logout.php">Log out</a>	
		</li>

		

		</ul>

	</div>

	</nav>






<div class="container" style="padding-top: 50px;">

    <h2 class = "my-4 text-center">Transaction Summary</h2>
    <form action="./verification_operations.php" method="post" id="payment-form">
    <?php include('errors.php'); ?>
    <div class="form-row">
        <label for="your-details" style="font-family: 'Roboto', sans-serif;"><strong>Your details:</strong></label>
        <input type="email" name="email" value = '<?php echo $_SESSION['useremail']?>' class="form-control mb-3 StripeElement StripeElement--empty" readonly="readonly" required>
        <label for="Buyer-email" style="font-family: 'Roboto', sans-serif;"><strong>Buyer's Email:</strong></label><br>
        <input type="email" name="buyer_email" value = '<?php echo $_SESSION['buyerEmail']?>' class="form-control mb-3 StripeElement StripeElement--empty" readonly="readonly" required>
        <label for="transaction_title" style="font-family: 'Roboto', sans-serif;"><strong>Transaction Title:</strong></label>
        <input type="text" name="transaction_title" value = '<?php echo $_SESSION['transactionTitle']?>' class="form-control mb-3 StripeElement StripeElement--empty" readonly="readonly" required>
        <label for="Amount" style="font-family: 'Roboto', sans-serif;"><strong>Amount:</strong></label>
        <input type="text" name="amount" value = '<?php echo $_SESSION['amount']?>' class="form-control mb-3 StripeElement StripeElement--empty" readonly="readonly" required>
        <label for="transaction_code" style="font-family: 'Roboto', sans-serif;"><strong>Transaction Code:</strong></label>
        <input type="text" name="transaction_code" value = '<?php echo $_SESSION['transactionId']?>' class="form-control mb-3 StripeElement StripeElement--empty" readonly="readonly" required>
    
        <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display Element errors. -->
        <div id="card-errors" role="alert"></div>
    </div>

    <button class="btn btn-primary" name="verify_transaction" style="width: 82%; margin-left: 9%;
    font-family: 'Roboto', sans-serif;">Verify Transaction</button>
    </form>
</div>




<?php
include('templates/footer.php');
?>
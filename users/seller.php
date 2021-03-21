<?php
require_once("seller_operations.php");
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

    <h2 class = "my-4 text-center">Enter the transaction code</h2>
    <form action="./seller_operations.php" method="post" id="payment-form">
    <?php include('errors.php'); ?>
    <div class="form-row">
        <label for="transaction_details" style="font-family: 'Roboto', sans-serif;"><strong>Transaction details:</strong></label>
        <input type="text" name="transaction_id" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="transaction id eg. transid_603ab660422c1" required>
        <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display Element errors. -->
        <div id="card-errors" role="alert"></div>
    </div>

    <button class="btn btn-primary" name="transaction_code" style="width: 82%; margin-left: 9%;
    font-family: 'Roboto', sans-serif;">
    Verify transaction</button>
    </form>
</div>




<?php
include('templates/footer.php');
?>
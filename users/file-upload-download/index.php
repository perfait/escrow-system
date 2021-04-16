<?php include 'filesLogic.php';

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

require_once('../server.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Jarvis Escrow</title>
    <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="filestyle.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fixed.css">
    <link rel="stylesheet" href="/css/stripe.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  <body>

  <!--navbar-->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	<a class="navbar-brand" href="#"><img src="../img/nuno.png"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
	data-target="#navbarResponsive">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class = "navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="../my_transactions.php">Home</a>
			</li>

		</ul>

		<ul class = "navbar-nav ml-auto">

		<li>
		<a class="nav-link" href="#">Welcome-<?php echo $_SESSION['username'] ?></a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="../logout.php">Log out</a>	
		</li>
		</ul>

	</div>

	</nav>


    <div class="container">
      <div class="row">
        <form action="index.php" method="post" enctype="multipart/form-data" >
    <div class="form-row">
        <label for="transaction_details" style="font-family: 'Roboto', sans-serif;"><strong>Your name:</strong></label>
        <input type="text" name="dispute_launcher" class="form-control mb-3 StripeElement StripeElement--empty" value = <?php echo $_SESSION['username'] ?> readonly="readonly" required>

        <label for="transaction_details" style="font-family: 'Roboto', sans-serif;"><strong>Name of person disputing against:</strong></label>
        <input type="text" name="dispute_partner" class="form-control mb-3 StripeElement StripeElement--empty" required>
        <label for="transaction_details" style="font-family: 'Roboto', sans-serif;"><strong>Reason for launching dispute:</strong></label>
        <textarea id="reason" name="reason" rows="4" cols="50" placeholder="E.g Seller hasn't delivered yet" required>
        </textarea><br><br>

        </div>
        <div id="card-errors" role="alert"></div>
        <label for="transaction_details" style="font-family: 'Roboto', sans-serif;"><strong>Please upload relevant evidence to back up your claim:</strong></label>
          <h6>Upload File</h6>
          <input type="file" name="myfile"> <br>
          <button class="btn btn-primary" type = "submit" name="save" style="width: 50%;
            font-family: 'Roboto', sans-serif;">
            Submit</button>
        </form>
      </div>
    </div>
  </body>
</html>
<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

require_once("verification_operations.php");
require_once('server.php');
include('templates/header.php');
?>

<div class="container" style="padding-top: 50px;">

    <h2 class = "my-4 text-center">Transaction Summary</h2>
    <form action="./dispute_verification_operations.php" method="post" id="payment-form">
    <?php include('errors.php'); ?>
    <div class="form-row">
        <label for="your-details" style="font-family: 'Roboto', sans-serif;"><strong>Your details:</strong></label>
        <input type="email" name="email" value = '<?php echo $_SESSION['useremail']?>' class="form-control mb-3 StripeElement StripeElement--empty" readonly="readonly" required>
        <label for="Buyer-email" style="font-family: 'Roboto', sans-serif;"><strong>Transaction partner:</strong></label><br>
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

    <button class="btn btn-primary" name="launch_dispute" style="width: 82%; margin-left: 9%;
    font-family: 'Roboto', sans-serif;">Launch dispute</button>
    </form>
</div>




<?php
include('templates/footer.php');
?>
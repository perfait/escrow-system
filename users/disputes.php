<?php
require_once("disputes_operations.php");
require_once('server.php');

include('templates/header.php');
?>
<div class="container" style="padding-top: 50px;">

    <h2 class = "my-4 text-center">Enter the transaction code</h2>
    <form action="./disputes_operations.php" method="post" id="payment-form">
    <?php include('errors.php'); ?>
    <div class="form-row">
        <label for="transaction_details" style="font-family: 'Roboto', sans-serif;"><strong>Transaction details:</strong></label>
        <input type="text" name="transaction_id" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="transaction id eg. transid_603ab660422c1" required>
        <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display Element errors. -->
        <div id="card-errors" role="alert"></div>
    </div>

    <button class="btn btn-primary" name="go_to_verify" style="width: 82%; margin-left: 9%;
    font-family: 'Roboto', sans-serif;">
    Go to verify</button>
    </form>
</div>




<?php
include('templates/footer.php');
?>
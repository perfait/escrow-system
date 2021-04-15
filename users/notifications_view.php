<h1>Notifications</h1>

<?php

require_once('server.php');
include("notifications_operations.php");

    $id = $_GET['id'];

    $transactionIdArray=mysqli_query($GLOBALS['db'],"select transaction_id FROM notifications where id='$id'");
            while ($row = $transactionIdArray->fetch_assoc()){
            $retrievedTransactionId= $row['transaction_id'];
            }

    $query ="UPDATE `notifications` SET `status` = 'read' WHERE `id` = $id;";
    performQuery($query);

    $query = "SELECT * from `notifications` where `id` = '$id';";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
           
                echo ucfirst($i['name'])." Is requesting that you release his payment from escrow if you have received his goods. <br/>".$i['date'];
                echo "<br/>";
          
                echo "Please press the confirm button below to confirm receipt of goods and release of funds.";

                
            
        }
    }
    
?><br/>

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

<form method="post">

<button type="submit" class="btn btn-primary" style = "margin-left: 50px; margin-top: 50px;" name="confirm" onclick="location.href = '#';">Confirm</button>
<button type="submit" class="btn btn-danger" style = "margin-left: 50px; margin-top: 50px;" name="back" onclick="location.href = '#';">Back</button>

<?php

if(isset($_POST['confirm'])){
    $statusUpdateQuery = "UPDATE transactions SET status= 'verified' WHERE id='$retrievedTransactionId'";
    mysqli_query($db, $statusUpdateQuery);

    echo '<script>alert("Transaction has been verified"); location = "http://localhost/escrow/users/my_transactions.php"</script>';

}

if(isset($_POST['back'])){
    
    header("Location: my_transactions.php"); 


}


?>

</form>
</body>
</html>
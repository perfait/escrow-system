<?php
include('templates/header.php');
require_once 'server.php';
?>

<div class="parent-container">
<div class="transactions-container">
	<h1>Start a new transaction</h1>
	<div class="centered-buttons">
	<button type="submit" class="btn btn-primary" name="buy" onclick="location.href = 'deposit.php';">Buy</button>
	<button type="submit" class="btn btn-primary" name="sell" onclick="location.href = 'seller.php';">Sell</button>
	</div>
</div>


<div class="table-container">

<!--Bootstrap table-->
<h2 class = "my-4 text-center" style="padding-top: 8%;">Your transactions</h2>
<div class="d-flex table-data" style = "text-align: center; width: 100%; font-size: 0.9em;">
        <table class="table table-striped table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>transaction Id</th>
                    <th>Title</th>
                    <th>Transaction Partner</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="tbody">
            <?php
                    
                        $result = getData();

                        if($result){
                            while($row = mysqli_fetch_assoc($result)){?>

                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['transaction_title'];?></td>
                                    <td><?php 
                                    
                                    $customerEmail = $_SESSION['customerEmail'];
                                    $useremail = $_SESSION['useremail'];
                                    $transactionPartner = $_SESSION['transactionPartner'];

                                    if ($useremail == $transactionPartner) {
                                        echo $customerEmail;
                                      } else {
                                        echo $row['transaction_partner'];
                                      }

                                    ?>
                                    

                                    
                                    
                                    </td>
                                    <td><?php echo $row['amount'];?></td>
									<td><a href="" style="text-decoration: none;"><?php echo $row['status'];?></a></td>
                                    
                                </tr>

                            <?php
                            }
                        }
                    
                    

                ?>
            </tbody>
        </table>
    </div>


</div>

</div>

<?php
include('templates/footer.php');
?>

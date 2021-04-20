<?php
session_start();
include'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from transactions where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Users</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Admin Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	
                  <li class="mt">
                      <a href="change-password.php">
                          <i class="fa fa-file"></i>
                          <span>Change Password</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Users</span>
                      </a>
                   
                  </li>

                  <li class="sub-menu">
                      <a href="manage-transactions.php" >
                          <i class="fa fa-money"></i>
                          <span>Manage transactions</span>
                      </a>
                   
                  </li>

                  <li class="sub-menu">
                      <a href="file-upload-download/manage-verification.php" >
                          <i class="fa fa-envelope"></i>
                          <span>Manage disputes</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="manage-reports.php" >
                          <i class="fa fa-file"></i>
                          <span>Manage Reports</span>
                      </a>                   
                  </li>
              
                 
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Manage Transactions</h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All transactions Details </h4>
	                  	  	  <hr>
                                  <button class="btn btn-success btn-xs" style="margin-left: 15%; margin-bottom: 5%;" onclick="location.href='http://localhost/escrow/admin/csv/transactions_csv.php'" >Export transactions as CSV</i></button>
                                  <button class="btn btn-success btn-xs" style="margin-left: 5%; margin-bottom: 5%;" onclick="location.href='http://localhost/escrow/admin/csv/users_csv.php'" >Export users as CSV</i></button>     
                                  <button class="btn btn-success btn-xs" style="margin-left: 5%; margin-bottom: 5%;" onclick="location.href='http://localhost/escrow/admin/csv/disputes_csv.php'" >Export Disputes as CSV</i></button>   
                                  <button class="btn btn-success btn-xs" style="margin-left: 5%; margin-bottom: 5%;" onclick="location.href='http://localhost/escrow/admin/csv/notifications_csv.php'" >Export notifications as CSV</i></button>  
                              <thead>
                              <tr>
    
                                  <th> </th>
                                  <th>Id</th>
                                  <th> Customer email</th>
                                  <th>Transaction title</th>
                                  <th>Transaction partner</th>
                                  <th>Amount</th>
                                  <th>Status</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"SELECT id, customer_email, transaction_title, transaction_partner, amount, 
                              status FROM transactions ORDER BY id DESC");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['id'];?></td>
                                  <td><?php echo $row['customer_email'];?></td>
                                  <td><?php echo $row['transaction_title'];?></td>
                                  <td><?php echo $row['transaction_partner'];?></td>
                                  <td><?php echo $row['amount'];?></td> 
                                  <td><?php echo $row['status'];?></td> 
                        
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
		</section>
      </section
  ></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
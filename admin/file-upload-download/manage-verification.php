<?php
session_start();
include'../dbconnection.php';
include 'filesLogic.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:../logout.php');
  } else{

// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from disputes where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}

//for updating status
if(isset($_GET['uid']))
{

  $uid=$_GET['uid'];
//$query=mysqli_query($con,"update disputes set status='Resolved' where id='$uid'");

$query=mysqli_query($con,"UPDATE transactions, disputes
SET transactions.status = 'verified', disputes.status='Resolved' 
WHERE transactions.id=disputes.id AND transactions.id='$uid';");


$_SESSION['msg']= "Transaction updated successfully";
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
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
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
              
              	  <p class="centered"><a href="#"><img src="../assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	
                  <li class="mt">
                      <a href="../change-password.php">
                          <i class="fa fa-file"></i>
                          <span>Change Password</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="../manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Users</span>
                      </a>
                   
                  </li>

                  <li class="sub-menu">
                      <a href="../manage-transactions.php" >
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
                      <a href="../manage-reports.php" >
                          <i class="fa fa-file"></i>
                          <span>Manage Reports</span>
                      </a>                   
                  </li>
              
                 
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Manage Disputes</h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All Disputes Details </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
    
                                  <th> </th>
                                  <th>Id</th>
                                  <th> Dispute Launcher</th>
                                  <th>Dispute Against</th>
                                  <th>reason</th>
                                  <th>status</th>
                                  <th>Proof download</th>
                                  <th>Approve</th>
                                  <th>Delete</th>

                                
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
                              
                              $ret=mysqli_query($con,"SELECT id, dispute_launcher, launch_against, reason, status
                              FROM disputes ORDER BY id DESC");
                             
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {$file['id']=$row['id'];?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['id'];?></td>
                                  <td><?php echo $row['dispute_launcher'];?></td>
                                  <td><?php echo $row['launch_against'];?></td>
                                  <td><?php echo $row['reason'];?></td>
                                  <td><?php echo $row['status'];?></td>
                                  
                                  <td><a href="manage-verification.php?file_id=<?php echo $file['id'] ?>">Download</a></td>
                                  
                                  <td>
                                  <a href="manage-verification.php?uid=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-primary btn-xs"  onClick="return confirm('Do you really want to Verify the transaction?');" ><i class="fa fa-pencil"></i></button></a>
                                  </td>
                                  
                                  <td>
                                     <a href="manage-verification.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                  </td>
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
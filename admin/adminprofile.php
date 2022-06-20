<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$adminid=$_SESSION['trmsaid'];
$AName=$_POST['adminname'];
$mobno=$_POST['mobilenumber'];
$email=$_POST['email'];

  $sql="UPDATE tbladmin SET AdminName=:adminname,MobileNumber=:mobilenumber,Email=:email WHERE ID=:aid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':adminname',$AName,PDO::PARAM_STR);
     $query->bindParam(':email',$email,PDO::PARAM_STR);
     $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
     $query->bindParam(':aid',$adminid,PDO::PARAM_STR);
    $query->execute();
    if($query -> rowCount() > 0)
    {
        echo '<script>alert("Your profile has been updated")</script>';
    }
    else
        {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        
        }
    }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title> Admin Profile</title>
   

    <link rel="apple-touch-icon" href="apple-icon.png">
   


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<style>
      html {
 		 box-sizing: border-box;
		}
    .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  /* margin: 8px; */
}
</style>


</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                    <h2 class="mt-1"><i class="menu-icon bi bi-person-fill text-info"></i><small style="text-transform: uppercase; font-size:12px; font-family: Arial, Helvetica, sans-serif,"> Admin</small></h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="adminprofile.php">Admin Profile</a></li>
                            <li class="active">Update</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                       <!-- .card -->

                    </div>
                    <!--/.col-->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-info"><strong>Admin Information</strong></div>
                            <form name="profile" method="post" action="">
                                
                            <div class="card-body card-block">
                                <?php

                                $sql="SELECT * from  tbladmin";
                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {
                                foreach($results as $row)
                                {               ?>

                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Name</label>
                                    <input type="text" name="adminname" value="<?php  echo $row->AdminName;?>" class="form-control" required='true'>
                                </div>
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Username</label>
                                        <input type="text" name="username" value="<?php  echo $row->UserName;?>" class="form-control" readonly="">
                                    </div>
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Contact Number</label>
                                            <input type="text" name="mobilenumber" value="<?php  echo $row->MobileNumber;?>"  class="form-control" required='true'>
                                        </div>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="city" class=" form-control-label">Email</label>
                                                        <input type="email" name="email" value="<?php  echo $row->Email;?>" class="form-control" required='true'>
                                                    </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="postal-code" class=" form-control-label"> Registration Date</label>
                                                            <input type="text" name="" value="<?php  echo $row->AdminRegdate;?>" readonly="" class="form-control">
                                                        </div>
                                                        </div>
                                                    </div>
                                                    
                                                    </div>
                                                     <?php $cnt=$cnt+1;}} ?>  
                                                     <div class="card-footer">
                                                     <button type="submit" class="btn btn-primary btn-md" name="submit" id="submit" style="border-radius:4px;">
                                                            <i class="bi bi-arrow-repeat"></i> Update
                                                    </button>
                                                        
                                                    </div>
                                                </div>
                                                </form>
                                            </div>



                                           
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
<?php }  ?>
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{

    if((time() - $_SESSION['last_login_timestamp']) > 180) // 900 = 15 * 60  
    {  
         header("location:logout.php");  
    }  
    else  
    {  
         $_SESSION['last_login_timestamp'] = time();  
         $_SESSION["username"];  
         $_SESSION['last_login_timestamp'];  
         
    }


  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title></title>
   

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
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);

            transition: all 0.2s;
        }
        .card:hover {
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
            transform: scale(1.025);
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
                    <h2 class="mt-1"><i class="menu-icon bi bi-journal-arrow-down text-info"> </i> Report</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="bwdates-report-ds.php">Between Dates Reports</a></li>
                            <!-- <li class="active">Reports</li> -->
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
        <form name="bwdatesreport"  action="bwdates-reports-details.php" method="post">
                <div class="card-header bg-info">
                    <span>Between Dates Reports</span>
                    <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit" style="border-radius: 4px;float:right; margin-right:15px;">
                                <i class="bi bi-arrow-repeat"></i> Submit
                    </button>

                </div>
           
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
                            echo $msg;
                            }  ?> </p>

                            <div class="card-body card-block mt-3">

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">From Date</label>
                                    <input type="date" name="fromdate" id="fromdate" class="form-control" required="true">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">To Date</label>
                                    <input type="date" name="todate"  class="form-control" required="true">
                                </div>
                            </div>
                                
                                 
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
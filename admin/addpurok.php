<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {


    $trmsaid=$_SESSION['trmsaid'];
    $puroknumber=$_POST['puroknumber'];
    $purokleader=$_POST['purokleader'];


    $sql="INSERT INTO tblpurok(PurokNumber,PurokLeader)VALUES(:puroknumber,:purokleader)";
    $query=$dbh->prepare($sql);
    $query->bindParam(':puroknumber',$puroknumber,PDO::PARAM_STR);
    $query->bindParam(':purokleader',$purokleader,PDO::PARAM_STR);
    $query->execute();

    $LastInsertId=$dbh->lastInsertId();
    if ($LastInsertId>0) {
        echo '<script>alert("Purok has been added.")</script>';
        echo "<script>window.location.href ='addpurok.php'</script>";
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
   
    <title>Barangay Information System</title>
  

    <link rel="apple-touch-icon" href="apple-icon.png">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



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
                        <h1><i class="fa fa-umbrella"></i> Purok</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-subjects.php">Purok Details</a></li>
                            <li class="active">Add</li>
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
                            <div class="card-header bg-info"><strong>Purok </strong><small> Details</small></div>
                            <form name="" method="post" action="">
                                
                            <div class="card-body card-block">
 
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Purok number</label>
                                    <input type="number" name="puroknumber" value="" class="form-control" id="puroknumber" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Purok Leader</label>
                                    <input type="text" name="purokleader" value="" class="form-control" id="purokleader" required="true">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit" style="border-radius:4px;">
                                    <i class="fa fa-save"></i> Save
                                </button>
                                                    
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
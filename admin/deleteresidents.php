<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{


        if(isset($GET['delete']))
        {

        $stmt = $dbh->prepare('SELECT * FROM tblresidents WHERE ID =:eid');
        $stmt->execute([$_GET['id']]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);


        $eid=$_GET['id'];


        $sql= $dbh->prepare('DELETE FROM  tblresidents  WHERE ID=:eid');
        $query->execute([$_GET['id']]);


        echo '<script>alert("Residents detail has been deleted")</script>';

        }else{

               
            header('Location:');
            
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
                    <h2 class="mt-1"><i class="menu-icon fa fa-users"></i><small style="text-transform: uppercase; font-size:12px; font-family: Arial, Helvetica, sans-serif,"> Residents</small></h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="residents.php">Residents</a></li>
                            <li class="active">Delete</li>
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

                            <div class="card-header bg-info">
                                <span>Residents Details</span>
                                <!-- <button type="submit" class="btn btn-danger btn-sm" name="delete" id="delete" style="border-radius: 4px; float:right; margin-right:15px;"><i class="fa fa-trash"></i> Delete</button> -->
                            </div>
                                
                            <div class="card-body card-block mt-2">
                           
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="street" >Residents ID</label>
                                    <input type="text" value="<?php echo htmlentities($row->ID);?>" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="yesno">
                                <a href="deleteresidents.php?id=<?=$contact['id']?>&confirm=yes" class="btn btn-success" style="border-radius: 4px; margin-right:15px;"><i class="fa fa-trash"></i> Yes</a>
                                <a href="delete.php?id=<?=$contact['id']?>&confirm=no" class="btn btn-secondary" style="border-radius: 4px; margin-right:15px;"> <i class="fa fa-close"></i> No</a>
                            </div>

                          













                                </div>
                                </div>





                                    
                            </div>
                        
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
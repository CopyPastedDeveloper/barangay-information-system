<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$eid=$_GET['editid'];
$puroknumber=$_POST['puroknumber'];
$purokleader=$_POST['purokleader'];

 $sql="UPDATE tblpurok SET PurokNumber=:puroknumber,PurokLeader=:purokleader WHERE ID=:eid";

$query = $dbh->prepare($sql);
$query->bindParam(':puroknumber',$puroknumber,PDO::PARAM_STR);
$query->bindParam(':purokleader',$purokleader,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();

    echo '<script>alert("Purok has been updated")</script>';
  

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
                    <h2 class="mt-1"><i class="menu-icon bi bi-umbrella-fill text-info"></i> Purok</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="puroklist.php"> Purok List</a></li>
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
                    <form name="" method="post" action="">
                            <div class="card-header bg-info">
                                <span>Purok Detail</span>
                                <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit" style="border-radius:4px;float:right; margin-right:15px;">
                                    <i class="bi bi-arrow-repeat"></i> Update
                                </button>
                            </div>
                                
                            <div class="card-body card-block mt-3">

                                <?php
                                $eid=$_GET['editid'];
                                $sql="SELECT * FROM  tblpurok WHERE ID=$eid";
                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {
                                foreach($results as $row)
                                {              
                                ?>

                                <div class="col-6 mb-3">
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Purok number</label>
                                        <input type="text" name="puroknumber" value="<?php  echo $row->PurokNumber;?>" class="form-control" id="puroknumber" required="true">
                                    </div>
                                </div>
                               <div class="col-6 mb-3">
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Purok Leader</label>
                                        <input type="text" name="purokleader" value="<?php  echo $row->PurokLeader;?>" class="form-control" id="purokleader" required="true">
                                    </div>
                               </div>
                            
                                            
                                            
                        </div>
                        <?php $cnt=$cnt+1;}} ?> 
                            
                        
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
<?php }  ?>
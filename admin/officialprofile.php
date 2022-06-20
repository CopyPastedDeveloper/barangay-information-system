<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
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
/* table {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  /* margin: 8px; */
} */
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
                    <h2 class="mt-1"><i class="menu-icon bi bi-person-lines-fill text-info"></i> Official</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="official.php">Official List</a></li>
                            <li class="active">Profile</li>
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
                            <div class="card-header bg-info"><span>Personal Information</span></div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                
                            <div class="card-body card-block">
                                <?php
                                $eid=$_GET['editid'];
                                $sql="SELECT * FROM  tblofficial WHERE ID=$eid";
                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {
                                foreach($results as $row)
                                {         ?>


        <table class="table table-striped table-bordered m-t-10">
                                        
        <tbody>
            <tr>
                <td width="15%" valign="middle" align="center">
                    <p class="mt-2">Photo:</p>
                </td> 
                <td>
                    <img src="images/<?php echo $row->Picture;?>" width="100" height="100" value="<?php  echo $row->Picture;?>">
                </td>
            </tr>
            <tr>
                <td width="15%" align="center">
                    <p class="mt-2">Complete Name:</p>
                </td> 
                <td>
                    <input type="text" name="Rname" value="<?php  echo $row->Name;?>" class="form-control-plaintext" id="Rname" readonly> 
                </td>
            </tr>
            <tr>
                <td width="15%" align="center">
                    <p class="mt-2">Position:</p>
                </td> 
                <td>
                <input type="text" name="position" value="<?php  echo $row->Position;?>" id="position" class="form-control-plaintext" readonly>
                </td>
            </tr>
            <tr>
                <td width="15%" align="center">
                    <p class="mt-2">Chairmanship:</p>
                </td>
                 <td>
                 <input type="text" name="chairmanship" id="chairmanship" value="<?php  echo $row->Chairmanship;?>" class="form-control-plaintext" readonly >
                    </td>
                </tr>
            <tr>
                <td width="15%" align="center">
                     <p class="mt-2">Status:</p>
                </td> 
                <td>
                <input type="text" name="status" id="status" value="<?php  echo $row->Status;?>" class="form-control-plaintext" readonly>
                </td>
            </tr>
            <tr>
                <td width="15%" align="center">
                    <p class="mt-2">Term Start:</p>
                </td>
                 <td>
                 <input type="date" name="termstart" value="<?php  echo $row->TermStart;?>" id="termstart" class="form-control-plaintext" readonly>
                    </td>
                </tr>
                <tr>
                <td width="15%" align="center">
                    <p class="mt-2">Term End:</p>
                </td>
                 <td>
                 <input type="date" name="termend" value="<?php  echo $row->TermEnd;?>" id="termend" class="form-control-plaintext" readonly>
                    </td>
                </tr>
        
        </tbody>
        </table>
                            
                                





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
</body>
</html>
<?php }  ?>
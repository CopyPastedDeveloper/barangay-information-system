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
                    <h2 class="mt-1"><i class="bi bi-people-fill text-info"></i>  Residents</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-teacher.php">Residents List</a></li>
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
                                $sql="SELECT * from  tblresidents where ID=$eid";
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
                    <p class="mt-2">Civil Status:</p>
                </td> 
                <td>
                <input type="text" name="civilstatus" value="<?php  echo $row->Civilstatus;?>" id="civilstatus" class="form-control-plaintext" readonly>
                </td>
            </tr>
            <tr>
                <td width="15%" align="center">
                    <p class="mt-2">Religion:</p>
                </td>
                 <td>
                 <input type="text" name="religion" id="religion" value="<?php  echo $row->Religion;?>" class="form-control-plaintext" readonly >
                    </td>
                </tr>
            <tr>
                <td width="15%" align="center">
                     <p class="mt-2">Age:</p>
                </td> 
                <td>
                <input type="text" name="age" id="age" value="<?php  echo $row->Age;?>" class="form-control-plaintext" readonly>
                </td>
            </tr>
            <tr>
                <td width="15%" align="center">
                    <p class="mt-2">Birth Date:</p>
                </td>
                 <td>
                 <input type="date" name="birthdate" value="<?php  echo $row->Birthdate;?>" id="birthdate" class="form-control-plaintext" readonly>
                    </td>
                </tr>
            <tr>
                <td width="15%" align="center">
                     <p class="mt-2">Birth Place:</p>
                </td> 
                  <td>
                  <input type="text" name="birthplace" id="birthplace" value="<?php  echo $row->Birthplace;?>" class="form-control-plaintext" readonly>
                    </td>
                </tr>
            <tr>
                <td width="15%" align="center">
                     <p class="mt-2">Citizenship:</p>
                </td> 
                  <td>
                  <input type="text" name="citizenship" id="citizenship" value="<?php  echo $row->Citizenship;?>" class="form-control-plaintext"  readonly>
                    </td>
                </tr>
            <tr>
                <td width="15%" align="center">
                    <p class="mt-2">Gender:</p>
                </td> 
                  <td>
                  <input type="text" name="gender" id="gender" value="<?php  echo $row->Gender;?>" class="form-control-plaintext" readonly>
                  </td>
            </tr>
            <tr>
                <td width="15%" align="center">
                     <p class="mt-2">Household:</p>
                </td> 
                  <td>
                  <input type="text" name="household" id="household" value="<?php  echo $row->Household;?>" class="form-control-plaintext" readonly>
                  </td>
            </tr>
            <tr>
                <td width="15%" align="center">
                      <p class="mt-2">Purok:</p>
                </td> 
                  <td>
                  <input type="text" name="puroknumber" id="puroknumber" value="<?php  echo $row->Purok;?>" class="form-control-plaintext" readonly>
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
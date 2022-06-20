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
$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$puroknumber=$_POST['puroknumber'];
$purpose=$_POST['purpose'];
$prepared_by=$_POST['prepared_by'];
$certified_by=$_POST['certified_by'];
$date_issued=$_POST['date_issued'];


 $sql="UPDATE tblbarangayindigency SET Name=:name, Age=:age, Gender=:gender, PurokNumber=:puroknumber, Purpose=:purpose, Prepared_By=:prepared_by, Certified_By=:certified_by,Date_Issued=:date_issued WHERE ID=:eid";

$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':puroknumber',$puroknumber,PDO::PARAM_STR);
$query->bindParam(':purpose',$purpose,PDO::PARAM_STR);
$query->bindParam(':prepared_by',$prepared_by,PDO::PARAM_STR);
$query->bindParam(':certified_by',$certified_by,PDO::PARAM_STR);
$query->bindParam(':date_issued',$date_issued,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();

    echo '<script>alert("Indigency Clearance has been updated")</script>';

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
                    <h2 class="mt-1"><i class="menu-icon bi bi-award text-info"></i> Brgy Certificate</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-subjects.php">Barangay Certificate</a></li>
                            <li class="active">Barangay Indigency</li>
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
                                <span>Barangay Indigency</span>
                                <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit" style="border-radius:4px; float:right; margin-right:15px;">
                                    <i class="bi bi-arrow-repeat"></i> Update
                                </button> 
                            </div>   
                            <div class="card-body card-block mt-3">
                                    <?php
                                    $eid=$_GET['editid'];
                                    $sql="SELECT * FROM  tblbarangayindigency WHERE ID=$eid";
                                    $query = $dbh -> prepare($sql);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $row)
                                    {        
                                    ?>
        <div class="col-6 mb-2">
            <div class="form-group">
                <label for="company" class=" form-control-label">Name</label>
                <input type="text" name="name" value="<?php  echo $row->Name;?>" class="form-control" id="name" required="true">
            </div>
        </div>
        <div class="col-6 mb-2">
             <div class="form-group">
                <label for="company" class=" form-control-label">Age</label>
                <input type="text" name="age" value="<?php  echo $row->Age;?>" class="form-control" id="age" required="true">
            </div>
        </div>
        <div class="col-6 mb-2">
        <div class="form-group">
                <label for="city" class=" form-control-label">Purok Number</label>
                <select type="text" name="puroknumber" id="puroknumber" value="" class="form-control" required="true">

                <option value="<?php  echo $row->PurokNumber;?>"><?php  echo $row->PurokNumber;?></option>
                <?php 
                $sql2 = "SELECT * from   tblpurok";
                $query2 = $dbh ->prepare($sql2);
                $query2->execute();
                $result2=$query2->fetchAll(PDO::FETCH_OBJ);
                foreach($result2 as $row1)
                {          
                ?>  
                <option value="<?php echo htmlentities($row1->PurokNumber);?>"><?php echo htmlentities($row1->PurokNumber);?></option>
                <?php } ?> 
                </select>
            </div>
        </div>
        <div class="col-6 mb-2">
             <div class="form-group">
                <label for="company" class=" form-control-label">Purpose</label>
                <input type="text" name="purpose" value="<?php  echo $row->Purpose;?>" class="form-control" id="purpose" required="true">
            </div>
        </div>                  
        <div class="col-6">
            <div class="form-group">
                <label for="" class="form-control-label">Gender:</label>
                <select type="text" name="gender" id="gender" class="form-control" required="true">
                    <option value="Male" <?php echo($row->Gender == "Male")? 'selected' :'';?> >Male</option>
                    <option value="Female" <?php echo($row->Gender == "Female")? 'selected' :'';?> >Female</option>
                </select>
            </div>
        </div>
        <div class="col-6 mb-3">
             <div class="form-group">
                <label for="company" class=" form-control-label">Prepared By</label>
                <input type="text" name="prepared_by" value="<?php  echo $row->Prepared_By;?>" class="form-control" id="prepared_by" required="true">
            </div>
        </div>
        <div class="col-6 mb-3">
             <div class="form-group">
                <label for="company" class=" form-control-label">Certified By</label>
                <input type="text" name="certified_by" value="<?php  echo $row->Certified_By;?>" class="form-control" id="certified_by" required="true">
            </div>
        </div>                          
        <div class="col-6 mb-3">
             <div class="form-group">
                <label for="company" class=" form-control-label">Date Issue</label>
                <input type="date" name="date_issued" value="<?php  echo $row->Date_Issued;?>" class="form-control" id="date_issued" readonly>
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
</body>
</html>
<?php }  ?>
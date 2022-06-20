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
$officialname=$_POST['officialname'];
$position=$_POST['position'];
$chairmanship=$_POST['chairmanship'];
$status=$_POST['status'];
$contactnumber=$_POST['contactnumber'];
$termstart=$_POST['termstart'];
$termend=$_POST['termend'];


 $sql="UPDATE tblofficial SET Name=:officialname,Position=:position,Chairmanship=:chairmanship,Status=:status,ContactNumber=:contactnumber, TermStart=:termstart,TermEnd=:termend WHERE ID=:eid";

$query = $dbh->prepare($sql);
$query->bindParam(':officialname',$officialname,PDO::PARAM_STR);
$query->bindParam(':position',$position,PDO::PARAM_STR);
$query->bindParam(':chairmanship',$chairmanship,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':contactnumber',$contactnumber,PDO::PARAM_STR);
$query->bindParam(':termstart',$termstart,PDO::PARAM_STR);
$query->bindParam(':termend',$termend,PDO::PARAM_STR);

$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();

    echo '<script>alert("Official detail has been updated")</script>';

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
                    <h2 class="mt-1"><i class="menu-icon bi bi-person-lines-fill text-info"></i> Official</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-teacher.php">Official List</a></li>
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
                    <form name="" method="post" action="" enctype="multipart/form-data">
                            <div class="card-header bg-info">
                                <span>Official Details</span>
                                <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit" style="border-radius: 4px; float:right; margin-right:15px;"><i class="bi bi-arrow-repeat"></i> Update</button>
                            </div>
                                
                            <div class="card-body card-block mt-2">
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

<div class="col-4">
    <div class="form-group">
    <img src="images/<?php echo $row->Picture;?>" width="100" height="100" value="<?php  echo $row->Picture;?>"><br><br>
    <label for="company" class=" form-control-label">Official photo</label><br>
    <a href="officialchangeimage.php?editid=<?php echo $row->ID;?>" class="btn btn-info btn-sm" style="border-radius:4px;" > &nbsp;Change Image</a>
    </div>

</div>
<div class="col-4">
<div class="form-group">
<label for="company" class=" form-control-label">Name</label>
<input type="text" name="officialname" value="<?php  echo $row->Name;?>" class="form-control" id="officialname" required="true">
</div>

</div>
<div class="col-4">
<div class="row form-group">
<div class="col-12">
<div class="form-group">
    <label for="city" class=" form-control-label">Position</label>
    <select type="text" name="position" id="position" value="" class="form-control" required="true">

<option value="<?php  echo $row->Position;?>"><?php  echo $row->Position;?></option>
<?php 
$sql2 = "SELECT * FROM tblposition   ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);
foreach($result2 as $row1)
{          
?>  
<option value="<?php echo htmlentities($row1->Position);?>"><?php echo htmlentities($row1->Position);?></option>
 <?php } ?> 

</select>
</div>
</div>
 </div>

</div>
<div class="col-4">
<div class="row form-group">
<div class="col-12">
<div class="form-group">
    <label for="city" class=" form-control-label">Chairmanship</label>
    <select type="text" name="chairmanship" id="chairmanship" value="" class="form-control" required="true">

<option value="<?php  echo $row->Chairmanship;?>"><?php  echo $row->Chairmanship;?></option>
<?php 
$sql2 = "SELECT * from   tblchairmanship ";
$query2 = $dbh ->prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);
foreach($result2 as $row1)
{          
?>  
<option value="<?php echo htmlentities($row1->Chairmanship);?>"><?php echo htmlentities($row1->Chairmanship);?></option>
 <?php } ?> 
</select>
</div>
</div>
 </div>

</div>
<div class="col-4">
<div class="row form-group">
        <div class="col-12">
        <div class="form-group">
            <label for="city" class=" form-control-label">Status:</label>
            <select type="text" name="status" id="status" value="" class="form-control" required="true">
            <option value="Active" <?php echo($row->Status == "Active")? 'selected' :'';?> >Active</option>
            <option value="Inactive" <?php echo($row->Status == "Inactive")? 'selected' :'';?> >Inactive</option>
            </select>
        </div>
    </div>
</div>

</div>

<div class="col-4">
    
<div class="row form-group">
<div class="col-12">
<div class="form-group">
    <label for="city" class=" form-control-label">Phone Number</label>
    <input type="text" name="contactnumber" id="contactnumber" value="<?php  echo $row->ContactNumber;?>" class="form-control"  required="true">
</div>
</div>
</div>

</div>

<div class="col-4">
    
<div class="row form-group">
<div class="col-12">
<div class="form-group">
    <label for="city" class=" form-control-label">Term Start</label>
    <input type="date" name="termstart" id="termstart" value="<?php  echo $row->TermStart;?>" class="form-control"  required="true">
</div>
</div>
</div>

</div>
<div class="col-4">
    
<div class="row form-group">
<div class="col-12">
<div class="form-group">
    <label for="city" class=" form-control-label">Term End</label>
    <input type="date" name="termend" id="termend" value="<?php  echo $row->TermEnd;?>" class="form-control"  required="true">
</div>
</div>
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
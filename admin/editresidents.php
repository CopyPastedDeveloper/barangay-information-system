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
$Rname=$_POST['Rname'];
$birthdate=$_POST['birthdate'];
$age=$_POST['age'];
$citizenship=$_POST['citizenship'];
$gender=$_POST['gender'];
$household=$_POST['household'];
$puroknumber=$_POST['puroknumber'];
$birthplace=$_POST['birthplace'];
$religion=$_POST['religion'];
$civilstatus=$_POST['civilstatus'];

 $sql="UPDATE tblresidents SET Name=:Rname,Birthdate=:birthdate,Age=:age,Gender=:gender,Citizenship=:citizenship,Household= :household,Purok=:puroknumber,Birthplace=:birthplace,Religion=:religion,Civilstatus=:civilstatus WHERE ID=:eid";

$query = $dbh->prepare($sql);
$query->bindParam(':Rname',$Rname,PDO::PARAM_STR);
$query->bindParam(':birthdate',$birthdate,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':citizenship',$citizenship,PDO::PARAM_STR);
$query->bindParam(':household',$household,PDO::PARAM_STR);
$query->bindParam(':puroknumber',$puroknumber,PDO::PARAM_STR);
$query->bindParam(':birthplace',$birthplace,PDO::PARAM_STR);
$query->bindParam(':religion',$religion,PDO::PARAM_STR);
$query->bindParam(':civilstatus',$civilstatus,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
    $query->execute();

    echo '<script>alert("Residents detail has been updated")</script>';

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
                    <h2 class="mt-1"><i class="bi bi-people-fill text-info"></i>  Residents</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="residents.php">Residents</a></li>
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
                                <span>Residents Details</span>
                                <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit" style="border-radius: 4px; float:right; margin-right:15px;"><i class="bi bi-arrow-repeat"></i> Update</button>
                            </div>
                                
                            <div class="card-body card-block mt-2">
                                <?php
                                $eid=$_GET['editid'];
                                $sql="SELECT * FROM  tblresidents WHERE ID=$eid";
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
        <img src="images/<?php echo $row->Picture;?>" width="100" height="100" value="<?php  echo $row->Picture;?>"><br>
        <label for="company" class=" form-control-label">Residents photo</label><br>
        <a href="changeimage.php?editid=<?php echo $row->ID;?>" class="btn btn-info btn-sm" style="border-radius:4px;" > &nbsp;Change Image</a>
    </div>
</div>
<div class="col-4">
    <div class="form-group">
        <label for="company" class=" form-control-label">Name</label>
        <input type="text" name="Rname" value="<?php  echo $row->Name;?>" class="form-control" id="Rname" required="true">
    </div>
</div>
<div class="col-4">
    <div class="form-group">
        <label for="street" class=" form-control-label">Birthdate</label>
        <input type="date" name="birthdate" value="<?php  echo $row->Birthdate;?>" id="birthdate" class="form-control" required="true">
    </div>
</div>
<div class="col-4">
    <div class="row form-group">
        <div class="col-12">
            <div class="form-group">
                <label for="city" class=" form-control-label">Gender:</label>
                <select type="text" name="gender" id="gender" class="form-control" required="true">
                    <option value="Male" <?php echo($row->Gender == "Male")? 'selected' :'';?> >Male</option>
                    <option value="Female" <?php echo($row->Gender == "Female")? 'selected' :'';?> >Female</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="col-4">
    <div class="row form-group">
        <div class="col-12">
            <div class="form-group">
                <label for="city" class=" form-control-label">Age:</label>
                <input type="text" name="age" id="age" value="<?php  echo $row->Age;?>" class="form-control" required="true" maxlength="10" pattern="[0-9]+">
            </div>
        </div>
    </div>
</div>
<div class="col-4">
    <div class="row form-group">
        <div class="col-12">
            <div class="form-group">
                <label for="city" class=" form-control-label">Household</label>
                <select type="text" name="household" id="household" value="" class="form-control" required="true">

                <option value="<?php  echo $row->Household;?>"><?php  echo $row->Household;?></option>
                <?php 
                $sql2 = "SELECT * from   tblhousehold ";
                $query2 = $dbh -> prepare($sql2);
                $query2->execute();
                $result2=$query2->fetchAll(PDO::FETCH_OBJ);
                foreach($result2 as $row1)
                {          
                ?>  
                <option value="<?php echo htmlentities($row1->Householdnumber);?>"><?php echo htmlentities($row1->Householdnumber);?></option>
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
                <label for="city" class=" form-control-label">Purok Number</label>
                <select type="text" name="puroknumber" id="puroknumber" value="" class="form-control" required="true">

                <option value="<?php  echo $row->Purok;?>"><?php  echo $row->Purok;?></option>
                <?php 
                $sql2 = "SELECT * from   tblpurok ";
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
    </div>
</div>
<div class="col-4">
    <div class="row form-group">
        <div class="col-12">
            <div class="form-group">
                <label for="city" class=" form-control-label">Citizenship</label>
                <input type="text" name="citizenship" id="citizenship" value="<?php  echo $row->Citizenship;?>" class="form-control"  required="true">
            </div>
        </div>
    </div>
</div>
<div class="col-4">
    <div class="row form-group">
        <div class="col-12">
            <div class="form-group">
                <label for="city" class=" form-control-label">Birthplace</label>
                <input type="text" name="birthplace" id="birthplace" value="<?php  echo $row->Birthplace;?>" class="form-control" required="true">
            </div>
        </div>
    </div>
</div>
<div class="col-4">
    <div class="col-12">
        <div class="row form-group">
            <label for="city" class=" form-control-label">Religion:</label>
            <input type="text" name="religion" id="religion" value="<?php  echo $row->Religion;?>" class="form-control" required="true" >
        </div>
    </div>

</div>
<div class="col-4">
        <div class="row form-group">
          <div class="col-12">
              <div class="form-group">
                <label for="city" class=" form-control-label">Civil Status:</label>
                <select type="text" name="civilstatus" id="civilstatus" value="" class="form-control" required="true">
                <option value="Single" <?php echo($row->Civilstatus == "Single")? 'selected' :'';?> >Single</option>
                <option value="Married" <?php echo($row->Civilstatus == "Married")? 'selected' :'';?> >Married</option>
                </select>
              </div>
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
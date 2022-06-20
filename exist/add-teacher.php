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
$propic=$_FILES["propic"]["name"];
$extension = substr($propic,strlen($propic)-4,strlen($propic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Profile Pics has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$propic=md5($propic).time().$extension;
 move_uploaded_file($_FILES["propic"]["tmp_name"],"images/".$propic);
$sql="INSERT INTO tblresidents(Name,Picture,Birthdate,Age,Gender,Citizenship,Household,Purok,Birthplace,Religion,Civilstatus)VALUES(:Rname,:tpics,:birthdate,:age,:gender,:citizenship,:household,:puroknumber,:birthplace,:religion,:civilstatus)";
$query=$dbh->prepare($sql);
$query->bindParam(':Rname',$Rname,PDO::PARAM_STR);
$query->bindParam(':tpics',$propic,PDO::PARAM_STR);
$query->bindParam(':birthdate',$birthdate,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':citizenship',$citizenship,PDO::PARAM_STR);
$query->bindParam(':household',$household,PDO::PARAM_STR);
$query->bindParam(':puroknumber',$puroknumber,PDO::PARAM_STR);
$query->bindParam(':birthplace',$birthplace,PDO::PARAM_STR);
$query->bindParam(':religion',$religion,PDO::PARAM_STR);
$query->bindParam(':civilstatus',$civilstatus,PDO::PARAM_STR);
$query->execute();

$LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {

    echo '<script>alert("Residents Detail has been added.")</script>';

    echo "<script>window.location.href ='add-teacher.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Barangay Trinidad Information System</title>
  

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
                        <h1><i class="menu-icon fa fa-users"></i> Residents</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-teacher.php">Residents Details</a></li>
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
                            <div class="card-header bg-info"><strong>Add Resident </strong></div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                
                            <div class="card-body card-block">

                                <div class="col-6">
                                     <div class="form-group">
                                         <label for="company" class=" form-control-label">Name:</label>
                                         <input type="text" name="Rname" value="" class="form-control" id="Rname" required="true">
                                         <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                     </div>
                                </div>

                                <div class="col-6">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Profile picture</label>
                                    <input type="file" name="propic" value="" class="form-control" id="propic">
                                </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="street" class=" form-control-label">Birthdate</label>
                                        <input type="date" name="birthdate" value="" id="birthdate" class="form-control" required="true">
                                    </div>
                                </div>

                                <div class="col-6">
                                     <div class="form-group">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Gender:</label>
                                            <select type="text" name="gender" id="gender" value="" class="form-control" required="true">
                                                <option></option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                     <div class="form-group">
                                            <label for="city" class=" form-control-label">Age:</label>
                                            <input type="number" name="age" id="age" value="" class="form-control" required="true" maxlength="10" pattern="[0-9]+">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="city" class=" form-control-label">Household number</label>
                                        <select type="text" name="household" id="household" value="" class="form-control" required="true">
                                        <option value=""></option>
                                        <?php 

                                        $sql2 = "SELECT * from   tblhousehold ";
                                        $query2 = $dbh -> prepare($sql2);
                                        $query2->execute();
                                        $result2=$query2->fetchAll(PDO::FETCH_OBJ);

                                        foreach($result2 as $row)
                                        {          
                                            ?>  
                                        <option value="<?php echo htmlentities($row->Householdnumber);?>"><?php echo htmlentities($row->Householdnumber);?></option>
                                        <?php } ?> 
                                                    
                                    </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="city" class=" form-control-label">Purok number</label>
                                        <select type="text" name="puroknumber" id="puroknumber" value="" class="form-control" required="true">
                                        <option value=""></option>
                                        <?php 

                                        $sql2 = "SELECT * from   tblpurok ";
                                        $query2 = $dbh -> prepare($sql2);
                                        $query2->execute();
                                        $result2=$query2->fetchAll(PDO::FETCH_OBJ);

                                        foreach($result2 as $row)
                                        {          
                                            ?>  
                                        <option value="<?php echo htmlentities($row->PurokNumber);?>"><?php echo htmlentities($row->PurokNumber);?></option>
                                        <?php } ?> 
                                                    
                                    </select>
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                    <label for="city" class=" form-control-label">Citizenship</label>
                                    <input type="text" name="citizenship" id="citizenship" value="" class="form-control" rows="" cols="12" required="true">
                                    </div>
                                </div>
                                <div class="col-6">
                                     <div class="form-group">
                                        <label for="city" class=" form-control-label">Birthplace</label>
                                        <input type="text" name="birthplace" id="birthplace" value="" class="form-control" required="true">
                                     </div>
                                </div>
                                <div class="col-6">
                                     <div class="form-group">
                                        <label for="city" class=" form-control-label">Religion</label>
                                        <input type="text" name="religion" id="religion" value="" class="form-control" required="true">
                                     </div>
                                </div>
                                
                                <div class="col-6">
                                     <div class="form-group">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Civil Status:</label>
                                            <select type="text" name="civilstatus" id="civilstatus" value="" class="form-control" required="true">
                                                <option></option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                    
                            
                                
                            
                                 <button type="submit" class="btn btn-primary btn-md" name="submit" id="submit" style="border-radius: 4px;">
                                    <i class="fa fa-save"></i>  Save
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
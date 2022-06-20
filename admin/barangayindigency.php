<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{

  if(isset($_POST['submit'])){
  

  $name=$_POST['name'];
  $age=$_POST['age'];
  $gender=$_POST['gender'];
  $purok=$_POST['purok'];
  $purpose=$_POST['purpose'];
  $prepared_by=$_POST['prepared_by'];
  $certified_by=$_POST['certified_by'];
  $date_issued=$_POST['date_issued'];
  
  
  $sql="INSERT INTO tblbarangayindigency (Name, Age, Gender, PurokNumber, Purpose, Prepared_By, Certified_By, Date_Issued)VALUES(:name,:age, :gender,:purok, :purpose, :prepared_by, :certified_by, :date_issued)";
  $query=$dbh->prepare($sql);

//   $query->bindParam(':id',$id,PDO::PARAM_STR);
  $query->bindParam(':name',$name,PDO::PARAM_STR);
  $query->bindParam(':age',$age,PDO::PARAM_STR);
  $query->bindParam(':gender',$gender,PDO::PARAM_STR);
  $query->bindParam(':purok',$purok,PDO::PARAM_STR);
  $query->bindParam(':purpose',$purpose,PDO::PARAM_STR);
  $query->bindParam(':prepared_by',$prepared_by,PDO::PARAM_STR);
  $query->bindParam(':certified_by',$certified_by,PDO::PARAM_STR);
  $query->bindParam(':date_issued',$date_issued,PDO::PARAM_STR);

  //Check Position exist
  $chk = $dbh->prepare("SELECT  FROM tblbarangayindigency WHERE Date_Issued = :date_issued");
  $chk->bindParam(':date_issued', $date_issued);

  $chk->execute();

  if($chk->rowCount() > 0):

    echo '<script>alert("Clearance already exist !. Please try again")</script>';
    else:

      if( $query->execute() ):

        echo '<script>alert("Clearance has been added.")</script>';
       
          endif; 
      endif;

  }else{

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
    body{
        background-color:rgba(189, 195, 199,1.0);
        margin: 0%;
        padding: 0%;
    }
    .card {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);

            transition: all 0.2s;
        }
        .card:hover {
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
            transform: scale(1.02);
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
                            <li><a href="manage-subjects.php"> Barangay Certificates</a></li>
                            <li class="active">Barangay Indigency</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4>Barangay Certificate</h4>

                            </div>
                            <div class="card-body">
                        <div class="container">
  
            <!-- Nav pills -->
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#home"><i class="bi bi-plus-circle"></i> New Barangay Indigency</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#menu1"><i class="bi bi-journal-richtext"></i> Barangay Indigency Records</a>
                </li>
            </ul>
         <hr>
        <!-- Tab panes -->
        <div class="tab-content mt-3">
            <div id="home" class="container tab-pane active">
            <form name="" method="post" action="">            
                <div class="col-4">
                    <div class="form-group">
                        <label for="city" class=" form-control-label">Name</label>
                        <select type="text" name="name" id="name" value="" class="form-control" required="true">
                        <option value=""></option>
                        <?php 

                        $sql2 = "SELECT * from   tblresidents ";
                        $query2 = $dbh -> prepare($sql2);
                        $query2->execute();
                        $result2=$query2->fetchAll(PDO::FETCH_OBJ);

                        foreach($result2 as $row)
                        {          
                            ?>  
                        <option value="<?php echo htmlentities($row->Name);?>"><?php echo htmlentities($row->Name);?></option>
                        <?php } ?> 
                                    
                    </select>
                    </div>
                </div>                     
                <div class="col-4">
                    <div class="form-group">
                        <label for="company" class=" form-control-label">Age</label>
                        <input type="number" name="age" value="" class="form-control" id="age" required="true">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="city" class=" form-control-label">Purok</label>
                        <select type="text" name="purok" id="purok" value="" class="form-control" required="true">
                        <option value=""></option>
                        <?php 

                        $sql2 = "SELECT * from  tblpurok";
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
                <div class="col-4">
                    <div class="form-group">
                        <label for="company" class=" form-control-label">Purpose</label>
                        <input type="text" name="purpose" value="" class="form-control" id="purpose" placeholder="specify purpose" required="true">
                    </div>
                </div>
                <div class="col-4">
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
                <div class="col-4">
                    <div class="form-group">
                        <label for="company" class=" form-control-label">Prepared by:</label>
                        <input type="text" name="prepared_by" value="" class="form-control" id="prepared_by" placeholder="" required="true">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="company" class=" form-control-label">Certified by:</label>
                        <input type="text" name="certified_by" value="" class="form-control" id="certified_by" placeholder="Brgy Captain name" required="true">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="company" class=" form-control-label">Date Issue</label>
                        <input type="date" name="date_issued" value="" class="form-control" id="date_issued" required="true">
                    </div>
                </div>
                <div class="col-4" style="margin-top: 32px;">
                    <button type="submit" class="btn btn-primary btn-block" name="submit" id="submit" style="border-radius:4px;">
                    <i class="bi bi-save"></i> Continue to Save
                    </button>
                </div>              

        </form>
    </div>

         <!-- Clearance Records Section Start-->

                            <div id="menu1" class="container-fluid tab-pane fade">

                                <form action="searchindigency.php" name="search" method="post"  >
                                    <div class="input-group col-6 float-right mb-2">
                                            <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Search:">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit" id="submit" name="search" style="border-radius: 4px; width:80px;"><span class="bi bi-search"></span></button>
                                            </div>
                                        </div>
                                        <div class="float-left text-info"><span>Barangay Indigency List Records</span></div>                       
                                </form>   

                            <table class="table table-hover table-striped">
                                    <thead class="bg-info">
                                        <tr>
                                          
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Purpose</th>
                                        <!-- <th>Prepared by</th> -->
                                        <th>Certified by</th>
                                        <th>Date Issued</th>       
                                        <th colspan="2" >Action</th>
                                        </tr>
                                     
                                        </thead>
                                    <?php
                                    $sql="SELECT * FROM tblbarangayindigency LIMIT 5";
                                    $query = $dbh -> prepare($sql);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);


                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $row)
                                    {               ?>   
              
                         <tr>
                            <td><?php echo htmlentities($row->ID);?></td>
                        
                            <td><?php  echo htmlentities($row->Name);?></td>
                            <td><?php  echo htmlentities($row->Purpose);?></td>
                            <!-- <td><?php  echo htmlentities($row->Prepared_By);?></td> -->
                            <td><?php  echo htmlentities($row->Certified_By);?></td>
                            <td><?php  echo htmlentities($row->Date_Issued);?></td>

                            <td><a href="issueindigency.php?editid=<?php echo htmlentities ($row->ID);?>" class="btn btn-info btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Issue Indigency" style="border-radius: 4px;"><span class="bi bi-file-earmark-word"></span> </a></td>                    
                            <td><a href="editindigency.php?editid=<?php echo htmlentities ($row->ID);?>" class="btn btn-success btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Edit" style="border-radius: 4px;"><span class="bi bi-pencil-square"></span> </a></td>
                            <!-- <td><a href="household.php?del=<?php echo htmlentities($row->ID);?>"><button class="btn btn-danger btn-sm" style="border-radius: 4px;" onClick="return confirm('Do you really want to delete');"><span class="bi bi-trash-fill"></span> Delete</button></a></td> -->
                            </tr>
                        <?php $cnt=$cnt+1;}} ?>   

                                </table>
                                </div>
                            
                        </div>
                        </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

<!-- 
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <script src="assets/js/main.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>

        $(document).ready(function() {
             $('#dtBasicExample').DataTable({
                responsive: true
             });

        } );
        $(document).ready(function(){

            $('[data-toggle="tooltip"]').tooltip();   
        });

    </script>


</body>

</html>
<?php }  ?>
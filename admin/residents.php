<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit'])){

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
 
//Check Residents exist
  $chk = $dbh->prepare("SELECT Name FROM tblresidents WHERE Name =  :Rname");
  $chk->bindParam(':Rname', $Rname);

  $chk->execute();

  if($chk->rowCount() > 0):
    echo '<script>alert("Residents already exist !. Please try again")</script>';

    else:
      if( $query->execute() ):
        echo '<script>alert("Residents Detail has been added.")</script>';

          else:
            $message = 'Sorry there must have been an issue creating residents';
          endif; 
      endif;


    }

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

        <?php 

        // Code for record deletion
        if(isset($_REQUEST['del']))
        {
        //Get row id
        $rid=intval($_GET['del']);
        //Qyery for deletion
        $sql = "DELETE FROM tblresidents WHERE  ID=:id";
        // Prepare query for execution
        $query = $dbh->prepare($sql);
        // bind the parameters
        $query-> bindParam(':id',$rid, PDO::PARAM_STR);
        // Query Execution
        $query -> execute();

        unlink("images/".$propic);
        // Mesage after updation
        echo "<script>alert('Record deleted successfully');</script>";
        // Code for redirection
        echo "<script>window.location.href='residents.php'</script>"; 
        }
        
        
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title></title>
    
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/keytable/2.6.2/css/keyTable.dataTables.min.css"> -->

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
                            <li><a href="manage-teacher.php">Residents</a></li>
                            <!-- <li class="active">Residents List</li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info">
                            <!-- <strong class="card-title">Residents list</strong> -->
                            <form action="search.php" name="search" method="post"  >
                                    <div class="input-group col-4 float-right">
                                        <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Search:">
                                          <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" id="submit" name="search" style="border-radius: 4px;"><i class="bi bi-search"></i></button>
                                          </div>
                                      </div>
                                     
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary btn-md float-left" data-toggle="modal" data-target="#myModal" style="border-radius: 4px;"><span class="bi bi-plus-circle"></span>
                                        Residents
                                    </button>
                            </form>
                            <form action="residentspdflist.php" method="POST" target="_blank">
                                <button type="submit" name="residentspdf" class="btn btn-warning btn-md float-left mt-0" data-toggle="modal" data-target="#" style="border-radius: 4px; margin-left:20px"><span class="bi bi-download"></span>
                                            Export PDF
                                        </button>
                                </form>
                                <!-- <div class="col-3 float-right">
                                        <div class="form-group">
                                            <select type="text" name="" id="" value="" class="form-control" required="true">
                                            <option value="">Sort by name</option>
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
                                    </div> -->
                                
                            </div>
                            <div class="card-body">
                                <table id="dtBasicExample" class="table table-hover table-striped">
                                    <thead class="bg-info">
                                        <tr>
                                            <tr>
                                                <th>#</th>
                                                    <th>Picture</th>
                                                <th>Residents Name</th>
                                                <th>Household</th>
                                                <th>Purok</th>
                                                    <th>Registration Date</th>       
                                                <th colspan="3">Action</th>
                                                </tr>
                                        </tr>
                                        </thead>
                                    <?php
                                     
                                        $sql="SELECT * FROM tblresidents LIMIT 5";
                                        $query = $dbh-> prepare($sql);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);

                                        // $cnt=1;
                                        if($query->rowCount() > 0)
                                        {
                                        foreach($results as $row)
                                        {               ?>   
                                                                            
                                        <tr>
                                        <td><?php echo htmlentities($row->ID);?></td>
                                        <td><img src="images/<?php echo $row->Picture;?>" width="30" height="30" style="border-radius: 100%;" value="<?php  echo $row->Picture;?>"></td>
                                        <td><?php  echo htmlentities($row->Name);?></td>
                                        <td><?php  echo htmlentities($row->Household);?></td>
                                        <td><?php  echo htmlentities($row->Purok);?></td>
                                        <td><?php  echo htmlentities($row->RegDate);?></td>

                                        <td><a href="residentsprofile.php?editid=<?php echo htmlentities ($row->ID);?>"><button class="btn btn-primary btn-sm shadow" data-toggle="tooltip" data-placement="top" title="View Profile" style="border-radius: 4px;"><span class="bi bi-file-earmark-person-fill" ></span></button></a></td>
                                        <td><a href="editresidents.php?editid=<?php echo htmlentities ($row->ID);?>"><button class="btn btn-success btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Edit" style="border-radius: 4px;"><span class="bi bi-pencil-square"></span></button></a></td>
                                        <td><a href="residents.php?del=<?php echo htmlentities($row->ID);?>"><button class="btn btn-danger btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Delete" style="border-radius: 4px;" onClick="return confirm('Do you really want to delete');"><span class="bi bi-trash-fill"></span></button></a></td>
                                    
                                       
                                        
                                        
                                        </tr>
                                    <?php $cnt=$cnt+1;}} ?>   


                                </table>

                            </div>
                         
                        
                        </div>
                    </div>
                    </div>
            </div>
                </div>
            </div><!-- .animated -->

        <!-- Add residents Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-info">
          <h6 class="modal-title">New Residents</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
    <div class="modal-body">
        <form name="" method="post" action="" enctype="multipart/form-data">
                    
                    <div class="card-body card-block">
                                <div class="col-6">
                                    <div class="form-group">
                                        <!-- <label for="company" class=" form-control-label">Profile picture</label> -->
                                        <img src="images/<?php echo $row->Picture;?>" width="100" height="100" value="<?php  echo $row->Picture;?>">
                                        <input type="file" name="propic" value="" id="propic">
                                    </div>
                                </div>
                                <div class="col-6">
                                         <div class="form-group">
                                             <label for="company" class=" form-control-label">Fullname:</label>
                                             <input type="text" name="Rname" value="" class="form-control" id="Rname"  required="true">
                                             <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
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
                            </div>
                        </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">  
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="border-radius: 4px;"> 
                <i class="bi bi-x-circle"></i>
                Close
                </button>
                
                <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit" style="border-radius: 4px;">
                <i class="bi bi-save"></i> Save
                </button>
               
                </div>
                </form>
                
            </div>
            </div>
        </div>  
        
        
    
        </div><!-- .content -->


    </div><!-- /#right-panel -->

   
   
    

    <!-- Right Panel -->

<!-- 
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <script src="assets/js/main.js"></script>

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
   

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
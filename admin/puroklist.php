<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{

  if(isset($_POST['submit'])) {
  
  $puroknumber=$_POST['puroknumber'];
  $purokleader=$_POST['purokleader'];
  
  $sql="INSERT INTO tblpurok(PurokNumber,PurokLeader)VALUES(:puroknumber,:purokleader)";
  $query=$dbh->prepare($sql);
  $query->bindParam(':puroknumber',$puroknumber,PDO::PARAM_STR);
  $query->bindParam(':purokleader',$purokleader,PDO::PARAM_STR);
 
    //Check Position exist
    $chk = $dbh->prepare("SELECT PurokNumber FROM tblpurok WHERE PurokNumber =  :puroknumber");
    $chk->bindParam(':puroknumber', $puroknumber);
  
    $chk->execute();
  
    if($chk->rowCount() > 0):

      echo '<script>alert("Purok already exist !. Please try again")</script>';

      else:
      if( $query->execute() ):
     
          echo '<script>alert("Purok Detail has been added.")</script>';
        
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
  <?php 
 
      // Code for record deletion
    if(isset($_REQUEST['del']))
    {
    //Get row id
    $pid=intval($_GET['del']);
    //Qyery for deletion
    $sql = "DELETE FROM tblpurok WHERE  ID=:id";
    // Prepare query for execution
    $query = $dbh->prepare($sql);
    // bind the parameters
    $query-> bindParam(':id',$pid, PDO::PARAM_STR);
    // Query Execution
    $query -> execute();
    // Mesage after updation
    echo "<script>alert('Record deleted successfully');</script>";
    // Code for redirection
    echo "<script>window.location.href='puroklist.php'</script>"; 
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
                    <h2 class="mt-1"><i class="menu-icon bi bi-umbrella-fill text-info"></i> Purok</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="puroklist.php"> Purok</a></li>
                            <li class="active">Manage Household</li>
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
        
                                <form action="searchpurok.php" name="search" method="post"  >

                                      <div class="input-group col-4 float-right">
                                        <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Search:">
                                          <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" id="submit" name="search" style="border-radius: 4px;"><span class="bi bi-search"></span></button>
                                          </div>
                                      </div>
                                         
                                     
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary btn-md float-left" data-toggle="modal" data-target="#purokmodal" style="border-radius: 4px;"><span class="bi bi-plus-circle"></span>
                                        Purok
                                    </button>
                                   
                        
                            </form>

                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-striped">
                                    <thead class="bg-info">
                                        <tr>
                                            <tr>
                            <th>#</th>
                      
                            <th>Purok number</th>
                            <th>Purok Leader</th>
                              <th>Date Added</th>       
                            <th colspan="2" >Action</th>
                          </tr>
                                        </tr>
                                        </thead>
                                    <?php
                                      $sql="SELECT * FROM tblpurok LIMIT 10";
                                      $query = $dbh-> prepare($sql);
                                      $query->execute();
                                      $results=$query->fetchAll(PDO::FETCH_OBJ);


                                      if($query->rowCount() > 0)
                                      {
                                      foreach($results as $row)
                                      {               ?>   
              
                                    <tr>
                                      <td><?php echo htmlentities($row->ID);?></td>
                                
                                      <td><?php  echo htmlentities($row->PurokNumber);?></td>
                                      <td><?php  echo htmlentities($row->PurokLeader);?></td>
                                      <td><?php  echo htmlentities($row->Date_Added);?></td>
                                  
                                      <td><a href="editpurok.php?editid=<?php echo htmlentities ($row->ID);?>" class="btn btn-success btn-sm shadow"  data-toggle="tooltip" data-placement="top" title="Edit" style="border-radius: 4px;"><span class="bi bi-pencil-square"></span> </a></td>
                                      <td><a href="puroklist.php?del=<?php echo htmlentities($row->ID);?>"><button class="btn btn-danger btn-sm shadow"  data-toggle="tooltip" data-placement="top" title="Delete" style="border-radius: 4px;" onClick="return confirm('Do you really want to delete');"><span class="bi bi-trash-fill"></span> </button></a></td>
                                    </tr>
                                  <?php $cnt=$cnt+1;}} ?>   

                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div><!-- .animated -->

            <!-- Purok Modal -->
  <div class="modal fade" id="purokmodal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-info">
          <h6 class="modal-title">New Purok</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            
                        <div class="card-body card-block">
                         
                            <form name="" method="post" action="">
                                
                            <div class="card-body card-block">
 
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Purok number</label>
                                    <input type="text" name="puroknumber" value="" class="form-control" id="puroknumber" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Purok Leader</label>
                                    <input type="text" name="purokleader" value="" class="form-control" id="purokleader" required="true">
                                </div>
                               
                                                    
                                    </div>
                              
                                            
                            </div>        


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style=border-radius:4px; >
          <i class="bi bi-x-circle"></i> Close
        </button>
          
          <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit" style="border-radius:4px;">
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


    <!-- <script src="vendors/jquery/dist/jquery.min.js"></script>
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
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{
      
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
   
    <title> </title>
   

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
                    <h2 class="mt-1"><i class="menu-icon bi bi-journal-arrow-down text-info"> </i> Report</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="bwdates-report-ds.php">Between Dates Reports</a></li>
                            <li class="active">Reports</li>
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
                                <span class="card-title">Between dates Report</span>
                            </div>
                            <div class="card-body">
<!-- <h4 class="m-t-0 header-title">Between Dates Reports</h4> -->
            <?php
            $fdate=$_POST['fromdate'];
            $tdate=$_POST['todate'];

            ?>
            <div class="container">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <p class="text-center text-primary">Report from  <?php echo $fdate?>  to <?php echo $tdate?> </p> 
                </div>
            </div>


                                <table class="table">
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
$sql="SELECT * from tblresidents where date(RegDate) between '$fdate' and '$tdate'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

// $cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>   
              
                <tr>
                  <td><?php echo htmlentities($row->ID);?></td>
                  <td><img src="images/<?php echo $row->Picture;?>" width="50" height="50" style="border-radius: 100%;" value="<?php  echo $row->Picture;?>"></td>
                 <td><?php  echo htmlentities($row->Name);?></td>
                  <td><?php  echo htmlentities($row->Household);?></td>
                  <td><?php  echo htmlentities($row->Purok);?></td>
                  <td><?php  echo htmlentities($row->RegDate);?></td>

                  <td><a href="residentsprofile.php?editid=<?php echo htmlentities ($row->ID);?>" class="btn btn-primary btn-sm shadow"  data-toggle="tooltip" data-placement="top" title="View Profile" style="border-radius: 4px;"><i class="bi bi-file-earmark-person-fill" ></i> </a></td>
                  <td><a href="editresidents.php?editid=<?php echo htmlentities ($row->ID);?>" class="btn btn-success btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Edit" style="border-radius: 4px;"><i class="bi bi-pencil-square"></i></a></td>
                  <td><a href="bwdates-reports-details.php?del=<?php echo htmlentities($row->ID);?>"><button class="btn btn-danger btn-sm shadow"  data-toggle="tooltip" data-placement="top" title="Delete" style="border-radius: 4px;" onClick="return confirm('Do you really want to delete');"><i class="bi bi-trash-fill"></i> </button></a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
} }?>

                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


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
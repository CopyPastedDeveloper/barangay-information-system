<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{


  
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
    p{
        text-indent: 80px;
        font-size: 18px;
        font-weight:400;
        
    }
    #body, p{
        margin-left: 30px;
        margin-right: 80px;
        text-align: justify;
        text-justify: inter-word;
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
                    <h2 class="mt-1"><i class="bi bi-award text-info"></i>Brgy Certificate</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="barangayclearance.php">Barangay Certificates</a></li>
                            <li class="active">Barangay Indigency </li>
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
    
                    <div class="card-header bg-info">
                    <form action="" method="" target="_blank">
                        <span>Barangay Indigency Clearance</span>
                        <button type="button" id="doPrint" class="btn btn-primary btn-sm float-right" style="border-radius: 4px;"><span class="bi bi-printer"></span>
                            Print
                        </button>
                    </form>
                       
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
    
                            <div class="card-body" id="printDiv">
                                <div class="col-3 mt-1">
                                    <img src="images/LGU.jpg" style="width: 50%; height:50%; margin-left:30px;" >
                                </div>
                                <div class="col-3 float-right">
                                    <img src="images/trinidadLogo.png" style="width: 70%; height:70%; margin-left:30px;" >
                                </div>
                                    <div class="d-flex flex-wrap justify-content-center">
										<div class="text-center" style="text-transform: uppercase; letter-spacing:2px;">
                                            <h6 >Republic of the Philippines</h6>
                                            <h6 >Province of Surigao del Sur</h6>
											<h6 >Municipality of Tagbina</h6>
											<h6><b>Barangay Trinidad</b></h6>
                                            
										</div>
									</div>
                                    <div class="d-flex flex-wrap justify-content-center mb-4">
										<div class="text-center" style="text-transform: uppercase;">
                                            <h4 style="margin-top: 50px; letter-spacing:4px;font-weight:bold;text-transform:uppercase;">Office of the Barangay Captain</h4>
										</div>
									</div>
                                    <div class="d-flex flex-wrap justify-content-center mb-5">
										<div class="text-center" style="text-transform: uppercase;">
                                            <h2 style="margin-top: 50px; letter-spacing:5px;font-weight:bold;text-transform:uppercase;">Certification of Indigency</h2>
										</div>
									</div>
                                <div class="content mt-5 mb-5" id="body">
                                    <div class="mb-5"><h6 style="text-transform: uppercase; margin-left:30px;font-weight:bold;">To Whom It may concern:</h6><br></div>
                                 
                                 <p>This is to certify that <input class="text-center" value="<?php  echo $row->Name." ,";?>" style="border: 0px; text-transform:uppercase;font-weight:bold;"readonly>
                                   <input class="text-center" value="<?php echo $row->Age;?>" style="border: 0px; text-transform:uppercase;font-weight:regular; width:35px;"readonly>
                                    years old, 
                                    <input class="text-center" value="<?php echo $row->Gender.",";?>" style="border: 0px; text-transform:capitalize;font-weight:regular; width:60px;"readonly>
                                    a Filipino citizen and a bonafide residents of <input class="" value="<?php  echo $row->PurokNumber;?> " style="border: 0px; text-transform:capitalize;width:65px;"readonly>
                                    Trinidad, Tagbina Surigao del Sur and he belong to indigent family of this barangay.

                
                                <p>This certification is being issued upon the request of the above-named interested person
                                    in connection with his/her desire 
                                    <input class="text-center" value="<?php  echo $row->Purpose;?>" style="border: 0px;display:inline-block;width:300px;"readonly>
                                    and whatever legal purposes this may serve his/her best.
                                </p>
                                <p>Issued and given this <input class="" value="<?php  echo $row->Date_Issued;?>" style="border: 0px;display:inline-block;width:100px;"readonly> at Barangay office Trinidad, Tagbina Surigao del Sur, Philippines.</p>

                             
                     
                                <div class="col-6 mt-5">
                                <div style="margin-top: 80px; margin-left: 20px;">
                                <span >Issued by:</span>
                                    <h6 style="text-transform: uppercase; font-weight:bold; margin-top:30px;">
                                    <input class="text-center form-control bg-white" value="<?php  echo $row->Prepared_By;?>" style="text-transform:uppercase;font-weight:bold;border-right:0px;border-left:0px;border-top:0px;"readonly>
                                   </h6>
                                   <span style="margin-left: 150px;"> Barangay Secretary</span>
                              </div>
                                </div>
                                <div class="col-6 mt-5">
                                <div style="margin-top: 80px;">
                                  <span style="margin-left:90px;">Certified by:</span>
                                    <h6 style="text-transform: uppercase; margin-left:90px; font-weight:bold;  margin-top:30px;">
                                    <input class="text-center form-control bg-white" value="<?php  echo $row->Certified_By;?>" style="text-transform:uppercase;font-weight:bold;border-right:0px;border-left:0px;border-top:0px;"readonly>
                                   </h6>
                                   <span style="margin-left: 190px;">Barangay Captain</span>
                              </div>
                                </div>
                               
                              
                              
                              

                            </div>
                        </div>
                </div>
                                            
                                            
            </div>
            <?php $cnt=$cnt+1;}} ?> 
            
              
          
            </div>
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
    
    <script>
        
        document.getElementById("doPrint").addEventListener("click", function() {
            var printContents = document.getElementById('printDiv').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });
    </script>


</body>
</html>
<?php }  ?>
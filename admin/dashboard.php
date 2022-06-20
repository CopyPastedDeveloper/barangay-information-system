<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  }  else {

    if((time() - $_SESSION['last_login_timestamp']) > 180) // 900 = 15 * 60  
    {  
         echo '<script>alert("Automatically logged out")</script>'; 
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
    
    <title>Barangay Trinidad Information System</title>
   

    <link rel="apple-touch-icon" href="apple-icon.png">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Roboto+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <style>
        .card{
            border-left-color: rgba(red, green, blue, alpha);
            border-left-width: 10px;
            /* border-right-width: 100px; */
            height: 120px;
            border-radius: 5px;
            
        }
        .card {
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.4);

            transition: all 0.2s;
        }
        .card:hover {
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
            transform: scale(1.05);
           
        }
        #household{
            border-left-color: darkgray;
    
        }
        #residents{
            border-left-color: lightblue;
        }
        #official{
            border-left-color: lightskyblue;
        }
        #purok{
            border-left-color: lightgreen;
        }
        body{
        background-color:rgba(189, 195, 199,1.0);
        margin: 0%;
        padding: 0%;
    }
    html{
        font-family: "Roboto", 'Helvetica' !important;
    }
    .custom-household {
    /* fallback for old browsers */
    background: #a18cd1;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right, rgba(161, 140, 209, 0.5), rgba(251, 194, 235, 0.5));

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right, rgba(161, 140, 209, 0.5), rgba(251, 194, 235, 0.5))
}
.custom-purok {
  /* fallback for old browsers */
  background: #c1dfc4;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to right, rgba(193, 223, 196, 0.5), rgba(222, 236, 221, 0.5));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to right, rgba(193, 223, 196, 0.5), rgba(222, 236, 221, 0.5))
}
.custom-residents {
  /* fallback for old browsers */
  background: #a1c4fd;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to right, rgba(161, 196, 253, 0.5), rgba(194, 233, 251, 0.5));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to right, rgba(161, 196, 253, 0.5), rgba(194, 233, 251, 0.5))
}
.custom-official {
  /* fallback for old browsers */
  background: #89f7fe;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to right, rgba(137, 247, 254, 0.5), rgba(102, 166, 255, 0.5));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to right, rgba(137, 247, 254, 0.5), rgba(102, 166, 255, 0.5))
}

    </style>

</head>

<body>


    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <?php include_once('includes/header.php');?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h3 class="mt-1"><i class="bi bi-speedometer2 text-info"></i> Dashboard</h3>
                    </div>
                </div>
            </div>
          
        </div>

        <div class="content mt-3">

            


         <div class="col-sm-6 col-lg-6">
                <div class="card text-white custom-household shadow p-3" id="household">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                                <i class="bi bi-gear"></i>
                            </button>
                            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton4">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="household.php"><span class="bi bi-eye-slash text-info"> View List</span> </a>
                                    
                                </div>
                            </div>
                        </div>
                        <?php 
                            $sql ="SELECT ID from tblhousehold ";
                            $query = $dbh -> prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            $totalhousehold=$query->rowCount();
                        ?>

                        <div class="container">
                            <h1><span class="bi bi-house-fill"></span></h1>
                            <h3 class="mb-0">
                                <span class="count"><?php echo htmlentities($totalhousehold);?></span>
                                <small style="text-transform: uppercase; font-size:15px;letter-spacing:4px;">Total Households</small>
                            </h3>

                        </div>
                    
                

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-6">
                <div class="card text-white custom-residents shadow p-3" id="residents">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="bi bi-gear-fill"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="residents.php"><span class="bi bi-eye-slash text-info"> View List</span></a>
                                    
                                </div>
                            </div>
                        </div>
                        <?php 
                $sql1 ="SELECT ID from tblresidents ";
                $query1 = $dbh -> prepare($sql1);
                $query1->execute();
                $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                $totalResidents=$query1->rowCount();
                ?>

                        <div class="container">
                            <h1><span class="bi bi-people-fill"></span></h1>
                            <h3 class="mb-0">
                                <span class="count"><?php echo htmlentities($totalResidents);?></span>
                                <small style="text-transform: uppercase; font-size:15px; letter-spacing:4px;">Total Residents</small>
                            </h3>
                        </div>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  
            <div class="col-sm-6 col-lg-6">
                <div class="card text-white custom-purok shadow p-3" id="purok">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="bi bi-gear-fill"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="puroklist.php"><span class="bi bi-eye-slash text-info"> View List</span></a>
                                    
                                </div>
                            </div>
                        </div>
                        <?php 
                        $sql1 ="SELECT ID from tblpurok ";
                        $query1 = $dbh -> prepare($sql1);
                        $query1->execute();
                        $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                        $totalResidents=$query1->rowCount();
                        ?>
                       
                       <div class="container">
                                 <h1><span class="bi bi-house-door"></span></h1>
                                  <h3 class="mb-0">
                                    <span class="count"><?php echo htmlentities($totalResidents);?></span>
                                    <small style="text-transform: uppercase; font-size:15px; letter-spacing:4px;"> Total Purok</small>
                                </h3>

                       </div>
                      

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6">
                <div class="card text-white custom-official shadow p-3" id="official">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="bi bi-gear-fill"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="official.php"><span class="bi bi-eye-slash text-info"> View List</span></a>
                                    
                                </div>
                            </div>
                        </div>
                        <?php 
                        $sql1 ="SELECT ID from tblofficial ";
                        $query1 = $dbh -> prepare($sql1);
                        $query1->execute();
                        $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                        $totalResidents=$query1->rowCount();
                        ?>
                       
                       <div class="container">
                                 <h1><span class="bi bi-person-lines-fill"></span></h1>
                                  <h3 class="mb-0">
                                    <span class="count"><?php echo htmlentities($totalResidents);?></span>
                                    <small style="text-transform: uppercase; font-size:15px; letter-spacing:4px;"> Total Officials</small>
                                </h3>

                       </div>
                      

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  
            
            
           
           

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
<?php } ?>

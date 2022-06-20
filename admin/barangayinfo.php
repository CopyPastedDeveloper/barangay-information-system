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
  $puroknumber=$_POST['puroknumber'];
  $purokleader=$_POST['purokleader'];
  
  $sql="INSERT INTO tblpurok(PurokNumber,PurokLeader)VALUES(:puroknumber,:purokleader)";
  $query=$dbh->prepare($sql);
  $query->bindParam(':puroknumber',$puroknumber,PDO::PARAM_STR);
  $query->bindParam(':purokleader',$purokleader,PDO::PARAM_STR);
  $query->execute();
  
     $LastInsertId=$dbh->lastInsertId();
     if ($LastInsertId>0) {
      echo '<script>alert("Purok has been added.")</script>';
//   echo "<script>window.location.href ='addpurok.php'</script>";
    }
    else
      {
           echo '<script>alert("Something Went Wrong. Please try again")</script>';
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
        /* text-indent: 80px;
        font-size: 18px;
       font-weight:400; */
        
    }
    #body{
        margin-left: 30px;
        margin-right: 80px;
        text-align: justify;
        text-justify: inter-word;
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
                    <h2 class="mt-1"><i class="menu-icon bi bi-gear-fill text-info"> </i> Settings</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="puroklist.php"> Settings</a></li>
                            <li class="active">Brgy Info</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <span> Barangay Information</span>
                        

                            </div>
                       

            <div class="container mt-3">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                <a class="nav-link active" href="#home">Barangay Information</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#menu1">Mission</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#menu2">Vision</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#menu3">Objectives</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content border mb-3">
                <div id="home" class="container tab-pane active"><br>
                <p class="text-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus natus accusamus quos neque. Illo sunt, sequi asperiores sit unde suscipit natus illum tenetur temporibus blanditiis cum fugiat eos ipsum odio!</p>
                <p class="text-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus natus accusamus quos neque. Illo sunt, sequi asperiores sit unde suscipit natus illum tenetur temporibus blanditiis cum fugiat eos ipsum odio!</p>
                <p class="text-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus natus accusamus quos neque. Illo sunt, sequi asperiores sit unde suscipit natus illum tenetur temporibus blanditiis cum fugiat eos ipsum odio!</p>
           
                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                <p class="text-primary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus natus accusamus quos neque. Illo sunt, sequi asperiores sit unde suscipit natus illum tenetur temporibus blanditiis cum fugiat eos ipsum odio!</p>
                <p class="text-primary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus natus accusamus quos neque. Illo sunt, sequi asperiores sit unde suscipit natus illum tenetur temporibus blanditiis cum fugiat eos ipsum odio!</p>
                <p class="text-primary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
                </div>
                <div id="menu2" class="container tab-pane fade"><br>
                <p class="text-success">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus natus accusamus quos neque. Illo sunt, sequi asperiores sit unde suscipit natus illum tenetur temporibus blanditiis cum fugiat eos ipsum odio!</p>
                <p class="text-success">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus natus accusamus quos neque. Illo sunt, sequi asperiores sit unde suscipit natus illum tenetur temporibus blanditiis cum fugiat eos ipsum odio!</p>
                <p class="text-success">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus natus accusamus quos neque. </p>
                </div>
                <div id="menu3" class="container tab-pane fade"><br>
                <p class="text-warning">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus natus accusamus quos neque. Illo sunt, sequi asperiores sit unde suscipit natus illum tenetur temporibus blanditiis cum fugiat eos ipsum odio!</p>
                <p class="text-warning">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus natus accusamus quos neque. Illo sunt, sequi asperiores sit unde suscipit natus illum tenetur temporibus blanditiis cum fugiat eos ipsum odio!</p>
                </div>
            </div>
            <p class="act float-right"><b>Active Tab  <i class="bi-chevron-double-right"></i></b>  <span class="text-info"></span></p>
            <p class="prev float-left"><b>Previous Tab <i class="bi-chevron-double-right"></i></b> <span></span></p>
            </div>
        
                          
                </div>
            </div>



                </div>
            </div>
            </div><!-- .animated -->

    

        </div><!-- .content -->



    </div><!-- /#right-panel -->

    <!-- Right Panel -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <!-- <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <script src="assets/js/main.js"></script>

    <script>

        $(document).ready(function(){
            $(".nav-tabs a").click(function(){
                $(this).tab('show');
            });
        $('.nav-tabs a').on('shown.bs.tab', function(event){
            var x = $(event.target).text();         // active tab
            var y = $(event.relatedTarget).text();  // previous tab
            $(".act span").text(x);
            $(".prev span").text(y);
        });
        });



    </script>



</body>

</html>
<?php }  ?>
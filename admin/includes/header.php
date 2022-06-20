<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
  <style>
      *, header, div{
        font-family: "Roboto", 'Helvetica' !important;

      }
      input{
        border:none;
        font-size: 16px;
        /* margin-left: 10px; */
      }
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" crossorigin="anonymous">

<header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <!-- <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a> -->
                    <div class="header-left">
                       
                        <div class="form-inline">
                            
                        </div>
                    
                        <div class="form-inline">
                            
                        </div>

                      
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                        <?php 
    
                            $sql2 = "SELECT * from   tbladmin ";
                            $query2 = $dbh -> prepare($sql2);
                            $query2->execute();
                            $result2=$query2->fetchAll(PDO::FETCH_OBJ);

                            foreach($result2 as $row)
                            {          
                                ?>  

                            <?php } ?> 
                          
                           <h4><input class="text-right" value="<?php  echo htmlentities($row->AdminName);?>" readonly><span class="bi bi-person-fill text-info"></span></input></h4> 
                     
                        </a>
                       
                        
                          
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="adminprofile.php"><i class="bi bi-person-fill text-info"></i>    My Profile</a>
                            <a class="nav-link" href="change-password.php"><i class="bi bi-lock-fill text-info"></i>Change Password</a>

                            <a class="nav-link" href="logout.php"><i class="bi bi-power text-info"></i> Logout</a>
                        </div>
                        <?php
                            $sql="SELECT * from tbladmin";
                            $query = $dbh -> prepare($sql);
                            $query->execute();
                            $results=$query->fetch(PDO::FETCH_OBJ);
                        ?>     


                    </div>

                    

                </div>
            </div>

        </header>
        <?php }  ?>
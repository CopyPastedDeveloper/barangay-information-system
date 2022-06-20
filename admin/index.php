<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
   
  
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID FROM tbladmin WHERE UserName=:username and Password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['trmsaid']=$result->ID;
}

$_SESSION['last_login_timestamp'] = time(); 
$_SESSION['login']=$_POST['username']; 


echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else{

    echo "<script>alert('Email or password is invalid');</script>";
   
    }
    
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
   

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" crossorigin="anonymous">
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Roboto+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<style>
    .card{
        width: 70%;
        height: 30%;
        border-radius: 4px;
        position:relative;
        display: flex; /* or inline-flex */
        margin-left:15%;
        border-color: rgba(22, 160, 133,1.0);
        font-family: "Roboto", 'Helvetica' !important;
        
    

    }
    .card {
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.4);
    transition: all 0.2s;
    }
    .card:hover {
    box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
    transform: scale(1.050);
    }
    body{
        background-color:rgba(189, 195, 199,1.0);
        margin: 0%;
        padding: 0%;
        font-family: "Roboto", 'Helvetica' !important;
    }
    .login-form{
        background-color:rgba(189, 195, 199,1.0);
        font-family: "Roboto", 'Helvetica' !important;
        
    }
    input{
        font-family: "Roboto", 'Helvetica' !important;
    }
    span{
        font-family: "Roboto", 'Helvetica' !important;
    }
   
</style>

</head>

<body>

        <div class="container">
            <div class="login-content">
                <div class="login-form">
                <div class="card shadow-lg">
                        <div class="card-header bg-info">
                            <div class="login-logo">
                                <a href=""><img src="images/trinidadLogo.png" alt="LOGO" style="height: 40%; width: 60%;" /> </a>
                        
                                <h6 class="text-white"> Barangay Trinidad Information System  </h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" name="login">
                                
                            <!-- <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                <strong class="text-danger"><?php echo $message; ?><i>Invalid email or password !</i></strong>
                            </div> -->
                            

                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-light">
                                        <span class="bi bi-person-fill text-info"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" required="true" name="username">
                    
                            </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-light">
                                <span class="bi bi-lock-fill text-info"></span>
                            </div>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required="true">
            
                    </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-sm mb-2 " name="login" style="border-radius:4px; padding:12px;"><span class="bi bi-box-arrow-right"></span> login</button>
                                    <a href="forgot-password.php" class="btn btn-success btn-sm mb-2" style="border-radius:4px; padding:12px;"><span class="bi bi-arrow-repeat"> Reset password</span></a>
                                    <a href="../index.php" class="btn btn-success btn-sm " style="border-radius:4px; padding:12px; "><span class="bi bi-chevron-double-left"> back home</span></a>
                                </div>

                                
                               

                                </div>  
      
                            </form>
                             
                                
                         </div>
                        
                        </div>

                </div>
            </div>
        </div>
  

         
    


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
<script>
    $('#myAlert').on('closed.bs.alert', function () {
        // do something…
        $(".alert").alert('close')

        });
</script>

</body>

</html>

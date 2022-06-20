<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {

$email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
$sql ="SELECT Email FROM tbladmin WHERE Email=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
    
$con="UPDATE tbladmin SET Password=:newpassword WHERE Email=:email AND MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email or Mobile no is invalid');</script>"; 
}
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
   

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" crossorigin="anonymous">
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<script type="text/javascript">
    function valid()
    {
    if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
    {
    alert("New Password and Confirm Password Field do not match  !!");
    document.chngpwd.confirmpassword.focus();
    return false;
    }
    return true;
    }
</script>
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
        z-index: 1;
        
    }
    input{
        font-family: "Roboto", 'Helvetica' !important;
    }
    span{
        font-family: "Roboto", 'Helvetica' !important;
    }
    
</style>

</head>

<body class="">
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

                                <form action="" method="post" name="chngpwd" onSubmit="return valid();">

                                      <div class="input-group mb-1">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-light">
                                                    <span class="bi bi-envelope-fill text-info"></span>
                                                </div>
                                            </div>
                                            <input type="email" class="form-control"  placeholder="Enter your email " required="" name="email">
                                      </div>
                                      <div class="input-group mb-1">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-light">
                                                    <span class="bi bi-telephone-fill text-info"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control"  name="mobile" placeholder="Mobile number" required="true">
                                      </div>
                                      <div class="input-group mb-1">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-light">
                                                    <span class="bi bi-lock-fill text-info"></span>
                                                </div>
                                            </div>
                                            <input class="form-control" type="password" name="newpassword" placeholder="New password" required="true"/>
                                      </div>
                                      <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-light">
                                                    <span class="bi bi-lock-fill text-info"></span>
                                                </div>
                                            </div>
                                            <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm password" required="true" />
                                      </div>
                        
                       

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success mb-1" name="submit" style="border-radius:4px; padding:12px;"><span class="bi bi-arrow-repeat"></span> Reset</button>
                                        <a href="index.php" class="btn btn-info btn-sm" style="border-radius:4px; padding:12px;"> <span class="bi bi-box-arrow-right"></span> Sign in</a>
                                    </div>
    
                              
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>

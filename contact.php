
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Barangay Trinidad Information System</title>
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto"/>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="vendors/animate-css/animate.css">
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="videos/video.css">
	 <!-- favicon -->
	 <link rel="icon" href="admin/images/trinidadLogo.png" type="image/png">

	 <style>
		.form-control{
			width: 100%;
			height: 100%;
		}
		html {
 		 box-sizing: border-box;
		}
    

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.4);
  margin: 8px;
  transition: all 0.2s;
}
.card:hover {
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
  transform: scale(1.040);
}

.about-section {
  padding: 80px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #5bc0de;
  text-align: center;
  cursor: pointer;
  width: 100%;
  border-radius: 4px;
}

.button:hover {
  background-color: #0275d8;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
body {
  background: url('https://source.unsplash.com/twukN12EN7c/1920x1080') no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;
}
/* #img{
  height: 490px;
  background-size: cover;
} */
	 </style>
</head>

<?php include_once('includes/header.php');?>
<hr>
</br>
<body>	
</br>
<video autoplay muted loop id="myVideo">
    <source src="videos/raindropcode.mp4" type="video/mp4">
    Your browser does not support HTML5 video.
  </video>
<div class="container-fluid mt-5" style="background-color:gainsboro;">
<div class="mt-5"><h3 style="margin-left:110px; letter-spacing:3px;" class="mt-5 mb-5 text-uppercase text-primary" id="about">Get in Touch</h3></div>
</div>






<div class="container mt-4 mb-5" id="contact">
    <div class="row">
    <div class="col-6">
            <div class="card bg-light mb-3">
                <div class="card-header bg-info text-white text-uppercase"><i class="bi bi-house-fill"></i> Address</div>
                <img class="d-block w-100" id="img" src="admin/images/carousel1.jpg" >
                <div class="card-body mt-3">
                    <p><span class="bi bi-geo-alt-fill text-warning"></span> 8308, Barangay Trinidad Tagbina</p>
                    <p><span class="bi bi-map-fill text-warning"></span> Surigao del Sur Province</p>
                    <p><span class="bi bi-envelope-fill text-warning"></span> brgytrinidad@gmail.com</p>
                    <p><span class="bi bi-telephone-inbound-fill text-warning"></span> +63 912 561 1518</p>


                </div>

            </div>
         
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-info text-uppercase text-white"><i class="bi bi-envelope-fill"></i>  Contact us.</div>
                <div class="card-body">
                    <form>
                        <div class="form-group mt-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp"  style="height: 40px;font-size:15px;" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" style="height: 40px;font-size:15px;" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="3" style="font-size:17px;" required></textarea>
                        </div>
                        <div class="mx-auto">
                        <button type="submit" class="button mt-2" style="width:;">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>	
    </div>
</div>




	
 <?php include_once('includes/footer.php');?>

	
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/countdown.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/owl-carousel-thumb.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="vendors/counter-up/jquery.counterup.js"></script>
	<script src="js/mail-script.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/theme.js"></script>

</body>

</html>

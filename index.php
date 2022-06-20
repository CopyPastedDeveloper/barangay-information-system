
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
	 <!-- favicon -->
	 <link rel="icon" href="admin/images/favicon.ico" type="image/ico">
   <link rel="stylesheet" href="videos/video.css">
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

<body>	

	

	<!--================ Start Home Banner Area =================-->

<div id="c" class="carousel slide bg-dark mt-0" data-ride="carousel">
	
	<ol class="carousel-indicators">
		<li class="" data-target="#c" data-slide-to="0"></li>
		<li  data-target="#c" data-slide-to="1"></li>
		<li data-target="#c" data-slide-to="2"></li>
		
	</ol>

	<div class="carousel-inner mt-0">
		<div class="active item">
			<img class="d-block w-100" id="img" src="admin/images/carousel1.jpg" alt="First">
		  
		 
		</div>
		<div class="item">
			<img class="d-block w-100" id="img" src="admin/images/carousel2.jpg" alt="Second" style="z-index:-999;">
		  
		</div>
		<div class="item">
			<img class="d-block w-100" id="img" src="admin/images/carousel3.jpg" alt="Third">
		  
		</div>
	</div>
	<a href="#c" class="left carousel-control" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a href="#c" class="right carousel-control" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
	</a>
</div>
</br>
<div class="container-fluid">
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<video autoplay muted loop id="myVideo">
						<source src="videos/codevideo.mp4" type="video/mp4">
						Your browser does not support HTML5 video.
					</video>
				</div>
		   </div>
		</div>
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<video autoplay muted loop id="myVideo">
						<source src="videos/codevideo.mp4" type="video/mp4">
						Your browser does not support HTML5 video.
					</video>
				</div>
		   </div>
		</div>
	</div>
</div>
</br>










	
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
  <!-- <script src="videos/video.js"></script> -->

</body>

</html>
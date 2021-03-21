<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Track Orders</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="assets/css/config.css">
		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.ico">
		
		<style>
		
		input[type="button"],[type="submit"]
{
    width:25%;
    height:25px;
    border-style:solid;
    border-radius:25px;
    border-width:2px;
    margin-top:0px;
    margin-left:0px;
    background-color:white;
    padding-left:7px;
    padding-top:1px;
    border-color:orange;
    box-shadow:4px 2px purple;
    letter-spacing:1px;
    color:purple;
    font-size:15px;
    font-weight:bold;
    font-style:italic;
}



input[type="button"],[type="submit"]:hover
{
    width:25%;
    height:25px;
    border-style:solid;
    border-radius:25px;
    border-width:2px;
    margin-top:0px;
    margin-left:0px;
    background-color:white;
    padding-left:7px;
    padding-top:1px;
    border-color:purple;
    box-shadow:4px 2px orange;
    letter-spacing:1px;
    color:orange;
    font-size:15px;
    font-weight:bold;
    font-style:italic;
}

.labelname
{
	color:purple;
	font-weight:bold;
	font-style:italic;
	letter-spacing:1px;
	font-size:15px;
}

.inputtype
{
	
	font-weight:bold;
	border-radius:25px;
	border-style:solid;
	border-color:darkgrey;
	box-shadow:4px 2px purple;
	color:orange;
	width:450px;

}
		
		</style>
		
	</head>
	
    <body class="cnt-home">
	
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->
<?php include('includes/main-header.php');?>
	<!-- ============================================== NAVBAR ============================================== -->
<?php include('includes/menu-bar.php');?>
<!-- ============================================== NAVBAR : END ============================================== -->

</header>
<!-- ============================================== HEADER : END ============================================== -->


<div class="body-content outer-top-bd">

	<div class="container-fluid">
	
		<div class="track-order-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12">
	<h2 class="labelname" style="color:purple;">Track your Order</h2>
	
	<div style="margin-left:420px;">
	
	<form class="register-form outer-top-xs" role="form" method="post" action="order-details.php">
	
		<div class="form-group">
		    <label class="labelname" style="font-weight:bold;" for="">Bill ID</label>
		    <input type="number" class="form-control inputtype" name="billid" id="">
		</div>
		
	  	<div class="form-group">
		    <label class="labelname" style="font-weight:bold;" for="exampleBillingEmail1">Registered Email</label>
		    <input type="email" class="form-control inputtype" name="email" id="exampleBillingEmail1">
		</div>
		
		<div class="form-group">
		    <label class="labelname" style="font-weight:bold;" for="exampleBillingEmail1">Password</label>
		    <input type="password" class="form-control inputtype" name="pass" id="exampleBillingEmail1">
		</div>
		
	  	<button type="submit" name="submit">Track</button>
		
	</form>	
	
	</div>
	
</div>			

</div><!-- /.row -->
		
</div><!-- /.sigin-in-->
		
</div>

</div>

<?php include('includes/footer.php');?>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>
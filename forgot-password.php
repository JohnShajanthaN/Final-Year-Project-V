<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['change']))
{
   $email=$_POST['email'];
    $contact=$_POST['contact'];
    $password=$_POST['password'];
$query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and contactno='$contact'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="forgot-password.php";
mysqli_query($con,"update users set password='$password' WHERE email='$email' and contactno='$contact' ");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Password Changed Successfully";
exit();
}
else
{
$extra="forgot-password.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Invalid email id or Contact no";
exit();
}
}


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

	    <title> User | Forgot Password</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
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
		
<script type="text/javascript">
function valid()
{
 if(document.register.password.value!= document.register.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.register.confirmpassword.focus();
return false;
}
return true;
}
</script>

	</head>
	
    <body class="cnt-home">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
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
	<div class="container">
		<div class="sign-in-page inner-bottom-sm">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 style="color:purple;font-weight:bold;font-style:italic;letter-spacing:1px;">Forgot password</h4>
	<form class="register-form outer-top-xs" name="register" method="post">
	<span style="color:red;" >
<?php
echo htmlentities($_SESSION['errmsg']);
?>
<?php
echo htmlentities($_SESSION['errmsg']="");
?>
	</span>
		<div class="form-group">
		    <label class="labelname" style="font-weight:bold;" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" name="email" class="form-control inputtype" id="exampleInputEmail1" required >
		</div>
	  	<div class="form-group">
		    <label class="labelname" style="font-weight:bold;" for="exampleInputPassword1">Contact no <span>*</span></label>
		 <input type="text" name="contact" class="form-control inputtype" id="contact" required>
		</div>
<div class="form-group">
	    	<label class="labelname" style="font-weight:bold;" for="password">Password. <span>*</span></label>
	    	<input type="password" class="form-control inputtype" id="password" name="password"  required >
	  	</div>

<div class="form-group">
	    	<label class="labelname" style="font-weight:bold;" for="confirmpassword">Confirm Password. <span>*</span></label>
	    	<input type="password" class="form-control inputtype" id="confirmpassword" name="confirmpassword" required >
	  	</div>


		
	  	<button type="submit" class="" name="change">Submit</button>
		
		<input type="button" value="show" id="show" onclick="visible()" style="margin-left:10px;">
		
	</form>					
</div>
<!-- Sign-in -->


<!-- create a new account -->			</div><!-- /.row -->
		</div>
<?php include('includes/brands-slider.php');?>
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
		
		function visible()
        {
			
            var x=document.getElementById("password");
			var z=document.getElementById("confirmpassword");
			var a=document.getElementById("show");
            
            
            if(z.type==="password" && x.type==="password" )
            {
                z.type="text";
				x.type="text";
                a.value="hide";
            }
			
			else
			{
				
            z.type="password";
			x.type="password";
			a.value="show";
			
			}
        
			}
		
	</script>
	
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
// Code user Registration
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$contactno=$_POST['contactno'];
$password=$_POST['password'];
$saddress=$_POST['shiadd'];
$sstate=$_POST['shista'];
$scity=$_POST['shicit'];
$spincode=$_POST['shipin'];
$baddress=$_POST['biladd'];
$bstate=$_POST['bilsta'];
$bcity=$_POST['bilcit'];
$bpincode=$_POST['bilpin'];
$query=mysqli_query($con,"insert IGNORE   into users(name,email,contactno,password,shippingAddress,shippingState,
shippingCity,shippingPincode,billingAddress,billingState,billingCity,billingPincode) values ('$name','$email',
'$contactno','$password','$saddress','$sstate','$scity','$spincode','$baddress','$bstate','$bcity','$bpincode')");
if($query)
{
	echo "<script>alert('You are successfully register');</script>";
}
else{
echo $name;
echo $email;
echo $contactno;
echo $password;
echo $saddress;
echo $sstate;
echo $scity;
echo $spincode;
echo $baddress;
echo $bstate;
echo $bcity;
echo $bpincode;
echo("Error description: " . mysqli_error($con));

}
}
// Code for User login
if(isset($_POST['login']))
{
   $email=$_POST['email'];
   $password=$_POST['password'];
$query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="my-cart.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$extra="login.php";
$email=$_POST['email'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Invalid email id or Password";
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

	    <title>User Sign-In</title>

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

		function visible()
        {
            
			var z=document.getElementById("exampleInputPassword1");
			var a=document.getElementById("show");
            
            
            if(z.type==="password")
            {
                z.type="text";
                a.value="hide";
            }
        else
        {
            z.type="password";
            a.value="show";
        }
        
        }
		
		function visible1()
        {
			
            var x=document.getElementById("password");
			var z=document.getElementById("confirmpassword");
			var a=document.getElementById("show1");
            
            
            if(z.type==="password" && x.type==="password")
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
		

		function userAvailability()
		{
			$("#loaderIcon").show();
			jQuery.ajax
			(
			{
			url: "check_availability.php",
			data:'email='+$("#email").val(),
			type: "POST",
			success:function(data){
			$("#user-availability-status1").html(data);
			$("#loaderIcon").hide();
			},
			error:function ()
			{
				
			}
			}
			);
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
	<h4 style="color:purple;font-weight:bold;font-style:italic;letter-spacing:1px;">sign in</h4>
	<p style="color:purple;font-weight:bold;font-style:italic;letter-spacing:1px;">Hello, Welcome to your account.</p>
	<form class="register-form outer-top-xs" method="post">
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
		    <input type="email" name="email" class="form-control inputtype" id="exampleInputEmail1">
		</div>
 
    
		
	  	<div class="form-group">
		
		    <label class="labelname" style="font-weight:bold;" for="exampleInputPassword1">Password <span>*</span></label>
		 <input type="password" name="password"  class="form-control inputtype" id="exampleInputPassword1">
		 
		 <button type="submit" name="login" style="margin-left:0px;margin-top:20px;">Login</button>
		 
		 <input type="button" value="Show" id="show" onclick="visible()" style="margin-left:27px;margin-top:40px;">
		
		 <a href="forgot-password.php" style="margin-left:17px;margin-top:49px;font-size:15px;font-weight:bold;font-style:italic;">Forgot your Password?</a>
		
		</div>
		
	</form>					
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 style="color:purple;font-weight:bold;font-style:italic;letter-spacing:1px;text-shadow:0px 0px;">create a new account</h4>
	<p style="color:purple;font-weight:bold;font-style:italic;letter-spacing:1px;">Create your own Shopping account.</p>
	<form class="register-form outer-top-xs" role="form" method="post" name="register" onSubmit="return valid();">
<div class="form-group">
	    	<label class="labelname" style="font-weight:bold;" for="fullname">Full Name <span>*</span></label>
	    	<input type="text"  class="form-control inputtype" id="fullname" name="fullname" required="required">
	  	</div>


		<div class="form-group">
	    	<label class="labelname" style="font-weight:bold;" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input type="email"  class="form-control inputtype" id="email" onBlur="userAvailability()" name="emailid" required >
	    	       <span id="user-availability-status1" style="font-size:12px;"></span>
	  	</div>

		<div class="form-group">
	    	<label class="labelname" style="font-weight:bold;" for="contactno">Contact No. <span>*</span></label>
	    	<input type="text"  class="form-control inputtype" id="contactno" name="contactno" maxlength="10" required >
	  	</div>
		
		<div class="form-group">
	    	<label class="labelname" style="font-weight:bold;" for="exampleInputEmail2">Shipping Address <span>*</span></label>
	    	<input type="text"  class="form-control inputtype" id="saddress" onBlur="userAvailability()" name="shiadd" required >
	    	       <span id="user-availability-status1" style="font-size:12px;"></span>
	  	</div>
		
		<div class="form-group">
		
	    	<label class="labelname" style="font-weight:bold;width:150px;">Shipping State <span>*</span></label>
			<label class="labelname" style="font-weight:bold;width:150px;">Shipping City <span>*</span></label>
			<label class="labelname" style="font-weight:bold;width:150px;">Shipping Pincode <span>*</span></label>
			
			<br>
			<input type="text" class="inputtype" style="width:150px;padding-left:8px;"  id="sstate" name="shista" required >
	    	<input type="text" class="inputtype" style="width:150px;padding-left:8px;"  id="scity"  name="shicit" required >
			<input type="text" class="inputtype" style="width:150px;padding-left:8px;"  id="spincode" name="shipin" required >
	    	       
	  	</div>
		
	    	
		
		<div class="form-group">
	    	<label class="labelname" style="font-weight:bold;" for="exampleInputEmail2">Billing Address <span>*</span></label>
	    	<input type="text"  class="form-control inputtype" id="baddress" onBlur="userAvailability()" name="biladd" required >
	    	       <span id="user-availability-status1" style="font-size:12px;"></span>
	  	</div>
		
		<div class="form-group">
		
	    	<label class="labelname" style="font-weight:bold;width:150px;">Billing State <span>*</span></label>
			<label class="labelname" style="font-weight:bold;width:150px;">Billing City <span>*</span></label>
			<label class="labelname" style="font-weight:bold;width:150px;">Billling Pincode <span>*</span></label>
			
			<br>
			<input type="text" class="inputtype" style="width:150px;padding-left:8px;"  id="bstate" name="bilsta" required >
	    	<input type="text" class="inputtype" style="width:150px;padding-left:8px;"  id="bcity"  name="bilcit" required >
			<input type="text" class="inputtype" style="width:150px;padding-left:8px;"  id="bpincode" name="bilpin" required >
	    	       
	  	</div>

		<div class="form-group">
	    	<label class="labelname" style="font-weight:bold;" for="password">Password. <span>*</span></label>
	    	<input type="password"  class="form-control inputtype" id="password" name="password"  required >
	  	</div>

		<div class="form-group">
	    	<label class="labelname" style="font-weight:bold;" for="confirmpassword">Confirm Password. <span>*</span></label>
	    	<input type="password"  class="form-control inputtype" id="confirmpassword" name="confirmpassword" required >
	  	</div>


	  	<button type="submit" name="submit" id="submit" style="padding-top:1px;">Sign Up</button>
		
		<input type="button" value="Show" id="show1" onclick="visible1()" style="margin-left:27px;margin-top:20px;">
		
	</form>
	
</div>	
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
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>
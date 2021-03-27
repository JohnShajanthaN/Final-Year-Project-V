<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
		
		}else{
			$message="Product ID is invalid";
		}
	}
		echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		
	<!--	
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="theme/darkmode/bootstrap.min.css">
  <link rel="stylesheet" href="theme/darkmode/dark-mode.css">
  <script type="text/javascript" src="theme/darkmode/dark-mode-switch.min.js"></script>
  -->
  

		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Food Mafia</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.png">

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
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		

	
	</head>
	
    <body class="cnt-home">
	
	
	<div id="google_translate_element" style="width:160px;margin-left:1197px;margin-bottom:-20px;"> </div>
	
	<!--
	<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-7298b2b0-f2df-48e9-a768-f59b4cad3b85"></div>
-->
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container-fluid">
		<div class="furniture-container homepage-container">
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
				<!-- ================================== TOP NAVIGATION ================================== -->
	<?php include('includes/side-menu.php');?>
<!-- ================================== TOP NAVIGATION : END ================================== -->
			</div><!-- /.sidemenu-holder -->	
			
			<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
				<!-- ========================================== SECTION – HERO ========================================= -->
			
<div id="hero" class="homepage-slider3">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
	
		<div class="full-width-slider">	
			<div class="item" style="background-image: url(img/favouritefoods/Fruit-Custard.jpg);width:1000px;height:350px;">
				<!-- /.container-fluid -->
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
	    
	    <div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(img/favouritefoods/FruitPizza.jpg);width:1000px;height:350px;">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
		
		 <div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(img/favouritefoods/ChineseRice.jpg);width:1000px;height:350px;">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
		
		<div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(img/favouritefoods/Kothu-Parotta.jpg);width:1000px;height:350px;">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
		
		<div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(img/favouritefoods/VegetableRice.jpg);width:1000px;height:350px;">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
		
		<div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(img/favouritefoods/FishRice.jpg);width:1000px;height:350px;">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->

	</div><!-- /.owl-carousel -->
</div>
			
<!-- ========================================= SECTION – HERO : END ========================================= -->	
				<!-- ============================================== INFO BOXES ============================================== -->
<div class="info-boxes wow fadeInUp">

	<div class="info-boxes-inner">
	
		<div class="row">
		
			<div class="col-md-6 col-sm-4 col-lg-4">
			
				<div style="border-style:solid;border-radius:85px;color:green;width:250px;box-shadow:3px 2px">
				
					<div class="row">
						
						<div class="col-xs-10">
						
							<h4 style="padding-left:82px;padding-top:5px;font-weight:bold;font-size:22px;text-shadow:1px 1px black;"> ORDER </h4>
							
						</div>
						
					</div>	
					
				</div>
				
			</div><!-- .col -->

			<div class="hidden-md col-sm-4 col-lg-4">
			
				<div style="border-style:solid;border-radius:85px;color:purple;width:250px;box-shadow:3px 2px;">
				
					<div class="row">
						
						<div class="col-xs-10">
						
						<h4 style="padding-left:85px;padding-top:5px;font-weight:bold;font-size:22px;text-shadow:1px 1px black;"> TRACK </h4>
						
						</div>
						
					
						
					</div>
					
				</div>
				
			</div><!-- .col -->

			<div class="col-md-6 col-sm-4 col-lg-4">
			
				<div style="border-style:solid;border-radius:85px;color:orange;width:250px;box-shadow:3px 2px;">
				
					<div class="row">
						
						<div class="col-xs-10">
							<h4 style="padding-left:75PX;padding-top:5px;font-weight:bold;font-size:22px;text-shadow:1px 1px black;"> DELIVERY </h4>
						</div>
						
					</div>
				
				</div>
				
			</div><!-- .col -->
		</div><!-- /.row -->
	</div><!-- /.info-boxes-inner -->
	
</div><!-- /.info-boxes -->
<!-- ============================================== INFO BOXES : END ============================================== -->		
			</div><!-- /.homebanner-holder -->
			
		</div><!-- /.row -->

		<!-- ============================================== SCROLL TABS ============================================== -->
		
		<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
		
			<div class="more-info-tab clearfix">
			   <h3 class="new-product-title pull-left" style="color:purple;font-weight:bold;text-shadow:1px 0px orange;">Deals Of This Week</h3>
			</div>

			<div class="tab-content outer-top-xs">
			
				<div class="tab-pane in active" id="all">			
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
<?php
$ret=mysqli_query($con,"select * from products where category=3;");
while ($row=mysqli_fetch_array($ret)) 
{
	# code...


?>

						    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img  src="admin/productimages/<?php echo htmlentities($row['category']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['category']);?>/<?php echo htmlentities($row['productImage1']);?>"  width="200" height="200" alt=""></a>
			</div><!-- /.image -->			

			                        		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					Rs.<?php echo htmlentities($row['productPrice']);?>			</span>
										     <span style="color:red;font-weight:bold;text-decoration:line-through;font-size:15px;">Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']);?>	</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
		<?php if($row['productAvailability']=='In Stock'){?>
					<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary" style="border-radius:50px;background: linear-gradient(to right, #FF4B2B, #FF416C);color:white;">Add to Cart</a></div>
				<?php } else {?>
						<div class="action" style="color:red">Out of Stock</div>
					<?php } ?>
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	<?php } ?>

			</div><!-- /.home-owl-carousel -->
					</div><!-- /.product-slider -->
				</div>
	
			</div>
		</div>
		    

         <!-- ============================================== TABS ============================================== -->
		 
		

<?php include('includes/products-slider.php');?>
</div>
</div>



<?php include('includes/footer.php');?>
	
	
	
	<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"> </script>
	
	
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
	
	
	<srdcript src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
	
		$(document).ready
		(
		function()
		{ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		}
		);

		$(window).bind("load", function() 
		{
		   $('.show-theme-options').delay(2000).trigger('click');
		}
		);
		
		function googleTranslateElementInit()
		{

			new google.translate.TranslateElement
			(
			{

			pageLanguage: 'en'

			}, 'google_translate_element')
			;

		}
		
	
		</script>


	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>
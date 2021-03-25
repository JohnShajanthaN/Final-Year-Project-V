<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{

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

	    <title>User Order History</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
		<link rel="shortcut icon" href="assets/images/favicon.ico">
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

	</head>
	
    <body class="cnt-home">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<!-- ============================================== HEADER : END ============================================== -->


<div class="body-content outer-top-xs">

<div class="body-content outer-top-xs" style="margin-top:-120px;">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
	<div class="table-responsive">
	
	<h2 style="text-align:center;color:purple;font-weight:bold;text-shadow:0px 1px orange;"> Bill Summary</h2>
<form name="cart" method="post">

<table class="table table-bordered" style="margin-top:-450px;">

<thead>
			
			<!--
				<tr style="background-color:lightgreen;">
					<th class="cart-romove item"><?php echo htmlentities($row['orderDate']);?> </th>
					
					<th class="cart-romove item">Food_Mafia (Pvt) Ltd</th>
					<th colspan="3" class="cart-romove item">No:31, Madathady Lane, Kondavil West, Jaffna, Sri Lanka</th>
					<th class="cart-romove item">Bill Number : <?php echo htmlentities($row['bill_no']);?></th>
				</tr>
			-->
			
				<tr style="background: linear-gradient(to right, #FF4B2B, #FF416C);color:white;">
					<th class="cart-romove item">#</th>
					<th class="cart-product-name item">Bill No</th>
					<th class="cart-qty item">Total Quantity</th>
					<th class="cart-sub-total item">Total Amount</th>
					<th class="cart-sub-total item">Delivery Charge</th>
					<th class="cart-total item">Grand Total</th>
				</tr>
							
				
				</thead><!-- /thead -->

<?php 

$query2=mysqli_query($con,"select distinct bill_no,orderDate from orders where orders.userId='".$_SESSION['id']."' ORDER BY bill_no ASC");

while($row=mysqli_fetch_array($query2))
{
  $cnt=$cnt+1;
?>


<?php 
 $query=mysqli_query($con,"select orders.bill_no,sum(orders.quantity) as qty,products.productPrice as pprice,sum((products.productPrice*orders.quantity)) as tamount,products.deliveryCharge as shippingcharge from orders join products on orders.productId=products.id where orders.userId='".$_SESSION['id']."' and orders.bill_no='".$row['bill_no']."' GROUP BY orders.bill_no");

 // $total_amount=0;

 while($row=mysqli_fetch_array($query))
 {	
?>				
			
				<tbody>

				<tr align="center" style="background: linear-gradient(to right, #00452B, #00416C);color:white;">
				
					<td>
					<h5 class='cart-product-description'>
					<?php echo $cnt;?>
					</h5>
					</td>
					
					<td class="cart-product-name-info">
						<h5 class='cart-product-description'>
						<?php echo $row['bill_no'];?> 
						</h5>
					</td>
				
					
					<td class="cart-product-quantity">
					<h5 class='cart-product-description'>
						<?php echo $qty=$row['qty']; ?>   
					</h5>
		            </td>
					
					<td class="cart-product-sub-total">
					<h5 class='cart-product-description'>
					Rs <?php echo $row['tamount']; ?>.00  
					</h5>
					</td>
					
					<td class="cart-product-sub-total"> 
					<h5 class='cart-product-description'>
					Rs <?php echo $shippcharge=$row['shippingcharge']; ?>.00  
					</h5>
					</td>
					
					<td class="cart-product-grand-total">
					<h5 class='cart-product-description'>
					Rs <?php echo $row['tamount']+$row['shippingcharge'];?>.00
					</h5>
					</td>
					
					
				</tr>
				
				
				
<?php 
 $total_amount=$total_amount+$row['tamount'];
 $total_qty=$total_qty+$qty;
 }
?>

					<!--
					<tr style="background-color:lightyellow;">
					
					<td colspan="5"> <h4 class='cart-product-description' align="right"> Total Bill Amount </h4> </td>
					<td> <h4 class='cart-product-description' align="center"> Rs <?php echo $total_amount;?>.00 </h4> </td>
					
					</tr>
					-->
					
<br>
<br>				

<?php 
} 
?>
<tr style="background: linear-gradient(to right, #00002B, #005100);color:white;">
					
					<td> <h4 class='cart-product-description' align="right"> Number Of Orders </h4> </td>
					<td> <h4 class='cart-product-description' align="center">  <?php echo $cnt;?> </h4> </td>
					
					<td> <h4 class='cart-product-description' align="right"> Number Of Quantity </h4> </td>
					<td> <h4 class='cart-product-description' align="center"> <?php echo $total_qty;?> </h4> </td>
					
					<td> <h4 class='cart-product-description' align="right"> Total Amount </h4> </td>
					<td> <h4 class='cart-product-description' align="center"> Rs <?php echo $total_amount;?>.00 </h4> </td>
					
					</tr>
		
			</tbody><!-- /tbody -->
		</table><!-- /table -->
		
	</div>
</div>

		</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
		</form>
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<?php echo include('includes/brands-slider.php');?>
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->




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
<?php } ?>
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

<?php 

$query2=mysqli_query($con,"select distinct bill_no,orderDate from orders where orders.userId='".$_SESSION['id']."' ORDER BY bill_no DESC");

while($row=mysqli_fetch_array($query2))
{
?>

<div class="body-content outer-top-xs" style="margin-top:-120px;">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
	<div class="table-responsive">
<form name="cart" method="post">
<table class="table table-bordered">

<thead>
			
				<tr>
					<th class="cart-romove item"><?php echo htmlentities($row['orderDate']);?> </th>
					
					<th class="cart-romove item">Food_Mafia (Pvt) Ltd</th>
					<th colspan="3" class="cart-romove item">No:31, Madathady Lane, Kondavil West, Jaffna, Sri Lanka</th>
					<th class="cart-romove item">Bill Number : <?php echo htmlentities($row['bill_no']);?></th>
				</tr>
			
				<tr>
					<th class="cart-romove item">Item Nums</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Unit Price</th>
					<th class="cart-sub-total item">Shipping Charge</th>
					<th class="cart-total item">Grand Total</th>
				</tr>
				
				</thead><!-- /thead -->

<?php $query=mysqli_query($con,"select products.productName as pname,products.category as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id 
 where bill_no='".$row['bill_no']."' and orders.userId='".$_SESSION['id']."' and orders.paymentMethod is not null");
$cnt=1;
$total_amount=0;
while($row=mysqli_fetch_array($query))
{
?>

				
			
				<tbody>

				<tr align="center">
				
					<td>
					<h5 class='cart-product-description'>
					<?php echo $cnt;?>
					</h5>
					</td>
					
					<td class="cart-product-name-info">
						<h5 class='cart-product-description'>
						<?php echo $row['pname'];?> 
						</h5>
					</td>
					
					<td class="cart-product-quantity">
					<h5 class='cart-product-description'>
						<?php echo $qty=$row['qty']; ?>   
					</h5>
		            </td>
					
					<td class="cart-product-sub-total">
					<h5 class='cart-product-description'>
					Rs <?php echo $price=$row['pprice']; ?>.00  
					</h5>
					</td>
					
					<td class="cart-product-sub-total"> 
					<h5 class='cart-product-description'>
					Rs <?php echo $shippcharge=$row['shippingcharge']; ?>.00  
					</h5>
					</td>
					
					<td class="cart-product-grand-total">
					<h5 class='cart-product-description'>
					Rs <?php echo (($qty*$price)+$shippcharge);?>.00
					</h5>
					</td>
					
					
				</tr>
				
<?php $cnt=$cnt+1;
$total_amount=$total_amount+(($qty*$price)+$shippcharge);
}
?>

					<tr>
					
					<td colspan="5"> <h4 class='cart-product-description' align="right"> Total Bill Amount </h4> </td>
					<td> <h4 class='cart-product-description' align="center"> Rs <?php echo $total_amount;?>.00 </h4> </td>
					
					</tr>
					
					<tr>
					<td colspan="6"> </td>
					</tr>

<?php 
} 
?>

					

				
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
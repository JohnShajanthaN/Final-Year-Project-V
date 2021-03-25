<?php 
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Today Orders</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
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

<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container-fluid">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span10">
					<div class="content">
	

	<div class="module">
							<div class="module-head">
								<h3>Sales Summary</h3>
							</div>
							<div class="module-body">
	<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table display table-responsive" style="margin-top:-700px;">

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
					<th class="cart-product-name item">Bill No</th>									
					<th class="cart-product-name item">Username</th>
					<th class="cart-qty item">Total Quantity</th>
					<th class="cart-sub-total item">Total Amount</th>
					<th class="cart-sub-total item">Delivery Charge</th>
					<th class="cart-total item">Grand Total</th>
				</tr>
							
				
				</thead><!-- /thead -->

<?php 

$query2=mysqli_query($con,"select distinct bill_no,orderDate from orders ORDER BY bill_no ASC");

while($row=mysqli_fetch_array($query2))
{
  $cnt=$cnt+1;
?>


<?php 
 $query=mysqli_query($con,"select users.name as uname,orders.bill_no,sum(orders.quantity) as qty,products.productPrice as pprice,sum((products.productPrice*orders.quantity)) as tamount,products.deliveryCharge as shippingcharge from products join orders on products.id=orders.productId join users on orders.userId=users.id where orders.bill_no='".$row['bill_no']."' GROUP BY orders.bill_no");

 // $total_amount=0;

 while($row=mysqli_fetch_array($query))
 {	
?>				
			
				<tbody>

				<tr align="center">
									
					
					<td class="cart-product-name-info">
						<h5 class='cart-product-description'>
						<?php echo $row['bill_no'];?> 
						</h5>
					</td>
					
					<td class="cart-product-name-info">
						<h5 class='cart-product-description'>
						<?php echo $row['uname'];?> 
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
<tr  style="background: linear-gradient(to left,yellow,orange);color:white;">
					
					<td> <h4 class='cart-product-description' align="right"> Number Of Orders </h4> </td>
					<td> <h4 class='cart-product-description' align="center">  <?php echo $cnt;?> </h4> </td>
					
					<td> <h4 class='cart-product-description' align="right"> Number Of Quantity </h4> </td>
					<td> <h4 class='cart-product-description' align="center"> <?php echo $total_qty;?> </h4> </td>
					
					<td> <h4 class='cart-product-description' align="right"> Total Sales </h4> </td>
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
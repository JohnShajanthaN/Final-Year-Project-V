
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else
{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from products where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Product deleted !!";
		  }

$var = $_GET['var'];

/*
$myVar = $var;
$myVar = "2";
var_dump($myVar); // string '13' (length=2)
$myVar= $myVar +0; // or $myVar+= 0
var_dump($myVar); // int 13
echo $myVar;
*/
?>


		  
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Manage Users</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	
	<style>
	
	#show
{
    display:none;
}



	</style>
<script>
function myFunction() {
  alert("Copy the  link for share your bill!<br> localhost/final/admin/view-bill.php");
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
							
								<h3>View Bills</h3>
	<div style="margin-left:620px;margin-top:-22px;">
									
    <form name="search" method="post" action="">
	
            <input class="search-field" placeholder="Search" name="product" required="required" style="padding-left:10px;border-color:darkgrey;border-radius:100px;width:200px;height:25px;font-weight:bold;font-size:14px;" />

            <button class="btn btn-success" type="submit" name="search" style="font-weight:bold;font-size:16px;height:30px;border-radius:200px;width:90px;border-color:darkgrey;"> search </button>   
        
    </form>
	
	</div>
	



							</div>
							
							<div class="module-body table">
							
							<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>
							
					<br />
										
<?php $query=mysqli_query($con,"select distinct orders.bill_no,orders.orderDate,orders.paymentMethod,orders.userId,users.name,users.email,users.email  
from orders join users on orders.userId=users.id where bill_no =$var");


while($row=mysqli_fetch_array($query))
{
?>
				<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered display" width="100%">
																	
				<tbody>
				
			<thead>
									
				<tr style="background-color:lightgreen;"> 
											
				<th style="text-align:center;font-weight:bold;" width="60px">Bill No</th>
				<th style="text-align:center;font-weight:bold;" width="60px">User Name</th>
				<th style="text-align:center;font-weight:bold;" width="100px">Email Address</th>
				<th style="text-align:center;font-weight:bold;" width="100px">Order Date</th>
				<th style="text-align:center;font-weight:bold;" width="60px">Payment Method</th>
				<th style="text-align:center;font-weight:bold;" width="450px">Action</th>
										
				</tr>
										
				</thead>
				
				<tr style="background-color:lightyellow;">
				
					<td width="87px" style="text-align:center;"><?php echo $row['bill_no']; ?>  </td>
					<td width="137px" style="text-align:center;"><?php echo $row['name']; ?>  </td>
					<td width="137px" style="text-align:center;"><?php echo $row['email']; ?>  </td>
					<td width="137px" style="text-align:center;"><?php echo $row['orderDate']; ?>  </td>
					<td width="199px" style="text-align:center;"><?php echo $row['paymentMethod'];?> </td>		
					<td style="text-align:center;"> 
					<button type="button" onclick="show()" name="view" class="btn btn-primary" style="width:80px;border-radius:50px;"> <a href="manage-bills.php" style="text-decoration:none;color:white;"> Back </button> 
					<button type="button"  name="share" class="btn btn-warning" style="width:80px;border-radius:50px;" onclick="myFunction()">  Share </button> 
					</td>
			
				</tr>
				
				</tbody>
				
				</table>
				
				<br>
							
				<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered display" width="100%">
																	
				<tbody>
				
				<tr style="background-color:orange;">
				
				<th style="text-align:center;font-weight:bold;" width="60px">#</th>
				<th style="text-align:center;font-weight:bold;" width="60px">Product Name</th>
				<th style="text-align:center;font-weight:bold;" width="100px">Quantity</th>
				<th style="text-align:center;font-weight:bold;" width="100px">Unit Price</th>
				<th style="text-align:center;font-weight:bold;" width="60px">Shipping Charge</th>
				<th style="text-align:center;font-weight:bold;" width="405px">Grand Total</th>
				
				</tr>	
				
<?php $query1=mysqli_query($con," select products.productName as pname,products.category as 
proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as
 shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products 
 on orders.productId=products.id where bill_no='".$row['bill_no']."'");
$cnt=1;
$total_amount=0;
while($row=mysqli_fetch_array($query1))
{
?>

				<tr align="center" style="background-color:lightyellow;">
				
					<td width="87px" style="text-align:center;">
					<h5 class='cart-product-description'>
					<?php echo $cnt;?>
					</h5>
					</td>
					
					<td width="197px" class="cart-product-name-info" style="text-align:center;">
						<h5>
						<?php echo $row['pname'];?> 
						</h5>
					</td>
					
					<td width="137px" class="cart-product-quantity" style="text-align:center;">
					<h5>
						<?php echo $qty=$row['qty']; ?>   
					</h5>
		            </td>
					
					<td width="137px" class="cart-product-sub-total" style="text-align:center;">
					<h5>
					Rs <?php echo $price=$row['pprice']; ?>.00  
					</h5>
					</td>
					
					<td width="199px" class="cart-product-sub-total" style="text-align:center;"> 
					<h5>
					Rs <?php echo $shippcharge=$row['shippingcharge']; ?>.00  
					</h5>
					</td>
					
					<td width="150px" class="cart-product-grand-total" style="text-align:center;">
					<h5>
					Rs <?php echo (($qty*$price)+$shippcharge);?>.00
					</h5>
					</td>
					
					
				</tr>
				
<?php $cnt=$cnt+1;
$total_amount=$total_amount+(($qty*$price)+$shippcharge);
}
?>

					<tr>
					
					<td colspan="5" style="text-align:center"> <h4 align="right"> Total Bill Amount </h4> </td>
					<td style="text-align:center"> <h4 align="center"> Rs <?php echo $total_amount;?>.00 </h4> </td>
					
					</tr>
					
					</tbody>
					</table>
					
					<br>
					<br>
					
					
					
<?php 
} 
?>		
							
					</div>
					</div>
							

					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	
	<script>
	
		$(document).ready(function() 
		{
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
		
		 function show()
        {
         
        var a=document.getElementById("show");
        
        if(a.style.display==="none")
        {
           a.style.display="block";
        }
        
        else
        {
           a.style.display="none";
        }
       
        }
		
	</script>
	
</body>
<?php } ?>

<?php 

 if(isset($_Get['action'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;
			}
		}
		}
	}
?>
	<div class="main-header">
		<div class="container-fluid">
			<div class="row">

<!-- Search Box-->
<div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">

<div class="search-area" style="border-style:none;">

    <form name="search" method="post" action="search-result.php">
	
            <input class="search-field" placeholder="Search Your Favourite Foods Here" name="product" required="required" style="border-style:solid;border-width:1px;border-color:purple;border-radius:200px;width:540px;height:50px;margin-top:4px;font-weight:bold;font-size:14px;" />

            <button class="search-button" type="submit" name="search" style="border-style:solid;border-width:1px;height:47px;margin-top:4px;border-radius:200px;width:100px;border-color:purple;"> </button>   
        
    </form>
	
</div>

</div>

<!--Shopping Cart-->
<div class="col-xs-12 col-sm-12 col-md-6 animate-dropdown top-cart-row">		
<?php
if(!empty($_SESSION['cart'])){
	?>
	<div class="dropdown dropdown-cart" >
		<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
		
			<div class="items-cart-inner">
			
				<div class="total-price-basket">
					<span class="lbl" style="color:purple;font-weight:bold;text-shadow:0px 1px orange"> cart -  </span>
					<span class="total-price" style="color:purple;font-weight:bold;font-size:14px;">
						<span class="sign">Rs.</span>
						<span class="value"><?php echo $_SESSION['tp']; ?></span>
					</span>
				</div>
				
				<div class="basket" style="background:purple;color:white;">
					<i class="glyphicon glyphicon-shopping-cart"></i>
				</div>
				
				<div class="basket-item-count"><span class="count"><?php echo $_SESSION['qnty'];?></span></div>
			
		    </div>
		</a>
		<ul class="dropdown-menu">
		
		 <?php
    $sql = "SELECT * FROM products WHERE id IN(";
			foreach($_SESSION['cart'] as $id => $value){
			$sql .=$id. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
			$query = mysqli_query($con,$sql);
			$totalprice=0;
			$totalqunty=0;
			if(!empty($query)){
			while($row = mysqli_fetch_array($query)){
				$quantity=$_SESSION['cart'][$row['id']]['quantity'];
				$subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge'];
				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;

	?>
		
		
			<li>
				<div class="cart-item product-summary">
					<div class="row">
						<div class="col-xs-4">
							<div class="image">
								<a href="product-details.php?pid=<?php echo $row['id'];?>"><img  src="admin/productimages/<?php echo $row['category'];?>/<?php echo $row['productImage1'];?>" width="35" height="50" alt=""></a>
							</div>
						</div>
						<div class="col-xs-7">
							
							<h3 class="name"><a href="product-details.php?pid=<?php echo $row['id'];?>" style="color:purple;"><?php echo $row['productName']; ?></a></h3>
							<div class="price" style="color:green;">Rs <?php echo ($row['productPrice']+$row['shippingCharge']); ?>*<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?></div>
						</div>
						
					</div>
				</div><!-- /.cart-item -->
			
				<?php } }?>
				<div class="clearfix"></div>
			<hr>
		
			<div class="clearfix cart-total">
				<div class="pull-right">
					
						<span class="text" style="color:purple;font-weight:bold;text">TOTAL AMOUNT :</span> <span class='price' style="color:GREEN;">Rs.<?php echo $_SESSION['tp']="$totalprice". ".00"; ?></span>
						
				</div>
			
				<div class="clearfix"></div>
					
				<a href="my-cart.php" class="btn btn-upper btn-primary btn-block m-t-20" style="border-style:solid;border-width:1px;border-radius:200px;background:purple;font-weight:bold;">My Cart</a>	
			</div><!-- /.cart-total-->
					
				
		</li>
		</ul><!-- /.dropdown-menu-->
	</div><!-- /.dropdown-cart -->
<?php } else { ?>
<div class="dropdown dropdown-cart">
		<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
			<div class="items-cart-inner">
				<div class="total-price-basket">
					<span class="lbl">cart -</span>
					<span class="total-price">
						<span class="sign">Rs.</span>
						<span class="value">00.00</span>
					</span>
				</div>
				<div class="basket">
					<i class="glyphicon glyphicon-shopping-cart"></i>
				</div>
				<div class="basket-item-count"><span class="count">0</span></div>
			
		    </div>
		</a>
		<ul class="dropdown-menu">
		
	
		
		
			<li>
				<div class="cart-item product-summary">
					<div class="row">
						<div class="col-xs-12">
							Your Shopping Cart is Empty.
						</div>
						
						
					</div>
				</div><!-- /.cart-item -->
			
				
			<hr>
		
			<div class="clearfix cart-total">
				
				<div class="clearfix"></div>
					
				<a href="index.php" class="btn btn-upper btn-primary btn-block m-t-20">Continue Shooping</a>	
			</div><!-- /.cart-total-->
					
				
		</li>
		</ul><!-- /.dropdown-menu-->
	</div>
	<?php }?>




<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				</div><!-- /.top-cart-row -->
			</div><!-- /.row -->

		</div><!-- /.container -->

	</div>
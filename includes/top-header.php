<?php 
//session_start();

?>

<!--
<script async>
	
	(
	function(w, d) 
	{ w.CollectId = "5f41eb77b08dec28f8442a6f"; 
	var h = d.head || d.getElementsByTagName("head")[0]; 
	var s = d.createElement("script"); 
	s.setAttribute("type", "text/javascript"); 
	s.setAttribute("src", "https://collectcdn.com/launcher.js"); 
	h.appendChild(s); 
	}
	)
	(window, document);
	
</script>
-->

<script src="https://apps.elfsight.com/p/platform.js" defer></script>

<div class="elfsight-app-7298b2b0-f2df-48e9-a768-f59b4cad3b85"></div>


<div class="top-bar animate-dropdown" style="background: linear-gradient(to right, #FF4B2B, #FF416C);color:white;">

	<div class="container-fluid">
	
		<div class="header-top-inner">
		
			<div class="cnt-account">
			
				<ul class="list-unstyled" style="font-size:15px;">

<?php if(strlen($_SESSION['login']))
    {   ?>
				<li>
				<a href="#" style="color:purple;font-weight:bold;"><i class="icon fa fa-user"></i>Welcome -<?php echo htmlentities($_SESSION['username']);?></a>
				</li>
				<?php } ?>


					<li><img src="img/favicon.png" width="25" height="25"> </li>
					
					<li><a href="my-account.php" style="color:white;font-weight:bold;"><i class="icon fa fa-user"></i>My Account</a></li>
					
					<li><a href="my-cart.php" style="color:white;font-weight:bold;"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
					
					<?php if(strlen($_SESSION['login'])==0)
    {   ?>
<li><a href="login.php" style="color:white;font-weight:bold;""><i class="icon fa fa-sign-in"></i>Login</a></li>
<?php }
else{ ?>
	
				<li><a href="logout.php" style="color:white;font-weight:bold;"><i class="icon fa fa-sign-out"></i>Logout</a></li>
				<?php } ?>	
				</ul>
			</div><!-- /.cnt-account -->

	
				<div class="cnt-block">
					
				<ul class="list-unstyled list-inline">
			
					<li class="dropdown dropdown-small">
					<a href="track-orders.php" style="background-color:purple;color:white;margin-top:6px;font-weight:bold;border-radius:50px;border-style:none;font-size:14px;">Track Order</a>
					</li>
					

				</ul>
				
				</div>
				
			
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->
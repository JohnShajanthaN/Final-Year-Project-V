<div class="side-menu animate-dropdown outer-bottom-xs" >
    <div class="head" style="background: linear-gradient(to right, #FF4B2B, #FF416C);color:white;"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
  
        <ul class="nav">
            <li class="dropdown menu-item">
						
              <?php $sql=mysqli_query($con,"select id,categoryName  from category");
while($row=mysqli_fetch_array($sql))
{
    ?>
                <a href="category.php?cid=<?php echo $row['id'];?>" class="dropdown-toggle"><i class="icon fa fa-desktop fa-fw"></i>
				<font style="color:purple;font-weight:bold;text-shadow:0px 1px orange">
                <?php echo $row['categoryName'];?></a>
				</font>
                <?php }?>
				
                        
</li>
</ul>
    </nav>
</div>
<?php
session_start();
include_once 'includes/config.php';
$oid=intval($_GET['oid']);
 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Order Tracking Details</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Order Tracking Details !</b></div></td>
      
    </tr>
    <tr height="30">
      <td  class="fontkink1"><b>Bill No:</b></td>
      <td  class="fontkink"><?php echo $oid;?></td>
    </tr>
    <?php 
$ret = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='$oid'");

$ret1 = mysqli_query($con,"SELECT * FROM orders WHERE bill_no='$oid'");

$num=mysqli_num_rows($ret1);
if($num>0)
{
if($row=mysqli_fetch_array($ret1))
      
	  {
     ?>

      <tr height="20">
      <td class="fontkink1" ><b>Order Date:</b></td>
      <td  class="fontkink"><?php echo $row['orderDate'];?></td>
    </tr>
     <tr height="20">
      <td  class="fontkink1"><b>Payment Method:</b></td>
      <td  class="fontkink"><?php echo $row['paymentMethod'];?></td>
    </tr>
     <tr height="20">
      <td  class="fontkink1"><b>Order Status:</b></td>
      <td  class="fontkink"><?php echo $row['orderStatus'];?></td>
    </tr>
	 <tr height="20">
      <td  class="fontkink1"><b>Delivery Time:</b></td>
      <td  class="fontkink"><?php echo $row['delivery_time'];?></td>
    </tr>

   
    <tr>
      <td colspan="2"><hr /></td>
    </tr>
   <?php } 
}
   
else
{
   ?>
   <tr>
   <td colspan="2"></td>
   </tr>
 <?php  }
  ?>
</table>
 </form>
</div>

</body>
</html>

     
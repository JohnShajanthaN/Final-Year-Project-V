<?php
session_start();

include_once 'include/config.php';
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
$oid=intval($_GET['oid']);
if(isset($_POST['submit2'])){
$status=$_POST['status'];
$remark=$_POST['remark'];//space char

date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d h:i:s A', time () );


$query=mysqli_query($con,"insert into ordertrackhistory(orderId,status,remark) values('$oid','$status','$remark')");

//$sql=mysqli_query($con,"update orders set orderStatus='$status' where id='$oid'");

$sql=mysqli_query($con,"update orders set orderStatus='$status',delivery_time='$currentTime' where bill_no='$oid'");

echo "<script>alert('Order Updated sucessfully...');</script>";
//}
}

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
<title>Admin | Update Orders</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Update Order !</b></div></td>
      
    </tr>
    <tr height="30">
      <td  class="fontkink1"><b>Bill No:</b></td>
      <td  class="fontkink"><?php echo $oid;?></td>
    </tr>
    <?php 
$ret = mysqli_query($con,"SELECT DISTINCT bill_no,orderDate,paymentMethod,orderStatus,delivery_time FROM orders WHERE bill_no='$oid'");
     if($row=mysqli_fetch_array($ret))
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
	
    <tr>
      <td colspan="2"><hr /></td>
    </tr>
   <?php } ?>
   <?php 
$st='Delivered';
   $rt = mysqli_query($con,"SELECT DISTINCT bill_no,orderStatus FROM orders WHERE bill_no='$oid'");
     if($num=mysqli_fetch_array($rt))
     {
     $currrentSt=$num['orderStatus'];
	}
	
     if($st==$currrentSt)
     { 
	?>
   <tr><td colspan="2"><b>
      Product Delivered Successfully !!!</b></td>
   <?php 
   }
   
   else  
   {
      ?>
    <tr height="50">
      <td class="fontkink1">Order Status: </td>
      <td  class="fontkink"><span class="fontkink1" >
        <select name="status" class="fontkink" required="required" >
          <option value="">Select Status</option>
                 <option value="in Process">In Process</option>
                  <option value="Delivered">Delivered</option>
        </select>
        </span></td>
    </tr>

     <tr style=''>
      <td class="fontkink1" >Remark:</td>
      <td class="fontkink" align="justify" ><span class="fontkink">
        <textarea cols="50" rows="7" name="remark"  required="required" ></textarea>
        </span></td>
    </tr>
    <tr>
      <td class="fontkink1">&nbsp;</td>
      <td  >&nbsp;</td>
    </tr>
    <tr>
      <td class="fontkink">       </td>
      <td  class="fontkink"> <input type="submit" name="submit2"  value="update"   size="40" style="cursor: pointer;" /> &nbsp;&nbsp;   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this Window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
<?php } ?>
</table>
 </form>
</div>

</body>
</html>
<?php } ?>

     
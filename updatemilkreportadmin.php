<?php include('updatemilkreportadmininc.php');
 if(isset($_GET['id'])){
	 $id =$_GET['id'];
	 $edit_state = true;
	 $rec =mysqli_query($db, "SELECT * FROM milkreport WHERE id=$id");
	 $record =mysqli_fetch_array($rec);
	 $id =$record['id'];
	 $month =$record['month'];
	 $amount =$record['amount'];
	 $total =$record['total'];
 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>The Ranch Dairy Farm Management</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
  <div class="header">
  	<h2>Update</h2>
  </div>
  <form method="post" action="updatemilkreportadmin.php">
   <?php include('errors.php'); ?>
    <div class="input-group">
	<input type="hidden" name="id" value="<?php echo $id;?>">
  <div class="input-group">
  	  <label>Month</label>
  	  <input type="text" name="month" value ="<?php echo $month;?>">
  	</div>
	<div class="input-group">
	 <label>Amount</label>
	 <input type="text" name="amount"value ="<?php echo $amount;?>">
	</div>
	<div class="input-group">
	 <label>Total Amount</label>
	 <input type="text" name="total"value ="<?php echo $total;?>">
	</div>
	<div class="input-group">
	<button type="submit" class="btn" name="update">Update</button>
  	</div>
  	<p>
  	 <a href="viewmilksalereportadmin.php">Return to view</a>
  	</p>
  </form>
</body>
</html>

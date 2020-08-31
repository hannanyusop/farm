<?php include('updateexpensesinc.php');
 if(isset($_GET['id'])){
	 $id =$_GET['id'];
	 $edit_state = true;
	 $rec =mysqli_query($db, "SELECT * FROM expenses WHERE id=$id");
	 $record =mysqli_fetch_array($rec);
	 $id =$record['id'];
	 $date =$record['date'];
	 $purpose =$record['purpose'];
	 $details =$record['details'];
	 $total =$record['total'];
 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>The Ranch Dairy Farm Management</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Update</h2>
  </div>
  <form method="post" action="updateexpenses.php">
   <?php include('errors.php'); ?>
    <div class="input-group">
	<input type="hidden" name="id" value="<?php echo $id;?>">
  <div class="input-group">
  	  <label>Date</label>
  	  <input type="text" name="date" value ="<?php echo $date;?>">
  	</div>
	<div class="input-group">
	 <label>Purpose</label>
	 <input type="text" name="purpose"value ="<?php echo $purpose;?>">
	</div>
	<div class="input-group">
	 <label> Details</label>
	 <input type="text" name="details"value ="<?php echo $details;?>">
	</div>
	<div class="input-group">
	 <label>Total Amount</label>
	 <input type="text" name="total"value ="<?php echo $total;?>">
	</div>
	<div class="input-group">
	<button type="submit" class="btn" name="update">Update</button>
  	</div>
  	<p>
  	 <a href="viewexpenses.php">Return to view</a>
  	</p>
  </form>
</body>
</html>

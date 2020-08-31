<?php include('expensesadminnc.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>The Ranch Dairy Farm Management</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
  <div class="header">
  	<h2>Create New Expenses</h2>
  </div>
	
  <form method="post" action="expensesadmin.php">
    <?php echo display_error(); ?>
  	<div class="input-group">
  	  <label>Date</label>
  	  <input type="date" name="date" value="<?php echo $date; ?>">
  	</div>
	<div class="input-group">
	 <label>Purpose</label>
	 <input type="purpose" name="purpose" value="<?php echo $purpose; ?>">
	</div>
	<div class="input-group">
	 <label>Details</label>
	 <input type="details" name="details" value="<?php echo $details; ?>">
	</div>
	<div class="input-group">
	 <label>Total amount</label>
	 <input type="total" name="total" value="<?php echo $total; ?>">
	</div>
	
 	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_add">Add</button>
  	</div>
	<p>
  	 <a href="homereport.php">Return to Report</a>
  	</p>
  </form>
</body>
</html>
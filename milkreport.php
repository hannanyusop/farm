<?php include('milkreportinc.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>The Ranch Dairy Farm Management</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Create New Milk Sales</h2>
  </div>
	
  <form method="post" action="milkreport.php">
    <?php echo display_error(); ?>
	<div class="input-group">
	 <label>Month</label>
	 <input type="month" name="month" value="<?php echo $month; ?>">
	</div>
	<div class="input-group">
	 <label>Amount (Litre)</label>
	 <input type="amount" name="amount" value="<?php echo $amount; ?>">
	</div>
	<div class="input-group">
	 <label>Total amount</label>
	 <input type="total" name="total" value="<?php echo $total; ?>">
	</div>
	
 	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_add">Add</button>
  	</div>
	<p>
  	 <a href="homereport1.php">Return to Report</a>
  	</p>
  </form>
</body>
</html>
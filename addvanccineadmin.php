<?php include('addvaccineadmininc.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>The Ranch Dairy Farm Management</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
  <div class="header">
  	<h2>Cow Vaccine Detalis</h2>
  </div>
	
  <form method="post" action="addvanccineadmin.php">
    <?php echo display_error(); ?>
  	<div class="input-group">
  	  <label>Date</label>
  	  <input type="date" name="date" value="<?php echo $date; ?>">
  	</div>
	<div class="input-group">
	 <label>Stall No</label>
	 <input type="stallno" name="stallno" value="<?php echo $stallno; ?>">
	</div>
	<div class="input-group">
	 <label>Animal ID</label>
	 <input type="animalid" name="animalid" value="<?php echo $animalid; ?>">
	</div>
	<div class="input-group">
	 <label>Vaccine Status / Type Of Vaccine</label>
	 <input type="vaccine" name="vaccine" value="<?php echo $vaccine; ?>">
	</div>
	<div class="input-group">
	 <label>Notes/Reminder</label>
	 <input type="notes" name="notes" value="<?php echo $notes; ?>">
	</div>
	
 	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_add">Add</button>
  	</div>
	<p>
  	 <a href="home.php">Return to Homepage</a>
  	</p>
  </form>
</body>
</html>
<?php include('addmilksaleadmininc.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>The Ranch Dairy Farm Management</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
  <div class="header">
  	<h2>Milk Sale</h2>
  </div>
	
  <form method="post" action="addmilksaleadmin.php">
    <?php echo display_error(); ?>
  	<div class="input-group">
  	  <label>Date</label>
  	  <input type="date" name="date" value="<?php echo $date; ?>">
  	</div>
	<div class="input-group">
	 <label>Account No</label>
	 <input type="accno" name="accno" value="<?php echo $accno; ?>">
	</div>
	<div class="input-group">
	 <label>Name</label>
	 <input type="name" name="name" value="<?php echo $name; ?>">
	</div>
	<div class="input-group">
	 <label>Contact</label>
	 <input type="contact" name="contact" value="<?php echo $contact; ?>">
	</div>
	<div class="input-group">
	 <label>Email</label>
	 <input type="email" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
	 <label>Litre</label>
	 <input type="litre" name="litre" value="<?php echo $litre; ?>">
	</div>
	<div class="input-group">
	 <label>Price</label>
	 <input type="price" name="price" value="<?php echo $price; ?>">
	</div>
	<div class="input-group">
			<label>Payment Status</label>
			<select name="paymentstatus" id="paymentstatus" >
				<option value=""></option>
				<option value="done">Done</option>
				<option value="pending">Pending</option>
			</select>
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
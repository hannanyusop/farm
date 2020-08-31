<?php include('updatemilksaleadmininc.php');
 if(isset($_GET['id'])){
	 $id =$_GET['id'];
	 $edit_state = true;
	 $rec =mysqli_query($db, "SELECT * FROM milksales WHERE id=$id");
	 $record =mysqli_fetch_array($rec);
	 $id =$record['id'];
	 $date =$record['date'];
	 $accno =$record['accno'];
	 $name =$record['name'];
	 $contact =$record['contact'];
	 $email =$record['email'];
	 $litre =$record['litre'];
	 $price =$record['price'];
	 $paymentstatus =$record['paymentstatus'];
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
  <form method="post" action="updatemilksaleadmin.php">
   <?php include('errors.php'); ?>
    <div class="input-group">
	<input type="hidden" name="id" value="<?php echo $id;?>">
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
			<select name="paymentstatus" id="paymentstatus" value ="<?php echo $paymentstatus; ?>" >
				<option value="done">Done</option>
				<option value="pending">Pending</option>
			</select>
		</div>
	<div class="input-group">
	<button type="submit" class="btn" name="update">Update</button>
  	</div>
  	<p>
  	 <a href="viewmilksaleadmin.php">Return to view</a>
  	</p>
  </form>
</body>
</html>

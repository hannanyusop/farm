<?php include('updatevaccineinc.php');
 if(isset($_GET['id'])){
	 $id =$_GET['id'];
	 $edit_state = true;
	 $rec =mysqli_query($db, "SELECT * FROM vaccine WHERE id=$id");
	 $record =mysqli_fetch_array($rec);
	 $id =$record['id'];
	 $date =$record['date'];
	 $stallno =$record['stallno'];
	 $animalid =$record['animalid'];
	 $vaccine =$record['vaccine'];
	 $notes =$record['notes'];
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
  <form method="post" action="updatevaccine.php">
   <?php include('errors.php'); ?>
    <div class="input-group">
	<input type="hidden" name="id" value="<?php echo $id;?>">
  <div class="input-group">
  	  <label>Date</label>
  	  <input type="text" name="date" value ="<?php echo $date;?>">
  	</div>
	<div class="input-group">
	 <label>Stall No</label>
	 <input type="text" name="stallno"value ="<?php echo $stallno;?>">
	</div>
	<div class="input-group">
	 <label>Animal ID</label>
	 <input type="text" name="animalid"value ="<?php echo $animalid;?>">
	</div>
	<div class="input-group">
	 <label>Vaccine Status / Type</label>
	 <input type="text" name="vaccine"value ="<?php echo $vaccine;?>">
	</div>
	<div class="input-group">
	 <label>Notes / Reminder</label>
	 <input type="text" name="notes"value ="<?php echo $notes;?>">
	</div>
	<div class="input-group">
	<button type="submit" class="btn" name="update">Update</button>
  	</div>
  	<p>
  	 <a href="viewvaccine.php">Return to view</a>
  	</p>
  </form>
</body>
</html>

<?php include('updateinc.php');
 if(isset($_GET['id'])){
	 $id =$_GET['id'];
	 $edit_state = true;
	 $rec =mysqli_query($db, "SELECT * FROM collectmilk WHERE id=$id");
	 $record =mysqli_fetch_array($rec);
	 $id =$record['id'];
	 $date =$record['date'];
	 $stallno =$record['stallno'];
	 $animalid =$record['animalid'];
	 $litre =$record['litre'];
	 $collectedby =$record['collectedby'];
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
  <form method="post" action="update.php">
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
	 <label>Litre</label>
	 <input type="text" name="litre"value ="<?php echo $litre;?>">
	</div>
  	<div class="input-group">
  	  <label>Collected By</label>
  	  <input type="text" name="collectedby"value ="<?php echo $collectedby;?>">
  	</div>
	<div class="input-group">
	<button type="submit" class="btn" name="update">Update</button>
  	</div>
  	<p>
  	 <a href="view.php">Return to view</a>
  	</p>
  </form>
</body>
</html>

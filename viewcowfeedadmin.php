<?php
include_once('viewcowfeedinc.php');
$query = "SELECT * FROM cowfeed";
$results = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html>
<head>
  <title>The Ranch Dairy Farm Management</title>
  <link rel="stylesheet" type="text/css" href="styleadminview.css">
</head>
<body>
<div class="header">
	<h2>View Cow Feed Details </h2>
</div><br>
<table>
      <tr>
		  <th>Id</th>
          <th>Date</th>
          <th>Stall No</th>
          <th>Animal ID</th>
          <th>Notes / Reminder</th>
		  <th colspan="2">Operation</th>
		  </tr>
		<?php
		while($rows=mysqli_fetch_assoc($results))
		{
	?>		
	        <tr>
			<td><?php echo $rows['id'];?></td>
			<td><?php echo $rows['date'];?></td>
			<td><?php echo $rows['stallno'];?></td>
			<td><?php echo $rows['animalid'];?></td>
			<td><?php echo $rows['notes'];?></td>
			<td><a href='updatecowfeedadmin.php?id=<?php echo $rows['id']; ?>& date=<?php echo $rows['date'];?>& stallno=<?php echo $rows['stallno'];?>& animalid=<?php echo $rows['animalid'];?>& notes=<?php echo $rows['notes'];?>'>Update</a></td>
			<td><a href='deletecowfeedadmin.php?id=<?php echo $rows['id']; ?>& date=<?php echo $rows['date'];?>& stallno=<?php echo $rows['stallno'];?>& animalid=<?php echo $rows['animalid'];?>& notes=<?php echo $rows['notes'];?>'>Delete</a></td>
			</tr>
		<?php	
		}
		?> 
    </table>
	</div>
	<div class="footer">
	<a href="home.php">Return to Homepage</a>
	</div>
	</html>
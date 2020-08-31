<?php
include_once('viewinc.php');
$query = "SELECT * FROM collectmilk";
$results = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html>
<head>
  <title>The Ranch Dairy Farm Management</title>
  <link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
<div class="header">
	<h2>View Milk Collection </h2>
</div><br>
<table>
      <tr>
		  <th>Id</th>
          <th>Date</th>
          <th>Stall No</th>
          <th>Animal ID</th>
          <th>Litre</th>
          <th>Collected By</th>
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
			<td><?php echo $rows['litre'];?></td>
			<td><?php echo $rows['collectedby'];?></td>
			<td><a href='update.php?id=<?php echo $rows['id']; ?>& date=<?php echo $rows['date'];?>& stallno=<?php echo $rows['stallno'];?>& animalid=<?php echo $rows['animalid'];?>& litre=<?php echo $rows['litre'];?>& collectedby=<?php echo $rows['collectedby'];?>'>Update</a></td>
			<td><a href='delete.php?id=<?php echo $rows['id']; ?>& date=<?php echo $rows['date'];?>& stallno=<?php echo $rows['stallno'];?>& animalid=<?php echo $rows['animalid'];?>& litre=<?php echo $rows['litre'];?>& collectedby=<?php echo $rows['collectedby'];?>'>Delete</a></td>
			</tr>
		<?php	
		}
		?> 
    </table>
	</div>
	<div class="footer">
	<a href="index.php">Return to Homepage</a>
	</div>
	</html>
<?php
include_once('viewinc.php');
$query = "SELECT * FROM milkreport";
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
	<h2>View Milk Sales </h2>
</div><br>
<table>
      <tr>
		  <th>Id</th>
          <th>Month</th>
          <th>Amount (Litres)</th>
          <th>Total Amount (RM)</th>
		  <th colspan="2">Operation</th>
		  </tr>
		<?php
		while($rows=mysqli_fetch_assoc($results))
		{
	?>		
	        <tr>
			<td><?php echo $rows['id'];?></td>
			<td><?php echo $rows['month'];?></td>
			<td><?php echo $rows['amount'];?></td>
			<td><?php echo $rows['total'];?></td>
			<td><a href='updatemilkreportadmin.php?id=<?php echo $rows['id']; ?>& month=<?php echo $rows['month'];?>& amount=<?php echo $rows['amount'];?>& total=<?php echo $rows['total'];?>'>Update</a></td>
			<td><a href='deletemilkreportadmin.php?id=<?php echo $rows['id']; ?>& month=<?php echo $rows['month'];?>& amount=<?php echo $rows['amount'];?>& total=<?php echo $rows['total'];?>'>Delete</a></td>
			</tr>
		<?php	
		}
		?> 
    </table>
	</div>
	<div class="footer">
	<a href="homereport.php">Return to Report</a>
	</div>
	</html>
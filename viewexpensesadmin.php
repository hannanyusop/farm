<?php
include_once('viewinc.php');
$query = "SELECT * FROM expenses";
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
	<h2>View Expenses </h2>
</div><br>
<table>
      <tr>
		  <th>Id</th>
          <th>Date</th>
          <th>Purpose</th>
          <th>Detais</th>
          <th>Total Amount</th>
		  <th colspan="2">Operation</th>
		  </tr>
		<?php
		while($rows=mysqli_fetch_assoc($results))
		{
	?>		
	        <tr>
			<td><?php echo $rows['id'];?></td>
			<td><?php echo $rows['date'];?></td>
			<td><?php echo $rows['purpose'];?></td>
			<td><?php echo $rows['details'];?></td>
			<td><?php echo $rows['total'];?></td>
			<td><a href='updateexpensesadmin.php?id=<?php echo $rows['id']; ?>& date=<?php echo $rows['date'];?>& purpose=<?php echo $rows['purpose'];?>& details=<?php echo $rows['details'];?>& total=<?php echo $rows['total'];?>'>Update</a></td>
			<td><a href='deleteexpensesadmin.php?id=<?php echo $rows['id']; ?>& date=<?php echo $rows['date'];?>& purpose=<?php echo $rows['purpose'];?>& details=<?php echo $rows['details'];?>& total=<?php echo $rows['total'];?>'>Delete</a></td>
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
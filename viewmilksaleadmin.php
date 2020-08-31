<?php
include_once('viewinc.php');
$query = "SELECT * FROM milksales";
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
	<h2>View Milk Collection </h2>
</div><br>
<table>
      <tr>
		  <th>Id</th>
          <th>Date</th>
          <th>Account No</th>
          <th>Name</th>
		  <th>Contact</th>
		  <th>Email</th>
          <th>Litre</th>
          <th>Price</th>
		  <th>Payment Status</th>
		  <th colspan="2">Operation</th>
		  </tr>
		<?php
		while($rows=mysqli_fetch_assoc($results))
		{
	?>		
	        <tr>
			<td><?php echo $rows['id'];?></td>
			<td><?php echo $rows['date'];?></td>
			<td><?php echo $rows['accno'];?></td>
			<td><?php echo $rows['name'];?></td>
			<td><?php echo $rows['contact'];?></td>
			<td><?php echo $rows['email'];?></td>
			<td><?php echo $rows['litre'];?></td>
			<td><?php echo $rows['price'];?></td>
			<td><?php echo $rows['paymentstatus'];?></td>
			<td><a href='updatemilksaleadmin.php?id=<?php echo $rows['id']; ?>& date=<?php echo $rows['date'];?>& accno=<?php echo $rows['accno'];?>& name=<?php echo $rows['name'];?>& contact=<?php echo $rows['contact'];?>& email=<?php echo $rows['email'];?>& litre=<?php echo $rows['litre'];?>& price=<?php echo $rows['price'];?>& paymentstatus=<?php echo $rows['paymentstatus'];?>'>Update</a></td>
			<td><a href='deletemilksalesadmin.php?id=<?php echo $rows['id']; ?>& date=<?php echo $rows['date'];?>& accno=<?php echo $rows['accno'];?>& name=<?php echo $rows['name'];?>& contact=<?php echo $rows['contact'];?>& email=<?php echo $rows['email'];?>& litre=<?php echo $rows['litre'];?>& price=<?php echo $rows['price'];?>& paymentstatus=<?php echo $rows['paymentstatus'];?>'>Delete</a></td>
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
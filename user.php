<?php
include_once('viewinc.php');
$query = "SELECT * FROM multi_user";
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
	<h2>View Users</h2>
</div><br>
<table>
      <tr>
		  <th>Id</th>
          <th>Full Name</th>
          <th>User Type</th>
		  <th>Email</th>
		  <th>Phone Number</th>
		  <th>IC Number</th>
		  <th>Address</th>
		  <th>Salary</th>
		  <th>Joining Date</th>
		  <th>Operation</th>
		  </tr>
		<?php
		while($rows=mysqli_fetch_assoc($results))
		{
	?>		
	        <tr>
			<td><?php echo $rows['id'];?></td>
			<td><?php echo $rows['fullname'];?></td>
			<td><?php echo $rows['usertype'];?></td>
			<td><?php echo $rows['email'];?></td>
			<td><?php echo $rows['phoneno'];?></td>
			<td><?php echo $rows['icnum'];?></td>
			<td><?php echo $rows['address'];?></td>
			<td><?php echo $rows['salary'];?></td>
			<td><?php echo $rows['joiningdate'];?></td>
			<td><a href='deladmin.php?id=<?php echo $rows['id']; ?>& username=<?php echo $rows['username'];?>& fullname=<?php echo $rows['fullname'];?>& usertype=<?php echo $rows['usertype'];?>& email=<?php echo $rows['email'];?>& phoneno=<?php echo $rows['phoneno'];?>& icnum=<?php echo $rows['icnum'];?>& address=<?php echo $rows['address'];?>& salary=<?php echo $rows['salary'];?>& joiningdate=<?php echo $rows['joiningdate'];?>& password=<?php echo $rows['password'];?>'>Delete</a></td>
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
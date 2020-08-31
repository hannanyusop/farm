<?php
$search_result ="";
if(isset($_POST['search']))
{
	$date=$_POST['date'];
	$query="SELECT * FROM `milksales` WHERE CONCAT(`id`, `date`, `accno`, `name`, `contact`, `email`, `litre`, `price`, `paymentstatus`)LIKE '%".$date."%'";
	$search_result = filterTable($query);
}
else{
	$query ="SELECT * FROM `milksales`";
	$search_result = filterTable($query);
}


function filterTable($query)
{
	$db = mysqli_connect('localhost', 'root', '', 'yoga');
	$filter_Result = mysqli_query($db, $query);
	return $filter_Result;
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
  	<h2>Search Milk Sales </h2>
  </div>
  <form method="post" action="searchmilksale.php">
  <div class="input-group">
  	  <label>Keyword</label>
  	  <input type="text" name="date">
  	</div>
	<div class="input-group">
	<button type="submit" class="btn" name="search">Search</button>
  	</div>
  	<p>
  	 <a href="index.php">Return to Homepage</a>
  	</p>
  </form>
  <table > <link rel="stylesheet" type="text/css" href="styleview.css">
      <tr>
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
		<?php while($row= mysqli_fetch_array($search_result)):?>
	       <tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['date'];?></td>
			<td><?php echo $row['accno'];?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['contact'];?></td>
			<td><?php echo $row['email'];?></td>
			<td><?php echo $row['litre'];?></td>
			<td><?php echo $row['price'];?></td>
			<td><?php echo $row['paymentstatus'];?></td>
			<td><a href='updatemilksale.php?id=<?php echo $row['id']; ?>& date=<?php echo $row['date'];?>& accno=<?php echo $row['accno'];?>& name=<?php echo $row['name'];?>& contact=<?php echo $row['contact'];?>& email=<?php echo $row['email'];?>& litre=<?php echo $row['litre'];?>& price=<?php echo $row['price'];?>& paymentstatus=<?php echo $row['paymentstatus'];?>'>Update</a></td>
			<td><a href='deletemilksales.php?id=<?php echo $row['id']; ?>& date=<?php echo $row['date'];?>& accno=<?php echo $row['accno'];?>& name=<?php echo $row['name'];?>& contact=<?php echo $row['contact'];?>& email=<?php echo $row['email'];?>& litre=<?php echo $row['litre'];?>& price=<?php echo $row['price'];?>& paymentstatus=<?php echo $row['paymentstatus'];?>'>Delete</a></td>
     <?php endwhile;?>
	        
    </table>
</body>
</html>


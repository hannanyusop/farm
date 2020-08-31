<?php
$search_result ="";
if(isset($_POST['search']))
{
	$date=$_POST['date'];
	$query="SELECT * FROM `collectmilk` WHERE CONCAT(`id`, `date`, `stallno`, `animalid`, `litre`, `collectedby`)LIKE '%".$date."%'";
	$search_result = filterTable($query);
}
else{
	$query ="SELECT * FROM `collectmilk`";
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
  	<h2>Search Milk Collections </h2>
  </div>
  <form method="post" action="search.php">
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
          <th>Stall No</th>
          <th>Animal ID</th>
          <th>Litre</th>
          <th>Collected By</th>
		  <th colspan="2">Operation</th>
		  </tr>
		<?php while($row= mysqli_fetch_array($search_result)):?>
	       <tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['date'];?></td>
			<td><?php echo $row['stallno'];?></td>
			<td><?php echo $row['animalid'];?></td>
			<td><?php echo $row['litre'];?></td>
			<td><?php echo $row['collectedby'];?></td>
			<td><a href='update.php?id=<?php echo $row['id']; ?>& date=<?php echo $row['date'];?>& stallno=<?php echo $row['stallno'];?>& litre=<?php echo $row['litre'];?>& collectedby=<?php echo $row['collectedby'];?>'>Update</a></td>
			<td><a href='delete.php?id=<?php echo $row['id']; ?>& date=<?php echo $row['date'];?>& stallno=<?php echo $row['stallno'];?>& litre=<?php echo $row['litre'];?>& collectedby=<?php echo $row['collectedby'];?>'>Delete</a></td>
     <?php endwhile;?>
	        
    </table>
</body>
</html>


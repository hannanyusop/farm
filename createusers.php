<?php include('function.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>The Ranch Dairy Farm Management - Create user</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	
</head>

<body>
	<div class="header">
		<h2>Admin - create user</h2>
	</div>
	
	<form method="post" action="createusers.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Full Name</label>
			<input type="fullname" name="fullname" value="<?php echo $fullname; ?>">
		</div>
		<div class="input-group">
			<label>User type</label>
			<select name="usertype" id="usertype" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Phone Number</label>
			<input type="phoneno" name="phoneno" value="<?php echo $phoneno; ?>">
		</div>
		<div class="input-group">
			<label>IC Number</label>
			<input type="icnum" name="icnum" value="<?php echo $icnum; ?>">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="address" name="address" value="<?php echo $address; ?>">
		</div>
		<div class="input-group">
			<label>Salary</label>
			<input type="salary" name="salary" value="<?php echo $salary; ?>">
		</div>
		<div class="input-group">
			<label>Joining Date</label>
			<input type="date" name="joiningdate" value="<?php echo $joiningdate; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn"> Create user</button>
		</div>
		<p>
  	 <a href="home.php">Return to Homepage</a>
  	</p>
	</form>
</body>
</html>
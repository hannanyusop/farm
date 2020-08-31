<?php 
include('function.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>The Ranch Dairy Farm Management</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<div class="header">
		<h2>Admin - Reports</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<img src="user_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['usertype']); ?>)</i> 
						<br>
					
					<div class = "input-group">
						<button class="btn" onclick="window.location.href='expensesadmin.php';">
						Create Expenses
						</button>
						
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='milkreportadmin.php';">
						Create Milk Sales
						</button>
						</div>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='viewexpensesadmin.php';">
						Expenses Report
						</button>
						</div>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='reportadmin.php';">
						Milk Sales Report
						</button>
						</div>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='viewmilksalereportadmin.php';">
						View Milk Sales 
						</button>
						</div>
		
						</br>
					<div>	
					<a href="home.php">Return to Homepage</a>
					</div>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>
<?php
include('function.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>The Ranch Dairy Farm Management	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
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
						<button class="btn" onclick="window.location.href='expenses.php';">
						Create Expenses
						</button>
						
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='milkreport.php';">
						Create Milk Sales
						</button>
						</div>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='viewexpenses.php';">
						Expenses Report
						</button>
						</div>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='report.php';">
						Milk Sales Report
						</button>
						</div>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='viewmilksalereport.php';">
						View Milk Sales
						</button>
						</div>
		
						</br>
					<div>	
					<a href="index.php">Return to Homepage</a>
					</div>
					</small>
					

				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>
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
		<h2>Admin - Home Page</h2>
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
</br>

			<p>MILK PRODUCTION</p>
					<div class = "input-group">
						<button class="btn" onclick="window.location.href='viewadmin.php';">
						View New Milk Collection
						</button>
						
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='addadmin.php';">
						Create New Milk Collection
						</button>
						</div>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='viewmilksaleadmin.php';">
						View Milk Sales
						</button>
						</div>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='addmilksaleadmin.php';">
						Create Milk Sales
						</button>
						</div>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='searchadmin.php';">
						Search Milk Collection
						</button>
						</div>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='searchmilksaleadmin.php';">
						Search Milk Sales
						</button>
						</div>
						</br>
						</br>
						<p>COW FEED</p>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='viewcowfeedadmin.php';">
						View Cow Feed Details
						</button>
						</div>
						<div class = "input-group">
						<button class= "btn" onclick="window.location.href='addcowfeedadmin.php';">
						Create Cow Feed Details
						</button>
						</div>
						
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='searchcowfeedadmin.php';">
						Search Cow Feed Details
						</button>
						</div>
						</br>
						</br>
						<p>VACCINE</p>
						<div class = "input-group">
						<button class= "btn" onclick="window.location.href='viewvaccineadmin.php';">
						View Cow Vaccine Details
						</button>
						</div>
						<div class = "input-group">
						<button class ="btn" onclick="window.location.href='addvanccineadmin.php';">
						Create Cow Vaccine Details
						</button>
						</div>
						
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='searchvaccineadmin.php';">
						Search Cow Vaccine Details
						</button>
						</div>
						</br>
						</br>
						<p>USER</p>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='user.php';">
						View User
						</button>
						</div>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='createusers.php';">
						Create New User
						</button>
						</div>
						</br>
						</br>
						<p>REPORT</p>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='homereport.php';">
						Report
						</button>
						</div>
						</br>
					<div>	
					<a href="home.php?logout='1'" style="color: red;">Logout</a>
					</div>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>
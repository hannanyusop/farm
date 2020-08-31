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
						</br>
						<p>MILK PRODUCTION</p>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='view.php';">
						View New Milk Collection
						</button>
						
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='adddata.php';">
						Create New Milk Collection
						</button>
						</div>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='viewmilksale.php';">
						View Milk Sales
						</button>
						</div>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='addmilksale.php';">
						Create Milk Sales
						</button>
						</div>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='search.php';">
						Search Milk Collection
						</button>
						</div>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='searchmilksale.php';">
						Search Milk Sales
						</button>
						</div>
						</br>
						</br>
						<p>COW FEED</p>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='viewcowfeed.php';">
						View Cow Feed Details
						</button>
						</div>
						<div class = "input-group">
						<button class= "btn" onclick="window.location.href='addcowfeed.php';">
						Create Cow Feed Details
						</button>
						</div>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='searchcowfeed.php';">
						Search Cow Feed Details
						</button>
						</div>
						</br>
						</br>
						<p>VACCINE</p>
						<div class = "input-group">
						<button class= "btn" onclick="window.location.href='viewvaccine.php';">
						View Cow Vaccine Details
						</button>
						</div>
						<div class = "input-group">
						<button class ="btn" onclick="window.location.href='addvaccine.php';">
						Create Cow Vaccine Details
						</button>
						</div>
						
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='searchvaccine.php';">
						Search Cow Vaccine Details
						</button>
						</div>
						</br>
						</br>
						<p>REPORT</p>
						<div class = "input-group">
						<button class="btn" onclick="window.location.href='homereport1.php';">
						Report
						</button>
						</div>
						</br>
						<div>
						<a href="index.php?logout='1'" style="color: red;">Logout</a>
						</div>
					</small>
					

				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>
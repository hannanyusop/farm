<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '1234', 'yoga');

// variable declaration
$username = "";
$fullname   = "";
$email = "";
$phoneno = "";
$icnum = "";
$address = "";
$salary = "";
$joiningdate = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $fullname;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$fullname       =  e($_POST['fullname']);
	$usertype       =  e($_POST['usertype']);
	$email   =    e($_POST['email']);
	$phoneno    =  e($_POST['phoneno']);
	$icnum   =  e($_POST['icnum']);
	$address    =  e($_POST['address']);
	$salary    =  e($_POST['salary']);
	$joiningdate    =  e($_POST['joiningdate']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($fullname)) { 
		array_push($errors, "Full Name is required"); 
	}
	if (empty($usertype)) { 
		array_push($errors, "User Type is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($phoneno)) { 
		array_push($errors, "Phone Number is required"); 
	}
	if (empty($icnum)) { 
		array_push($errors, "IC Number is required"); 
	}
	if (empty($address)) { 
		array_push($errors, "Address is required"); 
	}
	if (empty($salary)) { 
		array_push($errors, "Salary is required"); 
	}
	if (empty($joiningdate)) { 
		array_push($errors, "Joining Date is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['usertype'])) {
			$user_type = e($_POST['usertype']);
			$query = "INSERT INTO multi_user(username, fullname, usertype, email, phoneno, icnum, address, salary, joiningdate , password) 
					  VALUES('$username', '$fullname', '$usertype', '$email', '$phoneno','$icnum',  '$address', '$salary', '$joiningdate', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO multi_user (username, fullname, usertype, email, phoneno, icnum, address, salary, joiningdate , password) 
					  VALUES('$username', '$fullname', '$usertype', '$email', '$phoneno','$icnum',  '$address', '$salary', '$joiningdate', '$password')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM multi_user WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM multi_user WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['usertype'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: home.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['usertype'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
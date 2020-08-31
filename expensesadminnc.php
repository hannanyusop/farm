<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'yoga');

// variable declaration
$date = "";
$purpose = "";
$details = "";
$total= "";
$errors = array(); 
$_SESSION['success'] = "";


// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}


// REGISTER USER
if (isset($_POST['reg_add'])) {
  // receive all input values from the form
  $date = mysqli_real_escape_string($db, $_POST['date']);
  $purpose= mysqli_real_escape_string($db, $_POST['purpose']);
  $details = mysqli_real_escape_string($db, $_POST['details']);
  $total = mysqli_real_escape_string($db, $_POST['total']);
  
  // form validation: ensure that the form is correctly filled
  if (empty($date)) { array_push($errors, "Date is required"); }
  if (empty($purpose)) { array_push($errors, "Purpose is required"); }
  if (empty($details)) { array_push($errors, "Details is required"); }
  if (empty($total)) { array_push($errors, "Total Amount is required"); }
  
  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO expenses (date, purpose, details, total) 
  			  VALUES('$date', '$purpose', '$details', '$total')";
  	mysqli_query($db, $query);
	if($_SESSION['success'] = "ADDED!!"){
  	  header('location: homereport.php');
  	}else {
  		array_push($errors, "Please Try Again");
  	}
  }


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
?>
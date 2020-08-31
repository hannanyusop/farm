<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'yoga');

// variable declaration
$month = "";
$amount = "";
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
  $month= mysqli_real_escape_string($db, $_POST['month']);
  $amount = mysqli_real_escape_string($db, $_POST['amount']);
  $total = mysqli_real_escape_string($db, $_POST['total']);
  
  // form validation: ensure that the form is correctly filled
  if (empty($month)) { array_push($errors, "Month is required"); }
  if (empty($amount)) { array_push($errors, "Amount (Litre) is required"); }
  if (empty($total)) { array_push($errors, "Total Amount is required"); }
  
  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO milkreport (month, amount, total) 
  			  VALUES( '$month', '$amount', '$total')";
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
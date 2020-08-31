<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'yoga');

// variable declaration
$date = "";
$stallno  = "";
$animalid = "";
$litre = "";
$collectedby = "";
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
  $stallno= mysqli_real_escape_string($db, $_POST['stallno']);
  $animalid = mysqli_real_escape_string($db, $_POST['animalid']);
  $litre = mysqli_real_escape_string($db, $_POST['litre']);
  $collectedby = mysqli_real_escape_string($db, $_POST['collectedby']);

  // form validation: ensure that the form is correctly filled
  if (empty($date)) { array_push($errors, "Date is required"); }
  if (empty($stallno)) { array_push($errors, "Stall No is required"); }
  if (empty($animalid)) { array_push($errors, "Animal ID is required"); }
  if (empty($litre)) { array_push($errors, "Litre is required"); }
  if (empty($collectedby)) { array_push($errors, "Collected By is required"); }
  
  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO collectmilk (date, stallno, animalid, litre, collectedby) 
  			  VALUES('$date', '$stallno', '$animalid', '$litre' ,'$collectedby')";
  	mysqli_query($db, $query);
	if($_SESSION['success'] = "ADDED!!"){
  	  header('location: index.php');
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
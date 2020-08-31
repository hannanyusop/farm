<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'yoga');

// variable declaration
$date = "";
$accno  = "";
$name = "";
$contact = "";
$email = "";
$litre = "";
$price = "";
$paymentstatus = "";
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
  $accno= mysqli_real_escape_string($db, $_POST['accno']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $litre = mysqli_real_escape_string($db, $_POST['litre']);
  $price = mysqli_real_escape_string($db, $_POST['price']);
  $paymentstatus = mysqli_real_escape_string($db, $_POST['paymentstatus']);

  // form validation: ensure that the form is correctly filled
  if (empty($date)) { array_push($errors, "Date is required"); }
  if (empty($accno)) { array_push($errors, "Account No is required"); }
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($contact)) { array_push($errors, "Contact is required"); }
  if (empty($email)) { array_push($errors, "Email  is required"); }
  if (empty($litre)) { array_push($errors, "Litre is required"); }
  if (empty($price)) { array_push($errors, "Price  is required"); }
  if (empty($paymentstatus)) { array_push($errors, "Payment Status is required"); }
  
  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO milksales (date, accno, name, contact, email, litre, price, paymentstatus) 
  			  VALUES('$date', '$accno', '$name', '$contact', '$email', '$litre' ,'$price' ,'$paymentstatus')";
  	mysqli_query($db, $query);
	if($_SESSION['success'] = "ADDED!!"){
  	  header('location: home.php');
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
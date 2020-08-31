<?php
session_start();

//variable declaration

$month = "";
$amount  = "";
$total = "";
$id= 0;
$errors = array();
$edit_state =true;
$_SESSION['success'] = "";

//connect to database

$db = mysqli_connect('localhost', 'root', '', 'yoga');
//update data

if(isset($_POST['update'])){
  $id = mysqli_real_escape_string($db ,$_POST['id']);	
  $month = mysqli_real_escape_string($db, $_POST['month']);
  $amount= mysqli_real_escape_string($db, $_POST['amount']);
  $total = mysqli_real_escape_string($db, $_POST['total']);


  
  if (empty($month)) { array_push($errors, "Month is required"); }
  if (empty($amount)) { array_push($errors, "Amount is required"); }
  if (empty($total)) { array_push($errors, "Total Amount is required"); }

  // update 400pt if there are no errors in the form
  if (count($errors) == 0) {
$query="UPDATE milkreport SET month='$month', amount='$amount',total='$total' WHERE milkreport.id=$id";
 mysqli_query($db ,$query);	
 if($_SESSION['success'] = "RECORD UPDATED!!"){
  	  header('location: homereport1.php');
  	}else {
  		array_push($errors, "Please Try Again");
  	}
  }
  }
  

?>
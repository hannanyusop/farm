<?php
session_start();

//variable declaration

$date = "";
$purpose = "";
$details = "";
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
  $date = mysqli_real_escape_string($db, $_POST['date']);
  $purpose = mysqli_real_escape_string($db, $_POST['purpose']);
  $details = mysqli_real_escape_string($db, $_POST['details']);
  $total = mysqli_real_escape_string($db, $_POST['total']);


  
  if (empty($date)) { array_push($errors, "Date is required"); }
  if (empty($purpose)) { array_push($errors, "Purpose is required"); }
  if (empty($details)) { array_push($errors, "Details is required"); }
  if (empty($total)) { array_push($errors, "Total Amount is required"); }

  // update 400pt if there are no errors in the form
  if (count($errors) == 0) {
$query="UPDATE expenses SET date='$date', purpose='$purpose',details='$details',total='$total' WHERE expenses.id=$id";
 mysqli_query($db ,$query);	
 if($_SESSION['success'] = "RECORD UPDATED!!"){
  	  header('location: homereport.php');
  	}else {
  		array_push($errors, "Please Try Again");
  	}
  }
  }
  

?>
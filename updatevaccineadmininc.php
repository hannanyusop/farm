<?php
session_start();

//variable declaration

$date = "";
$stallno  = "";
$animalid = "";
$vaccine = "";
$notes = "";
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
  $stallno= mysqli_real_escape_string($db, $_POST['stallno']);
  $animalid = mysqli_real_escape_string($db, $_POST['animalid']);
  $vaccine = mysqli_real_escape_string($db, $_POST['vaccine']);
  $notes = mysqli_real_escape_string($db, $_POST['notes']);


  
  if (empty($date)) { array_push($errors, "Date is required"); }
  if (empty($stallno)) { array_push($errors, "Stall No is required"); }
  if (empty($animalid)) { array_push($errors, "Animal ID is required"); }
  if (empty($vaccine)) { array_push($errors, "Vaccine Status / Type is required"); }
  if (empty($notes)) { array_push($errors, "Notes / Reminder is required"); }

  // update 400pt if there are no errors in the form
  if (count($errors) == 0) {
$query="UPDATE vaccine SET date='$date', stallno='$stallno',animalid='$animalid', vaccine='$vaccine',notes='$notes' WHERE vaccine.id=$id";
 mysqli_query($db ,$query);	
 if($_SESSION['success'] = "RECORD UPDATED!!"){
  	  header('location: home.php');
  	}else {
  		array_push($errors, "Please Try Again");
  	}
  }
  }
  

?>
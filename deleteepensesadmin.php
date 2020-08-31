<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'yoga');
$id =$_GET['id']; 
$query = "DELETE FROM EXPENSES WHERE id='$id'";
mysqli_query($db , $query);
if($_SESSION['success'] = "RECORD DELETED!!"){
  	  header('location: homereport.php');
  	}else {
  		array_push($errors, "Please Try Again");
  	}
?>
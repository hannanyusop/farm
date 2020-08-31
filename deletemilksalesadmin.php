<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'yoga');
$id =$_GET['id']; 
$query = "DELETE FROM milksales WHERE id='$id'";
mysqli_query($db , $query);
if($_SESSION['success'] = "RECORD DELETED!!"){
  	  header('location: home.php');
  	}else {
  		array_push($errors, "Please Try Again");
  	}
?>
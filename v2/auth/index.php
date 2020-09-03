<?php
session_start();
if(isset($_SESSION)){
    echo "<script>window.location='auth/home.php'</script>";
}else{
    echo "<script>window.location='login.php'</script>";
}
?>
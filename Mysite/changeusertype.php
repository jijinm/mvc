<?php 
 session_start();
 include('includes/header.php');
 global $conn;
 $userid = $_GET['id'];
 $sql = "UPDATE users SET user_type= 'admin' WHERE id= '$userid'";
 $res = mysqli_query($conn, $sql);
 header('Location:users.php');
 exit();
?>
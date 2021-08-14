<?php 
 session_start();
 include('includes/header.php');
 global $conn;
 $userid = $_GET['id'];
 $sql = "DELETE FROM users WHERE id= '$userid'";
 $res = mysqli_query($conn, $sql);
 header('Location:users.php');
 exit();
?>
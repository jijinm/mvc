<?php
 session_start();
 include('includes/header.php');
 global $conn;
 $id = $_SESSION['id'];
 $sql = "SELECT * FROM users WHERE id = '$id'";
 $res = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($res);
 $interests = json_decode($row['interest']);
 $len = count($interests);
 echo "<img src='uploads/".$row["image"]."' width='300' height='300' alt='image'>";
 echo "<p>Name : ".$row['name']."</p>";
 echo "<p>Email : ".$row['email']."</p>";
 echo "<p>Mobile : ".$row['mobile']."</p>";
 echo "<p>City : ".$row['city']."</p>";
 echo "<u><p>Interests</p></u>";
 echo "<ul>";
 for ($i=0; $i < $len; $i++) { 
 	echo "<li>".$interests[$i]."</li>";
 }
 echo "</ul>";
 echo "<a class='btn btn-primary' href='index.php?page=profile'>Edit Profile Information</a>";
 include('includes/footer.php');
?>
 <?php
 session_start();
 include('includes/header.php');
 global $conn;
 $sql = "SELECT * FROM users WHERE user_type='user'";
 $res = mysqli_query($conn, $sql);
 ?>
  <table class='table table-dark table-hover'>
  <thead>
    <tr>
      <th scope='col'>Name</th>
      <th scope='col'>Email</th>
      <th scope='col'>Mobile</th>
      <th scope='col'>City</th>
      <th scope='col'>Interests</th>
      <th scope='col'>Status</th>
      <th scope='col'>Image</th>
      <th scope='col'>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row = mysqli_fetch_array($res)){ ?>
    <tr>
      <td><?php echo $row['name']?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['mobile']?></td>
      <td><?php echo $row['city']?></td>
  <?php 
      $interests = json_decode($row['interest']);
      $len = count($interests); ?>
      <td><ul><?php for ($i=0; $i < $len; $i++) { 
 	    echo "<li>".$interests[$i]."</li>";
      } ?>
      </ul></td>
      <td><?php echo $row['status']?></td>
      <td><img src='uploads/<?php echo $row["image"]?>' width='100' height='100' alt='image'></td>
      <td><a class="btn btn-outline-success me-2" href="removeuser.php?id=<?php echo $row['id']?>">Remove</a><a class="btn btn-outline-success me-2" href="changeusertype.php?id=<?php echo $row['id']?>">Make Admin</a></td>
      
    </tr>
  <?php } ?>
  </tbody>
  </table>
  <?php  
 include('includes/footer.php');
  ?>
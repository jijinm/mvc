<div class="row">
<div class="col">
<h1 id="Heading3" class="custom">Update Profile</h1>
<br>
<form class="row g-3 needs-validation" novalidate action="updateprofile.php" enctype="multipart/form-data" method="POST">
<?php 
 global $conn;
 $id = $_SESSION['id'];
 $sql = "SELECT * FROM users WHERE id = '$id'";
 $res = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($res);
 $interests = json_decode($row['interest']);
 ?>
  <div class="col-md-6">
    <label for="myfile" class="form-check-label">Change your image<br></label>
  <input type="file" class="form-control" name="myfile" id="myfile">
  </div>
  <div class="col-md-6">
    <label for="validationCustom01" class="form-label">Name</label>
    <input type="text" class="form-control" id="validationCustom01" name="name" value="<?php echo $row['name']?>" required>
    <div class="invalid-feedback">
        Please provide Name.
      </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Email</label>
    <input type="text" class="form-control" id="validationCustom02" name="email" value="<?php echo $row['email']?>" required>
    <div class="invalid-feedback">
        Please provide Email.
      </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Mobile Number</label>
    <input type="number" class="form-control" id="validationCustom03" name="mobile" value="<?php echo $row['mobile']?>" required>
    <div class="invalid-feedback">
      Please provide Mobile number.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom04" class="form-label">City</label>
    <input type="text" class="form-control" id="validationCustom04" name="city" value="<?php echo $row['city']?>" required>
    <div class="invalid-feedback">
      Please provide City.
    </div>
  </div>
    

  <div class="col-md-12">
    <label for="validationCustom06" class="form-label">Interests</label><br>
    <input type="checkbox" class="form-check-input" id="validationCustom06" name="interest[]" value="music" <?php if(in_array('music',$interests)){ echo 'checked';}?>>Music
    <input type="checkbox" class="form-check-input" id="validationCustom06" name="interest[]" value="reading" <?php if(in_array('reading',$interests)){ echo 'checked';}?>>Reading
    <input type="checkbox" class="form-check-input" id="validationCustom06" name="interest[]" value="travel" <?php if(in_array('travel',$interests)){ echo 'checked';}?>>Travel
    <input type="checkbox" class="form-check-input" id="validationCustom06" name="interest[]" value="sports" <?php if(in_array('sports',$interests)){ echo 'checked';}?>>Sports
  </div>

  <div class="col-12">
    <button class="btn btn-primary" type="submit">Update</button>
  </div>
</form>
<br>
</div>  
</div>
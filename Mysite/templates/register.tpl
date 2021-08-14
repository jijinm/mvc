<div class="row">
<div class="col">
<h1 id="Heading3" class="custom">Register</h1>
<br>
<form class="row g-3 needs-validation" novalidate action="register.php" enctype="multipart/form-data" method="POST">
  <div class="col-md-6">
    <label for="validationCustom01" class="form-label">Name</label>
    <input type="text" class="form-control" id="validationCustom01" name="name" required>
    <div class="invalid-feedback">
        Please provide Name.
      </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Email</label>
    <input type="text" class="form-control" id="validationCustom02" name="email" required>
    <div class="invalid-feedback">
        Please provide Email.
      </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Mobile Number</label>
    <input type="number" class="form-control" id="validationCustom03" name="mobile" required>
    <div class="invalid-feedback">
      Please provide Mobile number.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom04" class="form-label">City</label>
    <input type="text" class="form-control" id="validationCustom04" name="city" required>
    <div class="invalid-feedback">
      Please provide City.
    </div>
  </div>
    <div class="col-md-6">
    <label for="validationCustom05" class="form-label">Password</label>
    <input type="password" class="form-control" id="validationCustom05" name="password" required>
    <div class="invalid-feedback">
      Please provide Password.
    </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom06" class="form-label">Interests</label><br>
    <input type="checkbox" class="form-check-input" id="validationCustom06" name="interest[]" value="music">Music
    <input type="checkbox" class="form-check-input" id="validationCustom06" name="interest[]" value="reading">Reading
    <input type="checkbox" class="form-check-input" id="validationCustom06" name="interest[]" value="travel">Travel
    <input type="checkbox" class="form-check-input" id="validationCustom06" name="interest[]" value="sports">Sports
  </div>
  <div class="col-md-6">
    <label for="myfile" class="form-check-label">Upload your image<br></label>
  <input type="file" class="form-control" name="myfile" id="myfile" required>
    <div class="invalid-feedback">
      Please choose an image.
    </div>
  </div>
 
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Register</button>
  </div>
</form>
<br>
</div>  
</div>
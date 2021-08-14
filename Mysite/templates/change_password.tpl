<div class="row">
<div class="col">
<h1 id="Heading3" class="custom">Change Password</h1>
<br>
<form class="row g-3 needs-validation" novalidate action="changepassword.php" method="POST">
 

  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">New Password</label>
    <input type="password" class="form-control" id="validationCustom03" name="password" required>
    <div class="invalid-feedback">
      Please provide Password.
    </div>
  </div>
   <div class="col-md-6">
    <label for="validationCustom04" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="validationCustom04" name="cnfpassword" required>
    <div class="invalid-feedback">
      Please provide confirm Password.
    </div>
  </div>

  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit</button>
  </div>
</form>
<br>
</div>  
</div>
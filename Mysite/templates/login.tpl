<div class="row">
<div class="col">
<h1 id="Heading3" class="custom">Login</h1>
<br>
<form class="row g-3 needs-validation" novalidate action="login.php" method="POST">
 
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Email</label>
    <input type="text" class="form-control" id="validationCustom02" name="email" required>
    <div class="invalid-feedback">
        Please provide Email.
      </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Password</label>
    <input type="password" class="form-control" id="validationCustom03" name="password" required>
    <div class="invalid-feedback">
      Please provide Password.
    </div>
  </div>

  <div class="col-12">
    <button class="btn btn-primary" type="submit">Login</button>
  </div>
</form>
<br>
</div>  
</div>
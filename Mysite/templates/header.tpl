<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
	<title>Mobizone</title>
  <style type="text/css">
    .custom{
      padding-top: 30px;
      padding-bottom: 30px;
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">
  <header>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><img src="images/5.png" alt="logo" width="120px" height="80px"></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php?page=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=about">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=contact">Contact Us</a>
        </li>
      </ul>
    </div>
    <?php if($_SESSION['usertype'] == 'admin'){ ?>

    <a class="btn btn-outline-success me-2" href="users.php">Users</a>

    <?php } if(isset($_SESSION['id'])){ ?>
    
    <a class="btn btn-outline-success me-2" href="profile.php">My Profile</a>
    <a class="btn btn-outline-success me-2" href="index.php?page=changepwd">Change Password</a>
    <a class="btn btn-outline-success me-2" href="logout.php">Logout</a>
   
    <?php } else{ ?>
    <a class="btn btn-outline-success me-2" href="index.php?page=login">Login</a>
    <a class="btn btn-outline-success me-2" href="index.php?page=register">Register</a>
    <?php } ?>

  </div>
  </div>
</nav>
</header>
<div class="container-fluid">
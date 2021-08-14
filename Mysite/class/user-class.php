<?php
class ErrorHandler{
	function __construct(){
        global $conn;
        $this->connection = $conn;
	}
	public function warning_alert($warning_codes){
		switch ($warning_codes) {
			case 300:
				echo 'Email Or Mobile number already exist.';
				break;
			
			default:
				echo 'invalid';
				break;
		}
	}
	public function error_alert($error_codes){
		switch ($error_codes) {
			case 500:
				echo 'Name should have minimum 4 letters';
				break;
			case 501:
				echo 'Email format is not correct';
				break;
			case 502:
				echo 'Mobile number should have minimum 10 digits';
				break;
			case 503:
				echo 'City should have minimum 3 letters';
				break;
			case 504:
				echo 'Password should contain minimum 4 characters';
				break;
			case 505:
				echo 'One of the interests should be selected';
				break;
			case 506:
				echo 'Password should match Confirm Password';
				break;
			case 507:
				echo 'Upload failed. You can upload images only';
				break;
			default:
				echo 'invalid';
				break;
		}
	}
	public function success_alert($success_codes){
		switch ($success_codes) {
			case 201:
				echo "<h1>Registration Successful</h1>";
				break;
			case 202:
				echo "<h1>Password Changed Successfully</h1>";
				break;
			case 203:
				echo "<h1>Profile Updated Successfully</h1>";
				break;
			default:
				echo 'invalid';
				break;
		}
	}
}
class User extends ErrorHandler{
	public function registration($reg){

	if (strlen(trim($reg['name']))<3) {
		return $this->error_alert(500);
	}
	if (strlen(trim($reg['email']))<7) {
		return $this->error_alert(501);
	}
	if (strlen(trim($reg['mobile']))<10) {
		return $this->error_alert(502);
	}
	if (strlen(trim($reg['city']))<3) {
		return $this->error_alert(503);
	}
	if (strlen(trim($reg['password']))<4) {
		return $this->error_alert(504);
	}
	if (empty($reg['interest'])) {
		return $this->error_alert(505);
	}

	$name     = $reg['name'];
    $email    = $reg['email'];
    $mobile   = $reg['mobile'];
    $city     = $reg['city'];
    $pwd      = md5($reg['password']);
    $interest = json_encode($reg['interest']);
    if($_FILES["myfile"]["type"] == "image/jpeg"||$_FILES["myfile"]["type"] == "image/png"){
    $filename = $_FILES['myfile']['name'];
    $temp_path = $_FILES['myfile']['tmp_name'];
    if(is_uploaded_file($temp_path)){
    	if (move_uploaded_file($temp_path, "uploads/$filename")) {
    	}
    }
    }
    else{
	return $this->error_alert(507);
    }
    $res = "SELECT * FROM users WHERE email = '$email' OR mobile='$mobile'";
    $result = mysqli_query($this->connection, $res);
    if (mysqli_num_rows($result) > 0) {
	    return $this->warning_alert(300);
    }
    $sql = "INSERT INTO users (name, email, mobile, city, password, interest, image) VALUES ('$name', '$email' , '$mobile', '$city', '$pwd','$interest','$filename')";

    if (mysqli_query($this->connection, $sql)) {
    	$userid = mysqli_insert_id($this->connection);
    	echo "<div class='col-md-6'>
<form method='post' action='status.php'>
<input type='hidden' name='userid' value='$userid'>
    Choose your profile status<br>
    <input type='radio' class='form-check-input' id='validationCustom07' name='status' value='active' required>
    <label for='validationCustom07' class='form-check-label'>Active</label><br>
    <input type='radio' class='form-check-input' id='validationCustom08' name='status' value='inactive'>
    <label for='validationCustom08' class='form-check-label'>Inactive</label><br>
<input type='submit' value='Submit'>
</form></div>";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
	}

	public function status($status){
    $userid    = $status['userid'];
    $status    = $status['status'];
    $sql = "UPDATE users SET status = '$status' WHERE id='$userid'";
    if (mysqli_query($this->connection, $sql)) {
    	$this->success_alert(201);
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
	}

	public function login($log){
	$email    = $log['email'];
	$pwd      = md5($log['password']);
	$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pwd' AND status='active'";
	$res = mysqli_query($this->connection, $sql);
    if ($res) {
    	if (mysqli_num_rows($res) > 0) {
    	$row = mysqli_fetch_array($res);
    	$_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['usertype'] = $row['user_type'];
        header('Location:index.php');
        }
        else{
       	echo "You are not a registered or active user. You need to register before login";
        }
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
    }
	}

	public function changepassword($data){

	if ($data['password']!== $data['cnfpassword']) {
	return $this->error_alert(506);
	}
	$pwd      = md5($data['password']);
	$id = $_SESSION['id'];
	$sql = "UPDATE users SET password = '$pwd' WHERE id='$id'";
    if (mysqli_query($this->connection, $sql)) {
    	$this->success_alert(202);
    }
	}

	public function updateprofile($info){
	$id       =	$_SESSION['id'];
    $name     = $info['name'];
    $email    = $info['email'];
    $mobile   = $info['mobile'];
    $city     = $info['city'];
    $interest = json_encode($info['interest']);
    if($_FILES["myfile"]["type"] == "image/jpeg"||$_FILES["myfile"]["type"] == "image/png"){
    $filename = $_FILES['myfile']['name'];
    $temp_path = $_FILES['myfile']['tmp_name'];
    if(is_uploaded_file($temp_path)){
    if (move_uploaded_file($temp_path, "uploads/$filename")) {
    	/*echo "File upload successful";*/
    $sql = "UPDATE users SET name = '$name', email = '$email', mobile = '$mobile', city = '$city', interest = '$interest', image = '$filename' WHERE id = '$id'";
    if (mysqli_query($this->connection, $sql)) {
    	return $this->success_alert(203);
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
    }
    }
    }
    }
    $sql = "UPDATE users SET name = '$name', email = '$email', mobile = '$mobile', city = '$city', interest = '$interest' WHERE id = '$id'";
    if (mysqli_query($this->connection, $sql)) {
    	return $this->success_alert(203);
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
    }
	}

}
?>
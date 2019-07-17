<?php
$email = $_POST['email'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone = $_POST['phone'];

if (!empty($first_name) || !empty($last_name) || !empty($phone) || !empty($email) || !empty($password)) 
{ 
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "Sumera1973";
	$dbname = "rentconnect";
	
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
	
	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_errno(). ')' .mysqli_connect_error());
	}else {
		$SELECT = "SELECT email From users Where email = ? Limit 1"; 
		$INSERT = "INSERT Into users (email, password, first_name, last_name, phone) values (?,?,?,?,?)"
		
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->bind_result($email);
		$rnum = $stmt->num_rows;
		
		if($rnum==0) {
			$stmt->close();
			
			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("s,s,s,s,s", $email, $password, $first_name, $last_name, $phone);
			$stmt->execute();
			echo "New Account Created Successfully";
		} else {
			echo "Email already registered";}
		}
		$stmt->close();
		$conn->close();
}else {
	echo "All fields are required";
	die();
}

?>



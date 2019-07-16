<?php 
  $emailadd = $_POST['emailadd'];
  $password = $_POST['password'];
  
  
  $conn = new mysqli('localhost', 'root', 'Sumera1973', 'people');
  if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
   }else{
    $stmt = $conn->prepate("insert into user(emailadd,password) values(?,?)");
    $stmt->bind_param("ss", $emailadd, password);
    $stmt->execute();
    echo "login successful...";
    $stmt->close();
    $conn->close(); 
  
?>

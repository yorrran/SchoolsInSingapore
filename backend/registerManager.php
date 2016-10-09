<?php
//header('Location: ' . $_SERVER['HTTP_REFERER']);
include('dbManager.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$password = md5($password);
$conn = dbConnect();

$sql =  "INSERT INTO `User_Main` (`Username`, `Password`, `Email`) VALUES ('$username', '$password', '$email')";
$result = $conn->query($sql);
dbDisconnect($conn);
echo '<script>registersuccess();function registersuccess(){alert("Success");}</script>';
// header('Location: ../login.php')
?>
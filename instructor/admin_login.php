<?php
session_start();
$servername = "localhost";
$username = "root";
$passwordofdb = "@samidan1994";
$database = "admas_university";

$conn = new mysqli($servername, $username, $passwordofdb, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uname = $_POST['u_name'];
$password = $_POST['password'];
$sql = "SELECT * FROM instractor WHERE Ins_Fname = '$uname' AND Ins_password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['name'] = $uname;
    $_SESSION['password'] = $password;
    
    header("Location: LoadExam.php");
    exit();
} else {
    $_SESSION['error'] = true;
    header("Location: index.php");
    exit();
}
?>

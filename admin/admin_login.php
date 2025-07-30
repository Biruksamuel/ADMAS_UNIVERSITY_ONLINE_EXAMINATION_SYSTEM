<?php
session_start();

$servername = "localhost";
$username = "root";
$passwordofdb = "@samidan1994";
$database = "admas_university";

// Create connection
$conn = new mysqli($servername, $username, $passwordofdb, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare inputs for safe use in SQL query (prevent SQL injection)
$uname = $conn->real_escape_string($_POST['u_name']);
$password = $conn->real_escape_string($_POST['password']);

// SQL query to check user credentials
$sql = "SELECT * FROM admins WHERE Ad_Fname = '$uname' AND Ad_password = '$password'";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Fetch the first row from the result set
    $row = $result->fetch_assoc();

    // Set session variables
    $_SESSION['name'] = $row['Ad_Fname'];  // Adjust based on your database schema
    $_SESSION['password'] = $row['Ad_password'];  // Avoid storing passwords in session in production

    // Redirect to LoadExam.php upon successful login
    header("Location: LoadExam.php");
    exit();
} else {
    // Set session error flag for displaying error message
    $_SESSION['error'] = true;

    // Redirect back to index.php upon login failure
    header("Location: index.php");
    exit();
}

// Close the connection
$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "@samidan1994";
$dbname = "admas_university";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get and sanitize input
$un = mysqli_real_escape_string($conn, $_POST['username']);
$id = mysqli_real_escape_string($conn, $_POST['id']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);

// Hash the password
$hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

// Check if the student exists
$sql = "SELECT * FROM student WHERE stud_Fname = '$un'   AND stud_ID = '$id'";
$result = $conn->query($sql);

if ($result === false) {
    die("Error: " . $conn->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (!empty($row['stud_password'])) {
        echo "<p>You have already set a password.</p>"; 
    } else {
        // Update the student's password
        $sql = "UPDATE student SET stud_password = '$hashed_pass' WHERE stud_Fname = '$un' AND stud_ID = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Password set successfully.</p>";
        } else {
            echo "<p>Error setting password: " . $conn->error . "</p>";
        }
    }
} else {
    echo "<p>There is no student by this name and ID. Please contact the registrar's office.</p>";
}

$conn->close();
?>

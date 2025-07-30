<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database credentials
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

// Get the Exam_id from the query string
if (isset($_GET['exam_id'])) {
    $exam_id = $_GET['exam_id'];

    // Query to get the time_allowed value from the database based on Exam_id
    $sql = "SELECT time_allowed FROM exam_questions WHERE exam_id = '$exam_id' LIMIT 1"; // Adjust the query to fit your table and column names
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['time_allowed' => $row['time_allowed']]);
    } else {
        // echo json_encode(['time_allowed' => 0]); // Default to 0 if no value is found
        echo json_encode(['id' => $exam_id]);
    }
} else {
    echo json_encode(['error' => 'No exam_id provided']);
}

$conn->close();
?>

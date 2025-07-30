<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '@samidan1994';
$db_name = 'admas_university';

// Connect to database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get exam ID, date, and time from form submission
$exam_id = $_POST['exam_id'];
$date = $_POST['date'];
$time = $_POST['time'];

// Search for exam ID in database
$query = "SELECT * FROM exam_questions WHERE exam_id = '$exam_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Exam ID exists, update date and time
    $update_query = "UPDATE exam_questions SET date = '$date', time = '$time' WHERE exam_id = '$exam_id'";
    if ($conn->query($update_query) === TRUE) {
        header('Location: ScheduleExam.html?message=Exam schedule updated successfully!');
    } else {
        header('Location: ScheduleExam.html?message=Error updating schedule: ' . $conn->error);
    }
} else {
    header('Location: ScheduleExam.html?message=Exam ID not found in database.');
}

// Close database connection
$conn->close();
exit;
?>

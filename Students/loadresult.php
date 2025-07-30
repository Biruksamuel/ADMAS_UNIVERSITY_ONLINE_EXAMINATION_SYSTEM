<?php 
session_start(); // Start the session to access session variables

if(isset($_GET['token'])) {
    $session_token = $_GET['token'];
    $stud_id = $_SESSION[$session_token]['stud_id'];
    $stud_section = $_SESSION[$session_token]['stud_section'] ;
    $stud_name = $_SESSION[$session_token]['name'];
} else {
    // Handle the case where the token is not set (e.g., redirect to login)
    die("Error: Invalid or missing token."); 
}

$examId = $_GET['Exam_id']; 
$score = $_GET['correctAnswers']; 
$from = $_GET['from'];


$servername = "localhost";
$username = "root";
$password = "@samidan1994";
$dbname = "admas_university";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a row with the given stud_id and exam_id already exists
$check_sql = "SELECT * FROM result WHERE stud_ID = ? AND exam_id = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("ss", $stud_id, $examId);
$check_stmt->execute();
$result = $check_stmt->get_result();

if ($result->num_rows > 0) {
    echo "Result already exists for this student and exam.";
} else {
    // Prepare and execute the INSERT statement if no existing row found
    $sql = "INSERT INTO result (result_id, stud_ID, exam_id, answered_at, score, out_of, stud_name, stud_section) 
            VALUES (NULL, ?, ?, current_timestamp(), ?, ?, ?, ?)"; // Use prepared statements

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $stud_id, $examId, $score, $from, $stud_name, $stud_section); // Bind parameters 

    if ($stmt->execute()) {
        echo "Result saved successfully!";
    } else {
        echo "Error saving result: " . $stmt->error;
    }

    $stmt->close();
}

$check_stmt->close();
$conn->close();
?>

<?php
session_start();

// Check if the POST request is sent
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Database connection parameters
    // $servername = "localhost";
    // $username = "root";
    // $password = "8231994";
    // $dbname = "exercies";

    $servername= "localhost";
    $username= "root";
    $password = "@samidan1994";
    $dbname = "admas_university";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO exam_questions ( exam_id, for_section, loaded_by, time_allowed, question_statement, option_a,option_b,option_c,option_d,correct_option,course_name)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");



// Bind parameters
$stmt->bind_param("sssssssssss", $exam_id ,$for_section, $loaded_by, $time_allowed,$question_statement, $option_a, $option_b, $option_c, $option_d, $correct_option,$course_name);
$exam_id = $_POST["Exam_id"];
$for_section = $_POST["Section"]; 
$course_name = $_POST["course_name"];
$loaded_by  = $_SESSION['name'];
$time_allowed = $_POST["time_allowed"];
// Get and insert user data from the form
for ($i = 1; isset($_POST["question_statement$i"]); $i++) {
   $question_statement = $_POST["question_statement$i"];
   $option_a = $_POST["option_a$i"];
   $option_b = $_POST["option_b$i"];
   $option_c = $_POST["option_c$i"];
   $option_d = $_POST["option_d$i"];
   $correct_option = $_POST["correct_option$i"];

   $stmt->execute();
}



    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Return a success message
    echo "Exam added successfully! with ID = $exam_id";
} else {
    // If not a POST request, return an error
    http_response_code(405);
    echo "Method Not Allowed";
}
?>

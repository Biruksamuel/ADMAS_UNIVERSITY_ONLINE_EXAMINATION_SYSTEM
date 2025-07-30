<?php
$servername = "localhost";
$username = "root";
$password = "@samidan1994";
$dbname = "admas_university";
session_start();
if(isset($_GET['token'])) {
    $session_token = $_GET['token'];
    $stud_section = $_SESSION[$session_token]['stud_section'];
}


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$examId = $_GET['Exam_id'];

$sql = "SELECT *, for_section FROM exam_questions WHERE exam_id = '$examId'";
$result = $conn->query($sql);
$questions = array();
if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $for_section = $row['for_section'];
    if($stud_section == $for_section){
        
        $sql = "SELECT * FROM exam_questions WHERE exam_id = '$examId'";
        $result = $conn->query($sql);
        
       
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $questions[] = $row;
            }
        } else {
            $questions = array("error" => "Exam not found 1");
        }

        $conn->close();
        header('Content-Type: application/json');
        echo json_encode($questions);
    }else{
        $questions = array("error" => "This exam is not for your section ☹️");
        echo json_encode($questions);
    }
}
?>

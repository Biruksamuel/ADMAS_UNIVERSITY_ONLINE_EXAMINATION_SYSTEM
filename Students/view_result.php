<?php
$servername = "localhost";
$username = "root";
$password = "@samidan1994";
$dbname = "admas_university";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$un = mysqli_real_escape_string($conn, $_POST['username']);
$id = mysqli_real_escape_string($conn, $_POST['id']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);
$examid = mysqli_real_escape_string($conn, $_POST['exam_id']);

$sql = "SELECT * FROM student WHERE stud_Fname = '$un' AND stud_ID = '$id'  AND stud_password = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    $row = $result->fetch_assoc();
    $sql = "SELECT * FROM result WHERE stud_name = '$un' AND stud_ID = '$id' AND exam_id = '$examid'";
    $result = $conn->query($sql);
    $lname = $row['stud_lname'];

    if ($result->num_rows > 0) {
         $row = $result->fetch_assoc();
        $score = $row['score'];
        $out_of = $row['out_of'];
        echo "<h3 style='color: black;'>Name: $un $lname </br>
                 ID: $id </br>
                 EXAM: $examid </br>
                 SCORE: $score out of $out_of 
              </h3>";
    } else {
        
        echo "<p>Result not found</p>"; 
    }
} else { 
    echo "<p>Incorrect input. </p>";
}

$conn->close();
?>

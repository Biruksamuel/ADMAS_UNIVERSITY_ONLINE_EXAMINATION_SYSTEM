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

if (isset($_POST['un']) && isset($_POST['pw']) && isset($_POST['id'])) {
    $user_name = mysqli_real_escape_string($conn, $_POST['un']);
    $password = mysqli_real_escape_string($conn, $_POST['pw']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
    $sql = "SELECT * FROM student WHERE stud_Fname = '$user_name' AND stud_ID = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
       
        if (password_verify($password, $row['stud_password'])) {
            $section = $row['stud_section']; 
        
            // Create a unique token for the session
            $session_token = md5(uniqid(rand(), true));
            $_SESSION['session_token'] = $session_token;
        
            // Store user data in session
            $_SESSION[$session_token]['name'] = $row['stud_Fname'];
            $_SESSION[$session_token]['id'] = $row['stud_ID'];
            $_SESSION[$session_token]['stud_section'] = $section;
        
            header("Location: fetch.php?token=$session_token");
            exit();
        } else {
            $_SESSION['error'] = "Incorrect password.";
            header("Location: take_exam.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Incorrect username or ID.";
        header("Location: take_exam.php");
        exit();
    }
}

$conn->close();
?>

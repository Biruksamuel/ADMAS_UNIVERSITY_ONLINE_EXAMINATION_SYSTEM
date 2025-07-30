<!DOCTYPE html>
<html>
<head>
    <title>Exam Questions</title>
    <link rel="stylesheet" href="./css/fetch1.css">
    <link rel="icon" href="./images/admaslogo.jpg" type="image/x-icon">
    <script src="./js/fetch8.js" ></script>
</head>
<body>
<header class="header">
      <div class="imgwrapper">
        <img src="admaslogo.jpg" alt="admaslogo" />

      </div>
      <h1>
          ADMAS UNIVERSITY <br />
          ONLINE EXAMINATION SYSTEM
        </h1>
      </header>
<h1 id="page">Exam Taking Page</h1>
<?php
// session_start();
// session_regenerate_id();

session_start();

if(isset($_GET['token'])) {
    $session_token = $_GET['token'];
    
    // Check if the session token exists and retrieve user data
    if(isset($_SESSION[$session_token])) {
        $name = $_SESSION[$session_token]['name'];
        $section = $_SESSION[$session_token]['stud_section'];
        $id = $_SESSION[$session_token]['id'];
        echo "<h2>Name: $name </br> ID: $id </br> Section: $section</h2>";
    } else {
        header("Location: index.html");
        exit();
    }
} else {
    header("Location: index.html");
    exit();
}



// if(isset($_SESSION['name'])) {
//     $name = $_SESSION['name'];
//     $section = $_SESSION['stud_section'];
//     $id = $_SESSION['id'];
//     echo "<h2>Name: $name </br> ID: $id </br> Section: $section</h2>";
// } else {
// }
?>
<p id="warning"></p>
<p id="Good"></p>

<p id="timer"></p>
<label for="ExamId">Exam ID:</label>
<input placeholder="Exam ID" type="text" id="ExamId">
<div id="userData"></div>
<p id="result"></p>

<input type="hidden" id="token" value="<?php echo $_SESSION['session_token']; ?>">
<button onclick="fetchQuestions()" id="LoadExam">Load Exam</button>
<button onclick="evaluateAnswers()" id="submit_answer" style="display: none;">Submit</button>


</body>
</html>

<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NewDashboard</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <link rel="stylesheet" href="./css/NewDashboard.css" />
    <link rel="icon" href="./admaslogo.jpg" type="image/x-icon">
</head>
<body>
    <div class="wrapper">
        <section class="choosesection">
            <ul>
                <li>
                    <a href="./LoadExam.html" id="active">
                        <i class="fa-solid fa-layer-group"></i>Load Exam
                    </a>
                </li>
                <li>
                    <a href="./ViewResult.html">
                        <i class="fa-solid fa-eye"></i>View Result
                    </a>
                </li>
            </ul>
        </section>
        <section class="selectedsection">
            <section class="headsection">
                <div>
                    <i class="fa-solid fa-bars" onclick="handleMenu()"></i>
                    <h2>Admin Panel</h2>
                </div>
                <a href="logout.php"><button>Logout</button></a>
            </section>
            <div class="wrapper2">
                <form id="registrationForm">
                    <h1>Upload Exam</h1>
                    <label for="Exam_id">Enter exam ID:</label>
                    <input placeholder="Enter exam ID" type="text" id="Exam_id" name="Exam_id" required>
            
                    <label for="Section">For which section:</label>
                    <input placeholder="Section" type="text" id="Section" name="Section" required>
            
                    <label for="course_name">Course name:</label>
                    <input placeholder="Course name" type="text" id="course_name" name="course_name" required>
            
                    <label>Time allowed:</label>
                    <select id="time_allowed" name="time_allowed" class="custom-select-box">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
        
                    <label for="no_of_questions">Enter the number of questions:</label>
                    <input placeholder="number of questions" type="number" id="no_of_questions" name="no_of_questions" min="1" max="100" required>
                    
                    <div id="questionsContainer"></div>
                    
                    <p id="warn"></p>
        
                    <button type="button" id="Generate_fieldes" onclick="submitRegistration()">Generate question Fields</button>
                    <button type="submit" id="submitBtn" name="name" style="display: none;">Upload exam</button>
                </form>
            </div>
            <script src="./js/examquestions1.js"></script>
        </section>
    </div>
</body>
</html>

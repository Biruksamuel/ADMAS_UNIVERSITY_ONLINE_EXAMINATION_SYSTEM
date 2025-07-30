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
                    <a href="./LoadExam.html" class="atag">
                        <i class="fa-solid fa-layer-group"></i>Load Exam
                    </a>
                </li>
                <li>
                    <a href="./ScheduleExam.html" class="atag">
                        <i class="fa-solid fa-calendar"></i>Schedule Exam
                    </a>
                </li>
                <li>
                    <a href="./View_Result.html" class="atag" id="active">
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
            <section class="mainsection">
                <div class="container">
                    <form id="userForm">
                        <h2>View Result</h2>
                        <label for="stud_name">Student name :</label>
                        <input type="text" id="stud_name" name="stud_name" placeholder="Enter Student name" required>
                        <label for="id">ID:</label>
                        <input type="text" id="id" name="id" placeholder="Enter ID" required>
                        <label for="examid">Exam ID:</label>
                        <input type="text" id="examid" name="examid" placeholder="Enter examid" required>
                        <button type="button" onclick="fetch_result()">View Result</button>
                    </form>
                    <div id="response"></div>
                </div>
            </section>
        </section>
    </div>
    <script>
        function fetch_result() {
            var form = document.getElementById('userForm');
            var formData = new FormData(form);

            fetch('fetch_result.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('response').innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>

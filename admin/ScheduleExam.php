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
  <link rel="stylesheet" href="./css/ScheduleExam.css" />
  <link rel="icon" href="./admaslogo.jpg" type="image/x-icon">
  <style>
    .popup-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 999;
    }
    .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      border: 2px solid #000;
      padding: 20px;
      z-index: 1000;
    }
    .popup.success {
      background-color: blue;
      color: white;
    }
    .popup.error {
      background-color: red;
      color: white;
    }
    .popup.active, .popup-overlay.active {
      display: block;
    }
    .popup-close {
      cursor: pointer;
      font-size: 18px;
      position: absolute;
      top: 10px;
      right: 10px;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <section class="choosesection">
      <ul>
        <li>
          <a href="./LoadExam.html">
            <i class="fa-solid fa-layer-group"></i>Load Exam
          </a>
        </li>
        <li>
          <a href="./ScheduleExam.html" id="active">
            <i class="fa-solid fa-calendar"></i>Schedule Exam
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
        <button onclick="logout()">Logout</button>
      </section>
      <section class="mainsection">
        <div class="wrapper2">
          <form id="scheduleForm">
            <h2>Schedule</h2>
            <div class="relative">
              <i class="fa-solid fa-id-card center"></i>
              <input
                type="text"
                placeholder="ExamID"
                class="pad"
                name="exam_id"
                required
              />
            </div>
            <div class="relative">
              <i class="fa-solid fa-clock center"></i>
              <input
                type="text"
                placeholder="Time"
                class="pad"
                name="time"
                required
              />
            </div>
            <div class="relative">
              <i class="fa-regular fa-calendar-days center"></i>
              <input
                type="text"
                placeholder="Date"
                class="pad"
                name="date"
                required
              />
            </div>
            <div class="relativenoborder">
              <button type="button" onclick="scheduleExam()">Submit</button>
            </div>
          </form>
        </div>
      </section>
    </section>
  </div>

  <div id="popup-overlay" class="popup-overlay" onclick="closePopup()"></div>
  <div id="popup" class="popup">
    <span class="popup-close" onclick="closePopup()">&times;</span>
    <p id="popup-message"></p>
  </div>

  <script>
    function scheduleExam() {
      var form = document.getElementById('scheduleForm');
      var formData = new FormData(form);

      fetch('update_schedule.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        const popup = document.getElementById('popup');
        const popupOverlay = document.getElementById('popup-overlay');
        const popupMessage = document.getElementById('popup-message');
        popupMessage.textContent = data.message;
        if (data.success) {
          popup.classList.add('success');
        } else {
          popup.classList.add('error');
        }
        popup.classList.add('active');
        popupOverlay.classList.add('active');
      })
      .catch(error => console.error('Error:', error));
    }

    function logout() {
      fetch('logout.php', {
        method: 'POST'
      })
      .then(response => response.json())
      .then(data => {
        const popup = document.getElementById('popup');
        const popupOverlay = document.getElementById('popup-overlay');
        const popupMessage = document.getElementById('popup-message');
        popupMessage.textContent = data.message;
        if (data.success) {
          popup.classList.add('success');
        } else {
          popup.classList.add('error');
        }
        popup.classList.add('active');
        popupOverlay.classList.add('active');

        if (data.success) {
          setTimeout(() => {
            window.location.href = 'index.php';
          }, 2000); // Redirect after 2 seconds
        }
      })
      .catch(error => console.error('Error:', error));
    }

    function closePopup() {
      const popup = document.getElementById('popup');
      const popupOverlay = document.getElementById('popup-overlay');
      popup.classList.remove('active', 'success', 'error');
      popupOverlay.classList.remove('active');
    }
  </script>
</body>
</html>

let eva = true;
var ExamId;
var token;
var timerInterval;

function fetchQuestions() {
    ExamId = document.getElementById('ExamId').value;
    token = document.getElementById('token').value;
    if (ExamId === '') {
        document.getElementById('warning').innerHTML = 'Please Enter Exam ID';
    } else {
        fetch('fetch_question.php?Exam_id=' + ExamId + '&token=' + token)
            .then(response => response.json())
            .then(data => {
                if (!data.error) {
                    timer(ExamId);
                    document.getElementById('Good').innerHTML = '<strong>Good luck</strong>';
                    document.getElementById('warning').innerHTML = "";
                    document.getElementById('submit_answer').style.display = 'block';
                    document.getElementById('LoadExam').style.display = 'none';
                    let userData = document.getElementById('userData');

                    userData.innerHTML = '';
                    let num = 1;
                    data.forEach(question => {
                        userData.innerHTML += `
                            <p><strong>${num}:</strong> ${question.question_statement}</p>
                            <input type="radio" name="answer${num}" value="${question.option_a}"> <strong>A:</strong> ${question.option_a}<br>
                            <input type="radio" name="answer${num}" value="${question.option_b}"> <strong>B:</strong> ${question.option_b}<br>
                            <input type="radio" name="answer${num}" value="${question.option_c}"> <strong>C:</strong> ${question.option_c}<br>
                            <input type="radio" name="answer${num}" value="${question.option_d}"> <strong>D:</strong> ${question.option_d}<br>
                            <hr>
                        `;
                        num++;
                    });
                } else {
                    document.getElementById('warning').innerHTML = 'This exam is not for your section ☹️';
                    document.getElementById('submit_answer').style.display = 'none';
                    document.getElementById('LoadExam').style.display = 'block';
                }
            }).catch(error => {
                document.getElementById('warning').innerHTML = "Exam not found";
            });
    }
}

function evaluateAnswers() {
    if (eva) {
        let num = 1;
        var correctAnswers = 0;

        fetch('fetch_question.php?Exam_id=' + ExamId + '&token=' + token)
            .then(response => response.json())
            .then(data => {
                data.forEach(question => {
                    let selectedAnswer = document.querySelector(`input[name='answer${num}']:checked`).value;
                    let correctAnswer = question.correct_option;
                    if (selectedAnswer === correctAnswer) {
                        correctAnswers++;
                    }
                    num++;
                });

                document.getElementById('result').innerHTML = `You answered ${correctAnswers}/${num - 1} questions correctly.`;
                eva = false;
                const from = num - 1;
                loadresult(correctAnswers, from);

                // Stop the timer
                clearInterval(timerInterval);
            })
            .catch(error => {
                document.getElementById('result').innerHTML = "Please complete the exam";
            });
    } else {
        document.getElementById('result').innerHTML = "You have already submitted the exam";
    }
}

function loadresult(correctAnswers, from) {
    fetch('loadresult.php?Exam_id=' + ExamId + '&token=' + token + '&correctAnswers=' + correctAnswers + '&from=' + from);
}

function timer(Exam_id) {
    var exam_id = Exam_id;
    fetch(`timer.php?exam_id=${exam_id}`)
        .then(response => response.json())
        .then(data => {
            if (data.time_allowed) {
                var hr = parseInt(data.time_allowed); // Get the hr value from the response
                var timeLeft = 3600 * hr; // Convert hours to seconds

                timerInterval = setInterval(function () {
                    var hours = Math.floor(timeLeft / 3600);
                    var minutes = Math.floor((timeLeft % 3600) / 60);
                    var seconds = timeLeft % 60;

                    document.getElementById('timer').textContent = 'Time left: ' + hours + 'h ' + minutes + 'm ' + seconds + 's';

                    if (timeLeft <= 0) {
                        clearInterval(timerInterval);
                        alert("Time's up! Your exam has ended.");
                    } else {
                        timeLeft--;
                    }
                }, 1000);
            }
        })
        .catch(error => {
            console.error('Error fetching timer data:', error);
        });
}

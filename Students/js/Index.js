let div = document.querySelector(".wrapper");
div.addEventListener("click", (e) => {
  //e.preventDefault();
});

//
function goToTakeExam() {
  window.location.href = "take_exam.php";
}

function goToViewExam() {
  window.location.href = "view_result.html";
}
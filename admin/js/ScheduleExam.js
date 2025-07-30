let iconchange = document.querySelectorAll(".wrapper2 i");
let inputchange = document.querySelectorAll(".wrapper2 input");


function changeExamID() {
  iconchange[0].classList.add("goup");
  inputchange[0].classList.add("nopad");
  console.log("yo")
}
function changeForTime() {
  iconchange[1].classList.add("goup");

  inputchange[1].classList.add("nopad");
}
function changeForDate() {
  iconchange[2].classList.add("goup");

  inputchange[2].classList.add("nopad");
}
function change2() {
  iconchange.forEach((element) => {
    element.classList.remove("goup");
  });
  inputchange.forEach((element) => {
    element.classList.remove("nopad");
  });
}
inputchange.forEach((element) => {
  element.addEventListener("focusout", change2);
});


//handle menu
function handleMenu() {
  //get choosesection and selectedsection
  let menu = document.querySelector(".choosesection");
  let main = document.querySelector(".selectedsection");

  if (menu.className == "choosesection") {
    menu.classList.add("closechoosesection");
    main.classList.add("fullscreen");
    console.log(main);
  } else {
    menu.classList.remove("closechoosesection");

    main.classList.remove("fullscreen");

    console.log(main);
  }
}

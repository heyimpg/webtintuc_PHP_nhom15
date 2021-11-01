// Login Form
var btnShowLogin = document.querySelectorAll(".login-search-area .login a");
var modal = document.querySelector(".modal");
var modalContainer = document.querySelector(".modal__container");
var nav = document.querySelector("#stickyMenu-sticky-wrapper");
// var btnClose = document.querySelector(".header__close");
function showModal(){
  modal.classList.add("open");
  nav.style.display = "none";
}

function hideModal(){
  modal.classList.remove("open");
  nav.style.display = "block";
}

// btnClose.addEventListener("click", hideModal);

  //for pice btn
for(var btn of btnShowLogin)
{
  btn.addEventListener("click", showModal);
}
  //for event click outside of modal
  modal.addEventListener("click", hideModal);
  modalContainer.addEventListener("click", function(event){event.stopPropagation()});

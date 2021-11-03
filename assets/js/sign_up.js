// Login Form - Sign up
var btnShowLogin_signUp = document.querySelector("#btn-sign_up");
var modal_signUp = document.querySelector(".modal-sign_up");
var modalContainer_signUp = document.querySelector(".modal__container-sign_up");
var nav_signUp = document.querySelector("#stickyMenu-sticky-wrapper");
// var btnClose = document.querySelector(".header__close");
function showModal_signUp(){
  modal_signUp.classList.add("open");
  nav_signUp.style.display = "none";
}

function hideModal_signUp(){
  modal_signUp.classList.remove("open");
  nav_signUp.style.display = "block";
}

// btnClose.addEventListener("click", hideModal_signUp);

//event show Modal
btnShowLogin_signUp.addEventListener("click", showModal_signUp);

//for event click outside of modal
modal_signUp.addEventListener("click", hideModal_signUp);
modalContainer_signUp.addEventListener("click", function(event){event.stopPropagation()});

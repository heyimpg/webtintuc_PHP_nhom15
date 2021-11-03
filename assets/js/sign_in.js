// Login Form - Sign in
var btnShowLogin_signIn = document.querySelector("#btn-sign_in");
var modal_signIn = document.querySelector(".modal-sign_in");
var modalContainer_signIn = document.querySelector(".modal__container-sign_in");
var nav_signIn = document.querySelector("#stickyMenu-sticky-wrapper");
// var btnClose = document.querySelector(".header__close");
function showModal_signIn(){
  modal_signIn.classList.add("open");
  nav_signIn.style.display = "none";
}

function hideModal_signIn(){
  modal_signIn.classList.remove("open");
  nav_signIn.style.display = "block";
}

// btnClose.addEventListener("click", hideModal_signIn);

//event show Modal
btnShowLogin_signIn.addEventListener("click", showModal_signIn);

//for event click outside of modal
modal_signIn.addEventListener("click", hideModal_signIn);
modalContainer_signIn.addEventListener("click", function(event){event.stopPropagation()});

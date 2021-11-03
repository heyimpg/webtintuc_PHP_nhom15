function showModal_signIn(){
  modal_signIn.classList.add("open");
  modal_signUp.classList.remove("open");
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

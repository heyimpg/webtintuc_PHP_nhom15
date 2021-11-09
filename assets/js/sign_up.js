function showModal_signUp(){
  modal_signUp.classList.add("open");
  modal_signIn.classList.remove("open");
  nav_signUp.style.display = "none";
}

function hideModal_signUp(){
  modal_signUp.classList.remove("open");
  nav_signUp.style.display = "block";
}

// btnClose.addEventListener("click", hideModal_signUp);

//event show Modal
btnShowLogin_signUp.forEach(btn=>btn.addEventListener("click", showModal_signUp));

//for event click outside of modal
modal_signUp.addEventListener("click", hideModal_signUp);
modalContainer_signUp.addEventListener("click", function(event){event.stopPropagation()});

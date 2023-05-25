

function loginPassword() {
   var x = document.getElementById("password");
   if (x.type == "password") {
      x.type = "text";
   } else {
      x.type = "password";
   }
}


const modal = document.querySelector("#my-modal");
const modalBtn = document.querySelector("#modal-btn");
const closeBtn = document.querySelector(".fa-lg");

modalBtn.addEventListener("click", openModal);
closeBtn.addEventListener("click", closeModal);

function openModal() {
   modal.style.display = "block";
}

function closeModal() {
   modal.style.display = "none";
}

function alertPopup() {
   alert("Login First");
}

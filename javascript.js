const productdetails = [...document.querySelectorAll(".product-details")];
const nxtBtn = [...document.querySelectorAll(".nxt-btn")];
const preBtn = [...document.querySelectorAll(".pre-btn")];

productdetails.forEach((item, i) => {
   let detailsDimensions = item.getBoundingClientRect();
   let detailsWidth = detailsDimensions.width;

   nxtBtn[i].addEventListener("click", () => {
      item.scrollLeft += detailsWidth;
   });

   preBtn[i].addEventListener("click", () => {
      item.scrollLeft -= detailsWidth;
   });
});


function loginPassword() {
   var x = document.getElementById("password");
   if (x.type == "password") {
      x.type = "text";
   } else {
      x.type = "password";
   }
}


// navbar
// const bar = document.getElementById("bar");
// const close = document.getElementById("close");
// const nav = document.getElementById("navbar");

// if (bar) {
//    bar.addEventListener("click", () => {
//       nav.classList.add("active");
//    });
// }
// if (close) {
//    close.addEventListener("click", () => {
//       nav.classList.remove("active");
//    });
// }

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

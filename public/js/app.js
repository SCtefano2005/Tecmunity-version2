const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
document.addEventListener('DOMContentLoaded', function () {
  const togglePasswordIcons = document.querySelectorAll('.toggle-password');
  
  togglePasswordIcons.forEach(icon => {
      icon.addEventListener('click', function () {
          const passwordField = this.previousElementSibling;
          const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
          passwordField.setAttribute('type', type);
          this.classList.toggle('fa-eye-slash');
      });
  });
});



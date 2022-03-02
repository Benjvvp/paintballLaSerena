//Navbar position fix to scroll with page
$(document).ready(function () {
  var navbar = $(".navbar");
  $(window).scroll(function () {
    if ($(this).scrollTop() > navbar.height()) {
      navbar.addClass("navbar-fixed");
    } else {
      navbar.removeClass("navbar-fixed");
    }
  });

  //Bootstrap success alert
  let success = new URL(window.location.href).searchParams.get("success");
  if(success == null) return;
  if(success == "true"){
    //Bootstrap alert
    let alert = document.getElementById("alert");
    alert.classList.add("alert-success");
    alert.classList.add('show');
    alert.innerHTML = "Tu mensaje se a enviado correctamente. <button type='button' class='btn-close' data-bs-dismiss='alert'aria-label='Close'></button>";
  }
  if(success == "false"){
    let alert = document.getElementById("alert");
    alert.classList.add("alert-danger");
    alert.classList.add('show');
    alert.innerHTML = "Tu mensaje no se a enviado, intenta nuevamente. <button type='button' class='btn-close' data-bs-dismiss='alert'aria-label='Close'></button>";
  }
});
// Modal
const imgs = document.querySelectorAll(".imgModal");
imgs.forEach((img) => {
    img.addEventListener("click", imageClick);
});
function imageClick(e){
    const src = e.target.getAttribute("src");
    document.querySelector(".modal-img").src = src;
    let mymodal = new bootstrap.Modal(document.getElementById("galleryModal"));
    mymodal.show();
}
// Modal Form
const btn = document.querySelectorAll(".nav_btn__contact");
btn.forEach((btn) => {
    btn.addEventListener("click", showForm);
});
function showForm(e){
    let mymodal = new bootstrap.Modal(document.getElementById("formModal"));
    mymodal.show();
}
// Modal Form Validation
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

//Close modal reset form validation
var regex = /[^+\d]/g;

//JQuery
$("#inputPhone").keyup(function(){
   if($("#inputPhone").val() == ""){
       $("#inputPhone").val("+")
   }
   $("#inputPhone").val($("#inputPhone").val().replace(regex, ""))
});
$('#formModal').on('hidden.bs.modal', function () {
   $('.formModal').bootstrapValidator('resetForm', true);
});
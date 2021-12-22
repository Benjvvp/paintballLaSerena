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
});
// Carousel Testimony
(function () {
  "use strict";

  var carousels = function () {
    $(".owl-carousel1").owlCarousel({
      loop: true,
      center: true,
      margin: 0,
      responsiveClass: true,
      nav: false,
      responsive: {
        0: {
          items: 1,
          nav: false,
        },
        680: {
          items: 2,
          nav: false,
          loop: false,
        },
        1000: {
          items: 3,
          nav: true,
        },
      },
    });
  };

  (function ($) {
    carousels();
  })(jQuery);
})();

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
(function () {
  "use strict";

  document
    .getElementById("sidebarCollapse")
    .addEventListener("click", function () {
      document.getElementById("sidebar").classList.toggle("active");
      document.getElementById("body").classList.toggle("active");
    });

  // Auto-hide sidebar on window resize if window size is small
  window.addEventListener("resize", function () {
    if (window.innerWidth <= 768) {
      document.getElementById("sidebar").classList.add("active");
      document.getElementById("body").classList.add("active");
    }
  });
})();

(function () {
  window.addEventListener("load", function () {
    document.querySelector(".loader").style.display = "none";
    document.getElementById("preloader").style.display = "none";
  });
})();

document.addEventListener("DOMContentLoaded", function () {
  var quantity = 1;

  document
    .querySelector(".quantity-right-plus")
    .addEventListener("click", function (e) {
      e.preventDefault();
      var quantity = parseInt(document.getElementById("quantity").value);
      document.getElementById("quantity").value = quantity + 1;
    });

  document
    .querySelector(".quantity-left-minus")
    .addEventListener("click", function (e) {
      e.preventDefault();
      var quantity = parseInt(document.getElementById("quantity").value);
      if (quantity > 1) {
        document.getElementById("quantity").value = quantity - 1;
      }
    });

  var owlCarousel = document.querySelector(".owl-carousel");
  if (owlCarousel !== null) {
    owlCarousel.classList.add("slick");
    var slickSettings = {
      infinite: true,
      swipeToSlide: true,
      slidesToShow: 5,
      dots: true,
      slidesToScroll: 2,
      autoplay: true,
      prevArrow:
        '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
      nextArrow:
        '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    };
    $(".owl-carousel").slick(slickSettings);
  }

  // ===============active category=============================
});

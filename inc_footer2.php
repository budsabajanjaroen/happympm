<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<a href="#" class="scroll-footer d-flex align-items-center justify-content-center"><i class="bi bi-arrow-down"></i></a>
  <div id="preloader"></div>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/jquery-1.8.3.min.js"></script>
  <script src="assets/js/templatemo.js"></script>
  <script>
  $(document).ready(function()
{
    $("#button").click(function()
    {
        $("#table").toggle();
    });
});
</script>
<script>
  $(document).ready(function()
{
    $("#button2").click(function()
    {
        $("#table2").toggle();
    });
});
</script>
<script>
  /**
   * Hero carousel indicators
   */
 
let heroCarouselIndicators = select("#home-carousel-indicators")
let heroCarouselItems = select('#home-carousel .carousel-item', true)

heroCarouselItems.forEach((item, index) => {
  (index === 0) ?
  heroCarouselIndicators.innerHTML += "<li data-bs-target='#home-carousel' data-bs-slide-to='" + index + "' class='active'></li>":
    heroCarouselIndicators.innerHTML += "<li data-bs-target='#home-carousel' data-bs-slide-to='" + index + "'></li>"
});


</script>
<script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
     <script>
$(document).ready(function () {
    var tables = $("table");
    //Grabs all the tables
    tables.hide().first().show();
    //Hides all the tables except first
    $("a.button").on("click", function () {
        //Adds eventListner to buttons
        tables.hide();
        //Hides all the tables
        var tableTarget = $(this).data("table");
        //Gets data# of button
        $("table#" + tableTarget).show();
        //Shows the table with an id equal to data attr of the button
    })
})();
    </script>

<!-- Initialize Swiper -->
<script>
  new Swiper(".mySwiper", {
    effect: "cube",
    grabCursor: true,
    cubeEffect: {
      shadow: true,
      slideShadows: true,
      shadowOffset: 20,
      shadowScale: 0.94,
    },
    pagination: {
      el: ".swiper-pagination",
    },
  });
</script>
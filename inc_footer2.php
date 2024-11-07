

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<a href="#" class="scroll-footer d-flex align-items-center justify-content-center"><i class="bi bi-arrow-down"></i></a>

<style>
  .floating-container {
    position: fixed;
    bottom: 60px;
    right: 12px;
    display: flex;
    flex-direction: column-reverse;
    /* แก้ไขที่นี่จาก column เป็น column-reverse */
    align-items: center;
    z-index: 1000;
  }

  .btn-round {
    border-radius: 50%;
    width: 50px;
    height: 50px;
    margin-bottom: 5px;
    /* ปรับเปลี่ยนจาก margin ทั่วไป เป็น margin-bottom */
    display: flex;
    justify-content: center;
    align-items: center;
    transition: transform 0.3s, opacity 0.3s;
  }

  .hidden {
    transform: translateY(20px);
    /* แก้ไขที่นี่จาก translateY(-20px) เป็น translateY(20px) */
    opacity: 0;
    visibility: hidden;
  }

  .modal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 300px;
    /* กำหนดความกว้างสูงสุด */
    max-height: 400px;
    /* กำหนดความสูงสูงสุด */
    background-color: white;
    border-radius: 8px;
    /* มุมโค้งนุ่มนวล */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* เงาเบาๆ */
    padding: 15px;
    /* ระยะห่างภายใน */
    z-index: 1050;
    display: none;
    /* เริ่มต้นไม่แสดง */
  }

  .modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 25px;
    /* ขนาดตัวอักษรหัวข้อ */
    padding-bottom: 10px;
    border-bottom: 1px solid #ccc;
    /* เส้นขั้นหัวข้อ */

  }

  .modal-header .close {
    cursor: pointer;
    border: none;
    background: none;
    font-size: 24px;
    /* ขนาดตัวอักษรปุ่มปิด */
  }

  .modal-content {
    font-size: 20px;
    /* ขนาดตัวอักษรเนื้อหา */
    text-align: center;
    /* จัดตัวอักษรกึ่งกลาง */
    margin-top: 10px;
  }

  .modal.open {
    display: block;
    /* แสดงเมื่อเปิด */
  }
</style>
<span
  style="    height: 50px;
    width: 50px;
    margin-left: 0px;
    margin-right: auto;
    margin-top: 0px;
    background-image: none;
    right: 12px;
    bottom: 10px;
    padding: 15px;
    display: block;
"
  class="u-back-to-top u-custom-color-7 u-icon u-icon-circle u-opacity u-opacity-85" data-href="#">
  <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 551.13 551.13">
    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-1d98"></use>
  </svg>
  <svg class="u-svg-content" enable-background="new 0 0 551.13 551.13" viewBox="0 0 551.13 551.13"
    xmlns="http://www.w3.org/2000/svg" id="svg-1d98">
    <path d="m275.565 189.451 223.897 223.897h51.668l-275.565-275.565-275.565 275.565h51.668z"></path>
  </svg>
</span>

<div class="floating-container">
  <!-- Toggle Button -->
  <button class="btn btn-primary btn-round" onclick="toggleButtons()">+</button>

  <!-- Contact Info Button -->
  <button class="btn btn-light btn-round hidden" style="background-color:lightskyblue; border-color:lightskyblue;" onclick="toggleModal()">
    <img src="assets/img/icon/mail.png" class="img-fluid" alt=""></button>
  <button class="btn btn-light btn-round hidden" style="background-color:aliceblue; border-color:aliceblue;" onclick="toggleModal2()">
    <img src="assets/img/icon/line.png" class="img-fluid" alt="">
  </button>
  <button class="btn btn-light btn-round hidden" style="background-color:blue; border-color:blue;" onclick="toggleModal3()">
    <img src="assets/img/icon/facebook-app-symbol.png" class="img-fluid" alt="">
  </button>
</div>

<!-- Modal -->
<div id="contactModal" class="modal">
  <div class="modal-header">
    <span>Email</span>
    <button class="close" onclick="toggleModal()">×</button>
  </div>
  <div class="modal-content">
    <p>info@happympm.com</p>
  </div>
</div>

<div id="contactModal2" class="modal">
  <div class="modal-header">
    <span>line</span>
    <button class="close" onclick="toggleModal2()">×</button>
  </div>
  <div class="modal-content">
    <a>https://lin.ee/atsYS9K</a>
    <img src="assets/img/icon/M_gainfriends_2dbarcodes_BW.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
    <img>
  </div>
</div>

<div id="contactModal3" class="modal">
  <div class="modal-header">
    <span>facebook</span>
    <button class="close" onclick="toggleModal3()">×</button>
  </div>
  <div class="modal-content">
    <p>happympmofficial</p>
    <img src="assets/img/icon/face.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">

  </div>
</div>








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

<script>
  function toggleButtons() {
    const buttons = document.querySelectorAll('.floating-container > .btn-light');
    buttons.forEach(button => {
      button.classList.toggle('hidden');
    });
  }

  function toggleModal() {
    const modal = document.getElementById('contactModal');
    modal.classList.toggle('open');
  }

  function toggleModal2() {
    const modal2 = document.getElementById('contactModal2');
    modal2.classList.toggle('open');
  }

  function toggleModal3() {
    const modal3 = document.getElementById('contactModal3');
    modal3.classList.toggle('open');
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

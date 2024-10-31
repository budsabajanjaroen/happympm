<?php
      // session_start();
      // if (!isset($_SESSION['loggedin'])) {
      //   header("Location: ../login.php");
      //   exit;
      // }

      require("../db_connect.php");
      ?> 


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo3.png" rel="icon">
  <title>RuangAdmin - Form Basics</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet">
  <link href="vendor/clock-picker/clockpicker.css" rel="stylesheet">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include "sidebar.php" ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include "topbar.php" ?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Promotion</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Forms</li>
              <li class="breadcrumb-item active" aria-current="page">Promotion</li>
            </ol>
          </div>
          <form action="save_promotion.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-lg-12">
                <!-- name -->
                <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">ชื่อ</h6>
                  </div>
                  <div class="row card-body">
                    <div class="col">

                      <div class="form-group">
                        <label for="name_th_promotion">ชื่อ ไทย</label>
                        <input type="text" class="form-control" id="name_th_promotion" name="name_th_promotion" placeholder="ชื่อ th">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group ">
                        <label for="name_en_promotion">ชื่อ อังกฤษ</label>
                        <input type="text" class="form-control" id="name_en_promotion" name="name_en_promotion" placeholder="ชื่อ en">
                      </div>

                    </div>
                  </div>
                </div>
                <!-- name -->
                <!-- img -->
                <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">รูป</h6>
                  </div>
                  <div class="row card-body">
                    <div class="col">
                      <div class="form-group">
                        <label for="img_1_promotion">รูป1</label>
                        <input type="file" class="form-control" id="img_1_promotion" name="img_1_promotion" aria-describedby="inputGroupFileAddon01" aria-label="รูป1" placeholder="รูป1">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="img_2_promotion">รูป2</label>
                        <input type="file" class="form-control" id="img_2_promotion" name="img_2_promotion" aria-describedby="inputGroupFileAddon02" aria-label="รูป2" placeholder="รูป2">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="img_3_promotion">รูป3</label>
                        <input type="file" class="form-control" id="img_3_promotion" name="img_3_promotion[]" aria-describedby="inputGroupFileAddon03" aria-label="รูป3" placeholder="รูป3" multiple>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- img -->
                <!-- detail -->
                <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">รายละเอียด</h6>
                  </div>
                  <div class="row card-body">
                    
                    <div class="col form-group">
                      <label for="detail_th_promotion">รายละเอียด ไทย</label>
                      <textarea class="form-control" name="detail_th_promotion" id="detail" rows="5"></textarea>
                    </div>
                    <div class="col form-group">
                      <label for="detail_en_promotion">รายละเอียด อังกฤษ</label>
                      <textarea class="form-control" name="detail_en_promotion" id="detail" rows="5"></textarea>
                    </div>
                  </div>
                </div>
                <!-- detail -->


                <!-- start date - end date -->
                <div class="row">
                  <div class="col-lg-6">
                    <div class="card mb-4">
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">เวลาโปรโมชั่น</h6>
                      </div>
                      <div class="row card-body">
                        <div class="col">
                          <div class="form-group" id="simple-date3">
                            <label for="start_date_promotion">Start date</label>
                            <div class="input-group date">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control" id="start_date_promotion" name="start_date_promotion" value="01/06/2020">
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group" id="simple-date3">
                            <label for="end_date_promotion">End date</label>
                            <div class="input-group date">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control" value="01/06/2020" name="end_date_promotion" id="end_date_promotion">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-6">
                    <div class="card mb-4">
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">ประเภทโปรโมชั่น</h6>
                      </div>
                      <div class="card-body">
                        <label for="type_promotion">ประเภทโปรโมชั่น</label>
                        <select class="select2-single form-control" id="type_promotion" name="type_promotion" required>
                          <option value="" disabled selected>เลือกประเภทโปรโมชั่น</option>
                          <option value="โปรโมชั่นทั่วไป">โปรโมชั่นทั่วไป</option>
                          <option value="โปรโมชั่นท่องเที่ยว">โปรโมชั่นท่องเที่ยว</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="submit-button">
                      <button type="back" class="btn btn-primary mb-1">back</button>
                      <button type="submit" class="btn btn-success mb-1">Submit</button>
                    </div>
                  </div>
                </div>

          </form>
        </div>
      </div>
      <!--Row-->
    </div>
    <!-- Documentation Link -->

  </div>
  </div>
  <!---Container Fluid-->
  </div>
  <!-- Footer -->
  <?php include "footer.php"  ?>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.4.1/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/select2/dist/js/select2.min.js"></script>
  <script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
  <script src="vendor/clock-picker/clockpicker.js"></script>
  <script>
    tinymce.init({
      selector: 'textarea#detail',
      plugins: 'advlist autolink lists link image charmap print preview anchor code fullscreen insertdatetime media table paste code help wordcount',
      toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image | fullscreen preview | code',
      menubar: 'file edit view insert format tools table help',
      height: 300,
      branding: false,
      automatic_uploads: true,
      file_picker_types: 'image',
      paste_data_images: true,
      images_file_types: 'jpg,svg,webp',
      /* enable title field in the Image dialog*/
      image_title: true,
      file_picker_callback: (cb, value, meta) => {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'img/*');

        input.addEventListener('change', (e) => {
          const file = e.target.files[0];

          const reader = new FileReader();
          reader.addEventListener('load', () => {
            const id = 'blobid' + (new Date()).getTime();
            const blobCache = tinymce.activeEditor.editorUpload.blobCache;
            const base64 = reader.result.split(',')[1];
            const blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);
            cb(blobInfo.blobUri(), {
              title: file.name
            });
          });
          reader.readAsDataURL(file);
        });

        input.click();
      },
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    });
  </script>



  <script>
    $(document).ready(function() {
      $('.select2-single').select2();

      // Date Picker Initialization
      $('#start_date_promotion').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true
      });

      $('#end_date_promotion').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true
      });
    });
  </script>
</body>

</html>
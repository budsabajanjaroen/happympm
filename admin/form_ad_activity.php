<?php
// session_start();
// if (!isset($_SESSION['loggedin'])) {
//   header("Location: ../login.php");
//   exit;
// }

require("../db_connect.php");

// ดึงข้อมูลจากตาราง lecturer
$sql = "SELECT * FROM lecturer";
$stmt = $pdo->query($sql);
$lecturer = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ดึงข้อมูลจากตาราง branch
$sql = "SELECT * FROM branch";
$stmt = $pdo->query($sql);
$branch = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <h1 class="h3 mb-0 text-gray-800">Activity</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Forms</li>
              <li class="breadcrumb-item active" aria-current="page">activity</li>
            </ol>
          </div>
          <form action="save_activity.php" method="post" enctype="multipart/form-data">
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
                        <label for="name_th_activity">ชื่อ ไทย</label>
                        <input type="text" class="form-control" id="name_th_activity" name="name_th_activity" placeholder="ชื่อ th">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group ">
                        <label for="name_en_activity">ชื่อ อังกฤษ</label>
                        <input type="text" class="form-control" id="name_en_activity" name="name_en_activity" placeholder="ชื่อ en">
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
                        <label for="img_1_activity">รูป1</label>
                        <input type="file" class="form-control" id="img_1_activity" name="img_1_activity" aria-describedby="inputGroupFileAddon01" aria-label="รูป1" placeholder="รูป1">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="img_2_activity">รูป2</label>
                        <input type="file" class="form-control" id="img_2_activity" name="img_2_activity" aria-describedby="inputGroupFileAddon02" aria-label="รูป2" placeholder="รูป2">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="img_3_activity">รูป3</label>
                        <input type="file" class="form-control" id="img_3_activity" name="img_3_activity[]" aria-describedby="inputGroupFileAddon03" aria-label="รูป3" placeholder="รูป3" multiple>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- img -->

                <!-- branch lecturer -->
                <div class="row">
                  <div class="col-lg-6">
                    <div class="card mb-4">
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">สาขา</h6>
                      </div>
                      <div class="card-body">
                        <label for="branch">สาขา</label>
                        <select class="select2-single form-control" id="branch" name="branch" required>
                          <option value="" disabled selected>เลือกสาขา</option>
                          <?php foreach ($branch as $branchItem): ?>
                            <option value="<?php echo htmlspecialchars($branchItem['id_branch']); ?>">
                              <?php echo htmlspecialchars($branchItem['name_th_branch']); ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="card mb-4">
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">วิทยากร</h6>
                      </div>
                      <div class="card-body">
                        <label for="lecturer">วิทยากร</label>
                        <select class="select2-single form-control" id="lecturer" name="lecturer" required>
                          <option value="" disabled selected>เลือกวิทยากร</option>
                          <?php foreach ($lecturer as $lecturer): ?>
                            <option value="<?php echo $lecturer['id_lecturer']; ?>">
                              <?php echo $lecturer['name_th_lecturer']; ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- branch lecturer -->


                <!-- detail -->
                <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">รายละเอียด</h6>
                  </div>
                  <div class="row card-body">
                    <div class="col">
                      <div class="form-group">

                        <label for="detail_th_activity">รายละเอียด ไทย</label>
                        <textarea class="form-control" name="detail_th_activity" id="detail" rows="5"></textarea>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="detail_en_activity">รายละเอียด อังกฤษ</label>
                        <textarea class="form-control" name="detail_en_activity" id="detail" rows="5"></textarea>
                      </div>
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
                            <label for="start_date_activity">Start date</label>
                            <div class="input-group date">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control" id="start_date_activity" name="start_date_activity" value="01/06/2020">
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group" id="simple-date3">
                            <label for="end_date_activity">End date</label>
                            <div class="input-group date">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control" value="01/06/2020" name="end_date_activity" id="end_date_activity">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- start date - end date -->

                  <!-- start time - end time -->
                  <div class="col-lg-6">
                    <div class="card mb-4">
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">เวลากิจกรรรม</h6>
                      </div>
                      <div class="row card-body">
                        <div class="col">
                          <div class="form-group">
                            <label for="clockPicker1">ตั้งแต่เวลา</label>
                            <div class="input-group clockpicker" id="clockPicker1">
                              <input type="text" class="form-control">
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="clockPicker2">ถึงเวลา</label>
                            <div class="input-group clockpicker" id="clockPicker2">
                              <input type="text" class="form-control">
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- start time - end time -->

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
      $('#start_date_activity').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true
      });

      $('#end_date_activity').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true
      });
    });
    $('#clockPicker1').clockpicker({
      donetext: 'Done'
    });

    $('#clockPicker2').clockpicker({
      autoclose: true
    });

    let input = $('#clockPicker3').clockpicker({
      autoclose: true,
      'default': 'now',
      placement: 'top',
      align: 'left',
    });

    $('#check-minutes').click(function(e) {
      e.stopPropagation();
      input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
    $(document).ready(function() {
      $('.select2-single').select2();
    });
  </script>
</body>

</html>
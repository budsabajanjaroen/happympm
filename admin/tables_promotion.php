<?php include "../db_connect.php" ?>
<?php
$sql = "SELECT * FROM promotion";
$stmt = $pdo->query($sql);
$promotions = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
  <title>RuangAdmin - Simple Tables</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>
<style>
  /* ปรับตาราง */
  .table-responsive {
    overflow-x: auto;
  }
  tbody {
    text-align: center;
  }
  td img{
    width: 50px;
    height: 50px;
    object-fit: cover;
    vertical-align: middle;
  }

  tbody tr td {
    vertical-align: middle;
    white-space: nowrap; /* ป้องกันไม่ให้เนื้อหาขึ้นบรรทัดใหม่ */
  }

  tbody tr td.detail-column {
    max-width: 200px;
    /* กำหนดความกว้างของคอลัมน์ detail ตามที่ต้องการ */
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  thead.thead-light {
    text-align: center;
  }

  .edit {
    color: yellow;
  }

  .red {
    color: red;
  }

  thead tbody th td {
    text-align: center;
  }.img-table{
    width: 50px;
    height: 50px;
  }
  .card .table td, .card .table th {
    vertical-align: middle;
}

  .id-td {
    color: blue;
  }
</style>

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
            <h1 class="h3 mb-0 text-gray-800">Promotion Tables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active" aria-current="page">Promotion Tables</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Promotion Table</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>img</th>
                        <th>Detail</th>

                        <th>type</th>
                        <th colspan="2">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($promotions as $promotion): ?>
                        <tr>
                          <td class="id-td"><?php echo htmlspecialchars($promotion['id_promotion']); ?></td>
                          <td><?php echo htmlspecialchars($promotion['name_th_promotion']); ?></td>
                          <td>
                            <span class="badge badge-success"><?php echo date("d-m-Y", strtotime($promotion['start_date_promotion'])); ?></span> -
                            <span class="badge badge-success"><?php echo date("d-m-Y", strtotime($promotion['end_date_promotion'])); ?></span>
                          </td>

                          <td ><img src="../assets/img/promotion/<?php echo htmlspecialchars($promotion['id_promotion']) . '/' . htmlspecialchars($promotion['img_1_promotion']); ?>" alt="promotion Image"></td>
                          <td class="detail-column"><?php echo strip_tags($promotion['detail_th_promotion']); ?></td>
                          <td><?php echo strip_tags($promotion['type_promotion']); ?></td>
                          <td><a href="promotiondetails.php?id=<?php echo $promotion['id_promotion']; ?>" class="btn btn-sm btn-warning">edit</a></td>

                          <td class="red"><a href="promotiondetails.php?id=<?php echo $promotion['id_promotion']; ?>" class="btn btn-sm btn-danger">delete</a></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <?php include "footer.php"; ?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/ruang-admin.min.js"></script>

</script>

</html>
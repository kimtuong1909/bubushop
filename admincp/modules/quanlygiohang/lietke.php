<?php
$sql_lietke_dh = "SELECT * FROM tbl_giohang INNER JOIN tbl_khachhang ON tbl_giohang.id_customer=tbl_khachhang.id_customer ORDER BY id_giohang DESC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<!-- ========== table components start ========== -->
<section class="table-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>Quản lý giỏ hàng</h2>
          </div>
        </div>
        <!-- end col -->
        <div class="col-md-6">
          <div class="breadcrumb-wrapper mb-30">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#0">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Quản lý giỏ hàng
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <!-- ========== tables-wrapper start ========== -->
    <div class="tables-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-style mb-30">
            <!-- <h6 class="mb-10">Data Table</h6>
            <p class="text-sm mb-20">
              For basic styling—light padding and only horizontal
              dividers—use the class table.
            </p> -->
            <div class="table-wrapper table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <h6>ID</h6>
                    </th>
                    <th>
                      <h6>Customer Name</h6>
                    </th>
                    <th>
                      <h6>Address</h6>
                    </th>
                    <th>
                      <h6>Email</h6>
                    </th>
                    <th>
                      <h6>Phone No</h6>
                    </th>
                    <th>
                      <h6>Status</h6>
                    </th>
                    <th>
                      <h6> </h6>
                    </th>
                    <th>
                      <h6>Action</h6>
                    </th>
                  </tr>
                  <!-- end table row-->
                </thead>
                <tbody>
                <?php
    while ($row_dh = mysqli_fetch_array($query_lietke_dh)) {
    ?>
        <tr>
            <td><?php echo $row_dh['id_giohang'] ?></td>
            <td><?php echo $row_dh['name_user'] ?></td>
            <td><?php echo $row_dh['address_user'] ?></td>
            <td><?php echo $row_dh['email'] ?></td>
            <td><?php echo $row_dh['phone'] ?></td>
            <?php if ($row_dh['tinhTrang'] == 1) { ?>
                <td><a href="modules/quanlygiohang/xulytinhtrang.php?idgiohang=<?php echo $row_dh['id_giohang'] ?>">Đơn hàng mới</a></td>
            <?php
            } else {
            ?>
                <td><?php echo "Đã xem" ?></td>
            <?php
            }
            ?>
            <td><a href="index.php?action=donhang&query=xemdonhang&idgiohang=<?php echo $row_dh['id_giohang'] ?>">Xem chi tiết</a></td>
            <td><a href="modules/quanlygiohang/indonhang.php?idgiohang=<?php echo $row_dh['id_giohang'] ?>">In</a></td>
        </tr>
    <?php
    }
    ?>
                  <!-- end table row -->
                </tbody>
              </table>
              <!-- end table -->
            </div>
          </div>
          <!-- end card -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== tables-wrapper end ========== -->
  </div>
  <!-- end container -->
</section>
<!-- ========== table components end ========== -->
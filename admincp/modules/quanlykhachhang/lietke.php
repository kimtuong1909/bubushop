<?php
$sql_lietke_khachhang = "SELECT * FROM tbl_khachhang ORDER BY id_customer DESC";
$query_lietke_khachhang = mysqli_query($mysqli, $sql_lietke_khachhang)
?>
<!-- ========== table components start ========== -->
<section class="table-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>Danh sách khách hàng</h2>
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
                  Danh sách khách hàng
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
                      <h6>Customer Name</h6>
                    </th>
                    <th>
                      <h6>Gender</h6>
                    </th>
                    <th>
                      <h6>Date Of Birth</h6>
                    </th>
                    <th>
                      <h6>Email</h6>
                    </th>
                    <th>
                      <h6>Password</h6>
                    </th>
                    <th>
                      <h6>Address</h6>
                    </th>
                    <th>
                      <h6>Phone No</h6>
                    </th>
                    <th>
                      <h6>Action</h6>
                    </th>
                  </tr>
                  <!-- end table row-->
                </thead>
                <tbody>
                  <?php
                  while ($row = mysqli_fetch_array($query_lietke_khachhang)) {
                  ?>
                    <tr>
                      <td class="min-width">
                        <div class="lead">
                          <div class="lead-image">
                            <?php if (isset($row['avatar']) && $row['avatar'] != "") {
                              echo '<img  onerror="https://frontend.tikicdn.com/_desktop-next/static/img/account/avatar.png"  src="modules/quanlykhachhang/uploads/' . $row['avatar'] . '" title="avatar" alt="avatar">';
                            } else {
                              echo '<img src="https://frontend.tikicdn.com/_desktop-next/static/img/account/avatar.png" alt="avatar">';
                            } ?>
                          </div>
                          <div class="lead-text">
                            <p><?php echo $row['name_user'] ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="min-width">
                        <p><?php echo $row['gender'] ?></p>
                      </td>
                      <td class="min-width">
                        <p><?php echo $row['birthDay'] . '/' . $row['birthMonth'] . '/' . $row['birthYear'] ?></p>
                      </td>
                      <td class="min-width">
                        <p><a href="#0"><?php echo $row['email'] ?></a></p>
                      </td>
                      <td class="min-width">
                        <p><?php echo $row['password_user'] ?></p>
                      </td>
                      <td class="min-width">
                        <p><?php echo $row['address_user'] ?></p>
                      </td>
                      <td class="min-width">
                        <p><?php echo $row['phone'] ?></p>
                      </td>
                      <td>
                        <div class="action">
                          <button class="text-danger">
                            <i class="lni lni-trash-can"></i>
                          </button>
                        </div>
                      </td>
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
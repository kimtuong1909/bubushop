<?php
$sql_donhangnew = "SELECT * FROM tbl_giohang WHERE tinhTrang=1";
$query_donhangnew = mysqli_query($mysqli, $sql_donhangnew);
$count = mysqli_num_rows($query_donhangnew);

// Tổng thu nhập
$TotalIncome = 0;
$sql_donhang = "SELECT * FROM tbl_giohang";
$query_donhang = mysqli_query($mysqli, $sql_donhang);
while ($row_donhang = mysqli_fetch_array($query_donhang)) {
  $TotalIncome += $row_donhang['thanhTien'];
}
// Tính tổng khách hàng
$sql_khachhang = "SELECT * FROM tbl_khachhang";
$query_khachhang = mysqli_query($mysqli, $sql_khachhang);
$count_khachhang = mysqli_num_rows($query_khachhang);

// Top Selling Products
$sql_topselling = "SELECT *, SUM(soLuongMua) AS soLuongBan
FROM tbl_giohang_chitiet
INNER JOIN tbl_sanpham ON tbl_giohang_chitiet.id_sanpham=tbl_sanpham.id_sanpham
INNER JOIN tbl_danhmuc ON tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc
GROUP BY tbl_sanpham.id_sanpham
ORDER BY soLuongBan desc
LIMIT 5;";
$query_topselling = mysqli_query($mysqli, $sql_topselling);

// Sales History
$sql_saleshistory = "SELECT *
FROM tbl_giohang_chitiet
INNER JOIN tbl_sanpham ON tbl_giohang_chitiet.id_sanpham=tbl_sanpham.id_sanpham
INNER JOIN tbl_danhmuc ON tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc
GROUP BY tbl_giohang_chitiet.id_sanpham
ORDER BY id_giohang_chitiet desc
LIMIT 5;";
$query_saleshistory = mysqli_query($mysqli, $sql_saleshistory);

// Total Product
$sql_totalproduct = "SELECT * FROM tbl_sanpham";
$query_totalproduct = mysqli_query($mysqli, $sql_totalproduct);
$count_totalproduct = mysqli_num_rows($query_totalproduct);

?>
<!-- <div id="chart" style="height: 250px;"></div> -->

<!-- ========== section start ========== -->
<section class="section">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>eCommerce Dashboard</h2>
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
                  eCommerce
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
    <div class="row">
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon purple">
            <i class="lni lni-cart-full"></i>
          </div>
          <div class="content">
            <h6 class="mb-10">New Orders</h6>
            <h3 class="text-bold mb-10">
              <?php echo $count; ?>
            </h3>
            <p class="text-sm text-success">
              <i class="lni lni-arrow-up"></i> +2.00%
              <span class="text-gray">(30 days)</span>
            </p>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon success">
            <i class="lni lni-dollar"></i>
          </div>
          <div class="content">
            <h6 class="mb-10">Total Income</h6>
            <h3 class="text-bold mb-10">
              <?php echo number_format($TotalIncome, 0, ',', '.') . 'VNĐ' ?>
            </h3>
            <p class="text-sm text-success">
              <i class="lni lni-arrow-up"></i> +5.45%
              <span class="text-gray">Increased</span>
            </p>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon primary">
            <i class="lni lni-credit-cards"></i>
          </div>
          <div class="content">
            <h6 class="mb-10">Total Product</h6>
            <h3 class="text-bold mb-10">
              <?php echo $count_totalproduct; ?>
            </h3>
            <p class="text-sm text-danger">
              <!-- <i class="lni lni-arrow-down"></i> -2.00% -->
              <span class="text-gray"></span>
            </p>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon orange">
            <i class="lni lni-user"></i>
          </div>
          <div class="content">
            <h6 class="mb-10">New User</h6>
            <h3 class="text-bold mb-10">
              <?php echo $count_khachhang; ?>
            </h3>
            <p class="text-sm text-danger">
              <i class="lni lni-arrow-down"></i> -25.00%
              <span class="text-gray"> (30 days)</span>
            </p>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->
    <div class="row">
      <div class="col-lg-7">
        <div class="card-style mb-30">
          <div class="title d-flex flex-wrap justify-content-between">
            <div class="left">
              <h6 class="text-medium mb-10">Total Income</h6>
              <h3 class="text-bold"><?php echo number_format($TotalIncome, 0, ',', '.') . 'VNĐ' ?></h3>
            </div>
            <div class="right">
              <div class="select-style-1">
                <div class="select-position select-sm">
                  <select class="light-bg">
                    <option value="">Yearly</option>
                    <option value="">Monthly</option>
                    <option value="">Weekly</option>
                  </select>
                </div>
              </div>
              <!-- end select -->
            </div>
          </div>
          <!-- End Title -->
          <div class="chart">
            <canvas id="Chart1" style="width: 100%; height: 400px"></canvas>
          </div>
          <!-- End Chart -->
        </div>
      </div>
      <!-- End Col -->
      <div class="col-lg-5">
        <div class="card-style mb-30">
          <div class="
                    title
                    d-flex
                    flex-wrap
                    align-items-center
                    justify-content-between
                  ">
            <div class="left">
              <h6 class="text-medium mb-30">Sales/Revenue</h6>
            </div>
            <div class="right">
              <div class="select-style-1">
                <div class="select-position select-sm">
                  <select class="light-bg">
                    <option value="">Yearly</option>
                    <option value="">Monthly</option>
                    <option value="">Weekly</option>
                  </select>
                </div>
              </div>
              <!-- end select -->
            </div>
          </div>
          <!-- End Title -->
          <div class="chart">
            <canvas id="Chart2" style="width: 100%; height: 400px"></canvas>
          </div>
          <!-- End Chart -->
        </div>
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->
    <div class="row">
      <div class="col-lg-5">
        <div class="card-style mb-30">
          <div class="
                    title
                    d-flex
                    justify-content-between
                    align-items-center
                  ">
            <div class="left">
              <h6 class="text-medium mb-30">Sells by State</h6>
            </div>
          </div>
          <!-- End Title -->
          <div id="map" style="width: 100%; height: 400px"></div>
          <p>Last updated: 7 days ago</p>
        </div>
      </div>
      <!-- End Col -->
      <div class="col-lg-7">
        <div class="card-style mb-30">
          <div class="
                    title
                    d-flex
                    flex-wrap
                    justify-content-between
                    align-items-center
                  ">
            <div class="left">
              <h6 class="text-medium mb-30">Top Selling Products</h6>
            </div>
            <div class="right">
              <div class="select-style-1">
                <div class="select-position select-sm">
                  <select class="light-bg">
                    <option value="">Yearly</option>
                    <option value="">Monthly</option>
                    <option value="">Weekly</option>
                  </select>
                </div>
              </div>
              <!-- end select -->
            </div>
          </div>
          <!-- End Title -->
          <div class="table-responsive">
            <table class="table top-selling-table">
              <thead>
                <tr>
                  <th></th>
                  <th>
                    <h6 class="text-sm text-medium">Products</h6>
                  </th>
                  <th class="min-width">
                    <h6 class="text-sm text-medium">Category</h6>
                  </th>
                  <th class="min-width">
                    <h6 class="text-sm text-medium">Price</h6>
                  </th>
                  <th class="min-width">
                    <h6 class="text-sm text-medium">Sold</h6>
                  </th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row_topselling = mysqli_fetch_array($query_topselling)) {
                ?>
                  <tr>
                    <td>
                      <div class="check-input-primary">
                        <input class="form-check-input" type="checkbox" id="checkbox-1" />
                      </div>
                    </td>
                    <td>
                      <div class="product">
                        <div class="image">
                          <img src="modules\quanlysp\uploads\<?php echo $row_topselling['hinhAnh'] ?>" alt="" />
                        </div>
                        <p class="text-sm"><?php echo $row_topselling['tenSanPham']; ?></p>
                      </div>
                    </td>
                    <td>
                      <p class="text-sm"><?php echo $row_topselling['tenDanhMuc']; ?></p>
                    </td>
                    <td>
                      <p class="text-sm"><?php echo number_format($row_topselling['gia'], 0, ',', '.') . 'VNĐ'; ?></p>
                    </td>
                    <td>
                      <p class="text-sm"><?php echo $row_topselling['soLuongBan']; ?></p>
                    </td>
                    <td>
                      <div class="action justify-content-end">
                        <button class="more-btn ml-10 dropdown-toggle" id="moreAction1" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="lni lni-more-alt"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreAction1">
                          <li class="dropdown-item">
                            <a href="#0" class="text-gray">Remove</a>
                          </li>
                          <li class="dropdown-item">
                            <a href="?action=quanlysanpham&query=sua&id_sanpham=<?php echo $row_topselling['id_sanpham']; ?>" class="text-gray">Edit</a>
                          </li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
            <!-- End Table -->
          </div>
        </div>
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->
    <div class="row">
      <div class="col-lg-7">
        <div class="card-style mb-30">
          <div class="
                    title
                    d-flex
                    flex-wrap
                    align-items-center
                    justify-content-between
                  ">
            <div class="left">
              <h6 class="text-medium mb-2">Sales Forecast</h6>
            </div>
            <div class="right">
              <div class="select-style-1 mb-2">
                <div class="select-position select-sm">
                  <select class="light-bg">
                    <option value="">Last Month</option>
                    <option value="">Last 3 Months</option>
                    <option value="">Last Year</option>
                  </select>
                </div>
              </div>
              <!-- end select -->
            </div>
          </div>
          <!-- End Title -->
          <div class="chart">
            <div id="legend3">
              <ul class="legend3 d-flex flex-wrap align-items-center mb-30">
                <li>
                  <div class="d-flex">
                    <span class="bg-color primary-bg"> </span>
                    <div class="text">
                      <p class="text-sm text-success">
                        <span class="text-dark">Revenue</span> +25.55%
                        <i class="lni lni-arrow-up"></i>
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex">
                    <span class="bg-color purple-bg"></span>
                    <div class="text">
                      <p class="text-sm text-success">
                        <span class="text-dark">Net Profit</span> +45.55%
                        <i class="lni lni-arrow-up"></i>
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex">
                    <span class="bg-color orange-bg"></span>
                    <div class="text">
                      <p class="text-sm text-danger">
                        <span class="text-dark">Order</span> -4.2%
                        <i class="lni lni-arrow-down"></i>
                      </p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <canvas id="Chart3" style="width: 100%; height: 450px"></canvas>
          </div>
        </div>
      </div>
      <!-- End Col -->
      <div class="col-lg-5">
        <div class="card-style mb-30">
          <div class="
                    title
                    d-flex
                    flex-wrap
                    align-items-center
                    justify-content-between
                  ">
            <div class="left">
              <h6 class="text-medium mb-2">Traffic</h6>
            </div>
            <div class="right">
              <div class="select-style-1 mb-2">
                <div class="select-position select-sm">
                  <select class="bg-ligh">
                    <option value="">Last 6 Months</option>
                    <option value="">Last 3 Months</option>
                    <option value="">Last Year</option>
                  </select>
                </div>
              </div>
              <!-- end select -->
            </div>
          </div>
          <!-- End Title -->
          <div class="chart">
            <div id="legend4">
              <ul class="legend3 d-flex flex-wrap align-items-center mb-30">
                <li>
                  <div class="d-flex">
                    <span class="bg-color primary-bg"> </span>
                    <div class="text">
                      <p class="text-sm text-success">
                        <span class="text-dark">Store Visits</span>
                        +25.55%
                        <i class="lni lni-arrow-up"></i>
                      </p>
                      <h2>3456</h2>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex">
                    <span class="bg-color danger-bg"></span>
                    <div class="text">
                      <p class="text-sm text-danger">
                        <span class="text-dark">Visitors</span> -2.05%
                        <i class="lni lni-arrow-down"></i>
                      </p>
                      <h2>3456</h2>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <canvas id="Chart4" style="width: 100%; height: 420px"></canvas>
          </div>
          <!-- End Chart -->
        </div>
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->
    <div class="row">
      <div class="col-lg-5">
        <div class="card-style calendar-card mb-30">
          <div id="calendar-mini"></div>
        </div>
      </div>
      <!-- End Col -->
      <div class="col-lg-7">
        <div class="card-style mb-30">
          <div class="
                    title
                    d-flex
                    flex-wrap
                    align-items-center
                    justify-content-between
                  ">
            <div class="left">
              <h6 class="text-medium mb-30">Sales History</h6>
            </div>
            <div class="right">
              <div class="select-style-1">
                <div class="select-position select-sm">
                  <select class="light-bg">
                    <option value="">Today</option>
                    <option value="">Yesterday</option>
                  </select>
                </div>
              </div>
              <!-- end select -->
            </div>
          </div>
          <!-- End Title -->
          <div class="table-responsive">
            <table class="table top-selling-table">
              <thead>
                <tr>
                  <th>
                    <h6 class="text-sm text-medium">Products</h6>
                  </th>
                  <th class="min-width">
                    <h6 class="text-sm text-medium">
                      Category <i class="lni lni-arrows-vertical"></i>
                    </h6>
                  </th>
                  <th class="min-width">
                    <h6 class="text-sm text-medium">
                      Revenue <i class="lni lni-arrows-vertical"></i>
                    </h6>
                  </th>
                  <th class="min-width">
                    <h6 class="text-sm text-medium">
                      Status <i class="lni lni-arrows-vertical"></i>
                    </h6>
                  </th>
                  <th>
                    <h6 class="text-sm text-medium text-end">
                      Actions <i class="lni lni-arrows-vertical"></i>
                    </h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row_saleshistory = mysqli_fetch_array($query_saleshistory)) {
                ?>
                  <tr>
                    <td>
                      <div class="product">
                        <div class="image">
                          <img src="modules\quanlysp\uploads\<?php echo $row_saleshistory['hinhAnh'] ?>" alt="" />
                        </div>
                        <p class="text-sm"><?php echo $row_saleshistory['tenSanPham']; ?></p>
                      </div>
                    </td>
                    <td>
                      <p class="text-sm"><?php echo $row_saleshistory['tenDanhMuc']; ?></p>
                    </td>
                    <td>
                      <p class="text-sm"><?php echo number_format($row_saleshistory['gia'], 0, ',', '.') . 'VNĐ'; ?></p>
                    </td>
                    <td>
                      <span class="status-btn success-btn">Completed</span>
                    </td>
                    <td>
                      <div class="action justify-content-end">
                        <button class="edit">
                          <i class="lni lni-pencil"></i>
                        </button>
                        <button class="more-btn ml-10 dropdown-toggle" id="moreAction1" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="lni lni-more-alt"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreAction1">
                          <li class="dropdown-item">
                            <a href="#0" class="text-gray">Remove</a>
                          </li>
                          <li class="dropdown-item">
                            <a href="?action=quanlysanpham&query=sua&id_sanpham=<?php echo $row_saleshistory['id_sanpham']; ?>" class="text-gray">Edit</a>
                          </li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
            <!-- End Table -->
          </div>
        </div>
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->
  </div>
  <!-- end container -->
</section>
<!-- ========== section end ========== -->
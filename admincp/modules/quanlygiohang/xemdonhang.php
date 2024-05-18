<?php
$idgiohang = $_GET['idgiohang'];
$sql_chitiet = "SELECT * FROM tbl_giohang_chitiet INNER JOIN tbl_sanpham ON tbl_giohang_chitiet.id_sanpham=tbl_sanpham.id_sanpham WHERE id_giohang='" . $idgiohang . "'";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);

$sql_giaohang = "SELECT * FROM tbl_giaohang WHERE id_giohang='$idgiohang'";
$query_giaohang = mysqli_query($mysqli, $sql_giaohang);
$row_giaohang = mysqli_fetch_array($query_giaohang);
?>
<!-- ========== table components start ========== -->
<section class="table-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>Chi tiết đơn hàng</h2>
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
                  <a href="?action=quanlygiohang&query=lietke">Quản lý giỏ hàng</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                Chi tiết đơn hàng
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
<div>
    <div>
        <p style="margin: 12px"><b>Tên người nhận:</b> <?php echo $row_giaohang['tenNguoiNhan'] ?></p>
        <p style="margin: 12px"><b>Số điện thoại liên hệ:</b> <?php echo $row_giaohang['soDienThoai1'] ?></p>
        <p style="margin: 12px"><b>Số điện thoại liên hệ (Dự phòng):</b> <?php if (isset($row_giaohang['soDienThoai2']) && $row_giaohang['soDienThoai2'] != '') {
                                                                                                    echo $row_giaohang['soDienThoai2'];
                                                                                                } else {
                                                                                                    echo 'Không có';
                                                                                                } ?></p>
        <p style="margin: 12px"><b>Địa chỉ giao hàng:</b> <?php echo $row_giaohang['diaChi'] ?></p>
        <p style="margin: 12px"><b>Hình thức thanh toán:</b> <?php echo $row_giaohang['hinhThucThanhToan'] ?></p>
    </div>
</div>
<table class="table_lietke" border="1" width='50%'>
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
    </tr>
    <?php
    $total_price = 0;
    while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
        $total_price += $row_chitiet['soLuongMua'] * $row_chitiet['gia'];
    ?>
        <tr>
            <td><?php echo $row_chitiet['id_giohang'] ?></td>
            <td><?php echo $row_chitiet['tenSanPham'] ?></td>
            <td><img src="modules\quanlysp\uploads\<?php echo $row_chitiet['hinhAnh'] ?>" width="100" alt=""></td>
            <td><?php echo $row_chitiet['soLuongMua'] ?></td>
            <td><?php echo number_format($row_chitiet['gia'], 0, ',', '.') . 'đ' ?></td>
            <td><?php echo number_format($row_chitiet['soLuongMua'] * $row_chitiet['gia'], 0, ',', '.') . 'đ' ?></td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <td colspan="6">Thành tiền : <?php echo number_format($total_price, 0, ',', '.') . 'đ' ?></td>
    </tr>
</table>
    <!-- ========== tables-wrapper end ========== -->
  </div>
  <!-- end container -->
</section>
<!-- ========== table components end ========== -->

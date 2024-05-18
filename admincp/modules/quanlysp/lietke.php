<?php
$sql_lietke_sanpham = "SELECT * FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
$query_lietke_sanpham = mysqli_query($mysqli, $sql_lietke_sanpham);
?>
<!-- ========== table components start ========== -->
<section class="table-components">
  <div class="container-fluid">
    <!-- ========== tables-wrapper start ========== -->
    <p>Liệt kê sản phẩm</p>
<table class="table_lietke" class="table_lietke" border="1">
  <tr>
    <th>Tên sản phẩm</th>
    <th>Mã sản phẩm</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Hình ảnh</th>
    <th>Tóm tắt</th>
    <th>Nội dung</th>
    <th>Danh mục</th>
    <th>Tình trạng</th>
    <th>Quản lý</th>
  </tr>
  <?php
  while ($row_sanpham = mysqli_fetch_array($query_lietke_sanpham)) {
  ?>
    <tr>
      <td><?php echo $row_sanpham['tenSanPham'] ?></td>
      <td><?php echo $row_sanpham['maSanPham'] ?></td>
      <td><?php echo $row_sanpham['gia'] ?></td>
      <td><?php echo $row_sanpham['soLuong'] ?></td>
      <td><img src="modules/quanlysp/uploads/<?php echo $row_sanpham['hinhAnh'] ?>" alt="" width="100px"></td>
      <td><?php echo $row_sanpham['tomTat'] ?></td>
      <td><?php echo $row_sanpham['noiDung'] ?></td>
      <td><?php echo $row_sanpham['tenDanhMuc'] ?></td>
      <td><?php if ($row_sanpham['tinhTrang'] == 1) {
            echo 'ON';
          } else {
            echo 'OFF';
          } ?></td>
      <td><a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row_sanpham['id_sanpham'] ?>">Xóa</a> |
        <a href="?action=quanlysanpham&query=sua&id_sanpham=<?php echo $row_sanpham['id_sanpham'] ?>">Sửa</a>
      </td>
    </tr>
  <?php
  }
  ?>
</table>
    <!-- ========== tables-wrapper end ========== -->
  </div>
  <!-- end container -->
</section>
<!-- ========== table components end ========== -->

<?php
$sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc";
$query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp)
?>
<!-- ========== table components start ========== -->
<section class="table-components">
  <div class="container-fluid">
    <!-- ========== tables-wrapper start ========== -->
    <p>Liệt kê danh mục sản phẩm</p>
    <table class="table_lietke" style="width:66%" border="1">
      <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Hình ảnh</th>
        <th>Hình ảnh banner</th>
        <th>Quản lý</th>
      </tr>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
        $i++;
      ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row['tenDanhMuc'] ?></td>
          <td><img src="modules/quanlydanhmucsp/uploads/<?php echo $row['anhDanhMuc'] ?>" alt="" width="100px"></td>
          <td><img src="modules/quanlydanhmucsp/uploads/<?php echo $row['anhBanner'] ?>" alt="" width="150px" height="auto"></td>
          <td style="text-align:center;">
            <a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa </a>|
            <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>"> Sửa</a>
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
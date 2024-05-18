<?php
$sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc_baiviet ORDER BY id_danhmucbv";
$query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp)
?>
<!-- ========== table components start ========== -->
<section class="table-components">
  <div class="container-fluid">
    <!-- ========== tables-wrapper start ========== -->
    <p>Liệt kê danh mục bài viết</p>
<table class="table_lietke" style="width:60%" border="1">
  <tr>
    <th>ID</th>
    <th>Tên danh mục bài viết</th>
    <th>Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
    $i++;
  ?>
    <tr>
      <td><?php echo $row['id_danhmucbv'] ?></td>
      <td><?php echo $row['tenDanhMucBV'] ?></td>
      <td style="text-align:center;">
        <a href="modules/quanlydanhmucbv/xuly.php?iddanhmuc=<?php echo $row['id_danhmucbv'] ?>">Xóa </a>|
        <a href="?action=quanlydanhmucbaiviet&query=sua&iddanhmuc=<?php echo $row['id_danhmucbv'] ?>"> Sửa</a>
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

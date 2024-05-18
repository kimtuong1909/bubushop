<?php
$sql_lietke_bv = "SELECT * FROM tbl_baiviet INNER JOIN tbl_danhmuc_baiviet ON tbl_baiviet.id_danhmucbv=tbl_danhmuc_baiviet.id_danhmucbv ORDER BY id_baiviet DESC";
$query_lietke_bv = mysqli_query($mysqli, $sql_lietke_bv);
?>
<!-- ========== table components start ========== -->
<section class="table-components">
  <div class="container-fluid">
    <!-- ========== tables-wrapper start ========== -->
    <p>Liệt kê bài viết</p>
<table class="table_lietke" border="1">
    <tr>
        <th>ID</th>
        <th>Tên bài viết</th>
        <th>Hình ảnh</th>
        <th>Danh mục</th>
        <th style="width: 30%;">Tóm tắt</th>
        <th>Tình trạng</th>
        <th>Quản lý</th>
    </tr>
    <?php
    while ($row_baiviet = mysqli_fetch_array($query_lietke_bv)) {
    ?>
        <tr>
            <td><?php echo $row_baiviet['id_baiviet'] ?></td>
            <td><?php echo $row_baiviet['tenBaiViet'] ?></td>
            <td><img src="modules/quanlybaiviet/uploads/<?php echo $row_baiviet['hinhAnh'] ?>" alt="" width="120px"></td>
            <td><?php echo $row_baiviet['tenDanhMucBV'] ?></td>
            <td><?php echo $row_baiviet['tomTat'] ?></td>
            <td><?php if ($row_baiviet['tinhTrang'] == 1) {
                    echo 'ON';
                } else {
                    echo 'OFF';
                } ?>
            </td>
            <td><a href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row_baiviet['id_baiviet'] ?>">Xóa</a> |
                <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row_baiviet['id_baiviet'] ?>">Sửa</a>
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

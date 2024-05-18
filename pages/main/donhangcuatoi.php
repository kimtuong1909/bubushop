<?php
$idkhachhang = $_SESSION['id_customer'];
$sql_lietke_dh = "SELECT * FROM tbl_giohang INNER JOIN tbl_khachhang ON tbl_giohang.id_customer=tbl_khachhang.id_customer WHERE tbl_khachhang.id_customer='$idkhachhang'  ORDER BY id_giohang DESC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<h2 style="text-align:center; font-size:24px; margin:32px 0;">Đơn hàng của tôi</h2>
<table class="table_donhangcuatoi" border="1" width='80%'>
    <tr class="table_donhang_tr">
        <th class="table_donhang">ID giỏ hàng</th>
        <th class="table_donhang">Tên khách hàng</th>
        <th class="table_donhang">Địa chỉ</th>
        <th class="table_donhang">Email</th>
        <th class="table_donhang">Số điện thoại</th>
        <th class="table_donhang">Tình trạng</th>
        <th class="table_donhang">Ngày đặt</th>
        <th class="table_donhang">Quản lý</th>
        <th class="table_donhang"></th>
    </tr>
    <?php
    while ($row_dh = mysqli_fetch_array($query_lietke_dh)) {
    ?>
        <tr class="table_donhang_tr">
            <td class="table_donhang"><?php echo $row_dh['id_giohang'] ?></td>
            <td class="table_donhang"><?php echo $row_dh['name_user'] ?></td>
            <td class="table_donhang"><?php echo $row_dh['address_user'] ?></td>
            <td class="table_donhang"><?php echo $row_dh['email'] ?></td>
            <td class="table_donhang"><?php echo $row_dh['phone'] ?></td>
            <?php if ($row_dh['tinhTrang'] == 1) { ?>
                <td class="table_donhang"><?php echo "Đơn hàng mới" ?></td>
            <?php
            } else {
            ?>
                <td class="table_donhang"><?php echo "Đã xử lý" ?></td>
            <?php
            }
            ?>
            <td class="table_donhang"><?php echo $row_dh['ngayDat'] ?></td>
            <td class="table_donhang"><a href="index.php?quanly=xemdonhang&idgiohang=<?php echo $row_dh['id_giohang'] ?>">Xem chi tiết</a></td>
            <td class="table_donhang"><a href="pages/main/indonhangcuatoi.php?idgiohang=<?php echo $row_dh['id_giohang'] ?>">In</a></td>
        </tr>
    <?php
    }
    ?>
</table>
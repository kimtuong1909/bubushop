<?php
$idgiohang = $_GET['idgiohang'];
$sql_chitiet = "SELECT * FROM tbl_giohang_chitiet 
    INNER JOIN tbl_sanpham ON tbl_giohang_chitiet.id_sanpham=tbl_sanpham.id_sanpham
    WHERE id_giohang='" . $idgiohang . "'";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
// Lấy thông tin giao hàng
$sql_giaohang = "SELECT * FROM tbl_giaohang
    WHERE id_giohang='" . $idgiohang . "'";
$query_giaohang = mysqli_query($mysqli, $sql_giaohang);
$row_giaohang = mysqli_fetch_array($query_giaohang);
?>
<h3 style="text-align:center; font-size:24px; margin:32px 0;">Chi tiết đơn hàng</h3>
<div>
    <div>
        <p style="margin: 12px 0;margin-left: 10%;"><b>Tên người nhận:</b> <?php echo $row_giaohang['tenNguoiNhan'] ?></p>
        <p style="margin: 12px 0;margin-left: 10%;"><b>Số điện thoại liên hệ:</b> <?php echo $row_giaohang['soDienThoai1'] ?></p>
        <p style="margin: 12px 0;margin-left: 10%;"><b>Số điện thoại liên hệ (Dự phòng):</b> <?php if (isset($row_giaohang['soDienThoai2']) && $row_giaohang['soDienThoai2'] != '') {
                                                                                                    echo $row_giaohang['soDienThoai2'];
                                                                                                } else {
                                                                                                    echo 'Không có';
                                                                                                } ?></p>
        <p style="margin: 12px 0;margin-left: 10%;"><b>Địa chỉ giao hàng:</b> <?php echo $row_giaohang['diaChi'] ?></p>
        <p style="margin: 12px 0;margin-left: 10%;"><b>Hình thức thanh toán:</b> <?php echo $row_giaohang['hinhThucThanhToan'] ?></p>
    </div>
</div>
<table class="table_donhangcuatoi" border="1" width='80%'>
    <tr class="table_donhang_tr">
        <th class="table_donhang">Tên sản phẩm</th>
        <th class="table_donhang">Hình ảnh</th>
        <th class="table_donhang">Số lượng</th>
        <th class="table_donhang">Đơn giá</th>
        <th class="table_donhang">Thành tiền</th>
    </tr>
    <?php
    $total_price = 0;
    while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
        $total_price += $row_chitiet['soLuongMua'] * $row_chitiet['gia'];
    ?>
        <tr class="table_donhang_tr">
            <td class="table_donhang"><?php echo $row_chitiet['tenSanPham'] ?></td>
            <td class="table_donhang"><img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhAnh'] ?>" width="100" alt=""></td>
            <td class="table_donhang"><?php echo $row_chitiet['soLuongMua'] ?></td>
            <td class="table_donhang"><?php echo number_format($row_chitiet['gia'], 0, ',', '.') . 'đ' ?></td>
            <td class="table_donhang"><?php echo number_format($row_chitiet['soLuongMua'] * $row_chitiet['gia'], 0, ',', '.') . 'đ' ?></td>
        </tr>
    <?php
    }
    ?>
    <tr class="table_donhang_tr">
        <td class="table_donhang" colspan="6">Thành tiền : <?php echo number_format($total_price, 0, ',', '.') . 'đ' ?></td>
    </tr>
</table>
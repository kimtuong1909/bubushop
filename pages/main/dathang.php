<?php
if (!isset($_SESSION['cart'])) {
    echo ("<script>location.href = 'index.php?quanly=giohang';</script>");
}
$id_customer = $_SESSION['id_customer'];
$sql_giaohang = "SELECT * FROM tbl_giaohang WHERE id_customer='$id_customer' ORDER BY id_giaohang DESC LIMIT 1";
$query_giaohang = mysqli_query($mysqli, $sql_giaohang);
$count = mysqli_num_rows($query_giaohang);
// Thêm col tbl_giaohang
if (isset($_POST['themgiaohang'])) {
    $name = $_POST['tennguoinhan'];
    $sodienthoai1 = $_POST['sodienthoai1'];
    $sodienthoai2 = $_POST['sodienthoai2'];
    $diachi = $_POST['phuong'] . ',' . $_POST['quan'] . ',' . $_POST['thanhpho'];
    $ghichu = $_POST['ghichu'];
    $hinhthucthanhtoan = $_POST['hinhthucthanhtoan'];
    $idcustomer = $_SESSION['id_customer'];
    $sql_insert = "INSERT INTO tbl_giaohang(id_customer,tenNguoiNhan,soDienThoai1,soDienThoai2,diaChi,hinhThucThanhToan,ghiChu)
                         VALUES('" . $idcustomer . "','" . $name . "','" . $sodienthoai1 . "','" . $sodienthoai2 . "','" . $diachi . "','" . $hinhthucthanhtoan . "','" . $ghichu . "')";
    $row = mysqli_query($mysqli, $sql_insert);
    if ($row) {
        echo ("<script>alert('Thêm thành công');</script>");
        echo ("<script>location.href = 'index.php?quanly=dathang';</script>");
    }
}

if ($count == 1) {
    $row = mysqli_fetch_array($query_giaohang);
    $name = $row['tenNguoiNhan'];
    $sodienthoai1 = $row['soDienThoai1'];
    $sodienthoai2 = $row['soDienThoai2'];
    $diachi = explode(",", $row['diaChi']);
    $phuong = $diachi[0];
    $quan = $diachi[1];
    $thanhpho = $diachi[2];
    $ghichu = $row['ghiChu'];
    $hinhthucthanhtoan = $row['hinhThucThanhToan'];
} else {
    $id_customer = $_SESSION['id_customer'];
    $sql_khanghang = "SELECT * FROM tbl_khachhang WHERE id_customer= $id_customer ";
    $query_khanghang = mysqli_query($mysqli, $sql_khanghang);
    $row_khachhang = mysqli_fetch_array($query_khanghang);
    $name = $row_khachhang['name_user'];
    $sodienthoai1 = $row_khachhang['phone'];
}

?>
<div class="background_pay">
    <div class="grid">
        <div class="row">
            <div class="col l-8">
                <div>
                    <div class="cart_title">
                        <p class="cart_title_p"><a class="process" href="index.php?quanly=giohang">Giỏ Hàng</a></p>
                        <p class="cart_title_p current"><a class="process" href="index.php?quanly=dathang">Đặt Hàng</a></p>
                        <p class="cart_title_p">Hoàn Thành Đơn Hàng</p>
                    </div>
                </div>
                <div class="pay_border">
                    <strong>Địa Chỉ Giao Hàng</strong>
                </div>
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col l-6 m-12 c-12">
                            <div>
                                <input class="pay_input" name="tennguoinhan" required type="text" value="<?php echo $name ?>" placeholder="* Họ tên" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l-12 m-12 c-12">
                            <div class="input-group">
                                <span class="input-group-addon">VN +84</span>
                                <input type="text" name="sodienthoai1" required class="form-control" value="<?php echo $sodienthoai1 ?>" placeholder="* Số điện thoại">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l-12 m-12 c-12">
                            <div class="input-group">
                                <span class="input-group-addon">VN +84</span>
                                <input type="text" name="sodienthoai2" class="form-control" <?php if (isset($sodienthoai2)) {
                                                                                                echo 'value="' . $sodienthoai2 . '"';
                                                                                            } ?> placeholder="Số điện thoại dự phòng (không bắt buộc)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l-12 m-12 c-12">
                            <div class="input-group">
                                <span class="input-group-addon">Thành Phố</span>
                                <input class="form-control" required name="thanhpho" type="text" <?php if (isset($thanhpho)) {
                                                                                                        echo 'value="' . $thanhpho . '"';
                                                                                                    } ?> placeholder="* Tỉnh / Thành Phố">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l-6 m-12 c-12">
                            <div class="input-group">
                                <span class="input-group-addon">Quận / Huyện</span>
                                <input class="form-control" required name="quan" type="text" <?php if (isset($quan)) {
                                                                                                    echo 'value="' . $quan . '"';
                                                                                                } ?> placeholder="* Quận / Huyện">
                            </div>
                        </div>
                        <div class="col l-6 m-12 c-12">
                            <div class="input-group">
                                <span class="input-group-addon">Phường / Xã</span>
                                <input class="form-control" required name="phuong" type="text" <?php if (isset($phuong)) {
                                                                                                    echo 'value="' . $phuong . '"';
                                                                                                } ?> placeholder="* Phường / Xã">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l-12 m-12 c-12">
                            <div>
                                <input class="pay_input" type="text" <?php if (isset($ghichu)) {
                                                                            echo 'value="' . $ghichu . '"';
                                                                        } ?> name="ghichu" placeholder="Ghi chú">
                                <input type="checkbox" id="auto" name="" value="" checked>
                                <label for="auto">Đặt địa chỉ mặc định</label>
                            </div>
                        </div>
                    </div>
                    <div class="center">
                        <button class="pay_btn save" name="themgiaohang">LƯU</button>
                    </div>

                    <div class="border_bottom">
                        <strong>Phương Thức Thanh Toán</strong>
                    </div>
                    <div>
                        <div class="box">
                            <input name="hinhthucthanhtoan" <?php if (isset($hinhthucthanhtoan) && $hinhthucthanhtoan == 'Thanh toán khi nhận hàng') {
                                                                echo 'checked';
                                                            } ?> type="radio" id="1" value="Thanh toán khi nhận hàng" required>
                            <img class="pay_img" src="images/icon_ship_cod.png" alt="">
                            <label for="1">Thanh Toán Khi Giao Hàng</label>
                        </div>
                        <div class="box">
                            <input name="hinhthucthanhtoan" <?php if (isset($hinhthucthanhtoan) && $hinhthucthanhtoan == 'Visa') {
                                                                echo 'checked';
                                                            } ?> type="radio" id="2" value="Visa">
                            <img class="pay_img" src="images/icon_visa.png" alt="">
                            <label for="2">Thẻ Tín Dụng/Ghi Nợ</label>
                        </div>
                        <div class="box">
                            <input name="hinhthucthanhtoan" <?php if (isset($hinhthucthanhtoan) && $hinhthucthanhtoan == 'Paypal') {
                                                                echo 'checked';
                                                            } ?> type="radio" id="3" value="Paypal">
                            <img class="pay_img" src="images/icon_paypal.png" alt="">
                            <label for="3">Thanh Toán Bằng PayPal</label>
                        </div>
                        <div class="box">
                            <input name="hinhthucthanhtoan" <?php if (isset($hinhthucthanhtoan) && $hinhthucthanhtoan == 'Momo') {
                                                                echo 'checked';
                                                            } ?> type="radio" id="4" value="Momo">
                            <img class="pay_img" src="images/icon_momo.png" alt="">
                            <label for="4">Thanh Toán Bằng MOMO</label>
                        </div>
                    </div>
                </form>
                <div>
                    <div class="table">
                        <strong style="margin-left: 18px;">Giỏ Hàng</strong>
                        <p style="margin-right: 18px;">Xem thêm</p>
                    </div>
                    <div class="border_box">
                        <div class="row box-2">
                            <?php
                            $total = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $cart_item) {
                                    $total += $cart_item['giasp'] * $cart_item['soluong'];
                            ?>
                                    <div class="col l-4 m-4 c-6">
                                        <img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" alt="" width="100%">
                                        <p><?php echo $cart_item['tensanpham'] ?></p>
                                        <p>Số lượng: <?php echo $cart_item['soluong'] ?></p>
                                        <strong><?php echo number_format($cart_item['giasp'], 0, ',', '.') . 'đ' ?></strong>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="border_box">
                        <div class="total">
                            <p>Tổng cộng: <strong><?php echo number_format($total, 0, ',', '.') . 'đ' ?></strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l-1">

            </div>
            <div class="col l-3 m-6 pay">
                <div>
                    <div class="pay_border detail">
                        <strong>Tóm Tắt Đơn Hàng</strong>
                    </div>
                    <div>
                        <div class="cart_continue price">
                            <p>Giá còn</p>
                            <strong><?php echo number_format($total, 0, ',', '.') . 'đ' ?></strong>
                        </div>
                        <p class="gif">Phần thưởng <strong class="point_number"><?php echo number_format($total / 10000, 0, ',', '.') ?></strong> điểm BUBU</p>
                    </div>
                    <div class="pay_border"></div>
                    <div>
                        <strong class="">Mã Phiếu Giảm Giá</strong>
                        <div class="flex-2">
                            <input class="pay_input-2" type="text">
                            <button class="pay_btn-3 off">Đã xong</button>
                        </div>
                    </div>
                    <div>
                        <strong class="">Điểm BUBU</strong>
                        <div class="flex-2">
                            <input class="pay_input-2" type="text">
                            <button class="pay_btn-3 off">Đã xong</button>
                        </div>
                    </div>
                    <div>
                        <strong class="">Thẻ Quà Tặng</strong>
                        <div class="flex-2">
                            <input class="pay_input-2" type="text">
                            <button class="pay_btn-3 ">Đã xong</button>
                        </div>
                    </div>
                    <div>
                        <strong class="">Tín Dụng Trên Ví</strong>
                        <div class="flex-2">
                            <input class="pay_input-2" type="text">
                            <button class="pay_btn-3 off">Đã xong</button>
                        </div>
                    </div>
                    <a href="index.php?quanly=thanhtoan" class="thankyou">
                        <button class="pay_btn btn_accpet">ĐẶT HÀNG</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
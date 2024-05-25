<?php
include('admincp/config/config.php');
require('mail/sendmail.php');
if (isset($_SESSION['dangky'])) {
    if (isset($_SESSION['cart'])) {
        $sql_giaohang = "SELECT * FROM tbl_giaohang WHERE id_customer='$_SESSION[id_customer]'";
        $query_giaohang = mysqli_query($mysqli, $sql_giaohang);
        $count = mysqli_num_rows($query_giaohang);
        if ($count == 0) {
            echo ("<script>alert('Nhập địa chỉ gửi hàng');</script>");
            echo ("<script>location.href = 'index.php?quanly=dathang';</script>");
        } else {
            $thanhTien = 0;
            $date = getdate();
            $ngaydat = $date['mday'] . '-' . $date['mon'] . '-' . $date['year'];
            $id_customer = $_SESSION['id_customer'];
            // Lay id giao hang 
            $sql_id_giaohang = "SELECT id_giaohang FROM tbl_giaohang WHERE id_customer ='$id_customer' ORDER BY id_giaohang DESC LIMIT 1";
            $query_giaohang = mysqli_query($mysqli, $sql_id_giaohang);
            $row_giaohang = mysqli_fetch_array($query_giaohang);
            $idgiaohang = $row_giaohang['id_giaohang'];
            // Tình tổng tiền của đơn hàng
            foreach ($_SESSION['cart'] as $key => $val) {
                $thanhTien += $val['giasp'] * $val['soluong'];
            }
            // insert gio hang
            $sql_giohang = "INSERT INTO tbl_giohang(id_giaohang,id_customer,tinhTrang,ngayDat,thanhTien) VALUES ('" . $idgiaohang . "','" . $id_customer . "','1','" . $ngaydat . "','" . $thanhTien . "')";
            $query_giohang = mysqli_query($mysqli, $sql_giohang);
            $id_giohang = mysqli_insert_id($mysqli);
            if ($query_giohang) {
                // Thêm 1 dòng tbl_giaohang
                $sql_fill_giaohang = "SELECT * FROM tbl_giaohang WHERE id_customer='$id_customer' ORDER BY id_giaohang DESC LIMIT 1";
                $query_fill_giaohang = mysqli_query($mysqli, $sql_fill_giaohang);
                $row_fill_giaohang = mysqli_fetch_array($query_fill_giaohang);
                $name = $row_fill_giaohang['tenNguoiNhan'];
                $sodienthoai1 = $row_fill_giaohang['soDienThoai1'];
                $sodienthoai2 = $row_fill_giaohang['soDienThoai2'];
                $diachi = $row_fill_giaohang['diaChi'];
                $ghichu = $row_fill_giaohang['ghiChu'];
                $hinhthucthanhtoan = $row_fill_giaohang['hinhThucThanhToan'];
                $sql_insert = "INSERT INTO tbl_giaohang(id_customer,tenNguoiNhan,soDienThoai1,soDienThoai2,diaChi,hinhThucThanhToan,ghiChu)
                         VALUES('" . $id_customer . "','" . $name . "','" . $sodienthoai1 . "','" . $sodienthoai2 . "','" . $diachi . "','" . $hinhthucthanhtoan . "','" . $ghichu . "')";
                $row = mysqli_query($mysqli, $sql_insert);
                // Lấy dữ liệu giao hàng mới nhất
                $sql_get_giaohang = "SELECT * FROM tbl_giaohang WHERE id_customer='$id_customer' AND id_giaohang<(SELECT max(id_giaohang) FROM tbl_giaohang WHERE id_customer='$id_customer') ORDER BY id_giaohang DESC LIMIT 1";
                $query_get_giaohang = mysqli_query($mysqli, $sql_get_giaohang);
                $row_get_giaohang = mysqli_fetch_array($query_get_giaohang);
                $id_giaohang = $row_get_giaohang['id_giaohang'];
                // Update column bảng giao hàng
                $sql_update_giaohang = "UPDATE tbl_giaohang SET id_giohang='" . $id_giohang . "' WHERE id_giaohang='$id_giaohang'";
                mysqli_query($mysqli, $sql_update_giaohang);

                // Thêm giỏ hàng chi tiết
                foreach ($_SESSION['cart'] as $key => $value) {
                    $sql_giohang_chitiet = "INSERT INTO tbl_giohang_chitiet(id_giohang,id_sanpham,soLuongMua) VALUES ('" . $id_giohang . "','" . $value['id'] . "','" . $value['soluong'] . "')";
                    $query_giohang_chitiet = mysqli_query($mysqli, $sql_giohang_chitiet);
                    // Update số lượng sản phẩm (trừ số lượng sản phẩm)
                    $sql_update_soluong = "UPDATE tbl_sanpham SET soLuong = soLuong - " . $value['soluong'] . " WHERE id_sanpham = '" . $value['id'] . "'";
                    mysqli_query($mysqli, $sql_update_soluong);
                }
                // Gửi mail đặt hàng
                $tieude = "[BUBU_SHOP] ĐƠN HÀNG 31461081_102653199 ĐÃ GIAO THÀNH CÔNG";
                $maildathang = $_SESSION['email'];
                $noidung = "<p>Xin chào " . $_SESSION['dangky'] . ",
                
                Đơn hàng 31461081_102653199 của Quý khách đã được đối tác vận chuyển xác nhận giao thành công.</p>";
                $noidung .= "<h3>Bao gồm</h3>";
                $total = 0;
                foreach ($_SESSION['cart'] as $key => $val) {
                    $noidung .= "<ul style='margin:10px;'>
                    <li>Tên sản phẩm: " . $val['tensanpham'] . "</li>
                    <li>Mã sản phẩm:" . $val['id'] . "</li>
                    <li>Đơn giá: " . number_format($val['giasp'], 0, ',', '.') . "đ</li>
                    <li>Số lượng: " . $val['soluong'] . "</li>
                </ul>";
                    $total += $val['giasp'] * $val['soluong'];
                }
                $noidung .= "<h3>Tổng tiền: " . number_format($total, 0, ',', '.') . "đ</h3>";
                $noidung .= "
                <br>
                <p>------------------------------------</p>
                <p>Trân trọng!</p>
                <br>
                <b>NGUYỄN KIM TƯỜNG</b>
                <br>
                <p>Khoa Công Nghệ Thông Tin | Trường ĐH Công Nghiệp Hà Nội</p>
                <p>M: 0988 513 666 | E: tuongkim2002@gmail.com</p>
                ";
                // Gửi mail
                $mail = new Mailer();
                $mail->dathangmail($tieude, $noidung, $maildathang);
                // Xóa giỏ hàng
                unset($_SESSION['cart']);

                // Thực hiện thanh toán online
                if ($hinhthucthanhtoan == 'VNBANK') {
                    // Tích hợp thanh toán vnpay
                    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                    date_default_timezone_set('Asia/Ho_Chi_Minh');

                    require_once("./vnpay_php/config.php");

                    $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
                    $vnp_Amount = $thanhTien; // Số tiền thanh toán
                    $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
                    $vnp_BankCode = ''; //Mã phương thức thanh toán
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount * 100,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => "Thanh toan GD: Đặt hàng.",
                        "vnp_OrderType" => "other",
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef,
                        "vnp_ExpireDate" => $expire
                    );

                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }

                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                        } else {
                            $hashdata .= urlencode($key) . "=" . urlencode($value);
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    }
                    echo ("<script>location.href = '$vnp_Url';</script>");
                    die();
                }
                // header("Location: index.php?quanly=camon");
                echo ("<script>location.href = 'index.php?quanly=camon';</script>");
            }
        }
    } else {
        // header("Location: index.php?quanly=giohang");
        echo ("<script>location.href = 'index.php?quanly=giohang';</script>");
    }
} else {
    // header("Location: index.php?quanly=dangky");
    echo ("<script>location.href = 'index.php?quanly=dangky';</script>");
}

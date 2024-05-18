<?php
session_start();
include('../../admincp/config/config.php');
// Tăng số lượng sản phẩm
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    $soluong_sanpham = "SELECT soLuong FROM tbl_sanpham WHERE id_sanpham=$id";
    $query_soluong = mysqli_query($mysqli, $soluong_sanpham);
    $row_soluong = mysqli_fetch_array($query_soluong);
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
            $_SESSION['cart'] = $product;
        } else {
            $tangsoluong = $cart_item['soluong'] + 1;
            if ($cart_item['soluong'] < $row_soluong['soLuong']) { //Điều kiện số lượng giỏ hàng thấp hơn số lượng có
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong, 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
            } else {
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
            }
            $_SESSION['cart'] = $product;
        }
    }
}
// Giảm số lượng sản phẩm
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
            $_SESSION['cart'] = $product;
        } else {
            $giamsoluong = $cart_item['soluong'] - 1;
            if ($cart_item['soluong'] > 1) {
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $giamsoluong, 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
            } else {
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
            }
        }
        $_SESSION['cart'] = $product;
    }
}
// Xóa tất cả giỏ hàng
if (isset($_GET['xoa'])) {
    $xoa = $_GET['xoa'];
    if ($xoa == 'tatca') {
        unset($_SESSION['cart']);
    } else {
        foreach ($_SESSION['cart'] as $cart_item) {
            if ($cart_item['id'] != $xoa) {
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masanpham']);
            }
        }
        $_SESSION['cart'] = $product;
    }
}
// Thêm giỏ hàng
if (isset($_POST['themgiohang'])) {
    // session_destroy();
    $id = $_GET['idsanpham'];
    $soluong = 1;
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    // if($row){
    $new_product = array(array('tensanpham' => $row['tenSanPham'], 'id' => $id, 'soluong' => $soluong, 'giasp' => $row['gia'], 'hinhanh' => $row['hinhAnh'], 'masp' => $row['maSanPham']));
    // Kiem tra seesion gio hang ton tai
    if (isset($_SESSION['cart'])) {
        $found = false;
        $index = -1;
        foreach ($_SESSION['cart'] as $cart_item) {
            // Neu du lieu trung
            $index += 1;
            if ($cart_item['id'] == $id) {
                $_SESSION['cart'][$index]['soluong'] = $_SESSION['cart'][$index]['soluong'] + 1;
                $found = true;
                break;
            } else {
                // Neu du lieu khong trung
                $found = false;
            }
        }
        if ($found == false) {
            $product[] = array('tensanpham' => $row['tenSanPham'], 'id' => $id, 'soluong' => $soluong, 'giasp' => $row['gia'], 'hinhanh' => $row['hinhAnh'], 'masp' => $row['maSanPham']);
            // Lien ket du lieu
            $_SESSION['cart'] = array_merge($_SESSION['cart'], $product);
        }
    } else {
        $_SESSION['cart'] = $new_product;
    }
}
header('Location: ../../index.php?quanly=giohang');

<?php
include('../../config/config.php');
$tenloaisp = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
// Banner 
$hinhanhbanner = $_FILES['hinhanhbanner']['name'];
$hinhanhbanner_tmp = $_FILES['hinhanhbanner']['tmp_name'];
if (isset($_POST['themdanhmuc'])) {
    $hinhanh = time() . '_' . $hinhanh;
    $hinhanhbanner = time() . '_' . $hinhanhbanner;
    $sql_them = "INSERT INTO tbl_danhmuc(tenDanhMuc, thuTu, anhDanhMuc, anhBanner) value('" . $tenloaisp . "','" . $thutu . "', '" . $hinhanh . "', '" . $hinhanhbanner . "')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
    move_uploaded_file($hinhanhbanner_tmp, 'uploads/' . $hinhanhbanner);
} else if (isset($_POST['suadanhmuc'])) {
    if ($hinhanh != "" && $hinhanhbanner_tmp == "") {
        $hinhanh = time() . '_' . $hinhanh;
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
        $sql = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc=$_GET[iddanhmuc]";
        $query = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($query);
        unlink('uploads/' . $row['anhDanhMuc']);
        $sql_sua = "UPDATE tbl_danhmuc SET tenDanhMuc='" . $tenloaisp . "', thuTu='" . $thutu . "', anhDanhMuc='" . $hinhanh . "' WHERE id_danhmuc=$_GET[iddanhmuc] ";
    } else if ($hinhanhbanner != "" && $hinhanh == "") {
        $hinhanhbanner = time() . '_' . $hinhanhbanner;
        move_uploaded_file($hinhanhbanner_tmp, 'uploads/' . $hinhanhbanner);
        $sql = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc=$_GET[iddanhmuc]";
        $query = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($query);
        unlink('uploads/' . $row['anhBanner']);
        $sql_sua = "UPDATE tbl_danhmuc SET tenDanhMuc='" . $tenloaisp . "', thuTu='" . $thutu . "', anhBanner='" . $hinhanhbanner . "' WHERE id_danhmuc=$_GET[iddanhmuc] ";
    } else if ($hinhanh != "" && $hinhanhbanner_tmp != "") {
        $hinhanh = time() . '_' . $hinhanh;
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
        $sql = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc=$_GET[iddanhmuc]";
        $query = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($query);
        unlink('uploads/' . $row['anhDanhMuc']);

        $hinhanhbanner = time() . '_' . $hinhanhbanner;
        move_uploaded_file($hinhanhbanner_tmp, 'uploads/' . $hinhanhbanner);
        $sql = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc=$_GET[iddanhmuc]";
        $query = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($query);
        unlink('uploads/' . $row['anhBanner']);
        $sql_sua = "UPDATE tbl_danhmuc SET tenDanhMuc='" . $tenloaisp . "', thuTu='" . $thutu . "', anhDanhMuc='" . $hinhanh . "', anhBanner='" . $hinhanhbanner . "' WHERE id_danhmuc=$_GET[iddanhmuc] ";
    } else {
        $sql_sua = "UPDATE tbl_danhmuc SET tenDanhMuc='" . $tenloaisp . "', thuTu='" . $thutu . "' WHERE id_danhmuc=$_GET[iddanhmuc] ";
    }
    mysqli_query($mysqli, $sql_sua);
} else {
    $id = $_GET['iddanhmuc'];
    $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc='" . $id . "'";
    mysqli_query($mysqli, $sql_xoa);
}
header('location: ../../index.php?action=quanlydanhmucsanpham&query=them');

<?php
include("../../config/config.php");
$tenbaiviet = $_POST['tenbaiviet'];
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$danhmuc = $_POST['danhmuc'];
$tinhtrang = $_POST['tinhtrang'];
if (isset($_POST['thembaiviet'])) {
    $hinhanh = time() . '_' . $hinhanh;
    move_uploaded_file($hinhanh_tmp, "uploads/" . $hinhanh);
    $sql_insert = "INSERT INTO tbl_baiviet(tenBaiViet, hinhAnh, tomTat, noiDung, id_danhmucbv, tinhTrang)
                    VALUES('" . $tenbaiviet . "','" . $hinhanh . "','" . $tomtat . "','" . $noidung . "','" . $danhmuc . "','" . $tinhtrang . "')
                    ";
    mysqli_query($mysqli, $sql_insert);
}
else if(isset($_POST['suabaiviet'])) {
    // Kiểm tra có thay đổi hình ảnh
    if($hinhanh!=''){
        $sql_hinhanh="SELECT * FROM tbl_baiviet WHERE id_baiviet=$_GET[idbaiviet] ";
        $query_hinhanh=mysqli_query($mysqli, $sql_hinhanh);
        $row=mysqli_fetch_array($query_hinhanh);
        unlink('uploads/'.$row['hinhAnh']);
        $hinhanh = time() . '_' . $hinhanh;
        move_uploaded_file($hinhanh_tmp, "uploads/" . $hinhanh);
        $sql_update="UPDATE tbl_baiviet SET tenBaiViet='".$tenbaiviet."',hinhAnh='".$hinhanh."',tomTat='".$tomtat."',noiDung='".$noidung."',id_danhmucbv='".$danhmuc."',tinhTrang='".$tinhtrang."' WHERE id_baiviet=$_GET[idbaiviet] ";
    }else{
        $sql_update="UPDATE tbl_baiviet SET tenBaiViet='".$tenbaiviet."',tomTat='".$tomtat."',noiDung='".$noidung."',id_danhmucbv='".$danhmuc."',tinhTrang='".$tinhtrang."' WHERE id_baiviet=$_GET[idbaiviet] ";
    }
    mysqli_query($mysqli,$sql_update);
    }
    else{
        $sql_hinhanh="SELECT * FROM tbl_baiviet WHERE id_baiviet=$_GET[idbaiviet] ";
        $query_hinhanh=mysqli_query($mysqli, $sql_hinhanh);
        $row=mysqli_fetch_array($query_hinhanh);
        unlink('uploads/'.$row['hinhAnh']);
        $sql_delete="DELETE FROM tbl_baiviet WHERE id_baiviet=$_GET[idbaiviet] ";
        mysqli_query($mysqli, $sql_delete);
    }
header("Location: ../../index.php?action=quanlybaiviet&query=them");
?>
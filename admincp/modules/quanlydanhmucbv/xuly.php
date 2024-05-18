<?php 
include('../../config/config.php');
$name_category=$_POST['tendanhmuc'];
$index=$_POST['thutu'];
if(isset($_POST['themdanhmuc'])){
    if($name_category!='' && $index!=''){
        $sql_insert="INSERT INTO tbl_danhmuc_baiviet(tenDanhMucBV,thuTu) VALUES('".$name_category."','".$index."')";
        mysqli_query($mysqli,$sql_insert);
    }
    else{
        echo ("<script>alert('Vui lòng nhập đầy đủ thông tin');</script>");
        echo("<script>location.href = '../../index.php?action=quanlydanhmucbaiviet&query=them';</script>");
    }
}
else if(isset($_POST['suadanhmuc'])){
    $sql_update="UPDATE tbl_danhmuc_baiviet SET tenDanhMucBV='".$name_category."', thuTu='".$index."' WHERE id_danhmucbv='$_GET[iddanhmuc]'";
    mysqli_query($mysqli,$sql_update);
}
else{
    $iddanhmuc=$_GET['iddanhmuc'];
    $sql_delete="DELETE FROM tbl_danhmuc_baiviet WHERE id_danhmucbv='".$iddanhmuc."'";
    mysqli_query($mysqli,$sql_delete);
}
        echo("<script>location.href = '../../index.php?action=quanlydanhmucbaiviet&query=them';</script>");
        // header("Location: ../../index.php?action=quanlydanhmucbaiviet&query=them");
?>

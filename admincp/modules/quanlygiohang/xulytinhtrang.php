<?php
include("../../config/config.php");
if(isset($_GET['idgiohang'])){
    $idgiohang=$_GET['idgiohang'];
    $tinhTrang=0;
    $sql_change_state="UPDATE tbl_giohang SET tinhTrang='".$tinhTrang."' WHERE id_giohang='".$idgiohang."'";
    $query_change_state=mysqli_query($mysqli,$sql_change_state);
    header("Location: ../../index.php?action=quanlygiohang&query=lietke");
}
?>
<!-- <?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>

<?php
// Đăng xuất tài khoản user
if(isset($_GET['dangxuat'])){
    $dangxuat=$_GET['dangxuat'];
    if($dangxuat==1){
        unset($_SESSION['dangky']);
        unset($_SESSION['id_customer']);
        unset($_SESSION['email']);
    }
}
?>
<div class="menu">
    <div class="navbar_1">
        <ul class="nav_ul">
            <li class="nav_li">
                <a class="nav_a" href="index.php">Trang chủ</a>
            </li>
            <li class="nav_li">
                <a class="nav_a" href="">Thương hiệu</a>
                <ul class="subnav_ul">
                    <?php
                    while ($row = mysqli_fetch_array($query_danhmuc)) {
                    ?>
                        <li class="subnav_li">
                            <a class="subnav_a" href="?quanly=danhmuc&iddanhmuc=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tenDanhMuc'] ?></a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </li>
            <li class="nav_li">
                <a class="nav_a" href="index.php?quanly=giohang">Giỏ hàng</a>
            </li>
            <li class="nav_li">
                <a class="nav_a" href="index.php?quanly=tintuc">Tin tức</a>
            </li>
            <li class="nav_li">
                <a class="nav_a" href="index.php?quanly=lienhe">Liên hệ</a>
            </li>
            <?php
            if (isset($_SESSION['dangky'])) {
            ?>
                <li class="nav_li">
                    <a class="nav_a" href="index.php?dangxuat=1">Đăng xuất</a>
                </li>
                <li class="nav_li">
                    <a class="nav_a" href=""><?php echo $_SESSION['dangky'] ?></a>
                </li>
            <?php
            } else {
            ?>
                <li class="nav_li">
                    <a class="nav_a" href="index.php?quanly=dangky">Đăng ký/Đăng nhập</a>
                </li>
            <?php
            }
            ?>

        </ul>
    </div>
</div> -->
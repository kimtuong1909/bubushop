<?php
if (isset($_GET['pages'])) {
    $pages = $_GET['pages'];
} else {
    $pages = '1';
}
if ($pages == '' || $pages == 1) {
    $begin = 0;
} else {
    $begin = ($pages * 12) - 12;
}
if (isset($_GET['iddanhmuc'])) {
    $iddanhmuc = $_GET['iddanhmuc'];
}
$sql_sanpham = "SELECT * FROM tbl_sanpham WHERE id_danhmuc=$iddanhmuc LIMIT $begin,12";
$query_sanpham = mysqli_query($mysqli, $sql_sanpham);
// Tìm số lượng sản phẩm
$sql_number_product = "SELECT * FROM tbl_sanpham WHERE id_danhmuc=$iddanhmuc";
$query_number_product = mysqli_query($mysqli, $sql_number_product);
$number_products = mysqli_num_rows($query_number_product);
$number_pages = ceil($number_products / 12);

$sql_danhmuc = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc=$iddanhmuc";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
$danhmuc = mysqli_fetch_array($query_danhmuc);
?>
<div class=" banner_img">
    <img class="banner_img-1" src="admincp/modules/quanlydanhmucsp/uploads/<?php echo $danhmuc['anhBanner'] ?>" alt="">
</div>
<div class="gird product_auto">
    <div class="row">
        <div class="col l-4 m-0 c-0">
            <div>
                <h3 class="product_title">THƯƠNG HIỆU</h3>
                <form action="index.php?quanly=timkiem" method="POST">
                    <ul class="product_list">
                        <?php
                        $sql_danhmuc = "SELECT * FROM tbl_danhmuc";
                        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                        while ($row = mysqli_fetch_array($query_danhmuc)) {
                        ?>
                            <li class="product_item">
                                <input type="checkbox" name="<?php echo $row['tenDanhMuc'] ?>" id="<?php echo $row['tenDanhMuc'] ?>">
                                <label class="checkbox_text" for="<?php echo $row['tenDanhMuc'] ?>"><?php echo $row['tenDanhMuc'] ?></label>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <h3 class="product_title">TÌM THEO</h3>
                    <h6 class="product_title">Giá sản phẩm</h6>
                    <ul class="product_list">
                        <li class="product_item">
                            <input type="checkbox" name="price_100" id="1">
                            <label class="checkbox_text" for="1">Giá dưới 100.000đ</label>
                        </li>
                        <li class="product_item">
                            <input type="checkbox" name="price_200" id="2">
                            <label class="checkbox_text" for="2">100.000đ - 200.000đ</label>
                        </li>
                        <li class="product_item">
                            <input type="checkbox" name="price_300" id="3">
                            <label class="checkbox_text" for="3">200.000đ - 400.000đ</label>
                        </li>
                        <li class="product_item">
                            <input type="checkbox" name="price_400" id="4">
                            <label class="checkbox_text" for="4">400.000đ - 600.000đ</label>
                        </li>
                        <li class="product_item">
                            <input type="checkbox" name="price_500" id="5">
                            <label class="checkbox_text" for="5">600.000đ - 800.000đ</label>
                        </li>
                        <li class="product_item">
                            <input type="checkbox" name="price_600" id="6">
                            <label class="checkbox_text" for="6">Giá trên 1.000.000đ</label>
                        </li>
                    </ul>
                    <h3 class="product_title">MÀU SẮC</h3>
                    <div>
                        <div class="color">
                            <div class="item color_1" onclick="check_1()">
                                <i class="fa-solid check_1"></i>
                            </div>
                            <div class="item color_2" onclick="check_2()">
                                <i class="fa-solid check_2"></i>
                            </div>
                            <div class="item color_3" onclick="check_3()">
                                <i class="fa-solid check_3"></i>
                            </div>
                            <div class="item color_4" onclick="check_4()">
                                <i class="fa-solid check_4"></i>
                            </div>
                        </div>
                        <div class="color">
                            <div class="item color_5" onclick="check_5()">
                                <i class="fa-solid check_5"></i>
                            </div>
                            <div class="item color_6" onclick="check_6()">
                                <i class="fa-solid check_6"></i>
                            </div>
                            <div class="item color_7" onclick="check_7()">
                                <i class="fa-solid check_7"></i>
                            </div>
                            <div class="item color_8" onclick="check_8()">
                                <i class="fa-solid check_8"></i>
                            </div>
                        </div>
                        <div class="color">
                            <div class="item color_9" onclick="check_9()">
                                <i class="fa-solid check_9"></i>
                            </div>
                            <div class="item color_10" onclick="check_10()">
                                <i class="fa-solid check_10"></i>
                            </div>
                        </div>
                    </div>
                    <h3 class="product_title">KÍCH THƯỚC</h3>
                    <ul class="product_list">
                        <li class="product_item">
                            <input type="checkbox" name="product" id="s">
                            <label class="checkbox_text" for="s">S</label>
                        </li>
                        <li class="product_item">
                            <input type="checkbox" name="product" id="m">
                            <label class="checkbox_text" for="m">M</label>
                        </li>
                        <li class="product_item">
                            <input type="checkbox" name="product" id="l">
                            <label class="checkbox_text" for="l">L</label>
                        </li>
                        <li class="product_item">
                            <input type="checkbox" name="product" id="xl">
                            <label class="checkbox_text" for="xl">XL</label>
                        </li>
                        <li class="product_item">
                            <input type="checkbox" name="product" id="xxl">
                            <label class="checkbox_text" for="xxl">XXL</label>
                        </li>
                    </ul>
                    <input class="search_filter" type="submit" value="Tìm kiếm" name="filter">
                </form>
            </div>
        </div>
        <div class="col l-8">
            <div class="grid product">
                <div class="row">
                    <?php
                    while ($row = mysqli_fetch_array($query_sanpham)) {
                    ?>
                        <div class="col l-3 m-4 c-6 margin product_new">
                            <div class="product_div">
                                <a href="?quanly=sanpham&idsanpham=<?php echo $row['id_sanpham'] ?>">
                                    <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhAnh'] ?>" alt="" class="product_img">
                                </a>
                            </div>
                            <div class="product_text-4">
                                <h3 class="product_name"><?php echo $row['tenSanPham'] ?></h3>
                                <div class="change-1">
                                    <div class="after">
                                        <i class="fa-regular fa-heart"></i>
                                    </div>
                                    <div class="before">
                                        <i class="fa-solid fa-heart heart"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="product_text-5">
                                <i class="fa-solid fa-star active star"></i>
                                <i class="fa-solid fa-star active star"></i>
                                <i class="fa-solid fa-star active star"></i>
                                <i class="fa-solid fa-star star"></i>
                                <i class="fa-solid fa-star star"></i>
                                <div class="product_border"></div>
                                <p class="product_p"> Đã bán <?php
                                                                // Tính số lượng đã bán
                                                                $sql_soluong = "SELECT id_sanpham, SUM(soLuongMua) AS soLuongBan FROM tbl_giohang_chitiet WHERE id_sanpham=$row[id_sanpham] GROUP BY id_sanpham";
                                                                $query_soluong = mysqli_query($mysqli, $sql_soluong);
                                                                $soluong = mysqli_fetch_array($query_soluong);
                                                                if (isset($soluong['soLuongBan'])) {
                                                                    echo $soluong['soLuongBan'];
                                                                } else {
                                                                    echo "0";
                                                                } ?> </p>
                            </div>
                            <p class="product_price"><?php echo number_format($row['gia'], 0, ',', '.') . 'đ' ?></p>
                            <div class="product_new-1">
                                <p class="product_new-text">Mới</p>
                            </div>
                            <div class="product_new-2">
                                <a href="?quanly=sanpham&idsanpham=<?php echo $row['id_sanpham'] ?>" class="product_link">
                                    <p class="product_new-text-1">Xem Ngay</p>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="page_next">
                <button class="page_btn btn_next">
                    <a class="page_link black" href="<?php if ($pages > 1) {
                                                            echo 'index.php?quanly=danhmuc&iddanhmuc=' . $iddanhmuc . '&pages=' . ($pages - 1);
                                                        } ?>"><i class="fa-solid fa-angles-left"></i></a>
                </button>
                <?php
                for ($i = 0; $i < $number_pages; $i++) {
                ?>
                    <button class="page_btn btn_current" <?php if ($pages == ($i + 1)) {
                                                                echo 'style="background: #117369;"';
                                                            } else {
                                                                echo '';
                                                            } ?>>
                        <a class="page_link" href="index.php?quanly=danhmuc&iddanhmuc=<?php echo $iddanhmuc ?>&pages=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a>
                    </button>
                <?php
                }
                ?>
                <button class="page_btn btn_next">
                    <a class="page_link black" href="<?php if ($pages < $number_pages) {
                                                            echo 'index.php?quanly=danhmuc&iddanhmuc=' . $iddanhmuc . '&pages=' . ($pages + 1);
                                                        } ?>">
                        <i class="fa-solid fa-angles-right"></i>
                    </a>
                </button>
            </div>
        </div>
    </div>
</div>
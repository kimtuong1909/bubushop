<?php
// session_start();
$sql_pr = "SELECT * FROM tbl_sanpham LIMIT 6";
$query_pr = mysqli_query($mysqli, $sql_pr);
// Lấy số lượng mặt hàng
$index = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $cart_item) {
        $index++;
    }
}
?>
<div class="app col l-12">
    <div class="background">
        <div class="cart">
            <div class="grid">
                <div class="row">
                    <div class="col l-9">
                        <div>
                            <div class="cart_title">
                                <p class="cart_title_p current"><a class="process" href="">Giỏ Hàng</a></p>
                                <p class="cart_title_p"><a class="process" href="<?php if (isset($_SESSION['dangky'])) {
                                                                                        if (isset($_SESSION['cart'])) {
                                                                                            echo 'index.php?quanly=dathang';
                                                                                        }
                                                                                    } ?>">Đặt Hàng </a></p>
                                <p class="cart_title_p">Hoàn Thành Đơn Hàng</p>
                            </div>
                            <div class="cart_ship">
                                <div class="row cart_ship-1">
                                    <div class="col l-1">
                                        <div>
                                            <img src="images/mienphigiaohangden.png" alt="" height="60px" width="60px">
                                        </div>
                                    </div>
                                    <div class="col l-8">
                                        <div>
                                            <p>Phí vận chuyển</p>
                                            <p>Đủ điều kiện nhận <strong>VẬN CHUYỂN TIÊU CHUẨN MIỄN PHÍ!</strong></p>
                                        </div>
                                    </div>
                                    <div class="col l-3">
                                        <div class="flex_end">
                                            <p>Tăng thêm</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart_product">
                                <strong>Tóm Tắt Mặt Hàng (<?php echo $index ?>)</strong>
                                <div class="row top">
                                    <div class="col l-2">
                                        <input type="checkbox" name="" id="">
                                        <strong>Tất cả</strong>
                                    </div>
                                    <div class="col l-2">
                                        <strong>Sản phẩm</strong>
                                    </div>
                                    <div class="col l-2">
                                        <strong>Giá</strong>
                                    </div>
                                    <div class="col l-2">
                                        <strong>Số lượng</strong>
                                    </div>
                                    <div class="col l-2">
                                        <strong>Tổng cộng</strong>
                                    </div>
                                    <div class="col l-2">
                                        <strong><a class="xoatatca" href="pages/main/themgiohang.php?xoa=tatca">Xóa</a></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="cart_ship">
                                <div class="row cart_ship-2">
                                    <div class="col l-9">
                                        <div>
                                            <strong>Trả thêm mua hàng đẹp</strong>
                                            <p class="text">Chỉ tiêu <strong class="red">800.000đ</strong> để đủ điều kiện giảm giá, hiện tại bạn cần thêm <strong class="red">460.000đ </strong>để đủ điều kiện.</p>
                                        </div>
                                    </div>
                                    <div class="col l-3">
                                        <div>
                                            <button class="cart_btn">Mua thêm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart_info">
                                <?php
                                $total = 0;
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $cart_item) {
                                        $total += $cart_item['soluong'] * $cart_item['giasp'];
                                ?>
                                        <div class="row cart_margin">
                                            <div class="col l-2-4 m-2-4">
                                                <div class="cart_header-2">
                                                    <input class="input_black" type="checkbox" name="" id="">
                                                    <img class="cart_img-2" src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="col l-2-8 m-2-8">
                                                <p><?php echo $cart_item['tensanpham'] ?></p>
                                                <div class="row cart_margin">
                                                    <div class="col l-3">
                                                        <div>
                                                            <p>S</p>
                                                        </div>
                                                    </div>
                                                    <div class="col l-3">
                                                        <div>
                                                            <strong><?php echo number_format($cart_item['giasp'], 0, ',', '.') . 'đ' ?></strong>
                                                        </div>
                                                    </div>
                                                    <div class="col l-3">
                                                        <div>
                                                            <button class="detail_btn detail_btn-1">
                                                                <a class="cart_number" href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>">
                                                                    <i class="fa-solid fa-minus"></i>
                                                                </a>
                                                                <?php echo $cart_item['soluong'] ?>
                                                                <a class="cart_number" href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </a>

                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col l-3">
                                                        <div>
                                                            <strong><?php echo number_format($cart_item['giasp'] * $cart_item['soluong'], 0, ',', '.') . 'đ' ?></strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tym">
                                                    <img class="tym-1" src="images/icon_yeu_thich.png" alt="" width="20px" height="20px">
                                                    <p class="tym-1">Lưu lại sau</p>
                                                    <a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xóa</a>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col l-3 pay">
                        <div>
                            <div class="detail">
                                <strong>Tóm Tắt Đơn Hàng</strong>
                                <div class="cart_continue price">
                                    <p>Giá còn</p>
                                    <strong><?php echo number_format($total, 0, ',', '.') . 'đ' ?></strong>
                                </div>
                                <p class="gif">Phần thưởng <strong class="point_number"><?php echo number_format($total / 10000, 0, ',', '.') ?></strong> điểm BUBU</p>
                                <a href="<?php if (isset($_SESSION['dangky'])) {
                                                if (isset($_SESSION['cart'])) {
                                                    echo 'index.php?quanly=dathang';
                                                }
                                            } else {
                                                echo 'index.php?quanly=dangky';
                                            } ?>">
                                    <button class="btn_pay">THANH TOÁN</button>
                                </a>
                                <p class="pay_p">Dùng Mã giảm giá, Điểm BUBU trong bước tiếp theo</p>
                            </div>
                            <div>
                                <h5 class="footer_text-4">CHÚNG TÔI CHẤP NHẬN</h5>
                                <div>
                                    <img class="icon_img-1" src="images/icon_ship_cod.png" alt="">
                                    <img class="icon_img-1" src="images/icon_visa.png" alt="">
                                    <img class="icon_img-1" src="images/icon_paypal.png" alt="">
                                    <img class="icon_img-1" src="images/icon_momo.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pr">
        <div class="gird">
            <div class="also">
                <strong>Bạn Có Lẽ Cũng Thích</strong>
            </div>
            <div class="row">
                <?php
                while ($row = mysqli_fetch_array($query_pr)) {
                ?>
                    <div class="col l-2 m-4 c-6 margin product_new">
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
    </div>
</div>
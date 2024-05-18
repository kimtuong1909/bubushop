<?php
$sql_sanpham = "SELECT * FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_danhmuc.id_danhmuc=tbl_sanpham.id_danhmuc WHERE id_sanpham=$_GET[idsanpham] LIMIT 1";
$query_sanpham = mysqli_query($mysqli, $sql_sanpham);
$row = mysqli_fetch_array($query_sanpham);
?>
<div class="detail">
    <div class="gird">
        <p style="margin-left: 12px;"><a href="index.php" class="link_product">Trang chủ</a> / <a class="link_product" href="?quanly=danhmuc&iddanhmuc=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tenDanhMuc'] ?></a> /
            <?php echo $row['tenSanPham'] ?>
        </p>
        <div class="row detail_line">
            <div class="col l-6 m-6">
                <div>
                    <img class="product_img" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhAnh'] ?>" alt="">
                    <div>
                        <div class="row">
                            <div class="col l-3 m-3 c-3">
                                <div>
                                    <img class="detail_img" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhAnh'] ?>" alt="">
                                </div>
                            </div>
                            <div class="col l-3 m-3 c-3">
                                <div>
                                    <img class="detail_img" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhAnh'] ?>" alt="">
                                </div>
                            </div>
                            <div class="col l-3 m-3 c-3">
                                <div>
                                    <img class="detail_img" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhAnh'] ?>" alt="">
                                </div>
                            </div>
                            <div class="col l-3 m-3 c-3">
                                <div>
                                    <img class="detail_img" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhAnh'] ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="detail_description">MÔ TẢ SẢN PHẨM</p>
                    <ul class="detail_list">
                        <li class="detail_description-1"><?php echo $row['tomTat']; ?></li>
                    </ul>
                </div>
            </div>
            <div class="col l-6 m-6">
                <div>
                    <form action="pages/main/themgiohang.php?idsanpham=<?php echo $row['id_sanpham'] ?>" method="POST">
                        <h2 class="detail_product"><?php echo $row['tenSanPham'] ?></h2>
                        <div class="detail_code">
                            <p class="detail_code_p">Mã sản phẩm: No.<?php echo $row['maSanPham'] ?></p>
                            <i class="fa-solid fa-star active"></i>
                            <i class="fa-solid fa-star active"></i>
                            <i class="fa-solid fa-star active"></i>
                            <i class="fa-solid fa-star active"></i>
                            <i class="fa-solid fa-star active"></i>
                            <p class="detail_code_p-1">(164 Nhận xét)</p>
                        </div>
                        <p class="detail_code_p-2"><?php echo number_format($row['gia'], 0, ',', '.') . 'đ' ?></p>
                        <div class="detail_border"></div>
                        <p class="detail_code_p-3">Sizes:</p>
                        <div>
                            <button class="detail_btn">S</button>
                            <button class="detail_btn">M</button>
                            <button class="detail_btn">L</button>
                            <button class="detail_btn">XL</button>
                            <button class="detail_btn">XXL</button>
                        </div>
                        <p class="detail_code_p-3">Số lượng</p>
                        <button class="detail_btn detail_btn-1">
                            <svg class="down" xmlns="http://www.w3.org/2000/svg" width="16.487" height="1" viewBox="0 0 16.487 1">
                                <line id="Line_4" data-name="Line 4" x1="16.487" transform="translate(0 0.5)" fill="none" stroke="#707070" stroke-width="1" />
                            </svg>
                            1
                            <svg class="up" xmlns="http://www.w3.org/2000/svg" width="16.487" height="16.487" viewBox="0 0 16.487 16.487">
                                <g id="Group_220" data-name="Group 220" transform="translate(-1205.5 -666.257)">
                                    <line id="Line_1" data-name="Line 1" y2="16.487" transform="translate(1213.743 666.257)" fill="none" stroke="#707070" stroke-width="1" />
                                    <line id="Line_2" data-name="Line 2" x1="16.487" transform="translate(1205.5 674.5)" fill="none" stroke="#707070" stroke-width="1" />
                                </g>
                            </svg>
                        </button>
                        <div class="">
                            <div class="detail_hover">
                                <div class="detail_hover-1">
                                    <button type="submit" class="detail_btn-2" name="themgiohang">THÊM VÀO GIỎ HÀNG</button>
                                    <div class="btn_border-1"></div>
                                </div>
                                <div class="love">
                                    <button class="detail_btn-3">
                                        <img src="images/icon_yeu_thich.png" alt="" width="23px" height="23px">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <a href="">
                        <button class="detail_btn-4">THANH TOÁN</button>
                    </a>
                    <div class="detail_ship">
                        <div class="row">
                            <div class="col l-2 m-2">
                                <img src="images/mienphigiaohangden.png" alt="" width="100%" height="100%">
                            </div>
                            <div class="col l-10 m-10">
                                <strong>Miễn phí vận chuyển</strong>
                                <p>Giao hàng miễn phí tiêu chuẩn cho các đơn hàng trên 260.000đ</p>
                                <p class="detail_margin">Giao hàng dự kiến 1-3 ngày</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col l-2 m-2">
                                <img src="images/mienphigiaohangden.png" alt="" width="100%" height="100%">
                            </div>
                            <div class="col l-10 m-10">
                                <strong>Quy tắc COD</strong>
                                <p>Tìm hiểu thêm</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col l-2 m-2">
                                <img src="images/baove.png" alt="" width="100%" height="100%">
                            </div>
                            <div class="col l-10 m-10">
                                <strong class="detail_margin-1">Chính sách hoàn trả</strong>
                                <p>Tìm hiểu thêm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="detail_description">ĐÁNH GIÁ SẢN PHẨM</p>
        <div class="row detail_cmt">
            <div class="col l-2">
                <div class="detail_star">
                    <div>
                        <p class="detail_star_text">4,5</p>
                    </div>
                    <div>
                        <i class="fa-solid fa-star active"></i>
                        <i class="fa-solid fa-star active"></i>
                        <i class="fa-solid fa-star active"></i>
                        <i class="fa-solid fa-star active"></i>
                        <i class="fa-solid fa-star active"></i>
                        <p>164 nhận xét</p>
                    </div>
                </div>
                <div class="row margintop aligncenter">
                    <div class="col l-4">
                        <div class="aligncenter_star">
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                        </div>
                    </div>
                    <div class="col l-8 detail_item">
                        <div class="detail_item-1">
                            <div class="detail_item-2 percent_1"></div>
                        </div>
                        <p class="description_p">168</p>
                    </div>
                </div>
                <div class="row aligncenter">
                    <div class="col l-4">
                        <div class="aligncenter_star">
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                        </div>
                    </div>
                    <div class="col l-8 detail_item">
                        <div class="detail_item-1">
                            <div class="detail_item-2 percent_2"></div>
                        </div>
                        <p class="description_p">60</p>
                    </div>
                </div>
                <div class="row aligncenter">
                    <div class="col l-4">
                        <div class="aligncenter_star">
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                        </div>
                    </div>
                    <div class="col l-8 detail_item">
                        <div class="detail_item-1">
                            <div class="detail_item-2 percent_3"></div>
                        </div>
                        <p class="description_p">30</p>
                    </div>
                </div>
                <div class="row aligncenter">
                    <div class="col l-4">
                        <div class="aligncenter_star">
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                        </div>
                    </div>
                    <div class="col l-8 detail_item">
                        <div class="detail_item-1">
                            <div class="detail_item-2 percent_4"></div>
                        </div>
                        <p class="description_p">4</p>
                    </div>
                </div>
                <div class="row aligncenter">
                    <div class="col l-4">
                        <div class="aligncenter_star">
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                            <i class="fa-solid fa-star detail_star-1 active"></i>
                        </div>
                    </div>
                    <div class="col l-8 detail_item">
                        <div class="detail_item-1">
                            <div class="detail_item-2 percent_5"></div>
                        </div>
                        <p class="description_p">2</p>
                    </div>
                </div>

            </div>
            <div class="col l-10">
                <div>
                    <div class="detail_star">
                        <button class="btn_star">Tất Cả</button>
                        <button class="btn_star">5 Sao (156)</button>
                        <button class="btn_star">4 Sao (8)</button>
                        <button class="btn_star">3 Sao (0)</button>
                        <button class="btn_star">2 Sao (0)</button>
                        <button class="btn_star">1 Sao (0)</button>
                        <button class="btn_star">Có Bình Luận (83)</button>
                        <button class="btn_star">Có Hình Ảnh / Video (68)</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row detail_line">
            <div class="col l-1">
                <div>
                    <img src="images/danhgia.png" alt="" height="100px" width="100px">
                </div>
            </div>
            <div class="col l-11">
                <div>
                    <p style="margin-top:32px">batanvlog</p>
                    <i class="fa-solid fa-star active"></i>
                    <i class="fa-solid fa-star active"></i>
                    <i class="fa-solid fa-star active"></i>
                    <i class="fa-solid fa-star active"></i>
                    <i class="fa-solid fa-star active"></i>
                    <p class="opacity">2022-25-7 12:08 | Phân loại hàng: Áo sơ mi BuBu</p>
                    <p>Áo đẹp, chất lượng tốt, mặc co giãn tốt, như hình ảnh, shop hỗ trợ nhiệt tình xứng đáng 10 sao</p>
                    <div>
                        <img src="" alt="">
                    </div>
                    <div class="aligncenter">
                        <img src="images/like.png" alt="" width="100px" height="100px">
                        <p style="margin-top:16px">6</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row detail_line">
            <div class="col l-1">
                <div>
                    <img src="images/danhgia.png" alt="" height="100px" width="100px">
                </div>
            </div>
            <div class="col l-11">
                <div>
                    <p style="margin-top:32px">34HaiDuong</p>
                    <i class="fa-solid fa-star active"></i>
                    <i class="fa-solid fa-star active"></i>
                    <i class="fa-solid fa-star active"></i>
                    <i class="fa-solid fa-star active"></i>
                    <i class="fa-solid fa-star active"></i>
                    <p class="opacity">2022-25-7 12:08 | Phân loại hàng:  Áo sơ mi BuBu</p>
                    <p>Quần đẹp, ship nhanh, vải tốt, anh chủ shop Thomas Dũng dễ thương</p>
                    <div>
                        <button class="btn_cmt">Chất lượng sản phẩm tốt</button>
                        <button class="btn_cmt">Đóng gái sản phẩm đẹp và chắc chắn</button>
                        <button class="btn_cmt">Shop phục vụ rất tốt</button>
                    </div>
                    <button class="btn_cmt">Giao hàng nhanh chóng</button>
                    <div>
                        <img src="" alt="">
                    </div>
                    <div class="aligncenter">
                        <img src="images/like.png" alt="" width="100px" height="100px">
                        <p style="margin-top:16px">Hữu ích ?</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row detail_line">
            <div class="col l-1">
                <div>
                    <img src="images/danhgia.png" alt="" height="100px" width="100px">
                </div>
            </div>
            <div class="col l-11">
                <div>
                    <p style="margin-top:32px">99BacNinh</p>
                    <i class="fa-solid fa-star active"></i>
                    <i class="fa-solid fa-star active"></i>
                    <i class="fa-solid fa-star active"></i>
                    <i class="fa-solid fa-star active"></i>
                    <i class="fa-solid fa-star active"></i>
                    <p class="opacity">2022-25-7 12:08 | Phân loại hàng: Áo sơ mi BuBu</p>
                    <p>Shop hỗ trợ nhiệt tình, quần giống ảnh.</p>
                    <div>
                        <button class="btn_cmt">Chất lượng sản phẩm tốt</button>
                        <button class="btn_cmt">Đóng gái sản phẩm đẹp và chắc chắn</button>
                        <button class="btn_cmt">Shop phục vụ rất tốt</button>
                    </div>
                    <button class="btn_cmt">Giao hàng nhanh chóng</button>
                    <div>
                        <img src="" alt="">
                    </div>
                    <div class="aligncenter">
                        <img src="images/like.png" alt="" width="100px" height="100px">
                        <p style="margin-top:16px">2</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row detail_line">
            <div class="col l-1">
                <div>
                    <img src="images/danhgia.png" alt="" height="100px" width="100px">
                </div>
            </div>
            <div class="col l-11">
                <div>
                    <p style="margin-top:32px">19PhuTho</p>
                    <i class="fa-solid fa-star active"></i>
                    <i class="fa-solid fa-star active"></i>
                    <i class="fa-solid fa-star active"></i>
                    <i class="fa-solid fa-star active"></i>
                    <i class="fa-solid fa-star active"></i>
                    <p class="opacity">2022-25-7 12:08 | Phân loại hàng: Samsung</p>
                    <p>Nhân viên phục vụ chu đáo nhiệt tình Sản phẩm tốt. Chính hãng!</p>
                    <div>
                        <img src="" alt="">
                    </div>
                    <div class="aligncenter">
                        <img src="images/like.png" alt="" width="100px" height="100px">
                        <p style="margin-top:16px">6</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
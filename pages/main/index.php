<?php
$sql_category = "SELECT * FROM tbl_danhmuc ";
$query_category = mysqli_query($mysqli, $sql_category);
$number_category = mysqli_num_rows($query_category);

$sql_product = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham desc LIMIT 6";
$query_product = mysqli_query($mysqli, $sql_product);

$sql_product1 = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham desc LIMIT 6,6";
$query_product1 = mysqli_query($mysqli, $sql_product1);
?>
<div class="content">
  <div class="container grid">
    <div class="container_sale row c-0">
      <div class="container_sale-text col l-4">
        <div class="row">
          <div class="col l-6">
            <img src="images/icon_giam_gia.png" alt="" height="45px" width="45px">
            <p class="sale-text top_1">GIẢM THÊM 15%</p>
          </div>
          <div class="col l-6">
            <p class="sale-text-2 decoration">NHẬP MÃ : BUBU2022</p>
            <p class="sale-text-2">ĐH ĐẦU TIÊN TỪ 700K</p>
          </div>
        </div>
      </div>
      <div class="container_sale-text col l-4 father">
        <img src="images/icon_thanh_toan.png" alt="" height="55px" width="55px">
        <p class="sale-text">THANH TOÁN KHI NHẬN HÀNG</p>
      </div>
      <div class="container_sale-text col l-4">
        <img src="images/icon_mien_phi_van_chuyen.png" alt="" height="55px" width="55px">
        <p class="sale-text">THÔNG TIN VẬN CHUYỂN</p>
      </div>
    </div>

    <div class="container_text row c-0">
      <p class="container_text-1">ĐẶT HÀNG NGAY HÔM NAY, <pr class="container_text-2">NHẬN NGAY KHUYẾN MÃI LỚN</pr>
      </p>
    </div>

    <div class="row">
      <div class="w3-content w3-display-container">
        <a href="index.php?quanly=dangky"><img class="mySlides container_slide-img" src="images/banner.png" style="width:100%"></a>
        <img class="mySlides container_slide-img" src="images/banner1.png" style="width:100%">
        <img class="mySlides container_slide-img" src="images/banner2.png" style="width:100%">
        <button class="slide_button slide_button-left" onclick="plusDivs(-1)">&#10094;</button>
        <button class="slide_button slide_button-right" onclick="plusDivs(1)">&#10095;</button>
      </div>
    </div>
    <div class="container_offer row c-0">
      <div class="col-3">
        <p class="text-center">GIẢM
        <pre class="offer_percent">10%</pre>
        </p>
        <p class="line-height">CHO ĐƠN HÀNG TỪ 800K</p>
      </div>
      <div class="offer_line"></div>
      <div class="col-3">
        <p class="text-center">GIẢM
        <pre class="offer_percent">15%</pre>
        </p>
        <p class="line-height">CHO ĐƠN HÀNG TỪ 1TR2</p>
      </div>
      <div class="offer_line"></div>
      <div class="col-3">
        <p class="text-center">GIẢM
        <pre class="offer_percent">10%</pre>
        </p>
        <p class="line-height">CHO ĐƠN HÀNG TỪ 2TR</p>
      </div>
      <div class="offer_line"></div>
      <div class="offer_text col-3">
        <p>MÃ GIẢM GIÁ: <strong>BUBU2022</strong></p>
      </div>
    </div>
    <div class="container_button row">
      <p class="container_button_text col l-o-4 l-4 m-o-3 m-6 c-o-3 c-6">MUA THEO THỂ LOẠI</p>
    </div>
    <div class="row container_category">
      <?php
      while ($row_category = mysqli_fetch_array($query_category)) {
      ?>
        <div class="col l-2-4 m-4 c-o-3 c-6">
          <div class="container_category_item">
            <a href="index.php?quanly=danhmuc&iddanhmuc=<?php echo $row_category['id_danhmuc'] ?>">
              <img loading="lazy" class="category_img" src="admincp\modules\quanlydanhmucsp\uploads\<?php echo $row_category['anhDanhMuc'] ?>" alt="">
            </a>
            <p><?php echo $row_category['tenDanhMuc'] ?></p>
          </div>
        </div>
      <?php
      }
      ?>
    </div>

    <div class="container_button row">
      <p class="container_button_text l-o-4 l-4 m-o-3 m-6 c-o-3 c-6">ƯU ĐÃI TRONG NGÀY</p>
    </div>
    <div class="flash_sale-div">
      <h1 class="flash_sale">FLASH SALE</h1>
      <h1 class="flash_sale">
        <div id="demo"></div>
      </h1>
    </div>

    <div class="row margin_top">
      <?php
      while ($product = mysqli_fetch_array($query_product)) {
      ?>
        <div class="col l-2 m-4 c-6 margin product_new">
          <div class="product_div">
            <a href="?quanly=sanpham&idsanpham=<?php echo $product['id_sanpham'] ?>">
              <img loading="lazy" src="admincp/modules/quanlysp/uploads/<?php echo $product['hinhAnh'] ?>" alt="" class="product_img">
            </a>
          </div>
          <div class="product_text-4">
            <h3 class="product_name"><?php echo $product['tenSanPham'] ?></h3>
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
                                          $sql_soluong = "SELECT id_sanpham, SUM(soLuongMua) AS soLuongBan FROM tbl_giohang_chitiet WHERE id_sanpham=$product[id_sanpham] GROUP BY id_sanpham";
                                          $query_soluong = mysqli_query($mysqli, $sql_soluong);
                                          $soluong = mysqli_fetch_array($query_soluong);
                                          if (isset($soluong['soLuongBan'])) {
                                            echo $soluong['soLuongBan'];
                                          } else {
                                            echo "0";
                                          } ?> </p>
          </div>
          <p class="product_price"><?php echo number_format($product['gia'], 0, ',', '.') . 'đ' ?></p>
          <div class="product_new-1">
            <p class="product_new-text">Mới</p>
          </div>
          <div class="product_new-2">
            <a href="?quanly=sanpham&idsanpham=<?php echo $product['id_sanpham'] ?>" class="product_link">
              <p class="product_new-text-1">Xem Ngay</p>
            </a>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <div class="row">
      <div class="col l-6 m-6 c-12">
        <div>
          <a href="Product/bigsale.html">
            <img loading="lazy" class="sale_img" src="images/bentrai.png" alt="">
          </a>
        </div>
      </div>
      <div class="col l-6 m-6 c-12">
        <div>
          <a href="Product/bigsale.html">
            <img loading="lazy" class="sale_img" src="images/benphai.png" alt="">
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col l-12">
        <a href="Product/bigsale.html">
          <img loading="lazy" class="sale_img" src="images/benduoi.png" alt="">
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col l-12">
        <a href="">
          <img loading="lazy" class="sale_img" src="images/benduoi2.png" alt="">
        </a>
      </div>
    </div>
    <div class="row margin_top">
      <?php
      while ($product = mysqli_fetch_array($query_product1)) {
      ?>
        <div class="col l-2 m-4 c-6 margin product_new">
          <div class="product_div">
            <a href="?quanly=sanpham&idsanpham=<?php echo $product['id_sanpham'] ?>">
              <img loading="lazy" src="admincp/modules/quanlysp/uploads/<?php echo $product['hinhAnh'] ?>" alt="" class="product_img">
            </a>
          </div>
          <div class="product_text-4">
            <h3 class="product_name"><?php echo $product['tenSanPham'] ?></h3>
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
                                          $sql_soluong = "SELECT id_sanpham, SUM(soLuongMua) AS soLuongBan FROM tbl_giohang_chitiet WHERE id_sanpham=$product[id_sanpham] GROUP BY id_sanpham";
                                          $query_soluong = mysqli_query($mysqli, $sql_soluong);
                                          $soluong = mysqli_fetch_array($query_soluong);
                                          if (isset($soluong['soLuongBan'])) {
                                            echo $soluong['soLuongBan'];
                                          } else {
                                            echo "0";
                                          } ?> </p>
          </div>
          <p class="product_price"><?php echo number_format($product['gia'], 0, ',', '.') . 'đ' ?></p>
          <div class="product_new-1">
            <p class="product_new-text">Mới</p>
          </div>
          <div class="product_new-2">
            <a href="?quanly=sanpham&idsanpham=<?php echo $product['id_sanpham'] ?>" class="product_link">
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
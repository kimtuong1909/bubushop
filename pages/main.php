            <?php
            if (isset($_GET["quanly"])) {
                $tam = $_GET["quanly"];
            } else {
                $tam = "";
            }
            if ($tam == "danhmuc") {
                include("main/danhmuc.php");
            } else if ($tam == "sanpham") {
                include("sanpham/sanpham.php");
            } else if ($tam == "giohang") {
                include("main/giohang.php");
            } else if ($tam == "donhangcuatoi") {
                include("main/donhangcuatoi.php");
            } else if ($tam == "xemdonhang") {
                include("main/xemdonhang.php");
            } else if ($tam == "dathang") {
                include("main/dathang.php");
            } else if ($tam == "baiviet") {
                include("main/baiviet.php");
            } else if ($tam == "lienhe") {
                include("main/lienhe.php");
            } else if ($tam == "dangky") {
                include("main/dangky.php");
            } else if ($tam == "taikhoan") {
                include("main/taikhoan.php");
            } else if ($tam == "thanhtoan") {
                include("main/thanhtoan.php");
            } else if ($tam == "timkiem") {
                include("main/timkiem.php");
            } else if ($tam == "camon") {
                include("main/camon.php");
            } else if ($tam == "doimatkhau") {
                include("main/doimatkhau.php");
            } else if ($tam == "phieugiamgia") {
                include("main/phieugiamgia.php");
            } else if ($tam == "favourite") {
                include("main/favourite.php");
            } else if ($tam == "about") {
                include("information/about.php");
            } else if ($tam == "payment_methods") {
                include("information/payment_methods.php");
            } else if ($tam == "return") {
                include("information/return.php");
            } else if ($tam == "thoitrangbenvung") {
                include("information/thoitrangbenvung.php");
            } else if ($tam == "transport") {
                include("information/transport.php");
            } else {
                include("main/index.php");
            }
            ?>



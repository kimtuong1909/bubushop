<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sales website">
    <meta name="keywords" content="BUBU SHOP">
    <meta name="author" content="Kim Tuong">
    <!-- <meta http-equiv="refresh" content="30"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/gird.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/camon.css">
    <link rel="stylesheet" href="css/baiviet.css">
    <link rel="stylesheet" href="css/dathang.css">
    <link rel="stylesheet" href="css/donhangcuatoi.css">
    <link rel="stylesheet" href="css/phieugiamgia.css">
    <link rel="stylesheet" href="css/taikhoan.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/payment_methods.css">
    <link rel="stylesheet" href="css/return.css">
    <link rel="stylesheet" href="css/thoitrangbenvung.css">
    <link rel="stylesheet" href="css/transport.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reponsive.css">
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">

    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300&display=swap" rel="stylesheet">
    <title>BUBU</title>
</head>

<body>
    <div class="wrapper">
        <?php
        session_start();
        // unset($_SESSION['dangky']);
        include("admincp/config/config.php");
        include("pages/header.php");
        include("pages/menu.php");
        include("pages/main.php");
        include("pages/footer.php");
        ?>
    </div>
    <!-- Bootrap -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script src="js/sidebar_product.js"></script>
    <script src="js/banner.js"></script>
    <script src="js/taikhoan.js"></script>
    <script src="js/index.js"></script>
</body>

</html>
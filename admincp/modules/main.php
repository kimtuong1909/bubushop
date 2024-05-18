<?php
    if(isset($_GET['action'])&&isset($_GET['query'])){
        $tam=$_GET['action'];
        $query=$_GET['query'];
    }else{
        $tam='';
        $query='';
    }
    if(isset($_GET['quanly'])){
        $quanly=$_GET['quanly'];
    }else{
        $quanly='';
    }
    if($quanly=='dangky'){
        include("login.php");
    }
    if($tam=='quanlydanhmucsanpham' && $query=='them'){
        include("quanlydanhmucsp/them.php");
        include("quanlydanhmucsp/lietke.php");
    }
    else if($tam=='quanlydanhmucsanpham' && $query=='sua'){
        include("quanlydanhmucsp/sua.php");
    }
    else if($tam=='quanlysanpham' && $query=='them'){
        include("quanlysp/them.php");
        include("quanlysp/lietke.php");
    }
    else if($tam=='quanlysanpham' && $query=='sua'){
        include("quanlysp/sua.php");
    }
    else if($tam=='quanlydanhmucbaiviet' && $query=='them'){
        include("modules/quanlydanhmucbv/them.php");
        include("modules/quanlydanhmucbv/lietke.php");
    }
    else if($tam=='quanlydanhmucbaiviet' && $query=='sua'){
        include("modules/quanlydanhmucbv/sua.php");
    }
    else if($tam=='quanlybaiviet' && $query=='them'){
        include("modules/quanlybaiviet/them.php");
        include("modules/quanlybaiviet/lietke.php");
    }
    else if($tam=='quanlybaiviet' && $query=='sua'){
        include("modules/quanlybaiviet/sua.php");
    }
    else if($tam=='quanlykhachhang' && $query=='lietke'){
        include("modules/quanlykhachhang/lietke.php");
    }
    else if($tam=='quanlygiohang' && $query=='lietke'){
        include("modules/quanlygiohang/lietke.php");
    }
    else if($tam=='donhang'&& $query=='xemdonhang'){
        include("modules/quanlygiohang/xemdonhang.php");
    }
    else{
        include("modules/dashboard.php");
    }

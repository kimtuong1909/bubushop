<?php
    include('../../config/config.php');

    $tensanpham=$_POST['tensanpham'];
    $masanpham=$_POST['masanpham'];
    $gia=$_POST['gia'];
    $soluong=$_POST['soluong'];
    $hinhanh=$_FILES['hinhanh']['name'];
    $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
    // $hinhanh=time().'_'.$hinhanh;
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $danhmucsp=$_POST['danhmucsp'];
    $tinhtrang=$_POST['tinhtrang'];

    if(isset($_POST['themsanpham'])){
        if(isset($tensanpham)&& $tensanpham!=''){
            $hinhanh=time().'_'.$hinhanh;
        $sql_them="INSERT INTO tbl_sanpham(tenSanPham,maSanPham,gia,soLuong,hinhAnh,tomTat,noiDung,id_danhmuc,tinhTrang)
                    VALUES('".$tensanpham."','".$masanpham."','".$gia."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$danhmucsp."','".$tinhtrang."')
        ";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        }
    }
    else if(isset($_POST['suasanpham'])){
    // Kiểm tra có thay đổi hình ảnh
        if($hinhanh!=""){
            $hinhanh=time().'_'.$hinhanh;
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
            $sql="SELECT * FROM tbl_sanpham WHERE id_sanpham=$_GET[idsanpham]";
            $query=mysqli_query($mysqli,$sql);
            $row=mysqli_fetch_array($query);
            unlink('uploads/'.$row['hinhAnh']);
            $sql_sua_sanpham="UPDATE tbl_sanpham SET tenSanPham='".$tensanpham."',maSanPham='".$masanpham."',
            gia='".$gia."',soLuong='".$soluong."',hinhAnh='".$hinhanh."',
            tomTat='".$tomtat."',noiDung='".$noidung."',id_danhmuc='".$danhmucsp."',tinhtrang='".$tinhtrang."'
            WHERE id_sanpham=$_GET[idsanpham]
            ";

        }
        else{
            $sql_sua_sanpham="UPDATE tbl_sanpham SET tenSanPham='".$tensanpham."',maSanPham='".$masanpham."',
            gia='".$gia."',soLuong='".$soluong."',tomTat='".$tomtat."',
            noiDung='".$noidung."',id_danhmuc='".$danhmucsp."',tinhtrang='".$tinhtrang."'
            WHERE id_sanpham=$_GET[idsanpham]
            ";

        }
        mysqli_query($mysqli,$sql_sua_sanpham);
    }
    else{
        $sql="SELECT * FROM tbl_sanpham WHERE id_sanpham=$_GET[idsanpham]";
        $query=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_array($query);
        unlink('uploads/'.$row['hinhAnh']);
        $sql_xoa_sanpham="DELETE FROM tbl_sanpham WHERE id_sanpham=$_GET[idsanpham]";
        mysqli_query($mysqli,$sql_xoa_sanpham);
    }
    header('location: ../../index.php?action=quanlysanpham&query=them');

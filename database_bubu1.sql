-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 03, 2023 lúc 06:12 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database_bubu1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password_admin` int(11) NOT NULL,
  `admin_state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password_admin`, `admin_state`) VALUES
(1, 'tuong2002@gmail.com', 123, 1),
(2, 'tuong123@gmail.com', 123, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_baiviet`
--

CREATE TABLE `tbl_baiviet` (
  `id_baiviet` int(11) NOT NULL,
  `tenBaiViet` varchar(100) NOT NULL,
  `hinhAnh` varchar(100) NOT NULL,
  `tomTat` text NOT NULL,
  `noiDung` text NOT NULL,
  `id_danhmucbv` int(11) NOT NULL,
  `tinhTrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_baiviet`
--

INSERT INTO `tbl_baiviet` (`id_baiviet`, `tenBaiViet`, `hinhAnh`, `tomTat`, `noiDung`, `id_danhmucbv`, `tinhTrang`) VALUES
(1, 'SIZE CHECK', '1687616462', '<p>Kh&ocirc;ng biết k&iacute;ch thước của bạn? Hướng dẫn k&iacute;ch thước của ch&uacute;ng t&ocirc;i gi&uacute;p bạn chọn k&iacute;ch thước ph&ugrave; hợp nhất!</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<p><strong>1. K&iacute;ch thước &aacute;o ph&ocirc;ng</strong>&nbsp;<img alt=\"\" src=\"http://127.0.0.1:5500/Tu%E1%BA%A5n%20Anh/img/size/picture/size%20aophong.png\" style=\"height:373px; width:620px\" /></p>\r\n\r\n<p><strong>2. K&iacute;ch thước &aacute;o sơ mi</strong>&nbsp;<img alt=\"\" src=\"http://127.0.0.1:5500/Tu%E1%BA%A5n%20Anh/img/size/picture/somi%20size.jpg\" style=\"height:370px; width:620px\" /></p>\r\n\r\n<p><strong>3. K&iacute;ch thước swearter</strong>&nbsp;<img alt=\"\" src=\"http://127.0.0.1:5500/Tu%E1%BA%A5n%20Anh/img/size/picture/size%20swt.png\" style=\"height:360px; width:620px\" /></p>\r\n\r\n<p><strong>4. K&iacute;ch thước hoodie</strong>&nbsp;<img alt=\"\" src=\"http://127.0.0.1:5500/Tu%E1%BA%A5n%20Anh/img/size/picture/hoodie%20size.png\" style=\"height:373px; width:620px\" /></p>\r\n\r\n<p><strong>5. K&iacute;ch thước quần d&agrave;i</strong>&nbsp;<img alt=\"\" src=\"http://127.0.0.1:5500/Tu%E1%BA%A5n%20Anh/img/size/picture/size%20quanjeans.png\" style=\"height:359px; width:620px\" /></p>\r\n\r\n<p><strong>6. K&iacute;ch thước quần sooc</strong>&nbsp;<img alt=\"\" src=\"http://127.0.0.1:5500/Tu%E1%BA%A5n%20Anh/img/size/picture/sooc%20size.jpg\" style=\"height:373px; width:620px\" /></p>\r\n', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tenDanhMuc` varchar(200) NOT NULL,
  `thuTu` int(11) NOT NULL,
  `anhDanhMuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tenDanhMuc`, `thuTu`, `anhDanhMuc`) VALUES
(1, 'Áo phông', 1, '1687612913_2.png'),
(2, 'Áo Sơ Mi', 2, '1687612936_SM6.png'),
(3, 'Áo Hoodie', 3, '1687612965_HD2.png'),
(4, 'Áo sweater', 4, '1687612980_SWT3.png'),
(5, 'Quần', 5, '1687612997_dai1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc_baiviet`
--

CREATE TABLE `tbl_danhmuc_baiviet` (
  `id_danhmucbv` int(11) NOT NULL,
  `tenDanhMucBV` varchar(200) NOT NULL,
  `thuTu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc_baiviet`
--

INSERT INTO `tbl_danhmuc_baiviet` (`id_danhmucbv`, `tenDanhMucBV`, `thuTu`) VALUES
(0, 'ABOUT', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giaohang`
--

CREATE TABLE `tbl_giaohang` (
  `id_giaohang` int(11) NOT NULL,
  `id_giohang` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tenNguoiNhan` varchar(200) NOT NULL,
  `soDienThoai1` varchar(20) NOT NULL,
  `soDienThoai2` varchar(20) NOT NULL,
  `diaChi` varchar(200) NOT NULL,
  `hinhThucThanhToan` varchar(200) NOT NULL,
  `ghiChu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giaohang`
--

INSERT INTO `tbl_giaohang` (`id_giaohang`, `id_giohang`, `id_customer`, `tenNguoiNhan`, `soDienThoai1`, `soDienThoai2`, `diaChi`, `hinhThucThanhToan`, `ghiChu`) VALUES
(1, 2, 1, 'Nguyễn Kim Tường', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Thanh toán khi nhận hàng', 'giao hàng sớm'),
(4, 3, 2, 'Đinh Khải Vinh', '0988315678', '', 'Yên Nghĩa,Hà Đông,Hà Nội', 'Visa', 'giao hàng sớm'),
(5, 0, 2, 'Đinh Khải Vinh', '0988315678', '', 'Yên Nghĩa,Hà Đông,Hà Nội', 'Visa', 'giao hàng sớm'),
(6, 4, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(7, 5, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(8, 8, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(9, 6, 3, 'Nguyễn Bỉnh Trường Sơn', '0868167202', '0988666888', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(10, 0, 3, 'Nguyễn Bỉnh Trường Sơn', '0868167202', '0988666888', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(11, 7, 4, 'Nguyễn Bỉnh Trường Sơn', '0868167202', '', 'Đông La,Hoài Đức,Hà Nội', 'Momo', ''),
(12, 0, 4, 'Nguyễn Bỉnh Trường Sơn', '0868167202', '', 'Đông La,Hoài Đức,Hà Nội', 'Momo', ''),
(13, 9, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(14, 10, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(15, 11, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(16, 12, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(17, 13, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(18, 14, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(19, 15, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(20, 16, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(21, 17, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(22, 18, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(23, 19, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(24, 20, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(25, 21, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(26, 22, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm'),
(27, 0, 1, 'Nguyễn Kim Tuấn', '0988513666', '0933068000', 'Đông La,Hoài Đức,Hà Nội', 'Paypal', 'giao hàng sớm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id_giohang` int(11) NOT NULL,
  `id_giaohang` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tinhTrang` varchar(200) NOT NULL,
  `ngayDat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`id_giohang`, `id_giaohang`, `id_customer`, `tinhTrang`, `ngayDat`) VALUES
(2, 1, 1, '0', '23-2-2023'),
(3, 4, 2, '0', '23-2-2023'),
(4, 6, 1, '0', '23-2-2023'),
(5, 7, 1, '0', '23-2-2023'),
(6, 9, 3, '1', '26-5-2023'),
(7, 11, 4, '0', '26-5-2023'),
(8, 8, 1, '1', '25-6-2023'),
(9, 13, 1, '1', '25-6-2023'),
(10, 14, 1, '1', '25-6-2023'),
(11, 15, 1, '1', '25-6-2023'),
(12, 16, 1, '1', '25-6-2023'),
(13, 17, 1, '1', '25-6-2023'),
(14, 18, 1, '1', '25-6-2023'),
(15, 19, 1, '1', '25-6-2023'),
(16, 20, 1, '1', '25-6-2023'),
(17, 21, 1, '1', '25-6-2023'),
(18, 22, 1, '1', '25-6-2023'),
(19, 23, 1, '1', '25-6-2023'),
(20, 24, 1, '1', '25-6-2023'),
(21, 25, 1, '1', '25-6-2023'),
(22, 26, 1, '1', '25-6-2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang_chitiet`
--

CREATE TABLE `tbl_giohang_chitiet` (
  `id_giohang_chitiet` int(11) NOT NULL,
  `id_giohang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soLuongMua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang_chitiet`
--

INSERT INTO `tbl_giohang_chitiet` (`id_giohang_chitiet`, `id_giohang`, `id_sanpham`, `soLuongMua`) VALUES
(1, 2, 1, 2),
(2, 2, 2, 1),
(3, 2, 6, 2),
(4, 3, 2, 1),
(5, 3, 36, 2),
(6, 4, 31, 3),
(7, 4, 56, 1),
(8, 5, 1, 2),
(9, 5, 2, 1),
(10, 5, 3, 1),
(11, 6, 2, 1),
(12, 6, 56, 2),
(13, 6, 31, 1),
(14, 7, 1, 1),
(15, 7, 2, 1),
(16, 7, 3, 1),
(17, 7, 4, 1),
(18, 8, 1, 1),
(19, 9, 5, 1),
(20, 10, 8, 1),
(21, 11, 9, 1),
(22, 12, 8, 1),
(23, 13, 5, 5),
(24, 14, 43, 3),
(25, 15, 32, 1),
(26, 16, 44, 1),
(27, 17, 37, 1),
(28, 18, 36, 1),
(29, 19, 12, 1),
(30, 20, 29, 9),
(31, 21, 52, 6),
(32, 22, 56, 6),
(33, 22, 4, 1),
(34, 22, 5, 1),
(35, 22, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `id_customer` int(11) NOT NULL,
  `name_user` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password_user` varchar(200) NOT NULL,
  `address_user` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `birthDay` int(10) NOT NULL,
  `birthMonth` int(10) NOT NULL,
  `birthYear` int(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`id_customer`, `name_user`, `email`, `password_user`, `address_user`, `phone`, `birthDay`, `birthMonth`, `birthYear`, `gender`, `avatar`) VALUES
(1, 'Nguyễn Kim Tường', 'tuongkim2002@gmail.com', '123', 'Hà Nội', '0988513666', 19, 9, 2002, 'male', '1688356730_278024678_5004543712932549_889338411501614999_n.jpg'),
(2, 'Đinh Khải Vinh', 'dinhkhaivinh@gmail.com', '123', 'Hà Nội', '0988315678', 30, 8, 2019, 'male', '1688356492_2559986818f7efadsa9b6e6153.png'),
(3, 'Nguyễn Bỉnh Trường Sơn', 'son@gmail.com', '123', 'Hà Nội', '0868167202', 0, 0, 0, '', ''),
(4, 'Nguyễn Bỉnh Trường Sơn', 'nguyenbtson@gmail.com', '123', 'Hà Nội', '0868167202', 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tenSanPham` varchar(200) NOT NULL,
  `maSanPham` varchar(200) NOT NULL,
  `gia` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `hinhAnh` varchar(200) NOT NULL,
  `tomTat` text NOT NULL,
  `noiDung` text NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `tinhTrang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tenSanPham`, `maSanPham`, `gia`, `soLuong`, `hinhAnh`, `tomTat`, `noiDung`, `id_danhmuc`, `tinhTrang`) VALUES
(1, 'ÁO TEE MICKEY', 'it001', 1795000, 96, '1677144226_1.png', '', '', 1, '1'),
(2, 'ÁO TANKTOP THỂ THAO', 'it002', 1699000, 28, '1677144233_2.png', '', '', 1, '1'),
(3, 'Quần áo thể thao', 'it003', 875000, 34, '1677144240_3.png', '', '', 1, '1'),
(4, 'Quần áo thể thao', 'it0018', 969000, 9, '1677144248_4.png', '', '', 1, '1'),
(5, 'ÁO TEE MICKEY', 'it001', 699000, 19, '1677144265_5.png', '', '', 1, '1'),
(6, 'Quần áo thể thao', 'it003', 969000, 2, '1677144273_6.png', '', '', 1, '1'),
(7, 'ÁO TEE MICKEY', 'it025', 969000, 34, '1677144281_7.png', '', '', 1, '1'),
(8, 'Quần áo thể thao', 'it003', 175000, 96, '1677144289_9.png', '', '', 1, '1'),
(9, 'Quần áo thể thao', 'it001', 969000, 28, '1677144295_10.png', '', '', 1, '1'),
(10, 'ÁO TEE MICKEY', 'it0018', 875000, 9, '1677144314_11.png', '', '', 1, '1'),
(11, 'Quần áo thể thao', 'it001', 169000, 28, '1677144323_12.png', '', '', 1, '1'),
(12, 'Quần áo thể thao', 'it003', 969000, 34, '1677144330_13.png', '', '', 1, '1'),
(13, 'Quần áo thể thao', 'it001', 175000, 28, '1677144337_14.png', '', '', 1, '1'),
(14, 'ÁO TEE MICKEY', 'it001', 1795000, 96, '1677144345_15.png', '', '', 1, '1'),
(15, 'ÁO TANKTOP THỂ THAO', 'it002', 1699000, 28, '1677144354_16.png', '', '', 1, '1'),
(16, 'Quần áo thể thao', 'it003', 875000, 34, '1677144364_17.png', '', '', 1, '1'),
(17, 'Quần áo thể thao', 'it0018', 969000, 9, '1677144373_18.png', '', '', 1, '1'),
(18, 'ÁO TEE MICKEY', 'it001', 699000, 19, '1677144384_19.png', '', '', 1, '1'),
(19, 'Quần áo thể thao', 'it003', 969000, 2, '1677144399_20.png', '', '', 1, '1'),
(20, 'ÁO TEE MICKEY', 'it025', 969000, 34, '1677144414_21.png', '', '', 1, '1'),
(21, 'Quần áo thể thao', 'it003', 175000, 96, '1677144424_22.png', '', '', 1, '1'),
(22, 'Quần áo thể thao', 'it001', 969000, 28, '1677144431_23.png', '', '', 1, '1'),
(23, 'ÁO TEE MICKEY', 'it0018', 875000, 9, '1677144438_24.png', '', '', 1, '1'),
(24, 'Quần áo thể thao', 'it001', 169000, 28, '1677144446_25.png', '', '', 1, '1'),
(25, 'Quần áo thể thao', 'it003', 969000, 34, '1677144454_26.png', '', '', 1, '1'),
(26, 'Quần áo thể thao', 'it001', 175000, 28, '1677144465_27.png', '', '', 1, '1'),
(27, 'ÁO TEE MICKEY', 'it001', 1795000, 96, '1677144472_28.png', '', '', 1, '1'),
(28, 'ÁO TANKTOP THỂ THAO', 'it002', 1699000, 28, '1677144480_29.png', '', '', 1, '1'),
(29, 'Quần áo thể thao', 'it003', 875000, 34, '1677144491_30.png', '', '', 1, '1'),
(30, 'Quần áo thể thao', 'it0018', 969000, 9, '1677144500_31.png', '', '', 1, '1'),
(31, 'ÁO SƠ MI NAM REGULAR PARTTEN', 'it001', 969000, 28, '1677144639_SM1.png', '', '', 2, '1'),
(32, 'ÁO SƠ MI UN OVERSHIRT', 'it001', 875000, 28, '1677144676_SM2.png', '', '', 2, '1'),
(33, 'ÁO SƠ MI MICKEY', 'it0018', 675000, 96, '1677144715_SM3.png', '', '', 2, '1'),
(34, 'ÁO SƠ MI NAM REGULAR PARTTEN', 'it001', 969000, 28, '1677145089_SM4.png', '', '', 2, '1'),
(35, 'ÁO SƠ MI UN OVERSHIRT', 'it001', 875000, 28, '1677145096_SM5.png', '', '', 2, '1'),
(36, 'ÁO SƠ MI MICKEY', 'it0018', 675000, 96, '1677145104_SM6.png', '', '', 2, '1'),
(37, 'ÁO SƠ MI NAM REGULAR PARTTEN', 'it001', 969000, 28, '1677145111_SM7.png', '', '', 2, '1'),
(38, 'ÁO SƠ MI UN OVERSHIRT', 'it001', 875000, 28, '1677145118_SM8.png', '', '', 2, '1'),
(39, 'ÁO SƠ MI MICKEY', 'it0018', 675000, 96, '1677145126_SM9.png', '', '', 2, '1'),
(41, 'ÁO SƠ MI NAM REGULAR PARTTEN', 'it001', 969000, 28, '1677145132_SM10.png', '', '', 2, '1'),
(42, 'ÁO SƠ MI UN OVERSHIRT', 'it001', 875000, 28, '1677145139_SM11.png', '', '', 2, '1'),
(43, 'ÁO SƠ MI MICKEY', 'it0018', 675000, 96, '1677145145_SM12.png', '', '', 2, '1'),
(44, 'ÁO SƠ MI NAM REGULAR PARTTEN', 'it001', 969000, 28, '1677145152_SM13.png', '', '', 2, '1'),
(45, 'ÁO SƠ MI UN OVERSHIRT', 'it001', 875000, 28, '1677145161_SM14.png', '', '', 2, '1'),
(46, 'ÁO SƠ MI MICKEY', 'it0018', 675000, 96, '1677145168_SM15.png', '', '', 2, '1'),
(47, 'ÁO SƠ MI NAM REGULAR PARTTEN', 'it001', 969000, 28, '1677145177_SM16.png', '', '', 2, '1'),
(48, 'ÁO SƠ MI UN OVERSHIRT', 'it001', 875000, 28, '1677145185_SM17.png', '', '', 2, '1'),
(49, 'ÁO SƠ MI MICKEY', 'it0018', 675000, 96, '1677145197_SM18.png', '', '', 2, '1'),
(50, 'ÁO SƠ MI NAM REGULAR PARTTEN', 'it001', 969000, 28, '1677145206_SM19.png', '', '', 2, '1'),
(51, 'ÁO SƠ MI UN OVERSHIRT', 'it001', 875000, 28, '1677145212_SM20.png', '', '', 2, '1'),
(52, 'ÁO SƠ MI MICKEY', 'it0018', 675000, 96, '1677145221_SM21.png', '', '', 2, '1'),
(53, 'ÁO SƠ MI NAM REGULAR PARTTEN', 'it001', 969000, 28, '1677145231_SM22.png', '', '', 2, '1'),
(54, 'ÁO SƠ MI UN OVERSHIRT', 'it001', 875000, 28, '1677145240_SM23.png', '', '', 2, '1'),
(55, 'ÁO SƠ MI MICKEY', 'it0018', 675000, 96, '1677145247_SM24.png', '', '', 2, '1'),
(56, 'ÁO NỈ MŨ EXPERIMENTAL', 'it0015', 1969000, 28, '1677145334_HD1.png', '', '', 3, '1'),
(57, 'SWEATSHIRT OVERSIZED', 'it0015', 899000, 28, '1677145379_SWT1.png', '', '', 4, '1'),
(58, 'QUẦN JEANS NAM WASH', 'it023', 975000, 34, '1677145416_dai1.jpg', '', '', 5, '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  ADD PRIMARY KEY (`id_baiviet`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_giaohang`
--
ALTER TABLE `tbl_giaohang`
  ADD PRIMARY KEY (`id_giaohang`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`id_giohang`);

--
-- Chỉ mục cho bảng `tbl_giohang_chitiet`
--
ALTER TABLE `tbl_giohang_chitiet`
  ADD PRIMARY KEY (`id_giohang_chitiet`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`id_customer`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  MODIFY `id_baiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_giaohang`
--
ALTER TABLE `tbl_giaohang`
  MODIFY `id_giaohang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id_giohang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang_chitiet`
--
ALTER TABLE `tbl_giohang_chitiet`
  MODIFY `id_giohang_chitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2022 lúc 08:32 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php_qlvattu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `purchase` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `year`, `purchase`, `sale`, `profit`) VALUES
(1, 2007, 550000, 800000, 250000),
(2, 2008, 678000, 1065000, 387000),
(3, 2009, 787000, 1278500, 491500),
(4, 2010, 895600, 1456000, 560400),
(5, 2011, 967150, 1675600, 708450),
(6, 2012, 1065850, 1701542, 635692),
(7, 2013, 1105600, 1895000, 789400),
(8, 2014, 1465000, 2256500, 791500),
(9, 2015, 1674500, 2530000, 855500),
(10, 2016, 2050000, 3160000, 1110000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `madm` int(11) NOT NULL,
  `tendm` varchar(500) NOT NULL,
  `mota` varchar(500) NOT NULL,
  `danhmuccha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`madm`, `tendm`, `mota`, `danhmuccha`) VALUES
(1, 'Nhóm 1', 'Bông, dung dịch sát khuẩn, rửa vết thương', 0),
(2, 'Nhóm 2', 'Băng, gạc, vật liệu cầm máu, điều trị vết thương', 0),
(3, 'Nhóm 3', 'Bơm, kim tiêm, dây truyền, găng tay và vật tư y tế sử dụng trong chăm sóc người bệnh', 0),
(4, 'Nhóm 4', 'Ống thông, ống dẫn lưu, ống nối, dây nối, chạc nối, catheter', 0),
(5, 'Nhóm 5', 'Kim khâu, chỉ khâu, dao phẫu thuật', 0),
(6, 'Nhóm 6', 'Vật liệu thay thế, vật liệu cấy ghép nhân tạo', 0),
(7, 'Nhóm 7', 'Vật tư y tế sử dụng trong một số chuyên khoa', 0),
(8, 'Nhóm 8', 'Vật tư y tế sử dụng trong chẩn đoán, điều trị khác', 0),
(9, 'Nhóm 9', 'Các loại vật tư y tế thay thế sử dụng trong một số thiết bị chẩn đoán, điều trị', 0),
(10, 'Nhóm 10', 'Các Vật tư y tế khác chưa có trong 9 nhóm của TT 04', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `companies`
--

CREATE TABLE `companies` (
  `macty` int(11) NOT NULL,
  `tencty` varchar(500) NOT NULL,
  `diachi` varchar(500) NOT NULL,
  `sdt` varchar(13) NOT NULL,
  `email` varchar(500) NOT NULL,
  `logo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `companies`
--

INSERT INTO `companies` (`macty`, `tencty`, `diachi`, `sdt`, `email`, `logo`) VALUES
(1, 'Công ty TNHH Vật liệu y tế Bông Sen Vàng', 'số 15, Quận Tân Phú, TP.Hồ Chí Minh', '0983566678', 'goldenlotus@gmail.com', '1670602976_lambor1.png'),
(2, 'Công ty TNHH Thiết bị Y tế Sóng Mới', 'số 53, phường Cổ Nhuế, Quận Bắc Từ Liêm, TP.Hà Nội', '087552468', 'newwave2008@gmail.com', '1670602969_lambor1.png'),
(3, 'CTY TNHH Tâm An', 'Số 11, Vũ Trọng Phụng, Quận Hoàn Kiếm, Hà Nội', '0123456891', 'TamanMedic@gmail.com', '1670602963_lambor1.png'),
(4, 'CTy TNHH Y Dược Tràng An', 'Số 125, Quận Bến Nghé, TP.Hồ Chí Minh', '08745568745', 'yduoctrangan@gmail.com', '1670602956_lambor1.png'),
(5, 'CTy TNHH 1 Thành Viên Tín Phát', 'số 111, Huỳnh Thúc Kháng, TP. Hà Nội', '0942651648616', 'tinphatmedic@gmail.com', '1670602950_lambor1.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `manv` int(11) NOT NULL,
  `tennv` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phong` varchar(100) NOT NULL,
  `diachi` varchar(500) NOT NULL,
  `sdt` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`manv`, `tennv`, `email`, `password`, `phong`, `diachi`, `sdt`) VALUES
(1, 'Phạm Đức Minh', 'pdm@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pm01', 'Nam Định', 12345678),
(2, 'Đinh Nguyễn Tùng Anh', 'dnta@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'PM02', 'Vĩnh Phúc', 987654321);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `masp`, `quantity`, `price`) VALUES
(7, 13, 1, 1, 2000),
(8, 13, 41, 3, 35000),
(9, 14, 14, 1, 2000),
(10, 15, 30, 1, 500);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(25) NOT NULL,
  `date` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `manv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `date`, `price`, `status`, `manv`) VALUES
(13, '2022-12-09 18:50:04', 107000, 1, 1),
(14, '2022-12-09 23:53:16', 2000, 1, 1),
(15, '2022-12-10 01:40:17', 500, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(500) NOT NULL,
  `anh` varchar(500) NOT NULL,
  `mota` varchar(500) NOT NULL,
  `gianhap` int(11) NOT NULL,
  `ngaynhap` datetime NOT NULL,
  `khauhaoperday` float NOT NULL,
  `khauhaoperused` float NOT NULL,
  `solansudung` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `isvattu` int(11) NOT NULL,
  `madm` int(11) NOT NULL,
  `macty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`masp`, `tensp`, `anh`, `mota`, `gianhap`, `ngaynhap`, `khauhaoperday`, `khauhaoperused`, `solansudung`, `trangthai`, `isvattu`, `madm`, `macty`) VALUES
(1, 'Bông y tế', 'b1.PNG', '100gr', 2000, '2022-10-28 00:00:00', 0.01, 100, 1, 1, 1, 1, 1),
(7, 'Bông viên', 'b2.PNG', '50gr', 1000, '2022-11-21 08:09:50', 0.1, 100, 1, 0, 1, 1, 1),
(8, 'Băng thun y tế', 'b3.PNG', 'Size: 0,1m x 3m', 3000, '2022-11-21 08:09:50', 0.1, 100, 1, 0, 1, 1, 1),
(9, 'Băng AID FIRST', 'b4.PNG', 'Hộp 100 cái', 20000, '2022-11-21 08:09:50', 0.1, 0.1, 1, 0, 1, 1, 2),
(10, 'Bông Bạch Tuyết', 'b5.png', 'W: 500g', 5000, '2022-11-01 14:10:04', 0.1, 0.1, 1, 0, 1, 1, 3),
(11, 'Bông bạch tuyết', 'b6.PNG', 'W: 25g', 1000, '2022-11-16 14:10:04', 0.1, 0.1, 0, 0, 1, 1, 3),
(12, 'Bông y tế cắt miếng', 'b7.PNG', 'Size: 7cm x 7cm \r\nTrọng lượng: 1kg', 15000, '2021-11-01 08:17:26', 0.1, 0.1, 0, 0, 1, 1, 4),
(13, 'Bông tẩm cồn', 'b8.PNG', 'Hộp 100 cái', 25000, '2022-01-02 08:17:26', 0.1, 0.1, 1, 0, 1, 1, 4),
(14, 'Dung dịch sát khuẩn CLINCARE', 'k1.PNG', '50ml', 2000, '2022-05-21 08:17:26', 0.1, 0.1, 0, 0, 1, 1, 2),
(15, 'Rửa vết thương BETADINE', 'k2.PNG', '125ml', 2500, '2022-11-21 08:17:26', 0.1, 0.1, 0, 0, 1, 1, 2),
(16, 'Cồn 75 độ', 'k3.PNG', '100ml', 2000, '2022-12-09 03:33:00', 0.1, 0.1, 0, 1, 1, 1, 0),
(17, 'Dung dịch cồn khử khuẩn tay', 'k4.PNG', '500ml', 10000, '2022-09-12 14:17:38', 0.1, 0.1, 0, 0, 1, 1, 1),
(18, 'Bình xịt khử trùng', 'k5.PNG', '650ml', 10000, '2022-11-21 08:17:26', 0.1, 0.1, 0, 0, 1, 1, 2),
(19, 'Multidex Bột', 'n21.PNG', '45grams', 12000, '2022-11-21 08:27:25', 0.1, 0.1, 0, 0, 1, 2, 1),
(20, 'Băng UGO tanna', 'n22.PNG', '1,25cm x 4m', 3000, '2022-01-11 08:27:25', 0.1, 0.1, 0, 0, 1, 2, 1),
(21, 'Gạc UrgoTul', 'n23.PNG', '10cm x 10cm', 1000, '2022-11-21 08:29:44', 0.1, 0.1, 0, 0, 1, 2, 2),
(22, 'Gạc vết thương', 'n24.PNG', 'Miếng to', 1000, '2018-11-21 08:29:44', 0.1, 0.1, 0, 0, 1, 2, 1),
(23, 'Gạc miếng loại to', 'n25.PNG', '1kg', 20000, '2019-01-02 08:29:44', 0.1, 0.1, 0, 0, 1, 2, 4),
(24, 'Gạc cuộn', 'n26.PNG', '5m x 10cm', 5000, '2022-11-21 08:29:44', 0.1, 0.1, 0, 0, 1, 2, 3),
(25, 'Găng tay y tế', 'n28.PNG', 'Cao su non', 1000, '2022-11-21 08:29:44', 0.1, 0.1, 0, 0, 1, 2, 2),
(26, 'Sát trùng Povidine', 's1.PNG', '20ml', 2000, '2022-11-21 08:29:44', 0.1, 0.1, 0, 0, 1, 1, 2),
(27, 'Lọ xịt Nacurgo', 's2.PNG', 'Sát khuẩn, tái tạo ra', 10000, '2022-11-21 08:29:44', 0.1, 0.1, 0, 0, 1, 1, 2),
(28, 'Sát trùng Dettol', 's3.PNG', 'Sát trùng diệt khuẩn', 5000, '2022-11-21 08:29:44', 0.1, 0.1, 0, 0, 1, 1, 1),
(29, 'Cồn sát trùng', 's4.PNG', '100ml', 2000, '2022-11-21 08:29:44', 0.1, 0.1, 0, 0, 1, 1, 2),
(30, 'Kim tiêm', 't1.png', 'Loại nhỏ 2cc', 500, '2022-11-21 08:29:44', 0.1, 0.1, 0, 0, 1, 3, 2),
(31, 'Bộ đồ y tế', 'v1.PNG', 'Đầy đủ quần áo, găng tay, khẩu trang', 25000, '2022-11-21 08:29:44', 0.1, 0.1, 1, 1, 0, 3, 2),
(32, 'Ống thông', 'v2.PNG', '1m', 2000, '2022-11-21 08:29:44', 0.1, 0.1, 1, 0, 0, 3, 2),
(33, 'Bộ dây truyền dịch', 'v3.PNG', '1 bộ', 3000, '2022-11-21 08:44:56', 0.1, 0.1, 0, 0, 0, 3, 1),
(34, 'Dây nịt', 'v4.PNG', 'Loại nhỏ', 1000, '2022-11-21 08:44:56', 0.1, 0.1, 0, 0, 0, 3, 2),
(35, 'Ống nghe', 'v5.PNG', 'Made in Japan', 50000, '2022-11-21 08:44:56', 0.1, 0.1, 0, 0, 0, 3, 2),
(36, 'Máy đo nhiệt', 'v6.PNG', 'Sử dụng pin', 30000, '2022-11-21 08:44:56', 0.1, 0, 0, 0, 0, 3, 3),
(37, 'Cố định cổ', 'v9.PNG', 'Màu trắng', 10000, '2022-11-21 08:44:56', 0.1, 0.1, 0, 0, 0, 3, 2),
(38, 'Trùm tóc', 'v8.PNG', 'Dùng 1 lần', 500, '2022-11-21 08:44:56', 0.1, 0.1, 0, 0, 0, 3, 2),
(39, 'Ống thông', 'v7.PNG', 'Kim loại', 10000, '2022-11-21 08:44:56', 0.1, 0.1, 0, 0, 0, 3, 4),
(40, 'ỐNG DẪN NƯỚC TIỂU SONDE', '44.JPG', '2 nhánh', 12000, '2022-12-08 15:55:35', 0.1, 10, 1, 0, 0, 4, 2),
(41, 'Ống Nghe Y Tế Spirit', '41.JPG', '2 mặt', 35000, '2022-12-08 15:55:35', 0.1, 0.1, 0, 0, 0, 4, 4),
(42, 'Ống lưu trữ lạnh tế bào', '42.JPG', '5ml', 1000, '2022-12-08 16:02:30', 0.1, 10, 1, 0, 1, 4, 1),
(43, 'Dao phẫu thuật', '51.JPG', 'kèm cán', 10000, '2022-12-08 16:15:22', 0.1, 0.1, 0, 0, 0, 5, 3),
(44, 'Chỉ khâu y tế', '5.JPG', '10m', 3000, '2022-12-08 16:15:22', 0.1, 0.1, 0, 0, 0, 5, 2),
(45, 'Kim châm cứu', 'k1.JPG', '10 kim 1 gói', 5000, '2022-12-08 16:15:22', 0.1, 0.1, 0, 0, 0, 5, 1),
(46, 'Kẹp y tế', 'k2.JPG', '16cm', 20000, '2022-12-08 16:15:22', 0.01, 0.1, 100, 0, 0, 5, 4),
(47, 'Kéo cắt chỉ', 'k5.JPG', 'Loại nhỏ', 10000, '2022-12-08 16:15:22', 0.1, 0.1, 100, 0, 0, 5, 3),
(48, 'Kéo y tế', 'k4.JPG', 'Loại vừa', 25000, '2022-12-08 16:15:22', 0.01, 0.01, 200, 0, 0, 5, 0),
(49, 'Cốc y tế', '61.JPG', 'Inox 50ml', 10000, '2022-12-08 16:30:26', 0.01, 0.01, 0, 0, 0, 6, 2),
(50, 'Khay y tế', '62.JPG', 'inox 30x40cm', 30000, '2022-12-08 16:30:26', 0.01, 0.01, 0, 0, 0, 6, 3),
(51, 'Hộp đựng dụng cụ', '63.JPG', '30x40cm', 20000, '2022-12-08 16:30:26', 0.1, 0.1, 0, 0, 0, 6, 2),
(52, 'Máy nội soi tai mũi họng', 'm1.JPG', 'Japan', 20000000, '2022-12-08 16:44:37', 0.01, 0.01, 0, 0, 0, 10, 4),
(53, 'Máy siêu âm', 'm3.JPG', 'USA', 35000000, '2022-12-08 16:44:37', 0.01, 0.01, 0, 0, 0, 10, 1),
(54, 'Máy siêu âm S2', 'm4.JPG', 'Japan', 30000000, '2022-12-08 16:44:37', 0.01, 0.01, 0, 0, 0, 10, 2),
(55, 'Máy chụp X quang', 'm5.JPG', 'USA', 40000000, '2022-12-08 16:44:37', 0.01, 0.01, 0, 0, 0, 10, 2),
(56, 'Máy chụp cát lớp', 'm6.JPG', 'USA', 100000000, '2022-12-08 16:44:37', 0.01, 0.01, 0, 1, 1, 10, 2),
(58, 'test', 'm6.JPG', 'Cái này để test thôi', 22222, '2022-12-09 22:49:00', 0.2, 0.2, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `matk` int(11) NOT NULL,
  `tentk` varchar(500) NOT NULL,
  `matkhau` varchar(500) NOT NULL,
  `diachi` varchar(500) NOT NULL,
  `sdt` varchar(13) NOT NULL,
  `email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`matk`, `tentk`, `matkhau`, `diachi`, `sdt`, `email`) VALUES
(5, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Nam Định', '0987654321', 'admin@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`madm`);

--
-- Chỉ mục cho bảng `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`macty`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`manv`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`masp`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`matk`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `madm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `companies`
--
ALTER TABLE `companies`
  MODIFY `macty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `manv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `matk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

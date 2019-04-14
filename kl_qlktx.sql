-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 14, 2019 lúc 05:46 PM
-- Phiên bản máy phục vụ: 10.1.29-MariaDB
-- Phiên bản PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kl_qlktx`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log_sua_dl`
--

CREATE TABLE `log_sua_dl` (
  `idlog` int(11) NOT NULL,
  `bangsua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tenbang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `iddulieu` int(11) NOT NULL,
  `cot` text COLLATE utf8_unicode_ci NOT NULL,
  `tencot` text COLLATE utf8_unicode_ci NOT NULL,
  `noidungtruocsua` text COLLATE utf8_unicode_ci NOT NULL,
  `noidungsausua` text COLLATE utf8_unicode_ci NOT NULL,
  `nguoisua` int(11) NOT NULL,
  `ngaysua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `log_sua_dl`
--

INSERT INTO `log_sua_dl` (`idlog`, `bangsua`, `tenbang`, `iddulieu`, `cot`, `tencot`, `noidungtruocsua`, `noidungsausua`, `nguoisua`, `ngaysua`) VALUES
(112, 'chucvu', 'Chức vụ', 17, 'tenchucvu', 'Tên Chức vụ', 'Chức vụ ví dụ 3', 'Chức vụ ví dụ 7', 1, '2019-04-14 15:23:35'),
(113, 'chucvu', 'Chức vụ', 17, 'tenchucvu', 'Tên Chức vụ', 'Chức vụ ví dụ 3', 'Chức vụ ví dụ 7', 1, '2019-04-14 15:23:39'),
(114, 'chucvu', 'Chức vụ', 17, 'tenchucvu', 'Tên Chức vụ', 'Chức vụ ví dụ 3', 'Chức vụ ví dụ 7', 1, '2019-04-14 15:24:38'),
(115, 'chucvu', 'Chức vụ', 17, 'tenchucvu', 'Tên Chức vụ', 'Chức vụ ví dụ 7', 'Chức vụ ví dụ 3', 1, '2019-04-14 15:25:14'),
(116, 'chucvu', 'Chức vụ', 1, 'tenchucvu', 'Tên Chức vụ', 'Cán bộ quản lý Phòng', 'quản lý Phòng', 1, '2019-04-14 19:45:11'),
(117, 'lop', 'Lớp', 9, 'nam_BD', 'Năm bắt đầu', '2023', '2015', 1, '2019-04-14 21:27:34'),
(118, 'lop', 'Lớp', 9, 'ma_lop', 'Mã Lớp', 'ma2l33', 'MALVD1', 1, '2019-04-14 21:28:07');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `log_sua_dl`
--
ALTER TABLE `log_sua_dl`
  ADD PRIMARY KEY (`idlog`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `log_sua_dl`
--
ALTER TABLE `log_sua_dl`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

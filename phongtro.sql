SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Table structure for table `taikhoan`
--
CREATE TABLE `taikhoan` (
  `maTK` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sodienthoai` varchar(255) NOT NULL, 
  `matkhau` varchar(255) NOT NULL,
  `quyen` varchar(255) NOT NULL,
  `ngaytao` timestamp NULL DEFAULT NULL,
  `ngaycapnhat` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`maTK`, `ten`, `email`, `sodienthoai`, `matkhau`,`quyen`, `ngaytao`, `ngaycapnhat`) VALUES
(1, 'Hồ Thị Ái Thi', 'admin@gmail.com', '0949021749','$2y$10$tWRx.1Y9scFdVeYGVqlKy.ccgHYp53XPxetjGGJOKjG/PPWx48BQC','admin', '2024-12-01 09:16:01', '2024-12-01 09:18:03'),
(2, 'Lê Văn Thắng', '123@gmail.com', '0966948914','$2y$10$/bV8uKqEebTsb2iBpmxYpuCaj3pYIT1UZccJFlD1NfyjboV5JfYZq','chutro', '2024-12-01 10:16:01', '2024-12-01 10:18:03'),
(3, 'Nguyễn Văn A', '1234@gmail.com', '0858849600','$2y$10$/bV8uKqEebTsb2iBpmxYpuCaj3pYIT1UZccJFlD1NfyjboV5JfYZq','nguoithue', '2024-12-01 11:16:01', '2024-12-01 11:18:03');

-- --------------------------------------------------------

-- Table structure for table `quantrivien`
--
CREATE TABLE `quantrivien` (
  `maQTV` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,
  `maTK` bigint(20) UNSIGNED NOT NULL,
  `ngaytao` timestamp NULL DEFAULT NULL,
  `ngaycapnhat` timestamp NULL DEFAULT NULL,
  CONSTRAINT `fk_matk` FOREIGN KEY (`maTK`) REFERENCES `taikhoan` (`maTK`) 
  ON DELETE CASCADE ON UPDATE CASCADE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quantrivien`
--

INSERT INTO `quantrivien` (`maQTV`,`maTK`,`ngaytao`, `ngaycapnhat`) VALUES
(1, 1, '2024-12-01 09:16:01', '2024-12-01 09:18:03');

-- ------------------------------------------

-- Table structure for table `chutro`
--
CREATE TABLE `chutro` (
  `maCT` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,
  `maTK` bigint(20) UNSIGNED NOT NULL,
  `anhdaidien` varchar(255) DEFAULT NULL,
  `sodukhadung` bigint(20) NOT NULL DEFAULT 0,
  `cccd` varchar(255) NOT NULL,
  `anhstk` varchar(255) NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `ngaytao` timestamp NULL DEFAULT NULL,
  `ngaycapnhat` timestamp NULL DEFAULT NULL,
  CONSTRAINT `fk_ct_matk` FOREIGN KEY (`maTK`) REFERENCES `taikhoan` (`maTK`) 
  ON DELETE CASCADE ON UPDATE CASCADE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chutro`
--

INSERT INTO `chutro` (`maCT`,`maTK`, `anhdaidien`, `sodukhadung`, `cccd`, `anhstk`,`trangthai`, `ngaytao`, `ngaycapnhat`) VALUES
(1,2, NULL, 100000, '046301141156','2024-11-30__group-15-1.png',1 , '2024-12-01 09:16:01', '2024-12-01 09:18:03');

-- ------------------------------------------

-- Table structure for table `nguoithue`
--
CREATE TABLE `nguoithue` (
  `maNT` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,
  `maTK` bigint(20) UNSIGNED NOT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `anhdaidien` varchar(255) DEFAULT NULL,
  `ngaytao` timestamp NULL DEFAULT NULL,
  `ngaycapnhat` timestamp NULL DEFAULT NULL,
  CONSTRAINT `fk_nt_matk` FOREIGN KEY (`maTK`) REFERENCES `taikhoan` (`maTK`) 
  ON DELETE CASCADE ON UPDATE CASCADE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoithue`
--

INSERT INTO `nguoithue` (`maNT`,`maTK`, `diachi`, `ngaysinh`, `anhdaidien`,`ngaytao`, `ngaycapnhat`) VALUES
(1,3, NULL,'05-12-2002', NULL, '2024-12-01 09:16:01', '2024-12-01 09:18:03');

-- ------------------------------------------

-- Table structure for table `giaodich`
--

CREATE TABLE `giaodich` (
  `maGD` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,
  `maCT` bigint(20) UNSIGNED NOT NULL,
  `loai` tinyint(4) NOT NULL COMMENT 'phương thức',
  `sotien` int(11) NOT NULL DEFAULT 0,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `ngaytao` timestamp NULL DEFAULT NULL,
  `ngaycapnhat` timestamp NULL DEFAULT NULL,
   CONSTRAINT `fk_mact` FOREIGN KEY (`maCT`) REFERENCES `chutro` (`maCT`) 
   ON DELETE CASCADE ON UPDATE CASCADE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giaodich`
--

INSERT INTO `giaodich` (`maGD`,`maCT`, `loai`, `sotien`, `trangthai`,`ngaytao`, `ngaycapnhat`) VALUES
(1,1, 1,40000, 1, '2024-12-01 16:38:39', '2024-12-01 16:38:39');

-- ------------------------------------------

-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `maDM` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,
  `ten` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `mota` varchar(255) DEFAULT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `ngaytao` timestamp NULL DEFAULT NULL,
  `ngaycapnhat` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`maDM`, `ten`, `slug`, `mota`, `trangthai`, `ngaytao`, `ngaycapnhat`) VALUES
(1, 'Cho thuê phòng trọ', 'cho-thue-phong-tro', 'Cho thuê phòng trọ', 1, '2024-12-01 14:30:17', '2024-12-01 04:06:42'),
(2, 'Nhà cho thuê', 'nha-cho-thue', 'Nhà cho thuê', 1, '2024-12-01 14:30:48', '2024-12-01 04:06:38');

-- --------------------------------------------------------

-- Table structure for table `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `maQH` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,
  `ten` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `ngaytao` timestamp NULL DEFAULT NULL,
  `ngaycapnhat` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quanhuyen`
--

INSERT INTO `quanhuyen` (`maQH`, `ten`, `slug`,`ngaytao`, `ngaycapnhat`) VALUES
(1, 'Hải Châu', 'hai-chau','2024-12-01 07:09:08', '2024-12-01 17:44:13'),
(2, 'Sơn Trà', 'son-tra','2024-12-01 07:10:08', '2024-12-01 17:45:13'),
(3, 'Hòa Vang', 'hoa-vang','2024-12-01 07:13:08', '2024-12-01 17:48:13'),
(4, 'Ngũ Hành Sơn', 'ngu-hanh-son','2024-12-01 07:15:08', '2024-12-01 17:50:13'),
(5, 'Liên Chiểu', 'lien-chieu','2024-12-01 07:17:08', '2024-12-01 17:52:13'),
(6, 'Thanh Khê', 'thanh-khe','2024-12-01 07:20:08', '2024-12-01 17:53:13'),
(7, 'Cẩm Lệ', 'cam-le','2024-12-01 07:25:08', '2024-12-01 17:54:13'),
(8, 'Hoàng Sa', 'hoang-sa','2024-12-01 07:26:08', '2024-12-01 17:55:13');

-- ----------------------------------------

-- Table structure for table `phuongxa`
--

CREATE TABLE `phuongxa` (
  `maPX` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,
  `maQH` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `ngaytao` timestamp NULL DEFAULT NULL,
  `ngaycapnhat` timestamp NULL DEFAULT NULL,
   CONSTRAINT `fk_maqh` FOREIGN KEY (`maQH`) REFERENCES `quanhuyen` (`maQH`) 
   ON DELETE CASCADE ON UPDATE CASCADE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Dumping data for table `phuongxa`
--

INSERT INTO `phuongxa` (`maPX`,`maQH`, `ten`, `slug`,`ngaytao`, `ngaycapnhat`) VALUES
(1,1, 'Hòa Cường Bắc', 'hoa-cuong-bac','2024-12-01 07:10:08', '2024-12-01 17:44:15'),
(2,1, 'Thanh Bình', 'thanh-binh','2024-12-01 07:11:08', '2024-12-01 17:44:18'),
(3,1, 'Thuận Phước', 'thuan-phuoc','2024-12-01 07:12:08', '2024-12-01 17:44:10'),
(4,1, 'Phước Ninh', 'phuoc-ninh','2024-12-01 07:13:08', '2024-12-01 17:44:25'),
(5,1, 'Thạch Thang', 'thach-thang','2024-12-01 07:14:08', '2024-12-01 17:44:16'),
(6,1, 'Hải Châu I', 'hai-chau-i','2024-12-01 07:15:08', '2024-12-01 17:44:30'),
(7,1, 'Hải Châu II', 'hai-chau-ii','2024-12-01 07:16:08', '2024-12-01 17:44:35'),
(8,1, 'Hòa Thuận Tây', 'hoa-thuan-tay','2024-12-01 07:17:08', '2024-12-01 17:44:40'),
(9,1, 'Hòa Thuận Đông', 'hoa-thuan-dong','2024-12-01 07:18:08', '2024-12-01 17:44:17'),
(10,1, 'Nam Dương', 'nam-duong','2024-12-01 07:19:08', '2024-12-01 17:44:52'),
(11,1, 'Bình Hiên', 'binh-hien','2024-12-01 07:20:08', '2024-12-01 17:44:58'),
(12,1, 'Bình Thuận', 'binh-thuan','2024-12-01 07:21:08', '2024-12-01 17:44:26'),
(13,1, 'Hòa Cường Nam', 'hoa-cuong-nam','2024-12-01 07:22:08', '2024-12-01 17:44:28'),
(14,2, 'Nại Hiên Đông', 'nai-hien-dong','2024-12-01 07:20:08', '2024-12-01 17:46:13'),
(15,2, 'Mân Thái', 'man-thai', '2024-12-01 07:21:08', '2024-12-01 17:47:13'),
(16,2, 'An Hải Bắc', 'an-hai-bac','2024-12-01 07:22:08', '2024-12-01 17:48:13'),
(17,3, 'Hòa Bắc', 'hoa-bac','2024-12-01 07:18:08', '2024-12-01 17:41:13'),
(18,4, 'Hoà Quý', 'hoa-quy','2024-12-01 08:15:08', '2024-12-01 18:50:13'),
(19,5, 'Hòa Hiệp Bắc', 'hoa-hiep-bac','2024-12-01 08:17:08', '2024-12-01 17:45:13'),
(20,5, 'Hòa Hiệp Nam', 'hoa-hiep-nam','2024-12-01 08:18:08', '2024-12-01 17:46:13'),
(21,5, 'Hòa Khánh Bắc', 'hoa-khanh-bac','2024-12-01 07:18:08', '2024-12-01 17:47:13'),
(22,5, 'Hòa Khánh Nam', 'hoa-khanh-nam','2024-12-01 07:19:08', '2024-12-01 17:48:13'),
(23,5, 'Hòa Minh', 'hoa-minh','2024-12-01 07:20:08', '2024-12-01 17:49:13'),
(24,6, 'Tam Thuận', 'tam-thuan','2024-12-01 07:21:08', '2024-12-01 17:29:13'),
(25,6, 'Thanh Khê Tây', 'thanh-khe-tay','2024-12-01 07:22:08', '2024-12-01 17:30:13'),
(26,6, 'Thanh Khê Đông', 'thanh-khe-dong','2024-12-01 07:23:08', '2024-12-01 17:31:13'),
(27,6, 'Xuân Hà', 'xuan-ha','2024-12-01 07:24:08', '2024-12-01 17:32:13'),
(28,6, 'Tân Chính', 'tan-chinh','2024-12-01 07:25:08', '2024-12-01 17:33:13'),
(29,6, 'Chính Gián', 'chinh-gian','2024-12-01 07:26:08', '2024-12-01 17:34:13'),
(30,6, 'Thạc Gián', 'thac-gian','2024-12-01 07:27:08', '2024-12-01 17:35:13'),
(31,6, 'Vĩnh Trung', 'vinh-trung','2024-12-01 07:28:08', '2024-12-01 17:36:13'),
(32,6, 'An Khê', 'an-khe', '2024-12-01 07:29:08', '2024-12-01 17:38:13'),
(33,6, 'Hòa Khê', 'hoa-khe','2024-12-01 07:30:08', '2024-12-01 17:39:13'),
(34,7, 'Cẩm Lệ', 'cam-le','2024-12-01 07:15:08', '2024-12-01 17:48:13'),
(35,8, 'Hoàng Sa', 'hoang-sa','2024-12-01 07:36:08', '2024-12-01 17:49:13');

-- ----------------------------------------


-- Table structure for table `baidang`
--

CREATE TABLE `baidang` (
  `maBD` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,
  `ten` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `mota` text DEFAULT NULL COMMENT 'tieude',
  `maPX` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `gia` bigint(20) NOT NULL DEFAULT 0,
  `khoanggia` tinyint(4) NOT NULL DEFAULT 1,
  `khoangkhuvuc` tinyint(4) NOT NULL DEFAULT 1,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `soluong` int DEFAULT NULL,
  `chitietdiachi` varchar(255) DEFAULT NULL,
  `maDM` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `thoigian_batdau` date DEFAULT NULL,
  `thoigian_ketthuc` date DEFAULT NULL,
  `maCT` bigint(20) UNSIGNED NOT NULL  DEFAULT 0,
  `map` text DEFAULT NULL,
  `ngaytao` timestamp NULL DEFAULT NULL,
  `ngaycapnhat` timestamp NULL DEFAULT NULL,
   CONSTRAINT `fk_mapx` FOREIGN KEY (`maPX`) REFERENCES `phuongxa` (`maPX`) 
   ON DELETE CASCADE ON UPDATE CASCADE,
   CONSTRAINT `fk_madm` FOREIGN KEY (`maDM`) REFERENCES `danhmuc` (`maDM`) 
   ON DELETE CASCADE ON UPDATE CASCADE,
   CONSTRAINT `fk_bd_mact` FOREIGN KEY (`maCT`) REFERENCES `chutro` (`maCT`) 
   ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Dumping data for table `baidang`
--

INSERT INTO `baidang` (`maBD`, `ten`, `slug`, `mota`,`maPX`, `gia`, `khoanggia`, `khoangkhuvuc`, `trangthai`,`soluong`, `chitietdiachi`, `maDM`, `thoigian_batdau`, `thoigian_ketthuc`, `maCT`, `map`,`ngaytao`, `ngaycapnhat`) VALUES
(1, 'Phòng trọ đường Hải Sơn quận Hải Châu Đà Nẵng', 'phong-tro-duong-hai-son-quan-hai-chau-da-nang', '<ol><li>Phòng trọ đường Hải Sơn quận Hải Châu Đà Nẵng</li><li>Gần trung tâm thành phố Đà Nẵng</li><li>Gần chợ Đống Đa và các gần các siêu thị và khu mua sắm</li><li>Thuận tiện cho việc đi lại làm việc và đi học</li><li>Gần các trường đại sư phạm Đà Nẵng, trường đại học Duy Tân, trường Ông Ích Khiêm..vv.</li></ol>', 2, 1000000, 2, 1, 3,1, '48 Cao Thắng, Thanh Bình, Hải Châu', 1, '2024-11-11', '2024-12-11', 1, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.7650506977734!2d108.20948967500492!3d16.07767738460294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421847b8d7ec71%3A0x7591c4b0240f6bc2!2zNDggQ2FvIFRo4bqvbmcsIFRoYW5oIELDrG5oLCBI4bqjaSBDaMOidSwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1686426498823!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>','2024-12-01 19:49:00', '2024-12-01 01:02:30');


-- --------------------------------------------------------


-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `maDG` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,
  `maBD` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `maNT` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `sosao` int NOT NULL,
  `ngaytao` timestamp NULL DEFAULT NULL,
  `ngaycapnhat` timestamp NULL DEFAULT NULL,
   CONSTRAINT `fk_mabd` FOREIGN KEY (`maBD`) REFERENCES `baidang` (`maBD`) 
   ON DELETE CASCADE ON UPDATE CASCADE,
   CONSTRAINT `fk_mant` FOREIGN KEY (`maNT`) REFERENCES `nguoithue` (`maNT`) 
   ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`maDG`,`maBD`, `maNT`, `sosao`,`ngaytao`, `ngaycapnhat`) VALUES
(1,1,1,3,'2024-12-01 19:50:00', '2024-12-01 20:44:15');


-- -------------------------------
-- Table structure for table `hinhanh`
--

CREATE TABLE `hinhanh` (
  `maHA` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,
  `maBD` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `ten` varchar(255) DEFAULT NULL,
  `duongdan` varchar(255) DEFAULT NULL,
  `ngaytao` timestamp NULL DEFAULT NULL,
  `ngaycapnhat` timestamp NULL DEFAULT NULL,
   CONSTRAINT `fk_ha_mabd` FOREIGN KEY (`maBD`) REFERENCES `baidang` (`maBD`) 
   ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hinhanh`
--

INSERT INTO `hinhanh` (`maHA`,`maBD`, `ten`, `duongdan`,  `ngaytao`, `ngaycapnhat`) VALUES
(1,1,'book-store.jpg', '2023-04-09__book-storejpg.jpg','2024-04-09 12:14:36', NULL),
(2,1,'book-store.jpg', '2023-04-11__book-storejpg.jpg','2024-04-11 04:32:55', NULL);

-- -----------------------------------------

-- Table structure for table `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `maTT` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,
  `maCT` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `loai` tinyint(4) NOT NULL DEFAULT 1,
  `maBD` bigint(20) NOT NULL DEFAULT 0, 
  `sotien` int(11) NOT NULL DEFAULT 0,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `ngaytao` timestamp NULL DEFAULT NULL,
  `ngaycapnhat` timestamp NULL DEFAULT NULL,
   CONSTRAINT `fk_tt_mact` FOREIGN KEY (`maCT`) REFERENCES `chutro` (`maCT`) 
   ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thanhtoan`
--
INSERT INTO `thanhtoan` (`maTT`, `maCT`, `loai`, `maBD`,`sotien`, `trangthai`, `ngaytao`, `ngaycapnhat`) VALUES
(1, 1, 3, 1, 600000, 2, '2024-12-01 16:39:32', '2024-12-01 16:39:32'),
(2, 1, 2, 1, 100000, 2, '2024-12-01 16:42:10', '2024-12-01 16:42:10'),
(3, 1, 3, 1, 600000, 2, '2024-12-01 16:48:54', '2024-12-01 16:48:55');

-- ------------------------------------------

-- Table structure for table `donthuephong`
--

CREATE TABLE `donthuephong` (
  `maDTP` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,
  `maBD` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `maNT` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `anhtt` varchar(255) NOT NULL ,
  `ngaythue` date DEFAULT NULL,
  `ngaytra` date DEFAULT NULL,
  `ngaytao` timestamp NULL DEFAULT NULL,
  `ngaycapnhat` timestamp NULL DEFAULT NULL,
   CONSTRAINT `fk_dtp_mabd` FOREIGN KEY (`maBD`) REFERENCES `baidang` (`maBD`) 
   ON DELETE CASCADE ON UPDATE CASCADE,
   CONSTRAINT `fk_dtp_mant` FOREIGN KEY (`maNT`) REFERENCES `nguoithue` (`maNT`) 
   ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donthuephong`
--
INSERT INTO `donthuephong` (`maDTP`, `maBD`, `maNT`, `anhtt`,`ngaythue`, `ngaytra`, `ngaytao`, `ngaycapnhat`) VALUES
(1, 1, 1,'2023-04-09__book-storejpg.jpg','2024-12-01 16:39:32', NULL, '2024-12-01 16:40:32', '2024-12-01 16:41:32');


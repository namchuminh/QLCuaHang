-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 04:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `banan`
--

CREATE TABLE `banan` (
  `MaBanAn` int(11) NOT NULL,
  `SucChua` int(11) NOT NULL,
  `ViTri` text NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cauhinh`
--

CREATE TABLE `cauhinh` (
  `SoDienThoai` varchar(11) NOT NULL,
  `MaQR` text NOT NULL,
  `GioMoCua` datetime NOT NULL,
  `GioDongCua` datetime NOT NULL,
  `DiaChiQuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaChiTietHoaDon` int(11) NOT NULL,
  `MaHoaDon` int(11) NOT NULL,
  `MaMonAn` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` int(11) NOT NULL,
  `MaBanAn` int(11) NOT NULL,
  `MaNhanVien` int(11) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `ThanhToan` int(11) NOT NULL,
  `ThoiGian` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lichsunhap`
--

CREATE TABLE `lichsunhap` (
  `MaLichSuNhap` int(11) NOT NULL,
  `MaNhanVien` int(11) NOT NULL,
  `MaNhaCungCap` int(11) NOT NULL,
  `MaMonAn` int(11) NOT NULL,
  `SoLuongCu` int(11) NOT NULL,
  `SoLuongMoi` int(11) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lichsunhap`
--

INSERT INTO `lichsunhap` (`MaLichSuNhap`, `MaNhanVien`, `MaNhaCungCap`, `MaMonAn`, `SoLuongCu`, `SoLuongMoi`, `TongTien`, `ThoiGian`) VALUES
(1, 1, 1, 3, 10, 5, 50000, '2024-02-22 00:00:00'),
(2, 1, 1, 3, 15, 5, 50000, '2024-02-22 22:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `loaimonan`
--

CREATE TABLE `loaimonan` (
  `MaLoaiMonAn` int(11) NOT NULL,
  `HinhAnh` text NOT NULL,
  `TenLoaiMonAn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaimonan`
--

INSERT INTO `loaimonan` (`MaLoaiMonAn`, `HinhAnh`, `TenLoaiMonAn`) VALUES
(1, 'https://cdn.tgdd.vn/Files/2020/12/16/1314124/thuc-an-nhanh-la-gi-an-thuc-an-nhanh-co-tot-hay-khong-202012161146206471.jpg', 'Đồ Ăn Nhanh'),
(2, 'https://imagescdn.pystravel.vn/uploads/posts/avatar/1581920545.jpg', 'Nước Uống');

-- --------------------------------------------------------

--
-- Table structure for table `monan`
--

CREATE TABLE `monan` (
  `MaMonAn` int(11) NOT NULL,
  `TenMon` varchar(255) NOT NULL,
  `MoTa` text NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL DEFAULT 1,
  `MaLoaiMonAn` int(11) NOT NULL,
  `HinhAnh` text NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monan`
--

INSERT INTO `monan` (`MaMonAn`, `TenMon`, `MoTa`, `GiaBan`, `SoLuong`, `MaLoaiMonAn`, `HinhAnh`, `TrangThai`) VALUES
(3, 'Trà Sữa Trân Trâu', '<p>abcde</p>', 15000, 20, 2, 'http://localhost/QLCuaHang/uploads/15819205452.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ncc_loaimonan`
--

CREATE TABLE `ncc_loaimonan` (
  `MaLoaiMonAn` int(11) NOT NULL,
  `MaNhaCungCap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNhaCungCap` int(11) NOT NULL,
  `TenNhaCungCap` text NOT NULL,
  `MoTa` text NOT NULL,
  `NgayHopTac` datetime NOT NULL DEFAULT current_timestamp(),
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNhaCungCap`, `TenNhaCungCap`, `MoTa`, `NgayHopTac`, `TrangThai`) VALUES
(1, 'Nhà cung cấp Hoa Ban', 'Cung cấp sản phẩm thịt khô, thịt sấy gác bếp', '2024-02-22 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(11) NOT NULL,
  `TenNhanVien` varchar(255) NOT NULL,
  `HinhAnh` text NOT NULL,
  `TaiKhoan` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `SoDienThoai` varchar(255) NOT NULL,
  `QueQuan` text NOT NULL,
  `PhanQuyen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `TenNhanVien`, `HinhAnh`, `TaiKhoan`, `MatKhau`, `SoDienThoai`, `QueQuan`, `PhanQuyen`) VALUES
(1, 'Nguyễn Văn An', 'https://thespiritofsaigon.net/wp-content/uploads/2022/10/avatar-vo-danh-1.jpg', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0999888999', '', 1),
(2, 'Nguyễn Văn Bình', 'https://imagescdn.pystravel.vn/uploads/posts/avatar/1581920545.jpg', 'admin123', '21232f297a57a5a743894a0e4a801fc3', '0999888999', 'Hà Nội', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banan`
--
ALTER TABLE `banan`
  ADD PRIMARY KEY (`MaBanAn`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaChiTietHoaDon`),
  ADD KEY `MaHoaDon` (`MaHoaDon`,`MaMonAn`),
  ADD KEY `MaMonAn` (`MaMonAn`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHoaDon`),
  ADD KEY `MaBanAn` (`MaBanAn`,`MaNhanVien`),
  ADD KEY `MaNhanVien` (`MaNhanVien`);

--
-- Indexes for table `lichsunhap`
--
ALTER TABLE `lichsunhap`
  ADD PRIMARY KEY (`MaLichSuNhap`),
  ADD KEY `MaNhanVien` (`MaNhanVien`,`MaNhaCungCap`,`MaMonAn`),
  ADD KEY `MaNhaCungCap` (`MaNhaCungCap`),
  ADD KEY `MaMonAn` (`MaMonAn`);

--
-- Indexes for table `loaimonan`
--
ALTER TABLE `loaimonan`
  ADD PRIMARY KEY (`MaLoaiMonAn`);

--
-- Indexes for table `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`MaMonAn`),
  ADD KEY `MaLoaiMonAn` (`MaLoaiMonAn`);

--
-- Indexes for table `ncc_loaimonan`
--
ALTER TABLE `ncc_loaimonan`
  ADD PRIMARY KEY (`MaLoaiMonAn`,`MaNhaCungCap`),
  ADD KEY `MaNhaCungCap` (`MaNhaCungCap`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNhaCungCap`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banan`
--
ALTER TABLE `banan`
  MODIFY `MaBanAn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `MaChiTietHoaDon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lichsunhap`
--
ALTER TABLE `lichsunhap`
  MODIFY `MaLichSuNhap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loaimonan`
--
ALTER TABLE `loaimonan`
  MODIFY `MaLoaiMonAn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `monan`
--
ALTER TABLE `monan`
  MODIFY `MaMonAn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNhaCungCap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MaHoaDon`) REFERENCES `hoadon` (`MaHoaDon`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MaMonAn`) REFERENCES `monan` (`MaMonAn`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaBanAn`) REFERENCES `banan` (`MaBanAn`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `lichsunhap`
--
ALTER TABLE `lichsunhap`
  ADD CONSTRAINT `lichsunhap_ibfk_1` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lichsunhap_ibfk_2` FOREIGN KEY (`MaNhaCungCap`) REFERENCES `nhacungcap` (`MaNhaCungCap`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `lichsunhap_ibfk_3` FOREIGN KEY (`MaMonAn`) REFERENCES `monan` (`MaMonAn`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `monan_ibfk_1` FOREIGN KEY (`MaLoaiMonAn`) REFERENCES `loaimonan` (`MaLoaiMonAn`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ncc_loaimonan`
--
ALTER TABLE `ncc_loaimonan`
  ADD CONSTRAINT `ncc_loaimonan_ibfk_1` FOREIGN KEY (`MaLoaiMonAn`) REFERENCES `loaimonan` (`MaLoaiMonAn`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `ncc_loaimonan_ibfk_2` FOREIGN KEY (`MaNhaCungCap`) REFERENCES `nhacungcap` (`MaNhaCungCap`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
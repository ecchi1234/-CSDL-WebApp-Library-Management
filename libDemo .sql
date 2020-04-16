-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 16, 2020 lúc 04:02 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lib`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `action`
--

CREATE TABLE `action` (
  `actionCode` varchar(10) NOT NULL,
  `cardNumber` int(10) NOT NULL,
  `librarianCode` varchar(10) NOT NULL,
  `bookCode` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dateBorrow` datetime NOT NULL,
  `dateBack` datetime DEFAULT NULL,
  `timeToExpired` int(11) NOT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `action`
--

INSERT INTO `action` (`actionCode`, `cardNumber`, `librarianCode`, `bookCode`, `quantity`, `dateBorrow`, `dateBack`, `timeToExpired`, `status`) VALUES
('LIB10001', 18020013, '1000', '10000', 1, '2020-01-15 00:00:00', '0000-00-00 00:00:00', 180, NULL),
('LIB10002', 18020065, '1000', '10007', 1, '2020-01-20 00:00:00', NULL, 180, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authors`
--

CREATE TABLE `authors` (
  `authorCode` varchar(10) NOT NULL,
  `authorName` varchar(50) NOT NULL,
  `website` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `authors`
--

INSERT INTO `authors` (`authorCode`, `authorName`, `website`) VALUES
('10000', 'Đoàn Giỏi', NULL),
('10001', 'Hà Mã', NULL),
('10002', 'Lý Lan', NULL),
('10003', 'Cố Phi Ngư', NULL),
('10004', 'Luis Sepulveda', NULL),
('10005', 'Không rõ tác giả', NULL),
('10006', 'Nhiều tác giả', NULL),
('10008', 'Tetsuya Chiba', NULL),
('10009', ' Kosaku Anakubo', NULL),
('10010', 'TS. Đỗ Đức Hồng Hà', NULL),
('10011', 'Tô Hoài', NULL),
('10012', 'Arthur Conan Doyle', NULL),
('10013', 'Paul Halter', NULL),
('10014', 'Vũ Trọng Phụng', NULL),
('10015', 'Nguyên Hồng', NULL),
('10016', 'Ngô Tất Tố', NULL),
('10017', 'Mark Twain', NULL),
('10018', 'Vũ Thị Tuyết', NULL),
('10019', 'TS. Đỗ Tiến Quân', NULL),
('10020', 'PGS.TS. Chử Đức Trình', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `bookCode` varchar(10) NOT NULL,
  `bookName` varchar(100) NOT NULL,
  `bookImage` text NOT NULL,
  `authorCode` varchar(10) DEFAULT NULL,
  `styleCode` varchar(10) DEFAULT NULL,
  `publisherCode` varchar(10) DEFAULT NULL,
  `publishYear` year(4) DEFAULT NULL,
  `depotCode` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`bookCode`, `bookName`, `bookImage`, `authorCode`, `styleCode`, `publisherCode`, `publishYear`, `depotCode`, `quantity`) VALUES
('10000', 'Đất rừng phương nam', 'https://www.nxbkimdong.com.vn/sites/default/files/dat-rung-phuong-nam.jpg', '10000', '108', '1000', 2020, 'F', 30),
('10001', 'Ngôi nhà trong cỏ', 'https://www.nxbkimdong.com.vn/sites/default/files/ngoi-nha-trong-co.jpg', '10002', '115', '1000', 2020, 'G', 30),
('10002', 'Mật mã Tây Tạng ', 'https://salt.tikicdn.com/cache/w1200/media/catalog/product/i/m/images_9_1.jpg', '10001', '100', '4000', 2014, 'A', 20),
('10003', 'Tử thư Tây Hạ', 'https://www.vinabook.com/images/thumbnails/product/240x/46086_52629.jpg', '10003', '100', '1001', 2013, 'A', 20),
('10004', 'Chuyện con mèo dạy con hải âu bay', 'https://salt.tikicdn.com/cache/w1200/ts/product/a9/e4/f9/9a0900b2352c6d7a608e003146ccda7e.jpg', '10004', '115', '1001', 2019, 'G', 20),
('10005', 'Lòng Tin & Vốn Xã Hội', 'https://salt.tikicdn.com/ts/bookpreview/72/ef/536227/files/OEBPS/Images/img043.gif', '10006', '102', '2000', 2016, 'D', 10),
('10006', 'Siêu Quậy Teppei Tập 30', 'https://www.nxbkimdong.com.vn/sites/default/files/30_16.jpg', '10008', '101', '1000', 2020, 'G', 10),
('10007', 'Pokémon - Cuộc Phiêu Lưu Của Pippi Tập 10', 'https://www.nxbkimdong.com.vn/sites/default/files/10_61.jpg', '10009', '101', '1000', 2020, 'G', 10),
('10008', 'Chỉ Dẫn Tra Cứu, Áp Dụng Bộ Luật Hình Sự Năm 2015 ', 'https://salt.tikicdn.com/cache/w1200/ts/product/b2/b1/63/c4b071bcd3fc4b304d971c02ad61087d.jpg', '10010', '106', '1002', 2018, 'B', 15),
('10009', 'Trách Nhiệm Hinh Sự Đối Với Các Tội Xâm Phạm Trật Tự Quản Lý Hành Chính', 'https://salt.tikicdn.com/cache/w1200/ts/product/88/29/c8/c925fa0f49b45088a4d49a2394637377.jpg', '10010', '106', '1002', 2018, 'B', 15),
('10010', 'Luật Kế Toán (Hiện Hành)', 'https://salt.tikicdn.com/cache/w1200/ts/product/e0/c2/67/73ca5b7deb8811d6a47c7774c5d8d843.jpg', '10006', '106', '1003', 2019, 'B', 15),
('10011', 'Bộ Luật Dân Sự (Hiện Hành)', 'https://salt.tikicdn.com/cache/w1200/ts/product/2c/23/c4/b6133c25fdb9bc71c286ff4f3475e06b.jpg', '10006', '106', '1003', 2019, 'B', 15),
('10012', 'Luật Kinh Doanh Bất Động Sản (Hiện Hành)', 'https://salt.tikicdn.com/cache/w1200/ts/product/76/eb/43/70df7b9596bd466d2733e8e584cc1e6c.jpg', '10006', '106', '1003', 2019, 'B', 15),
('10013', 'Luật Hôn Nhân Và Gia Đình (Hiện Hành)', 'https://salt.tikicdn.com/cache/w1200/ts/product/46/0d/fc/ed70ab33e9f1571c8ad17212972116c5.jpg', '10006', '106', '1003', 2019, 'B', 15),
('10014', 'Luật Ngân Sách Nhà Nước (Hiện Hành)', 'https://salt.tikicdn.com/cache/w1200/ts/product/b8/17/05/4db31de06436e38efc6eb4e826ccddf3.jpg', '10006', '106', '1003', 2019, 'B', 15),
('10015', 'Luật Bảo Vệ Môi Trường (Hiện Hành) ', 'https://salt.tikicdn.com/cache/w1200/ts/product/d0/3a/73/39cd4b3036cdb04ec3d95c010b4e84e6.jpg', '10006', '106', '1003', 2019, 'B', 15),
('10016', 'Luật Chứng Khoán (Hiện Hành) (Sửa Đổi, Bổ Sung Năm 2010, 2018)', 'https://salt.tikicdn.com/cache/w1200/ts/product/ab/f8/73/54b13ae5d24e9ee90b8628ddb1e293a6.jpg', '10006', '106', '1003', 2019, 'B', 15),
('10017', 'Luật Trọng Tài Thương Mại', 'https://salt.tikicdn.com/cache/w1200/ts/product/0f/5e/e5/186c2685bfec5bf36dcbf84b62d1c505.jpg', '10006', '106', '1003', 2019, 'B', 15),
('10018', 'Dế Mèn Phiêu Lưu Ký', 'https://www.nxbkimdong.com.vn/sites/default/files/de-men-phieu-luu-ky-_13x19_bia_tb2019-1.jpg', '10011', '101', '1000', 2019, 'G', 30),
('10019', 'Những Vụ Kỳ Án Của Sherlock Holmes (Tái Bản 2015)', 'https://salt.tikicdn.com/ts/bookpreview/7f/dc/438454/files/OEBPS/Images/img968.gif', '10012', '100', '1004', 2015, 'A', 20),
('10020', 'Giả Thuyết Thứ 7', 'https://salt.tikicdn.com/ts/bookpreview/4a/4c/470064/files/OEBPS/Images/img484.gif', '10013', '100', '4000', 2016, 'A', 20),
('10021', 'Cánh Cửa Thứ 4', 'https://salt.tikicdn.com/ts/bookpreview/1b/87/470059/files/OEBPS/Images/img171.gif', '10013', '100', '4000', 2016, 'A', 20),
('10022', 'Số Đỏ (Tái Bản 2015)', 'https://salt.tikicdn.com/ts/bookpreview/ef/bc/447357/files/OEBPS/Images/img679.gif', '10014', '108', '1004', 2015, 'F', 15),
('10023', 'Bỉ Vỏ', 'https://salt.tikicdn.com/cache/w1200/ts/product/5c/59/f6/06925ad292ad415d62bc595391c2c09f.jpg', '10015', '108', '1004', 2019, 'F', 20),
('10024', 'Tắt Đèn (Tái Bản)', 'https://salt.tikicdn.com/cache/w1200/ts/product/e1/aa/84/730c73abfd8e7b4999b8a4f9aaeaafbb.jpg', '10016', '108', '1004', 2018, 'F', 15),
('10025', 'Những Cuộc Phiêu Lưu Của Tom Sawyer', 'https://salt.tikicdn.com/ts/bookpreview/11/d3/512972/files/OEBPS/Images/img232.gif', '10017', '108', '1004', 2016, 'F', 20),
('10026', 'Giáo Trình Marketing Căn Bản', 'https://i1.wp.com/press.vnu.edu.vn/wp-content/uploads/2020/03/marketingcanban.jpg?zoom=1.25&fit=1226%2C1573', '10018', '103', '3000', 2020, 'C', 20),
('10027', 'Giáo Trình Đọc Hiểu Tiếng Trung Quốc V', 'https://i2.wp.com/press.vnu.edu.vn/wp-content/uploads/2020/02/dochieu.jpg?zoom=1.25&fit=1291%2C1656', '10019', '105', '3000', 2019, 'E', 20),
('10028', 'Ôn Luyện Thi THPT Quốc Gia Năm 2020 Môn Toán', 'https://salt.tikicdn.com/cache/w1200/ts/product/17/a5/2f/9e2864d9f3bb99e54a4a992b9c39eebd.jpg', '10006', '116', '3000', 2020, 'H', 15),
('10029', 'Giáo Trình Kỹ Thuật Điện', 'https://i0.wp.com/press.vnu.edu.vn/wp-content/uploads/2019/07/giaotrinhkythuatdien.jpg?zoom=1.25&fit=1291%2C1656', '10020', '113', '3000', 2016, 'I', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `card`
--

CREATE TABLE `card` (
  `cardNumber` int(10) NOT NULL,
  `createdDay` date NOT NULL,
  `expiredDay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `card`
--

INSERT INTO `card` (`cardNumber`, `createdDay`, `expiredDay`) VALUES
(18020013, '2019-10-03', '2023-10-03'),
(18020041, '2019-09-18', '2023-09-18'),
(18020063, '2019-02-05', '2023-02-05'),
(18020065, '2019-12-24', '2023-12-24'),
(18020074, '2019-09-22', '2023-09-22'),
(18020109, '2019-01-10', '2023-01-10'),
(18020117, '2019-11-17', '2023-11-17'),
(18020125, '2019-07-22', '2023-07-22'),
(18020127, '2019-12-20', '2023-12-20'),
(18020136, '2019-07-15', '2023-07-15'),
(18020140, '2019-12-08', '2023-12-08'),
(18020146, '2019-11-22', '2023-11-22'),
(18020151, '2019-04-30', '2023-04-30'),
(18020155, '2019-03-02', '2023-03-02'),
(18020160, '2019-01-15', '2023-01-15'),
(18020161, '2019-07-03', '2023-07-03'),
(18020177, '2019-11-06', '2023-11-06'),
(18020182, '2019-01-31', '2023-01-31'),
(18020190, '2019-04-02', '2023-04-02'),
(18020196, '2019-09-02', '2023-09-02'),
(18020198, '2019-10-18', '2023-10-18'),
(18020199, '2019-05-07', '2023-05-07'),
(18020202, '2019-06-05', '2023-06-05'),
(18020210, '2019-10-19', '2023-10-19'),
(18020219, '2019-07-18', '2023-07-18'),
(18020223, '2019-08-09', '2023-08-09'),
(18020225, '2019-09-28', '2023-09-28'),
(18020229, '2019-03-03', '2023-03-03'),
(18020258, '2019-08-13', '2023-08-13'),
(18020262, '2019-09-02', '2023-09-02'),
(18020264, '2019-09-28', '2023-09-28'),
(18020267, '2019-07-16', '2023-07-16'),
(18020273, '2019-03-11', '2023-03-11'),
(18020277, '2019-12-02', '2023-12-02'),
(18020281, '2019-10-19', '2023-10-19'),
(18020287, '2019-05-18', '2023-05-18'),
(18020305, '2019-07-16', '2023-07-16'),
(18020324, '2019-05-01', '2023-05-01'),
(18020327, '2019-01-15', '2023-01-15'),
(18020336, '2019-11-19', '2023-11-19'),
(18020339, '2019-09-11', '2023-09-11'),
(18020344, '2019-04-12', '2023-04-12'),
(18020348, '2019-09-17', '2023-09-17'),
(18020356, '2019-05-18', '2023-05-18'),
(18020365, '2019-12-29', '2023-12-29'),
(18020367, '2019-07-09', '2023-07-09'),
(18020375, '2019-12-17', '2023-12-17'),
(18020387, '2019-12-27', '2023-12-27'),
(18020401, '2019-04-27', '2023-04-27'),
(18020405, '2019-07-09', '2023-07-09'),
(18020412, '2019-12-24', '2023-12-24'),
(18020417, '2019-10-02', '2023-10-02'),
(18020431, '2019-07-10', '2023-07-10'),
(18020436, '2019-05-17', '2023-05-17'),
(18020442, '2019-07-28', '2023-07-28'),
(18020451, '2019-10-06', '2023-10-06'),
(18020453, '2019-11-17', '2023-11-17'),
(18020459, '2019-12-11', '2023-12-11'),
(18020460, '2019-08-16', '2023-08-16'),
(18020475, '2019-10-04', '2023-10-04'),
(18020492, '2019-08-24', '2023-08-24'),
(18020501, '2019-10-23', '2023-10-23'),
(18020503, '2019-09-23', '2023-09-23'),
(18020522, '2019-07-29', '2023-07-29'),
(18020538, '2019-09-24', '2023-09-24'),
(18020548, '2019-01-18', '2023-01-18'),
(18020552, '2019-09-02', '2023-09-02'),
(18020559, '2019-01-26', '2023-01-26'),
(18020561, '2019-07-23', '2023-07-23'),
(18020583, '2019-02-13', '2023-02-13'),
(18020584, '2019-07-11', '2023-07-11'),
(18020591, '2019-04-16', '2023-04-16'),
(18020602, '2019-09-09', '2023-09-09'),
(18020605, '2019-05-20', '2023-05-20'),
(18020606, '2019-11-20', '2023-11-20'),
(18020608, '2019-01-16', '2023-01-16'),
(18020609, '2019-04-07', '2023-04-07'),
(18020615, '2019-02-02', '2023-02-02'),
(18020618, '2019-04-22', '2023-04-22'),
(18020619, '2019-09-07', '2023-09-07'),
(18020626, '2019-11-25', '2023-11-25'),
(18020628, '2019-09-29', '2023-09-29'),
(18020639, '2019-03-28', '2023-03-28'),
(18020644, '2019-11-26', '2023-11-26'),
(18020647, '2019-02-21', '2023-02-21'),
(18020651, '2019-10-11', '2023-10-11'),
(18020659, '2019-01-01', '2023-01-01'),
(18020663, '2019-03-12', '2023-03-12'),
(18020675, '2019-02-28', '2023-02-28'),
(18020688, '2019-12-28', '2023-12-28'),
(18020690, '2019-09-03', '2023-09-03'),
(18020706, '2019-11-16', '2023-11-16'),
(18020719, '2019-08-23', '2023-08-23'),
(18020731, '2019-07-18', '2023-07-18'),
(18020735, '2019-09-04', '2023-09-04'),
(18020743, '2019-11-08', '2023-11-08'),
(18020744, '2019-05-19', '2023-05-19'),
(18020757, '2019-11-28', '2023-11-28'),
(18020774, '2019-04-15', '2023-04-15'),
(18020775, '2019-07-25', '2023-07-25'),
(18020791, '2019-12-20', '2023-12-20'),
(18020820, '2019-05-16', '2023-05-16'),
(18020829, '2019-06-10', '2023-06-10'),
(18020830, '2019-11-16', '2023-11-16'),
(18020837, '2019-03-03', '2023-03-03'),
(18020844, '2019-04-02', '2023-04-02'),
(18020847, '2019-05-27', '2023-05-27'),
(18020849, '2019-09-30', '2023-09-30'),
(18020855, '2019-02-18', '2023-02-18'),
(18020856, '2019-02-10', '2023-02-10'),
(18020875, '2019-06-04', '2023-06-04'),
(18020881, '2019-07-11', '2023-07-11'),
(18020885, '2019-08-24', '2023-08-24'),
(18020894, '2019-02-18', '2023-02-18'),
(18020895, '2019-10-30', '2023-10-30'),
(18020903, '2019-01-04', '2023-01-04'),
(18020916, '2019-08-11', '2023-08-11'),
(18020920, '2019-08-19', '2023-08-19'),
(18020933, '2019-05-10', '2023-05-10'),
(18020934, '2019-10-26', '2023-10-26'),
(18020939, '2019-12-07', '2023-12-07'),
(18020941, '2019-01-28', '2023-01-28'),
(18020974, '2019-12-28', '2023-12-28'),
(18020979, '2019-06-01', '2023-06-01'),
(18020984, '2019-04-06', '2023-04-06'),
(18020987, '2019-11-17', '2023-11-17'),
(18020988, '2019-11-09', '2023-11-09'),
(18020998, '2019-12-16', '2023-12-16'),
(18021007, '2019-06-02', '2023-06-02'),
(18021039, '2019-04-20', '2023-04-20'),
(18021054, '1999-12-04', '2003-12-04'),
(18021055, '2019-04-11', '2023-04-11'),
(18021059, '2019-05-09', '2023-05-09'),
(18021065, '2019-12-10', '2023-12-10'),
(18021072, '2019-05-04', '2023-05-04'),
(18021079, '2019-06-15', '2023-06-15'),
(18021082, '2019-12-23', '2023-12-23'),
(18021084, '2019-10-14', '2023-10-14'),
(18021086, '2019-03-31', '2023-03-31'),
(18021087, '2019-09-18', '2023-09-18'),
(18021089, '2019-08-16', '2023-08-16'),
(18021096, '2019-10-25', '2023-10-25'),
(18021098, '2019-02-13', '2023-02-13'),
(18021101, '2019-01-22', '2023-01-22'),
(18021118, '2019-03-20', '2023-03-20'),
(18021122, '2019-12-17', '2023-12-17'),
(18021133, '2019-09-04', '2023-09-04'),
(18021137, '2019-12-11', '2023-12-11'),
(18021148, '2019-08-04', '2023-08-04'),
(18021155, '2019-05-30', '2023-05-30'),
(18021157, '2019-10-07', '2023-10-07'),
(18021165, '2019-06-03', '2023-06-03'),
(18021169, '2019-11-13', '2023-11-13'),
(18021188, '2019-03-16', '2023-03-16'),
(18021190, '2019-01-15', '2023-01-15'),
(18021195, '2019-01-04', '2023-01-04'),
(18021209, '2019-08-17', '2023-08-17'),
(18021212, '2019-07-08', '2023-07-08'),
(18021217, '2019-08-01', '2023-08-01'),
(18021225, '2019-08-08', '2023-08-08'),
(18021240, '2019-08-18', '2023-08-18'),
(18021243, '2019-09-01', '2023-09-01'),
(18021244, '2019-05-20', '2023-05-20'),
(18021245, '2019-01-21', '2023-01-21'),
(18021247, '2019-07-27', '2023-07-27'),
(18021249, '2019-06-19', '2023-06-19'),
(18021251, '2019-10-08', '2023-10-08'),
(18021260, '2019-02-16', '2023-02-16'),
(18021265, '2019-01-14', '2023-01-14'),
(18021269, '2019-03-24', '2023-03-24'),
(18021273, '2019-02-06', '2023-02-06'),
(18021274, '1999-05-11', '2003-05-11'),
(18021276, '2019-10-07', '2023-10-07'),
(18021277, '2019-06-20', '2023-06-20'),
(18021279, '2019-10-01', '2023-10-01'),
(18021285, '2019-06-01', '2023-06-01'),
(18021291, '2019-09-17', '2023-09-17'),
(18021294, '2019-01-06', '2023-01-06'),
(18021316, '2019-12-21', '2023-12-21'),
(18021321, '2019-12-13', '2023-12-13'),
(18021325, '2019-09-22', '2023-09-22'),
(18021339, '2019-08-02', '2023-08-02'),
(18021342, '2019-09-27', '2023-09-27'),
(18021349, '2019-09-09', '2023-09-09'),
(18021359, '2019-10-01', '2023-10-01'),
(18021367, '2019-02-21', '2023-02-21'),
(18021368, '2019-09-09', '2023-09-09'),
(18021369, '2019-03-04', '2023-03-04'),
(18021392, '2019-10-25', '2023-10-25'),
(18021397, '2019-05-03', '2023-05-03'),
(18021398, '2019-05-29', '2023-05-29'),
(18021409, '2019-01-15', '2023-01-15'),
(18021412, '2019-12-21', '2023-12-21'),
(18021414, '2019-07-29', '2023-07-29'),
(18021416, '2019-06-24', '2023-06-24'),
(18021422, '2019-04-05', '2023-04-05'),
(18021440, '2019-06-16', '2023-06-16'),
(18021444, '2019-06-11', '2023-06-11'),
(18021447, '2019-03-26', '2023-03-26'),
(18021451, '2019-02-05', '2023-02-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `depot`
--

CREATE TABLE `depot` (
  `depotCode` varchar(10) NOT NULL,
  `depotName` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `depot`
--

INSERT INTO `depot` (`depotCode`, `depotName`, `quantity`) VALUES
('A', 'Truyện Trinh thám', 100),
('B', 'Luật pháp', 150),
('C', 'Kinh tế học', 20),
('D', 'Lịch sử-Văn hóa-Chính trị', 10),
('E', 'Ngoại ngữ', 20),
('F', 'Tiểu thuyết', 100),
('G', 'Truyện', 100),
('H', 'Sách tham khảo', 15),
('I', 'Giáo trình', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `librarian`
--

CREATE TABLE `librarian` (
  `librarianCode` varchar(10) NOT NULL,
  `librarianName` varchar(50) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `gender` varchar(5) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `librarian`
--

INSERT INTO `librarian` (`librarianCode`, `librarianName`, `dateOfBirth`, `gender`, `phoneNumber`, `address`) VALUES
('1000', 'Trần Như Quỳnh', '1986-06-10', 'Nữ', '0176226319', 'Hà Nội'),
('1001', 'Trần Đức Anh', '1980-01-28', 'Nam', '0164385628', 'Nghệ An'),
('1002', 'Vũ Duy Ánh', '1980-02-05', 'Nam', '0164385658', 'Nam Định'),
('1003', 'Nguyễn Phương Bắc', '1980-01-18', 'Nữ', '0164385618', 'Bắc Giang'),
('1004', 'Nguyễn Thành Công', '1980-09-24', 'Nam', '0164385624', 'Bắc Ninh'),
('1005', 'Vũ Tiến Dũng', '1980-07-01', 'Nam', '0164385615', 'Hà Nội'),
('1006', 'Phạm Văn Duy', '1980-08-27', 'Nam', '0164385627', 'Hải Dương'),
('1007', 'Trần Quang Đạt', '1980-08-12', 'Nam', '0164385612', 'Hà Tây'),
('1008', 'Nguyễn Tuấn Đức', '1980-09-17', 'Nam', '0164385617', 'Hưng Yên'),
('1009', 'Nguyễn Văn Đức', '1980-10-14', 'Nam', '0164385614', 'Bắc Giang'),
('1010', 'Nguyễn Văn Hà', '1980-03-08', 'Nam', '0164385684', 'Nghệ An'),
('1011', 'Trương Ngọc Hải', '1980-05-02', 'Nam', '0164385622', 'Hà Nam'),
('1012', 'Nguyễn Văn Hiệu', '1999-10-19', 'Nam', '0164385619', 'Bắc Giang'),
('1013', 'Trịnh Minh Hoàng', '1980-01-02', 'Nam', '0164385627', 'Hà Nội'),
('1014', 'Trần Công Mạnh Hùng', '1980-01-22', 'Nam', '0164385622', 'Nghệ An'),
('1015', 'Lê Đình Huy', '1999-09-11', 'Nam', '0164385611', 'Thanh Hóa'),
('1016', 'Trần Đăng Huy', '1980-10-29', 'Nam', '0164385629', 'Hà Nam'),
('1017', 'Đàm Tuấn Khanh', '1980-08-18', 'Nam', '0164385618', 'Hà Nội'),
('1018', 'Nguyễn Đức Khánh', '1980-06-02', 'Nữ', '0164385628', 'Hưng Yên'),
('1019', 'Chu Đình Khởi', '1980-04-02', 'Nam', '0164385629', 'Hải Dương'),
('1020', 'Lê Ngọc Linh', '1980-09-19', 'Nữ', '0164385619', 'Vĩnh Phúc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `publisher`
--

CREATE TABLE `publisher` (
  `publisherCode` varchar(10) NOT NULL,
  `publisherName` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `publisher`
--

INSERT INTO `publisher` (`publisherCode`, `publisherName`, `address`, `email`, `phoneNumber`) VALUES
('1000', 'Kim Đồng', '16, Hàng Chuối, P. Phạm Đình Hổ, Q. Hai Bà Trưng, Hà Nội', 'info@nxbkimdong.com.vn', '01762263198'),
('1001', 'NXB Văn Hóa Thông Tin', '43 Lò Đúc, Q. Hai Bà Trưng,Hà Nội', NULL, ' 0243942068'),
('1002', 'Nhà Xuất Bản Công An Nhân Dân', '92 Nguyễn Du, Quận Hai Bà Trưng, Tp Hà Nội', NULL, '0692342969'),
('1003', 'NHÀ XUẤT BẢN CHÍNH TRỊ QUỐC GIA SỰ THẬT', 'Số 6/86 Duy Tân - Cầu Giấy - Hà Nội; Số 24 Quang Trung - Hoàn Kiếm - Hà Nội', 'suthat@nxbctqg.vn', '02438221633'),
('1004', 'Nhà Xuất Bản Văn Học', '18 Nguyễn Trường Tộ - Ba Đình - Hà Nội', 'info@nxbvanhoc.com.vn', '02437161518'),
('2000', 'Tri Thức', '59 Đỗ Quang, phường Trung Hoà, quận Cầu Giấy, Hà Nội', 'lienhe@nxbtrithuc.com.vn', '04656728664'),
('3000', 'Nhà Xuất bản Đại học Quốc gia Hà Nội', '55 Quang Trung, Nguyễn Du, Hai Bà Trưng, Hà Nội.', 'nxb@vnu.edu.vn', '01684839478'),
('4000', 'Nhà Xuất Bản Hội Nhà Văn', 'Số 65 Nguyễn Du, Quận Hai Bà Trưng, thành phố Hà Nội', 'nxbhoinhavan65@gmail.com', '024 382 221');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reader`
--

CREATE TABLE `reader` (
  `readerName` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `cardNumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `reader`
--

INSERT INTO `reader` (`readerName`, `address`, `phoneNumber`, `gender`, `dateOfBirth`, `cardNumber`) VALUES
('Đinh Việt Anh', 'Nam Định', '0705422625', 'Nam', '2000-06-05', 18020002),
('Phạm Việt Dũng', 'Hải Dương', '0705422640', 'Nam', '2000-10-03', 18020013),
('Đào Công Minh', 'Hải Dương', '0705422601', 'Nam', '2000-09-18', 18020041),
('Nguyễn Hoàng Việt', 'Hà Nội', '0705422695', 'Nam', '2000-02-05', 18020063),
('Nguyễn Quang Vinh', 'Bắc Ninh', '0705422696', 'Nam', '2000-12-24', 18020065),
('Nguyễn Duy Kiên', 'Hà Nội', '0705422661', 'Nam', '2000-09-22', 18020074),
('Nguyễn Trường An', 'Hải Dương', '0705422509', 'Nam', '2000-01-10', 18020109),
('Lại Tuấn Anh', 'Hà Nội', '0705422627', 'Nam', '2000-11-17', 18020117),
('Hoàng Nghĩa Anh', 'Hà Nội', '0705422512', 'Nam', '2000-07-22', 18020125),
('Nguyễn Đức Anh', 'Hà Nội', '0705422628', 'Nam', '2000-12-20', 18020127),
('Đỗ Quang Anh', 'Hà Tây', '0705422626', 'Nam', '2000-07-15', 18020136),
('Nguyễn Tuấn Anh', 'Hải Phòng', '0705422630', 'Nam', '2000-12-08', 18020140),
('Nguyễn Tú Anh', 'Vĩnh Phúc', '0705422629', 'Nam', '2000-11-22', 18020146),
('Nguyễn Phúc Tiến Anh', 'Hải Dương', '0705422513', 'Nam', '2000-04-30', 18020151),
('Đỗ Quang Anh', 'Hưng Yên', '0705422567', 'Nam', '2000-03-02', 18020155),
('Đoàn Ngọc Anh', 'Nam Định', '0705422511', 'Nam', '2000-01-15', 18020160),
('Bùi Tuấn Anh', 'Nam Định', '0705422510', 'Nam', '2000-07-03', 18020161),
('Lê Thị Hồng Ánh', 'Hà Nội', '0705422514', 'Nữ', '2000-11-06', 18020177),
('Nguyễn Ngọc Ánh', 'Thái Bình', '0705422515', 'Nam', '2000-01-31', 18020182),
('Hoàng Đình Bách', 'Hải Phòng', '0705422568', 'Nam', '2000-04-02', 18020190),
('Nguyễn Hữu Bằng', 'Quảng Ninh', '0705422632', 'Nam', '2000-09-02', 18020196),
('Võ Lương Bằng', 'Nghệ An', '0705422633', 'Nam', '2000-10-18', 18020198),
('Đậu Hữu Bằng', 'Nghệ An', '0705422631', 'Nam', '2000-05-07', 18020199),
('Nguyễn Đình Biển', 'Hải Dương', '0705422634', 'Nam', '2000-10-19', 18020210),
('Đặng Đức Cảnh', 'Lào Cai', '0705422516', 'Nam', '2000-07-18', 18020219),
('Đỗ Văn Chí', 'Bắc Ninh', '0705422517', 'Nam', '2000-08-09', 18020223),
('Vũ Minh Chiến', 'Quảng Ninh', '0705422570', 'Nam', '2000-09-28', 18020225),
('Trần Thế Chiến', 'Hải Dương', '0705422569', 'Nam', '2000-03-03', 18020229),
('Nguyễn Việt Cường', 'Thái Bình', '0705422635', 'Nam', '2000-08-13', 18020258),
('Trần Quốc Cường', 'Hà Tĩnh', '0705422636', 'Nam', '2000-09-02', 18020262),
('Phạm Trọng Đại', 'Bắc Giang', '0705422643', 'Nam', '2000-09-28', 18020264),
('Phạm Thị Dân', 'Bắc Ninh', '0705422637', 'Nữ', '2000-07-16', 18020267),
('Lê Văn Đạo', 'Hà Nội', '0705422573', 'Nam', '2000-03-11', 18020273),
('Nguyễn Minh Đạt', 'Hà Nội', '0705422574', 'Nam', '2000-12-02', 18020277),
('Nguyễn Tiến Đạt', 'Hà Nội', '0705422645', 'Nam', '2000-10-19', 18020281),
('Nguyễn Tiến Đạt', 'Vĩnh Phúc', '0705422644', 'Nam', '2000-05-18', 18020287),
('Nguyễn Quang Dĩnh', 'Hà Tây', '0705422638', 'Nam', '2000-07-16', 18020305),
('Nguyễn Xuân Đức', 'Hà Nội', '0705422579', 'Nam', '2000-05-01', 18020324),
('Nguyễn Duy Đức', 'Hải Phòng', '0705422521', 'Nam', '2000-01-15', 18020327),
('Đào Minh Đức', 'Bắc Ninh', '0705422575', 'Nam', '2000-11-19', 18020336),
('Lê Huy Đức', 'Hưng Yên', '0705422576', 'Nam', '2000-09-11', 18020339),
('Nguyễn Ngọc Đức', 'Thái Bình', '0705422577', 'Nam', '2000-04-12', 18020344),
('Lê Năng Đức', 'Thanh Hóa', '0705422646', 'Nam', '2000-09-17', 18020348),
('Nguyễn Trung Đức', 'Hà Tĩnh', '0705422578', 'Nam', '2000-05-18', 18020356),
('Nguyễn Đức Dũng', 'Hà Nội', '0705422639', 'Nam', '2000-12-29', 18020365),
('Nguyễn Anh Dũng', 'Hải Phòng', '0705422518', 'Nam', '2000-07-09', 18020367),
('Bùi Trí Dũng', 'Hưng Yên', '0705422571', 'Nam', '2000-12-17', 18020375),
('Đào Hồng Dương', 'Hà Nội', '0705422520', 'Nam', '2000-12-27', 18020387),
('Bùi Công Dương', 'Thái Bình', '0705422572', 'Nam', '2000-04-27', 18020401),
('Phạm Văn Dương', 'Thanh Hóa', '0705422642', 'Nam', '2000-07-09', 18020405),
('Nguyễn Văn Duy', 'Hải Phòng', '0705422519', 'Nam', '2000-12-24', 18020412),
('Nguyễn Khắc Duy', 'Hải Dương', '0705422641', 'Nam', '2000-10-02', 18020417),
('Lê Quang Giang', 'Thanh Hóa', '0705422580', 'Nam', '2000-07-10', 18020431),
('Dương Thị Hà', 'Hòa Bình', '0705422581', 'Nữ', '2000-05-17', 18020436),
('Triệu Vũ Hải', 'Hà Tây', '0705422648', 'Nam', '2000-07-28', 18020442),
('Phạm Thanh Hải', 'Thái Bình', '0705422522', 'Nam', '2000-10-06', 18020451),
('Phạm Ngọc Hải', 'Lai Châu', '0705422647', 'Nam', '2000-11-17', 18020453),
('Ngô Văn Hào', 'Bắc Ninh', '0705422650', 'Nam', '2000-12-11', 18020459),
('Hoàng Dương Hào', 'Hưng Yên', '0705422649', 'Nam', '2000-08-16', 18020460),
('Trần Minh Hiệp', 'Quảng Ninh', '0705422583', 'Nam', '2000-10-04', 18020475),
('Nguyễn Minh Hiếu', 'Hà Nội', '0705422523', 'Nam', '2000-08-24', 18020492),
('Diêm Đăng Hiếu', 'Bắc Giang', '0705422582', 'Nam', '2000-10-23', 18020501),
('Phạm Văn Hiếu', 'Bắc Ninh', '0705422584', 'Nam', '2000-09-23', 18020503),
('Bùi Quang Hiệu', 'Thái Bình', '0705422524', 'Nam', '2000-07-29', 18020522),
('Phạm Văn Hoàn', 'Nam Định', '0705422651', 'Nam', '2000-09-24', 18020538),
('Nguyễn Thái Hoàng', 'Hà Nội', '0705422587', 'Nam', '2000-01-18', 18020548),
('Nguyễn Minh Hoàng', 'Hải Phòng', '0705422585', 'Nam', '2000-09-02', 18020552),
('Đặng Huy Hoàng', 'Quảng Ninh', '0705422525', 'Nam', '2000-01-26', 18020559),
('Nguyễn Ngọc Hoàng', 'Đồng Nai', '0705422586', 'Nam', '2000-07-23', 18020561),
('Nguyễn Mạnh Hùng', 'Hà Nội', '0705422652', 'Nam', '2000-02-13', 18020583),
('Phạm Thanh Hùng', 'Hà Nội', '0705422653', 'Nam', '2000-07-11', 18020584),
('Dương Văn Hùng', 'Bắc Giang', '0705422526', 'Nam', '2000-04-16', 18020591),
('Lê Văn Hùng', 'Thanh Hóa', '0705422527', 'Nam', '2000-09-09', 18020602),
('Nguyễn Việt Hưng', 'Hà Nội', '0705422531', 'Nam', '2000-05-20', 18020605),
('Nguyễn Việt Hưng', 'Hà Nội', '0705422590', 'Nam', '2000-11-20', 18020606),
('Vũ Đình Hưng', 'Hải Dương', '0705422591', 'Nam', '2000-01-16', 18020608),
('Lưu Bách Hưng', 'Hà Nội', '0705422530', 'Nam', '2000-04-07', 18020609),
('Ngô Mạnh Hưng', 'Bắc Giang', '0705422589', 'Nam', '2000-02-02', 18020615),
('Phạm Việt Hưng', 'Nam Định', '0705422532', 'Nam', '2000-04-22', 18020618),
('Trần Thanh Hương', 'Hà Nội', '0705422592', 'Nữ', '2000-09-07', 18020619),
('Nguyễn Chính Hữu', 'Hà Nội', '0705422658', 'Nam', '2000-11-25', 18020626),
('Ngô Quang Huy', 'Hà Nội', '0705422528', 'Nam', '2000-09-29', 18020628),
('Vũ Quang Huy', 'Hà Nội', '0705422529', 'Nam', '2000-03-28', 18020639),
('Nguyễn Hữu Huy', 'Bắc Ninh', '0705422655', 'Nam', '2000-11-26', 18020644),
('Lương Đức Huy', 'Hải Dương', '0705422588', 'Nam', '2000-02-21', 18020647),
('Nguyễn Văn Huy', 'Nam Định', '0705422656', 'Nam', '2000-10-11', 18020651),
('Lê Đức Huy', 'Nghệ An', '0705422654', 'Nam', '2000-01-01', 18020659),
('Tạ Thị Huyền', 'Hà Tây', '0705422657', 'Nữ', '2000-03-12', 18020663),
('Trần Trọng Nguyễn Khang', 'Hà Nội', '0705422659', 'Nam', '2000-02-28', 18020675),
('Nguyễn Ngọc Khánh', 'Hà Nội', '0705422660', 'Nam', '2000-12-28', 18020688),
('Đào Ngọc Khánh', 'Hà Nội', '0705422533', 'Nam', '2000-09-03', 18020690),
('Vũ Ngọc Khánh', 'Thanh Hoá', '0705422593', 'Nam', '2000-11-16', 18020706),
('Nguyễn Viết Huy Khôi', 'Hà Nội', '0705422534', 'Nam', '2000-08-23', 18020719),
('Nguyễn Trung Kiên', 'Hải Phòng', '0705422662', 'Nam', '2000-07-18', 18020731),
('Kiều Văn Kiên', 'Thanh Hóa', '0705422594', 'Nam', '2000-09-04', 18020735),
('Phạm Tùng Lâm', 'Hà Nội', '0705422596', 'Nam', '2000-11-08', 18020743),
('Phạm Tùng Lâm', 'Hải Dương', '0705422595', 'Nam', '2000-05-19', 18020744),
('Nguyễn Phương Liên', 'Hà Nội', '0705422597', 'Nữ', '2000-11-28', 18020757),
('Lê Đình Linh', 'Nghệ An', '0705422598', 'Nam', '2000-04-15', 18020774),
('Lê Thị Mỹ Linh', 'Nghệ An', '0705422535', 'Nữ', '2000-07-25', 18020775),
('Nguyễn Đức Long', 'Hà Nội', '0705422538', 'Nam', '2000-12-20', 18020791),
('Đại Đức Long', 'Vĩnh Phúc', '0705422536', 'Nam', '2000-05-16', 18020820),
('Trần Gia Long', 'Bắc Ninh', '0705422600', 'Nam', '2000-06-10', 18020829),
('Nguyễn Ngọc Long', 'Bắc Ninh', '0705422599', 'Nam', '2000-11-16', 18020830),
('Vũ Văn Long', 'Hải Dương', '0705422666', 'Nam', '2000-03-03', 18020837),
('Phạm Đào Hoàng Long', 'Nam Định', '0705422539', 'Nam', '2000-04-02', 18020844),
('Phạm Văn Long', 'Nam Định', '0705422664', 'Nam', '2000-05-27', 18020847),
('Đoàn Đức Long', 'Ninh Bình', '0705422537', 'Nam', '2000-09-30', 18020849),
('Nguyễn Hoàng Long', 'Nghệ An', '0705422663', 'Nam', '2000-02-18', 18020855),
('Trần Thanh Long', 'Nghệ An', '0705422665', 'Nam', '2000-02-10', 18020856),
('Nguyễn Đức Mạnh', 'Hà Nội', '0705422540', 'Nam', '2000-06-04', 18020875),
('Nguyễn Văn Mạnh', 'Bắc Giang', '0705422668', 'Nam', '2000-07-11', 18020881),
('Đặng Văn Mạnh', 'Thái Bình', '0705422667', 'Nam', '2000-08-24', 18020885),
('Nguyễn Ngọc Minh', 'Hà Nội', '0705422602', 'Nam', '2000-02-18', 18020894),
('Trần Quang Minh', 'Lào Cai', '0705422670', 'Nam', '2000-10-30', 18020895),
('Nguyễn Văn Minh', 'Bắc Ninh', '0705422603', 'Nam', '2000-01-04', 18020903),
('Phan Văn Minh', 'Hà Tĩnh', '0705422669', 'Nam', '2000-08-11', 18020916),
('Nguyễn Văn Nam', 'Hà Nội', '0705422672', 'Nam', '2000-08-19', 18020920),
('Nguyễn Vũ Giang Nam', 'Bắc Ninh', '0705422605', 'Nam', '2000-05-10', 18020933),
('Chu Văn Nam', 'Bắc Ninh', '0705422541', 'Nam', '2000-10-26', 18020934),
('Hoàng Minh Nam', 'Nam Định', '0705422604', 'Nam', '2000-12-07', 18020939),
('Đỗ Nam', 'Thanh Hóa', '0705422671', 'Nam', '2000-01-28', 18020941),
('Đỗ Văn Nhất', 'Hưng Yên', '0705422606', 'Nam', '2000-12-28', 18020974),
('Ngô Sách Nhật', 'Bắc Giang', '0705422673', 'Nam', '2000-06-01', 18020979),
('Trương Thị Cẩm Nhung', 'Hà Tĩnh', '0705422542', 'Nữ', '2000-04-06', 18020984),
('Vũ Oanh', 'Hải Dương', '0705422543', 'Nam', '2000-11-17', 18020987),
('Vũ Thị Oanh', 'Hải Dương', '0705422674', 'Nữ', '2000-11-09', 18020988),
('Hoàng Trung Phong', 'Hà Nội', '0705422675', 'Nam', '2000-12-16', 18020998),
('Nguyễn Thành Phúc', 'Hà Nội', '0705422607', 'Nam', '2000-06-02', 18021007),
('Hồ Đức Quân', 'Nghệ An', '0705422608', 'Nam', '2000-04-20', 18021039),
('Trần Văn Quang', 'Nghệ An', '0705422676', 'Nam', '1999-12-04', 18021054),
('Phan Đức Quang', 'Nghệ An', '0705422544', 'Nam', '2000-04-11', 18021055),
('Lê Vương Quốc', 'Hà Tĩnh', '0705422609', 'Nam', '2000-05-09', 18021059),
('Lê Minh Quyền', 'Hà Nội', '0705422545', 'Nam', '2000-12-10', 18021065),
('Lê Thanh Sang', 'Nghệ An', '0705422610', 'Nam', '2000-05-04', 18021072),
('Nguyễn Ngọc Sơn', 'Hà Tây', '0705422678', 'Nam', '2000-06-15', 18021079),
('Nguyễn Hồng Sơn', 'Thái Nguyên', '0705422612', 'Nam', '2000-12-23', 18021082),
('Lê Minh Sơn', 'Quảng Ninh', '0705422611', 'Nam', '2000-10-14', 18021084),
('Lương Thái Sơn', 'Bắc Giang', '0705422677', 'Nam', '2000-03-31', 18021086),
('Nguyễn Thanh Sơn', 'Bắc Giang', '0705422679', 'Nam', '2000-09-18', 18021087),
('Trịnh Lê Sơn', 'Bắc Ninh', '0705422680', 'Nam', '2000-08-16', 18021089),
('Ngô Thái Sơn', 'Nam Định', '0705422698', 'Nam', '2000-10-25', 18021096),
('Vũ Thái Sơn', 'Nam Định', '0705422699', 'Nam', '2000-02-13', 18021098),
('Vũ Mậu Sơn', 'Thái Bình', '0705422546', 'Nam', '2000-01-22', 18021101),
('Lê Thị Tâm', 'Thanh Hóa', '0705422681', 'Nữ', '2000-03-20', 18021118),
('Vũ Trọng Tấn', 'Hà Tây', '0705422700', 'Nam', '2000-12-17', 18021122),
('Đỗ Thị Thắm', 'Hải Phòng', '0705422702', 'Nữ', '2000-09-04', 18021133),
('Nguyễn Hoàng Thăng', 'Nghệ An', '0705422549', 'Nam', '2000-12-11', 18021137),
('Nguyễn Đức Thắng', 'Bắc Ninh', '0705422703', 'Nam', '2000-08-04', 18021148),
('Lê Tất Thắng', 'Nam Định', '0705422551', 'Nam', '2000-05-30', 18021155),
('Bùi Quang Việt Thắng', 'Thái Bình', '0705422550', 'Nam', '2000-10-07', 18021157),
('Nguyễn Kiến Thanh', 'Hải Phòng', '0705422613', 'Nam', '2000-06-03', 18021165),
('Phạm Tiến Thành', 'Hà Nội', '0705422701', 'Nam', '2000-11-13', 18021169),
('Vũ Đình Thành', 'Hải Dương', '0705422547', 'Nam', '2000-03-16', 18021188),
('Vũ Đức Thành', 'Hà Nam', '0705422548', 'Nam', '2000-01-15', 18021190),
('Trương Gia Bảo Thao', 'Thanh Hóa', '0705422682', 'Nam', '2000-01-04', 18021195),
('Trần Vũ Thiện', 'Hà Nội', '0705422552', 'Nam', '2000-08-17', 18021209),
('Nguyễn Văn Thiện', 'Bắc Ninh', '0705422704', 'Nam', '2000-07-08', 18021212),
('Trần Khắc Thiện', 'Nghệ An', '0705422683', 'Nam', '2000-08-01', 18021217),
('Phạm Thế Thịnh', 'Hà Nội', '0705422614', 'Nam', '2000-08-08', 18021225),
('Lưu Thị Hoài Thu', 'Bắc Giang', '0705422684', 'Nữ', '2000-08-18', 18021240),
('Đỗ Tiến Thu', 'Thanh Hoá', '0705422553', 'Nam', '2000-09-01', 18021243),
('Vũ Kim Thư', 'Lai Châu', '0705422616', 'Nữ', '2000-05-20', 18021244),
('Trịnh Thị Thư', 'Nam Định', '0705422685', 'Nữ', '2000-01-21', 18021245),
('Nguyễn Quang Thuấn', 'Nam Định', '0705422705', 'Nam', '2000-07-27', 18021247),
('Bùi Đức Thuần', 'Hưng Yên', '0705422555', 'Nam', '2000-06-19', 18021249),
('Chu Thế Thuận', 'Bắc Giang', '0705422554', 'Nam', '2000-10-08', 18021251),
('Nguyễn Ngọc Thúy', 'Nam Định', '0705422615', 'Nữ', '2000-02-16', 18021260),
('Lê Thị Thủy Tiên', 'Hải Phòng', '0705422706', 'Nữ', '2000-01-14', 18021265),
('Nguyễn Mạnh Tiến', 'Hà Giang', '0705422686', 'Nam', '2000-03-24', 18021269),
('Vũ Ngọc Tiến', 'Nam Định', '0705422687', 'Nam', '2000-02-06', 18021273),
('Nguyễn Hữu Tiến', 'Nghệ An', '0705422707', 'Nam', '1999-05-11', 18021274),
('Phan Đăng Tiệp', 'Bắc Ninh', '0705422708', 'Nam', '2000-10-07', 18021276),
('Nguyễn Thái Tiệp', 'Thái Bình', '0705422688', 'Nam', '2000-06-20', 18021277),
('Vương Thành Toàn', 'Nghệ An', '0705422689', 'Nam', '2000-10-01', 18021279),
('Trần Minh Toàn', 'Thái Bình', '0705422556', 'Nam', '2000-06-01', 18021285),
('Nguyễn Đình Tới', 'Hà Nội', '0705422557', 'Nam', '2000-09-17', 18021291),
('Nguyễn Ngọc Bảo Trân', 'Hà Tây', '0705422690', 'Nữ', '2000-01-06', 18021294),
('Nguyễn Bá Trung', 'Hà Nội', '0705422558', 'Nam', '2000-12-21', 18021316),
('Nguyễn Thành Trung', 'Hà Nội', '0705422559', 'Nam', '2000-12-13', 18021321),
('Nguyễn Đức Trung', 'Phú Thọ', '0705422617', 'Nam', '2000-09-22', 18021325),
('Trần Văn Trường', 'Bắc Giang', '0705422618', 'Nam', '2000-08-02', 18021339),
('Ngô Duy Trường', 'Nam Định', '0705422560', 'Nam', '2000-09-27', 18021342),
('Võ Hoàng Anh Tú', 'Hà Nội', '0705422561', 'Nam', '2000-09-09', 18021349),
('Phạm Ngọc Tuân', 'Thái Bình', '0705422691', 'Nam', '2000-10-01', 18021359),
('Đặng Văn Tuấn', 'Vĩnh Phúc', '0705422692', 'Nam', '2000-02-21', 18021367),
('Trần Minh Tuấn', 'Vĩnh Phúc', '0705422563', 'Nam', '2000-09-09', 18021368),
('Nguyễn Phúc Tuấn', 'Quảng Ninh', '0705422562', 'Nam', '2000-03-04', 18021369),
('Nguyễn Văn Tùng', 'Thái Nguyên', '0705422565', 'Nam', '2000-10-25', 18021392),
('Nguyễn Văn Tùng', 'Bắc Giang', '0705422619', 'Nam', '2000-05-03', 18021397),
('Dương Thanh Tùng', 'Bắc Giang', '0705422564', 'Nam', '2000-05-29', 18021398),
('Doãn Công Tuyến', 'Vĩnh Phúc', '0705422566', 'Nam', '2000-01-15', 18021409),
('Vũ Tố Uyên', 'Yên Bái', '0705422693', 'Nữ', '2000-12-21', 18021412),
('Đỗ Ngọc Thanh Vân', 'Yên Bái', '0705422694', 'Nữ', '2000-07-29', 18021414),
('Phạm Bá Văn', 'Hải Dương', '0705422620', 'Nam', '2000-06-24', 18021416),
('Vũ Quốc Việt', 'Nam Định', '0705422621', 'Nam', '2000-04-05', 18021422),
('Nguyễn Huy Vũ', 'Hà Nam', '0705422622', 'Nam', '2000-06-16', 18021440),
('Trần Trọng Vương', 'Bắc Ninh', '0705422623', 'Nam', '2000-06-11', 18021444),
('Viên Đức Vương', 'Hà Tĩnh', '0705422624', 'Nam', '2000-03-26', 18021447),
('Nguyễn Thị Xuân', 'Bắc Giang', '0705422697', 'Nữ', '2000-02-05', 18021451);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `style`
--

CREATE TABLE `style` (
  `styleCode` varchar(10) NOT NULL,
  `styleName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `style`
--

INSERT INTO `style` (`styleCode`, `styleName`) VALUES
('100', 'Trinh thám'),
('101', 'Truyện tranh'),
('102', 'Sách Triết học'),
('103', 'Sách Kinh tế'),
('104', 'Sách Công nghệ'),
('105', 'Sách Ngoại ngữ'),
('106', 'Sách Pháp luật'),
('107', 'Sách Y học'),
('108', 'Tiểu thuyết'),
('109', 'Cổ tích'),
('110', 'Kinh dị'),
('111', 'Phiêu lưu'),
('112', 'Sách Lịch sử'),
('113', 'Sách Vật lý'),
('114', 'Truyện tiếu lâm'),
('115', 'Truyện ngắn'),
('116', 'Sách Toán');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `action`
--
ALTER TABLE `action`
  ADD KEY `action_ibfk_1` (`cardNumber`),
  ADD KEY `reader_ibfk_2` (`librarianCode`),
  ADD KEY `reader_ibfk_3` (`bookCode`);

--
-- Chỉ mục cho bảng `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorCode`);

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookCode`),
  ADD KEY `books_ibfk_1` (`authorCode`),
  ADD KEY `books_ibfk_2` (`styleCode`),
  ADD KEY `books_ibfk_3` (`publisherCode`),
  ADD KEY `books_ibfk_4` (`depotCode`);

--
-- Chỉ mục cho bảng `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cardNumber`);

--
-- Chỉ mục cho bảng `depot`
--
ALTER TABLE `depot`
  ADD PRIMARY KEY (`depotCode`);

--
-- Chỉ mục cho bảng `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`librarianCode`);

--
-- Chỉ mục cho bảng `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisherCode`);

--
-- Chỉ mục cho bảng `reader`
--
ALTER TABLE `reader`
  ADD PRIMARY KEY (`cardNumber`),
  ADD KEY `reader_ibfk_1` (`cardNumber`);

--
-- Chỉ mục cho bảng `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`styleCode`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `reader`
--
ALTER TABLE `reader`
  MODIFY `cardNumber` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18021452;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`cardNumber`) REFERENCES `card` (`cardNumber`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reader_ibfk_2` FOREIGN KEY (`librarianCode`) REFERENCES `librarian` (`librarianCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reader_ibfk_3` FOREIGN KEY (`bookCode`) REFERENCES `books` (`bookCode`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`authorCode`) REFERENCES `authors` (`authorCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`styleCode`) REFERENCES `style` (`styleCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`publisherCode`) REFERENCES `publisher` (`publisherCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_4` FOREIGN KEY (`depotCode`) REFERENCES `depot` (`depotCode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

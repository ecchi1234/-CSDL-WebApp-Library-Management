-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 10:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lib`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `actionCode` varchar(10) NOT NULL,
  `cardNumber` int(10) NOT NULL,
  `librarianCode` varchar(10) NOT NULL,
  `bookCode` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dateBorrow` date NOT NULL,
  `dateBack` date DEFAULT NULL,
  `timeToExpired` int(11) NOT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`actionCode`, `cardNumber`, `librarianCode`, `bookCode`, `quantity`, `dateBorrow`, `dateBack`, `timeToExpired`, `status`) VALUES
('LIB10001', 18020013, '1000', '10000', 1, '2020-01-15', '0000-00-00', 180, NULL),
('LIB10002', 18020065, '1000', '10007', 1, '2020-01-20', NULL, 180, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `authorCode` varchar(10) NOT NULL,
  `authorName` varchar(50) NOT NULL,
  `website` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`authorCode`, `authorName`, `website`) VALUES
('10000', 'Đoàn Giỏi', NULL),
('10001', 'Hà Mã', NULL),
('10002', 'Lý Lan', NULL),
('10003', 'Cornell Woolrich', NULL),
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
('10018', ' TS. Nguyễn Văn Hùng (Chủ biên)', NULL),
('10019', 'Việt Hà', NULL),
('10020', 'ThS.Lê Văn Vinh', NULL),
('10021', 'GS Phạm Văn Ất', NULL),
('10022', 'YAGINUMA KENICHI', NULL),
('10023', ' PGS. TS. Hoàng Nghĩa Tý', NULL),
('10024', 'TS Phạm Huy Hoàng', NULL),
('10025', 'Nguyễn Quang Sáng', NULL),
('10026', 'Phạm Quang Huy', NULL),
('10027', 'Phạm Đình Sùng', NULL),
('10028', 'TS.Phạm Quốc Trung', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books`
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
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookCode`, `bookName`, `bookImage`, `authorCode`, `styleCode`, `publisherCode`, `publishYear`, `depotCode`, `quantity`) VALUES
('10000', 'Đất rừng phương nam', 'https://cdn0.fahasa.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/d/a/dat-rung-phuong-nam.jpg', '10000', '108', '1000', 2020, 'F', 20),
('10001', 'Ngôi nhà trong cỏ', 'https://salt.tikicdn.com/cache/w1200/ts/product/43/46/ab/fb1b95282f91cef4046c8483437490af.jpg', '10002', '115', '1000', 2020, 'G', 30),
('10002', 'Mật mã Tây Tạng ', 'https://salt.tikicdn.com/cache/550x550/media/catalog/product/i/m/images_9_1.jpg', '10001', '100', '1008', 2014, 'A', 20),
('10003', 'Người đàn bà trong đêm ', 'https://salt.tikicdn.com/cache/w1200/ts/product/57/0a/04/6f8100ba096c4d817b69b1768601ef24.jpg', '10003', '100', '1004', 2019, 'A', 20),
('10004', 'Chuyện con mèo dạy con hải âu bay', 'https://salt.tikicdn.com/cache/w1200/ts/product/a9/e4/f9/9a0900b2352c6d7a608e003146ccda7e.jpg', '10004', '115', '1001', 2019, 'G', 20),
('10005', 'Lòng Tin & Vốn Xã Hội', 'data:image/jpeg;base64,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', '10006', '102', '1006', 2016, 'D', 10),
('10006', 'Siêu Quậy Teppei Tập 30', 'https://salt.tikicdn.com/cache/w1200/ts/product/4d/e0/ab/850de8feca6e08c3ef95f26e1144d680.jpg', '10008', '101', '1000', 2020, 'G', 10),
('10007', 'Pokémon - Cuộc Phiêu Lưu Của Pippi Tập 10', 'https://salt.tikicdn.com/cache/w1200/ts/product/f7/5d/a6/09bb0d3b42096e1b10de9e70a40273b6.jpg', '10009', '101', '1000', 2020, 'G', 10),
('10008', 'Chỉ Dẫn Tra Cứu, Áp Dụng Bộ Luật Hình Sự Năm 2015 ', 'https://salt.tikicdn.com/cache/w1200/ts/product/b2/b1/63/c4b071bcd3fc4b304d971c02ad61087d.jpg', '10010', '106', '1002', 2018, 'B', 25),
('10009', 'Trách Nhiệm Hinh Sự Đối Với Các Tội Xâm Phạm Trật Tự Quản Lý Hành Chính', 'https://salt.tikicdn.com/cache/w1200/ts/product/88/29/c8/c925fa0f49b45088a4d49a2394637377.jpg', '10010', '106', '1002', 2018, 'B', 25),
('10010', 'Luật Kế Toán (Hiện Hành)', 'https://salt.tikicdn.com/cache/w1200/ts/product/e0/c2/67/73ca5b7deb8811d6a47c7774c5d8d843.jpg', '10006', '106', '1003', 2019, 'B', 25),
('10011', 'Bộ Luật Dân Sự (Hiện Hành)', 'https://salt.tikicdn.com/cache/w1200/ts/product/2c/23/c4/b6133c25fdb9bc71c286ff4f3475e06b.jpg', '10006', '106', '1003', 2019, 'B', 25),
('10012', 'Luật Kinh Doanh Bất Động Sản (Hiện Hành)', 'https://salt.tikicdn.com/cache/w1200/ts/product/76/eb/43/70df7b9596bd466d2733e8e584cc1e6c.jpg', '10006', '106', '1003', 2019, 'B', 25),
('10013', 'Luật Hôn Nhân Và Gia Đình (Hiện Hành)', 'https://salt.tikicdn.com/cache/w1200/ts/product/46/0d/fc/ed70ab33e9f1571c8ad17212972116c5.jpg', '10006', '106', '1003', 2019, 'B', 25),
('10014', 'Luật Ngân Sách Nhà Nước (Hiện Hành)', 'https://salt.tikicdn.com/cache/w1200/ts/product/b8/17/05/4db31de06436e38efc6eb4e826ccddf3.jpg', '10006', '106', '1003', 2019, 'B', 25),
('10015', 'Luật Bảo Vệ Môi Trường (Hiện Hành) ', 'https://salt.tikicdn.com/cache/w1200/ts/product/d0/3a/73/39cd4b3036cdb04ec3d95c010b4e84e6.jpg', '10006', '106', '1003', 2019, 'B', 25),
('10016', 'Luật Chứng Khoán (Hiện Hành) (Sửa Đổi, Bổ Sung Năm 2010, 2018)', 'https://salt.tikicdn.com/cache/w1200/ts/product/ab/f8/73/54b13ae5d24e9ee90b8628ddb1e293a6.jpg', '10006', '106', '1003', 2019, 'B', 25),
('10017', 'Luật Trọng Tài Thương Mại', 'https://salt.tikicdn.com/cache/w1200/ts/product/0f/5e/e5/186c2685bfec5bf36dcbf84b62d1c505.jpg', '10006', '106', '1003', 2019, 'B', 25),
('10018', 'Dế Mèn Phiêu Lưu Ký', 'https://salt.tikicdn.com/cache/w1200/ts/product/f6/2a/ae/336cb89bfe1dfefcaea03be376cea7d8.jpg', '10011', '101', '1000', 2019, 'G', 30),
('10019', 'Những Vụ Kỳ Án Của Sherlock Holmes (Tái Bản 2015)', 'https://salt.tikicdn.com/cache/550x550/media/catalog/product/i/m/img930_2.jpg', '10012', '100', '1004', 2015, 'A', 20),
('10020', 'Giả Thuyết Thứ 7', 'https://cdn0.fahasa.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/8/9/8935250724005.jpg', '10013', '100', '1008', 2016, 'A', 20),
('10021', 'Cánh Cửa Thứ 4', 'https://salt.tikicdn.com/cache/550x550/ts/product/ba/a8/e9/fcd18df93a3aeca4cbc5b72a8555d708.jpg', '10013', '100', '1008', 2016, 'A', 20),
('10022', 'Số Đỏ (Tái Bản 2018)', 'https://salt.tikicdn.com/cache/550x550/ts/product/88/94/43/86b9c04df00462fd3806e7d59a059f09.jpg', '10014', '108', '1004', 2018, 'F', 15),
('10023', 'Bỉ Vỏ', 'https://salt.tikicdn.com/cache/w1200/ts/product/5c/59/f6/06925ad292ad415d62bc595391c2c09f.jpg', '10015', '108', '1004', 2019, 'F', 20),
('10024', 'Tắt Đèn (Tái Bản)', 'https://salt.tikicdn.com/cache/w1200/ts/product/e1/aa/84/730c73abfd8e7b4999b8a4f9aaeaafbb.jpg', '10016', '108', '1004', 2018, 'F', 15),
('10025', 'Những Cuộc Phiêu Lưu Của Tom Sawyer', 'https://cdn0.fahasa.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/i/m/image_195509_1_9325.jpg', '10017', '108', '1004', 2019, 'F', 20),
('10026', 'Giáo Trình Marketing Căn Bản', 'http://cdn-img-v1.webbnc.net/upload/web/51/510151/product/2015/01/23/10/35/142198415535.jpg_resize400x400.jpg', '10018', '103', '1005', 2013, 'C', 20),
('10027', 'Ngữ Pháp Tiếng Nhật', 'https://cdn0.fahasa.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/i/m/image_194300.jpg', '10019', '105', '1009', 2016, 'E', 20),
('10028', 'Ôn Luyện Thi THPT Quốc Gia Năm 2020 Môn Toán', 'https://salt.tikicdn.com/cache/w1200/ts/product/17/a5/2f/9e2864d9f3bb99e54a4a992b9c39eebd.jpg', '10006', '116', '1007', 2020, 'H', 15),
('10029', 'Bí Quyết Chinh Phục Kì Thi THPT Quốc Gia 2 Trong 1 Chuyên Đề Vật Lí (Tập 1)', 'https://salt.tikicdn.com/cache/550x550/media/catalog/product/6/8/680613534239.u335.d20160408.t133124.jpg', '10020', '113', '1007', 2016, 'H', 15),
('10030', 'Giáo Trình C++ Và Lập Trình Hướng Đối Tượng', 'https://salt.tikicdn.com/cache/w1200/ts/product/d6/0e/09/7c48a0e134d985f72b84f63727d6a09d.jpg', '10021', '104', '1011', 2018, 'I', 25),
('10031', ' NHÀ HÀNG KHÔNG BAO GIỜ NÓI KHÔNG', 'https://product.hstatic.net/1000237375/product/nha-hang-720x720_81d4482e88b140e3ab3524fc69abd43a_master.png', '10022', '117', '1010', 2019, 'G', 10),
('10032', 'Giáo Trình Lập Trình Cơ Sở', 'https://salt.tikicdn.com/cache/w1200/ts/product/b1/8b/d6/19c7825df74d9206317241a33ae80ffc.jpg', '10006', '104', '1012', 2019, 'I', 30),
('10033', 'Giáo Trình Kỹ Thuật Lập Trình C Căn Bản Và Nâng Cao', 'https://salt.tikicdn.com/cache/w1200/ts/product/f4/4f/ec/c8d7c174cbca49acb9b8ef31cb690557.jpg', '10006', '104', '1011', 2018, 'I', 30),
('10034', 'Cấu Trúc Dữ Liệu Và Thuật Toán', 'https://salt.tikicdn.com/cache/w1200/ts/product/54/64/fc/8ff1d1fe73b530200985b46699c4308a.jpg', '10023', '104', '1011', 2014, 'I', 30),
('10035', 'Thiết kế mạng Intranet', 'https://salt.tikicdn.com/cache/w1200/ts/product/0d/17/4e/807855939515d34b3fba8a7cf3b6e1a2.jpg', '10024', '104', '1011', 2017, 'H', 20),
('10036', 'Dòng Sông Thơ Ấu', 'https://salt.tikicdn.com/cache/550x550/media/catalog/product/d/o/dong-song-tho-au.u5131.d20170516.t161319.69089.jpg', '10025', '108', '1000', 2018, 'F', 20),
('10037', 'Những Lối Về Ấu Thơ', 'https://salt.tikicdn.com/cache/w1200/media/catalog/product/i/m/img_20170831_0023.u5505.d20170905.t180906.798357.jpg', '10006', '108', '1008', 2017, 'F', 20),
('10038', 'Bách Khoa Thư Bằng Hình ', 'https://salt.tikicdn.com/cache/550x550/media/catalog/product/b/a/bachkhoathubanghinh.u4939.d20170630.t093448.354664.jpg', '10006', '117', '1000', 2017, 'H', 15),
('10039', 'Những Vị Vua Trẻ Trong Sử Việt', 'https://salt.tikicdn.com/cache/550x550/media/catalog/product/n/h/nhung-vi-vua-tre-trong-su-viet-phien-ban-gop.u4972.d20170426.t165930.177435.jpg', '10006', '117', '1000', 2016, 'D', 15),
('10040', 'Biên Niên Sử Thế Giới Bằng Hình', 'https://salt.tikicdn.com/cache/550x550/media/catalog/product/b/i/bien-nien-su-the-gioi.u4972.d20170510.t164005.757913.gif', '10006', '117', '1000', 2017, 'D', 15),
('10041', 'Lược Sử Nước Việt Bằng Tranh', 'https://salt.tikicdn.com/cache/550x550/media/catalog/product/5/_/5.u3059.d20170424.t095250.439273.jpg', '10006', '117', '1000', 2017, 'D', 15),
('10042', 'Lập Trình Hệ Thống Thương Mại Điện Tử', 'https://salt.tikicdn.com/cache/w1200/ts/product/48/e9/64/79e7461b24415a180419e12da4c406bd.jpg', '10006', '104', '1010', 2019, 'H', 30),
('10043', 'Lập Trình Với C#', 'https://salt.tikicdn.com/cache/w1200/ts/product/ef/bd/f6/2752f967bcf7283d9b36c4b8718c7bfe.jpg', '10006', '104', '1010', 2019, 'H', 30),
('10044', 'Lập Trình Iot Với Arduino', 'https://salt.tikicdn.com/cache/w1200/ts/product/fd/86/68/21cfe9031a97c2ab6c5c3372dfb407f4.jpg', '10006', '104', '1010', 2019, 'H', 30),
('10045', 'Sách Lập trình với Scratch 3.0', 'https://salt.tikicdn.com/cache/w1200/ts/product/27/d0/a1/1611b34ee7a4f0ec3ed1188ef6e59f09.PNG', '10006', '104', '1007', 2019, 'H', 30),
('10046', 'Lập Trình Với PLC S7 1500 Và RSLOGIX', 'https://salt.tikicdn.com/cache/w1200/ts/product/a6/74/a5/2a1f40aef489fc92489c73c4a943609d.jpg', '10026', '104', '1010', 2019, 'H', 30),
('10047', 'Lập Trình Với PLC S7 1200 Và S7 1500', 'https://salt.tikicdn.com/cache/w1200/ts/product/1c/4c/ad/c52c161aae45056a18de5f425f78d4ac.jpg', '10006', '104', '1010', 2019, 'H', 30),
('10048', 'Điều Khiển Lập Trình Và Tạo Giao Diện HMI Với WINCC FLEXIBLE', 'https://salt.tikicdn.com/cache/550x550/ts/product/5b/b8/8d/f3c987b0baf5151fb5604e01088e3659.jpg', '10006', '104', '1010', 2018, 'H', 30),
('10049', 'Lập Trình Và Giám Sát Mạng Truyền Thông Công Nghiệp Scada', 'https://salt.tikicdn.com/cache/w1200/ts/product/4c/2d/76/dc2370bf88252653aa4542de8ab0c5f5.jpg', '10006', '104', '1010', 2019, 'H', 30),
('10050', 'Giáo Trình Quy Hoạch Giao Thông Đô Thị', 'https://salt.tikicdn.com/cache/w1200/ts/product/b7/a9/1f/92622a23842d5f98ff786dcce190243a.jpg', '10006', '104', '1012', 2019, 'I', 30),
('10051', 'Giáo Trình Vật Liệu Cơ Khí', 'https://salt.tikicdn.com/cache/w1200/ts/product/19/f8/03/88c2a7342eb52faccadc0543a5859159.jpg', '10027', '104', '1012', 2019, 'I', 30),
('10052', 'Giáo Trình Khí Động Lực Học', 'https://salt.tikicdn.com/cache/w1200/ts/product/5c/5a/c1/ba7e8078403b98a943acf13152a35662.jpg', '10006', '104', '1012', 2019, 'I', 30),
('10053', 'Giáo Trình Ứng Dụng Cơ Học Trong Kỹ Thuật', 'https://salt.tikicdn.com/cache/w1200/ts/product/e5/61/42/a4a2dd9a40fe135662525a4512d91b33.jpg', '10006', '104', '1012', 2019, 'I', 30),
('10054', 'Giáo Trình Quản Lý Tri Thức', 'https://salt.tikicdn.com/cache/w1200/ts/product/18/76/2d/91e5f1001778b9bfc8c20d330d022172.jpg', '10028', '104', '1012', 2019, 'I', 30),
('10055', 'Giáo Trình Cơ Sở Thiết Kế Máy', 'https://salt.tikicdn.com/cache/w1200/ts/product/cf/15/70/4bba94c5f2812f98721535bbf804b554.jpg', '10006', '104', '1012', 2019, 'I', 30),
('10056', 'Giáo Trình Lưới Điện Phân Phối', 'https://salt.tikicdn.com/cache/w1200/ts/product/f7/54/da/cc95bb8833d950d9df77335e5b0f86e7.jpg', '10006', '104', '1012', 2019, 'I', 30),
('10057', 'Giáo Trình Nền Và Móng', 'https://salt.tikicdn.com/cache/w1200/ts/product/ce/e6/a5/fde40ef3ed04eb11092db8892a55f868.jpg', '10006', '104', '1012', 2019, 'I', 30),
('10058', 'Giáo Trình Chi Tiết Và Cơ Cấu Máy', 'https://salt.tikicdn.com/cache/w1200/ts/product/8a/08/38/423f915d0fe985146e872723d1bf377e.jpg', '10006', '104', '1012', 2019, 'I', 30),
('10059', 'Giáo Trình Xử Lý Tín Hiệu Số', 'https://salt.tikicdn.com/cache/w1200/ts/product/a4/8d/59/cf5feb97e9c0f3e386173d154ce55ef4.jpg', '10006', '104', '1012', 2019, 'I', 30),
('10060', 'Giáo Trình Động Cơ Đốt Trong', 'https://salt.tikicdn.com/cache/550x550/ts/product/32/c4/52/c23716d82e4b5031c914c0043534340f.jpg', '10006', '104', '1012', 2019, 'I', 30),
('10061', 'Giáo Trình Xây Dựng Ứng Dụng Web Cho Thương Mại Điện Tử Trên Netbeans', 'https://salt.tikicdn.com/cache/w1200/ts/product/b6/e7/34/b3a5bdb12ead53db29871d1f945351fc.jpg', '10006', '104', '1012', 2019, 'I', 30),
('10062', 'Giáo Trình Lập Trình Android', 'https://salt.tikicdn.com/cache/w1200/ts/product/7c/89/f5/4e3f9ae4ee6d6843b4abf31fdc4bdc6e.jpg', '10006', '104', '1012', 2018, 'I', 30),
('10063', 'Luật Thi Hành Án Dân Sự', 'https://lh3.googleusercontent.com/proxy/KNkSNOPzuCot-i17PqZ1tQTR_zF-IN09LeOo3KgYjK_YkaUMwiQKXcVoFZLwV8zHuoEI8IPzgbwePOKt8w1Tclci0Nc8eSPEJnlpGsWFBJdFvAb78zaj9wy5ujKEw92lDNqUP_yT8RqYOFD-kupfDkYEO57JaMLFpw58IGKT7esuifa21g', '10006', '106', '1003', 2018, 'B', 30),
('10064', 'Bộ Luật Lao Động', 'https://salt.tikicdn.com/cache/w1200/ts/product/c0/16/5d/dd1852b87a6362ad749ae3edd2a5dfff.jpg', '10006', '106', '1003', 2020, 'B', 30),
('10065', 'Luật Xử Lý Vi Phạm Hành Chính (Hiện Hành, Sửa Đổi Và Bỗ Sung 2014, 2017)', 'https://salt.tikicdn.com/cache/w1200/ts/product/19/c9/18/bcbfddb02c8eeeb6036993718719ca43.jpg', '10006', '106', '1003', 2018, 'B', 30),
('10066', 'Luật Đấu Thầu (Hiện Hành, Sửa Đổi, Bỗ Sung 2016,2017,2019)', 'https://salt.tikicdn.com/cache/w1200/ts/product/02/fc/54/701b210c94705e378bdd18a41edd3229.jpg', '10006', '106', '1003', 2020, 'B', 30),
('10067', 'Luật Phá Sản (Hiện Hành) Và Văn Bản Hướng Dẫn Thi Hành', 'https://salt.tikicdn.com/cache/w1200/ts/product/90/bf/d5/fbd3b80889770afac225f7f4580905a1.jpg', '10006', '106', '1003', 2018, 'B', 30),
('10068', 'Luật Thuế Bảo Vệ Môi Trường', 'https://salt.tikicdn.com/cache/w1200/ts/product/0c/89/7c/c4e26aba28ea711b6ee89ae7c96e107b.jpg', '10006', '106', '1003', 2018, 'B', 30),
('10069', 'Luật An Ninh Mạng (Hiện Hành)', 'https://salt.tikicdn.com/cache/w1200/ts/product/2b/95/f6/e9a790ee1878ad895232deb7375b4810.jpg', '10006', '106', '1003', 2018, 'B', 30),
('10070', 'Bình Luận Khoa Học Bộ Luật Tố Tụng Hình Sự Năm 2015', 'https://salt.tikicdn.com/cache/w1200/ts/product/55/9f/a9/32d88aff92ba0ce6ce9a2c12bfb3a4c4.jpg', '10006', '106', '1003', 2018, 'B', 30),
('10071', 'Luật Nuôi Con Nuôi (Hiện Hành) Và Văn Bản Hướng Dẫn', 'https://salt.tikicdn.com/cache/w1200/ts/product/7d/f4/3d/9e2233906afc7c131de034432e2256e4.jpg', '10006', '106', '1003', 2018, 'B', 30),
('10072', 'Luật Cư Trú (Hiện Hành) (Sửa Đổi, Bổ Sung Năm 2013)', 'https://salt.tikicdn.com/cache/w1200/ts/product/82/1b/b6/ec64ce5cb5eda8f2ff3235ca166ecd64.jpg', '10006', '106', '1003', 2018, 'B', 30),
('10073', 'Luật Ngân Hàng Nhà Nước Việt Nam', 'https://salt.tikicdn.com/cache/w1200/ts/product/6f/c7/d0/36484672ff669f9bd88ba1dcdaf86f43.jpg', '10006', '106', '1003', 2018, 'B', 30),
('10074', 'Bộ Luật Tố Tụng Hình Sự (Hiện Hành)', 'https://salt.tikicdn.com/cache/w1200/ts/product/dc/c7/9a/2b093803989cc3f3aa1dbe6522d9fbae.jpg', '10006', '106', '1003', 2018, 'B', 30),
('10075', 'Luật Doanh Nghiệp (Hiện Hành)', 'https://salt.tikicdn.com/cache/w1200/ts/product/ff/b5/ef/42aac1f5064b0b5f833bb3be3764e65f.jpg', '10006', '106', '1003', 2018, 'B', 30),
('10076', 'Luật Bảo Hiểm Xã Hội (Hiện Hành) (Sửa Đổi Năm 2015, 2018)', 'https://salt.tikicdn.com/cache/w1200/ts/product/0e/a2/6f/91be128f4a5117fb63400c28d6b4c5ae.jpg', '10006', '106', '1003', 2019, 'B', 30),
('10077', 'Luật Hộ Tịch (Hiện Hành)', 'https://salt.tikicdn.com/cache/w1200/ts/product/a8/fe/b2/6f6e13627c632c10c9727da290155044.jpg', '10006', '106', '1003', 2019, 'B', 30),
('10078', 'Bộ Luật Hình Sự Hiện Hành (Bộ Luật Năm 2015, Sửa Đổi, Bổ Sung Năm 2017)', 'https://salt.tikicdn.com/cache/550x550/ts/product/4d/53/0f/535b408917eea369a99762344796328a.jpg', '10006', '106', '1003', 2017, 'B', 30),
('10079', 'Luật Sở Hữu Trí Tuệ (Hiện Hành, Sửa Đổi Bổ Sung 2009,2019)', 'https://salt.tikicdn.com/cache/w1200/ts/product/9e/c9/c2/f0b19d4c965bca000b34f72be7c66b53.jpg', '10006', '106', '1003', 2020, 'B', 30),
('10080', 'Hoa Hướng Dương ', 'https://salt.tikicdn.com/cache/550x550/media/catalog/product/h/o/hoa-huong-duong.u2487.d20161003.t135424.377833.jpg', '10000', '115', '1000', 2016, 'G', 20),
('10081', 'Siêu Quậy Teppei Tập 31', 'https://salt.tikicdn.com/cache/w1200/ts/product/47/25/0b/7d162deca0774329ff3abe57003198c7.jpg', '10008', '101', '1000', 2020, 'G', 20),
('10082', 'Siêu Quậy Teppei Tập 29', 'https://salt.tikicdn.com/cache/w1200/ts/product/f0/d5/fb/39183c4600fed22da9dff01c81537576.jpg', '10008', '101', '1000', 2020, 'G', 20),
('10083', 'Siêu Quậy Teppei Tập 28', 'https://tiki.vn/sieu-quay-teppei-tap-28-p48583252.html?src=search&2hi=1&keyword=Si%C3%AAu+Qu%E1%BA%ADy+Teppei', '10008', '101', '1000', 2020, 'G', 20),
('10084', 'Siêu Quậy Teppei Tập 1', 'https://salt.tikicdn.com/cache/w1200/ts/product/48/df/2e/7b1f5ccf441fdece2ce887f222a2eb5c.jpg', '10008', '101', '1000', 2018, 'G', 20),
('10085', 'Siêu Quậy Teppei Tập 27', 'https://salt.tikicdn.com/cache/w1200/ts/product/ef/96/92/5805523d29bd5c351915f0de4dea065e.jpg', '10008', '101', '1000', 2020, 'G', 20),
('10086', 'Siêu Quậy Teppei Tập 2', 'https://salt.tikicdn.com/cache/w1200/ts/product/32/29/79/643b98c52386b4ef7d9f8373caf92824.jpg', '10008', '101', '1000', 2019, 'G', 20),
('10087', 'Siêu Quậy Teppei Tập 3', 'https://salt.tikicdn.com/cache/w1200/ts/product/a8/21/f2/5c23f0f33fb3c63551904fe1599f04ed.jpg', '10008', '101', '1000', 2019, 'G', 20),
('10088', 'Siêu Quậy Teppei Tập 4', 'https://salt.tikicdn.com/cache/w1200/ts/product/73/c3/91/80073c86008b31dd0edf85d9a98d8582.jpg', '10008', '101', '1000', 2019, 'G', 20),
('10089', 'Siêu Quậy Teppei Tập 5', 'https://salt.tikicdn.com/cache/w1200/ts/product/9f/22/cc/1d8913b8a1e0f981ad1ff5fee709a86d.jpg', '10008', '101', '1000', 2019, 'G', 20),
('10090', 'Siêu Quậy Teppei Tập 6', 'https://salt.tikicdn.com/cache/w1200/ts/product/fd/0f/d3/cab88dcb5341cd7e41a4b9e8c2401608.jpg', '10008', '101', '1000', 2019, 'G', 20),
('10091', 'Siêu Quậy Teppei Tập 7', 'https://salt.tikicdn.com/cache/w1200/ts/product/8b/33/52/e3b6b45bf3bd4cb100548fe4cb9d7c53.jpg', '10008', '101', '1000', 2019, 'G', 20),
('10092', 'Siêu Quậy Teppei Tập 8', 'https://salt.tikicdn.com/cache/w1200/ts/product/70/42/83/6cfdcf80903cf921898246d4a827ee65.jpg', '10008', '101', '1000', 2019, 'G', 20),
('10093', 'Siêu Quậy Teppei Tập 9', 'https://salt.tikicdn.com/cache/w1200/ts/product/e8/52/6e/910c52ee468deaf1d23a3d216caae34e.jpg', '10008', '101', '1000', 2019, 'G', 20),
('10094', 'Siêu Quậy Teppei Tập 10', 'https://salt.tikicdn.com/cache/w1200/ts/product/db/01/8f/f51327d70dad7c21014fa66d873dcf3e.jpg', '10008', '101', '1000', 2019, 'G', 20),
('10095', 'Siêu Quậy Teppei Tập 11', 'https://salt.tikicdn.com/cache/w1200/ts/product/62/d1/35/2e4c16130417739b76bcacb7533d83bd.jpg', '10008', '101', '1000', 2019, 'G', 20),
('10096', 'Siêu Quậy Teppei Tập 12', 'https://salt.tikicdn.com/cache/w1200/ts/product/2f/d0/61/530ac226a8b70ca2966113374b96839f.jpg', '10008', '101', '1000', 2019, 'G', 20),
('10097', 'Siêu Quậy Teppei Tập 13', 'https://salt.tikicdn.com/cache/w1200/ts/product/bd/68/2d/47f289e376996b6df49982f88a55410a.jpg', '10008', '101', '1000', 2019, 'G', 20),
('10098', 'Siêu Quậy Teppei Tập 14', 'https://salt.tikicdn.com/cache/w1200/ts/product/f0/02/96/9c17b12ca053932be770feede6888625.jpg', '10008', '101', '1000', 2019, 'G', 20),
('10099', 'Siêu Quậy Teppei Tập 15', 'https://salt.tikicdn.com/cache/w1200/ts/product/e4/39/ae/bbd9837c90fd53e882f41bdfcd2aaa9a.jpg', '10008', '101', '1000', 2019, 'G', 20),
('10100', 'Siêu Quậy Teppei Tập 16', 'https://salt.tikicdn.com/cache/w1200/ts/product/f8/8b/90/21a8d4291e4f29d88c2a58689c32f57f.jpg', '10008', '101', '1000', 2019, 'G', 20);

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `cardNumber` int(10) NOT NULL,
  `createdDay` date NOT NULL,
  `expiredDay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card`
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
-- Table structure for table `depot`
--

CREATE TABLE `depot` (
  `depotCode` varchar(10) NOT NULL,
  `depotName` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `depot`
--

INSERT INTO `depot` (`depotCode`, `depotName`, `quantity`) VALUES
('A', 'Truyện Trinh thám', 100),
('B', 'Luật pháp', 660),
('C', 'Kinh tế học', 20),
('D', 'Lịch sử-Văn hóa-Chính trị', 55),
('E', 'Ngoại ngữ', 20),
('F', 'Tiểu thuyết', 140),
('G', 'Truyện', 530),
('H', 'Sách tham khảo', 305),
('I', 'Giáo trình', 505);

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
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
-- Dumping data for table `librarian`
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
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisherCode` varchar(10) NOT NULL,
  `publisherName` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisherCode`, `publisherName`, `address`, `email`, `phoneNumber`) VALUES
('1000', 'Kim Đồng', '16, Hàng Chuối, P. Phạm Đình Hổ, Q. Hai Bà Trưng, Hà Nội', 'info@nxbkimdong.com.vn', '01762263198'),
('1001', 'NXB Văn Hóa Thông Tin', '43 Lò Đúc, Q. Hai Bà Trưng,Hà Nội', NULL, ' 0243942068'),
('1002', 'Nhà Xuất Bản Công An Nhân Dân', '92 Nguyễn Du, Quận Hai Bà Trưng, Tp Hà Nội', NULL, '0692342969'),
('1003', 'NHÀ XUẤT BẢN CHÍNH TRỊ QUỐC GIA SỰ THẬT', 'Số 6/86 Duy Tân - Cầu Giấy - Hà Nội; Số 24 Quang Trung - Hoàn Kiếm - Hà Nội', 'suthat@nxbctqg.vn', '02438221633'),
('1004', 'Nhà Xuất Bản Văn Học', '18 Nguyễn Trường Tộ - Ba Đình - Hà Nội', 'info@nxbvanhoc.com.vn', '02437161518'),
('1005', 'Nhà xuất bản Kinh tế TP. Hồ Chí Minh', '279 Nguyễn Tri Phương – Phường 5 – Quận 10 – TP. Hồ Chí Minh', 'nxb@ueh.edu.vn ', '02838575466'),
('1006', 'Nhà xuất bản Tri Thức', '59 Đỗ Quang, phường Trung Hoà, quận Cầu Giấy, Hà Nội', 'lienhe@nxbtrithuc.com.vn', '04656728664'),
('1007', 'Nhà Xuất bản Đại học Quốc gia Hà Nội', '55 Quang Trung, Nguyễn Du, Hai Bà Trưng, Hà Nội.', 'nxb@vnu.edu.vn', '01684839478'),
('1008', 'Nhà Xuất Bản Hội Nhà Văn', 'Số 65 Nguyễn Du, Quận Hai Bà Trưng, thành phố Hà Nội', 'nxbhoinhavan65@gmail.com', '024 382 221'),
('1009', 'Nhà Xuất bản Dân Trí', 'Số 347 Đội Cấn, quận Ba Đình, Hà Nội', 'nxbdantri@gmail.com', '0466860751'),
('1010', 'NHÀ XUẤT BẢN THANH NIÊN', '64 Bà Triệu, Hoàn Kiếm, Hà Nội', NULL, '0462631720'),
('1011', 'Nhà Xuất Bản Bách Khoa Hà Nội', 'Ngõ 17 Tạ Quang Bửu, Bách Khoa, Hai Bà Trưng, Hà Nội', 'nxbbk@hust.edu.vn', '02438684569'),
('1012', 'Nhà xuất bản Xây dựng', '37 Lê Đại Hành, Hai Bà Trưng, TP. Hà Nội', 'nxbxaydung37@gmail.com', '02437265180');

-- --------------------------------------------------------

--
-- Table structure for table `reader`
--

CREATE TABLE `reader` (
  `readerCode` bigint(255) NOT NULL,
  `readerName` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `cardNumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reader`
--

INSERT INTO `reader` (`readerCode`, `readerName`, `address`, `phoneNumber`, `gender`, `dateOfBirth`, `cardNumber`) VALUES
(18020002, 'Đinh Việt Anh', 'Nam Định', '0705422625', 'Nam', '2000-06-05', 18020002),
(18020013, 'Phạm Việt Dũng', 'Hải Dương', '0705422640', 'Nam', '2000-10-03', 18020013),
(18020041, 'Đào Công Minh', 'Hải Dương', '0705422601', 'Nam', '2000-09-18', 18020041),
(18020063, 'Nguyễn Hoàng Việt', 'Hà Nội', '0705422695', 'Nam', '2000-02-05', 18020063),
(18020065, 'Nguyễn Quang Vinh', 'Bắc Ninh', '0705422696', 'Nam', '2000-12-24', 18020065),
(18020074, 'Nguyễn Duy Kiên', 'Hà Nội', '0705422661', 'Nam', '2000-09-22', 18020074),
(18020109, 'Nguyễn Trường An', 'Hải Dương', '0705422509', 'Nam', '2000-01-10', 18020109),
(18020117, 'Lại Tuấn Anh', 'Hà Nội', '0705422627', 'Nam', '2000-11-17', 18020117),
(18020125, 'Hoàng Nghĩa Anh', 'Hà Nội', '0705422512', 'Nam', '2000-07-22', 18020125),
(18020127, 'Nguyễn Đức Anh', 'Hà Nội', '0705422628', 'Nam', '2000-12-20', 18020127),
(18020136, 'Đỗ Quang Anh', 'Hà Tây', '0705422626', 'Nam', '2000-07-15', 18020136),
(18020140, 'Nguyễn Tuấn Anh', 'Hải Phòng', '0705422630', 'Nam', '2000-12-08', 18020140),
(18020146, 'Nguyễn Tú Anh', 'Vĩnh Phúc', '0705422629', 'Nam', '2000-11-22', 18020146),
(18020151, 'Nguyễn Phúc Tiến Anh', 'Hải Dương', '0705422513', 'Nam', '2000-04-30', 18020151),
(18020155, 'Đỗ Quang Anh', 'Hưng Yên', '0705422567', 'Nam', '2000-03-02', 18020155),
(18020160, 'Đoàn Ngọc Anh', 'Nam Định', '0705422511', 'Nam', '2000-01-15', 18020160),
(18020161, 'Bùi Tuấn Anh', 'Nam Định', '0705422510', 'Nam', '2000-07-03', 18020161),
(18020177, 'Lê Thị Hồng Ánh', 'Hà Nội', '0705422514', 'Nữ', '2000-11-06', 18020177),
(18020182, 'Nguyễn Ngọc Ánh', 'Thái Bình', '0705422515', 'Nam', '2000-01-31', 18020182),
(18020190, 'Hoàng Đình Bách', 'Hải Phòng', '0705422568', 'Nam', '2000-04-02', 18020190),
(18020196, 'Nguyễn Hữu Bằng', 'Quảng Ninh', '0705422632', 'Nam', '2000-09-02', 18020196),
(18020198, 'Võ Lương Bằng', 'Nghệ An', '0705422633', 'Nam', '2000-10-18', 18020198),
(18020199, 'Đậu Hữu Bằng', 'Nghệ An', '0705422631', 'Nam', '2000-05-07', 18020199),
(18020210, 'Nguyễn Đình Biển', 'Hải Dương', '0705422634', 'Nam', '2000-10-19', 18020210),
(18020219, 'Đặng Đức Cảnh', 'Lào Cai', '0705422516', 'Nam', '2000-07-18', 18020219),
(18020223, 'Đỗ Văn Chí', 'Bắc Ninh', '0705422517', 'Nam', '2000-08-09', 18020223),
(18020225, 'Vũ Minh Chiến', 'Quảng Ninh', '0705422570', 'Nam', '2000-09-28', 18020225),
(18020229, 'Trần Thế Chiến', 'Hải Dương', '0705422569', 'Nam', '2000-03-03', 18020229),
(18020258, 'Nguyễn Việt Cường', 'Thái Bình', '0705422635', 'Nam', '2000-08-13', 18020258),
(18020262, 'Trần Quốc Cường', 'Hà Tĩnh', '0705422636', 'Nam', '2000-09-02', 18020262),
(18020264, 'Phạm Trọng Đại', 'Bắc Giang', '0705422643', 'Nam', '2000-09-28', 18020264),
(18020267, 'Phạm Thị Dân', 'Bắc Ninh', '0705422637', 'Nữ', '2000-07-16', 18020267),
(18020273, 'Lê Văn Đạo', 'Hà Nội', '0705422573', 'Nam', '2000-03-11', 18020273),
(18020277, 'Nguyễn Minh Đạt', 'Hà Nội', '0705422574', 'Nam', '2000-12-02', 18020277),
(18020281, 'Nguyễn Tiến Đạt', 'Hà Nội', '0705422645', 'Nam', '2000-10-19', 18020281),
(18020287, 'Nguyễn Tiến Đạt', 'Vĩnh Phúc', '0705422644', 'Nam', '2000-05-18', 18020287),
(18020305, 'Nguyễn Quang Dĩnh', 'Hà Tây', '0705422638', 'Nam', '2000-07-16', 18020305),
(18020324, 'Nguyễn Xuân Đức', 'Hà Nội', '0705422579', 'Nam', '2000-05-01', 18020324),
(18020327, 'Nguyễn Duy Đức', 'Hải Phòng', '0705422521', 'Nam', '2000-01-15', 18020327),
(18020336, 'Đào Minh Đức', 'Bắc Ninh', '0705422575', 'Nam', '2000-11-19', 18020336),
(18020339, 'Lê Huy Đức', 'Hưng Yên', '0705422576', 'Nam', '2000-09-11', 18020339),
(18020344, 'Nguyễn Ngọc Đức', 'Thái Bình', '0705422577', 'Nam', '2000-04-12', 18020344),
(18020348, 'Lê Năng Đức', 'Thanh Hóa', '0705422646', 'Nam', '2000-09-17', 18020348),
(18020356, 'Nguyễn Trung Đức', 'Hà Tĩnh', '0705422578', 'Nam', '2000-05-18', 18020356),
(18020365, 'Nguyễn Đức Dũng', 'Hà Nội', '0705422639', 'Nam', '2000-12-29', 18020365),
(18020367, 'Nguyễn Anh Dũng', 'Hải Phòng', '0705422518', 'Nam', '2000-07-09', 18020367),
(18020375, 'Bùi Trí Dũng', 'Hưng Yên', '0705422571', 'Nam', '2000-12-17', 18020375),
(18020387, 'Đào Hồng Dương', 'Hà Nội', '0705422520', 'Nam', '2000-12-27', 18020387),
(18020401, 'Bùi Công Dương', 'Thái Bình', '0705422572', 'Nam', '2000-04-27', 18020401),
(18020405, 'Phạm Văn Dương', 'Thanh Hóa', '0705422642', 'Nam', '2000-07-09', 18020405),
(18020412, 'Nguyễn Văn Duy', 'Hải Phòng', '0705422519', 'Nam', '2000-12-24', 18020412),
(18020417, 'Nguyễn Khắc Duy', 'Hải Dương', '0705422641', 'Nam', '2000-10-02', 18020417),
(18020431, 'Lê Quang Giang', 'Thanh Hóa', '0705422580', 'Nam', '2000-07-10', 18020431),
(18020436, 'Dương Thị Hà', 'Hòa Bình', '0705422581', 'Nữ', '2000-05-17', 18020436),
(18020442, 'Triệu Vũ Hải', 'Hà Tây', '0705422648', 'Nam', '2000-07-28', 18020442),
(18020451, 'Phạm Thanh Hải', 'Thái Bình', '0705422522', 'Nam', '2000-10-06', 18020451),
(18020453, 'Phạm Ngọc Hải', 'Lai Châu', '0705422647', 'Nam', '2000-11-17', 18020453),
(18020459, 'Ngô Văn Hào', 'Bắc Ninh', '0705422650', 'Nam', '2000-12-11', 18020459),
(18020460, 'Hoàng Dương Hào', 'Hưng Yên', '0705422649', 'Nam', '2000-08-16', 18020460),
(18020475, 'Trần Minh Hiệp', 'Quảng Ninh', '0705422583', 'Nam', '2000-10-04', 18020475),
(18020492, 'Nguyễn Minh Hiếu', 'Hà Nội', '0705422523', 'Nam', '2000-08-24', 18020492),
(18020501, 'Diêm Đăng Hiếu', 'Bắc Giang', '0705422582', 'Nam', '2000-10-23', 18020501),
(18020503, 'Phạm Văn Hiếu', 'Bắc Ninh', '0705422584', 'Nam', '2000-09-23', 18020503),
(18020522, 'Bùi Quang Hiệu', 'Thái Bình', '0705422524', 'Nam', '2000-07-29', 18020522),
(18020538, 'Phạm Văn Hoàn', 'Nam Định', '0705422651', 'Nam', '2000-09-24', 18020538),
(18020548, 'Nguyễn Thái Hoàng', 'Hà Nội', '0705422587', 'Nam', '2000-01-18', 18020548),
(18020552, 'Nguyễn Minh Hoàng', 'Hải Phòng', '0705422585', 'Nam', '2000-09-02', 18020552),
(18020559, 'Đặng Huy Hoàng', 'Quảng Ninh', '0705422525', 'Nam', '2000-01-26', 18020559),
(18020561, 'Nguyễn Ngọc Hoàng', 'Đồng Nai', '0705422586', 'Nam', '2000-07-23', 18020561),
(18020583, 'Nguyễn Mạnh Hùng', 'Hà Nội', '0705422652', 'Nam', '2000-02-13', 18020583),
(18020584, 'Phạm Thanh Hùng', 'Hà Nội', '0705422653', 'Nam', '2000-07-11', 18020584),
(18020591, 'Dương Văn Hùng', 'Bắc Giang', '0705422526', 'Nam', '2000-04-16', 18020591),
(18020602, 'Lê Văn Hùng', 'Thanh Hóa', '0705422527', 'Nam', '2000-09-09', 18020602),
(18020605, 'Nguyễn Việt Hưng', 'Hà Nội', '0705422531', 'Nam', '2000-05-20', 18020605),
(18020606, 'Nguyễn Việt Hưng', 'Hà Nội', '0705422590', 'Nam', '2000-11-20', 18020606),
(18020608, 'Vũ Đình Hưng', 'Hải Dương', '0705422591', 'Nam', '2000-01-16', 18020608),
(18020609, 'Lưu Bách Hưng', 'Hà Nội', '0705422530', 'Nam', '2000-04-07', 18020609),
(18020615, 'Ngô Mạnh Hưng', 'Bắc Giang', '0705422589', 'Nam', '2000-02-02', 18020615),
(18020618, 'Phạm Việt Hưng', 'Nam Định', '0705422532', 'Nam', '2000-04-22', 18020618),
(18020619, 'Trần Thanh Hương', 'Hà Nội', '0705422592', 'Nữ', '2000-09-07', 18020619),
(18020626, 'Nguyễn Chính Hữu', 'Hà Nội', '0705422658', 'Nam', '2000-11-25', 18020626),
(18020628, 'Ngô Quang Huy', 'Hà Nội', '0705422528', 'Nam', '2000-09-29', 18020628),
(18020639, 'Vũ Quang Huy', 'Hà Nội', '0705422529', 'Nam', '2000-03-28', 18020639),
(18020644, 'Nguyễn Hữu Huy', 'Bắc Ninh', '0705422655', 'Nam', '2000-11-26', 18020644),
(18020647, 'Lương Đức Huy', 'Hải Dương', '0705422588', 'Nam', '2000-02-21', 18020647),
(18020651, 'Nguyễn Văn Huy', 'Nam Định', '0705422656', 'Nam', '2000-10-11', 18020651),
(18020659, 'Lê Đức Huy', 'Nghệ An', '0705422654', 'Nam', '2000-01-01', 18020659),
(18020663, 'Tạ Thị Huyền', 'Hà Tây', '0705422657', 'Nữ', '2000-03-12', 18020663),
(18020675, 'Trần Trọng Nguyễn Khang', 'Hà Nội', '0705422659', 'Nam', '2000-02-28', 18020675),
(18020688, 'Nguyễn Ngọc Khánh', 'Hà Nội', '0705422660', 'Nam', '2000-12-28', 18020688),
(18020690, 'Đào Ngọc Khánh', 'Hà Nội', '0705422533', 'Nam', '2000-09-03', 18020690),
(18020706, 'Vũ Ngọc Khánh', 'Thanh Hoá', '0705422593', 'Nam', '2000-11-16', 18020706),
(18020719, 'Nguyễn Viết Huy Khôi', 'Hà Nội', '0705422534', 'Nam', '2000-08-23', 18020719),
(18020731, 'Nguyễn Trung Kiên', 'Hải Phòng', '0705422662', 'Nam', '2000-07-18', 18020731),
(18020735, 'Kiều Văn Kiên', 'Thanh Hóa', '0705422594', 'Nam', '2000-09-04', 18020735),
(18020743, 'Phạm Tùng Lâm', 'Hà Nội', '0705422596', 'Nam', '2000-11-08', 18020743),
(18020744, 'Phạm Tùng Lâm', 'Hải Dương', '0705422595', 'Nam', '2000-05-19', 18020744),
(18020757, 'Nguyễn Phương Liên', 'Hà Nội', '0705422597', 'Nữ', '2000-11-28', 18020757),
(18020774, 'Lê Đình Linh', 'Nghệ An', '0705422598', 'Nam', '2000-04-15', 18020774),
(18020775, 'Lê Thị Mỹ Linh', 'Nghệ An', '0705422535', 'Nữ', '2000-07-25', 18020775),
(18020791, 'Nguyễn Đức Long', 'Hà Nội', '0705422538', 'Nam', '2000-12-20', 18020791),
(18020820, 'Đại Đức Long', 'Vĩnh Phúc', '0705422536', 'Nam', '2000-05-16', 18020820),
(18020829, 'Trần Gia Long', 'Bắc Ninh', '0705422600', 'Nam', '2000-06-10', 18020829),
(18020830, 'Nguyễn Ngọc Long', 'Bắc Ninh', '0705422599', 'Nam', '2000-11-16', 18020830),
(18020837, 'Vũ Văn Long', 'Hải Dương', '0705422666', 'Nam', '2000-03-03', 18020837),
(18020844, 'Phạm Đào Hoàng Long', 'Nam Định', '0705422539', 'Nam', '2000-04-02', 18020844),
(18020847, 'Phạm Văn Long', 'Nam Định', '0705422664', 'Nam', '2000-05-27', 18020847),
(18020849, 'Đoàn Đức Long', 'Ninh Bình', '0705422537', 'Nam', '2000-09-30', 18020849),
(18020855, 'Nguyễn Hoàng Long', 'Nghệ An', '0705422663', 'Nam', '2000-02-18', 18020855),
(18020856, 'Trần Thanh Long', 'Nghệ An', '0705422665', 'Nam', '2000-02-10', 18020856),
(18020875, 'Nguyễn Đức Mạnh', 'Hà Nội', '0705422540', 'Nam', '2000-06-04', 18020875),
(18020881, 'Nguyễn Văn Mạnh', 'Bắc Giang', '0705422668', 'Nam', '2000-07-11', 18020881),
(18020885, 'Đặng Văn Mạnh', 'Thái Bình', '0705422667', 'Nam', '2000-08-24', 18020885),
(18020894, 'Nguyễn Ngọc Minh', 'Hà Nội', '0705422602', 'Nam', '2000-02-18', 18020894),
(18020895, 'Trần Quang Minh', 'Lào Cai', '0705422670', 'Nam', '2000-10-30', 18020895),
(18020903, 'Nguyễn Văn Minh', 'Bắc Ninh', '0705422603', 'Nam', '2000-01-04', 18020903),
(18020916, 'Phan Văn Minh', 'Hà Tĩnh', '0705422669', 'Nam', '2000-08-11', 18020916),
(18020920, 'Nguyễn Văn Nam', 'Hà Nội', '0705422672', 'Nam', '2000-08-19', 18020920),
(18020933, 'Nguyễn Vũ Giang Nam', 'Bắc Ninh', '0705422605', 'Nam', '2000-05-10', 18020933),
(18020934, 'Chu Văn Nam', 'Bắc Ninh', '0705422541', 'Nam', '2000-10-26', 18020934),
(18020939, 'Hoàng Minh Nam', 'Nam Định', '0705422604', 'Nam', '2000-12-07', 18020939),
(18020941, 'Đỗ Nam', 'Thanh Hóa', '0705422671', 'Nam', '2000-01-28', 18020941),
(18020974, 'Đỗ Văn Nhất', 'Hưng Yên', '0705422606', 'Nam', '2000-12-28', 18020974),
(18020979, 'Ngô Sách Nhật', 'Bắc Giang', '0705422673', 'Nam', '2000-06-01', 18020979),
(18020984, 'Trương Thị Cẩm Nhung', 'Hà Tĩnh', '0705422542', 'Nữ', '2000-04-06', 18020984),
(18020987, 'Vũ Oanh', 'Hải Dương', '0705422543', 'Nam', '2000-11-17', 18020987),
(18020988, 'Vũ Thị Oanh', 'Hải Dương', '0705422674', 'Nữ', '2000-11-09', 18020988),
(18020998, 'Hoàng Trung Phong', 'Hà Nội', '0705422675', 'Nam', '2000-12-16', 18020998),
(18021007, 'Nguyễn Thành Phúc', 'Hà Nội', '0705422607', 'Nam', '2000-06-02', 18021007),
(18021039, 'Hồ Đức Quân', 'Nghệ An', '0705422608', 'Nam', '2000-04-20', 18021039),
(18021054, 'Trần Văn Quang', 'Nghệ An', '0705422676', 'Nam', '1999-12-04', 18021054),
(18021055, 'Phan Đức Quang', 'Nghệ An', '0705422544', 'Nam', '2000-04-11', 18021055),
(18021059, 'Lê Vương Quốc', 'Hà Tĩnh', '0705422609', 'Nam', '2000-05-09', 18021059),
(18021065, 'Lê Minh Quyền', 'Hà Nội', '0705422545', 'Nam', '2000-12-10', 18021065),
(18021072, 'Lê Thanh Sang', 'Nghệ An', '0705422610', 'Nam', '2000-05-04', 18021072),
(18021079, 'Nguyễn Ngọc Sơn', 'Hà Tây', '0705422678', 'Nam', '2000-06-15', 18021079),
(18021082, 'Nguyễn Hồng Sơn', 'Thái Nguyên', '0705422612', 'Nam', '2000-12-23', 18021082),
(18021084, 'Lê Minh Sơn', 'Quảng Ninh', '0705422611', 'Nam', '2000-10-14', 18021084),
(18021086, 'Lương Thái Sơn', 'Bắc Giang', '0705422677', 'Nam', '2000-03-31', 18021086),
(18021087, 'Nguyễn Thanh Sơn', 'Bắc Giang', '0705422679', 'Nam', '2000-09-18', 18021087),
(18021089, 'Trịnh Lê Sơn', 'Bắc Ninh', '0705422680', 'Nam', '2000-08-16', 18021089),
(18021096, 'Ngô Thái Sơn', 'Nam Định', '0705422698', 'Nam', '2000-10-25', 18021096),
(18021098, 'Vũ Thái Sơn', 'Nam Định', '0705422699', 'Nam', '2000-02-13', 18021098),
(18021101, 'Vũ Mậu Sơn', 'Thái Bình', '0705422546', 'Nam', '2000-01-22', 18021101),
(18021118, 'Lê Thị Tâm', 'Thanh Hóa', '0705422681', 'Nữ', '2000-03-20', 18021118),
(18021122, 'Vũ Trọng Tấn', 'Hà Tây', '0705422700', 'Nam', '2000-12-17', 18021122),
(18021133, 'Đỗ Thị Thắm', 'Hải Phòng', '0705422702', 'Nữ', '2000-09-04', 18021133),
(18021137, 'Nguyễn Hoàng Thăng', 'Nghệ An', '0705422549', 'Nam', '2000-12-11', 18021137),
(18021148, 'Nguyễn Đức Thắng', 'Bắc Ninh', '0705422703', 'Nam', '2000-08-04', 18021148),
(18021155, 'Lê Tất Thắng', 'Nam Định', '0705422551', 'Nam', '2000-05-30', 18021155),
(18021157, 'Bùi Quang Việt Thắng', 'Thái Bình', '0705422550', 'Nam', '2000-10-07', 18021157),
(18021165, 'Nguyễn Kiến Thanh', 'Hải Phòng', '0705422613', 'Nam', '2000-06-03', 18021165),
(18021169, 'Phạm Tiến Thành', 'Hà Nội', '0705422701', 'Nam', '2000-11-13', 18021169),
(18021188, 'Vũ Đình Thành', 'Hải Dương', '0705422547', 'Nam', '2000-03-16', 18021188),
(18021190, 'Vũ Đức Thành', 'Hà Nam', '0705422548', 'Nam', '2000-01-15', 18021190),
(18021195, 'Trương Gia Bảo Thao', 'Thanh Hóa', '0705422682', 'Nam', '2000-01-04', 18021195),
(18021209, 'Trần Vũ Thiện', 'Hà Nội', '0705422552', 'Nam', '2000-08-17', 18021209),
(18021212, 'Nguyễn Văn Thiện', 'Bắc Ninh', '0705422704', 'Nam', '2000-07-08', 18021212),
(18021217, 'Trần Khắc Thiện', 'Nghệ An', '0705422683', 'Nam', '2000-08-01', 18021217),
(18021225, 'Phạm Thế Thịnh', 'Hà Nội', '0705422614', 'Nam', '2000-08-08', 18021225),
(18021240, 'Lưu Thị Hoài Thu', 'Bắc Giang', '0705422684', 'Nữ', '2000-08-18', 18021240),
(18021243, 'Đỗ Tiến Thu', 'Thanh Hoá', '0705422553', 'Nam', '2000-09-01', 18021243),
(18021244, 'Vũ Kim Thư', 'Lai Châu', '0705422616', 'Nữ', '2000-05-20', 18021244),
(18021245, 'Trịnh Thị Thư', 'Nam Định', '0705422685', 'Nữ', '2000-01-21', 18021245),
(18021247, 'Nguyễn Quang Thuấn', 'Nam Định', '0705422705', 'Nam', '2000-07-27', 18021247),
(18021249, 'Bùi Đức Thuần', 'Hưng Yên', '0705422555', 'Nam', '2000-06-19', 18021249),
(18021251, 'Chu Thế Thuận', 'Bắc Giang', '0705422554', 'Nam', '2000-10-08', 18021251),
(18021260, 'Nguyễn Ngọc Thúy', 'Nam Định', '0705422615', 'Nữ', '2000-02-16', 18021260),
(18021265, 'Lê Thị Thủy Tiên', 'Hải Phòng', '0705422706', 'Nữ', '2000-01-14', 18021265),
(18021269, 'Nguyễn Mạnh Tiến', 'Hà Giang', '0705422686', 'Nam', '2000-03-24', 18021269),
(18021273, 'Vũ Ngọc Tiến', 'Nam Định', '0705422687', 'Nam', '2000-02-06', 18021273),
(18021274, 'Nguyễn Hữu Tiến', 'Nghệ An', '0705422707', 'Nam', '1999-05-11', 18021274),
(18021276, 'Phan Đăng Tiệp', 'Bắc Ninh', '0705422708', 'Nam', '2000-10-07', 18021276),
(18021277, 'Nguyễn Thái Tiệp', 'Thái Bình', '0705422688', 'Nam', '2000-06-20', 18021277),
(18021279, 'Vương Thành Toàn', 'Nghệ An', '0705422689', 'Nam', '2000-10-01', 18021279),
(18021285, 'Trần Minh Toàn', 'Thái Bình', '0705422556', 'Nam', '2000-06-01', 18021285),
(18021291, 'Nguyễn Đình Tới', 'Hà Nội', '0705422557', 'Nam', '2000-09-17', 18021291),
(18021294, 'Nguyễn Ngọc Bảo Trân', 'Hà Tây', '0705422690', 'Nữ', '2000-01-06', 18021294),
(18021316, 'Nguyễn Bá Trung', 'Hà Nội', '0705422558', 'Nam', '2000-12-21', 18021316),
(18021321, 'Nguyễn Thành Trung', 'Hà Nội', '0705422559', 'Nam', '2000-12-13', 18021321),
(18021325, 'Nguyễn Đức Trung', 'Phú Thọ', '0705422617', 'Nam', '2000-09-22', 18021325),
(18021339, 'Trần Văn Trường', 'Bắc Giang', '0705422618', 'Nam', '2000-08-02', 18021339),
(18021342, 'Ngô Duy Trường', 'Nam Định', '0705422560', 'Nam', '2000-09-27', 18021342),
(18021349, 'Võ Hoàng Anh Tú', 'Hà Nội', '0705422561', 'Nam', '2000-09-09', 18021349),
(18021359, 'Phạm Ngọc Tuân', 'Thái Bình', '0705422691', 'Nam', '2000-10-01', 18021359),
(18021367, 'Đặng Văn Tuấn', 'Vĩnh Phúc', '0705422692', 'Nam', '2000-02-21', 18021367),
(18021368, 'Trần Minh Tuấn', 'Vĩnh Phúc', '0705422563', 'Nam', '2000-09-09', 18021368),
(18021369, 'Nguyễn Phúc Tuấn', 'Quảng Ninh', '0705422562', 'Nam', '2000-03-04', 18021369),
(18021392, 'Nguyễn Văn Tùng', 'Thái Nguyên', '0705422565', 'Nam', '2000-10-25', 18021392),
(18021397, 'Nguyễn Văn Tùng', 'Bắc Giang', '0705422619', 'Nam', '2000-05-03', 18021397),
(18021398, 'Dương Thanh Tùng', 'Bắc Giang', '0705422564', 'Nam', '2000-05-29', 18021398),
(18021409, 'Doãn Công Tuyến', 'Vĩnh Phúc', '0705422566', 'Nam', '2000-01-15', 18021409),
(18021412, 'Vũ Tố Uyên', 'Yên Bái', '0705422693', 'Nữ', '2000-12-21', 18021412),
(18021414, 'Đỗ Ngọc Thanh Vân', 'Yên Bái', '0705422694', 'Nữ', '2000-07-29', 18021414),
(18021416, 'Phạm Bá Văn', 'Hải Dương', '0705422620', 'Nam', '2000-06-24', 18021416),
(18021422, 'Vũ Quốc Việt', 'Nam Định', '0705422621', 'Nam', '2000-04-05', 18021422),
(18021440, 'Nguyễn Huy Vũ', 'Hà Nam', '0705422622', 'Nam', '2000-06-16', 18021440),
(18021444, 'Trần Trọng Vương', 'Bắc Ninh', '0705422623', 'Nam', '2000-06-11', 18021444),
(18021447, 'Viên Đức Vương', 'Hà Tĩnh', '0705422624', 'Nam', '2000-03-26', 18021447),
(18021451, 'Nguyễn Thị Xuân', 'Bắc Giang', '0705422697', 'Nữ', '2000-02-05', 18021451);

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `styleCode` varchar(10) NOT NULL,
  `styleName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `style`
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
('116', 'Sách Toán'),
('117', 'Khác');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD KEY `action_ibfk_1` (`cardNumber`),
  ADD KEY `reader_ibfk_2` (`librarianCode`),
  ADD KEY `reader_ibfk_3` (`bookCode`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorCode`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookCode`),
  ADD KEY `books_ibfk_1` (`authorCode`),
  ADD KEY `books_ibfk_2` (`styleCode`),
  ADD KEY `books_ibfk_3` (`publisherCode`),
  ADD KEY `books_ibfk_4` (`depotCode`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cardNumber`);

--
-- Indexes for table `depot`
--
ALTER TABLE `depot`
  ADD PRIMARY KEY (`depotCode`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`librarianCode`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisherCode`);

--
-- Indexes for table `reader`
--
ALTER TABLE `reader`
  ADD PRIMARY KEY (`readerCode`),
  ADD KEY `reader_ibfk_1` (`cardNumber`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`styleCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reader`
--
ALTER TABLE `reader`
  MODIFY `readerCode` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18021452;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`cardNumber`) REFERENCES `card` (`cardNumber`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reader_ibfk_2` FOREIGN KEY (`librarianCode`) REFERENCES `librarian` (`librarianCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reader_ibfk_3` FOREIGN KEY (`bookCode`) REFERENCES `books` (`bookCode`) ON UPDATE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`authorCode`) REFERENCES `authors` (`authorCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`styleCode`) REFERENCES `style` (`styleCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`publisherCode`) REFERENCES `publisher` (`publisherCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_4` FOREIGN KEY (`depotCode`) REFERENCES `depot` (`depotCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reader`
--
ALTER TABLE `reader`
  ADD CONSTRAINT `reader_ibfk_1` FOREIGN KEY (`cardNumber`) REFERENCES `card` (`cardNumber`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2020 lúc 02:46 PM
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
  `timeBorrow` int(11) NOT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authors`
--

CREATE TABLE `authors` (
  `authorCode` varchar(10) NOT NULL,
  `authorName` varchar(50) NOT NULL,
  `website` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `bookCode` varchar(10) NOT NULL,
  `bookName` varchar(50) NOT NULL,
  `bookImage` mediumblob NOT NULL,
  `authorCode` varchar(10) DEFAULT NULL,
  `styleCode` varchar(10) DEFAULT NULL,
  `publisherCode` varchar(10) DEFAULT NULL,
  `publishYear` year(4) DEFAULT NULL,
  `depotCode` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `card`
--

CREATE TABLE `card` (
  `cardNumber` int(10) NOT NULL,
  `createdDay` datetime NOT NULL,
  `expiredDay` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `depot`
--

CREATE TABLE `depot` (
  `depotCode` varchar(10) NOT NULL,
  `depotName` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `librarian`
--

CREATE TABLE `librarian` (
  `librarianCode` varchar(10) NOT NULL,
  `librarianName` varchar(50) NOT NULL,
  `dateOfBirth` datetime NOT NULL,
  `gender` varchar(5) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `publisher`
--

CREATE TABLE `publisher` (
  `publisherCode` varchar(10) NOT NULL,
  `publisherName` varchar(50) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phoneNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reader`
--

CREATE TABLE `reader` (
  `readerCode` bigint(255) NOT NULL,
  `readerName` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `cardNumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `reader`
--

INSERT INTO `reader` (`readerCode`, `readerName`, `address`, `phoneNumber`, `gender`, `dateOfBirth`, `cardNumber`) VALUES
(18020001, 'Hoàng Vũ Duy Anh', 'Vĩnh Phúc', 120020361, 'Nam', '2000-12-12', 1159),
(18020003, 'Hoàng Minh Đức Anh', 'Hà Nội', 120020360, 'Nam', '2000-10-10', 1158),
(18020006, 'Lê Văn Cường', 'Hưng Yên', 120020211, 'Nam', '2000-12-01', 1009),
(18020007, 'Nguyễn Tấn Đạt', 'Hà Nội', 120020366, 'Nam', '2000-01-19', 1164),
(18020014, 'Đắc Tùng Dương', 'Hưng Yên', 120020215, 'Nam', '2000-01-07', 1013),
(18020015, 'Phan Hữu Duy', 'Nghệ An', 120020365, 'Nam', '2000-10-16', 1163),
(18020019, 'Thái Phi Hoàng', 'Nghệ An', 120020368, 'Nam', '2000-11-06', 1166),
(18020020, 'Chu Văn Hưng', 'Quảng Ninh', 120020373, 'Nam', '2000-10-27', 1171),
(18020022, 'Đặng Quang Huy', 'Hà Nội', 120020370, 'Nam', '2000-03-08', 1168),
(18020023, 'Ngô Đức Huy', 'Hà Nội', 120020371, 'Nam', '2000-05-13', 1169),
(18020025, 'Nguyễn Khánh', 'Hà Nội', 120020311, 'Nam', '2000-06-14', 1109),
(18020027, 'Nguyễn Tuấn Kiệt', 'Nam Định', 120020237, 'Nam', '2000-07-15', 1035),
(18020029, 'Bùi Quang Long', 'Hà Nội', 120020378, 'Nam', '2000-06-18', 1176),
(18020030, 'Nguyễn Nhật Long', 'Hà Nội', 120020381, 'Nam', '2000-08-09', 1179),
(18020031, 'Vương Hoàng Long', 'Hà Nội', 120020242, 'Nam', '2000-08-05', 1040),
(18020033, 'Lê Hồng Long', 'Bắc Ninh', 120020317, 'Nam', '2000-07-30', 1115),
(18020034, 'Ngô Xuân Long', 'Bắc Ninh', 120020240, 'Nam', '2000-10-22', 1038),
(18020039, 'Cao Duy Mạnh', 'Vĩnh Phúc', 120020382, 'Nam', '2000-12-19', 1180),
(18020042, 'Phạm Quang Minh', 'Hà Nội', 120020323, 'Nam', '2000-12-23', 1121),
(18020046, 'Lê Quang Quân', 'Nghệ An', 120020384, 'Nam', '2000-09-06', 1182),
(18020048, 'Trần Đức Tâm', 'Bắc Ninh', 120020260, 'Nam', '2000-05-03', 1058),
(18020049, 'Lại Ngọc Tân', 'Hải Phòng', 120020336, 'Nam', '2000-09-05', 1134),
(18020056, 'Nguyễn Tiến Trọng', 'Bắc Giang', 120020274, 'Nam', '2000-10-08', 1072),
(18020057, 'Nguyễn Xuân Trường', 'Liên Bang Nga', 120020392, 'Nam', '2000-06-28', 1190),
(18020058, 'Nguyễn Cẩm Tú', 'Hà Nội', 120020276, 'Nữ', '2000-12-20', 1074),
(18020060, 'Lê Đức Tùng', 'Thanh Hóa', 120020394, 'Nam', '2000-08-31', 1192),
(18020061, 'Trần Bá Tuyên', 'Tuyên Quang', 120020396, 'Nam', '2000-05-21', 1194),
(18020062, 'Hoàng Quốc Việt', 'Nam Định', 120020397, 'Nam', '2000-01-14', 1195),
(18020064, 'Nguyễn Thành Vinh', 'Hà Nội', 120020358, 'Nam', '2000-12-13', 1156),
(18020070, 'Trịnh Tuấn Hùng', 'Cao Bằng', 120020309, 'Nam', '1999-10-05', 1107),
(18020073, 'Trần Minh Toàn', 'Tuyên Quang', 120020349, 'Nam', '1999-12-20', 1147),
(18020105, 'Ngô Văn An', 'Hà Nội', 120020202, 'Nam', '2000-12-18', 1000),
(18020108, 'Nguyễn Văn An', 'Bắc Ninh', 120020280, 'Nam', '2000-07-02', 1078),
(18020113, 'Nguyễn Hoàng Anh', 'Hà Nội', 120020282, 'Nữ', '2000-01-30', 1080),
(18020120, 'Nguyễn Tấn Việt Anh', 'Hà Nội', 120020203, 'Nam', '2000-01-03', 1001),
(18020122, 'Trần Việt Anh', 'Hà Nội', 120020283, 'Nam', '2000-10-27', 1081),
(18020123, 'Vũ Duy Anh', 'Hà Nội', 120020362, 'Nam', '2000-09-16', 1160),
(18020153, 'Phạm Đức Anh', 'Hải Dương', 120020204, 'Nam', '2000-10-08', 1002),
(18020170, 'Lường Việt Anh', 'Thanh Hóa', 120020281, 'Nam', '2000-10-14', 1079),
(18020184, 'Nguyễn Hồ Bắc', 'Hà Nội', 120020205, 'Nam', '2000-09-19', 1003),
(18020187, 'Phan Bắc', 'Hòa Bình', 120020206, 'Nam', '2000-04-30', 1004),
(18020193, 'Lưu Xuân Bách', 'Nam Định', 120020284, 'Nam', '2000-05-21', 1082),
(18020195, 'Nguyễn An Bằng', 'Thái Bình', 120020363, 'Nam', '2000-10-11', 1161),
(18020197, 'Đỗ Minh Bằng', 'Hải Dương', 120020207, 'Nam', '2000-02-02', 1005),
(18020203, 'Nguyễn Gia Bảo', 'Hòa Bình', 120020285, 'Nam', '2000-12-10', 1083),
(18020220, 'Nguyễn Ninh Chi', 'Hưng Yên', 120020286, 'Nữ', '2000-06-20', 1084),
(18020221, 'Nguyễn Ngọc Chi', 'Hòa Bình', 120020208, 'Nữ', '2000-08-14', 1006),
(18020234, 'Đỗ Văn Chinh', 'Thái Bình', 120020209, 'Nam', '2000-11-25', 1007),
(18020243, 'Đào Đình Công', 'Bắc Ninh', 120020287, 'Nam', '2000-03-10', 1085),
(18020248, 'Nông Văn Cương', 'Cao Bằng', 120020210, 'Nam', '2000-10-31', 1008),
(18020255, 'Đồng Minh Cường', 'Bắc Giang', 120020288, 'Nam', '2000-01-12', 1086),
(18020261, 'Nguyễn Cao Cường', 'Nghệ An', 120020289, 'Nam', '2000-01-05', 1087),
(18020263, 'Lương Thế Đại', 'Thái Nguyên', 120020217, 'Nam', '2000-11-06', 1015),
(18020272, 'Lưu Hải Đăng', 'Nghệ An', 120020220, 'Nam', '2000-04-12', 1018),
(18020274, 'Bạch Trọng Đạo', 'Nghệ An', 120020295, 'Nam', '2000-04-04', 1093),
(18020285, 'Phạm Tiến Đạt', 'Hà Nội', 120020219, 'Nam', '1998-03-23', 1017),
(18020291, 'Nguyễn Thành Đạt', 'Bắc Giang', 120020218, 'Nam', '2000-06-02', 1016),
(18020293, 'Vũ Trọng Đạt', 'Hưng Yên', 120020296, 'Nam', '2000-05-15', 1094),
(18020319, 'Nguyễn Anh Đức', 'Hà Nội', 120020222, 'Nam', '2000-10-10', 1020),
(18020329, 'Vũ Minh Đức', 'Tuyên Quang', 120020299, 'Nam', '2000-03-28', 1097),
(18020331, 'Bùi Đăng Đức', 'Quảng Ninh', 120020221, 'Nam', '2000-07-30', 1019),
(18020341, 'Trần Mạnh Đức', 'Hà Nam', 120020223, 'Nam', '2000-10-06', 1021),
(18020345, 'Đỗ Trung Đức', 'Thái Bình', 120020297, 'Nam', '2000-04-03', 1095),
(18020353, 'Nguyễn Chương Đức', 'Nghệ An', 120020298, 'Nam', '2000-11-20', 1096),
(18020359, 'Lê Anh Dũng', 'Hà Nội', 120020212, 'Nam', '2000-10-29', 1010),
(18020361, 'Nguyễn Quốc Dũng', 'Hà Nội', 120020291, 'Nam', '2000-07-10', 1089),
(18020364, 'Nguyễn Mạnh Dũng', 'Hà Nội', 120020213, 'Nam', '2000-09-22', 1011),
(18020369, 'Phạm Mạnh Dũng', 'Hải Phòng', 120020214, 'Nam', '2000-02-22', 1012),
(18020380, 'Lê Tuấn Dũng', 'Thanh Hóa', 120020290, 'Nam', '2000-08-16', 1088),
(18020400, 'Vũ Đức Dương', 'Thái Bình', 120020294, 'Nam', '2000-03-19', 1092),
(18020402, 'Tô Hải Dương', 'Thái Bình', 120020216, 'Nam', '2000-08-19', 1014),
(18020406, 'Đoàn Đình Dương', 'Thanh Hóa', 120020293, 'Nam', '2000-06-17', 1091),
(18020409, 'Nguyễn Tiến Duy', 'Hà Nội', 120020292, 'Nam', '2000-10-01', 1090),
(18020413, 'Lê Quang Duy', 'Vĩnh Phúc', 120020364, 'Nam', '2000-12-30', 1162),
(18020432, 'Hoàng Văn Giáp', 'Thái Bình', 120020224, 'Nam', '2000-01-01', 1022),
(18020445, 'Đào Minh Hải', 'Lào Cai', 120020300, 'Nam', '2000-01-29', 1098),
(18020456, 'Phạm Xuân Hanh', 'Thái Bình', 120020301, 'Nam', '2000-12-10', 1099),
(18020466, 'Hoàng Văn Hậu', 'Hải Dương', 120020302, 'Nam', '2000-08-14', 1100),
(18020486, 'Đinh Trọng Hiếu', 'Hà Nội', 120020303, 'Nam', '2000-03-22', 1101),
(18020499, 'Đinh Ngọc Hiếu', 'Quảng Ninh', 120020225, 'Nam', '2000-12-10', 1023),
(18020525, 'Nguyễn Xuân Hòa', 'Hà Tây', 120020226, 'Nam', '2000-10-19', 1024),
(18020529, 'Hà Văn Hoài', 'Bắc Kạn', 120020304, 'Nam', '2000-12-18', 1102),
(18020535, 'Đào Minh Hoàn', 'Hải Phòng', 120020227, 'Nữ', '2000-07-28', 1025),
(18020539, 'Ngô Ngọc Hoàn', 'Nam Định', 120020367, 'Nam', '2000-03-07', 1165),
(18020556, 'Dương Minh Hoàng', 'Phú Thọ', 120020305, 'Nam', '2000-09-01', 1103),
(18020564, 'Phạm Văn Hoàng', 'Hà Nam', 120020306, 'Nam', '2000-05-28', 1104),
(18020571, 'Nguyễn Huy Hoàng', 'Thanh Hóa', 120020229, 'Nam', '2000-01-01', 1027),
(18020576, 'Đinh Lê Hoàng', 'Hà Tĩnh', 120020228, 'Nam', '2000-10-14', 1026),
(18020579, 'Trần Đức Huân', 'Hà Nam', 120020307, 'Nam', '2000-10-25', 1105),
(18020587, 'Nguyễn Mạnh Hùng', 'Hà Nội', 120020308, 'Nam', '2000-10-12', 1106),
(18020607, 'Đặng Tuấn Hưng', 'Hà Nội', 120020310, 'Nam', '2000-11-29', 1108),
(18020629, 'Chu Thái Huy', 'Hà Nội', 120020369, 'Nam', '2000-11-29', 1167),
(18020634, 'Phạm Khánh Huy', 'Hưng Yên', 120020231, 'Nam', '2000-09-23', 1029),
(18020645, 'Đoàn Văn Huy', 'Hải Dương', 120020230, 'Nam', '2000-07-09', 1028),
(18020666, 'Nguyễn Thanh Huyền', 'Nam Định', 120020372, 'Nữ', '2000-12-02', 1170),
(18020667, 'Hoàng Ngọc Huyền', 'Thanh Hóa', 120020232, 'Nữ', '2000-10-20', 1030),
(18020669, 'Bùi Xuân Khải', 'Hà Tây', 120020374, 'Nam', '2000-10-30', 1172),
(18020674, 'Cù Phúc Khang', 'Hà Nội', 120020375, 'Nam', '2000-08-15', 1173),
(18020695, 'Nguyễn Đức Khánh', 'Hải Dương', 120020376, 'Nam', '2000-12-11', 1174),
(18020707, 'Lê Quốc Khánh', 'Thanh Hóa', 120020233, 'Nam', '2000-09-02', 1031),
(18020711, 'Nguyễn Gia Khiêm', 'Hà Nội', 120020312, 'Nam', '2000-06-14', 1110),
(18020714, 'Lê Bỉnh Khiêm', 'Nam Định', 120020234, 'Nam', '2000-06-20', 1032),
(18020720, 'Nguyễn Hòa Khôi', 'Bắc Ninh', 120020313, 'Nam', '1997-06-16', 1111),
(18020721, 'Nguyễn Đức Khôi', 'Bắc Giang', 120020235, 'Nam', '2000-01-26', 1033),
(18020732, 'Đào Trung Kiên', 'Quảng Ninh', 120020236, 'Nam', '2000-08-29', 1034),
(18020740, 'Trịnh Thị Kim', 'Thanh Hóa', 120020314, 'Nữ', '2000-05-05', 1112),
(18020742, 'Nguyễn Xuân Lâm', 'Hà Tây', 120020238, 'Nam', '2000-10-22', 1036),
(18020750, 'Nguyễn Ngọc Lan', 'Hà Tây', 120020315, 'Nữ', '2000-04-23', 1113),
(18020767, 'Nguyễn Thị Ngọc Linh', 'Hải Dương', 120020316, 'Nữ', '2000-12-11', 1114),
(18020768, 'Phạm Ngọc Linh', 'Thái Bình', 120020239, 'Nữ', '2000-02-24', 1037),
(18020776, 'Nguyễn Thùy Linh', 'Nghệ An', 120020377, 'Nữ', '2000-04-03', 1175),
(18020784, 'Nguyễn Xuân Lộc', 'Thái Bình', 120020243, 'Nam', '2000-02-11', 1041),
(18020822, 'Nguyễn Ngọc Long', 'Vĩnh Phúc', 120020241, 'Nam', '2000-09-18', 1039),
(18020823, 'Nguyễn Cao Bảo Long', 'Hà Nội', 120020380, 'Nam', '2000-04-25', 1178),
(18020834, 'Lê Hoàng Long', 'Hải Dương', 120020379, 'Nam', '2000-10-13', 1177),
(18020853, 'Trương Hoàng Long', 'Thanh Hóa', 120020318, 'Nam', '2000-05-30', 1116),
(18020864, 'Nguyễn Đồng Lực', 'Nam Định', 120020244, 'Nam', '2000-01-16', 1042),
(18020874, 'Nguyễn Thị Mai', 'Thái Bình', 120020319, 'Nữ', '2000-12-17', 1117),
(18020878, 'Phùng Quốc Mạnh', 'Phú Thọ', 120020246, 'Nam', '2000-11-06', 1044),
(18020883, 'Nguyễn Huy Mạnh', 'Bắc Ninh', 120020320, 'Nam', '2000-11-03', 1118),
(18020886, 'Lê Đức Mạnh', 'Thanh Hoá', 120020245, 'Nam', '2000-11-14', 1043),
(18020893, 'Phạm Công Minh', 'Hà Nội', 120020248, 'Nam', '2000-08-05', 1046),
(18020896, 'Trần Khánh Minh', 'Hà Tây', 120020249, 'Nam', '2000-12-27', 1047),
(18020899, 'Nguyễn Lê Minh', 'Đà Nẵng', 120020247, 'Nam', '2000-12-16', 1045),
(18020908, 'Đào Đức Minh', 'Thái Bình', 120020321, 'Nam', '2000-12-05', 1119),
(18020914, 'Nguyễn Ngọc Minh', 'Hà Tĩnh', 120020322, 'Nam', '2000-08-16', 1120),
(18020921, 'Lưu Hoàng Nam', 'Quảng Ninh', 120020383, 'Nam', '2000-07-23', 1181),
(18020927, 'Trần Nguyễn Phương Nam', 'Phú Thọ', 120020252, 'Nam', '2000-09-21', 1050),
(18020928, 'Bùi Văn Nam', 'Phú Thọ', 120020324, 'Nam', '2000-05-10', 1122),
(18020930, 'Nguyễn Duy Nam', 'Bắc Giang', 120020325, 'Nam', '2000-02-09', 1123),
(18020931, 'Nguyễn Đăng Nam', 'Bắc Giang', 120020250, 'Nam', '2000-07-25', 1048),
(18020937, 'Nguyễn Thành Nam', 'Hưng Yên', 120020251, 'Nam', '2000-10-07', 1049),
(18020943, 'Trịnh Thị Nga', 'Hưng Yên', 120020253, 'Nữ', '2000-04-16', 1051),
(18020946, 'Đào Đình Nghĩa', 'Hưng Yên', 120020326, 'Nam', '2000-10-21', 1124),
(18020952, 'Tạ Quang Ngọc', 'Bắc Giang', 120020255, 'Nam', '2000-12-27', 1053),
(18020956, 'Phạm Thị Bích Ngọc', 'Hà Nam', 120020254, 'Nữ', '2000-10-22', 1052),
(18020960, 'Đặng Xuân Ngọc', 'Thanh Hóa', 120020327, 'Nam', '2000-11-15', 1125),
(18020964, 'Vương An Nguyên', 'Hà Nội', 120020328, 'Nam', '2000-08-20', 1126),
(18020983, 'Trần Thị Nhung', 'Hà Nam', 120020329, 'Nữ', '2000-10-27', 1127),
(18021008, 'Lưu Hải Phúc', 'Hải Phòng', 120020256, 'Nam', '2000-12-28', 1054),
(18021015, 'Vũ Minh Phụng', 'Thái Bình', 120020330, 'Nam', '2000-12-20', 1128),
(18021020, 'Nguyễn Đức Phương', 'Hà Tây', 120020331, 'Nam', '2000-11-13', 1129),
(18021026, 'Mai Thanh Phương', 'Thanh Hoá', 120020257, 'Nam', '2000-03-09', 1055),
(18021044, 'Nguyễn Minh Quang', 'Hà Tây', 120020332, 'Nam', '2000-09-11', 1130),
(18021060, 'Nguyễn Trọng Quốc', 'Hà Tĩnh', 120020258, 'Nam', '2000-07-18', 1056),
(18021074, 'Nguyễn Minh Sáng', 'Hà Tây', 120020333, 'Nam', '2000-08-01', 1131),
(18021076, 'Vương Tuấn Sơn', 'Hà Nội', 120020259, 'Nam', '2000-10-29', 1057),
(18021111, 'Nguyễn Đức Tài', 'Nghệ An', 120020334, 'Nam', '2000-07-07', 1132),
(18021117, 'Bùi Linh Tâm', 'Hải Dương', 120020335, 'Nam', '2000-11-07', 1133),
(18021120, 'Phạm Như Thiên Tân', 'Tỉnh Lạng Sơn', 120020261, 'Nam', '2000-01-04', 1059),
(18021129, 'Nguyễn Hồng Thái', 'Thái Nguyên', 120020337, 'Nam', '2000-12-11', 1135),
(18021132, 'Nguyễn Hồng Thái', 'Bắc Giang', 120020262, 'Nam', '2000-05-23', 1060),
(18021145, 'Nguyễn Đức Thắng', 'Vĩnh Phúc', 120020387, 'Nam', '2000-06-19', 1185),
(18021146, 'Nguyễn Đức Thắng', 'Bắc Giang', 120020342, 'Nam', '2000-03-25', 1140),
(18021147, 'Nguyễn Đức Thắng', 'Bắc Giang', 120020386, 'Nam', '2000-05-20', 1184),
(18021150, 'Vũ Hữu Thắng', 'Hưng Yên', 120020268, 'Nam', '2000-06-22', 1066),
(18021151, 'Nguyễn Minh Thắng', 'Nam Định', 120020267, 'Nam', '2000-09-04', 1065),
(18021158, 'Nguyễn Văn Thắng', 'Thanh Hóa', 120020343, 'Nam', '2000-02-15', 1141),
(18021160, 'Lê Đức Thắng', 'Thanh Hóa', 120020266, 'Nam', '2000-10-01', 1064),
(18021161, 'Vũ Văn Thắng', 'Thanh Hóa', 120020344, 'Nam', '2000-04-10', 1142),
(18021170, 'Nguyễn Tuấn Thành', 'Hà Nội', 120020340, 'Nam', '2000-10-04', 1138),
(18021175, 'Nguyễn Chí Thành', 'Hà Nội', 120020339, 'Nam', '2000-10-07', 1137),
(18021177, 'Nguyễn Minh Thành', 'Hà Tây', 120020264, 'Nam', '2000-05-31', 1062),
(18021183, 'Ngô Đức Thành', 'Bắc Ninh', 120020263, 'Nam', '2000-12-12', 1061),
(18021192, 'Đinh Kim Thành', 'Nam Định', 120020338, 'Nam', '2000-01-02', 1136),
(18021196, 'Lê Thị Thảo', 'Hà Tây', 120020385, 'Nữ', '2000-07-24', 1183),
(18021197, 'Nguyễn Trọng Thảo', 'Phú Thọ', 120020341, 'Nam', '2000-07-28', 1139),
(18021198, 'Nguyễn Phương Thảo', 'Thanh Hóa', 120020265, 'Nữ', '2000-06-10', 1063),
(18021208, 'Nguyễn Thị Thiêm', 'Bắc Giang', 120020269, 'Nữ', '2000-11-06', 1067),
(18021211, 'Hoàng Văn Thiện', 'Phú Thọ', 120020345, 'Nam', '2000-04-23', 1143),
(18021219, 'Hoàng Vũ Thiết', 'Thanh Hóa', 120020346, 'Nam', '2000-05-19', 1144),
(18021221, 'Nguyễn Hữu Thìn', 'Hà Nội', 120020388, 'Nam', '2000-02-05', 1186),
(18021231, 'Phạm Quang Thịnh', 'Thái Bình', 120020270, 'Nam', '2000-08-20', 1068),
(18021233, 'Tăng Đức Thịnh', 'Nghệ An', 120020389, 'Nam', '2000-12-16', 1187),
(18021242, 'Nguyễn Thị Hoài Thu', 'Thanh Hóa', 120020347, 'Nữ', '2000-02-01', 1145),
(18021250, 'Nguyễn Công Thuận', 'Hà Nội', 120020271, 'Nam', '2000-11-22', 1069),
(18021253, 'Phạm Ngọc Thuận', 'Nam Định', 120020348, 'Nam', '2000-07-17', 1146),
(18021258, 'Nguyễn Trọng Thường', 'Hải Dương', 120020272, 'Nam', '2000-01-28', 1070),
(18021292, 'Nguyễn Đức Tới', 'Hưng Yên', 120020273, 'Nam', '2000-09-08', 1071),
(18021301, 'Vũ Quỳnh Trang', 'Thái Bình', 120020390, 'Nữ', '2000-01-15', 1188),
(18021306, 'Lê Hữu Trí', 'Nghệ An', 120020350, 'Nam', '2000-02-13', 1148),
(18021313, 'Phạm Văn Trọng', 'Nam Định', 120020351, 'Nam', '2000-07-17', 1149),
(18021318, 'Vũ Thành Trung', 'Hà Nội', 120020275, 'Nam', '2000-04-09', 1073),
(18021335, 'Nguyễn Phú Trường', 'Sơn La', 120020391, 'Nam', '2000-07-27', 1189),
(18021337, 'Nguyễn Văn Trường', 'Vĩnh Phúc', 120020353, 'Nam', '2000-03-10', 1151),
(18021340, 'Dương Văn Trường', 'Bắc Giang', 120020352, 'Nam', '2000-07-25', 1150),
(18021348, 'Nguyễn Hoàng Tú', 'Hà Nội', 120020393, 'Nam', '2000-11-21', 1191),
(18021374, 'Đàm Anh Tuấn', 'Thái Bình', 120020277, 'Nam', '2000-02-24', 1075),
(18021376, 'Nguyễn Anh Tuấn', 'Thái Bình', 120020354, 'Nam', '2000-04-18', 1152),
(18021377, 'Nguyễn Anh Tuấn', 'Ninh Bình', 120020278, 'Nam', '2000-10-15', 1076),
(18021386, 'Lê Ngọc Tùng', 'Hà Nội', 120020356, 'Nam', '2000-11-24', 1154),
(18021388, 'Lê Trần Hải Tùng', 'Hà Nội', 120020395, 'Nam', '2000-09-04', 1193),
(18021406, 'Đinh Quang Tùng', 'Ninh Bình', 120020355, 'Nam', '2000-06-19', 1153),
(18021420, 'Lê Xuân Việt', 'Hưng Yên', 120020357, 'Nam', '2000-06-01', 1155),
(18021436, 'Trần Anh Vũ', 'Vĩnh Phúc', 120020359, 'Nam', '2000-01-15', 1157),
(18021442, 'Phạm Trường Vũ', 'Thái Bình', 120020279, 'Nam', '2000-01-30', 1077);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `style`
--

CREATE TABLE `style` (
  `styleCode` varchar(10) NOT NULL,
  `styleName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`readerCode`),
  ADD KEY `cardNumber` (`cardNumber`);

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
  MODIFY `readerCode` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18021443;

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
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`authorCode`) REFERENCES `authors` (`authorCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`styleCode`) REFERENCES `style` (`styleCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`publisherCode`) REFERENCES `publisher` (`publisherCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_4` FOREIGN KEY (`depotCode`) REFERENCES `depot` (`depotCode`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `reader`
--
ALTER TABLE `reader`
  ADD CONSTRAINT `reader_ibfk_1` FOREIGN KEY (`cardNumber`) REFERENCES `card` (`cardNumber`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

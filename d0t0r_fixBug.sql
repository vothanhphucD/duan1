-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2023 lúc 05:31 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1_help`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `account_id` int(123) NOT NULL,
  `account_firstName` varchar(20) NOT NULL,
  `account_lastName` varchar(50) NOT NULL,
  `account_sex` varchar(3) NOT NULL,
  `account_address` varchar(80) NOT NULL,
  `account_email` varchar(40) NOT NULL,
  `account_phone` varchar(10) NOT NULL,
  `account_pass` varchar(100) NOT NULL,
  `account_position` varchar(20) NOT NULL DEFAULT 'Khách hàng',
  `account_notify` varchar(100) NOT NULL,
  `account_status` varchar(30) NOT NULL DEFAULT 'Offline',
  `time_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`account_id`, `account_firstName`, `account_lastName`, `account_sex`, `account_address`, `account_email`, `account_phone`, `account_pass`, `account_position`, `account_notify`, `account_status`, `time_reg`) VALUES
(1, 'Ý', 'Nguyễn Tấn', 'Nam', '56a Cống Lỡ, Phường 15, Quận Tân Bình, TP Hồ Chí Minh', 'nguyentany.tricker@gmail.com', '0345123856', '000', 'Quản trị viên', '', 'Offline', '2023-11-05 10:00:11'),
(13, 'Test', 'TRần thị', '', '', 'tranthitest@gmail.com', '', '123', 'Khách hàng', '', 'Offline', '2023-12-01 02:47:06'),
(14, 'Test', 'Er', '', '123', 'tester01@test.com', '123', '123', 'Khách hàng', '', 'Offline', '2023-12-05 10:50:37'),
(15, 'Taans', 'Tesst', '', '148/3 Hùng vương easup đắk lắk', 'tanytest@gmail.com', '0388322426', '123', 'Khách hàng', '', 'Online', '2023-12-12 17:18:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(123) NOT NULL,
  `cart_name` varchar(100) NOT NULL,
  `cart_price` double(10,2) NOT NULL,
  `cart_img` varchar(100) NOT NULL,
  `cart_qty` int(3) NOT NULL,
  `product_id` int(123) NOT NULL,
  `account_id` int(123) NOT NULL,
  `shop_id` int(123) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_name`, `cart_price`, `cart_img`, `cart_qty`, `product_id`, `account_id`, `shop_id`, `time_reg`) VALUES
(236, 'Điện thoại realme 10 ', 30.00, 'view/images/product/realme-10-vang-1.jpg', 5, 31, 1, 0, '2023-12-01 02:41:47'),
(237, 'Điện thoại realme C51 64GB', 15.00, 'view/images/product/realme-c51-xanh-1-1.jpg', 1, 28, 1, 0, '2023-12-01 02:41:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(123) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_status` varchar(20) NOT NULL DEFAULT 'Không hoạt động',
  `time_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_status`, `time_reg`) VALUES
(1, 'Laptop', 'Đang hoạt động', '2023-11-05 09:39:37'),
(2, 'TV', 'Đang hoạt động', '2023-11-05 09:39:37'),
(3, 'Radio', 'Đang hoạt động', '2023-11-05 09:40:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount_code`
--

CREATE TABLE `discount_code` (
  `code_id` int(123) NOT NULL,
  `code_gift` varchar(30) NOT NULL,
  `code_reduced` int(2) NOT NULL,
  `code_qty` int(123) NOT NULL,
  `code_status` varchar(20) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discount_code`
--

INSERT INTO `discount_code` (`code_id`, `code_gift`, `code_reduced`, `code_qty`, `code_status`, `reg_time`) VALUES
(1, 'TanYVoucher', 30, 12, 'On', '2023-11-08 11:24:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_product`
--

CREATE TABLE `image_product` (
  `image_id` int(123) NOT NULL,
  `image_file` varchar(299) NOT NULL,
  `product_id` int(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image_product`
--

INSERT INTO `image_product` (`image_id`, `image_file`, `product_id`) VALUES
(76, 'view/images/product/iphone15.jpg', 1),
(169, 'view/images/product/iphone-15-2.jpg', 1),
(170, 'view/images/product/iphone-15-3.jpg', 1),
(171, 'view/images/product/iphone-15-4.jpg', 1),
(172, 'view/images/product/laptop1.jpg', 2),
(173, 'view/images/product/laptop2.jpg', 2),
(174, 'view/images/product/laptop3.jpg', 2),
(175, 'view/images/product/laptop4.jpg', 2),
(176, 'view/images/product/sp3.jpg', 7),
(177, 'view/images/product/sp3-2.jpg', 7),
(178, 'view/images/product/sp3-3.jpg', 7),
(179, 'view/images/product/sp3-4.jpg', 7),
(180, 'view/images/product/laptop9.jpg', 8),
(181, 'view/images/product/laptop9-2.jpg', 8),
(182, 'view/images/product/laptop9-3.jpg', 8),
(183, 'view/images/product/laptop9-4.jpg', 8),
(184, 'view/images/product/usb-3-2-64gb-kioxia-u366-1.jpg', 11),
(185, 'view/images/product/usb-3-2-64gb-kioxia-u366-2.jpg', 11),
(186, 'view/images/product/usb-3-2-64gb-kioxia-u366-3.jpg', 11),
(187, 'view/images/product/usb-3-2-64gb-kioxia-u366-5.jpg', 11),
(188, 'view/images/product/sac-du-phong-polymer-10000mah-type-c-p66d-xam-3-org.jpg', 13),
(189, 'view/images/product/sac-du-phong-polymer-10000mah-type-c-p66d-xam-4-org.jpg', 13),
(190, 'view/images/product/sac-du-phong-polymer-10000mah-type-c-p66d-xam-5-org.jpg', 13),
(191, 'view/images/product/sac-du-phong-polymer-10000mah-type-c-p66d-xam-6-org.jpg', 13),
(192, 'view/images/product/mieng-dan-kinh-cuong-luc-chong-anh-sang-xanh-iphone-15-jcpal-1.jpg', 14),
(193, 'view/images/product/mieng-dan-kinh-cuong-luc-chong-anh-sang-xanh-iphone-15-jcpal-2.jpg', 14),
(194, 'view/images/product/mieng-dan-kinh-cuong-luc-chong-anh-sang-xanh-iphone-15-jcpal-3.jpg', 14),
(195, 'view/images/product/mieng-dan-kinh-cuong-luc-chong-anh-sang-xanh-iphone-15-jcpal-4.jpg', 14),
(196, 'view/images/product/bo-2-moc-dien-thoai-deo-osmia-ck-crs1-meo-hoa-den-1-org.jpg', 15),
(197, 'view/images/product/bo-2-moc-dien-thoai-deo-osmia-ck-crs1-meo-hoa-den-2-org.jpg', 15),
(198, 'view/images/product/bo-2-moc-dien-thoai-deo-osmia-ck-crs1-meo-hoa-den-3-org.jpg', 15),
(199, 'view/images/product/bo-2-moc-dien-thoai-deo-osmia-ck-crs1-meo-hoa-den-4-org.jpg', 15),
(200, 'view/images/product/ban-phim-co-bluetooth-dareu-ek75-pro-1.jpg', 16),
(201, 'view/images/product/ban-phim-co-bluetooth-dareu-ek75-pro-2.jpg', 16),
(202, 'view/images/product/ban-phim-co-bluetooth-dareu-ek75-pro-3.jpg', 16),
(203, 'view/images/product/ban-phim-co-bluetooth-dareu-ek75-pro-4.jpg', 16),
(204, 'view/images/product/the-nho-chuyen-camera-sandisk-microsd-256gb-class-10-u3-1.jpg', 18),
(205, 'view/images/product/the-nho-chuyen-camera-sandisk-microsd-256gb-class-10-u3-2.jpg', 18),
(206, 'view/images/product/the-nho-chuyen-camera-sandisk-microsd-256gb-class-10-u3-3.jpg', 18),
(207, 'view/images/product/the-nho-chuyen-camera-sandisk-microsd-256gb-class-10-u3-4.jpg', 18),
(208, 'view/images/product/tai-nghe-bluetooth-chup-tai-jbl-tune-520bt-den-1.jpg', 19),
(209, 'view/images/product/tai-nghe-bluetooth-chup-tai-jbl-tune-520bt-den-2.jpg', 19),
(210, 'view/images/product/tai-nghe-bluetooth-chup-tai-jbl-tune-520bt-den-3.jpg', 19),
(211, 'view/images/product/tai-nghe-bluetooth-chup-tai-jbl-tune-520bt-den-4.jpg', 19),
(212, 'view/images/product/ban-phim-co-co-day-gaming-razer-blackwidow-v3-2-1-org.jpg', 20),
(213, 'view/images/product/ban-phim-co-co-day-gaming-razer-blackwidow-v3-3-1-org.jpg', 20),
(214, 'view/images/product/ban-phim-co-co-day-gaming-razer-blackwidow-v3-4-1-org.jpg', 20),
(215, 'view/images/product/ban-phim-co-co-day-gaming-razer-blackwidow-v3-5-1-org.jpg', 20),
(216, 'view/images/product/asus-tuf-gaming-f15-fx506he-i7-hn378w-1.jpg', 21),
(217, 'view/images/product/asus-tuf-gaming-f15-fx506he-i7-hn378w-2.jpg', 21),
(218, 'view/images/product/asus-tuf-gaming-f15-fx506he-i7-hn378w-3.jpg', 21),
(219, 'view/images/product/asus-tuf-gaming-f15-fx506he-i7-hn378w-4.jpg', 21),
(220, 'view/images/product/acer-aspire-5-a515-58gm-51lb-i5-nxkq4sv002-glr-1.jpg', 22),
(221, 'view/images/product/acer-aspire-5-a515-58gm-51lb-i5-nxkq4sv002-glr-2.jpg', 22),
(222, 'view/images/product/acer-aspire-5-a515-58gm-51lb-i5-nxkq4sv002-glr-3.jpg', 22),
(223, 'view/images/product/acer-aspire-5-a515-58gm-51lb-i5-nxkq4sv002-glr-4.jpg', 22),
(228, 'view/images/product/msi-gaming-gf63-thin-12ve-i5-460vn-glr-1.jpg', 25),
(229, 'view/images/product/msi-gaming-gf63-thin-12ve-i5-460vn-glr-2.jpg', 25),
(230, 'view/images/product/msi-gaming-gf63-thin-12ve-i5-460vn-glr-3.jpg', 25),
(231, 'view/images/product/msi-gaming-gf63-thin-12ve-i5-460vn-glr-4.jpg', 25),
(232, 'view/images/product/tai-nghe-bluetooth-airpods-3-lightning-charge-apple-mpny3-trang-1.jpg', 26),
(233, 'view/images/product/tai-nghe-bluetooth-airpods-3-lightning-charge-apple-mpny3-trang-2.jpg', 26),
(234, 'view/images/product/tai-nghe-bluetooth-airpods-3-lightning-charge-apple-mpny3-trang-3.jpg', 26),
(235, 'view/images/product/tai-nghe-bluetooth-airpods-3-lightning-charge-apple-mpny3-trang-4.jpg', 26),
(236, 'view/images/product/realme-c53-gold-1.jpg', 27),
(237, 'view/images/product/realme-c53-gold-2.jpg', 27),
(238, 'view/images/product/realme-c53-gold-3.jpg', 27),
(239, 'view/images/product/realme-c53-gold-4.jpg', 27),
(240, 'view/images/product/realme-c51-xanh-1-1.jpg', 28),
(241, 'view/images/product/realme-c51-xanh-4-1.jpg', 28),
(242, 'view/images/product/realme-c51-xanh-5.jpg', 28),
(243, 'view/images/product/realme-c51-xanh-2.jpg', 28),
(244, 'view/images/product/iphone-12-pro-xam-1-org.jpg', 29),
(245, 'view/images/product/iphone-12-pro-xam-2-org.jpg', 29),
(246, 'view/images/product/iphone-12-pro-xam-3-org.jpg', 29),
(247, 'view/images/product/iphone-12-pro-xam-4-org.jpg', 29),
(252, 'view/images/product/realme-10-vang-1.jpg', 31),
(253, 'view/images/product/realme-10-vang-2.jpg', 31),
(254, 'view/images/product/realme-10-vang-3.jpg', 31),
(255, 'view/images/product/realme-10-vang-4.jpg', 31);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `new`
--

CREATE TABLE `new` (
  `new_id` int(123) NOT NULL,
  `new_title` varchar(100) NOT NULL,
  `news_content` varchar(299) NOT NULL,
  `news_img` varchar(100) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `new`
--

INSERT INTO `new` (`new_id`, `new_title`, `news_content`, `news_img`, `reg_time`) VALUES
(1, 'Nước ép rau quả nào giúp giảm cân?', 'Tôi đang muốn giảm cân, nên dùng loại nước ép rau quả nào và lưu ý gì để an toàn, hiệu quả? (Xuân Đào, Vũng Tàu)\r\n\r\nTrả lời:\r\n\r\nNước ép từ trái cây, rau xanh chứa các dưỡng chất và chất chống oxy hóa quan trọng nhưng thường không có chất xơ (trừ trường hợp xay nhuyễn rau quả hoàn toàn). Một số loại', '1.png', '2023-11-05 09:48:56'),
(2, 'Ăn rau quả gì giảm đau đầu?', 'Tôi hay căng thẳng, đau đầu, thích ăn rau củ quả, nên chọn những loại nào để cải thiện tình trạng này? (Trần Hạnh, TP HCM)\r\n\r\nTrả lời:\r\n\r\nĐau đầu xảy ra do nhiều nguyên nhân như mệt mỏi, căng thẳng, thời tiết, các bệnh lý liên quan. Chọn thực phẩm đúng cách giúp giảm đau đầu.\r\n\r\nBan nên ưu tiên ăn ', '2.png', '2023-11-05 09:48:56'),
(3, 'Có nên gọt vỏ trái cây, rau củ?', 'Vỏ quả táo, cà rốt chứa nhiều dưỡng chất, có thể ăn mà không nên loại bỏ, trong khi trái cây có múi, bơ, bí đỏ, dưa gang cần gọt trước khi ăn.\r\n\r\nĂn nhiều trái cây và rau củ có thể mang đến nhiều lợi ích cho sức khỏe. Nhiều người đến khám dinh dưỡng băn khoăn có nên bỏ vỏ trái cây trước khi ăn để t', '3.png', '2023-11-05 10:04:38'),
(4, '7 loại rau củ giúp giảm viêm, ngừa lão hóa', 'Tỏi, hành tây, cà rốt, rau lá xanh, ớt chuông… là những loại rau củ vừa có giá trị dinh dưỡng vừa chứa các chất giúp giảm viêm, ngừa lão hóa.\r\n\r\nTình trạng viêm xảy ra khi một người bị thương hoặc bị bệnh. Tình trạng viêm trở thành mạn tính khi cơ thể tiếp tục xuất hiện biểu hiện viêm nhiễm ngay cả', '4.png', '2023-11-05 10:04:38'),
(5, 'Các chất trong thực phẩm góp phần bảo vệ tế bào\r\n', 'Rau lá xanh, quả mọng, đậu, cà chua, cà rốt chứa chất chống oxy hóa, chất xơ… góp phần giúp tế bào hạn chế đột biến, làm chậm tiến triển của chúng.\r\n\r\nChế độ ăn uống lành mạnh có thể hỗ trợ hệ thống miễn dịch và giúp cơ thể chống lại bệnh tật. Chế độ ăn uống cân bằng thường có trái cây, rau, ngũ cố', '5.png', '2023-11-05 10:04:38'),
(6, 'Ăn chay đúng cách giảm nguy cơ mắc nhiều bệnh', 'Giảm nguy cơ mắc bệnh ung thư tiêu hóa, tăng cường trao đổi chất, có lợi cho gan... là những lợi ích do ăn chay mang lại.\r\n\r\nĂn chay ngày càng phổ biến ở nhiều lứa tuổi. Bác sĩ Đào Trần Tiến (Phó khoa Tiêu hóa, Bệnh viện Đa khoa Tâm Anh Hà Nội) cho biết ăn chay có thể cung cấp các chất dinh dưỡng t', '6.png', '2023-11-05 10:04:38'),
(7, 'Vì sao ăn khoai tây có mầm, chuyển màu xanh có thể gây ngộ độc?', 'Tôi nghe nói khoai tây mọc mầm, vỏ chuyển sang màu xanh là rất độc không ăn được, xin hỏi bác sĩ vì sao, có thể gọt bớt đi để ăn không? ( Lê Tuyết , 38 tuổi, ở Bình Dương )\r\nPhó giáo sư, tiến sĩ, bác sĩ Lâm Vĩnh Niên, Trưởng khoa Dinh dưỡng, tiết chế, Bệnh viện Đại học Y Dược TP.HCM, trả lời:\r\n\r\nMầ', '7.png', '2023-11-05 10:04:38'),
(8, 'Lợi ích khi cho trẻ ăn đu đủ', 'Đu đủ không chỉ là loại trái cây ăn dặm tốt dành cho trẻ, có thể mang đến nhiều lợi ích như hỗ trợ hệ tiêu hóa, giảm táo bón.\r\n\r\nViệc đưa thức ăn đặc như trái cây và rau củ vào chế độ ăn dặm có thể giúp trẻ tránh tình trạng kén ăn; đồng thời, giảm nguy cơ mắc các vấn đề về ăn uống, béo phì và dị ứn', '8.png', '2023-11-05 10:04:38'),
(9, 'Giàn nho Pháp trĩu quả trên ban công chưa đầy 5m2', 'Mê trồng nho nhưng không có nhiều diện tích, người phụ nữ ở TP.HCM đã biến ban công rộng chưa đầy 5m vuông của căn nhà thành giàn nho Pháp lúc lỉu trái.\r\nGiàn nho trên ban công\r\n\r\nMở cửa cho con gái út ra ban công tầng 1, chị Lê Thị Tới (ngụ Quận Tân Bình, TP.HCM) để cho bé gái vít cành, hái những ', '9.png', '2023-11-05 10:04:38'),
(10, 'Bắp cải Trung Quốc màu lạ, tới tấp đặt mua, rước về đón Tết', 'Loại bắp cải Trung Quốc có màu sắc sặc sỡ với giá bán lên tới cả 100 nghìn đồng mỗi cây đang được các chị em tới tấp đặt mua chơi Tết này dù không ăn được.\r\n\r\nBắp cải vốn là loại rau quen thuộc với người Việt, đặc biệt là vào mùa Đông. Giá bắp cải chỉ dao động từ 10.000-30.000 đồng/kg/cây. Một số g', '10.png', '2023-11-05 10:04:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(123) NOT NULL,
  `order_total` double(10,2) NOT NULL,
  `order_pay` varchar(15) NOT NULL,
  `order_note` varchar(299) NOT NULL DEFAULT 'Không có ghi chú',
  `order_status` varchar(30) NOT NULL DEFAULT 'Đang chờ duyệt',
  `account_id` int(123) NOT NULL,
  `time_reg` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_total`, `order_pay`, `order_note`, `order_status`, `account_id`, `time_reg`) VALUES
(128, 64.00, 'Tiền mặt', 'Nhớ đùm bọc', 'Giao thành công', 1, '2023-12-14'),
(129, 18.20, 'Tiền mặt', 'qweqwqdasdsa', 'Giao thành công', 1, '2023-11-30'),
(130, 78.00, 'Tiền mặt', '78', 'Đang giao hàng', 1, '2023-12-01'),
(131, 18.20, 'Tiền mặt', 'Nhớ bỏ dưa chua', 'Đang giao hàng', 13, '2023-12-01'),
(132, 60.90, 'Tiền mặt', '60.9', 'Đang chờ duyệt', 14, '2023-12-05'),
(133, 60.00, 'Tiền mặt', '60', 'Đã duyệt', 14, '2023-12-05'),
(134, 45.00, 'Tiền mặt', '45', 'Đang chờ duyệt', 14, '2023-12-05'),
(135, 19.00, 'Tiền mặt', '19', 'Đang chờ duyệt', 14, '2023-12-05'),
(136, 15.00, 'Chuyển khoản', 'sda', 'Đã hủy', 14, '2023-12-05'),
(137, 19.00, 'Tiền mặt', '19', 'Giao thành công', 15, '2023-12-13'),
(138, 21.00, 'Chuyển khoản', '21', 'Đang chờ duyệt', 15, '2023-12-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `details_id` int(123) NOT NULL,
  `details_name` varchar(100) NOT NULL,
  `details_price` double(10,2) NOT NULL,
  `details_img` varchar(299) NOT NULL,
  `details_qty` int(3) NOT NULL,
  `details_feedback` int(1) NOT NULL DEFAULT 0,
  `product_id` int(123) NOT NULL,
  `order_id` int(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`details_id`, `details_name`, `details_price`, `details_img`, `details_qty`, `details_feedback`, `product_id`, `order_id`) VALUES
(153, 'Pin sạc dự phòng Polymer 10000mAh Không dây ', 16.00, 'view/images/product/sac-du-phong-polymer-10000mah-type-c-p66d-xam-3-org.jpg', 4, 1, 13, 128),
(156, 'Laptop MSI Gaming GF63 Thin 12VE i5 ', 21.00, 'view/images/product/msi-gaming-gf63-thin-12ve-i5-460vn-glr-1.jpg', 1, 0, 25, 130),
(157, 'Tai nghe Bluetooth AirPods 3 Lightning Charge Apple', 19.00, 'view/images/product/tai-nghe-bluetooth-airpods-3-lightning-charge-apple-mpny3-trang-1.jpg', 1, 0, 26, 130),
(161, 'Laptop MSI Gaming GF63 Thin 12VE i5 ', 21.00, 'view/images/product/msi-gaming-gf63-thin-12ve-i5-460vn-glr-1.jpg', 2, 0, 25, 132),
(162, 'Bộ 2 móc điện thoại nhựa dẻo OSMIA CK-CRS1', 15.00, 'view/images/product/bo-2-moc-dien-thoai-deo-osmia-ck-crs1-meo-hoa-den-1-org.jpg', 4, 0, 15, 133),
(166, 'Miếng dán kính cường lực chống ánh sáng xanh', 15.00, 'view/images/product/mieng-dan-kinh-cuong-luc-chong-anh-sang-xanh-iphone-15-jcpal-1.jpg', 1, 0, 14, 136),
(167, 'Tai nghe Bluetooth AirPods 3 Lightning Charge Apple', 19.00, 'view/images/product/tai-nghe-bluetooth-airpods-3-lightning-charge-apple-mpny3-trang-1.jpg', 1, 1, 26, 137),
(168, 'Laptop MSI Gaming GF63 Thin 12VE i5 ', 21.00, 'view/images/product/msi-gaming-gf63-thin-12ve-i5-460vn-glr-1.jpg', 1, 0, 25, 138);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(123) NOT NULL,
  `product_name` varchar(299) NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_del` double(10,2) NOT NULL DEFAULT 0.00,
  `product_qty` int(3) NOT NULL,
  `product_view` int(123) NOT NULL,
  `product_sold` int(123) NOT NULL,
  `product_des` longblob NOT NULL,
  `category_id` int(123) NOT NULL,
  `time_reg` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_del`, `product_qty`, `product_view`, `product_sold`, `product_des`, `category_id`, `time_reg`) VALUES
(1, 'Điện thoại iPhone 15 Pro Max 256GB', 21.00, 17.00, 0, 27, 123, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 3, '2023-11-05'),
(2, 'Laptop Acer Aspire 7 Gaming A715 76G', 15.00, 10.00, 0, 16, 12, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 3, '2023-11-05'),
(7, 'OPPA A38', 39.00, 0.00, 296, 15, 123, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 3, '2023-11-05'),
(8, 'Laptop Asus TUF Gaming F15 FX507ZC4 i5', 32.00, 0.00, 200, 10, 41, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 3, '2023-11-05'),
(11, 'USB 3.2 64GB Kioxia U366 ', 23.00, 0.00, 100, 10, 12, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 3, '2023-11-05'),
(13, 'Pin sạc dự phòng Polymer 10000mAh Không dây ', 18.00, 16.00, 94, 14, 1451, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, '2023-11-05'),
(14, 'Miếng dán kính cường lực chống ánh sáng xanh', 18.00, 0.00, 200, 10, 123, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, '2023-11-05'),
(15, 'Bộ 2 móc điện thoại nhựa dẻo OSMIA CK-CRS1', 36.00, 30.00, 299, 10, 123, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, '2023-11-05'),
(16, 'Bàn Phím Cơ Bluetooth Dareu EK75 Pro ', 26.00, 0.00, 200, 10, 123, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, '2023-11-05'),
(18, 'Thẻ nhớ chuyên Camera Sandisk MicroSD 256GB', 32.00, 0.00, 200, 10, 0, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, '2023-11-05'),
(19, 'Tai nghe Bluetooth Chụp Tai JBL Tune 520BT', 30.00, 0.00, 200, 11, 0, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, '2023-11-05'),
(20, 'Bàn Phím Cơ Có Dây Gaming Razer BlackWidow V3', 28.00, 0.00, 200, 10, 0, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, '2023-11-05'),
(21, 'Laptop Asus TUF Gaming F15 FX506HE i7', 24.00, 0.00, 100, 13, 0, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, '2023-11-05'),
(22, 'Laptop Acer Aspire 5 Gaming A515 58GM 51LB i5', 37.00, 0.00, 200, 10, 0, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, '2023-11-05'),
(25, 'Laptop MSI Gaming GF63 Thin 12VE i5 ', 21.00, 0.00, 55, 111, 0, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 1, '2023-11-05'),
(26, 'Tai nghe Bluetooth AirPods 3 Lightning Charge Apple', 19.00, 0.00, 191, 30, 0, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 1, '2023-11-05'),
(27, 'realme C53 (8GB/256GB', 30.00, 0.00, 200, 10, 0, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 1, '2023-11-05'),
(28, 'Điện thoại realme C51 64GB', 15.00, 0.00, 200, 12, 0, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 1, '2023-11-05'),
(29, 'Iphone 12Pro', 21.00, 0.00, 171, 190, 0, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 1, '2023-11-05'),
(31, 'Điện thoại realme 10 ', 30.00, 0.00, 181, 99, 0, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 1, '2023-11-05'),
(40, 'Test add', 120.00, 0.00, 10, 0, 0, 0x53e1baa36e207068e1baa96d2062c3a16e206368e1baa179206e68e1baa57420f09f9898f09f9898f09f9898f09f94b1f09f94b1f09f94b1f09f94b1, 2, '2023-12-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rate`
--

CREATE TABLE `rate` (
  `rate_id` int(123) NOT NULL,
  `rate_comment` varchar(100) NOT NULL,
  `rate_star` int(1) NOT NULL,
  `product_id` int(123) NOT NULL,
  `account_id` int(123) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rate`
--

INSERT INTO `rate` (`rate_id`, `rate_comment`, `rate_star`, `product_id`, `account_id`, `time_reg`) VALUES
(17, 'Ổn đó', 4, 13, 1, '2023-12-01 01:57:58'),
(18, 'Oke ổn áp', 4, 26, 15, '2023-12-12 17:24:44');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `discount_code`
--
ALTER TABLE `discount_code`
  ADD PRIMARY KEY (`code_id`);

--
-- Chỉ mục cho bảng `image_product`
--
ALTER TABLE `image_product`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `new`
--
ALTER TABLE `new`
  ADD PRIMARY KEY (`new_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`details_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `discount_code`
--
ALTER TABLE `discount_code`
  MODIFY `code_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `image_product`
--
ALTER TABLE `image_product`
  MODIFY `image_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT cho bảng `new`
--
ALTER TABLE `new`
  MODIFY `new_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `details_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `image_product`
--
ALTER TABLE `image_product`
  ADD CONSTRAINT `image_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

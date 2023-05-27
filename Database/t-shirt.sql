-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 22, 2023 lúc 10:10 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `t-shirt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `stock_id` int(10) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `stock_id`, `created_at`, `updated_at`, `active`) VALUES
(1, 'T-shirt', 'Thoải mái, phù hợp nhiều lứa tuổi', 1, '2022-10-30', '2022-10-30', 1),
(2, 'Sweatshirt', 'Sweatshirt có thể được dùng trong nhiều tình huống khác nhau, bạn có thể sử dụng sweatshirt trong những mùa lạnh, dịp xuân, đón tết, picnic, thay cho áo khoác vào mùa đông', 5, '2022-11-18', '2022-11-18', 1),
(3, 'Long Sleeve Shirts', 'Co dãn thoải mái', 3, '2022-11-18', '2022-11-18', 1),
(4, 'Polo', 'Năng động, trẻ trung, thời thượng', 2, '2022-11-18', '2022-11-18', 1),
(5, 'Tank Top', 'Thoải mái, thoáng mát, năng động', 3, '2022-11-18', '2022-11-18', 1),
(6, 'Hoodie', 'Lựa chọn của nhiều bạn trẻ', 4, '2022-11-18', '2022-11-18', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`) VALUES
(1, 'Black'),
(2, 'Light Blue'),
(3, 'White'),
(4, 'Blue'),
(5, 'Yellow'),
(6, 'Purple'),
(7, 'Pink'),
(8, 'Gray'),
(9, 'Brown'),
(10, 'Navy'),
(11, 'Dark Green'),
(12, 'Silver'),
(13, 'Orange'),
(14, 'Dark Gray'),
(15, 'Olive'),
(16, 'Off-noir'),
(17, 'Red');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedbacks`
--

CREATE TABLE `feedbacks` (
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `content` varchar(500) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices_in`
--

CREATE TABLE `invoices_in` (
  `user_id` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `quantity` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `price` int(11) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `emp_id` int(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `payment_id` int(10) DEFAULT NULL,
  `active` int(2) NOT NULL DEFAULT 0,
  `phone` int(12) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `note` text DEFAULT NULL,
  `customer_id` int(10) NOT NULL,
  `cus_name` text DEFAULT NULL,
  `total` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `emp_id`, `address`, `payment_id`, `active`, `phone`, `updated_at`, `created_at`, `note`, `customer_id`, `cus_name`, `total`) VALUES
(4, 4, 'Hưng Phong, TP Hồ Chí Minh, Bến Tre, Việt Nam', 1, -1, 983675461, '2022-12-15', '2022-12-07', '', 2, 'Huỳnh Cường', 3853000),
(5, 4, 'Ấp 1 Hưng Phong', 1, 2, 983675461, '2022-12-07', '2022-12-07', 'Hàng dễ vỡ', 2, NULL, NULL),
(6, 4, 'Hưng Phong, TP Hồ Chí Minh, Bến Tre, Việt Nam', 1, 2, 983675461, '2022-12-11', '2022-12-07', '', 2, 'Huỳnh Cường', 399000),
(7, 4, '603 An Duong Vuong, Quan 5, TPHCM, Việt Nam', 1, 3, 335878255, '2022-12-09', '2022-12-09', 'Khong', 2, 'Huỳnh Cường', 17095000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(5) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `created_at`, `updated_at`, `active`) VALUES
(5, 8, 1, '2022-12-07', '2022-12-07', 1),
(6, 7, 1, '2022-12-07', '2022-12-07', 1),
(7, 1, 1, '2022-12-11', '2022-12-11', 1),
(4, 6, 1, '2022-12-12', '2022-12-12', 1),
(4, 3, 6, '2022-12-15', '2022-12-15', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `name`, `description`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Cash', 'Truyền thống, ít rủi ro', '2022-11-18', '2022-11-18', 1),
(2, 'MOMO', 'Ví điện tử được sử dung rộng rãi, thanh toán nhanh chóng', '2022-11-18', '2022-11-18', 1),
(3, 'VNPAY', 'Ứng dụng hiện đại, đột phá trong thanh toán', '2022-11-18', '2022-11-18', 1),
(4, 'Internet Banking', 'Thanh toán trực tiếp từ tài khoản ngân hàng', '2022-11-18', '2022-11-18', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cate_id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(6) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `cate_id`, `supplier_id`, `price`, `quantity`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Nike Sportswear Air\r\n', 3, 1, 2039000, 14, 'images/t-shirt/NikeSportswearAi.jpeg', 'Bộ sưu tập Nike Air tôn vinh những đôi giày thể thao huyền thoại đã giúp định hình thương hiệu Swoosh trong nhiều thập kỷ. Đội mũ trùm đầu kiểu Pháp này được làm từ vải lông cừu dày để mang lại cảm giác ấm áp mềm mại và sự thoải mái kéo dài. Hình ảnh đồ h', '2022-10-30', '2022-10-30'),
(2, 'Jordan Flight Heritage\r\n', 3, 1, 3419000, 15, 'images/t-shirt/JordanFlightHeritage.jpeg', 'Hãy để trò chơi phong cách của bạn cất cánh với chiếc áo hoodie thoải mái này. Bạn có thể đang khởi động trên sân đấu hoặc đi ăn trưa với một vài người bạn—dù bằng cách nào, trang phục của bạn sẽ trở nên sống động với những mảng in đá tinh tế tương phản.', '2022-11-18', '2022-11-18'),
(3, 'Nike Sportswear Club\r\n', 1, 1, 559000, 20, 'images/t-shirt/NikeSportswearclubRed.jpeg', 'Áo thun Nike Sportswear Club được làm bằng vải cotton hàng ngày của chúng tôi và kiểu dáng vừa vặn cổ điển, mang lại cảm giác quen thuộc ngay khi lấy ra khỏi túi. Logo Futura thêu trên ngực mang đến vẻ ngoài đặc trưng của Nike.', '2022-11-18', '2022-11-18'),
(4, 'Áo Polo Dry Vải Pique Ngắn Tay', 4, 8, 489000, 11, 'images/t-shirt/poloDryNavy.jpeg', 'Các đường sọc trên cổ áo tạo thêm điểm nhấn cho phong cách. Hoàn hảo cho các môn thể thao hoặc trang phục bình thường.', '2022-11-18', '2022-11-18'),
(5, 'Modern Apocalypse Hoodie', 6, 3, 670000, 21, 'images/t-shirt/mordenApocalypseSuedeBoxyHoodie.jpeg', 'Vải chính là chất liệu da lộn – chất liệu đã phát triển ở RIOT trong 4 năm qua\r\nForm dáng boxy dễ dàng phù hợp với nhiều dáng người\r\nTất cả các hình thêu đều được thêu bằng kĩ thuật thêu vi tính – đảm bảo độ chính xác cao', '2022-11-19', '2022-11-19'),
(6, 'Clownz Academy SweatShirt', 2, 8, 499000, 23, 'images/t-shirt/clownzAcademySweatShirtBlack.jpeg', '', '2022-11-19', '2022-11-19'),
(7, 'Clownz Graffiti Tag POLO\r\n', 4, 8, 399000, 44, 'images/t-shirt/clownzGraffitiTagPoloBlack.jpeg', '', '2022-11-19', '2022-11-19'),
(8, 'Candles Party Tshirt\r\n', 1, 5, 399000, 120, 'images/t-shirt/CandlesPartyNeverEndTshirt.jpeg', '', '2022-11-19', '2022-11-19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id` int(10) NOT NULL,
  `size` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_details`
--

INSERT INTO `product_details` (`id`, `size`, `color`, `description`, `pro_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '', 1, '2022-11-18', '2022-11-18'),
(2, 2, 1, '', 1, '2022-11-18', '2022-11-18'),
(3, 3, 1, '', 1, '2022-11-18', '2022-11-18'),
(4, 4, 1, '', 1, '2022-11-18', '2022-11-18'),
(5, 5, 1, '', 1, '2022-11-18', '2022-11-18'),
(6, 1, 2, '', 1, '2022-11-18', '2022-11-18'),
(7, 2, 2, '', 1, '2022-11-18', '2022-11-18'),
(8, 3, 2, '', 1, '2022-11-18', '2022-11-18'),
(9, 4, 2, '', 1, '2022-11-18', '2022-11-18'),
(10, 5, 2, '', 1, '2022-11-18', '2022-11-18'),
(11, 1, 9, '', 1, '2022-11-18', '2022-11-18'),
(12, 2, 9, '', 1, '2022-11-18', '2022-11-18'),
(13, 3, 9, '', 1, '2022-11-18', '2022-11-18'),
(14, 4, 9, '', 1, '2022-11-18', '2022-11-18'),
(15, 5, 9, '', 1, '2022-11-18', '2022-11-18'),
(17, 1, 16, '', 2, '2022-11-18', '2022-11-18'),
(18, 2, 16, '', 2, '2022-11-18', '2022-11-18'),
(19, 3, 16, '', 2, '2022-11-18', '2022-11-18'),
(20, 4, 16, '', 2, '2022-11-18', '2022-11-18'),
(21, 5, 16, '', 2, '2022-11-18', '2022-11-18'),
(22, 1, 2, '', 3, '2022-11-18', '2022-11-18'),
(27, 2, 2, '', 3, '2022-11-18', '2022-11-18'),
(28, 3, 2, '', 3, '2022-11-18', '2022-11-18'),
(29, 4, 2, '', 3, '2022-11-18', '2022-11-18'),
(30, 5, 2, '', 3, '2022-11-18', '2022-11-18'),
(31, 1, 17, '', 3, '2022-11-18', '2022-11-18'),
(32, 2, 17, '', 3, '2022-11-18', '2022-11-18'),
(33, 3, 17, '', 3, '2022-11-18', '2022-11-18'),
(34, 4, 17, '', 3, '2022-11-18', '2022-11-18'),
(35, 5, 17, '', 3, '2022-11-18', '2022-11-18'),
(36, 1, 10, '', 4, '2022-11-18', '2022-11-18'),
(37, 2, 10, '', 4, '2022-11-18', '2022-11-18'),
(38, 3, 10, '', 4, '2022-11-18', '2022-11-18'),
(39, 4, 10, '', 4, '2022-11-18', '2022-11-18'),
(40, 5, 10, '', 4, '2022-11-18', '2022-11-18'),
(41, 1, 3, '', 4, '2022-11-18', '2022-11-18'),
(42, 2, 3, '', 4, '2022-11-18', '2022-11-18'),
(43, 3, 3, '', 4, '2022-11-18', '2022-11-18'),
(44, 4, 3, '', 4, '2022-11-18', '2022-11-18'),
(45, 5, 3, '', 4, '2022-11-18', '2022-11-18'),
(46, 1, 7, '', 4, '2022-11-18', '2022-11-18'),
(47, 2, 7, '', 4, '2022-11-18', '2022-11-18'),
(48, 3, 7, '', 4, '2022-11-18', '2022-11-18'),
(49, 4, 7, '', 4, '2022-11-18', '2022-11-18'),
(50, 5, 7, '', 4, '2022-11-18', '2022-11-18'),
(52, 1, 1, '', 5, '2022-11-19', '2022-11-19'),
(53, 2, 1, '', 5, '2022-11-19', '2022-11-19'),
(54, 3, 1, '', 5, '2022-11-19', '2022-11-19'),
(55, 4, 1, '', 5, '2022-11-19', '2022-11-19'),
(56, 5, 1, '', 5, '2022-11-19', '2022-11-19'),
(57, 2, 1, '', 6, '2022-11-19', '2022-11-19'),
(58, 2, 1, '', 6, '2022-11-19', '2022-11-19'),
(59, 3, 1, '', 6, '2022-11-19', '2022-11-19'),
(60, 4, 1, '', 6, '2022-11-19', '2022-11-19'),
(61, 2, 3, '', 6, '2022-11-19', '2022-11-19'),
(62, 2, 11, '', 6, '2022-11-19', '2022-11-19'),
(63, 2, 1, '', 7, '2022-11-19', '2022-11-19'),
(64, 3, 1, '', 7, '2022-11-19', '2022-11-19'),
(65, 4, 1, '', 7, '2022-11-19', '2022-11-19'),
(66, 2, 3, '', 7, '2022-11-19', '2022-11-19'),
(67, 3, 3, '', 7, '2022-11-19', '2022-11-19'),
(68, 4, 3, '', 7, '2022-11-19', '2022-11-19'),
(69, 5, 3, '', 7, '2022-11-19', '2022-11-19'),
(70, 2, 1, '', 8, '2022-11-19', '2022-11-19'),
(71, 3, 1, '', 8, '2022-11-19', '2022-11-19'),
(72, 4, 1, '', 8, '2022-11-19', '2022-11-19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Admin', 'Super User', '2022-11-25', '2022-11-25', 1),
(2, 'Bán hàng ', 'Nhân viên xác nhận đơn hàng', '2022-11-25', '2022-11-25', 1),
(3, 'Quản kho', 'Nhập hàng hóa vào kho', '2022-11-25', '2022-11-25', 1),
(4, 'Khách hàng', 'Khách mua hàng', '2022-11-25', '2022-11-25', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `SizeID` int(11) NOT NULL,
  `SizeName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`SizeID`, `SizeName`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL'),
(6, '3XL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `address`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Kho BW SOC	', 'Khu công nghiệp Tân Phú Trung, Quốc lộ 22, Ấp Trạm Bơm, xã Tân Phú Trung, huyện Củ Chi, thành phố Hồ Chí Minh\r\n', '2022-10-30', '2022-10-30', 1),
(2, 'Kho BN HUB 	', 'Từ Sơn, Bắc Ninh', '2022-11-18', '2022-11-18', 1),
(3, 'Kho DANANG SOC	', 'Quận Liên Chiểu, TP. Đà Nẵng\r\n', '2022-11-18', '2022-11-18', 1),
(4, 'Kho Thâm Quyến Shopee	', 'Quảng Đông, Trung Quốc', '2022-11-18', '2022-11-18', 1),
(5, 'Kho Củ Chi SOC	', 'Khu công nghiệp Tân Phú Trung, Quốc lộ 22, Ấp Trạm Bơm, xã Tân Phú Trung, huyện Củ Chi, thành phố Hồ Chí Minh.\r\n', '2022-11-18', '2022-11-18', 1),
(7, 't', 't', '2022-11-24', '2022-11-24', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `email`, `phone`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Nike', '13 Nguyen Van Cu', 'naiky@yahoo.com', 1224, '2022-10-30', '2022-10-30', 1),
(2, 'SWE', '123 Nguyen Trai', 'membership@swe.org', 21515155, '2022-11-18', '2022-11-18', 1),
(3, 'HN Riot', '41 P. Nguyễn Hy Quang, Chợ Dừa, Đống Đa, Hà Nội', 'hnriot@gmail.com', 345654603, '2022-11-18', '2022-11-18', 1),
(4, 'Wenex', '112 Phố Mễ Trì Thượng - Phường Mễ Trì - Quận Nam Từ Liêm - Hà Nội', 'wenex@gmail.com', 969986135, '2022-11-18', '2022-11-18', 1),
(5, 'Candles Studio', 'Số 1, Ngõ 1, Hoàng Ngọc Phách, Láng Hạ, Đống Đa, Hà Nội', 'gnc.cp2022@gmail.com', 966688258, '2022-11-18', '2022-11-18', 1),
(6, 'Adidas', 'Adidas Megastore Aeonmall Tân Phú: F13, tầng 1 TTTM, TP. HCM', 'adidas@gmail.com', 283636037, '2022-11-18', '2022-11-18', 1),
(7, 'Tired city', '37 Hành Hành, Hoàn Kiếm, Hà Nội', 'tiredcity@gmail.com', 246294995, '2022-11-18', '2022-11-18', 1),
(8, 'Clownz', '45 Núi Trúc, Ba Đình, HN', 'duong@clownz.vn', 586608660, '2022-11-18', '2022-11-18', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(2) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 123, 'admin', 1, '', '2022-11-19', '2022-11-19'),
(2, 'Huynh Chi Cuong', 'chicuongsp35@gmail.com', 983675461, 'chicuongsp2001', 1, '', '2022-11-25', '2022-11-25'),
(3, 'Quan Kho', 'quankho@gmail.com', 335878255, '123456', 1, '', '2022-11-25', '2022-11-25'),
(4, 'Ban Hang', 'banhang@gmail.com', 1863957858, '123456', 1, '', '2022-11-25', '2022-11-25'),
(5, 'test', 'test@gmail.com', 983675461, 'test', 1, '', '2022-11-29', '2022-11-29'),
(6, 'test2', 'test2@gmail.com', 983675461, '123456', 1, '', '2022-11-29', '2022-11-29'),
(7, '', 'hi@gmail.com', 983675461, '', 1, '', '2022-12-14', '2022-12-14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_roles`
--

CREATE TABLE `user_roles` (
  `active` int(2) NOT NULL,
  `user_id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_roles`
--

INSERT INTO `user_roles` (`active`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-11-25', '2022-11-25'),
(1, 2, 4, '2022-11-25', '2022-11-25'),
(1, 3, 3, '2022-11-25', '2022-11-25'),
(1, 4, 2, '2022-11-25', '2022-11-25'),
(1, 5, 1, '2022-11-29', '2022-11-29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thuockhohang` (`stock_id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD KEY `thuocvekhachhang` (`user_id`),
  ADD KEY `thuocvesanpham` (`product_id`);

--
-- Chỉ mục cho bảng `invoices_in`
--
ALTER TABLE `invoices_in`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thuocquankho` (`user_id`),
  ADD KEY `nhapsanpham` (`pro_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhangcuakhach` (`emp_id`),
  ADD KEY `phuongthucthanhtoan` (`payment_id`),
  ADD KEY `thuocvekhach` (`customer_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `chitietdonhang` (`order_id`),
  ADD KEY `chitietsanpham` (`product_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thuocloai` (`cate_id`),
  ADD KEY `thuocnhacungcap` (`supplier_id`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thuocsanpham` (`pro_id`),
  ADD KEY `size` (`size`,`color`),
  ADD KEY `thuocmau` (`color`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`SizeID`);

--
-- Chỉ mục cho bảng `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD KEY `thuoctaikhoan` (`user_id`),
  ADD KEY `thuocquyen` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `invoices_in`
--
ALTER TABLE `invoices_in`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `SizeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `thuockhohang` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`);

--
-- Các ràng buộc cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `thuocvekhachhang` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `thuocvesanpham` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `invoices_in`
--
ALTER TABLE `invoices_in`
  ADD CONSTRAINT `nhapsanpham` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `thuocquankho` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `donhangdonhanvien` FOREIGN KEY (`emp_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `phuongthucthanhtoan` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `thuocvekhach` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `chitietdonhang` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `chitietsanpham` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `thuocloai` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `thuocnhacungcap` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Các ràng buộc cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `thuocmau` FOREIGN KEY (`color`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `thuocsanpham` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `thuocsize` FOREIGN KEY (`size`) REFERENCES `size` (`SizeID`);

--
-- Các ràng buộc cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `thuocquyen` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `thuoctaikhoan` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

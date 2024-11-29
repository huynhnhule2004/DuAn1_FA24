-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 27, 2024 lúc 05:04 PM
-- Phiên bản máy phục vụ: 8.0.36
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `category_id`, `title`, `content`, `created_at`, `updated_at`, `image`) VALUES
(6, 5, 1, 'Hướng dẫn cách chăm sóc chó mèo luôn khỏe mạnh cho người mới', '<p>Cốt lõi trong hoạt động của chúng tôi là ý tưởng rằng các thành phố là vườn ươm của những thành tựu lớn nhất của chúng ta và niềm hy vọng tốt đẹp nhất cho một tương lai bền vững.</p>', '2024-11-18 07:43:08', '2024-11-18 07:43:08', '20241120151147.jpg'),
(7, 5, 1, 'Ngôi Nhà Tốt Nhất Cho Thú Cưng Của Bạn', '<p>Cốt lõi trong hoạt động của chúng tôi là ý tưởng rằng các thành phố là vườn ươm của những thành tựu lớn nhất của chúng ta và niềm hy vọng tốt đẹp nhất cho một tương lai bền vững.</p>', '2024-11-18 07:43:50', '2024-11-18 07:43:50', '20241120161114.jpg'),
(8, 5, 1, 'Hướng dẫn cách chăm sóc chó mèo luôn khỏe mạnh cho người mới', '<p>Nuôi thú cưng không chỉ là chăm sóc một loài động vật nào đó để mua vui. Những chú cún, chó mèo sẽ là người bạn tâm giao của bạn trong cuộc sống bận rộn. Chắc hẳn, sẽ không ai mong muốn thú cưng của mình bị ốm, bệnh tật.</p><p><i>Việc <strong>chăm sóc chó mèo </strong>đúng cách rất quan trọng để chủng luôn khỏe mạnh. Bạn là người mới bắt đầu nuôi thú cưng, nhưng không biết sẽ chăm sóc chúng thế nào? Hãy cùng Paddy shop tìm hiểu cách chăm sóc chó mèo cưng qua bài viết dưới đây, giúp chúng khỏe mạnh và luôn vui vẻ.</i></p><h2><strong>Nguyên tắc để chăm sóc chó mèo khỏe mạnh bạn cần biết</strong></h2><p>Bạn là người mới chưa có kinh nghiệm trong việc nuôi thú cưng, sẽ rất lóng ngóng trong việc cho ăn như thế nào? Làm sao để thú cưng không bị bệnh, ốm? Đặc biệt, chó mèo thường gặp các vấn đề về lông da và đường tiêu hóa, khó nuôi.</p><figure class=\"image\"><img src=\"https://cdn.shopify.com/s/files/1/0624/1746/9697/files/cham-soc-cho-meo-1.png?v=1667546744\" alt=\"\"></figure>', '2024-11-18 08:09:56', '2024-11-18 08:09:56', '20241120161113.jpg'),
(9, 5, 1, 'Hướng dẫn cách chăm sóc chó mèo luôn khỏe mạnh cho người mới', '<p>gsdfg</p>', '2024-11-18 08:19:08', '2024-11-18 08:19:08', '20241120161124.jpg'),
(10, 1, 1, 'bà như bị lỗi ampps xíu hết', '<h2><strong>Con sen phổ biến khi nào?</strong></h2><p>Hiện nay, con sen thường dùng để châm chọc, trêu đùa mối quan hệ thân mật giữa chủ nhân và thú cưng, hay cụ thể hơn là hoàng thượng mèo.</p><p>Mèo được coi trọng trong rất nhiều nền văn hóa. Người Ai Cập cổ đại coi mèo là một giống loài cao quý. <a href=\"https://www.britannica.com/topic/Bastet\">Vị thần Bastet</a> trong văn hóa Ai Cập là một vị thần có hình dạng nửa mèo nửa người. Còn trong văn hóa Nhật Bản, chú mèo vẫy tay Maneki Neko được coi là linh vật đem lại may mắn, tài lộc.</p><figure class=\"image\"><picture><source srcset=\"https://img.vietcetera.com/uploads/images/08-sep-2021/a0000697-main-768x546.jpg 2x, https://img.vietcetera.com/uploads/images/08-sep-2021/a0000697-main-375x268.jpg 1x\" media=\"(max-width: 568px)\"><source srcset=\"https://img.vietcetera.com/uploads/images/08-sep-2021/a0000697-main.jpg 2x, https://img.vietcetera.com/uploads/images/08-sep-2021/a0000697-main-768x546.jpg 1x\" media=\"(min-width: 569px)\"><img src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" alt=\"\" srcset=\"https://img.vietcetera.com/uploads/images/08-sep-2021/a0000697-main.jpg\" sizes=\"100vw\" width=\"750\"></picture></figure><p>Bạn có biết chú mèo này không? | Nguồn: Livejapan.com</p><p>Ở Việt Nam, mèo thuộc 12 con giáp và cũng xuất hiện nhiều trong truyện cổ tích, nhưng lại không được tôn sùng như ở một số nền văn hóa khác. Thời xưa, ông cha ta cũng không phản đối hay cấm đoán việc ăn thịt mèo.&nbsp;</p><p>Tuy vậy, những năm gần đây, mèo dường như có một “vị thế” cao sang hơn hẳn. Các dịch vụ chăm sóc cho thú cưng nở rộ tại thị trường trong nước. Nhiều người sẵn sàng chi hàng triệu đồng cho việc chăm sóc chó mèo.&nbsp;</p><p>Chính vì chăm chút từng bữa ăn, giấc ngủ của thú nuôi, nhiều người đùa rằng họ có cảm giác mình giống phận tôi tớ, cống hiến rất nhiều nhưng chẳng nhận lại bao nhiêu. Được phục vụ tận răng, nhưng các boss mèo, có khi không thấy cảm kích mà chỉ quay mặt bước đi. Chiếc ảnh meme dưới đây có thể tóm tắt lại cảm giác “bị khinh thường” này.</p><figure class=\"image\"><picture><source srcset=\"https://img.vietcetera.com/uploads/images/08-sep-2021/how-dogs-thinkhow-cats-think-they-feed-me-they-care-28297703-768x702.png 2x, https://img.vietcetera.com/uploads/images/08-sep-2021/how-dogs-thinkhow-cats-think-they-feed-me-they-care-28297703-375x342.png 1x\" media=\"(max-width: 568px)\"><source srcset=\"https://img.vietcetera.com/uploads/images/08-sep-2021/how-dogs-thinkhow-cats-think-they-feed-me-they-care-28297703.png 2x, https://img.vietcetera.com/uploads/images/08-sep-2021/how-dogs-thinkhow-cats-think-they-feed-me-they-care-28297703-768x702.png 1x\" media=\"(min-width: 569px)\"><img src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" alt=\"\" srcset=\"https://img.vietcetera.com/uploads/images/08-sep-2021/how-dogs-thinkhow-cats-think-they-feed-me-they-care-28297703.png\" sizes=\"100vw\" width=\"500\"></picture></figure><p>Chó: họ cho chăm sóc mình, họ chắc hẳn là thần linh / Mèo: họ chăm sóc mình, mình chắc chắn là thần linh &nbsp;| Nguồn: Me.me</p><p>Ngoài ra, con sen cũng được dùng trong mối quan hệ giữa người với người. Hội nhóm <a href=\"https://www.facebook.com/groups/tamsu.content\">Tâm Sự Con Sen</a> được lập ra vào đầu năm 2020 với mục đích đăng tải chuyện buồn vui nghề content, đến nay đã có gần 300.000 thành viên. Từ con sen lúc này chỉ người làm thuê, làm công ăn lương, hay những người làm trong ngành dịch vụ.</p>', '2024-11-26 09:26:01', '2024-11-26 09:26:01', '20241126161126.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Chăm Sóc Thú Cưng', '<p>Chăm Sóc Thú Cưng</p>', '2024-11-15 13:25:04', '2024-11-15 13:25:04'),
(2, '123', '<p><i>Nuôi thú cưng không chỉ là chăm sóc một loài động vật nào đó để mua vui. Những chú cún, chó mèo sẽ là người bạn tâm giao của bạn trong cuộc sống bận rộn. Chắc hẳn, sẽ không ai mong muốn thú cưng của mình bị ốm, bệnh tật.</i></p><p><i>Việc <strong>chăm sóc chó mèo </strong>đúng cách rất quan trọng để chủng luôn khỏe mạnh. Bạn là người mới bắt đầu nuôi thú cưng, nhưng không biết sẽ chăm sóc chúng thế nào? Hãy cùng Paddy shop tìm hiểu cách chăm sóc chó mèo cưng qua bài viết dưới đây, giúp chúng khỏe mạnh và luôn vui vẻ.</i></p><h2><strong>Nguyên tắc để chăm sóc chó mèo khỏe mạnh bạn cần biết</strong></h2><p>Bạn là người mới chưa có kinh nghiệm trong việc nuôi thú cưng, sẽ rất lóng ngóng trong việc cho ăn như thế nào? Làm sao để thú cưng không bị bệnh, ốm? Đặc biệt, chó mèo thường gặp các vấn đề về lông da và đường tiêu hóa, khó nuôi.</p><figure class=\"image\"><img src=\"https://cdn.shopify.com/s/files/1/0624/1746/9697/files/cham-soc-cho-meo-1.png?v=1667546744\" alt=\"\"></figure><p>Việc chăm sóc thú cưng tại nhà sẽ không quá khó, nếu bạn tuân thủ các nguyên tắc vàng sau đây:</p>', '2024-11-18 08:06:32', '2024-11-18 08:06:32'),
(3, 'áodddddddddddđ', '<p><i>Nuôi thú cưng không chỉ là chăm sóc một loài động vật nào đó để mua vui. Những chú cún, chó mèo sẽ là người bạn tâm giao của bạn trong cuộc sống bận rộn. Chắc hẳn, sẽ không ai mong muốn thú cưng của mình bị ốm, bệnh tật.</i></p><p><i>Việc <strong>chăm sóc chó mèo </strong>đúng cách rất quan trọng để chủng luôn khỏe mạnh. Bạn là người mới bắt đầu nuôi thú cưng, nhưng không biết sẽ chăm sóc chúng thế nào? Hãy cùng Paddy shop tìm hiểu cách chăm sóc chó mèo cưng qua bài viết dưới đây, giúp chúng khỏe mạnh và luôn vui vẻ.</i></p><h2><strong>Nguyên tắc để chăm sóc chó mèo khỏe mạnh bạn cần biết</strong></h2><p>Bạn là người mới chưa có kinh nghiệm trong việc nuôi thú cưng, sẽ rất lóng ngóng trong việc cho ăn như thế nào? Làm sao để thú cưng không bị bệnh, ốm? Đặc biệt, chó mèo thường gặp các vấn đề về lông da và đường tiêu hóa, khó nuôi.</p><figure class=\"image\"><img src=\"https://cdn.shopify.com/s/files/1/0624/1746/9697/files/cham-soc-cho-meo-1.png?v=1667546744\" alt=\"\"></figure><p>Việc chăm sóc thú cưng tại nhà sẽ không quá khó, nếu bạn tuân thủ các nguyên tắc vàng sau đây:</p>', '2024-11-18 08:08:50', '2024-11-18 08:08:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `description`, `image`) VALUES
(2, 'Quần áo dành chó', 'active', 'ko co j', ''),
(4, 'Quần áo dành cho mèo', 'active', '', ''),
(5, 'Thức ăn cho mèo', 'active', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `rating` tinyint DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `rating`, `content`, `created_at`, `updated_at`, `status`) VALUES
(8, 1, 1, NULL, 'quần áo đẹp quáaaaa', '2024-11-21 15:22:34', '2024-11-21 15:22:34', 1),
(24, 1, 1, NULL, 'ffafaadjjjjaggg', '2024-11-22 12:32:11', '2024-11-22 12:32:11', 1),
(26, 1, 2, NULL, 'dep', '2024-11-25 16:01:20', '2024-11-25 16:01:20', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `total_price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Pending','Shipped','Delivered','Cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `phone_number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `shipping_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `payment_method` enum('COD','Online payment') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `payment_status` enum('Paid','Unpaid','Refunded') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `long_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `price_default` int NOT NULL,
  `view` int DEFAULT '0',
  `discount_price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_feature` tinyint DEFAULT '0',
  `how_to_use` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `status` enum('available','out_of_stock','discontinued') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `format` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `short_description`, `long_description`, `price_default`, `view`, `discount_price`, `created_at`, `updated_at`, `is_feature`, `how_to_use`, `status`, `format`, `image`) VALUES
(1, 2, 'Áo vàng óng ánh', '<p>ngon</p>', '<p>ngon</p>', 230000, 0, 10000, '2024-11-14 13:11:18', '2024-11-14 13:11:18', 1, '<p>ngonn</p>', 'available', 'hộp', '20241119211124.jpg'),
(2, 2, 'pajama đen xì', '<p>Để lấy 50 ký tự đầu tiên từ chuỗi và thêm dấu ba chấm (...) nếu chuỗi dài hơn 50 ký tự, bạn có thể sử dụng hàm substr của PHP. Dưới đây là cách thực hiện:</p>', '<p>ngonjjjj</p>', 320000, 0, 150000, '2024-11-14 13:11:18', '2024-11-14 13:11:18', 0, '<p>ngonn</p>', 'available', 'hộp', '20241119211120.jpg'),
(3, 2, 'Hoodie xám tai gấu', '<p>fsdgffGiữ khoảng trắng thừa giữa các dòng (như normal).</p><ul><li>Ngắt dòng dựa trên dấu xuống dòng trong mã nguồn.gggggggggggggggggggggggf</li></ul>', '<p>gsdfGiữ khoảng trắng thừa giữa các dòng (như normal).</p><ul><li>Ngắt dòng dựa trên dấu xuống dòng trong mã nguồn.ffffffffffffffffffffff</li></ul>', 320000, 0, 20000, '2024-11-16 10:02:38', '2024-11-16 10:02:38', 0, '<p>sgdfsgGiữ khoảng trắng thừa giữa các dòng (như normal).</p><ul><li>Ngắt dòng dựa trên dấu xuống dòng trong mã nguồn.</li></ul>', 'available', '321', '20241119211128.jpg'),
(4, 2, 'Áo trái chuối bờ na na', '<p>fasd</p>', '<p>à</p>', 410000, 0, 10000, '2024-11-16 10:15:50', '2024-11-16 10:15:50', 1, '<p>sà</p>', 'available', 'sdae', '20241119211121.jpg'),
(7, 4, 'Áo tanktop tím ', '', '', 100000, 0, 10000, '2024-11-19 15:24:10', '2024-11-19 15:24:10', 1, '', 'available', 'hộp', '20241120181103.jpg'),
(8, 4, 'Áo raglan cộc tay', '', '', 100000, 0, 10000, '2024-11-20 11:55:00', '2024-11-20 11:55:00', 0, '', 'available', NULL, '20241120181155.jpg'),
(9, 4, 'Áo sơ mi kẻ caro', '', '', 120000, 0, 10000, '2024-11-20 11:59:16', '2024-11-20 11:59:16', 1, '', 'available', NULL, '20241120181159.jpg'),
(10, 4, 'Áo Thun Polo', '', '', 90000, 0, 10000, '2024-11-20 12:00:02', '2024-11-20 12:00:02', 1, '', 'available', NULL, '20241120191100.jpg'),
(11, 2, 'banh mi232', '', '', 500000, 0, 20000, '2024-11-21 03:08:00', '2024-11-21 03:08:00', 0, '', 'available', NULL, '20241121101108.jpg'),
(12, 4, 'Áo trái chuối bờ na na', '<p>23</p>', '', 50000, 0, 10000, '2024-11-21 03:12:26', '2024-11-21 03:12:26', 0, '', 'available', NULL, '20241121101112.webp'),
(16, 5, 'Whiskas thức ăn mèo', '', '<p>ngon ngon</p>', 340000, 0, 10000, '2024-11-22 07:42:57', '2024-11-22 07:42:57', 0, '', 'available', NULL, '20241122141142.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variant_options`
--

CREATE TABLE `product_variant_options` (
  `id` int NOT NULL,
  `product_variant_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `product_variant_options`
--

INSERT INTO `product_variant_options` (`id`, `product_variant_id`, `name`) VALUES
(1, 1, 'M'),
(3, 3, '5kg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variant_option_combinations`
--

CREATE TABLE `product_variant_option_combinations` (
  `id` int NOT NULL,
  `product_variant_option_id` int NOT NULL,
  `sku_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `product_variant_option_combinations`
--

INSERT INTO `product_variant_option_combinations` (`id`, `product_variant_option_id`, `sku_id`) VALUES
(5, 1, 2),
(8, 3, 4),
(11, 1, 5),
(13, 1, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variations`
--

CREATE TABLE `product_variations` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `product_variations`
--

INSERT INTO `product_variations` (`id`, `name`) VALUES
(1, 'Kích thước'),
(3, 'Trọng lượng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `skus`
--

CREATE TABLE `skus` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `stock_quantity` int NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `skus`
--

INSERT INTO `skus` (`id`, `product_id`, `price`, `image`, `stock_quantity`, `sku`) VALUES
(2, 11, 1233, 'insta3.jpg', 1, '231'),
(4, 16, 330000, NULL, 147, '128'),
(5, 9, 1000, '', 22, '234'),
(6, 1, 250000, '', 55, '343');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(320) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `phone_number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT 'active',
  `role` enum('admin','customer') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `email`, `phone_number`, `address`, `date_of_birth`, `created_at`, `updated_at`, `avatar`, `status`, `role`) VALUES
(1, 'lypham', 'ly1', NULL, '$2y$10$g9OII9Wr61dUdKts.wzITuo2bFhmCzjV.QN3QFDk/gICknWGF4mam', 'ly@gmail.com', '222229', 'can tho', '2024-11-28', '2024-11-09 16:47:54', '2024-11-09 16:47:54', '20241110231107.jpg', 'active', 'admin'),
(3, 'nhhuynh', 'nhuhuynh123', NULL, '$2y$10$ASmCMGmi/D6dZyEGdfiiP.Otk8dKNzwB4k28U4LTtfFRvWqB/SLqO', 'huynhnhu2004@gmail.com', '757619174', 'tra vinh', '2024-12-08', '2024-11-10 16:29:27', '2024-11-10 16:29:27', '20241122121154.jpg', 'active', NULL),
(5, 'nhu10', 'Ly', 'le', '$2y$10$mcLEXfCEwhvBATNQx2j49O68/FKp5qOO9lYAQV5vomkAAjEQVi4ou', 'Huynhnhule223@gmail.com', '0364402449', 'Tra vinh', '2009-02-18', '2024-11-15 13:23:21', '2024-11-15 13:23:21', '20241118151112.png', 'active', 'admin'),
(6, 'admin', 'Nhi', 'Lê', '$2y$10$gHfEYpg.LWezWBw5GwgNeOoSRUvkdwzCU26fqYjb5.jY0gFXXBZuW', 'camlypham61@gmail.com', '012345678', 'Tra vinh', '2009-02-18', '2024-11-18 08:11:17', '2024-11-18 08:11:17', '20241118151111.png', 'active', 'customer');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `product_variant_options`
--
ALTER TABLE `product_variant_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variant_id` (`product_variant_id`);

--
-- Chỉ mục cho bảng `product_variant_option_combinations`
--
ALTER TABLE `product_variant_option_combinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variant_option_id` (`product_variant_option_id`),
  ADD KEY `sku_id` (`sku_id`);

--
-- Chỉ mục cho bảng `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `skus`
--
ALTER TABLE `skus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `product_variant_options`
--
ALTER TABLE `product_variant_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product_variant_option_combinations`
--
ALTER TABLE `product_variant_option_combinations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `skus`
--
ALTER TABLE `skus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `blogs_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `product_variant_options`
--
ALTER TABLE `product_variant_options`
  ADD CONSTRAINT `product_variant_options_ibfk_1` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variations` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `product_variant_option_combinations`
--
ALTER TABLE `product_variant_option_combinations`
  ADD CONSTRAINT `product_variant_option_combinations_ibfk_1` FOREIGN KEY (`product_variant_option_id`) REFERENCES `product_variant_options` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_variant_option_combinations_ibfk_2` FOREIGN KEY (`sku_id`) REFERENCES `skus` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `skus`
--
ALTER TABLE `skus`
  ADD CONSTRAINT `skus_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

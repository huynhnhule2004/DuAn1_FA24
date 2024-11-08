<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\ProductDetail;
use App\Views\Client\Pages\Product\Index;
use App\Views\Client\Pages\Product\Detail;



class ProductController
{
    // hiển thị danh sách
    public static function index()
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        $products = [
            [
                'id' => 1,
                'name' => 'Áo Hoodie Xám',
                'price' => 400000,
                'discount_price' => 10,
                'image' => 'item1.jpg',
                'status' => 1
            ],
            [
                'id' => 2,
                'name' => 'Áo Yếm Jean',
                'price' => 200000,
                'discount_price' => 20,
                'image' => 'item2.jpg',
                'status' => 1
            ],
            [
                'id' => 3,
                'name' => 'Áo Thun Hồng',
                'price' => 300000,
                'discount_price' => 30,
                'image' => 'item3.jpg',
                'status' => 1
            ],

        ];
        $data = [
            'products' => $products,
            
        ];
        Header::render();
        Index::render($data);
        Footer::render();
    } 
    public static function detail($id)
    {
        $product_detail = [
            'id' => $id,
            'name' => 'Product 1',
            'short_description' => 'Description Product 1',
            'long_description' => 'Description Product 1',
            'price' => 100000,
            'discount_price' => 10000,
            'image' => 'item1.jpg',
            'image1' =>'item2.jpg',
            'image2' =>'item3.jpg',
            'image3' =>'item4.jpg',
            'Size1' => 'XL',
            'Size2' => 'L',
            'Size3' => 'M',
            'Size4' => 'S',
            'stock_quantity' => 2,
            'sku' => 1223,
            'category' => 'Dành cho chó',
            'how_to' => 'Cách sử dụng',
            'image_rate' =>'reviewer-1.jpg',
            'image_rate2' => 'reviewer-2.jpg',
            'name_rate' => 'Trung sơn',
            'name_rate2' => 'Lê Vinh',
            'date_rate' => '03/07/2023',
            'date_rate2' => '03/07/2023',
            'comment' => 'Bộ Jump Suit cho thú cưng thực sự là một sản phẩm đáng yêu và tiện lợi! Thiết kế hình chuối vui nhộn và màu sắc tươi sáng làm cho thú cưng trông thật nổi bật và dễ thương. Chất liệu vải mềm mại, co giãn tốt, thú cưng của tôi cảm thấy thoải mái ngay cả khi mặc trong thời gian dài. Việc mặc vào và tháo ra cũng rất dễ dàng, không gây khó khăn gì. Đặc biệt, trang phục này giữ ấm khá tốt, rất thích hợp cho những ngày se lạnh. Đây chắc chắn là một lựa chọn tuyệt vời cho các chủ nuôi muốn tạo phong cách cho thú cưng của mình.',
            'comment2' => 'Tôi rất hài lòng với bộ Jump Suit này cho thú cưng! Trang phục không chỉ đẹp mà còn rất thực tế, giúp giữ ấm cho bé trong những ngày trời mát mẻ. Mỗi khi mặc vào, thú cưng của tôi trông rất đáng yêu và nhận được nhiều lời khen từ bạn bè khi đi dạo. Đặc biệt, chất liệu vải không gây kích ứng cho da, thú cưng của tôi hoàn toàn thoải mái khi mặc, không gặp bất kỳ vấn đề khó chịu nào. Đây là sản phẩm hoàn hảo cho những ai muốn chăm sóc và làm đẹp cho thú cưng của mình.',
            'status' => 1,
            'rating_count' => '3,5',
            'rating_count2' => '3,5'

        ];
        $data = [
            'product' => $product_detail
        ];
        Header::render();
        Detail::render($data);
        Footer::render();
    }
    public static function getProductByCategory($id)
    {
    }
 }
 
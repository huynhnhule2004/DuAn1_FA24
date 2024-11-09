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
                'price' => '400,000',
                'discount_price' => 10,
                'image' => 'item1.jpg',
                'status' => 1
            ],
            [
                'id' => 2,
                'name' => 'Áo Yếm Jean',
                'price' => '200,000',
                'discount_price' => 20,
                'image' => 'item2.jpg',
                'status' => 1
            ],
            [
                'id' => 3,
                'name' => 'Áo Thun Hồng',
                'price' => '300,000',
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
            'name' => 'Hoodie',
            'short_description' => 'Bộ Jump Suit cho thú cưng thiết kế hình chuối đáng yêu, mang lại phong cách nổi bật và thoải mái cho thú cưng. Sản phẩm giúp giữ ấm, phù hợp với nhiều dịp khác nhau từ đi dạo đến chụp ảnh.',
            'long_description' => 'Bộ Jump Suit cho thú cưng là lựa chọn hoàn hảo để làm mới phong cách của thú cưng, tạo nên sự dễ thương và nổi bật mỗi khi xuất hiện. Thiết kế hình chuối vui nhộn trên nền vải xanh dịu mát, điểm xuyết viền bo vàng ở cổ, tay và chân mang lại một phong cách tươi sáng và độc đáo. Bộ đồ được làm từ chất liệu mềm mại, co giãn tốt và thoáng khí, giúp thú cưng luôn thoải mái dù mặc trong thời gian dài. Không chỉ là một trang phục thông thường, bộ Jump Suit còn giữ ấm cho thú cưng, đặc biệt trong những ngày trời se lạnh. Sản phẩm có thiết kế vừa vặn, dễ dàng mặc vào và tháo ra, tạo sự thuận tiện cho người dùng. Đây là trang phục lý tưởng để diện cho thú cưng trong các buổi dạo chơi, dã ngoại, hoặc chụp ảnh kỷ niệm. Với phong cách vui nhộn và hiện đại, bộ Jump Suit giúp thú cưng của bạn nổi bật và thu hút mọi ánh nhìn. Bộ đồ có nhiều kích cỡ, phù hợp cho cả chó và mèo với nhiều loại hình dáng khác nhau. Đây sẽ là món quà tuyệt vời để thể hiện tình yêu thương dành cho thú cưng, cho chúng thêm ấm áp và phong cách. Với bộ Jump Suit này, bạn không chỉ giúp thú cưng giữ ấm mà còn tôn lên nét cá tính, sự dễ thương và năng động của chúng. Hãy để thú cưng của bạn sẵn sàng cho mọi cuộc phiêu lưu cùng phong cách thật chất và nổi bật!',
            'price' => '450,000',
            'discount_price' => '400,000',
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
            'how_to' => 'Để sử dụng bộ Jump Suit cho thú cưng, trước tiên bạn hãy kiểm tra trang phục để đảm bảo không có chi tiết gây khó chịu. Khi mặc vào, nhẹ nhàng xỏ từng chân của thú cưng vào ống quần, sau đó kéo bộ đồ lên và điều chỉnh cho vừa vặn, tránh bó sát quá mức để thú cưng có thể di chuyển thoải mái. Hãy quan sát phản ứng của thú cưng, nếu thấy chúng cào cấu hay gỡ bỏ, hãy tháo ra và thử lại từ từ để chúng quen dần. Sau khi sử dụng, giặt sạch và phơi khô tự nhiên để trang phục luôn bền đẹp cho lần mặc tiếp theo. Bộ Jump Suit sẽ giúp thú cưng của bạn vừa ấm áp vừa nổi bật trong mọi dịp!',
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
 
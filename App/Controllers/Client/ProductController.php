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
        $productModel = new Product();
        $products = $productModel->getAllProductByStatus();
        $categoryModel = new Category();
        $categories = $categoryModel->getAllActiveCategories();
        $data = [
            'products' => $products,
            'categories' => $categories,

        ];

        Header::render();
        Index::render($data);
        Footer::render();
    }
    public static function detail($id)
    {
        $productModel = new Product();
        $product_detail = $productModel->getAllProductByStatus($id);
        $comment = new Comment();
        $comments = $comment->get2CommentNewestByProductAndStatus($id);
        $product_detail = [
            'id' => $id,
            'name' => 'Hoodie',
            'short_description' => 'Bộ Jump Suit cho thú cưng thiết kế hình chuối đáng yêu, mang lại phong cách nổi bật và thoải mái cho thú cưng. Sản phẩm giúp giữ ấm, phù hợp với nhiều dịp khác nhau từ đi dạo đến chụp ảnh.',
            'long_description' => 'Bộ Jump Suit cho thú cưng là lựa chọn hoàn hảo để làm mới phong cách của thú cưng, tạo nên sự dễ thương và nổi bật mỗi khi xuất hiện. Thiết kế hình chuối vui nhộn trên nền vải xanh dịu mát, điểm xuyết viền bo vàng ở cổ, tay và chân mang lại một phong cách tươi sáng và độc đáo. Bộ đồ được làm từ chất liệu mềm mại, co giãn tốt và thoáng khí, giúp thú cưng luôn thoải mái dù mặc trong thời gian dài. Không chỉ là một trang phục thông thường, bộ Jump Suit còn giữ ấm cho thú cưng, đặc biệt trong những ngày trời se lạnh. Sản phẩm có thiết kế vừa vặn, dễ dàng mặc vào và tháo ra, tạo sự thuận tiện cho người dùng. Đây là trang phục lý tưởng để diện cho thú cưng trong các buổi dạo chơi, dã ngoại, hoặc chụp ảnh kỷ niệm. Với phong cách vui nhộn và hiện đại, bộ Jump Suit giúp thú cưng của bạn nổi bật và thu hút mọi ánh nhìn. Bộ đồ có nhiều kích cỡ, phù hợp cho cả chó và mèo với nhiều loại hình dáng khác nhau. Đây sẽ là món quà tuyệt vời để thể hiện tình yêu thương dành cho thú cưng, cho chúng thêm ấm áp và phong cách. Với bộ Jump Suit này, bạn không chỉ giúp thú cưng giữ ấm mà còn tôn lên nét cá tính, sự dễ thương và năng động của chúng. Hãy để thú cưng của bạn sẵn sàng cho mọi cuộc phiêu lưu cùng phong cách thật chất và nổi bật!',
            'price' => '450,000',
            'discount_price' => '400,000',
            'image' => 'item1.jpg',
            'image1' => 'item2.jpg',
            'image2' => 'item3.jpg',
            'image3' => 'item4.jpg',
            'Size1' => 'XL',
            'Size2' => 'L',
            'Size3' => 'M',
            'Size4' => 'S',
            'stock_quantity' => 2,
            'sku' => 1223,
            'category' => 'Dành cho chó',
            'how_to' => 'Để sử dụng bộ Jump Suit cho thú cưng, trước tiên bạn hãy kiểm tra trang phục để đảm bảo không có chi tiết gây khó chịu. Khi mặc vào, nhẹ nhàng xỏ từng chân của thú cưng vào ống quần, sau đó kéo bộ đồ lên và điều chỉnh cho vừa vặn, tránh bó sát quá mức để thú cưng có thể di chuyển thoải mái. Hãy quan sát phản ứng của thú cưng, nếu thấy chúng cào cấu hay gỡ bỏ, hãy tháo ra và thử lại từ từ để chúng quen dần. Sau khi sử dụng, giặt sạch và phơi khô tự nhiên để trang phục luôn bền đẹp cho lần mặc tiếp theo. Bộ Jump Suit sẽ giúp thú cưng của bạn vừa ấm áp vừa nổi bật trong mọi dịp!',
            'status' => 1,


        ];


        $data = [
            'product' => $product_detail,
            'comments' => $comments,
        ];



        Header::render();
        Detail::render($data);
        Footer::render();
    }
    public static function getProductByCategory($id) {}
}

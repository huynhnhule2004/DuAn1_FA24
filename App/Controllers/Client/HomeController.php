<?php
namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Home;
use App\Views\Client\Layouts\Header;
use App\Models\Product;
use App\Models\Blog;

class HomeController
{
    // Hiển thị danh sách sản phẩm
    public static function index()
    {
        $productModel = new Product();
        // Lấy tất cả sản phẩm có status = 1 (đang bán)
        $products = $productModel->getAllProductByStatus();
        // Lấy dữ liệu các danh mục
        $product = new Product();
        $blog = new Blog();
        // giả sử data là mảng dữ liệu lấy được từ database
        $categories = [
            [
                'id' => 1,
                'name' => 'Cat',
                'status' => 1
            ],
            [
                'id' => 2,
                'name' => 'Dog',
                'status' => 1
            ],
            [
                'id' => 3,
                'name' => 'Bird',
                'status' => 0
            ],
        ];

        // Dữ liệu cho các bài viết blog (có thể cập nhật phương thức lấy dữ liệu tương tự như với sản phẩm)
        $blogs = [
            // [
            //     'id' => 1,
            //     'title' => 'Chăm sóc mèo đúng cách',
            //     'content' => 'Hướng dẫn chăm sóc mèo để chúng luôn khỏe mạnh và hạnh phúc.Hướng dẫn chăm sóc mèo để chúng luôn khỏe mạnh và hạnh phúc.Hướng dẫn chăm sóc mèo để chúng luôn khỏe mạnh và hạnh phúc.Hướng dẫn chăm sóc mèo để chúng luôn khỏe mạnh và hạnh phúc.Hướng dẫn chăm sóc mèo để chúng luôn khỏe mạnh và hạnh phúc.Hướng dẫn chăm sóc mèo để chúng luôn khỏe mạnh và hạnh phúc.',
            //     'image' => 'blog1.jpg',
            //     'category_id' => 1,
            //     'create_at' => '2022-01-01'
            // ],
            // [
            //     'id' => 2,
            //     'title' => 'Huấn luyện chó từ cơ bản đến nâng cao',
            //     'content' => 'Các bước huấn luyện chó cơ bản và những mẹo hay giúp chúng nghe lời.',
            //     'image' => 'blog2.jpg',
            //     'category_id' => 2,
            //     'create_at' => '2022-01-01'
            // ],
            // [
            //     'id' => 3,
            //     'title' => 'Thức ăn dinh dưỡng cho chim',
            //     'content' => 'Lựa chọn thức ăn dinh dưỡng giúp chim phát triển tốt và khỏe mạnh.',
            //     'image' => 'blog3.jpg',
            //     'category_id' => 3,
            //     'create_at' => '2022-01-01'
            // ],
            // [
            //     'id' => 3,
            //     'title' => 'Thức ăn dinh dưỡng cho chim',
            //     'content' => 'Lựa chọn thức ăn dinh dưỡng giúp chim phát triển tốt và khỏe mạnh.',
            //     'image' => 'blog3.jpg',
            //     'category_id' => 3,
            //     'create_at' => '2022-01-01'
            // ],
            

        ];
        $latestBlogs = $blog->getLatestBlogs();
        // var_dump($latestBlogs);

        $featuredProducts = $product->getFeaturedProducts();

        
        $data = [
            'featuredProducts' => $featuredProducts,
            'products' => $products,
            'categories' => $categories,
            'latestBlogs' => $latestBlogs,
        ];
// echo "<pre>";
//         var_dump($data);
        Header::render($data);
        Notification::render();
        NotificationHelper::unset();
        Home::render($data);
        Footer::render();
    }
}

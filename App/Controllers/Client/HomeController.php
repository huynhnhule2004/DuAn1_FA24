<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Home;
use App\Views\Client\Layouts\Header;

class HomeController
{
    // hiển thị danh sách
    public static function index()
    {
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
        $products = [
            [
                'id' => 1,
                'name' => 'Áo Hoodie Tai Gấu Dễ Thương',
                'description' => 'Description Product 1',
                'price' => 120000,
                'discount_price' => 89000,
                'image' => 'item1.jpg',
                'status' => 1
            ],
            [
                'id' => 2,
                'name' => 'Áo Sọc Phong Cách Denim',
                'description' => 'Description Product 2',
                'price' => 120000,
                'discount_price' => 89000,
                'image' => 'item2.jpg',
                'status' => 1
            ],
            [
                'id' => 3,
                'name' => 'Áo Len Phong Cách Retro',
                'description' => 'Description Product 3',
                'price' => 120000,
                'discount_price' => 89000,
                'image' => 'item3.jpg',
                'status' => 1
            ],
            [
                'id' => 1,
                'name' => 'Áo Khoác Đen Sang Trọng',
                'description' => 'Description Product 3',
                'price' => 120000,
                'discount_price' => 89000,
                'image' => 'item4.jpg',
                'status' => 1
            ],
            [
                'id' => 2,
                'name' => 'Áo Khoác Đen Sang Trọng',
                'description' => 'Description Product 3',
                'price' => 120000,
                'discount_price' => 89000,
                'image' => 'item4.jpg',
                'status' => 1
            ]

        ];
        $blogs = [
            [
                'id' => 1,
                'title' => 'Chăm sóc mèo đúng cách',
                'content' => 'Hướng dẫn chăm sóc mèo để chúng luôn khỏe mạnh và hạnh phúc.Hướng dẫn chăm sóc mèo để chúng luôn khỏe mạnh và hạnh phúc.Hướng dẫn chăm sóc mèo để chúng luôn khỏe mạnh và hạnh phúc.Hướng dẫn chăm sóc mèo để chúng luôn khỏe mạnh và hạnh phúc.Hướng dẫn chăm sóc mèo để chúng luôn khỏe mạnh và hạnh phúc.Hướng dẫn chăm sóc mèo để chúng luôn khỏe mạnh và hạnh phúc.',
                'image' => 'blog1.jpg',
                'category_id' => 1,
                'create_at' => '2022-01-01'
            ],
            [
                'id' => 2,
                'title' => 'Huấn luyện chó từ cơ bản đến nâng cao',
                'content' => 'Các bước huấn luyện chó cơ bản và những mẹo hay giúp chúng nghe lời.',
                'image' => 'blog2.jpg',
                'category_id' => 2,
                'create_at' => '2022-01-01'
            ],
            [
                'id' => 3,
                'title' => 'Thức ăn dinh dưỡng cho chim',
                'content' => 'Lựa chọn thức ăn dinh dưỡng giúp chim phát triển tốt và khỏe mạnh.',
                'image' => 'blog3.jpg',
                'category_id' => 3,
                'create_at' => '2022-01-01'
            ],
            // [
            //     'id' => 3,
            //     'title' => 'Thức ăn dinh dưỡng cho chim',
            //     'content' => 'Lựa chọn thức ăn dinh dưỡng giúp chim phát triển tốt và khỏe mạnh.',
            //     'image' => 'blog3.jpg',
            //     'category_id' => 3,
            //     'create_at' => '2022-01-01'
            // ],
            

        ];
        
        
        $data = [
            'products' => $products,
            'categories' => $categories,
            'blogs' => $blogs
        ];
        
        Header::render();
        Home::render($data);
        Footer::render();
    }
}

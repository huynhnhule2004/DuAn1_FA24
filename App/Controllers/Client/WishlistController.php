<?php

namespace App\Controllers\Client;

use App\Models\Category;
use App\Views\Client\Pages\Wishlist\Wishlist;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Layouts\Footer;

class WishlistController
{
    public static function index()
    {        
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        // Dữ liệu mẫu cho danh sách yêu thích
        $data = [
            [
                'image' => '/public/assets/client/images/22.jpg',
                'name' => 'Mimo thức ăn mèo',
                'weight' => '5kg',
                'format' => 'Túi',
                'quantity' => 2,
                'price' => 9.99
            ],
            [
                'image' => '/public/assets/client/images/123.jpg',
                'name' => 'Whiskas thức ăn mèo',
                'weight' => '10kg',
                'format' => 'Túi',
                'quantity' => 1,
                'price' => 13.50
            ],
            [
                'image' => '/public/assets/client/images/gana.jpg',
                'name' => 'Ganador thức ăn chó',
                'weight' => '10kg',
                'format' => 'Túi',
                'quantity' => 1,
                'price' => 13.50
            ]
        ];
        $data1 = [
            'categories' => $categories
        ];
        Header::render($data1);
        Wishlist::render($data);  // Truyền dữ liệu vào view
        Footer::render();
    }
}

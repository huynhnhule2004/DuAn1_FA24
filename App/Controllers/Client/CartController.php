<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Pages\Cart\Cart;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Layouts\Footer;

class CartController
{
    // hiển thị danh sách
    public static function index()
    {
        // Dữ liệu ví dụ
        $data = [
            [
                'name' => 'Mimo thức ăn mèo',
                'image' => '/public/assets/client/images/22.jpg',
                'size' => '5kg',
                'format' => 'Túi',
                'quantity' => 2,
                'price' => 9.99
            ],
            [
                'name' => 'Whiskas thức ăn mèo',
                'image' => '/public/assets/client/images/123.jpg',
                'size' => '10kg',
                'format' => 'Túi',
                'quantity' => 1,
                'price' => 13.50
            ],
            [
                'name' => 'Ganador thức ăn chó',
                'image' => '/public/assets/client/images/gana.jpg',
                'size' => '10kg',
                'format' => 'Túi',
                'quantity' => 1,
                'price' => 13.50
            ]
        ];

        Header::render();
        Cart::render($data); // Truyền dữ liệu vào view
        Footer::render();
    }
}

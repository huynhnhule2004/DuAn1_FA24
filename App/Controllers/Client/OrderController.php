<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Order\Index;
use App\Views\Client\Layouts\Header;

class OrderController
{
    // hiển thị danh sách
    public static function index()
    {
        $orders = [
            [
                'id' => 1,
                'name' => 'Áo Hoodie Xám',
                'price' => 400000,
                'image' => 'item1.jpg',
                'status' => 1,
                'size' => 'M',
                'quantity'=> 1

            ],
            [
                'id' => 2,
                'name' => 'Áo Hoodie Xám',
                'price' => 400000,
                'image' => 'item1.jpg',
                'status' => 1,
                'size' => 'M',
                'quantity'=> 1

            ],


        ];
        $data = [
            'orders' => $orders,
            
        ];
        Header::render();
        Index::render($data);
        Footer::render();
    }
}
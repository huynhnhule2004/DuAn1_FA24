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
        Header::render();
        Cart::render();
        Footer::render();
    }
}

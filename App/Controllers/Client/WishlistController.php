<?php

namespace App\Controllers\Client;


use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Pages\Wishlist\Wishlist;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Layouts\Footer;

class WishlistController
{
    // hiển thị danh sách
    public static function index()
    {
        Header::render();
        Wishlist::render();
        Footer::render();
    }
}

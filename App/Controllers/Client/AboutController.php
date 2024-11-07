<?php

namespace App\Controllers\Client;


use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Pages\About\About;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Layouts\Footer;

class AboutController
{
    // hiển thị danh sách
    public static function index()
    {
        Header::render();
        About::render();
        Footer::render();
    }
}

<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Blog\Moreblog;
use App\Views\Client\Layouts\Header;
use App\Models\Blog;

class MoreBlogController
{
    // hiển thị danh sách
    public static function Moreblog()
    {
        
        Header::render();
        Moreblog::render();
        Footer::render();
    }
}

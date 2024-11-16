<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Blog\Index;
use App\Views\Client\Layouts\Header;
use App\Models\Blog;

class BlogController
{
    // hiển thị danh sách
    public static function index()
    {
        $blog = new Blog();
        $blogs = $blog->getAllBlogJoinCategory(); 

        $data = [
            'blogs' => $blogs,
        ];
        Header::render();
        Index::render($data);
        Footer::render();
    }
    
}

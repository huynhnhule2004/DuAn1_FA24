<?php

namespace App\Controllers\Client;


use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Views\Client\Components\Notification;
use App\Views\Client\Pages\About\About;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Layouts\Footer;
use App\Models\Blog;

class AboutController
{
    // hiển thị danh sách
    public static function index()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $blog = new Blog();
        $latestBlogs = $blog->getLatestBlogs();

        $data = [
            'categories' => $categories,
            'latestBlogs' => $latestBlogs
        ];

        Header::render($data);
        About::render($data);
        Footer::render();
    }
}

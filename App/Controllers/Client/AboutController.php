<?php

namespace App\Controllers\Client;


use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Views\Client\Components\Notification;
use App\Views\Client\Pages\About\About;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Layouts\Footer;

class AboutController
{
    // hiển thị danh sách
    public static function index()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $data = [
            'categories' => $categories
        ];

        Header::render($data);
        About::render();
        Footer::render();
    }
}

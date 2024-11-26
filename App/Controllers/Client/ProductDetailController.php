<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\ProductDetail\Index;
use App\Views\Client\Layouts\Header;

class ProductDetailController
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
        Header::render();
        Index::render();
        Footer::render();
    }
}
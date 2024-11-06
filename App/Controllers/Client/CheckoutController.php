<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Home;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\About\About;
use App\Views\Client\Pages\Contact\Contact;
use App\Models\Category;
use App\Models\Product;
use App\Views\Client\Pages\Checkout\Checkout;

class CheckoutController
{
    // hiển thị danh sách
    public static function index()
    {
        // $category = new Category();
        // $categories = $category->getAllByStatus();

        // $product = new Product();
        // $products = $product->getAllProductByStatus();

        // $data = [
        //     'products' => $products,
        //     'categories' => $categories
        // ];
        Header::render();
        Notification::render();
        // NotificationHelper::unset();
        Checkout::render();
        Footer::render();
    }
}
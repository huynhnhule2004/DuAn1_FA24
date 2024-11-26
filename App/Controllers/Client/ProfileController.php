<?php

namespace App\Controllers\Client;

use App\Models\Category;
use App\Views\Client\Pages\Profile\Profile;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Layouts\Footer;

class ProfileController
{
    // Hiển thị trang hồ sơ người dùng
    public static function index()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        $data = [
            'first_name' => 'Ca Moi',
            'last_name' => '3 Co Gai',
            'email' => 'hoso@gmail.com',
            'avatar' => '/public/assets/client/images/staff-1.jpg',  // Đường dẫn ảnh đại diện
            'phone' => '(333) 000 555',
            'address' => 'HCM',
            'social' => 'camoi3cogai',
        ];
        $data1 = [
            'categories' => $categories
        ];

        // Truyền dữ liệu vào view
        Header::render($data1);
        Profile::render($data);
        Footer::render();
    }
}


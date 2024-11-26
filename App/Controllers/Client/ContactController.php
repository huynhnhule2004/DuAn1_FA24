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
use App\Helpers\AuthHelper;
use App\Validations\ContactValidation;

class ContactController
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
        Notification::render();
        // NotificationHelper::unset();
        Contact::render();
        Footer::render();
    }

    public static function PostContact(){
        ob_start();  
        $is_valid = ContactValidation::createClient();
        if (!$is_valid) {
            NotificationHelper::error('contact_valid', 'Gửi liên hệ thất bại');
            header('Location: /contact');
            exit();
        }
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'message' => $_POST['message'],
        ];
        $phpEmail = AuthHelper::sendEmail($data['email'], $data['name'], $data['message']); 
        if ($phpEmail) {
            NotificationHelper::success('contact_success', 'Gửi liên hệ thành công');
        } else {
            NotificationHelper::error('contact_failed', 'Gửi email không thành công');
        }
        header('Location: /');
        ob_end_flush();
        
        
    }
}
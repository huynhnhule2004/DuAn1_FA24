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
        // Lấy giá trị blog_id từ query string
        $id = isset($_GET['blog_id']) ? $_GET['blog_id'] : null;

        if ($id) {
            $blogModel = new Blog();

            // Lấy danh mục bài viết
            $categories = $blogModel->getBlogsByCategory($id); 

            // Lấy chi tiết bài viết theo ID
            $blogDetail = $blogModel->getBlogDetail($id);
            $data = [
                'blogDetail' => $blogDetail,
                'categories' => $categories,
            ];

            Header::render();
            Moreblog::render($data);  // Hiển thị bài viết chi tiết
            Footer::render();
        } else {
            // Xử lý khi không có tham số blog_id
            echo "Bài viết không tồn tại.";
        }

        
    }
    
}

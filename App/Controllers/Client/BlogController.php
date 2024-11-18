<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Models\BlogCategory;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Blog\Index;
use App\Views\Client\Pages\Blog\Detail;
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

    public static function detail($id)
    {
        $category = new BlogCategory;
        $categories = $category->getAll();
        $blog = new Blog();
        $blog_detail = $blog->getOneBlog($id);

        $data = [
            'categories' => $categories,
            'blog_detail' => $blog_detail
        ];

        // echo "<pre>";
        // var_dump($data);
        Header::render();
        Detail::render($data);
        Footer::render();
    }

    public static function getBlogByCategory($id)
    {
        $category = new BlogCategory();
        $categories = $category->getAllCategory();

        $blog = new Blog();
        $blogs = $blog->getAllBlogsByCategory($id);

        $data = [
            'blogs' => $blogs
        ];
//       echo "<pre/>";
//       var_dump($data);

        Header::render($data);
        Index::render($data);
        Footer::render();
    }

    
    
}

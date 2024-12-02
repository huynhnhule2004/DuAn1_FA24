<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Models\User;
use App\Validations\BlogValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Blog\Create;
use App\Views\Admin\Pages\Blog\Edit;
use App\Views\Admin\Pages\Blog\Index;

class BlogController
{


    // hiển thị danh sách
    public static function index()
    {
        $blog = new Blog();
        $data = $blog->getAllBlogJoinCategory();

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 10;
    
        $totalItems = count($data);
        $totalPages = ceil($totalItems / $itemsPerPage);
    
        if ($currentPage < 1) $currentPage = 1;
        if ($currentPage > $totalPages) $currentPage = $totalPages;
    
        $offset = ($currentPage - 1) * $itemsPerPage;
        $pageData = array_slice($data, $offset, $itemsPerPage);

        // echo "<pre>";
        // var_dump($data);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($pageData, $currentPage, $itemsPerPage, $totalItems);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
        $category = new BlogCategory();
        $data = $category->getAllCategory();
        // echo "<pre>";
        // var_dump($data);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form thêm
        Create::render($data);
        Footer::render();
    }


    // xử lý chức năng thêm
    public static function store()
    {
        // validation các trường dữ liệu
        $is_valid = BlogValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm bài viết thất bại');
            header('location: /admin/blogs/create');
            exit;
        }

        $user = $_COOKIE['user'];
        $user_data = (array) json_decode($user);
        $user_id = $user_data['id'];

        $blog = new Blog();
        // Thực hiện thêm
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'category_id' => $_POST['category_id'],
            'user_id' => $user_id,
        ];

        // var_dump($data);
        $is_upload = BlogValidation::uploadImage();

        if ($is_upload) {
            $data['image'] = $is_upload;
        }
        // var_dump($data);

        $result = $blog->createBlog($data);

        if ($result) {
            NotificationHelper::success('store', 'Thêm bài viết thành công');
            header('location: /admin/blogs');
        } else {
            NotificationHelper::error('store', 'Thêm bài viết thất bại');
            header('location: /admin/blogs/create');
        }
    }


    // // hiển thị chi tiết
    // public static function show()
    // {
    // }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {

        $blog = new Blog();
        $data_blog = $blog->getOneBlog($id);

        $category = new BlogCategory();
        $data_category = $category->getAllCategory();

        $data_user = $blog->getBlogAuthor($id);

        if (!$data_blog) {
            NotificationHelper::error('edit', 'Không thể xem bài viết này');
            header('location: /admin/blogs/');
            exit;
        }

        $data = [
            'blog' => $data_blog,
            'category' => $data_category,
            'user' => $data_user
        ];

        // echo "<pre>";
        // var_dump($data);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();
    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        // validation các trường dữ liệu
        $is_valid = BlogValidation::edit();
        // var_dump($is_valid);
        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật bài viết thất bại');
            header("location: /admin/blogs/$id");
            exit;
        }

        $blog = new Blog();

        //Thực hiện cập nhật
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'category_id' => $_POST['category_id'],
            'user_id' => $_POST['user_id'],
        ];

        $is_upload = BlogValidation::uploadImage();

        if ($is_upload) {
            $data['image'] = $is_upload;
        }

        $result = $blog->updateBlog($id, $data);

        if ($result) {
            NotificationHelper::success('update', 'Cập nhật bài viết thành công');
            header('location: /admin/blogs');
        } else {
            NotificationHelper::error('update', 'Cập nhật bài viết thất bại');
            header("location: /admin/blogs/$id");
        }
    }


    // // thực hiện xoá
    public static function delete(int $id)
    {
        $blog = new Blog();
        $result = $blog->deleteBlog($id);

        // var_dump($result);
        if ($result) {
            NotificationHelper::success('delete', 'Xóa bài viết thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa bài viết thất bại');
        }

        header('location: /admin/blogs');
    }
}

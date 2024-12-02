<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Validations\CommentValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Comment\Create;
use App\Views\Admin\Pages\Comment\Edit;
use App\Views\Admin\Pages\Comment\Index;    

class CommentController
{


    // hiển thị danh sách
    public static function index()
    {
        $comment = new Comment();
        $data = $comment->getAllCommentJoinProductAndUser();

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 10;
    
        $totalItems = count($data);
        $totalPages = ceil($totalItems / $itemsPerPage);
    
        if ($currentPage < 1) $currentPage = 1;
        if ($currentPage > $totalPages) $currentPage = $totalPages;
    
        $offset = ($currentPage - 1) * $itemsPerPage;
        $pageData = array_slice($data, $offset, $itemsPerPage);

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
    }


    // xử lý chức năng thêm
    public static function store()
    {
    }


    // hiển thị chi tiết
    public static function show()
    {
    }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        $comment = new Comment();
        $data = $comment->getOneCommentJoinProductAndUser($id);

        if (!$data) {
            NotificationHelper::error('edit', 'Không thể xem bình luận này');
            header('location: /admin/comments/');
            exit;
        }

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
        $is_valid = CommentValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật bình luận thất bại');
            header("location: /admin/comments/$id");
            exit;
        }

        $status = $_POST['status'];

        $comment = new Comment();

        //Thực hiện cập nhật
        $data = [
            'status' => $status
        ];

        $result = $comment->updateComment($id, $data);

        if ($result) {
            NotificationHelper::success('update', 'Cập nhật bình luận thành công');
            header('location: /admin/comments');
        } else {
            NotificationHelper::error('update', 'Cập nhật bình luận thất bại');
            header("location: /admin/comments/$id");
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $comment = new Comment();
        $result = $comment->deleteComment($id);

        // var_dump($result);
        if ($result) {
            NotificationHelper::success('delete', 'Xóa bình luận thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa bình luận thất bại');
        }

        header('location: /admin/comments');
    }
}

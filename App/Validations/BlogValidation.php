<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;


class BlogValidation
{
    public static function create(): bool
    {

        $is_valid = true;

        // Tiêu đề
        if (!isset($_POST['title']) || $_POST['title'] === '') {
            NotificationHelper::error('title', 'Không để trống tiêu đề');
            $is_valid = false;
        }

        // Tiêu đề
        if (!isset($_POST['content']) || $_POST['content'] === '') {
            NotificationHelper::error('content', 'Không để trống nội dung');
            $is_valid = false;
        }
        // id loại bài viết
        if (!isset($_POST['category_id']) || $_POST['category_id'] === '') {
            NotificationHelper::error('category_id', 'Không để trống loại bài viết');
            $is_valid = false;
        }


        return $is_valid;
    }

    public static function edit(): bool
    {
        return self::create();
    }

    public static function uploadImage()
    {
        if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
            return false;
        }

        // nơi lưu trữ hình ảnh trong sourcecode
        $target_dir = 'public/uploads/blogs/';

        //Kiểm tra loại file upload có hợp lệ không
        $imageFileType = strtolower(pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION));

        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif' && $imageFileType != 'webp') {
            NotificationHelper::error('type_upload', 'Chỉ nhận file ảnh JPG, PNG, JPEG, GIF');
            return false;
        }

        //thay đổi tên file thành dạng năm tháng ngày giờ phút giây
        $nameImage = date('YmdHmi') . '.' . $imageFileType;

        //Đường dẫn đầy đủ đề di chuyển file
        $target_file = $target_dir . $nameImage;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            NotificationHelper::error('move_upload', 'Không thể tải ảnh vào thư mục để lưu trữ');
            return false;
        }

        return $nameImage;
    }
}

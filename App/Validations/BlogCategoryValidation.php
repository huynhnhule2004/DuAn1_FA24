<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class BlogCategoryValidation
{
    public static function create():bool
    {
        $is_valid = true;

        // tên danh mục bài viết
        if (
            !isset($_POST['category_name']) || $_POST['category_name'] === ''
        ) {
            NotificationHelper::error('category_name', 'Không để trống tên danh mục bài viết');
            $is_valid = false;
        }
        
        return $is_valid;
    }
    public static function uploadImage()
    {
        if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
            return false;
        }
        //nơi lưu trữ hình ảnh trong sourcecode
        $target_dir = 'public/assets/client/images/';

        /// kiểm tra loại file upload có hợp lệ không
        $imageFileType = strtolower(pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION));

        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'webp' && $imageFileType != 'gif') {
            NotificationHelper::Error('type_upload', 'Chỉ nhận file ảnh JPG, JPEG, PNG, WEBP và GIF');
            return false;
        }

        // thay đổi tên file thành dạng năm tháng ngày giờ phút giây
        $nameImage = date('YmdHmi') . '.' . $imageFileType;

        //đongwf dẫn đầy đủ để di chuyển file
        $target_file = $target_dir . $nameImage;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            NotificationHelper::Error('move_upload', 'Không thể tải ảnh vào thư mục đã lưu trữ');
            return false;
        }
        return $nameImage;
    }
    public static function edit(): bool
    {

        $is_valid = true;

        // Tên danh mục bài viết
        if (!isset($_POST['category_name']) || $_POST['category_name'] === '') {
            NotificationHelper::error('category_name', 'Không để trống tên danh mục bài viết');
            $is_valid = false;
        }


        return $is_valid;
    }
}

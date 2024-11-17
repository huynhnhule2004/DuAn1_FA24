<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;


class ProductVariationValidation
{
    public static function create(): bool
    {

        $is_valid = true;

        // Tên thuộc tính
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('product_name', 'Không để trống tên sản phẩm');
            $is_valid = false;
        }


        // id sản phẩm
        if (!isset($_POST['product_id']) || $_POST['product_id'] === '') {
            NotificationHelper::error('category_id', 'Không để trống loại sản phẩm');
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
        $target_dir = 'public/uploads/products/';

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

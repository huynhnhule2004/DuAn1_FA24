<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;


class SkuValidation
{
    public static function create(): bool
    {

        $is_valid = true;

        // Tên sản phẩm
        if (!isset($_POST['product_name']) || $_POST['product_name'] === '') {
            NotificationHelper::error('product_name', 'Không để trống tên sản phẩm');
            $is_valid = false;
        }

        // Giá tiền
        if (!isset($_POST['price_default']) || $_POST['price_default'] === '') {
            NotificationHelper::error('price_default', 'Không để trống giá tiền');
            $is_valid = false;
        } elseif ((int) $_POST['price_default'] <= 0) {
            NotificationHelper::error('price', 'Giá tiền phải lớn hơn 0');
            $is_valid = false;
        }

        // Giá giảm
        if (!isset($_POST['discount_price']) || $_POST['discount_price'] === '') {
            NotificationHelper::error('discount_price', 'Không để trống giá giảm');
            $is_valid = false;
        } elseif ((int) $_POST['discount_price'] < 0) {
            NotificationHelper::error('discount_price', 'Giá giảm phải lớn hơn hoặc bằng 0');
            $is_valid = false;
        } elseif ((int) $_POST['discount_price'] > (int) $_POST['price_default']) {
            NotificationHelper::error('discount_price', 'Giá giảm phải nhỏ hơn giá tiền');
            $is_valid = false;
        }

        // id loại sản phẩm
        if (!isset($_POST['category_id']) || $_POST['category_id'] === '') {
            NotificationHelper::error('category_id', 'Không để trống loại sản phẩm');
            $is_valid = false;
        }

        // Nổi bật
        if (!isset($_POST['is_feature']) || $_POST['is_feature'] === '') {
            NotificationHelper::error('is_feature', 'Không để trống nổi bật');
            $is_valid = false;
        }

        // Trạng thái
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Không để trống trạng thái');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function edit(): bool
    {
        return self::create();
    }

    public static function uploadImage($files, $index)
    {
        // Kiểm tra nếu file tồn tại và đã được upload
        if (!file_exists($files['tmp_name'][$index]) || !is_uploaded_file($files['tmp_name'][$index])) {
            return false;
        }

        // Nơi lưu trữ hình ảnh trong sourcecode
        $target_dir = 'public/uploads/products/';

        // Kiểm tra loại file upload có hợp lệ không
        $imageFileType = strtolower(pathinfo(basename($files['name'][$index]), PATHINFO_EXTENSION));

        if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif', 'webp'])) {
            NotificationHelper::error('type_upload', 'Chỉ nhận file ảnh JPG, PNG, JPEG, GIF, WEBP');
            return false;
        }

        // Thay đổi tên file thành dạng năm tháng ngày giờ phút giây
        $nameImage = date('YmdHmi') . '.' . $imageFileType;

        // Đường dẫn đầy đủ để di chuyển file
        $target_file = $target_dir . $nameImage;

        if (!move_uploaded_file($files['tmp_name'][$index], $target_file)) {
            NotificationHelper::error('move_upload', 'Không thể tải ảnh vào thư mục để lưu trữ');
            return false;
        }

        return $nameImage;
    }

    public static function uploadImage1($files, $index)
    {
        // Kiểm tra nếu file tồn tại và đã được upload
        if (!file_exists($files['tmp_name'][$index]) || !is_uploaded_file($files['tmp_name'][$index])) {
            return false;
        }

        // Nơi lưu trữ hình ảnh trong sourcecode
        $target_dir = 'public/uploads/products/';

        // Kiểm tra loại file upload có hợp lệ không
        $imageFileType = strtolower(pathinfo(basename($files['name'][$index]), PATHINFO_EXTENSION));

        if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif', 'webp'])) {
            NotificationHelper::error('type_upload', 'Chỉ nhận file ảnh JPG, PNG, JPEG, GIF, WEBP');
            return false;
        }

        // Lấy tên gốc của file và làm sạch tên file (xóa khoảng trắng và ký tự đặc biệt)
        $originalName = basename($files['name'][$index]);
        $cleanedFileName = preg_replace('/[^a-zA-Z0-9_-]/', '_', $originalName); // Thay ký tự đặc biệt bằng '_'

        // Đường dẫn đầy đủ để di chuyển file
        $target_file = $target_dir . $cleanedFileName;

        // Kiểm tra xem file đã tồn tại chưa, nếu có thì thêm số đếm vào tên file để tránh trùng
        $i = 1;
        while (file_exists($target_file)) {
            $target_file = $target_dir . pathinfo($cleanedFileName, PATHINFO_FILENAME) . "_$i." . $imageFileType;
            $i++;
        }

        // Di chuyển file đến thư mục mục tiêu
        if (!move_uploaded_file($files['tmp_name'][$index], $target_file)) {
            NotificationHelper::error('move_upload', 'Không thể tải ảnh vào thư mục để lưu trữ');
            return false;
        }

        return $cleanedFileName;  // Trả về tên gốc của file đã được làm sạch
    }
}

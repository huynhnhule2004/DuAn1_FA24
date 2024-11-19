<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;


class ContactValidation
{
    public static function createClient(): bool
    {
        $is_valid = true;

        // Kiểm tra họ tên
        if (!isset($_POST['name']) || ($_POST['name']) === '') {
            NotificationHelper::error('name', 'Không được để trống họ tên.');
            $is_valid = false;
        }

        // Kiểm tra email
        if (!isset($_POST['email']) || ($_POST['email']) === '') {
            NotificationHelper::error('email', 'Không được để trống email.');
            $is_valid = false;
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            NotificationHelper::error('email', 'Địa chỉ email không hợp lệ.');
            $is_valid = false;
        }

        if (!isset($_POST['phone']) || ($_POST['phone']) === '') {
            NotificationHelper::error('phone', 'Không được để trống số điện thoại.');
            $is_valid = false;
        } elseif (!preg_match('/^[0-9]{10,15}$/', $_POST['phone'])) {
            NotificationHelper::error('phone', 'Số điện thoại không hợp lệ.');
            $is_valid = false;
        }

        if (!isset($_POST['message']) || ($_POST['message']) === '') {
            NotificationHelper::error('message', 'Không được để trống lời nhắn.');
            $is_valid = false;
        }

        return $is_valid;
    }

    
}

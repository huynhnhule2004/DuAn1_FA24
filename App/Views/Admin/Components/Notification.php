<?php

namespace App\Views\Admin\Components;

use App\Views\BaseView;

class Notification extends BaseView
{
    public static function render($data = null)
    {
        // Bắt đầu đoạn mã JavaScript để hiển thị Toast
        echo '<script>';
        
        // Thiết lập biến để giữ độ trễ cho mỗi thông báo
        $delay = 0;

        // Thông báo thành công
        if (isset($_SESSION['success'])) {
            foreach ($_SESSION['success'] as $key => $value) {
                echo "setTimeout(function() {
                    Toastify({
                        text: \"{$value}\",
                        duration: 3000,
                        gravity: \"top\",
                        position: \"right\",
                        backgroundColor: \"#4CAF50\"
                    }).showToast();
                }, {$delay});";
                // Tăng độ trễ cho thông báo tiếp theo
                $delay += 1000;  
            }
            unset($_SESSION['success']); // Xóa session sau khi hiển thị
        }

        // Thông báo lỗi
        if (isset($_SESSION['error'])) {
            foreach ($_SESSION['error'] as $key => $value) {
                echo "setTimeout(function() {
                    Toastify({
                        text: \"{$value}\",
                        duration: 3000,
                        gravity: \"top\",
                        position: \"right\",
                        backgroundColor: \"#FF6347\"
                    }).showToast();
                }, {$delay});";
                // Tăng độ trễ cho thông báo tiếp theo
                $delay += 1000;  
            }
            unset($_SESSION['error']); // Xóa session sau khi hiển thị
        }

        // Kết thúc đoạn mã JavaScript
        echo '</script>';
    }
}
?>

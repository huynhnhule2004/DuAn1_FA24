<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Notification extends BaseView
{
    public static function render($data = null)
    {
        echo '<script>';
        
        // Biến độ trễ ban đầu là 0
        $delay = 0;

        // Thông báo thành công
        if (isset($_SESSION['success'])) {
            foreach ($_SESSION['success'] as $key => $value) {
                echo "
                    setTimeout(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công!',
                            text: '{$value}',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }, {$delay});
                ";
                // Tăng độ trễ thêm 1000ms cho mỗi thông báo tiếp theo
                $delay += 1000;
            }
            unset($_SESSION['success']); // Xóa session sau khi hiển thị
        }

        // Thông báo lỗi
        if (isset($_SESSION['error'])) {
            foreach ($_SESSION['error'] as $key => $value) {
                echo "
                    setTimeout(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi!',
                            text: '{$value}',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }, {$delay});
                ";
                // Tăng độ trễ thêm 1000ms cho mỗi thông báo tiếp theo
                $delay += 1000;
            }
            unset($_SESSION['error']); // Xóa session sau khi hiển thị
        }

        echo '</script>';
    }
}
?>

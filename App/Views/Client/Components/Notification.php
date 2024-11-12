<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Notification extends BaseView
{
    public static function render($data = null)
    {
        // Kiểm tra có thông báo thành công không và hiển thị SweetAlert2
        if (isset($_SESSION['success'])) :
            foreach ($_SESSION['success'] as $key => $value) :
?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công!',
                        text: '<?= $value ?>',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>
<?php
            endforeach;
            // Xóa thông báo sau khi đã hiển thị
            unset($_SESSION['success']);
        endif;

        // Kiểm tra có thông báo lỗi không và hiển thị SweetAlert2
        if (isset($_SESSION['error'])) :
            foreach ($_SESSION['error'] as $key => $value) :
?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi!',
                        text: '<?= $value ?>',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>
<?php
            endforeach;
            // Xóa thông báo sau khi đã hiển thị
            unset($_SESSION['error']);
        endif;
    }
}
?>

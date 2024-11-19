<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ForgotPassword extends BaseView
{
    public static function render($data = null)
    {
        // Kiểm tra nếu có thông báo lỗi
        $error_message = isset($_SESSION['error']['forgot_password']) ? $_SESSION['error']['forgot_password'] : null;
        if ($error_message) {
            echo '<div class="alert alert-danger">' . $error_message . '</div>';
            // Xóa lỗi sau khi hiển thị
            unset($_SESSION['error']['forgot_password']);
        }
?>
        <h1 class="text-center my-3" style="color: var(--bs-primary)">Lấy lại mật khẩu</h1>
        <div class="container p-5 rounded" style="background-color: #F9F3EC;">
            <form class="w-75 m-auto" action="/forgot-password" method="post">
                <input type="hidden" name="method" value="POST">
                <div class="form-group mb-3">
                    <label for="email">Email*</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Lấy lại mật khẩu</button>
            </form>
        </div>

<?php
    }
}

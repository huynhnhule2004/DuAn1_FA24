<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ResetPassword extends BaseView
{
    public static function render($data = null)
    {
?>

        <h1 class="text-center my-3" style="color: var(--bs-primary)">Đặt lại mật khẩu</h1>
        <div class="container p-5 rounded" style="background-color: #F9F3EC;">
            <form action="/reset-password" method="post">
                <div class="form-group mb-3">
                    <label for="otp">Mã OTP*</label>
                    <input type="text" name="otp" id="otp" class="form-control" placeholder="Nhập mã OTP" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Mật khẩu mới*</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu mới" required>
                </div>
                <button type="submit" class="btn btn-primary">Đặt lại mật khẩu</button>
            </form>
        </div>


<?php

    }
}

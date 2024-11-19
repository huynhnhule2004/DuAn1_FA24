<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class VerifyOtp extends BaseView
{
    public static function render($data = null)
    {
?>
        <!-- Form nhập OTP -->
        <h1 class="text-center my-3">Xác nhận OTP</h1>
        <div class="container p-5 rounded" style="background-color: #F9F3EC;">
            <form class="w-75 m-auto" action="/verify-otp" method="post">
                <div class="form-group mb-3">
                    <label for="otp">Nhập mã OTP*</label>
                    <input type="text" name="otp" id="otp" class="form-control" placeholder="Nhập mã OTP">
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
<?php
    }
}
?>
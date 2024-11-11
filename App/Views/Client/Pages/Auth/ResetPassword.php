<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ResetPassword extends BaseView
{
    public static function render($data = null)
    {
        ?>

        <!-- Code HTML hiển thị giao diện  -->
        <h1 class="text-center my-3" style="color: var(--bs-primary)">Đặt lại mật khẩu</h1>
        <div class="container p-5 rounded" style="background-color: #F9F3EC;">
            <form class="w-75 m-auto" action="/reset-password" method="post">
                <input type="hidden" name="method" value="PUT">
                <div class="form-group mb-3">
                    <label for="password">Mật khẩu*</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu"
                        >
                </div>
                <div class="form-group mb-3">
                    <label for="re_password">Nhập lại mật khẩu*</label>
                    <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Nhập lại mật khẩu"
                        >
                </div>

               
                <button type="submit" class="btn btn-primary mb-3 ">Đặt lại mật khẩu</button>

            </form>
        </div>


        <?php

    }
}
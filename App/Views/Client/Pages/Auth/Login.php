<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Login extends BaseView
{
    public static function render($data = null)
    {
        ?>

        <!-- Code HTML hiển thị giao diện  -->
        <h1 class="text-center my-3" style="color: var(--bs-primary)">Đăng nhập</h1>
        <div class="container p-5 rounded" style="background-color: #F9F3EC;">
            <form class="w-75 m-auto" action="/login" method="post">
                <input type="hidden" name="method" value="POST">
                <div class="form-group mb-3">
                    <label for="username">Tên đăng nhập*</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập"
                        required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Mật khẩu*</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu"
                        required>
                </div>

                <div class="form-check mb-3">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="remember" id="" checked>
                        Ghi nhớ đăng nhập
                    </label>
                </div>
                <button type="submit" class="btn btn-primary mb-3 ">Đăng nhập</button>
                <p class><a href="/forgot-password">Quên mật khẩu?</a> hoặc <a href="/register">Đăng ký</a></p>

            </form>
        </div>


        <?php

    }
}
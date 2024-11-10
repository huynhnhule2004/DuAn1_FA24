<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Register extends BaseView
{
  public static function render($data = null)
  {
?>

    <!-- Code HTML hiển thị giao diện  -->

    <h1 class="text-center my-3" style="color: var(--bs-primary)">Đăng ký</h1>
    <div class="container p-5 rounded" style="background-color: #F9F3EC;">
      <form action="/register" method="POST" class="w-75 m-auto">
        <input type="hidden" name="method" value="POST">
        <div class="form-group mb-3">
          <label for="username">Tên đăng nhập</label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"
            placeholder="Nhập tên đăng nhập">
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group mb-3">
          <label for="password">Mật khẩu</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
        </div>
        <div class="form-group mb-3">
          <label for="re_password">Nhập lại mật khẩu</label>
          <input type="password" class="form-control" id="re_password" name="re_password" placeholder="Nhập lại mật khẩu">
        </div>
        <div class="form-group mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
        </div>

        <div class="form-group mb-3">
          <label for="first_name">Nhập Tên</label>
          <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Nhập Tên">
        </div>

        <button type="reset" class="btn btn-primary mb-3 ">Nhập lại</button>
        <button type="submit" class="btn btn-primary mb-3 ">Đăng ký</button>
        <p><a href="/login">Quay về</a></p>


      </form>
    </div>

<?php

  }
}
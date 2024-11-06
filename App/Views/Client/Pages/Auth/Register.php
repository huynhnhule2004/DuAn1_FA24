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
      <form class="w-75 m-auto">
        <div class="form-group mb-3">
          <label for="exampleInputEmail1">Tên đăng nhập</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Nhập tên đăng nhập">
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group mb-3">
          <label for="exampleInputPassword1">Mật khẩu</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu">
        </div>
        <div class="form-group mb-3">
          <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập lại mật khẩu">
        </div>
        <div class="form-group mb-3">
          <label for="exampleInputPassword1">Email</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập email">
        </div>
        <div class="form-group mb-3">
          <label for="exampleInputPassword1">Họ và tên</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập họ và tên">
        </div>

        <button type="submit" class="btn btn-primary mb-3 ">Đăng ký</button>
        <p><a href="/login">Quay về</a></p>


      </form>
    </div>

<?php

  }
}
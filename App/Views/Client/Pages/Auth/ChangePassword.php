<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ChangePassword extends BaseView
{
    public static function render($data = null)
    {
?>

        <!-- Code HTML hiển thị giao diện  -->
        <style>
            .bg-secondary-soft {
                background-color: rgba(208, 212, 217, 0.1) !important;
            }

            .rounded {
                border-radius: 5px !important;
            }

            .py-5 {
                padding-top: 3rem !important;
                padding-bottom: 3rem !important;
            }

            .px-4 {
                padding-right: 1.5rem !important;
                padding-left: 1.5rem !important;
            }

            .file-upload .square {
                height: 250px;
                width: 250px;
                margin: auto;
                vertical-align: middle;
                border: 1px solid #e5dfe4;
                background-color: #fff;
                border-radius: 5px;
            }

            .text-secondary {
                --bs-text-opacity: 1;
                color: rgba(208, 212, 217, 0.5) !important;
            }

            .btn-success-soft {
                color: #28a745;
                background-color: rgba(40, 167, 69, 0.1);
            }

            .btn-danger-soft {
                color: #dc3545;
                background-color: rgba(220, 53, 69, 0.1);
            }

            .form-control {
                display: block;
                width: 100%;
                padding: 0.5rem 1rem;
                font-size: 0.9375rem;
                font-weight: 400;
                line-height: 1.6;
                color: #29292e;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #e5dfe4;
                border-radius: 5px;
            }
        </style>

        <div class="row">
            <div class="col-12">

                <!-- Page title -->
                <div class="my-5 text-center">
                    <h3 class="">Đổi mật khẩu tài khoản</h3>
                    <hr>
                </div>
                <!-- Form START -->
                <form action="/change-password/" method="post">
                    <input type="hidden" name="method" value="PUT">
                    <div class="row mb-5 gx-5">
                        <!-- Chi tiết liên lạc -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <!-- <h4 class="mb-4 mt-0">Chi tiết liên lạc</h4> -->
                                    <!-- Tên đăng nhập -->
                                    <div class="col-md-6">
                                        <label for="username" class="form-label">Tên đăng nhập*</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" value="<?=$_SESSION['user']['username'] ?>" disabled>
                                    </div>
                                    <!-- Tên -->
                                    <div class="col-md-6">
                                        <label for="old_password" class="form-label">Mật khẩu cũ*</label>
                                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Nhập mật khẩu cũ" >
                                    </div>
                                    <!-- Số điện thoại -->
                                    <div class="col-md-6">
                                        <label for="new_password" class="form-label">Mật khẩu mới*</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Nhập mật khẩu mới" >
                                    </div>
                                    <!-- Địa chỉ -->
                                    <div class="col-md-6">
                                        <label for="re_password" class="form-label">Nhập lại mật khẩu mới*</label>
                                        <input type="password" class="form-control" id="re_password" name="re_password" placeholder="Nhập lại mật khẩu mới" >
                                    </div>
                                </div> <!-- Row END -->
                            </div>
                        </div>

                        <!-- Tải ảnh hồ sơ -->
                        <div class="col-xxl-4">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <?php
                                    if ($data && $data['avatar']) :
                                    ?>
                                        <img src="<?= APP_URL ?>/public/uploads/users/<?= $data['avatar'] ?>" alt="" width="200px" height="400px">
                                    <?php
                                    else :
                                    ?>
                                        <img src="<?= APP_URL ?>/public/uploads/users/default-user.jpg" alt="" width="200px" height="400px">
                                    <?php
                                    endif;
                                    ?>
                                    <!-- <h4 for="avatar" class="mb-4 mt-4 text-center">Tải ảnh hồ sơ của bạn lên</h4> -->
                                    <div class="text-center">
                                        <!-- Thêm ảnh tải lên -->
                                        <!-- <input type="file" id="avatar" name="avatar" class="form-control" placeholder="Chọn ảnh đại diện"> -->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row END -->

                    <!-- Button -->
                    <div class="gap-3 d-md-flex justify-content-center ms-3 text-start">
                        <button type="reset" class="btn btn-danger btn-lg">Nhập lại</button>
                        <button type="submit" class="btn btn-primary btn-lg">Cập Nhật</button>
                    </div>
                </form>

            </div>
        </div>


<?php

    }
}

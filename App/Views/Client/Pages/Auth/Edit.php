<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Edit extends BaseView
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
                    <h3 class="">Thông tin tài khoản</h3>
                    <hr>
                </div>
                <!-- Form START -->
                <form action="/users/<?= $data['id'] ?>" method="post" class="file-upload" enctype="multipart/form-data">
                    <input type="hidden" name="method" value="PUT">
                    <div class="row mb-5 gx-5">
                        <!-- Chi tiết liên lạc -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Chi tiết liên lạc</h4>
                                    <!-- Tên đăng nhập -->
                                    <div class="col-md-6">
                                        <label for="username" class="form-label">Tên đăng nhập*</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" value="<?= ($data['username']) ?>" disabled>
                                    </div>
                                    <!-- Tên -->
                                    <div class="col-md-6">
                                        <label for="first_name" class="form-label">Tên*</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Họ" value="<?= ($data['first_name']) ?>">
                                    </div>
                                    <!-- Số điện thoại -->
                                    <div class="col-md-6">
                                        <label for="phone_number" class="form-label">Số điện thoại*</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= ($data['phone_number']) ?>" placeholder="Số điện thoại">
                                    </div>
                                    <!-- Địa chỉ -->
                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Địa chỉ*</label>
                                        <input type="text" class="form-control" id="address" name="address" value="<?= ($data['address']) ?>" placeholder="Địa chỉ">
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?= ($data['email']) ?>">
                                    </div>
                                    <!-- Ngày sinh -->
                                    <div class="col-md-6">
                                        <label for="date_of_birth" class="form-label">Ngày sinh*</label>
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?= ($data['date_of_birth']) ?>" placeholder="Ngày sinh">
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
                                    <h4 for="avatar" class="mb-4 mt-4 text-center">Tải ảnh hồ sơ của bạn lên</h4>
                                    <div class="text-center">
                                        <!-- Thêm ảnh tải lên -->
                                        <input type="file" id="avatar" name="avatar" class="form-control" placeholder="Chọn ảnh đại diện">
                                        
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

<?php

namespace App\Views\Client\Pages\Profile;

use App\Views\BaseView;

class Profile extends BaseView
{
    public static function render($data = null)
    {
?>
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
                <h3 class="">Hồ sơ của tôi</h3>
                <hr>
            </div>

            <!-- Form START -->
            <form class="file-upload">
                <div class="row mb-5 gx-5">
                    <!-- Contact detail -->
                    <div class="col-xxl-8 mb-5 mb-xxl-0">
                        <div class="bg-secondary-soft px-4 py-5 rounded">
                            <div class="row g-3">
                                <h4 class="mb-4 mt-0">Chi tiết liên lạc</h4>
                                <!-- First Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Tên*</label>
                                    <input type="text" class="form-control" placeholder="Tên" aria-label="First name" value="<?php echo htmlspecialchars($data['first_name']); ?>">
                                </div>
                                <!-- Last name -->
                                <div class="col-md-6">
                                    <label class="form-label">Họ*</label>
                                    <input type="text" class="form-control" placeholder="Họ" aria-label="Last name" value="<?php echo htmlspecialchars($data['last_name']); ?>">
                                </div>
                                <!-- Phone number -->
                                <div class="col-md-6">
                                    <label class="form-label">Số điện thoại*</label>
                                    <input type="text" class="form-control" placeholder="Số điện thoại" aria-label="Phone number" value="<?php echo htmlspecialchars($data['phone']); ?>">
                                </div>
                                <!-- Address -->
                                <div class="col-md-6">
                                    <label class="form-label">Địa chỉ*</label>
                                    <input type="text" class="form-control" placeholder="Địa chỉ" aria-label="Address" value="<?php echo htmlspecialchars($data['address']); ?>">
                                </div>
                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="inputEmail4" value="<?php echo htmlspecialchars($data['email']); ?>">
                                </div>
                                <!-- FB -->
                                <div class="col-md-6">
                                    <label class="form-label">FB*</label>
                                    <input type="text" class="form-control" placeholder="FB" aria-label="FB" value="<?php echo htmlspecialchars($data['social']); ?>">
                                </div>
                            </div> <!-- Row END -->
                        </div>
                    </div>

                    <!-- Upload profile -->
                    <div class="col-xxl-4">
                        <div class="bg-secondary-soft px-4 py-5 rounded">
                            <div class="row g-3">
                                <h4 class="mb-4 mt-0 text-center">Tải ảnh hồ sơ của bạn lên</h4>
                                <div class="text-center">
                                    <!-- Image upload -->
                                    <div class="square position-relative display-2 mb-3">
                                        <img src="<?php echo htmlspecialchars($data['avatar']); ?>" alt="Avatar" class="" width="250" height="250">
                                    </div>
                                    <!-- Button -->
                                    <input type="file" id="customFile" name="file" hidden="">
                                    <label class="btn btn-success-soft btn-block" for="customFile">Tải lên</label>
                                    <button type="button" class="btn btn-danger-soft">Xoá</button>
                                    <!-- Content -->
                                    <p class="text-muted mt-3 mb-0"><span class="me-1">Chú ý:</span>Ảnh size 250px x 250px</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row END -->

                <!-- Button -->
                <div class="gap-3 d-md-flex justify-content-center ms-3 text-start">
                    <button type="button" class="btn btn-danger btn-lg">Xóa Hồ Sơ</button>
                    <button type="button" class="btn btn-primary btn-lg">Cập Nhật</button>
                </div>
            </form> <!-- Form END -->
        </div>
    </div>

<?php
    }
}

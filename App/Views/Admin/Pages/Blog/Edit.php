<?php

namespace App\Views\Admin\Pages\Blog;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
?>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ BÀI VIẾT</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sửa bài viết</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="/admin/blogs/<?= $data['blog']['id'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa bài viết</h4>
                                    <input type="hidden" name="method" id="" value="PUT">
                                    <div align="center">
                                        <img src="<?= APP_URL ?>/public/uploads/blogs/<?= $data['blog']['image'] ?>" alt="" width="300px">
                                    </div>
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" id="id" name="id" value="<?= $data['blog']['id'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Tiêu đề*</label>
                                        <input type="text" class="form-control" id="title" placeholder="Nhập tiêu đề bài viết..." name="title" value="<?= $data['blog']['title'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="content_editor">Nội dung*</label>
                                        <textarea class="form-control" name="content" id="content_editor" placeholder="Nhập nội dung..." required><?= htmlspecialchars($data['blog']['content']) ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Hình ảnh</label>
                                        <input type="file" class="form-control" id="image" placeholder="Chọn hình ảnh..." name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="user_id">Người đăng</label>
                                        <input type="hidden" class="form-control" name="user_id" value="<?= $data['blog']['user_id'] ?>">
                                        <input type="text" class="form-control" id="user_id" placeholder="Chọn hình ảnh..." readonly value="<?= $data["user"][0]["author_name"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Loại bài viết*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="category_id" name="category_id" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>

                                            <?php
                                            foreach ($data['category'] as $item) :
                                            ?>
                                                <option value="<?= $item['id'] ?>" <?= ($item['id'] == $data['blog']['category_id']) ? 'selected' : '' ?>><?= $item['category_name'] ?></option>
                                            <?php
                                            endforeach
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white" name="">Làm lại</button>
                                        <button type="submit" class="btn btn-primary" name="">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

            <script>
                // Initialize CKEditor on each textarea with a unique ID
                ClassicEditor
                    .create(document.querySelector('#content_editor'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

    <?php
    }
}

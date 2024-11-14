<?php

namespace App\Views\Admin\Pages\BlogCategory;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {
?>

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ DANH MỤC BÀI VIẾT</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm danh mục bài viết</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Container fluid  -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="/admin/blog_categories" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Thêm danh mục bài viết</h4>
                                    <input type="hidden" name="method" value="POST">

                                    <!-- Tên danh mục bài viết -->
                                    <div class="form-group">
                                        <label for="category_name">Tên danh mục bài viết*</label>
                                        <input type="text" class="form-control" id="category_name" placeholder="Nhập tên danh mục bài viết..." name="category_name" required>
                                    </div>

                                    <!-- Mô tả -->
                                    <div class="form-group">
                                        <label for="description_editor">Mô tả</label>
                                        <textarea class="form-control" id="description_editor" placeholder="Nhập mô tả cho danh mục bài viết..." name="description" rows="3"></textarea>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white">Làm lại</button>
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Initialize CKEditor on each textarea with a unique ID
            ClassicEditor
                .create(document.querySelector('#description_editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>

<?php
    }
}
?>
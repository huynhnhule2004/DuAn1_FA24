<?php

namespace App\Views\Admin\Pages\ProductVariation;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {

?>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper ">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row ">
                    <div class="col-12 d-flex no-block align-items-center ">
                        <h4 class="page-title">QUẢN LÝ THUỘC TÍNH SẢN PHẨM</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm thuộc tính</li>
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
            <div class="container mt-5">
                <div class="row">
                    <!-- Cột trái: Form thêm thuộc tính -->
                    <div class="col-md-6 min-vh-100">
                        <h3>Thêm thuộc tính mới</h3>
                        <form class="form-horizontal" action="/admin/products/attributes" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="method" id="" value="POST">
                            <div class="mb-3">
                                <label for="productSelect" class="form-label">Tên sản phẩm</label>
                                <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="productSelect" name="product_id" onchange="fetchAttributes()" required>
                                    <option value="" selected disabled>Vui lòng chọn...</option>

                                    <?php
                                    foreach ($data as $item) :
                                    ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['product_name'] ?></option>
                                    <?php
                                    endforeach
                                    ?>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="attributeName" class="form-label">Tên thuộc tính</label>
                                <input type="text" name="name" class="form-control" id="attributeName" placeholder="Nhập tên thuộc tính">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm thuộc tính</button>
                        </form>
                    </div>

                    <!-- Cột phải: Danh sách thuộc tính -->
                    <div class="col-md-6">
                        <h3>Danh sách thuộc tính</h3>
                        <ul class="list-group">
                            <li class="list-group-item">Thuộc tính 1</li>
                            <li class="list-group-item">Thuộc tính 2</li>
                            <li class="list-group-item">Thuộc tính 3</li>
                            <li class="list-group-item">Thuộc tính 4</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->


            <script>
                // Initialize CKEditor on each textarea with a unique ID
                ClassicEditor
                    .create(document.querySelector('#short_description_editor'))
                    .catch(error => {
                        console.error(error);
                    });

                ClassicEditor
                    .create(document.querySelector('#long_description_editor'))
                    .catch(error => {
                        console.error(error);
                    });

                ClassicEditor
                    .create(document.querySelector('#how_to_use_editor'))
                    .catch(error => {
                        console.error(error);
                    });

                function fetchAttributes() {
                    // Lấy giá trị product_id từ select
                    const productId = document.getElementById('productSelect').value;

                    // Gửi request đến API
                    fetch(`/admin/products/get_attributes.php?product_id=${productId}`)
                        .then(response => response.json())
                        .then(data => {
                            // Lấy element danh sách thuộc tính
                            const attributeList = document.querySelector('.list-group');

                            // Xóa danh sách cũ
                            attributeList.innerHTML = '';

                            // Cập nhật danh sách thuộc tính mới
                            data.forEach(attribute => {
                                const li = document.createElement('li');
                                li.className = 'list-group-item';
                                li.textContent = attribute.name; // Hiển thị tên thuộc tính
                                attributeList.appendChild(li);
                            });
                        })
                        .catch(error => console.error('Error fetching attributes:', error));
                }
            </script>

    <?php
    }
}

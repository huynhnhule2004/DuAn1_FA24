<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {
?>
        <style>
            #variant_fields .form-group label.variant-option {
                display: inline-block;
                /* Hiển thị trên một dòng */
                margin-right: 20px;
                /* Khoảng cách giữa các label */
                font-size: 16px;
                /* Kích thước font cho tên biến thể */
                line-height: 1.5;
                /* Khoảng cách giữa các dòng */
                font-weight: 600;
                /* Đậm hơn để dễ nhìn */
            }

            #variant_fields .form-group label.variant-option input {
                margin-right: 8px;
                /* Khoảng cách giữa checkbox và tên biến thể */
                vertical-align: middle;
                /* Căn giữa checkbox với chữ */
                transform: scale(1.2);
                /* Làm cho checkbox lớn hơn một chút */
            }

            #variant_fields .form-group label.variant-option input:checked {
                background-color: #007bff;
                /* Màu nền khi checkbox được chọn */
                border-color: #007bff;
                /* Màu viền khi checkbox được chọn */
            }

            #variant_fields .form-group h5 {
                margin-bottom: 10px;
                /* Khoảng cách giữa tiêu đề và danh sách lựa chọn */
                font-size: 14px;
                /* Kích thước tiêu đề */
                color: #333;
                /* Màu chữ tiêu đề */
                font-weight: bold;
                /* Làm cho tiêu đề đậm */
            }

            #variant_fields .form-group {
                margin-bottom: 20px;
                /* Khoảng cách giữa các form-group */
            }

            #variant_fields {
                margin-top: 20px;
                /* Khoảng cách giữa khối biến thể và các phần tử khác */
            }
        </style>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ SẢN PHẨM</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
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
                            <form class="form-horizontal" action="/admin/products" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Thêm sản phẩm</h4>
                                    <input type="hidden" name="method" id="" value="POST">
                                    <div class="form-group">
                                        <label for="product_name">Tên*</label>
                                        <input type="text" class="form-control" id="product_name" placeholder="Nhập tên sản phẩm..." name="product_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Loại sản phẩm*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="category_id" name="category_id" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>

                                            <?php
                                            foreach ($data['categories'] as $item) :
                                            ?>
                                                <option value="<?= $item['id'] ?>"><?= $item['category_name'] ?></option>
                                            <?php
                                            endforeach
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="long_description">Mô tả</label>
                                        <textarea class="form-control" name="long_description" id="long_description_editor" placeholder="Nhập mô tả..."></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-group col-md-6">
                                            <label for="price">Giá tiền*</label>
                                            <input type="number" class="form-control" id="price" placeholder="Nhập giá tiền..." name="price_default" required>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="discount_price">Giá giảm*</label>
                                            <input type="number" class="form-control" id="discount_price" placeholder="Nhập giá giảm..." name="discount_price" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Hình ảnh</label>
                                        <input type="file" class="form-control" id="image" placeholder="Chọn hình ảnh..." name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="short_description">Mô tả ngắn</label>
                                        <textarea class="form-control" name="short_description" id="short_description_editor" placeholder="Nhập mô tả ngắn..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="how_to_use">Cách sử dụng</label>
                                        <textarea class="form-control" name="how_to_use" id="how_to_use_editor" placeholder="Nhập cách sử dụng..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_feature">Nổi bật*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="is_feature" name="is_feature" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1">Nổi bật</option>
                                            <option value="0">Không</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="available">Còn hàng</option>
                                            <option value="out_of_stock">Hết hàng</option>
                                            <option value="discontinued">Ngừng hoạt động</option>
                                        </select>
                                    </div>
                                    <!-- Nút sản phẩm có biến thể -->
                                    <div class="form-group">
                                        <div class="btn btn-primary" id="variant_button">Sản phẩm có biến thể</div>
                                    </div>

                                    <!-- Các trường input cho biến thể (ban đầu ẩn) -->
                                    <div id="variant_fields" style="display: none;">
                                        <div class="form-group">
                                            <label for="variant_name">Tên biến thể</label>
                                            <?php
                                            // Kiểm tra xem mảng 'product_variant_options' có tồn tại và không phải là null
                                            if (isset($data['product_variant_options']) && is_array($data['product_variant_options']) && !empty($data['product_variant_options'])) {
                                                $current_variation_name = '';  // Biến dùng để kiểm tra tên thuộc tính (Kích thước, Màu sắc)
                                                foreach ($data['product_variant_options'] as $option) {
                                                    // Kiểm tra và hiển thị tên thuộc tính nếu có sự thay đổi
                                                    if ($option['product_variation_name'] !== $current_variation_name) {
                                                        echo "<h5>" . $option['product_variation_name'] . ":</h5>";
                                                        $current_variation_name = $option['product_variation_name'];
                                                    }

                                                    // Hiển thị lựa chọn biến thể (ví dụ: S, M, L, XL, Màu sắc)
                                                    echo "<label class='variant-option'>";
                                                    echo "<input type='checkbox' name='variant_options[]' value='" . $option['id'] . "'>";
                                                    echo $option['name'];
                                                    echo "</label>";
                                                }
                                            } else {
                                                echo "Không có biến thể sản phẩm nào.";
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    
                                </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="reset" class="btn btn-danger text-white" name="">Làm lại</button>
                                <button type="submit" class="btn btn-primary" name="">Thêm</button>
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

            document.getElementById('variant_button').addEventListener('click', function() {
                var variantFields = document.getElementById('variant_fields');

                // Toggle hiển thị/ẩn các trường nhập liệu cho biến thể
                if (variantFields.style.display === 'none' || variantFields.style.display === '') {
                    variantFields.style.display = 'block';
                } else {
                    variantFields.style.display = 'none';
                }
            });
        </script>
<?php
    }
}

<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Edit extends BaseView
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
                display: none;
                /* Mặc định ẩn khối biến thể */
                margin-top: 20px;
                /* Khoảng cách trên nếu hiển thị */
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
                                    <li class="breadcrumb-item active" aria-current="page">Sửa sản phẩm</li>
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
                            <form class="form-horizontal" action="/admin/products/<?= $data['product']['id'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa sản phẩm</h4>
                                    <input type="hidden" name="method" id="" value="PUT">
                                    <div align="center">
                                        <img src="<?= APP_URL ?>/public/uploads/products/<?= $data['product']['image'] ?>" alt="" width="300px">
                                    </div>
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" id="id" name="id" value="<?= $data['product']['id'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Hình ảnh</label>
                                        <input type="file" class="form-control" id="image" placeholder="Chọn hình ảnh..." name="image" value="<?= APP_URL ?>/public/uploads/products/<?= $data['product']['image'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">Tên*</label>
                                        <input type="text" class="form-control" id="product_name" placeholder="Nhập tên sản phẩm..." name="product_name" value="<?= $data['product']['product_name'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Loại sản phẩm*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="category_id" name="category_id" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>

                                            <?php
                                            foreach ($data['category'] as $item) :
                                            ?>
                                                <option value="<?= $item['id'] ?>" <?= ($item['id'] == $data['product']['category_id']) ? 'selected' : '' ?>><?= $item['category_name'] ?></option>
                                            <?php
                                            endforeach
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="long_description">Mô tả</label>
                                        <textarea class="form-control" name="long_description" id="long_description_editor" placeholder="Nhập mô tả..."><?= htmlspecialchars($data['product']['long_description']) ?></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-group col-md-6">
                                            <label for="price_default col-md-6">Giá tiền*</label>
                                            <input type="number" class="form-control" id="price_default" placeholder="Nhập giá tiền..." name="price_default" value="<?= $data['product']['price_default'] ?>" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="discount_price ">Giá giảm*</label>
                                            <input type="number" class="form-control" id="discount_price" placeholder="Nhập giá giảm..." name="discount_price" value="<?= $data['product']['discount_price'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="short_description">Mô tả ngắn</label>
                                        <textarea class="form-control" name="short_description" id="short_description_editor" placeholder="Nhập mô tả ngắn..."><?= htmlspecialchars($data['product']['short_description']) ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="how_to_use">Cách sử dụng</label>
                                        <textarea class="form-control" name="how_to_use" id="how_to_use_editor" placeholder="Nhập cách sử dụng..."><?= htmlspecialchars($data['product']['how_to_use']) ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_feature">Nổi bật*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="is_feature" name="is_feature" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1" <?= ($data['product']['is_feature'] == 1 ? 'selected' : '') ?>>Nổi bật</option>
                                            <option value="0" <?= ($data['product']['is_feature'] == 0 ? 'selected' : '') ?>>Không</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" value="<?= $data['product']['status'] ?>" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="available" <?= ($data['product']['status'] == 'available' ? 'selected' : '') ?>>Còn hàng</option>
                                            <option value="out_of_stock" <?= ($data['product']['status'] == 'out_of_stock' ? 'selected' : '') ?>>Hết hàng</option>
                                            <option value="discontinued" <?= ($data['product']['status'] == 'discontinued' ? 'selected' : '') ?>>Ngừng hoạt động</option>
                                        </select>
                                    </div>

                                    <!-- Nút sản phẩm có biến thể -->
                                    <div class="form-group">
                                        <div class="btn btn-primary" id="variant_button">Sản phẩm có biến thể</div>
                                    </div>

                                    <div id="variant_fields">
                                        <div class="form-group">
                                            <label for="variant_name">Tên biến thể</label>
                                            <?php
                                            $ids = [];

                                            // Thu thập danh sách ID từ `variant_option`
                                            foreach ($data['variant_option'] as $option) {
                                                $ids[] = $option['id'];
                                            }

                                            if (isset($data['product_variant_options']) && is_array($data['product_variant_options']) && !empty($data['product_variant_options'])) {
                                                $current_variation_name = '';
                                                foreach ($data['product_variant_options'] as $option) {
                                                    // Nếu tên biến thể thay đổi, in ra tiêu đề mới
                                                    if ($option['product_variation_name'] !== $current_variation_name) {
                                                        echo "<h5>" . $option['product_variation_name'] . ":</h5>";
                                                        $current_variation_name = $option['product_variation_name'];
                                                    }

                                                    // Kiểm tra nếu id của biến thể nằm trong mảng $ids, checkbox sẽ được chọn (checked)
                                                    $isChecked = in_array($option['id'], $ids) ? 'checked' : '';

                                                    // Render checkbox
                                                    echo "<label class='variant-option'>";
                                                    echo "<input type='checkbox' name='variant_options[" . $option['id'] . "]' class='variant-checkbox' data-group='" . $option['product_variation_name'] . "' data-value='" . $option['name'] . "' value='" . $option['id'] . "' $isChecked>";
                                                    echo $option['name'];
                                                    echo "</label>";
                                                }
                                            } else {
                                                echo "Không có biến thể sản phẩm nào.";
                                            }
                                            ?>

                                        </div>
                                    </div>

                                    <!-- Hiển thị bảng tổ hợp SKU -->
                                    <div id="sku_table" style="display: block; margin-top: 20px;">
                                        <h4>Quản lý SKU:</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Biến thể</th>
                                                    <th>Mã SKU</th>
                                                    <th>Giá</th>
                                                    <th>Số lượng tồn kho</th>
                                                    <th>Hình ảnh</th>
                                                </tr>
                                            </thead>
                                            <tbody id="sku_body">
                                                <!-- Dòng SKU sẽ được thêm ở đây -->
                                            </tbody>
                                        </table>
                                    </div>
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
                variantFields.style.display = (variantFields.style.display === 'none' || variantFields.style.display === '') ? 'block' : 'none';
            });

            document.addEventListener("DOMContentLoaded", function() {
                var skus = <?php echo json_encode($data['skus']); ?>;
                const skuTable = document.getElementById("sku_table");
                const skuBody = document.getElementById("sku_body");
                const checkboxes = document.querySelectorAll('input[type="checkbox"]');

                // Chức năng tạo tổ hợp SKU
                function generateCombinations(arrays) {
                    return arrays.reduce((a, b) => a.flatMap(d => b.map(e => [...d, e])), [
                        []
                    ]);
                }

                // Cập nhật SKUs
                function updateSKUs() {
                    const selectedOptions = {};
                    checkboxes.forEach(checkbox => {
                        if (checkbox.checked) {
                            const group = checkbox.dataset.group;
                            const value = checkbox.dataset.value;
                            if (!selectedOptions[group]) selectedOptions[group] = [];
                            selectedOptions[group].push(value);
                        }
                    });

                    if (Object.keys(selectedOptions).length === 0) {
                        skuBody.innerHTML = "";
                        return;
                    }

                    const combinations = generateCombinations(Object.values(selectedOptions));
                    skuBody.innerHTML = "";

                    combinations.forEach((combination, index) => {
                        const sku = skus[index] || {}; // Lấy SKU nếu có hoặc tạo một object trống
                        const row = document.createElement("tr");

                        // Kiểm tra xem có dữ liệu SKU không và hiển thị tương ứng
                        row.innerHTML = `
                <td>${combination.join(' - ')}</td>
                <input type="hidden" name="sku_id[]" value="${sku.id}" >
                <td><input type="text" name="sku_code[]" value="${sku.sku || ''}" placeholder="Mã SKU" class="form-control"></td>
                <td><input type="number" name="price[]" value="${sku.price || ''}" placeholder="Giá" class="form-control"></td>
                <td><input type="number" name="stock_quantity[]" value="${sku.stock_quantity || ''}" placeholder="Tồn kho" class="form-control"></td>
                <td><input type="file" name="sku_image[]" class="form-control"></td>
            `;
                        skuBody.appendChild(row);
                    });
                }

                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', updateSKUs);
                });

                updateSKUs();
            });
        </script>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->

<?php
    }
}

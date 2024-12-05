<?php

namespace App\Views\Admin\Pages\ProductVariantOption;

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
                        <h4 class="page-title">QUẢN LÝ GiÁ TRỊ THUỘC TÍNH SẢN PHẨM</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm giá trị thuộc tính</li>
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
                        <h3>Thêm giá trị thuộc tính mới</h3>
                        <form class="form-horizontal" action="/admin/products/product_variant_options" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="method" id="" value="POST">
                            <div class="form-group">
                                <label for="product_variant_id">Thuộc tính*</label>
                                <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="product_variant_id" name="product_variant_id" required>
                                    <option value="" selected disabled>Vui lòng chọn...</option>

                                    <?php
                                    foreach ($data['product_variations'] as $item) :
                                    ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                    <?php
                                    endforeach
                                    ?>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="attributeName" class="form-label">Tên giá trị thuộc tính</label>
                                <input type="text" name="name" class="form-control" id="attributeName" placeholder="Nhập tên thuộc tính">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm thuộc tính</button>
                        </form>
                    </div>

                    <!-- Cột phải: Danh sách thuộc tính -->
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Danh sách thuộc tính</h3>
                        </div>
                        <?php
                        if (count($data['product_variant_options'])) :
                        ?>
                            <div class="table-responsive">
                                <table id="" class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Thuộc tính</th>
                                            <th>Tên</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($data['product_variant_options'] as $item) :
                                        ?>
                                            <tr>
                                                <td style="white-space: nowrap;"><?= $item['id'] ?></td>
                                                <td style="white-space: nowrap;"><?= $item['product_variation_name'] ?></td>
                                                <td style="white-space: nowrap;"><?= $item['name'] ?></td>
                                                <td style="white-space: nowrap;">
                                                    <a href="/admin/products/product_variant_options/<?= $item['id'] ?>" class="btn btn-primary ">Sửa</a>
                                                    <form action="/admin/products/product_variant_options/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return handleDelete(event)">
                                                        <input type="hidden" name="method" value="DELETE" id="">
                                                        <button type="submit" class="btn btn-danger text-white">Xoá</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;


                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        else :

                        ?>
                            <h4 class="text-center text-danger">Không có dữ liệu</h4>
                        <?php
                        endif;

                        ?>
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



                // Hàm xử lý xác nhận xóa bằng SweetAlert2
                function handleDelete(event) {
                    event.preventDefault(); // Ngừng việc gửi form mặc định

                    Swal.fire({
                        title: 'Bạn chắc chắn muốn xóa?',
                        text: 'Bạn không thể khôi phục sau khi xóa!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Nếu xác nhận, gửi form
                            event.target.submit();
                        }
                    });
                }
            </script>

    <?php
    }
}

<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Validations\ProductValidation;
use App\Validations\ProductVariationValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\ProductVariation\Create;
use App\Views\Admin\Pages\ProductVariation\Edit;
use App\Views\Admin\Pages\ProductVariation\Index;

class ProductVariationController
{


    // hiển thị danh sách
    public static function index()
    {
        $product = new Product();
        $data = $product->getAllProductJoinCategory();

        // echo "<pre>";
        // var_dump($data);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
        $product_variation = new ProductVariation();
        $data = $product_variation->getAllProductVariation();

        // echo "<pre>";
        // var_dump($data);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form thêm
        Create::render($data);
        Footer::render();
    }


    // xử lý chức năng thêm
    public static function store()
    {
        // validation các trường dữ liệu
        $is_valid = ProductVariationValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm sản phẩm thất bại');
            header('location: /admin/products/attributes');
            exit;
        }

        $name = $_POST['name'];

        //kiểm tra tên sản phẩm có tồn tại chưa => không được trùng tên

        $product_variation  = new ProductVariation();
        $is_exist = $product_variation->getOneProductByName($name);

        if ($is_exist) {
            NotificationHelper::error('store', 'Tên thuộc tính này đã tồn tại');
            header('location: /admin/products/attributes');
            exit;
        }

        // Thực hiện thêm
        $data = [
            'name' => $_POST['name']
        ];

        // var_dump($data);
        // $is_upload = ProductValidation::uploadImage();

        // if ($is_upload) {
        //     $data['image'] = $is_upload;
        // }
        // var_dump($data);

        $result = $product_variation->createProduct($data);

        if ($result) {
            NotificationHelper::success('store', 'Thêm thuộc tính thành công');
            header('location: /admin/products/attributes');
        } else {
            NotificationHelper::error('store', 'Thêm thuộc tính thất bại');
            header('location: /admin/products/attributes');
        }
    }


    // // hiển thị chi tiết
    // public static function show()
    // {
    // }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {

        $product_variation = new ProductVariation();
        $data_product_variation = $product_variation->getOne($id);

        $product_variations = new ProductVariation();
        $data_product_variations = $product_variations->getAll();

        if (!$data_product_variation) {
            NotificationHelper::error('edit', 'Không thể xem sản phẩm này');
            header('location: /admin/products/attributes');
            exit;
        }

        $data = [
            'product_variation' => $data_product_variation,
            'data_product_variations' => $data_product_variations
        ];

        // echo "<pre>";
        // var_dump($data);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();
    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        // validation các trường dữ liệu
        $is_valid = ProductVariationValidation::edit();
        // var_dump($is_valid);
        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật thuộc tính thất bại');
            header("location: /admin/products/attributes/$id");
            exit;
        }

        $name = $_POST['name'];
        //kiểm tra tên loại có tồn tại chưa => không được trùng tên

        $product_variation  = new ProductVariation();
        $is_exist = $product_variation->getOneProductByName($name);

        if ($is_exist) {
            NotificationHelper::error('store', 'Tên thuộc tính này đã tồn tại');
            header('location: /admin/products/attributes');
            exit;
        }

        //Thực hiện cập nhật
        $data = [
            'name' => $name

        ];


        $result = $product_variation->updateProductVariation($id, $data);

        if ($result) {
            NotificationHelper::success('update', 'Cập nhật thuộc tính thành công');
            header('location: /admin/products/attributes');
        } else {
            NotificationHelper::error('update', 'Cập nhật thuộc tính thất bại');
            header("location: /admin/products/attributes/$id");
        }
    }


    // // thực hiện xoá
    public static function delete(int $id)
    {
        $product_variation  = new ProductVariation();
        $result = $product_variation->deleteProductVariation($id);

        // var_dump($result);
        if ($result) {
            NotificationHelper::success('delete', 'Xóa thuộc tính thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa thuộc tính thất bại');
        }

        header('location: /admin/products/attributes');
    }
}

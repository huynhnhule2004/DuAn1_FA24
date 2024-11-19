<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariantOption;
use App\Models\ProductVariation;
use App\Validations\ProductValidation;
use App\Validations\ProductVariantOptionValidation;
use App\Validations\ProductVariationValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\ProductVariantOption\Create;
use App\Views\Admin\Pages\ProductVariantOption\Edit;
use App\Views\Admin\Pages\ProductVariantOption\Index;

class ProductVariantOptionController
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
        $product_variant_option = new ProductVariantOption();
        $product_variant_options = $product_variant_option->getAllVariationJoinOption();

        $product_variation = new ProductVariation();
        $product_variations = $product_variation->getAllProductVariation();

        $data = [
            'product_variant_options' => $product_variant_options,
            'product_variations' => $product_variations
        ];

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
        $is_valid = ProductVariantOptionValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm giá trị thuộc tính thất bại');
            header('location: /admin/products/product_variant_options');
            exit;
        }

        $name = $_POST['name'];

        //kiểm tra tên sản phẩm có tồn tại chưa => không được trùng tên

        $product_variant_option  = new ProductVariantOption();
        $is_exist = $product_variant_option->getOneProductByName($name);

        if ($is_exist) {
            NotificationHelper::error('store', 'Tên giá trị thuộc tính này đã tồn tại');
            header('location: /admin/products/product_variant_options');
            exit;
        }

        // Thực hiện thêm
        $data = [
            'product_variant_id' => $_POST['product_variant_id'],
            'name' => $_POST['name']
        ];

        // var_dump($data);
        // $is_upload = ProductValidation::uploadImage();

        // if ($is_upload) {
        //     $data['image'] = $is_upload;
        // }
        // var_dump($data);

        $result = $product_variant_option->createProduct($data);

        if ($result) {
            NotificationHelper::success('store', 'Thêm giá trị thuộc tính thành công');
            header('location: /admin/products/product_variant_options');
        } else {
            NotificationHelper::error('store', 'Thêm giá trị thuộc tính thất bại');
            header('location: /admin/products/product_variant_options');
        }
    }


    // // hiển thị chi tiết
    // public static function show()
    // {
    // }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {

        $product_variant_option = new ProductVariantOption();
        $product_variant_options = $product_variant_option->getAllVariationJoinOption();
        $product_variant_option_detail = $product_variant_option->getOneProductVariantOption($id);

        $product_variation = new ProductVariation();
        $product_variations = $product_variation->getAllProductVariation();

        if (!$product_variant_options) {
            NotificationHelper::error('edit', 'Không thể xem sản phẩm này');
            header('location: /admin/products/attributes');
            exit;
        }

        $data = [
            'product_variant_options' => $product_variant_options,
            'product_variations' => $product_variations,
            "product_variant_option_detail" => $product_variant_option_detail
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
        $is_valid = ProductVariantOptionValidation::edit();
        // var_dump($is_valid);
        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật giá trị thuộc tính thất bại');
            header("location: /admin/products/product_variant_options/$id");
            exit;
        }

        $name = $_POST['name'];
        //kiểm tra tên loại có tồn tại chưa => không được trùng tên

        $product_variant_option  = new ProductVariantOption();
        $is_exist = $product_variant_option->getOneProductByName($name);

        if ($is_exist) {
            NotificationHelper::error('store', 'Tên giá trị thuộc tính này đã tồn tại');
            header('location: /admin/products/product_variant_options');
            exit;
        }
        // Thực hiện cập nhật
        $data = [
            'product_variant_id' => $_POST['product_variant_id'],
            'name' => $name

        ];


        $result = $product_variant_option->updateProductVariantOption($id, $data);

        if ($result) {
            NotificationHelper::success('update', 'Cập nhật thuộc tính thành công');
            header('location: /admin/products/product_variant_options');
        } else {
            NotificationHelper::error('update', 'Cập nhật thuộc tính thất bại');
            header("location: /admin/products/product_variant_options/$id");
        }
    }


    // // thực hiện xoá
    public static function delete(int $id)
    {
        $product_variant_option  = new ProductVariantOption();
        $result = $product_variant_option->deleteProductVariantOption($id);

        // var_dump($result);
        if ($result) {
            NotificationHelper::success('delete', 'Xóa giá trị thuộc tính thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa giá trị thuộc tính thất bại');
        }

        header('location: /admin/products/product_variant_options');
    }
}

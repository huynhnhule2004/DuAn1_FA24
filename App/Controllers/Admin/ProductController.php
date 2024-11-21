<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Validations\ProductValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Product\Create;
use App\Views\Admin\Pages\Product\Edit;
use App\Views\Admin\Pages\Product\Index;
use App\Models\ProductVariantOption;
use App\Models\ProductVariantOptionCombination;
use App\Models\Sku;
use App\Validations\SkuValidation;

class ProductController
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
        $category = new Category();
        $categories = $category->getAllCategory();

        $product_variant_option = new ProductVariantOption();
        $product_variant_options = $product_variant_option->getAllVariationJoinOption();

        $data = [
            'product_variant_options' => $product_variant_options,
            'categories' => $categories,
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
        // Validation các trường dữ liệu
        if (!ProductValidation::create()) {
            NotificationHelper::error('store', 'Thêm sản phẩm thất bại');
            header('location: /admin/products/create');
            exit;
        }

        // Kiểm tra tên sản phẩm đã tồn tại
        $name = $_POST['product_name'];
        $product = new Product();
        $is_exist = $product->getOneProductByName($name);


        if ($is_exist) {
            NotificationHelper::error('store', 'Tên sản phẩm này đã tồn tại');
            header('location: /admin/products/create');
            exit;
        }
        // Tạo dữ liệu sản phẩm
        $data = [
            'product_name' => $_POST['product_name'],
            'price_default' => $_POST['price_default'],
            'discount_price' => $_POST['discount_price'],
            'is_feature' => $_POST['is_feature'],
            'status' => $_POST['status'],
            'category_id' => $_POST['category_id'],
            'short_description' => $_POST['short_description'],
            'long_description' => $_POST['long_description'],
            'how_to_use' => $_POST['how_to_use'],
        ];

        // Upload hình ảnh sản phẩm
        if ($imagePath = ProductValidation::uploadImage()) {
            $data['image'] = $imagePath;
        }

        // Thêm sản phẩm vào cơ sở dữ liệu
        $productId = $product->createProduct($data);

        // Kiểm tra nếu thêm sản phẩm thành công
        if ($productId) {
            // Thêm SKU nếu có
            if (isset($_POST['sku_code'], $_POST['price'], $_POST['stock_quantity'])) {
                self::processSku($productId);
            }

            // Hiển thị thông báo thành công và chuyển hướng về trang quản trị
            NotificationHelper::success('store', 'Thêm sản phẩm thành công');
            header('location: /admin/products');
            exit;
        } else {
            // Nếu không thêm sản phẩm thành công
            NotificationHelper::error('store', 'Thêm sản phẩm thất bại');
            header('location: /admin/products/create');
            exit;
        }
    }

    // Tách phần xử lý SKU ra một hàm riêng
    private static function processSku($productId)
    {
        $skuCodes = $_POST['sku_code'];
        $skuPrices = $_POST['price'];
        $skuStockQuantities = $_POST['stock_quantity'];

        if (count($skuCodes) == count($skuPrices) && count($skuPrices) == count($skuStockQuantities)) {
            foreach ($skuCodes as $index => $skuCode) {
                if (empty($skuCode) || empty($skuPrices[$index]) || empty($skuStockQuantities[$index])) {
                    echo "Dữ liệu không hợp lệ cho SKU: $skuCode<br>";
                    continue;
                }

                // Tạo dữ liệu SKU
                $skuData = [
                    'product_id' => $productId, // ID của sản phẩm đã thêm
                    'sku' => $skuCode,
                    'price' => $skuPrices[$index],
                    'stock_quantity' => $skuStockQuantities[$index]
                ];

                // Xử lý upload hình ảnh cho SKU
                // Kiểm tra và xử lý upload hình ảnh cho mỗi SKU
                if (isset($_FILES['sku_image']) && isset($_FILES['sku_image']['name'][$index])) {
                    $skuImage = $_FILES['sku_image'];
                    $imagePath = SkuValidation::uploadImage1($skuImage, $index);  // Truyền file cụ thể của mỗi SKU
                    if ($imagePath) {
                        $skuData['image'] = $imagePath;
                    }
                }

                // Thêm SKU vào cơ sở dữ liệu
                $skuModel = new Sku();
                $skuId = $skuModel->createSku($skuData);

                // Thêm các kết hợp variant options nếu có
                self::processVariantOptions($skuId);

                if ($skuId) {
                    echo "SKU đã thêm thành công! SKU ID: $skuId<br>";
                } else {
                    echo "Có lỗi khi thêm SKU với mã: $skuCode<br>";
                }
            }
        } else {
            echo "Dữ liệu không hợp lệ. Các mảng SKU, giá và số lượng không khớp số lượng.<br>";
        }
    }

    // Tách phần xử lý variant options ra một hàm riêng
    private static function processVariantOptions($skuId)
    {
        if (isset($_POST['variant_options'])) {
            foreach ($_POST['variant_options'] as $variantOptionId) {
                $combinationData = [
                    'sku_id' => $skuId,
                    'product_variant_option_id' => $variantOptionId
                ];
                $productVariantOptionCombination = new ProductVariantOptionCombination();
                $productVariantOptionCombination->create($combinationData);
            }
        }
    }



    // // hiển thị chi tiết
    // public static function show()
    // {
    // }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {

        $product = new Product();
        $data_product = $product->getOneProduct($id);

        $category = new Category();
        $data_category = $category->getAllCategory();

        $sku = new Sku();
        $skus = $sku->getAllSkuByProduct($id);

        $variant_option = new Product();
        $variant_options = $variant_option->getAllVariantOptionByProduct($id);

        $product_variant_option = new ProductVariantOption();
        $product_variant_options = $product_variant_option->getAllVariationJoinOption();

        if (!$data_product) {
            NotificationHelper::error('edit', 'Không thể xem sản phẩm này');
            header('location: /admin/products/');
            exit;
        }

        $data = [
            'product' => $data_product,
            'category' => $data_category,
            'skus' => $skus,
            'variant_option' => $variant_options,
            'product_variant_options' => $product_variant_options,
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
        // Validation dữ liệu
        $is_valid = ProductValidation::edit();
        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật sản phẩm thất bại');
            header("location: /admin/products/$id");
            exit;
        }

        $name = $_POST['product_name'];
        $product = new Product();
        $is_exist = $product->getOneProductByName($name);

        if ($is_exist && $is_exist['id'] != $id) {
            NotificationHelper::error('update', 'Tên sản phẩm này đã tồn tại');
            header("location: /admin/products/$id");
            exit;
        }

        // Thực hiện cập nhật
        $data = [
            'product_name' => $name,
            'price_default' => $_POST['price_default'],
            'discount_price' => $_POST['discount_price'],
            'is_feature' => $_POST['is_feature'],
            'status' => $_POST['status'],
            'category_id' => $_POST['category_id'],
            'short_description' => $_POST['short_description'],
            'long_description' => $_POST['long_description'],
            'how_to_use' => $_POST['how_to_use'],
        ];

        // Kiểm tra và upload ảnh
        $is_upload = ProductValidation::uploadImage();
        if ($is_upload) {
            $data['image'] = $is_upload;
        }

        $result = $product->updateProduct($id, $data);

        if ($result) {
            // Cập nhật SKU
            if (isset($_POST['sku_code'], $_POST['price'], $_POST['stock_quantity'])) {
                self::processSkuUpdate($id);  // Chạy xử lý SKU
            }

            NotificationHelper::success('update', 'Cập nhật sản phẩm thành công');
            header('location: /admin/products');
            exit;
        } else {
            NotificationHelper::error('update', 'Cập nhật sản phẩm thất bại');
            header("location: /admin/products/$id");
            exit;
        }
    }

    // Phương thức xử lý cập nhật SKU
    private static function processSkuUpdate($productId)
    {
        if (!isset($_POST['sku_code'], $_POST['price'], $_POST['stock_quantity'])) {
            return; // Nếu không có dữ liệu SKU thì dừng lại
        }

        $skuCodes = $_POST['sku_code'];
        $skuPrices = $_POST['price'];
        $skuStockQuantities = $_POST['stock_quantity'];
        $skuIds = $_POST['sku_id'] ?? []; // Các SKU ID hiện tại (nếu có)

        $skuModel = new Sku();
        $productVariantOptionCombinationModel = new ProductVariantOptionCombination();

        // Lấy tất cả SKU hiện tại của sản phẩm
        $existingSkus = $skuModel->getAllSkuByProduct($productId);

        // Duyệt qua tất cả SKU cũ của sản phẩm
        foreach ($existingSkus as $existingSku) {
            $skuId = $existingSku['id'];
            if (!in_array($skuId, $skuIds)) {
                $skuModel->deleteSku($skuId);
                $productVariantOptionCombinationModel->deleteBySkuId($skuId);
            }
        }

        // Cập nhật hoặc tạo mới SKU
        if (count($skuCodes) === count($skuPrices) && count($skuPrices) === count($skuStockQuantities)) {
            foreach ($skuCodes as $index => $skuCode) {
                if (empty($skuCode) || empty($skuPrices[$index]) || empty($skuStockQuantities[$index])) {
                    continue;
                }

                // Kiểm tra ảnh nếu có
                $imagePath = null;
                if (isset($skuIds[$index]) && $skuIds[$index] !== 'undefined') {
                    // Lấy ảnh cũ nếu không upload ảnh mới
                    $existingSku = $skuModel->getOne($skuIds[$index]);
                    $imagePath = $existingSku['image'];
                }

                if (isset($_FILES['sku_image']) && !empty($_FILES['sku_image']['name'][$index])) {
                    $imagePath = SkuValidation::uploadImage1($_FILES['sku_image'], $index);
                }

                // Tạo mảng dữ liệu SKU
                $skuData = [
                    'sku' => $skuCode,
                    'price' => $skuPrices[$index],
                    'stock_quantity' => $skuStockQuantities[$index],
                    'image' => $imagePath,
                ];

                if (isset($skuIds[$index]) && $skuIds[$index] !== 'undefined') {
                    $skuData['id'] = $skuIds[$index];
                    $skuModel->updateSku((int)$skuIds[$index], $skuData);

                    // Xóa và thêm lại các variant options nếu có
                    $productVariantOptionCombinationModel->deleteBySkuId($skuIds[$index]);
                    if (isset($_POST['variant_options'])) {
                        $variantOptions = $_POST['variant_options'];
                        foreach ($variantOptions as $variantOptionId) {
                            $combinationData = [
                                'sku_id' => $skuIds[$index],
                                'product_variant_option_id' => $variantOptionId,
                            ];
                            $productVariantOptionCombinationModel->create($combinationData);
                        }
                    }
                } else {
                    // Tạo SKU mới
                    $skuData['product_id'] = $productId;
                    $newSkuId = $skuModel->createSku($skuData);

                    // Thêm các variant options nếu có
                    if (isset($_POST['variant_options'])) {
                        $variantOptions = $_POST['variant_options'];
                        foreach ($variantOptions as $variantOptionId) {
                            $combinationData = [
                                'sku_id' => $newSkuId,
                                'product_variant_option_id' => $variantOptionId,
                            ];
                            $productVariantOptionCombinationModel->create($combinationData);
                        }
                    }
                }
            }
        }
    }






    // // thực hiện xoá
    public static function delete(int $id)
    {
        $product = new Product();
        $result = $product->deleteProduct($id);

        // var_dump($result);
        if ($result) {
            NotificationHelper::success('delete', 'Xóa sản phẩm thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa sản phẩm thất bại');
        }

        header('location: /admin/products');
    }
}

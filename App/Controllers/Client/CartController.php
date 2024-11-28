<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Helpers\ViewProductHelper;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Cart\CheckOut;
use App\Views\Client\Pages\Cart\Show;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\Index;
use App\Helpers\AuthHelper;


class CartController
{

    public static function add()
    {
        // Kiểm tra trạng thái đăng nhập
        if (!AuthHelper::checkLogin()) {
            NotificationHelper::error('login_required', 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
            header('Location: /login');
            exit();
        }

        $id = $_POST['id'];

        if (empty($id)) {
            echo "Lỗi: ID sản phẩm không hợp lệ.";
            return;
        }

        $productModel = new Product();
        $product = $productModel->getOneProduct($id);

        if (!$product) {
            echo "Lỗi: Sản phẩm không tồn tại.";
            return;
        }

        // Lấy thông tin biến thể được chọn
        $variantOptionIds = $_POST['variant_option_ids'] ?? [];
        $variantOptions = [];

        if (!empty($variantOptionIds)) {
            $variantOptionsModel = new Product();
            $variantOptions = $variantOptionsModel->getVariantOptionsByIds($variantOptionIds);
        }

        // Nếu có biến thể, lấy giá và SKU
        $variantPrice = 0;
        if (!empty($variantOptions)) {
            $variantPrice = $variantOptions[0]['price']; // Giả sử chỉ có một biến thể
        }

        // Nếu không có biến thể, dùng giá mặc định
        $price = $variantPrice > 0 ? $variantPrice : $product['price_default'];

        // Thêm sản phẩm vào giỏ hàng
        $cartModel = new Cart();
        $cartModel->addProduct($product, $variantOptions, $price); // Lưu vào giỏ hàng

        // Redirect tới giỏ hàng
        header('Location: /cart/show');
        exit();
    }



    public static function show()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $cartModel = new Cart();
        $cart = $cartModel->getCartInfo();
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        // Kiểm tra nếu key 'buy' và 'info' tồn tại trong giỏ hàng
        $list_buy = $cart['buy'] ?? []; // Lấy danh sách sản phẩm
        $cart_info = $cart['info'] ?? []; // Lấy thông tin giỏ hàng
        $data = [
            'list_buy' => $list_buy,
            'cart_info' => $cart_info,
            'categories' => $categories
        ];

        Header::render($data);
        Show::render($data);
        Footer::render();
    }

    public static function delete($id)
    {

        $cart = new Cart();
        $cart->deleteItem($id);

        header('Location: /cart/show');
        exit();
    }

    public static function deleteAll()
    {

        $cart = new Cart();
        $cart->deleteAllItems();


        header('Location: /cart/show');
        exit();
    }

    public static function update()
    {
        $cartModel = new Cart();
        $cart = $cartModel->getCartInfo(); // Lấy toàn bộ dữ liệu giỏ hàng từ cookie
        $quantities = $_POST['qty'] ?? []; // Lấy số lượng sản phẩm được gửi từ form

        $number_order = 0; // Tổng số lượng sản phẩm
        $total = 0; // Tổng giá tiền

        // Duyệt qua các sản phẩm trong giỏ hàng
        foreach ($quantities as $key => $qty) {
            if (isset($cart['buy'][$key])) {
                // Cập nhật số lượng và thành tiền cho sản phẩm
                $cart['buy'][$key]['qty'] = max(1, (int)$qty);
                $cart['buy'][$key]['sub_total'] = ($cart['buy'][$key]['price_default'] - ($cart['buy'][$key]['discount_price'] ?? 0)) * $cart['buy'][$key]['qty'];

                // Tính tổng số lượng và tổng giá tiền
                $number_order += $cart['buy'][$key]['qty'];
                $total += $cart['buy'][$key]['sub_total'];
            }
        }

        // Cập nhật thông tin tổng quan giỏ hàng
        $cart['info'] = ['number_order' => $number_order, 'total' => $total];

        // Lưu lại toàn bộ giỏ hàng vào cookie
        $cartModel->saveCartToCookie($cart);

        // Trả về kết quả JSON
        echo json_encode([
            'success' => true,
            'total' => number_format($total), // Tổng giá
            'number_order' => $number_order, // Tổng số sản phẩm
            'cart' => $cart, // Dữ liệu giỏ hàng mới
        ]);
        exit();
    }

    public static function checkout()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $product = new Product();
        $products = $product->getAllProductByStatus();

        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        $data = [
            'products' => $products,
            'categories' => $categories,
            'cart' => $cart,
        ];

        // echo "<pre>";
        // var_dump($data['cart']);

        Header::render($data);
        Notification::render();
        NotificationHelper::unset();
        // CheckOut::render($data);
        Footer::render();
    }
}

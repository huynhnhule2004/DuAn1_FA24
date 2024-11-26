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


class CartController
{

    public static function add()
    {
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

        $variantOptionIds = $_POST['variant_option_ids'] ?? [];
        $variantOptions = [];

        if (!empty($variantOptionIds)) {
            $variantOptionsModel = new Product();
            $variantOptions = $variantOptionsModel->getAllVariantOptionByProductInCart($id);
        }

        $cartModel = new Cart();
        $cartModel->addProduct($product, $variantOptions);

        header('Location: /cart/show');
        exit();
    }


    public static function show()
    {
        $cartModel = new Cart();
        $cart = $cartModel->getCartInfo();
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $data = [
            'list_buy' => $cart['buy'],
            'cart_info' => $cart['info'],
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
        if (isset($_POST['btn_update_cart'])) {
            var_dump($_POST);
        }
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

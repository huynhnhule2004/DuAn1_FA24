<?php

namespace App\Models;

class Cart extends BaseModel
{

    private $cartKey = 'cart';
    private function getCartFromCookie()
    {
        if (isset($_COOKIE[$this->cartKey])) {
            $cart = json_decode($_COOKIE[$this->cartKey], true);
            return $cart;
        }
        return ['buy' => []]; // Trả về mảng rỗng nếu không có cookie
    }

    public  function saveCartToCookie($cart)
    {
        setcookie($this->cartKey, json_encode($cart), time() + (3600 * 24 * 30), '/');
    }

    public function addProduct($product, $variantOptions = [], $price = 0)
    {
        $cart = $this->getCartFromCookie();

        $id = $product['id'];
        $variantKey = implode('-', array_column($variantOptions, 'id')); // Tạo khóa duy nhất cho biến thể

        $cartKey = $id . ($variantKey ? "-$variantKey" : ''); // Đảm bảo tạo khóa duy nhất

        if (isset($cart['buy'][$cartKey])) {
            // Sản phẩm đã có trong giỏ, tăng số lượng
            $qty = $cart['buy'][$cartKey]['qty'] + 1;
        } else {
            // Thêm sản phẩm mới vào giỏ
            $qty = 1;
        }

        // Cập nhật thông tin giỏ hàng
        $cart['buy'][$cartKey] = [
            'id' => $product['id'],
            'product_name' => $product['product_name'],
            'price_default' => $product['price_default'],
            'discount_price' => $product['discount_price'],
            'image' => $product['image'],
            'qty' => $qty,
            'variant_options' => $variantOptions,
            'sub_total' => $price * $qty,
        ];

        // Cập nhật tổng số lượng và tổng giá trị giỏ hàng
        $number_order = 0;
        $total = 0;
        foreach ($cart['buy'] as $item) {
            $number_order += $item['qty'];
            $total += $item['sub_total'];
        }
        $cart['info'] = ['number_order' => $number_order, 'total' => $total];

        $this->saveCartToCookie($cart);
    }


    public function clearCart() {
        // Kiểm tra nếu cookie giỏ hàng tồn tại
        if (isset($_COOKIE['cart'])) {
            setcookie('cart', '', time() - 3600, '/'); // Xóa cookie giỏ hàng
        }
    }

    public function deleteItem($id)
    {
        $cart = $this->getCartFromCookie();
        if (isset($cart['buy'][$id])) {
            unset($cart['buy'][$id]);

            // Cập nhật lại số lượng sản phẩm và tổng giá
            $number_order = 0;
            $total = 0;
            foreach ($cart['buy'] as $item) {
                $number_order += $item['qty'];
                $total += $item['sub_total'];
            }

            $cart['info'] = ['number_order' => $number_order, 'total' => $total];
            $this->saveCartToCookie($cart);
        }
    }


    public function deleteAllItems()
    {
        $this->saveCartToCookie(['buy' => [], 'info' => ['number_order' => 0, 'total' => 0]]);
    }



    public function getCartInfo()
    {
        $cart = $this->getCartFromCookie();
        if (!isset($cart['buy'])) {
            $cart['buy'] = [];
        }
        return $cart;
    }
}

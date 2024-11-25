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

    private function saveCartToCookie($cart)
    {
        setcookie($this->cartKey, json_encode($cart), time() + (3600 * 24 * 30 * 12), '/');
    }

    public function addProduct($product, $variantOptions = [])
    {

        $cart = $this->getCartFromCookie();

        $id = $product['id'];
        $variantKey = implode('-', array_column($variantOptions, 'id'));
        $cartKey = $id . ($variantKey ? "-$variantKey" : '');

        if (empty($cartKey)) {
            echo "Lỗi: Không thể tạo key cho sản phẩm.";
            return;
        }


        if (isset($cart['buy'][$cartKey])) {
            $qty = $cart['buy'][$cartKey]['qty'] + 1;
        } else {
            $qty = 1;
        }


        $cart['buy'][$cartKey] = [
            'id' => $product['id'],
            'product_name' => $product['product_name'],
            'price_default' => $product['price_default'],
            'discount_price' => $product['discount_price'],
            'image' => $product['image'],
            'qty' => $qty,
            'variant_options' => $variantOptions,
            'sub_total' => ($product['price_default'] - ($product['discount_price'] ?? 0)) * $qty,
        ];

        $number_order = 0;
        $total = 0;
        foreach ($cart['buy'] as $item) {
            $number_order += $item['qty'];
            $total += $item['sub_total'];
        }
        $cart['info'] = ['number_order' => $number_order, 'total' => $total];

        $this->saveCartToCookie($cart);
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

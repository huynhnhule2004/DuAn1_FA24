<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\ProductDetail;
use App\Views\Client\Pages\Product\Index;
use App\Views\Client\Pages\Product\Detail;
use App\Models\Sku;




class ProductController
{
    public static function index()
    {
        $category = new Category();
        $categories = $category->getAllByStatus();

        $product = new Product();
        $products = $product->getAllProductByStatus();

        $data = [
            'products' => $products,
            'categories' => $categories,

        ];

        Header::render();
        Index::render($data);
        Footer::render();
    }
    public static function detail($id)
    {
        $productModel = new Product();
        $product_detail = $productModel->getAllProductByStatus($id);
        $comment = new Comment();
        $comments = $comment->get2CommentNewestByProductAndStatus($id);
        

        $product = new Product();
        $sku = new Sku();
        $products = $product->getAllProductByStatus();
        $product_detail = $product->getOneProductByStatus($id);
        $category = $product->getCategoryById($id);
        $product_variant = $product->getProductVariant($id);
        $sku_details = $sku->getSkuByProductId($id); 


        
        if (!$product_variant) {
            NotificationHelper::error('product_detail', 'Không thể xem sản phẩm này');
            header('location: /products');
            exit;
        }

        $data = [

            'product' => $product_detail,
            'comments' => $comments,
            'products' => $products,
            'category' => $category,
            'product_variant' => $product_variant,
            'product_detail' => $product_detail,
            'sku_details' => $sku_details,
           
        ];
        
        
        Header::render();
        Detail::render($data);
        Footer::render();

    }        
    // public static function getProductByCategory($id)
    // {
    // }
    // public static function getProductByCategory($id) {}
}

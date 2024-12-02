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
use App\Views\Client\Pages\Product\Filter;

class FilterController {
    public function filterByPrice()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $priceRange = $_GET['priceRange'] ?? 'all';
        $product = new Product();
        $filteredProducts = $product->filterByPriceRange($priceRange);

        $data = [
            'filteredProducts' => $filteredProducts,
            'categories' => $categories
        ];

        Header::render($data);
        Filter::render($data);
        Footer::render();
    }
}
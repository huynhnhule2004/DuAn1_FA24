<?php

namespace App\Controllers\Client;

use App\Models\Category;
use App\Views\Client\Components\Category as CategoryView;

class CategoryController
{
    public static function index()
    {
        $categoryModel = new Category();
        $categories = $categoryModel->getAllActiveCategories();


        CategoryView::render($categories);
    }
}

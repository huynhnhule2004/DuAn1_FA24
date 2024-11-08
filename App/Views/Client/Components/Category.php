<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Category extends BaseView
{
    public static function render($data = null)
    {
?>
        <h5 class=" mb-3">Danh mục</h5>
        <nav class="nav flex-column border-right">
            <a class="nav-link active" href="/products">Tất cả</a>
            <a class="nav-link active" href="/products">Dành cho chó</a>
            <a class="nav-link active" href="/products">Dành cho mèo</a>
            <a class="nav-link active" href="/products">Thức ăn</a>
            <a class="nav-link active" href="/products">Đồ chơi</a>
        </nav>

<?php
    }
}

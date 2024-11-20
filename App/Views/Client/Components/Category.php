<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Category extends BaseView
{
    public static function render($categories = [])
    {
?>
         <h5 class="mb-3">Danh mục</h5>
        <nav class="nav flex-column border-right">
            <?php if (!empty($categories)) : ?>
                <?php foreach ($categories as $category) : ?>
                    <a class="nav-link" href="/products?category=<?= htmlspecialchars($category['id']) ?>">
                        <?= htmlspecialchars($category['category_name']) ?>
                    </a>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Không có danh mục nào để hiển thị.</p>
            <?php endif; ?>
        </nav>
<?php
    }
}


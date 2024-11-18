<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class BlogCategory extends BaseView
{
    public static function render($data = null)
    {
?>
        
        <div class="col-md-3">
            <h3>Chuyên mục bài viết</h3>

            <?php if (!empty($data)): ?>
                <?php foreach ($data as $item): ?>
                    <a href="/blogs/categories/<?= $item['id'] ?>" class="nav-link mt-3">
                        <strong><?= htmlspecialchars($item['category_name'] ) ?></strong>
                    </a>
                    <hr>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Không có chuyên mục nào.</p>
            <?php endif; ?>
        </div>

<?php
    }
}

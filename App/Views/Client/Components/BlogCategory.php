<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class BlogCategory extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="col-md-3">
            <h4 class="mb-4 text-primary">Chuyên mục bài viết</h4>

            <?php if (!empty($data)): ?>
                <?php foreach ($data as $item): ?>
                    <a href="/blogs/categories/<?= $item['id'] ?>" class="d-block text-dark fw-semibold mb-2">
                        <?= htmlspecialchars($item['category_name']) ?>
                    </a>
                    <hr class="mt-1 mb-2 text-muted">
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted">Không có chuyên mục nào.</p>
            <?php endif; ?>
        </div>

<?php
    }
}
?>

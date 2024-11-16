<?php

namespace App\Views\Client\Pages\Blog;

use App\Views\BaseView;

class Moreblog extends BaseView
{
    public static function render($data = null)
{
    ?>
    <style>
        .entry-divider {
            width: 50px;
            height: 5px;
            background-color: #ddd;
            margin: 0 auto 10px 0;
        }

        .is-divider {
            border: none;
            background-color: #aaa;
        }

        .small {
            width: 5%;
        }
    </style>
    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- Danh mục bài viết -->
            <div class="col-md-3">
                <h3>Chuyên mục bài viết</h3>
                <?php foreach ($data['categories'] as $category): ?>
                    <a href="/moreblog?category_id=<?= $category['id'] ?>" class="nav-link mt-3">
                        <?= $category['category_name'] ?>
                        <hr>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Nội dung bài viết -->
            <div class="col-md-9">
                <?php if (isset($data['blogs'])): ?>
                    <!-- Hiển thị danh sách bài viết -->
                    <?php foreach ($data['blogs'] as $blog): ?>
                        <div>
                            <h3><a href="/moreblog?blog_id=<?= $blog['id'] ?>"><?= $blog['title'] ?></a></h3>
                            <p><?= substr($blog['content'], 0, 100) ?>...</p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Chọn một danh mục để xem bài viết.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
}

}

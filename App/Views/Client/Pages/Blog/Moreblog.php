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
                margin: 20px auto;
            }

            .is-divider {
                border: none;
                background-color: #aaa;
            }

            .small {
                width: 5%;
            }

            .blog-detail {
                margin-top: 30px;
                padding: 20px;
                background-color: #f9f9f9;
                border-radius: 8px;
                box-shadow: 0 0 15px rgba(0,0,0,0.1);
            }
        </style>

        <div class="container mt-5 mb-5">
            <?php if (isset($data['blogDetail'])): ?>
                <div class="row">
                    <div class="col-md-3">
                        <h3>Chuyên mục bài viết</h3>

                        <?php if (!empty($data['categories'])): ?>
                            <?php foreach ($data['categories'] as $category): ?>
                                <a href="/moreblog?category_id=<?= $category['id'] ?>" class="nav-link mt-3">
                                    <strong><?= htmlspecialchars($category['category_name']) ?></strong>
                                </a>
                                <hr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Không có chuyên mục nào.</p>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-9 blog-detail">
                        <!-- Hiển thị hình ảnh bài viết -->
                        <?php if (isset($data['blogDetail']['image']) && $data['blogDetail']['image']): ?>
                            <img src="/uploads/<?= htmlspecialchars($data['blogDetail']['image']) ?>" alt="Image for <?= htmlspecialchars($data['blogDetail']['title']) ?>" class="img-fluid mb-3">
                        <?php endif; ?>

                        <!-- Hiển thị tiêu đề bài viết -->
                        <h1><?= isset($data['blogDetail']['title']) ? htmlspecialchars($data['blogDetail']['title']) : 'Tiêu đề không có sẵn' ?></h1>
                        <p class="fs-6"><?= isset($data['blogDetail']['created_at']) ? htmlspecialchars($data['blogDetail']['created_at']) : 'Ngày tạo không có sẵn' ?></p>
                        <div>
                            <?= isset($data['blogDetail']['content']) ? $data['blogDetail']['content'] : 'Nội dung không có sẵn' ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <p>Không tìm thấy bài viết.</p>
            <?php endif; ?>
        </div>
<?php
    }
}
?>

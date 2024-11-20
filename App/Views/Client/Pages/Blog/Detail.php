<?php

namespace App\Views\Client\Pages\Blog;

use App\Views\Client\Components\BlogCategory;

use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null)
    {
?>
        <style>
            .row {
                display: flex;
                align-items: flex-start;
                gap: 20px;
            }

            .col-md-3 {
                flex: 1;
            }

            .col-md-9 {
                flex: 3;
            }

            .blog-detail h1 {
                margin-top: 0;
            }

            hr {
                margin: 10px 0;
            }

            .entry-divider {
                width: 100%;
                height: 4px;
                background-color: #ddd;
                margin: 10px 0;
            }

            .is-divider {
                border: none;
                background-color: #aaa;
            }

            .small {
                width: 60px;
                margin: 0 left;
            }
        </style>

        <div class="container mt-5 mb-5">
            <?php if (isset($data['categories'])): ?>
                <div class="row">
                    <?php BlogCategory::render($data['categories']); ?>

                    <div class="col-md-9 blog-detail">
                        <!-- Hiển thị tiêu đề bài viết -->
                        <h1><?= isset($data['blog_detail']['title']) ? htmlspecialchars($data['blog_detail']['title']) : 'Tiêu đề không có sẵn' ?></h1>
                        <div class="entry-divider is-divider small"></div>
                        <!-- Hiển thị ngày tạo -->
                        <p class="fs-6"><?= isset($data['blog_detail']['created_at']) ? htmlspecialchars($data['blog_detail']['created_at']) : 'Ngày tạo không có sẵn' ?></p>
                        <!-- Hiển thị hình ảnh bài viết -->
                        <?php if (isset($data['blog_detail']['image']) && $data['blog_detail']['image']): ?>
                            <img src="<?= APP_URL ?>/public/uploads/blogs/<?= $data['blog_detail']['image'] ?>" alt="Image for <?= htmlspecialchars($data['blog_detail']['title']) ?>" class="img-fluid mb-3">
                        <?php endif; ?>



                        <!-- Hiển thị nội dung bài viết -->
                        <div>
                            <?= isset($data['blog_detail']['content']) ? $data['blog_detail']['content'] : 'Nội dung không có sẵn' ?>
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
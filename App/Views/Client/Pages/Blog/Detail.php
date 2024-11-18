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
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            }
        </style>

        <div class="container mt-5 mb-5">
            <?php if (isset($data['categories'])): ?>
                <div class="row">
                    <?php
                    BlogCategory::render($data['categories']);
                    ?>

                    <div class="col-md-9 blog-detail">
                        <!-- Hiển thị hình ảnh bài viết -->
                        <?php if (isset($data['blog_detail']['image']) && $data['blog_detail']['image']): ?>
                            <img src="<?= APP_URL ?>/public/uploads/blogs/<?= $data['blog_detail']['image'] ?>" alt="Image for <?= htmlspecialchars($data['blog_detail']['title']) ?>" class="img-fluid mb-3">
                        <?php endif; ?>

                        <!-- Hiển thị tiêu đề bài viết -->
                        <h1><?= isset($data['blog_detail']['title']) ? htmlspecialchars($data['blog_detail']['title']) : 'Tiêu đề không có sẵn' ?></h1>
                        <p class="fs-6"><?= isset($data['blog_detail']['created_at']) ? htmlspecialchars($data['blog_detail']['created_at']) : 'Ngày tạo không có sẵn' ?></p>
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
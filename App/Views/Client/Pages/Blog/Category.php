<?php

namespace App\Views\Client\Pages\Blog;

use App\Views\BaseView;

class Category extends BaseView
{
  public static function render($data = null)
  {
    $blogs = $data['blogs'] ?? [];

    
?>
    <div class="container pt-5">
      <?php if (!empty($blogs)): ?>
        <div class="row g-4 ">
          <?php foreach ($blogs as $item): ?>
            <div class="col-md-4">
              <div class="card h-100">
                <div class="position-relative">
                  <a href="/blogs/<?= $item['id'] ?>">
                    <!-- Đặt kích thước ảnh cố định -->
                    <img src="<?= APP_URL ?>/public/uploads/blogs/<?= $item['image'] ?>" class="card-img-top img-fluid rounded-3" alt="image" style="height: 400px; object-fit: cover;">
                  </a>
                  <div class="position-absolute top-0 start-0 bg-light rounded m-2 px-3 py-1">
                    <h5 class="text-primary mb-0">20</h5>
                    <small class="text-muted">Feb</small>
                  </div>
                </div>
                <div class="card-body d-flex flex-column">
                  <a href="/blogs/<?= $item['id'] ?>" class="text-decoration-none">
                    <h5 class="card-title text-dark"><?= $item['title'] ?></h5>
                  </a>
                  <?= strlen(strip_tags($item['content'])) > 100
                    ? htmlspecialchars(substr(strip_tags($item['content']), 0, 100)) . '...'
                    : htmlspecialchars(strip_tags($item['content'])) ?>

                  <a href="/blogs/<?= $item['id'] ?>" class="mt-auto text-primary">Đọc thêm</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>



      <?php else: ?>
        <p class="text-center">Không có blog</p>
      <?php endif; ?>
      <div class="row g-0 py-5">
        <div class="col instagram-item  text-center position-relative">
          <div class="icon-overlay d-flex justify-content-center position-absolute">
            <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
          </div>
          <a href="#">
            <img src="/public/assets/client/images/insta1.jpg" alt="insta-img" class="img-fluid rounded-3">
          </a>
        </div>
        <div class="col instagram-item  text-center position-relative">
          <div class="icon-overlay d-flex justify-content-center position-absolute">
            <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
          </div>
          <a href="#">
            <img src="/public/assets/client/images/insta2.jpg" alt="insta-img" class="img-fluid rounded-3">
          </a>
        </div>
        <div class="col instagram-item  text-center position-relative">
          <div class="icon-overlay d-flex justify-content-center position-absolute">
            <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
          </div>
          <a href="#">
            <img src="/public/assets/client/images/insta3.jpg" alt="insta-img" class="img-fluid rounded-3">
          </a>
        </div>
        <div class="col instagram-item  text-center position-relative">
          <div class="icon-overlay d-flex justify-content-center position-absolute">
            <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
          </div>
          <a href="#">
            <img src="/public/assets/client/images/insta4.jpg" alt="insta-img" class="img-fluid rounded-3">
          </a>
        </div>
        <div class="col instagram-item  text-center position-relative">
          <div class="icon-overlay d-flex justify-content-center position-absolute">
            <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
          </div>
          <a href="#">
            <img src="/public/assets/client/images/insta5.jpg" alt="insta-img" class="img-fluid rounded-3">
          </a>
        </div>
        <div class="col instagram-item  text-center position-relative">
          <div class="icon-overlay d-flex justify-content-center position-absolute">
            <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
          </div>
          <a href="#">
            <img src="/public/assets/client/images/insta6.jpg" alt="insta-img" class="img-fluid rounded-3">
          </a>
        </div>
      </div>
    </div>
    </div>

<?php
  }
}
?>
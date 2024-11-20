<?php

namespace App\Views\Client\Pages\Blog;

use App\Views\BaseView;

class Index extends BaseView
{
  public static function render($data = null)
  {
?>
    <div class="container pt-5">
      <?php if (!empty($data['blogs'])): ?>
        <div class="row g-4">
          <?php foreach ($data['blogs'] as $item): ?>
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
                  <p class="card-text text-muted">
                    <?= strlen($item['content']) > 100 ? substr($item['content'], 0, 100) . '...' : $item['content'] ?>
                  </p>
                  <a href="/blogs/<?= $item['id'] ?>" class="mt-auto text-primary">Đọc thêm</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="pagination loop-pagination d-flex justify-content-center align-items-center">
          <a href="#" class="pagination-arrow d-flex align-items-center mx-3">
            <iconify-icon icon="ic:baseline-keyboard-arrow-left" class="pagination-arrow fs-1"></iconify-icon>
          </a>
          <span aria-current="page" class="page-numbers mt-2 fs-3 mx-3 current">1</span>
          <a class="page-numbers mt-2 fs-3 mx-3" href="#">2</a>
          <a class="page-numbers mt-2 fs-3 mx-3" href="#">3</a>
          <a href="#" class="pagination-arrow d-flex align-items-center mx-3">
            <iconify-icon icon="ic:baseline-keyboard-arrow-right" class="pagination-arrow fs-1"></iconify-icon>
          </a>
        </div>
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
  <?php else: ?>
    <p class="text-center">Không có blog</p>
  <?php endif; ?>
  </div>

<?php
  }
}
?>
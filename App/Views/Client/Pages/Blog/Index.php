<?php

namespace App\Views\Client\Pages\Blog;

use App\Views\BaseView;

class Index extends BaseView
{
  public static function render($data = null)
  {
?>
    <div class="container">
      <?php if (!empty($data['blogs'])): ?>
        <div class="row entry-container">
          <?php foreach ($data['blogs'] as $item): ?>
            <div class="entry-item col-md-4 my-4">
              <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
                <h3 class="secondary-font text-primary m-0">20</h3>
                <p class="secondary-font fs-6 m-0">Feb</p>
              </div>
              <div class="card position-relative">
                <a href="single-post.html">
                  <img src="<?= APP_URL ?>/public/assets/client/images/<?= $item['image'] ?>" class="img-fluid rounded-4" alt="image">
                </a>
                <div class="card-body p-0">
                  <a href="single-post.html">
                    <h3 class="card-title pt-4 pb-3 m-0"><?= $item['title'] ?></h3>
                  </a>
                  <div class="card-text">
                    <p class="blog-paragraph fs-6"><?= $item['content'] ?></p>
                    <a href="single-post.html" class="blog-read">Đọc thêm</a>
                  </div>
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
<?php
  }
}

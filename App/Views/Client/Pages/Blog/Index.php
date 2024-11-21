<?php

namespace App\Views\Client\Pages\Blog;

use App\Views\BaseView;

class Index extends BaseView
{
  public static function render($data = null)
  {
    $blogs = $data['blogs'] ?? [];
    $remainingPosts = $data['remainingPosts'] ?? 0;
    $currentOffset = $data['currentOffset'] ?? 0;
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
        <?php if ($remainingPosts > 0): ?>
          <div class="pagination loop-pagination d-flex justify-content-center align-items-center">
            <!-- Nút mũi tên trái -->
            <?php if ($currentOffset > 1): ?>
              <a href="javascript:void(0)"
                class="pagination-arrow d-flex align-items-center mx-3"
                data-page="<?= $currentOffset - 1 ?>">
                <iconify-icon icon="ic:baseline-keyboard-arrow-left" class="pagination-arrow fs-1"></iconify-icon>
              </a>
            <?php else: ?>
              <span class="pagination-arrow d-flex align-items-center mx-3 disabled">
                <iconify-icon icon="ic:baseline-keyboard-arrow-left" class="pagination-arrow fs-1"></iconify-icon>
              </span>
            <?php endif; ?>

            <!-- Các số trang -->
            <?php for ($i = 1; $i <= ceil($remainingPosts / 3); $i++): ?>
              <?php if ($i == $currentOffset): ?>
                <span aria-current="page" class="page-numbers mt-2 fs-3 mx-3 current"><?= $i ?></span>
              <?php else: ?>
                <a class="page-numbers mt-2 fs-3 mx-3" href="javascript:void(0)" data-page="<?= $i ?>"><?= $i ?></a>
              <?php endif; ?>
            <?php endfor; ?>

            <!-- Nút mũi tên phải -->
            <?php if ($currentOffset < ceil($remainingPosts / 3)): ?>
              <a href="javascript:void(0)"
                class="pagination-arrow d-flex align-items-center mx-3"
                data-page="<?= $currentOffset + 1 ?>">
                <iconify-icon icon="ic:baseline-keyboard-arrow-right" class="pagination-arrow fs-1"></iconify-icon>
              </a>
            <?php else: ?>
              <span class="pagination-arrow d-flex align-items-center mx-3 disabled">
                <iconify-icon icon="ic:baseline-keyboard-arrow-right" class="pagination-arrow fs-1"></iconify-icon>
              </span>
            <?php endif; ?>
          </div>
        <?php endif; ?>


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
  <script>
      $(document).ready(function() {
        function loadPage(page) {
          // Hiển thị loader
          $('.loading').html("<img src='public/images/loading.gif'/>").fadeIn('fast');

          // Gọi AJAX
          $.ajax({
            url: '/blog/pagination',
            method: 'GET',
            data: {
              page: page
            },
            dataType: 'json',
            success: function(response) {
              console.log(response); // Log response để debug

              // Tắt loader
              $('.loading').fadeOut('fast');

              // Cập nhật nội dung blog
              $('.row.g-4').html(response.blogHtml);

              // Cập nhật phân trang
              $('.pagination').html(response.paginationLinks);
            },
            error: function(xhr, status, error) {
              console.error("Chi tiết lỗi:", xhr.responseText, status, error);
              alert('Lỗi: ' + error);
            }
          });
        }

        $(document).on('click', '.pagination-arrow, .page-numbers:not(.current)', function() {
          const page = $(this).data('page'); // Lấy số trang từ thuộc tính data-page
          if (page) {
            loadPage(page); // Gọi hàm loadPage với số trang
          }
        });


        // Tải trang đầu tiên khi khởi động
        loadPage(1);
      });
    </script>
<?php
  }
}
?>
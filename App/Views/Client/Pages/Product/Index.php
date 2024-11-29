<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;
use App\Views\Client\Components\Filter;
use App\Views\Client\Components\Search;
use App\Views\Client\Components\SortBy;




class Index extends BaseView
{
  public static function render($data = null)
  {
    $remainingProducts = $data['remainingProducts'] ?? 0;
    $currentOffset = $data['currentOffset'] ?? 0;
?>
    <style>
      button:focus {
        outline: none;
        box-shadow: none;
      }

      button {
        border: none;
        background: none;
      }

      .btn-cart {
        border: 1px solid #D3D4D4;
        border-radius: 5px;
        background-color: #f8f9fa;
        padding: 10px 15px;
        box-shadow: none;
      }

      .btn-cart:hover {
        background-color: #e2e6ea;
      }

      .btn-cart h6 {
        margin: 0;
        font-size: 14px;
        color: #333;
      }
    </style>

    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-md-3">
          <div class="category-section mb-4 mt-3">
            <?php
            // Search::render();
            ?>
            <?php
            Category::render($data['categories']);
            ?>
            <?php
            Filter::render();
            ?>
          </div>

        </div>
        <div class="col-md-9">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <?php
            SortBy::render();
            ?>
            <?php if (!empty($data['products'])): ?>
              <div class="row g-4 ">
                <?php foreach ($data['filteredProducts'] as $item): ?>
                  <div class="col-md-4 mb-4">
                    <div class="swiper-slide">
                      <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                        <?= number_format((($item['discount_price']) / $item['price_default']) * 100) ?>%
                      </div>
                      <div class="card position-relative">
                        <a href="/products/<?= $item['id'] ?>">
                          <img src="<?= APP_URL ?>public/uploads/products/<?= $item['image'] ?>" class="img-fluid rounded-4" alt="image" style="height: 300px; object-fit: cover;">
                        </a>
                        <div class="card-body p-0">
                          <a href="/products/<?= $item['id'] ?>">
                            <h4 class="card-title pt-4 m-0"><?= $item['product_name'] ?></h4>
                          </a>
                          <div class="card-text">
                            <span class="rating secondary-font">
                              <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                              <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                              <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                              <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                              <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                              5.0
                            </span>
                            <?php if ($item['discount_price'] > 0): ?>
                              <h4 class="secondary-font text-primary"><?= number_format($item['price_default'] - $item['discount_price']) ?> VNĐ
                                <strike style="font-size: medium; color: #333"><?= number_format($item['price_default']) ?> VNĐ</strike>
                              </h4>
                            <?php else: ?>
                              <h4 class="secondary-font text-primary"><?= number_format($item['price_default']) ?> VNĐ</h4>
                            <?php endif; ?>


                            <div class="d-flex flex-wrap mt-3">
                              <a href="/products/<?= $item['id'] ?>" class="btn-cart me-3 px-3 pt-3 pb-3">
                                <h6 class="text-uppercase m-0">Xem sản phẩm</h6>
                              </a>
                              <a href="#" class="btn-wishlist px-4 pt-3 ">
                                <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php endforeach; ?>
              </div>
            <?php else: ?>
              <p>Không có sản phẩm nào trong khoảng giá này.</p>
            <?php endif; ?>
            <?php if ($remainingProducts > 0): ?>
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
                <?php for ($i = 1; $i <= ceil($remainingProducts / 12); $i++): ?>
                  <?php if ($i == $currentOffset): ?>
                    <span aria-current="page" class="page-numbers mt-2 fs-3 mx-3 current"><?= $i ?></span>
                  <?php else: ?>
                    <a class="page-numbers mt-2 fs-3 mx-3" href="javascript:void(0)" data-page="<?= $i ?>"><?= $i ?></a>
                  <?php endif; ?>
                <?php endfor; ?>

                <!-- Nút mũi tên phải -->
                <?php if ($currentOffset < ceil($remainingProducts / 12)): ?>
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
          </div>
        </div>
      </div>
      <section id="register" style="background: url('/public/assets/client/images/background-img.png') no-repeat;" class="my-5">
        <div class="container my-5 ">
          <div class="row my-5 py-5">
            <div class="offset-md-3 col-md-6 my-5 ">
              <h2 class="display-4 fw-normal text-center">Giảm giá 20%</h2>
              <h2 class="display-4 fw-normal text-center"><span class="text-primary">Khi mua lần đầu</span></h2>
              <form>
                <div class="mb-3">
                  <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Nhập Email của bạn">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control form-control-sm" name="email" id="password1" placeholder="Mật khẩu">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control form-control-sm" name="email" id="password2" placeholder="Nhập lại mật khẩu">
                </div>

                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-dark btn-lg rounded-1">ĐĂNG KÝ NGAY</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <section id="service">
        <div class="container py-5 my-5">
          <div class="row g-md-5 pt-4">
            <div class="col-md-3 my-3">
              <div class="card">
                <div>
                  <iconify-icon class="service-icon text-primary" icon="la:shopping-cart"></iconify-icon>
                </div>
                <h3 class="card-title py-2 m-0">Giao Hàng Miễn Phí</h3>
                <div class="card-text">
                  <p class="blog-paragraph fs-6">Chúng tôi hỗ trợ giao hàng miễn phí cho đơn hàng >200</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 my-3">
              <div class="card">
                <div>
                  <iconify-icon class="service-icon text-primary" icon="la:user-check"></iconify-icon>
                </div>
                <h3 class="card-title py-2 m-0">Thanh Toán Nhanh</h3>
                <div class="card-text">
                  <p class="blog-paragraph fs-6">Đảm bảo thanh toán an toàn, bảo mật tuyệt đối cho khách hàng.</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 my-3">
              <div class="card">
                <div>
                  <iconify-icon class="service-icon text-primary" icon="la:tag"></iconify-icon>
                </div>
                <h3 class="card-title py-2 m-0">Ưu Đãi Hàng Ngày</h3>
                <div class="card-text">
                  <p class="blog-paragraph fs-6">Nhận ngay các ưu đãi hấp dẫn mỗi ngày khi mua sắm tại cửa hàng.</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 my-3">
              <div class="card">
                <div>
                  <iconify-icon class="service-icon text-primary" icon="la:award"></iconify-icon>
                </div>
                <h3 class="card-title py-2 m-0">Đảm Bảo Yêu Cầu</h3>
                <div class="card-text">
                  <p class="blog-paragraph fs-6">Cam kết mang đến sản phẩm chất lượng tốt nhất cho thú cưng của bạn.</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
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
      <script>
        $(document).ready(function() {
          function loadPage(page) {
            // Hiển thị loader
            $('.loading').html("<img src='public/images/loading.gif'/>").fadeIn('fast');

            // Gọi AJAX
            $.ajax({
              url: '/product/paginationproduct',
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
                $('.row.g-4').html(response.productHtml);

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